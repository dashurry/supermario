<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Import Stripe */
use Stripe\Stripe;
use Stripe\Charge;

use App\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use PayPal;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function checkExecuteStoreOrder(Request $req)
    {
        if($req->ajax())
        {
           /* Check payment type */
            $paymentType = $req->paymentMethod;
            $totalAmount = Cart::totalPrice();

            if($paymentType == "card")
            {
                Stripe::setApiKey('sk_test_51HC7YBLlbDEEhNWI0G7Wj0mmy2W15dD1RPPo5Y4m0wa3AjYRJAB8IbpMo2MADCVFjPooyQYm5IpFxDO1cTk432hD003VMPCAWm');
                Stripe::setVerifySslCerts(false);

                $stripeData = Charge::create(
                    [
                        "amount" => $totalAmount*100,
                        "currency" => "chf",
                        "source" => $req->stripeToken,
                        "description" => "Payment for Online purchase"
                    ]
                );
                if($stripeData)
                {
                    $cardBrand = $stripeData['payment_method_details']['card']->brand;
                    $last4 = $stripeData['payment_method_details']['card']->last4;
                    return $this->submitOrder($req,$stripeData['id'],$cardBrand,$last4);
                }
            }
            elseif($paymentType == "paypal")
            {
                $apiContext = $this->getApiContext();
                $paymentInfo =  PayPal\Api\Payment::get($req->paypalPaymentId,$apiContext);
                $paymentExecution = new  PayPal\Api\PaymentExecution();
                $paymentExecution->setPayerId($req->paypalUserId);
                $transaction = new  PayPal\Api\Transaction();
                $amount = new  PayPal\Api\Amount();

                $amount->setTotal($totalAmount)->setCurrency('CHF');
                $transaction->setAmount($amount)->setDescription('Online Purchase');

                $paymentExecution->addTransaction($transaction);

                try
                {
                    $result = $paymentInfo->execute($paymentExecution,$apiContext);
                    return $this->submitOrder($req,$paymentInfo->getId(),"","");
                }
                catch(Exception $exception)
                {
                    return $exception;
                }
            }
            elseif($paymentType == "cash")
            {
                return $this->submitOrder($req,"","","");
            }
        }
    }

    private function submitOrder($req, $paymentId,$cardBrand,$last4)
    {
        $status = null;


        $lat = $req->lat;
        $lng = $req->lng;
        $firstName = $req->firstName;
        $lastName = $req->lastName;
        $companyName = $req->companyName;
        $cityId = $req->cityId;
        $cityName = $req->cityName;
        $streetAddress = $req->streetAddress;
        $floor = $req->floor;
        $deliveryType = $req->deliveryType;
        $orderType = $req->orderType;
        $deliveryTime = null;
        $postCode = $req->postCode;
        $postArea = \App\Models\Postcode::getPostArea($postCode);
        $phone = $req->phone;
        $email = $req->email;
        $orderNotes = $req->orderNotes;
        $paymentMethod = $req->paymentMethod;
        $totalPrice = Cart::totalPrice();
        
        if($orderType == "preorder")
        {
            $deliveryTime = $req->deliveryDate." ".$req->deliveryTime;
        }

        $order = new Order();

        $order->firstName = $firstName;
        $order->lastName = $lastName;
        $order->company = $companyName;
        $order->cityId = $cityId;
        $order->cityName = $cityName;
        $order->streetAddress = $streetAddress;
        $order->floor = $floor;
        $order->deliveryType = $deliveryType;
        $order->orderType = $orderType;
        $order->deliveryTime = $deliveryTime;
        $order->arrivalTime = $deliveryTime;
        $order->postCode = $postCode;
        $order->postArea = $postArea;
        $order->phone = $phone;
        $order->email = $email;
        $order->orderNote = $orderNotes;
        $order->paymentId = $paymentId;
        $order->paymentType = $paymentMethod;
        $order->lat = $lat;
        $order->lng = $lng;
        $order->totalPrice = $totalPrice;
        $order->cardBrand = $cardBrand;
        $order->last4 = $last4;

        $ref = sha1(time());
        $ref = strtoupper($ref);
        $ref = Str::limit($ref,10,'');
        $order->referenceNumber = $ref;

        if($order->save())
        {
            $order_id = $order->id;
            if($orderType == "asap")
            {
                $order->deliveryTime = Carbon::now()->addMinutes(env('DEFAULT_DELIVERY_TIME'));
                $order->arrivalTime = Carbon::now()->addMinutes(env('DEFAULT_DELIVERY_TIME'));
                $order->save();
            }
            foreach(Cart::cartContent() as $rowId=>$item)
            {
                OrderItem::insert(
                    [
                        "orderId"=>$order_id,
                        "productId"=>$item['product_id'],
                        "sizeName"=>$item['size_name'],
                        "quantity"=>$item['quantity'],
                        "unitPrice"=>$item['product_price'],
                        "totalPrice"=>$item['total_price'],
                        "productNote"=>$item['note'],
                        "created_at"=>date('Y-m-d H:i:s'),
                        "updated_at"=>date('Y-m-d H:i:s')
                    ]
                );
            }
           $status = "OK";
           Cart::eraseCart();
        }

        $final_order_type = null;
        $final_delivery_time = null;

        if($order->orderType == "asap")
        {
            $final_order_type = "asap";
            $final_delivery_time = "Today - " .Carbon::parse($order->arrivalTime)->format('H:i');
        }
        elseif($order->orderType == "preorder")
        {
            if(Carbon::parse($order->created_at)->isToday())
            {
                $final_order_type = "today_preorder";
                $final_delivery_time = "Today - " .Carbon::parse($order->arrivalTime)->format('H:i');
            }
            else
            {
                $final_order_type = "upcoming_preorder";
                $final_delivery_time = Carbon::parse($order->arrivalTime)->format('l - d M, H:i');
            }
        }

        $notification = array
        (
            "orderId" => $order_id,
            "totalPrice" => $totalPrice,
            "time" => $order->created_at->diffForHumans(),
            "streetAddress" => $order->streetAddress,
            "orderData" => $order,
            "orderType" => $final_order_type,
            "arrivalTime" => $final_delivery_time,
            "live_time" => $order->created_at
        );

        $this->sendNotification($notification);

        Mail::to($req->email)->send(new \App\Mail\SendInvoiceMail($order_id));

        return json_encode(array(
            "status" => $status,
            "orderId" => $order_id
        ));
    }

    public function getPaypal(Request $req)
    {
        if($req->ajax())
        {
            $totalAmount = Cart::totalPrice();
            $apiContext = $this->getApiContext();

            $paypalUserId = new PayPal\Api\Payer();
            $paypalUserId->setPaymentMethod('paypal');

            $amount = new  PayPal\Api\Amount();
            $amount->setTotal($totalAmount)->setCurrency('CHF');

            $transaction = new  PayPal\Api\Transaction();
            $transaction->setAmount($amount);

            $redirectUrl = new  PayPal\Api\RedirectUrls();
            $redirectUrl->setReturnUrl(route('paypalVerify','approved'))->setCancelUrl(route('paypalVerify','canceled'));

            $payment = new  PayPal\Api\Payment();
            $payment->setIntent('sale')->setPayer($paypalUserId)->setTransactions(array($transaction))->setRedirectUrls($redirectUrl);

            try {
                $payment->create($apiContext);
                return $payment->getApprovalLink();

            } catch(PayPal\Exception\PayPalConnectionException $exception){
                return $exception->getData();
            }
        }
    }

    private function getApiContext()
    {
        $context = new PayPal\Rest\ApiContext(
            new PayPal\Auth\OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'),
                env('PAYPAL_CLIENT_SECRET')
            )
        );
        return $context;
    }

    private function sendNotification($notification)
    {
        event(new \App\Events\OrderNotification($notification));
    }
}
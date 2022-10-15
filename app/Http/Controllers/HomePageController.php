<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\City;
use App\Models\Postcode;
use Illuminate\Support\Facades\Validator;
use App\Cart;
use App\CheckoutTool;
use App\Models\TimeSlots;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;

class HomePageController extends Controller
{
    // Return Homepage
    public function indexPage()
    {
        return view('main.index');
    }

    //Return Store Page
    public function storePage()
    {
        $categories = Category::orderBy('sort_number','asc')->get();

        $products = null;
        $categoryName = null;

        if($default_Category = Category::where('default_Category',1)->first())
        {
            $category_id = $default_Category->id;
            $categoryName = $default_Category->name;

            $products = Product::orderBy('id','desc')->where('category_id', $category_id)->limit(8)->get();

        };

        $lastOrder = Order::max("id");
        $lastOrderItems = OrderItem::where("orderId",$lastOrder)
        ->select("id","productId","unitPrice")
        ->with("product:id,img,name")
        ->get();


        return view('main.store')->with(compact('categories','products','categoryName','category_id','lastOrderItems'));

    }

    public function storeCategory(Request $req)
    {
        /* $categories = Category::orderBy('sort_number','asc')->get();

        if($default_Category = Category::find($categoryId))
        {
            $categoryName = $default_Category->name;

            $products = Product::orderBy('id','desc')->where('category_id', $categoryId)->get();

        return view('main.store')->with(compact('categories','products','categoryName'));
    }
        else{
            session()->flash('error', 'Save failed.');
            return redirect()->back();
            } */

            if($req->ajax())
            {
                $categoryId = $req->categoryId;
                
                $newLastProductId = 0;

                $products = Product::orderBy('id','desc')->where('category_id', $categoryId)->limit(8)->get();

                $html = view('main.components.productCategoryTabs',compact('products'))->render();

                foreach($products as $product){

                    $newLastProductId = $product->id;
                }

                return ["html" => $html,"lastProductId" => $newLastProductId];
            }
    }

    public function checkout()
    {
        if(\App\Models\Settings::openOrCloseOnlineStore() == false || \App\Cart::isCartEmpty() == true)
        {
            return redirect()->route('store');
        }
        else{
            $cities = City::orderBy('name')->get();
            return view('main.checkout', compact('cities'));
        }
    }

    public function parsePostcode(Request $req)
    {
        if($req->ajax())
        {
            City::findOrFail($req->cityId);
            $datasets = Postcode::orderBy('postcode')->where('city_id',$req->cityId)->get();
            $html = "";
            foreach($datasets as $data)
            {
                $html.= '<option value="'.$data->postcode.'">'.$data->postcode.' - '.$data->area.'</option>';
            }
            return $html;
        }
    }

    public function validateCheckout(Request $req)
    {
        if($req->ajax())
        {
            /* Global Variables */
                $status = "OK"; /* Status: "OK","FAIL","EMPTY_CART","POSTCODE_ERROR" */
                $min_amount = CheckoutTool::minOrderAmount($req->postCode);
            /* Global Variables */
            $validate = Validator::make($req->all(),
            [
                "firstName" => "required",
                "lastName" => "required",
                "cityId" => "required | numeric",
                "cityName" => "required",
                "streetAddress" => "required",
                "deliveryType" => "required",
                "orderType" => "required | in:asap,preorder",
                "deliveryTime" => "required_if:orderType,preorder",
                "deliveryDate" => "required_if:orderType,preorder",
                "postCode" => "required | numeric",
                "phone" => "required",
                "email" => "required | email",
                "paymentMethod" => "required | in:card,cash,paypal"
            ]);

            if(Cart::isCartEmpty())
            {
                $status = "EMPTY_CART";
            }
            if($validate->fails())
            {
                $status = "FAIL";
            }
            if(!\App\Models\Postcode::where('postcode',$req->postCode)->first())
            {
                $status = "POSTCODE_ERROR";
            }

            return json_encode(array(
                "status"=> $status,
                "orderAmount"=> $min_amount,
                "paymentType"=> $req->paymentMethod,
                "grandTotal"=> Cart::totalPrice()
            ));
            // if($validate->fails())
            // {
            //     return $validate->errors();
            // }

        }
    }

    // Return Thankyou Page
    public function thankyouPage($orderId)
    {
        $orderData = Order::findOrFail($orderId);
        return view('main.thankyou')->with(compact('orderData'));
    }

    public function paypalVerify($status, Request $req)
    {
        if($req->has('token'))
        {
            $paymentId= $req->paymentId;
            $paypalUserId= $req->PayerID;
            return view('main.components.paypal')->with(compact('status','paymentId','paypalUserId'));
        }
        else
        {
            abort(404);
        }
    }

    public function timeSlots(Request $req)
    {
        if($req->ajax())
        {
            $date = $req->date;
            $dayoftheweek = Carbon::parse($date)->format('l');
            $current_time = Carbon::parse(Carbon::now()->format('H:i:s'));
            $timeSlots = TimeSlots::where('dayoftheweek',$dayoftheweek)->where('time','>',$current_time)->orderBy('time','asc')->get();

            $html = "";
            foreach($timeSlots as $slot)
            {
                $slot_status = null;

                if(count(Order::where('status','not like','Completed')->where('deliveryTime',$date." ".$slot->time)->get()) >= 3)
                {
                    $slot_status = "disabled";
                }
                $html.= '<option value="'.$slot->time.'" '.$slot_status.'>'.$slot->time.'</option>';
            }
            return $html;
        }
        else{
            abort(404);
        }
    }

    /* Tracking Order */
    public function trackingOrder()
    {
        return view('main.tracking-form');
    }

    /* Tracking Order Form */
    public function trackingOrderForm(Request $req)
    {
        $status = null;
        $error_msg = null;

        /* get the values */
        $email = $req->userEmail;
        $orderId = $req->orderId;

        /* if data is valid or not */
        if($data = Order::find($orderId))
        {
            if($data->email == $email)
            {
                $status = "OK";
                return view('main.order-tracking',compact('data'));

            }else{
                $status = "Fail";
                $error_msg = "Looks like wrong email";
                session()->flash('error', $error_msg);
                return redirect()->back();
            }
        }else{
            $status = "Fail";
            $error_msg = "We coulnd't find your Order";
            session()->flash('error', $error_msg);
            return redirect()->back();
        }
    }

    // Load more products function
    public function loadMoreProducts(Request $req){

        $ctg = $req->ctg;
        $lastProductId = $req->lastProductId;
        $countProduct = 0; //This will tell us how many product has been loaded

        $newLastProductId = $lastProductId;

        // Load 8 products
        $products = Product::orderBy('id','desc')->where('category_id', $ctg)->where("id","<",$lastProductId)->limit(8)->get();
        // 

        $html = view('main.components.productCategoryTabs',compact('products'))->render();

        foreach($products as $product){

            $newLastProductId = $product->id;
        }
        $countProduct = count($products); //Count the number of products that has been loaded

        return ["status" => "OK","html" => $html, "lastProductId" => $newLastProductId, "productCount" => $countProduct];
    }

    // Switch Site Language
    public function switchLanguage($code){

        //validate language code
        $list = array("en","fr","de","it");

        if(in_array($code,$list))
        {
            if($code != "de")
            {
                session()->put("language",$code);
            }
            else
            {
                session()->forget("language");
            }
            return redirect()->back();
        }
        else{
            abort(404);
        }
    }
}

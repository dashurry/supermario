<?php
namespace App;
use App\Models\Postcode;
use App\Cart;

class CheckoutTool
{
    public static function minOrderAmount($postCode)
    {
        $status = null;

        $order_amount = Cart::totalPrice();
        $min_amount = Postcode::where('postcode',$postCode)->first()->min_amount;

        if($order_amount >= $min_amount)
        {
            $status = "OK";
        }
        else
        {
            $status = "FAIL";
        }

        return array(
            "status"=>$status,
            "min_amount"=>$min_amount,
        );
    }
}
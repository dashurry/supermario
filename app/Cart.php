<?php

namespace App;

use Illuminate\Support\Str;

class Cart
{
    /* add Product */
    public static function add($item)
    {
        $cartItemId = Str::random(10);

        $cart = session()->get('cart');

        /* Check for cart emptyness */
        if(!$cart)
        {
            $cart = [$cartItemId=>$item];
            session()->put('cart', $cart);
            return true;
        }
        else{
            $not_match = true;
            /* Check for duplicate */
                /* if true increase quantity */
            foreach($cart as $i => $data)
            {
                if($data['product_id'] == $item['product_id'] && $data['size_id'] == $item['size_id'])
                {
                    $cart[$i]['quantity']++;
                    $cart[$i]['total_price'] =  $cart[$i]['product_price'] * $cart[$i]['quantity'];
                    session()->put('cart', $cart);
                    $not_match = false;
                    return true;
                    break;
                }
            }
            /* If there is not duplicate but a new one... */
            if($not_match = true)
            {
                $cart[$cartItemId] = $item;
                session()->put('cart', $cart);
                    return true;
            }
        }
    }

    /* total items inside cart */
    public static function cartItems()
    {
        $total_item = 0;
        if(session()->has('cart'))
        {
            foreach($cart = session()->get('cart') as $i=>$data )
            {
                $total_item += $cart[$i]['quantity'];
            }
        }
        return $total_item;
    }

   /*  total price */
    public static function totalPrice()
    {
        $total_price = 0;
        if(session()->has('cart'))
        {
            foreach($cart = session()->get('cart') as $i=>$data )
            {
                $total_price += $cart[$i]['total_price'];
            }
        }
        return $total_price;
    }

    /* Cart content */
    public static function cartContent()
    {
        $resp = array();
        if(session()->has('cart'))
        {
            $resp = session()->get('cart');
        }
        return $resp;
    }

    /* Cart item comment */
    public static function updateCartItemNote($cartItemId,$note)
    {
        $cart = session()->get('cart');

        if($cart)
        {
            if(isset($cart[$cartItemId]))
            {
                $cart[$cartItemId]['note'] = $note;
                session()->put('cart',$cart);

                return true;
            }
            else{
                return false;
            }
        }
    }

    /* Cart item quantity */
    public static function updateCartItemQuantity($cartItemId,$quantity)
    {
        $cart = session()->get('cart');

        if($cart)
        {
            if(isset($cart[$cartItemId]))
            {
                $cart[$cartItemId]['quantity'] = $quantity;
                $cart[$cartItemId]['total_price'] = $quantity * $cart[$cartItemId]['product_price'];
                session()->put('cart',$cart);

                return true;
            }
            else{
                return false;
            }
        }
    }

    /* remove item from cart */
    public static function removeItemFromCart($cartItemId)
    {
        $cart = session()->get('cart');

        if($cart)
        {
            if(isset($cart[$cartItemId]))
            {
                unset($cart[$cartItemId]);
                session()->put('cart',$cart);

                if(count(session()->get('cart')) == 0)
                {
                    session()->forget('cart');
                }
                return true;
            }
            else{
                return false;
            }
        }
    }

    /* disable checkout if cart is empty */
    public static function isCartEmpty()
    {
        if(session()->has('cart'))
        {
            if(count(session()->get('cart')) > 0)
            {
                return false;
            }
            else{
                return true;
            }
        }
        else {
            return true;
        }
    }

    public static function eraseCart()
    {
        if(session()->has('cart'))
        {
            session()->forget('cart');
        }
    }
}   
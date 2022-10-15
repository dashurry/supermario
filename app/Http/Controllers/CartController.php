<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PriceSection;
use App\Cart;

class CartController extends Controller
{
    
    public function addToCart(Request $req)
    {
        if($req->ajax())
        {
            $product_id = $req->product_id;
            $size_id = $req->size_id;
            $size_name = $req->size_name;

            $product_price = 0;

            $product = Product::findOrFail($product_id);

            if($size_id != "")
            {
                $size = PriceSection::findOrFail($size_id);
                $product_price = $size->product_price;
            }
            else{
                $product_price = $product->product_price;
            }
            $item = [
                "product_id" => $product_id,
                "product_name" => $product->name,
                "product_image" => $product->img,
                "product_price" =>  $product_price,
                "quantity" => 1,
                "total_price" => $product_price,
                "size_id" => $size_id,
                "size_name" => $size_name,
                "note" => ""
                
            ];
            if(Cart::add($item))
            {
                return 0;
            }
            else{
                return 1;
            }
        }
    }


    public function refreshCart(Request $req)
    {
        if($req->ajax())
        {
            $response = view('main.components.cartItems')->render();
            $total_item = Cart::cartItems();
            $total_price = Cart::totalPrice();

            return json_encode(array(
                "response" => $response,
                "total_item" => $total_item,
                "total_price" => $total_price
            ));
        } 
    }

    /* Anmerkung */
    public function updateCartItemNote(Request $req)
    {
        if($req->ajax())
        {
            if(Cart::updateCartItemNote($req->cartItemId,$req->note))
            {
                return 0; /* success */
            }
            else{
                return 1; /* failed */
            }
        }
    }
    /* Quantity */
    public function updateCartItemQuantity(Request $req)
    {
        if($req->ajax())
        {
            if(Cart::updateCartItemQuantity($req->cartItemId,$req->quantity))
            {
                return 0; /* success */
            }
            else{
                return 1; /* failed */
            }
        }
    }

    /* remove item from cart */
    public function removeItemFromCart(Request $req)
    {
        if($req->ajax())
        {
            if(Cart::removeItemFromCart($req->cartItemId))
            {
                return 0; /* success */
            }
            else{
                return 1; /* failed */
            }
        }
    }
}

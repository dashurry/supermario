<?php

namespace App\Models;

use Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\PriceSection;
use App\Models\Like;

class Product extends Model
{
    use HasFactory;

    public function CategoryName($category_id)
    {
        $data = Category::find($category_id);
        return $data->name;
    }

    public function PriceSection($product_id)
    {
        $data = PriceSection::where('product_id',$product_id)->get();
        return $data;
    }

    public function firstReturningMultipleProductPrice($product_id)
    {
        $data = PriceSection::where('product_id',$product_id)->first();
        return $data;
    }

    public function likeCount($product_id)
    {
        return count(Like::where('product_id',$product_id)->get());
    }

    public function liked($product_id)
    {
        $ip = Request::ip();
        if(count(Like::where('product_id',$product_id)->where('user_ip',$ip)->get()) > 0)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public static function getProductName($product_id)
    {
        $productName = "";
        if($data = Product::find($product_id))
        {
            $productName = $data->name;
        }
        return $productName;
    }

    public static function getProductImg($id)
    {
         $data = Product::find($id);
         return $data->img;
    }
}

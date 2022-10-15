<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;

    public function getProductName($productId)
    {
        $name = Product::find($productId)->name;
        return $name;
    }

    public function getProductImage($productId)
    {
        $img = Product::find($productId)->img;
        $url = asset("uploads/product/$img");
        return $url;
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'productId');
    }
}

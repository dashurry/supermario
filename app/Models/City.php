<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function getPostcode($city_id)
    {
        return \App\Models\Postcode::where('city_id',$city_id)->get();
    }
}

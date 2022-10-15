<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    use HasFactory;

    public static function getPostArea($postCode)
    {
        $resp = "";
        if($data = \App\Models\Postcode::where('postcode',$postCode)->first())
        {
            $resp = $data->area;
        }
        return $resp;
    }
}

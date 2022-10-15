<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /* Store open for purchase or not */
    public static function openOrCloseOnlineStore()
    {
        if(Settings::find(1)->online_purchase == 1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    /* Store open / close */
    public static function openCloseStore()
    {
        if(Settings::find(1)->opening == 1)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
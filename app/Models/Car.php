<?php

namespace App\Models;
use App\Deliveryman;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    /* get delivery guy name to assign car */
    public function getDeliveryguyName($id)
    {
        return Deliveryman::find($id)->name;
    }
}

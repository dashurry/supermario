<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlots;

class TimeSlotsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    public function createTime(Request $req)
    {
        $this->validate($req, 
            [
                "time" => "required",
                "dayoftheweek" => "required"
            ]
        );
        $time = new TimeSlots();

        $time->time = $req->time;
        $time->dayoftheweek = $req->dayoftheweek;
        if($time->save()){
            session()->flash('success','New Time slot has been created');
            return redirect()->back();
        }
        else{
            session()->flash('error','Failed to create a new Time slot');
            return redirect()->back();
        }
    }
}

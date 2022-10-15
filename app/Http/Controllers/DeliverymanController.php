<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliveryman;
use Illuminate\Support\Facades\Mail;

class DeliverymanController extends Controller
{
    //Checking if logged in
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    /* Register New Delivery Personel */
    public function register(Request $req)
    {
        $this->validate($req,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:deliverymen',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required',
            'profileImg' => 'mimes:png,jpg,jpeg',
        ]);

        $newReg = new Deliveryman();
        $newReg->name = $req->name;
        $newReg->email = $req->email;
        $newReg->password = bcrypt($req->password);
        $newReg->phone = $req->phone;

        if($req->hasFile('profileImg'))
        {
            $file = $req->file('profileImg');
            $newName = $req->name."_".rand().".".$file->getClientOriginalExtension();
            $file->move(public_path('uploads/deliveryman/'),$newName);
            $newReg->profileImg = $newName;
        }
        if($newReg->save())
        {
            $data = array(
                "name" => $req->name,
                "email" => $req->email,
                "password" => $req->password,
            );

            Mail::to($req->email)->send(new \App\Mail\DeliverymanLoginInfo($data));
            session()->flash('success','New Delivery Personel has been registered');
            return redirect()->back();
        }
        else{
            session()->flash('error','Failed to register');
            return redirect()->back();
        }
    }
}

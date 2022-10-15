<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class HomeController extends Controller
{

    protected $redirectTo = '/deliveryman/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('deliveryman.auth:deliveryman');
    }

    /**
     * Show the Deliveryman dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('deliveryman.home');
    }

    /* update deliveryman profile */
    public function updateProfile(Request $req) {
        $this->validate($req,[

            "fullname" => "required",
            "user_email" => "required",
            "phone" => "required | numeric",
            "profileImgFile" => "mimes:jpeg,jpg,png,svg,webp",
        ]);

        $userInfo = \App\Deliveryman::find(auth('deliveryman')->user()->id);
        $userInfo->name = $req->fullname;
        $userInfo->email = $req->user_email;
        $userInfo->phone = $req->phone;

        /* Check if user is changing profile Image */
        if($req->hasFile('profileImgFile'))
        {
            $file = $req->file('profileImgFile');
            $new_file_name = rand()."_".time().".".$file->getClientOriginalExtension();

            if($userInfo->profileImg != '')
            {
                if(file_exists(public_path('/uploads/deliveryman/'.$userInfo->profileImg)))
                {
                    unlink(public_path('/uploads/deliveryman/'.$userInfo->profileImg));
                }
            }
            $file->move(public_path('uploads/deliveryman/'),$new_file_name);
            $userInfo->profileImg = $new_file_name;
        }
        if($userInfo->save())
        {
            session()->flash('success', 'Profile updated');
            return redirect()->back();
        }
        else{
            session()->flash('error', 'Update failed. Try again.');
            return redirect()->back();
        }
    }
    public function myOrder()
    {
        $userId = auth('deliveryman')->user()->id;
        $orders = Order::where('delivery_man_id',$userId)->where('status','Shipped')->get();
        return view('deliveryman.myOrder')->with(compact('orders'));
    }
    public function completeOrder($orderId)
    {
        $userId = auth('deliveryman')->user()->id;
        $orderData = Order::findOrFail($orderId);

        if($orderData->delivery_man_id == $userId)
        {
            $orderData->status = "Completed";
            $orderData->save();
            session()->flash('success', 'This order has been marked as completed');
            return redirect()->route('deliveryman.myOrder');
        }
    }
}
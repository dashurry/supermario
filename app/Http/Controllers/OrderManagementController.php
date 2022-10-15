<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class OrderManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    public function increaseTime(Request $req)
    {
        $this->validate($req,[
            "increaseTime" => "required | numeric",
            "orderId" => "required | numeric"
        ]);

        $data = Order::find($req->orderId);
        $oldTime = Carbon::parse($data->arrivalTime)->addMinutes($req->increaseTime);

        $data->arrivalTime = $oldTime->format('Y-m-d H:i:s');
        if($data->save()){
            session()->flash('success', 'Delivery Time updated.');
            return redirect()->back();
        }
        else{
            session()->flash('error', 'Internal Server error.');
            return redirect()->back();
        }
    }

    public function cancelOrder($orderId)
    {
        if($data = Order::find($orderId))
        {
            if($data->status == 'pending')
            {
                $data->status == 'Canceled';
                $data->save();

                session()->flash('success', 'Order has been canceled');
                return redirect()->route('admin.newOrder','asap');
            }  
        }
    }

    public function processOrder($orderId)
    {
        if($data = Order::find($orderId))
        {
            if($data->status == 'pending')
            {
                $data->status = 'processing';
                $data->save();

                session()->flash('success', 'Order set to Processing');
                return redirect()->route('admin.newOrder','asap');
            }  
        }
    }

    public function shipOrder(Request $req)
    {
        $this->validate($req,[
            "orderId" => "required | numeric | exists:orders,id",
            "deliveryMan" => "required | numeric | exists:deliverymen,id"
        ]);

        if(Order::find($req->orderId)->status == "processing")
        {
            $data = Order::find($req->orderId);
            $data->status = 'shipped';
            $data->delivery_man_id = $req->deliveryMan;
            $data->delivery_man_assign_time = Carbon::now();
            $data->save();

            $itemsLists = $data->listOrderItems($data->id);

            $notification_data = array(
                "info" => $data,
                "items" => $itemsLists,
                "arrival_time" => Carbon::parse($data->arrivalTime)->format('H:i'),
            );
            broadcast(new \App\Events\OrderAssignmentEvent($req->deliveryMan,$notification_data));

            session()->flash('success', 'Order has been shipped');
            return redirect()->route('admin.processingOrderPage');
        }
        else
        {
            session()->flash('error', 'Internal Server error.');
            return redirect()->back();
        }
    }

    public function forceCompleteOrder($id)
    {
        if($data = Order::find($id))
        {
            if($data->status == 'shipped')
            {
                $data->status = 'completed';
                $data->save();
                session()->flash('success', 'Order has been completed');
                return redirect()->back();
            }
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    /* count Pending Orders */
    public static function countPendingOrders()
    {
        $data = Order::where('status','pending')->get();
        return count($data);
    }

    public static function totalUnseenOrder()
    {
        $data = Order::where('status','pending')->where('seenByAdmin', 0)->orderBy('id','desc');
        return $data;
    }

    public static function countTotalOrderItems($orderid)
    {
        // Get All Items
        $data = OrderItem::where('orderId',$orderid)->get();

        // Count the quantity fo each items
        $totalCount = 0;

        foreach($data as $item)
        {
            $totalCount += $item->quantity;
        }

        return $totalCount;
    }

    /* count Processing Orders */
    public static function countProcessingOrder()
    {
        $data = Order::where('status','processing')->get();
        return count($data);
    }

    /* count Shipped Orders */
    public static function countShippedOrder()
    {
        $data = Order::where('status','shipped')->get();
        return count($data);
    }

    /* count ASAP Orders */
    public static function countTodaysAsapOrder()
    {
        $data =  Order::where('status','pending')->where("orderType",'asap')->orderBy('id','asc')->whereDate('deliveryTime','=',Carbon::now())->get();
        return count($data);
    }
    
    /* count Preorders */
    public static function countTodaysPreOrder()
    {
        $data =  Order::where('status','pending')->where("orderType",'preorder')->orderBy('id','asc')->whereDate('deliveryTime','=',Carbon::now())->get();
        return count($data);
    }
    /* count All Preorders */
    public static function countAllPreOrder()
    {
        $data =  Order::where('status','pending')->where("orderType",'preorder')->orderBy('id','asc')->get();
        return count($data);
    }
    /* get delivery man name to display on table row */
    public static function getDeliveryManName($delivery_man_id)
    {
        return \App\Deliveryman::find($delivery_man_id)->name;
    }
    /* get order queue */
    public static function getQueueNumber($id,$deliveryDate)
    {
        $deliveryDate = Carbon::parse($deliveryDate);
        $queue = Order::where('status','pending')->where('id','<=',$id)->whereDate('deliveryTime',$deliveryDate)->get();
        return count($queue);
    }
    public static function listOrderItems($id)
    {
        $lists = \App\Models\OrderItem::where('orderId',$id)->with("product:id,name")->get();
        return $lists;
    }
}

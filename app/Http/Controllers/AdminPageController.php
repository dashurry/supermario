<?php

namespace App\Http\Controllers;

use App\Deliveryman;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Car;
use Carbon\Carbon;
use PDORow;


class AdminPageController extends Controller
{
    //Checking if logged in
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    //Return Admin Page
    public function indexPage()
    {
        return view('admin.dashboard');
    }
    //Return Category Page
    public function createCategory()
    {
        return view('admin.pages.category');
    }
    //Return CategoryList Page
    public function categoryList()
    {
        $datas = Category::orderBy('sort_number','asc')->get();
        return view('admin.pages.list',compact('datas'));
    }
    //Return Product Page
    public function createProduct()
    {
        $categories = Category::orderBy('sort_number','asc')->get();
        return view('admin.pages.product',compact('categories'));
    }
    //Return ProductList Page
    public function productList()
    {
        $products = Product::orderBy('id','desc')->paginate(20);
        return view('admin.pages.productList',compact('products'));
    }
    //Return editProduct Page
    public function editProduct($product_id)
    {
        if($data = Product::find($product_id))
        {
            $categories = Category::orderBy('sort_number','asc')->get();
            return view('admin.pages.editProduct',with(compact('data','categories')));
        }
        else
        {
            abort(404);
        }
    }

    // Return Setting Page
    public function setting()
    {
        $status = \App\Models\Settings::find(1);
        return view('admin.pages.setting',compact('status'));
    }

    // Return Delivery Area Page
    public function deliveryArea()
    {
        $cities = City::orderBy('name')->get();
        return view('admin.pages.deliveryArea',compact('cities'));
    }

    /* New Orders */
    public function newOrder($type)
    {
        $pending_orders = null;
        if($type == "asap")
        {
            $pending_orders = Order::where('status','pending')->where("orderType",$type)->whereDate("deliveryTime","=",Carbon::now())->orderBy('id','asc')->paginate(10);
        }
        elseif($type = "preorder")
        {
            $pending_orders = Order::where('status','pending')->where("orderType",$type)->whereDate("deliveryTime","=",Carbon::now())->orderBy('id','asc')->paginate(10);
        }
        elseif($type = "all-preorder")
        {
            $pending_orders = Order::where('status','pending')->where("orderType",'preorder')->orderBy('id','asc')->paginate(10);
        }
        
        return view('admin.pages.new-order')->with(compact('pending_orders','type'));
    }

    /* Order details */
    public function orderDetails($orderId)
    {
        if($orderDetails = Order::find($orderId))
        {
            if($orderDetails->seenByAdmin == 0)
            {
                $orderDetails->seenByAdmin = 1;
                $orderDetails->save();
            }
            $orderItems = OrderItem::where('orderId',$orderId)->get();
            return view('admin.pages.order-details')->with(compact('orderDetails','orderItems'));
        }
        else
        {
            abort(404);
        }
    }

    /* Delivery Personel Page */
    public function deliverymanRegisterPage()
    {
        return view('admin.pages.deliverymanRegister');
    }

    public function timeRange()
    {
        return view('admin.pages.timeRange');
    }

    /* Processing Orders */
    public function processingOrderPage()
    {
        $processing_orders = Order::where('status','processing')->whereDate("deliveryTime","=",Carbon::now())->orderBy('id','asc')->paginate(10);
        
        return view('admin.pages.order-processing')->with(compact('processing_orders'));
    }

    /* Shipping Orders */
    public function shippingOrderPage()
    {
        $shipping_orders = Order::where('status','shipped')->whereDate("deliveryTime","=",Carbon::now())->orderBy('id','asc')->paginate(10);
        
        return view('admin.pages.order-shipping')->with(compact('shipping_orders'));
    }

    /* update order times live */
    public function timeUpdate(Request $req)
    {
        if($req->ajax())
        {
            return Carbon::parse($req->date)->diffForHumans();
        }
    }

    /* display all delivery personel */
    public function listDeliveryman()
    {
        $deliveryman = Deliveryman::latest()->get();
        return view('admin.pages.deliverymanList')->with(compact('deliveryman'));
    }
    /* Deliveryman Stats */
    public function DeliverymanStats(Request $req)
    {
        $deliveryman = $req->deliverymanid;
        $deliverymanData = Deliveryman::findOrFail($deliveryman);
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $stats = Order::where('delivery_man_id',$deliveryman)->whereYear('delivery_man_assign_time',$year)->whereMonth('delivery_man_assign_time',$month)->paginate(40);
        return view('admin.pages.deliverymanStats')->with(compact('stats','deliverymanData'));
    }
    /* filter deliveryman stats */
    public function filterStats(Request $req)
    {
        $this->validate($req,[
            "deliveryman" => "required|exists:deliveryman,id",
            "year" => "required|numeric",
        ]);
        $deliverymanData = Deliveryman::findOrFail($req->deliveryman);
        $stats = null;
        
        if($req->month == "")
        {
            $stats = Order::where('delivery_man_id',$req->deliveryman)->whereYear('delivery_man_assign_time',$req->year)->paginate(40);
            /* $stats->whereMonth('delivery_man_assign_time',$req->month); */
        }
        else
        {
            $stats = Order::where('delivery_man_id',$req->deliveryman)->whereYear('delivery_man_assign_time',$req->year)->whereMonth('delivery_man_assign_time',$req->month)->paginate(40); 
        }
        $stats->paginate(40);
        $data = array(
            "year" => $req->year,
            "month" => $req->month
        );
        return view('admin.pages.deliverymanFilteredStats')->with(compact('data','deliverymanData','stats'));
    }
    /* Car creation function */
    public function carPage()
    {
        return view('admin.pages.carPage');
    }
    /* Car list function */
    public function carList()
    {
        $cars = Car::latest()->get();
        return view('admin.pages.listCars')->with(compact('cars'));
    }

    public function editCar($carId)
    {
        $carData = Car::findOrFail($carId);
        return view('admin.pages.editCar')->with(compact('carData'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    //Checking if logged in
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    /* Create new car function */
    public function createCar(Request $req)
    {
        $this->validate($req,[
            "carName" => "required",
            "carNumber" => "required|unique:cars,car_number"
        ],[
            "carName.required" => "Insert the car name",
            "carNumber.required" => "Insert the car plate number",
            "carNumber.unique" => "This car plate number is already registered"
        ]);

        $car = new Car();
        $car->car_name = $req->carName;
        $car->car_number = $req->carNumber;
        $car->save();
        session()->flash('success','New car created');
        return redirect()->back();
    }
    /* assign car to delivery guy function */
    public function assignCar(Request $req)
    {
        $this->validate($req,[
            "car" => "numeric|exists:cars,id",
            "deliveryman" => "numeric|exists:deliverymen,id"
        ]);
        $carData = Car::find($req->car);
        $carData->assigned_to = $req->deliveryman;
        $carData->save();
        session()->flash('success','Car assigned succesfully');
        return redirect()->back();
    }
    /* update car information after edit */
    public function updateCar(Request $req)
    {
        $this->validate($req,[
            "carId" => "required|exists:cars,id",
            "carNumber" => "required|unique:cars,car_number,$req->carId,id",
            "carName" => "required"
        ]);
        $carData = Car::find($req->carId);
        $carData->car_name = $req->carName;
        $carData->car_number = $req->carNumber;
        $carData->save();
        session()->flash('success','Car updated succesfully');
        return redirect()->route("admin.carList");
    }
    /* delete car from database */
    public function deleteCar(Request $req)
    {
        $carId = $req->carId;

        $carData = Car::findOrFail($carId);
        $carData->delete();
        session()->flash('success','Car deleted succesfully');
        return redirect()->route("admin.carList");
    }
    public function unassignCar(Request $req)
    {
        $carId = $req->carId;

        $carData = Car::findOrFail($carId);
        $carData->assigned_to = null;
        $carData->save();
        session()->flash('success','Car unassigned succesfully');
        return redirect()->route("admin.carList");
    }
}

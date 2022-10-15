<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Postcode;

class DeliveryAreaController extends Controller
{
    //Checking if logged in
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    public function createCity(Request $req)
    {
        $this->validate($req,[
            "cityName" => "required | unique:cities,name"
        ]);
        $city = new City();

        $city->name = $req->cityName;
        if($city->save()){
            session()->flash('success','New City has been created');
            return redirect()->back();
        }
        else{
            session()->flash('error','Failed');
            return redirect()->back();
        }
    }

    public function createPostcode(Request $req)
    {
        $this->validate($req,[
            "areaName" => "required",
            "postCode" => "required | unique:postcodes,postcode",
            "minPurchaseAmount" => "required",
            "cityId" => "required"
        ]);
        $postcode = new Postcode();

        $postcode->area = $req->areaName;
        $postcode->postcode =  $req->postCode;
        $postcode->city_id = $req->cityId;
        $postcode->min_amount = $req->minPurchaseAmount;

        if($postcode->save()){
            session()->flash('success','New Postcode has been created');
            return redirect()->back();
        }
        else{
            session()->flash('error','Failed');
            return redirect()->back();
        }
    }

    public function editCity(Request $req)
    {
        if($req->ajax())
        {
            $data = City::findOrFail($req->cityId);
            $data->name = $req->cityName;
            if($data->save())
            {
                return 0;
            }
            else{
                return 1;
            }
        }
    }

    public function deleteCity($cityId)
    {
        $data = City::findOrFail($cityId);

        if($data->delete()){
            session()->flash('success','City deleted');
            return redirect()->back();
        }
        else{
            session()->flash('error','Failed to delete');
            return redirect()->back();
        }
    }

    public function editPostcode(Request $req)
    {
        if($req->ajax())
        {
            $data = Postcode::findOrFail($req->postCodeId);

            $data->city_id = $req->cityId;
            $data->area = $req->areaName;
            $data->postcode = $req->postCode;
            $data->min_amount = $req->minPurchaseAmount;

            if($data->save())
            {
                return 0;
            }
            else{
                return 1;
            }
        }
    }

    public function deletePostcode($postCodeId)
    {
        $data = Postcode::findOrFail($postCodeId);

        if($data->delete()){
            session()->flash('success','Postcode deleted');
            return redirect()->back();
        }
        else{
            session()->flash('error','Failed to delete');
            return redirect()->back();
        }
    }
}

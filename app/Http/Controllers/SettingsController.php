<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    //Checking if logged in
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }

    public function toggleStore(Request $req)
    {
        $data = Settings::find(1);
        if($req->has('status'))
        {
            $status = null;

            if($req->status == "on")
            {
                $status = 1;
            }
            else{
                $status = 0;
            }

            
            $code = null;
            $data->online_purchase = $status;
            if($data->save())
            {
                $code = 0;
            }
            else{
                $code = 1;
            }
            return json_encode(array(
                "code" => $code,
                "status" => $status
            ));
        }
        elseif($req->has('statusStore'))
        {
            $statusStore = null;

            if($req->statusStore == "on")
            {
                $statusStore = 1;
            }
            else{
                $statusStore = 0;
            }

            
            $code = null;
            $data->opening = $statusStore;
            if($data->save())
            {
                $code = 0;
            }
            else{
                $code = 1;
            }
            return json_encode(array(
                "code" => $code,
                "status" => $statusStore
            ));
        }
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShipArea;
use App\Models\ShipDistrict;
use App\Models\ShipState;

class CheckoutController extends Controller
{

    public function GetDistrictAjax($area_id){

      $ship = ShipDistrict::where('area_id',$area_id)->orderBy('district_name','ASC')->get();
      return json_encode($ship);

    }

    public function GetStateAjax($district_id){

    	$ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
    	return json_encode($ship);

    }

    public function StoreCheckout(Request $request){

    }

}

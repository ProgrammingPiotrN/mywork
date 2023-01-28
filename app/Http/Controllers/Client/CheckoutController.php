<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShipArea;
use App\Models\ShipDistrict;
use App\Models\ShipState;

use Gloudemans\Shoppingcart\Facades\Cart;

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
      // dd($request->all());
      $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['area_id'] = $request->area_id;
    	$data['district_id'] = $request->district_id;
    	$data['state_id'] = $request->state_id;
    	$data['notes'] = $request->notes;
		$totalCart = Cart::total();


    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('data', 'totalCart'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return view('frontend.payment.cash',compact('data','totalCart'));
			;
    	}

    }

}

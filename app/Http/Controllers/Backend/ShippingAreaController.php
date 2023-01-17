<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipArea;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function ViewArea(){
		$areas = ShipArea::orderBy('id','DESC')->get();
		return view('backend.ship.area.view_area',compact('areas'));

	}

    public function StoreArea(Request $request){

    	$request->validate([
    		'area_name' => 'required',   	 

    	]);


        ShipArea::insert([

            'area_name' => $request->area_name,
            'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Ship area Inserted Successfully / Dodano wysyłkę',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

    }
}

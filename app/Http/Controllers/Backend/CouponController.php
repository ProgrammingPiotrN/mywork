<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{   
    public function Coupon(){
      
      $coupons = Coupon::orderBy('id','DESC')->get();
    	return view('backend.coupon.view_coupon',compact('coupons'));

    }

    public function StoreCoupon(Request $request){

    	$request->validate([
    		'name_coupon' => 'required',
    		'discount_coupon' => 'required',
    		'validity_coupon' => 'required',

    	]);

      Coupon::insert([
        'name_coupon' => strtoupper($request->name_coupon),
        'discount_coupon' => $request->discount_coupon, 
        'validity_coupon' => $request->validity_coupon,
        'created_at' => Carbon::now(),

          ]);

	    $notification = array(
			'message' => 'Coupon Inserted Successfully / Dodano kupon',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    }

    public function EditCoupon($id){
      
      $coupons = Coupon::findOrFail($id);
      return view('backend.coupon.edit_coupon',compact('coupons'));

    }

    public function UpdateCoupon(Request $request, $id){

      Coupon::findOrFail($id)->update([

        'name_coupon' => strtoupper($request->name_coupon),
        'discount_coupon' => $request->discount_coupon, 
        'validity_coupon' => $request->validity_coupon,
        'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Coupon Updated Successfully / Zaktualizowano kupon',
			'alert-type' => 'info'
		);

		return redirect()->route('coupon.view')->with($notification);

    }

    public function DeleteCoupon($id){

    	Coupon::findOrFail($id)->delete();
    	$notification = array(
			'message' => 'Coupon Deleted Successfully / Usunięto kupon',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }
    
}

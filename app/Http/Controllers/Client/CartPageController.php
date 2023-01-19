<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
   
    public function CartPageView(){

        return view('frontend.my_cart.mycart_view');

    }

    public function CartPageAjax(){

        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => round($cartTotal),

    	));

    }

    public function CartRemoveAjax($rowId){

      Cart::remove($rowId);

      if (Session::has('coupon')) {
        Session::forget('coupon');
      }

      return response()->json(['success' => 'Successfully Remove From Cart / Usunięto produkt z koszyka']);

  }

    public function CartInc($rowId){
      $row = Cart::get($rowId);
      Cart::update($rowId, $row->qty + 1);

      if (Session::has('coupon')) {

        $coupon_name = Session::get('coupon')['name_coupon'];
        $coupon = Coupon::where('name_coupon',$coupon_name)->first();

        Session::put('coupon',[
          'name_coupon' => $coupon->name_coupon,
          'discount_coupon' => $coupon->discount_coupon,
          'discount_amount' => round(Cart::total() * $coupon->discount_coupon/100), 
          'total_amount' => round(Cart::total() - Cart::total() * $coupon->discount_coupon/100) 
        ]);
    }

      return response()->json('increment / powiększono');

  }

    public function CartDec($rowId){

      $row = Cart::get($rowId);
      Cart::update($rowId, $row->qty - 1);

      
      if (Session::has('coupon')) {

        $coupon_name = Session::get('coupon')['name_coupon'];
        $coupon = Coupon::where('name_coupon',$coupon_name)->first();

        Session::put('coupon',[
          'name_coupon' => $coupon->name_coupon,
          'discount_coupon' => $coupon->discount_coupon,
          'discount_amount' => round(Cart::total() * $coupon->discount_coupon/100), 
          'total_amount' => round(Cart::total() - Cart::total() * $coupon->discount_coupon/100) 
        ]);
    }

      return response()->json('decrement / zmniejszono');

  }

}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

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
      return response()->json(['success' => 'Successfully Remove From Cart / Usunięto produkt z koszyka']);

  }

    public function CartInc($rowId){
      $row = Cart::get($rowId);
      Cart::update($rowId, $row->qty + 1);

      return response()->json('increment / powiększono');

  }

    public function CartDec($rowId){

      $row = Cart::get($rowId);
      Cart::update($rowId, $row->qty - 1);

      return response()->json('decrement / zmniejszono');

  }

}

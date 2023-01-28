<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon; 

class CashController extends Controller
{
    public function OrderCash(Request $request){


      if (Session::has('coupon')) {
        $total_amount = Session::get('coupon')['total_amount'];
      }else{
        $total_amount = round(Cart::total());
      }



    // dd($charge);

    $order_id = Order::insertGetId([
      'user_id' => Auth::id(),
      'area_id' => $request->area_id,
      'district_id' => $request->district_id,
      'state_id' => $request->state_id,
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'post_code' => $request->post_code,
      'notes' => $request->notes,

      'payment_type' => 'Cash On Delivery',
      'payment_method' => 'Cash On Delivery',

      'currency' =>  'PLN',
      'amount' => $total_amount,


      'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
      'order_date' => Carbon::now()->format('d F Y'),
      'order_month' => Carbon::now()->format('F'),
      'order_year' => Carbon::now()->format('Y'),
      'status' => 'Pending',
      'created_at' => Carbon::now(),	 

    ]);

    $carts = Cart::content();
    foreach ($carts as $cart) {
      OrderItem::insert([
        'order_id' => $order_id, 
        'product_id' => $cart->id,
        'weight' => $cart->options->weight,
        'qty' => $cart->qty,
        'price' => $cart->price,
        'created_at' => Carbon::now(),

      ]);
    }


    if (Session::has('coupon')) {
      Session::forget('coupon');
    }

    Cart::destroy();

    $notification = array(
      'message' => 'Your order place successfully / Twoje zamówienie zostało pomyślnie złożone',
      'alert-type' => 'success'
    );

    return redirect()->route('dashboard')->with($notification);


    }
}

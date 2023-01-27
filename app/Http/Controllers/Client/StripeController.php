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

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    public function OrderStripe(Request $request){

      \Stripe\Stripe::setApiKey('sk_test_51MUboxIRJ8ix16XZzDJ9a4YmMxrhYmwhut1HJ3PfnrPNKcqFImx6sIryuA9gV61RYFkIBz4mfBYf7PizT95NN11K00Yfg09OGw');

      if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}

      $token = $_POST['stripeToken'];
      $charge = \Stripe\Charge::create([
      'amount' => $total_amount*100,
      'currency' => 'PLN',
      'description' => 'Sweet Dream',
      'source' => $token,
      'metadata' => ['order_id' => uniqid()],
        ]);

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
   
          'payment_type' => 'Stripe',
          'payment_method' => 'Stripe',
          'payment_type' => $charge->payment_method,
          'transaction_id' => $charge->balance_transaction,
          'currency' => $charge->currency,
          'amount' => $total_amount,
          'order_number' => $charge->metadata->order_id,
   
          'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
          'order_date' => Carbon::now()->format('d F Y'),
          'order_month' => Carbon::now()->format('F'),
          'order_year' => Carbon::now()->format('Y'),
          'status' => 'Pending',
          'created_at' => Carbon::now(),	 
   
        ]);

          $invoice = Order::findOrFail($order_id);
          $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
              'email' => $invoice->email,
          ];
  
          Mail::to($request->email)->send(new OrderMail($data));

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

        // dd($charge);

    }


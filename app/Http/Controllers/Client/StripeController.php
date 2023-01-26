<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function OrderStripe(Request $request){

      \Stripe\Stripe::setApiKey('sk_test_51MUboxIRJ8ix16XZzDJ9a4YmMxrhYmwhut1HJ3PfnrPNKcqFImx6sIryuA9gV61RYFkIBz4mfBYf7PizT95NN11K00Yfg09OGw');


      $token = $_POST['stripeToken'];
      $charge = \Stripe\Charge::create([
      'amount' => 999*100,
      'currency' => 'PLN',
      'description' => 'Sweet Dream',
      'source' => $token,
      'metadata' => ['order_id' => '6735'],
        ]);

        dd($charge);

    }
}

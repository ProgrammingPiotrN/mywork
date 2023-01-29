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

use Barryvdh\DomPDF\Facade\Pdf;


class AllUserController extends Controller
{
    public function OrderUser(){

      $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
      return view('frontend.client.order.order_view',compact('orders'));

    }

    public function DetailsOrder($order_id){
      
    	$order = Order::with('area','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('frontend.client.order.order_details',compact('order','orderItem'));

    }

    public function Invoice($order_id){

      $order = Order::with('area','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	// return view('frontend.client.order.invoice',compact('order','orderItem'));
      $pdf = PDF::loadView('frontend.client.order.invoice', compact('order','orderItem'));
      return $pdf->download('invoice.pdf');

    }

}

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

    public function ReturnOrder(Request $request, $order_id){

        Order::findOrFail($order_id)->update([
          'return_date' => Carbon::now()->format('d F Y'),
          'return_reason' => $request->return_reason,
          'return_order' => 1,
      ]);


      $notification = array(
            'message' => 'Return request send successfully / Żądanie zwrotu zostało pomyślnie wysłane',
            'alert-type' => 'success'
        );

      return redirect()->route('user.orders')->with($notification);

    }

    public function ReturnOrderList(){

      $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
      return view('frontend.client.order.return_order',compact('orders'));

  }

  public function CancelOrders(){

    $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
    return view('frontend.client.order.cancel_order',compact('orders'));

}

}

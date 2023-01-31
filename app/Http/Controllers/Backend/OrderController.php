<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;

use Auth;
use Carbon\Carbon;


class OrderController extends Controller
{
    public function OrdersPending(){

		$orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('backend.orders.orders_pending',compact('orders'));

	}

  	public function OrdersPendingDetalis($order_id){

      $order = Order::with('area','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	}

	public function OrdersConfirmed(){

		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('backend.orders.orders_confirmed',compact('orders'));

	}

	public function OrdersProcessing(){

		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('backend.orders.orders_processing',compact('orders'));

	}

	public function OrdersPicked(){

		$orders = Order::where('status','picked')->orderBy('id','DESC')->get();
		return view('backend.orders.orders_picked',compact('orders'));

	}

	public function ShippedOrders(){

		$orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
		return view('backend.orders.orders_shipped',compact('orders'));

	}

	public function DeliveredOrders(){

		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('backend.orders.orders_delivered',compact('orders'));

	}

	public function CancelOrders(){

		$orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('backend.orders.orders_cancel',compact('orders'));

	}

	public function PendingConfirm($order_id){

		Order::findOrFail($order_id)->update(['status' => 'confirm']);

		$notification = array(
			  'message' => 'Order confirm successfully / Zamówienie zostało pomyślnie potwierdzone',
			  'alert-type' => 'success'
		  );
  
		  return redirect()->route('pending.orders')->with($notification);

	}

	public function ProcessingConfirm($order_id){

		Order::findOrFail($order_id)->update(['status' => 'processing']);

		$notification = array(
			  'message' => 'Order processing successfully / Przetworzenie zamówienia przebiegło pomyślnie',
			  'alert-type' => 'success'
		  );
  
		  return redirect()->route('confirmed.orders')->with($notification);

	}

	public function ProcessingPicked($order_id){

		Order::findOrFail($order_id)->update(['status' => 'picked']);

		$notification = array(
			  'message' => 'Order picked successfully / Zamówienie zostało spakowane',
			  'alert-type' => 'success'
		  );
  
		  return redirect()->route('processing.orders')->with($notification);

	}

	public function PickedShipped($order_id){

		Order::findOrFail($order_id)->update(['status' => 'shipped']);

		$notification = array(
			  'message' => 'Order shipped successfully / Zamówienie zostało wysłane',
			  'alert-type' => 'success'
		  );
  
		  return redirect()->route('picked.orders')->with($notification);

	}

	public function ShippedDelivered($order_id){

		Order::findOrFail($order_id)->update(['status' => 'delivered']);

		$notification = array(
			  'message' => 'Order delivered successfully / Zamówienie zostało dostarczone',
			  'alert-type' => 'success'
		  );
  
		  return redirect()->route('shipped.orders')->with($notification);

	}

	


}

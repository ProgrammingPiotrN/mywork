<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DateTime;

use App\Models\Order;

class ReportController extends Controller
{
    public function ViewReport(){

        return view('backend.report.view_report');

    }

    public function SearchDate(Request $request){

        // return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        // return $formatDate;
        $orders = Order::where('order_date',$formatDate)->latest()->get();
        return view('backend.report.report_show',compact('orders'));

    }

    public function SearchMonth(Request $request){

        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.report.report_show',compact('orders'));
 
    }

    public function SearchYear(Request $request){

        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.report.report_show',compact('orders'));
 
    }
}

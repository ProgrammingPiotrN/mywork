@extends('frontend.main')
@section('content')

<div class="body-content">
      <div class="container">
          <div class="row">
            <div class="col-md-2"><br>
              @include('frontend.user_menu.user_menu')
              </div>
              <div class="col-md-2">
              </div>
              <hr>
              <div class="col-md-8">
                
               <div class="table-responsive">
                 <table class="table">
                   <tbody>
       
                     <tr style="background: #e2e2e2;">
                       <td class="col-md-1">
                         <h4><label for=""> {{ __('Date') }}</label></h4>
                       </td>
       
                       <td class="col-md-3">
                         <h4><label for=""> {{ __('Total') }}</label></h4>
                       </td>
       
                       <td class="col-md-3">
                         <h4><label for=""> {{ __('Payment') }}</label></h4>
                       </td>
       
       
                       <td class="col-md-2">
                         <h4><label for=""> {{ __('Invoice') }}</label></h4>
                       </td>
       
                        <td class="col-md-2">
                         <h4><label for=""> {{ __('Order') }}</label></h4>
                       </td>
       
                        <td class="col-md-1">
                         <h4><label for=""> {{ __('Action') }} </label></h4>
                       </td>
       
                     </tr>
              
                     @foreach($orders as $order)
              <tr>
                       <td class="col-md-1">
                         <label for=""> {{ $order->order_date }}</label>
                       </td>
       
                       <td class="col-md-3">
                         <label for=""> {{ $order->amount }} PLN</label>
                       </td>
       
       
                        <td class="col-md-3">
                         <label for=""> {{ $order->payment_method }}</label>
                       </td>
       
                       <td class="col-md-2">
                         <label for=""> {{ $order->invoice_no }}</label>
                       </td>
       
                        <td class="col-md-2">
                         <label for=""> 
                           <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
       
                           </label>
                       </td>
       
                <td class="col-md-1">
                 <a href="{{ url('user/order/details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>{{ __('View') }}</a>
       
                  <a  href="{{ url('user/invoice/download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top:5px"><i class="fa fa-download" style="color: white;"></i> {{ __('Invoice') }} </a>
       
               </td>
       
                     </tr>
                     @endforeach      
                   </tbody>       
                 </table>       
               </div>
              </div> 
          </div>
        </div>
    </div>
</div>
@endsection
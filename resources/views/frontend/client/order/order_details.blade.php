@extends('frontend.main')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
      <hr>
      <div class="card">
        <div class="card-header"><h4>{{ __('Shipping details') }}</h4></div>
       <hr>
       <div class="card-body" style="background: #E9EBEC;">
         <table class="table">
        <tr>
          <th> {{ __('Shipping areas name') }} : </th>
           <th> {{ $order->name }} </th>
        </tr>
    
         <tr>
          <th> {{ __('Shipping phone') }} : </th>
           <th> {{ $order->phone }} </th>
        </tr>
    
         <tr>
          <th> {{ __('Shipping email') }} : </th>
           <th> {{ $order->email }} </th>
        </tr>
    
         <tr>
          <th> {{ __('Area') }} : </th>
           <th> {{ $order->area->area_name }} </th>
        </tr>
    
         <tr>
          <th> {{ __('District') }} : </th>
           <th> {{ $order->district->district_name }} </th>
        </tr>
    
         <tr>
          <th> {{ __('State name') }} : </th>
           <th>{{ $order->state->state_name }} </th>
        </tr>
    
        <tr>
          <th> {{ __('Post code') }} : </th>
           <th> {{ $order->post_code }} </th>
        </tr>
    
        <tr>
          <th> {{ __('Order date') }} : </th>
           <th> {{ $order->order_date }} </th>
        </tr>
    
         </table>
    
    
       </div> 
       <div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>{{ __('Order details') }}
        <span class="text-danger"> {{ __('Invoice') }} : {{ $order->invoice_no }}</span></h4>
          </div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>  {{ __('Name') }} : </th>
               <th> {{ $order->user->name }} </th>
            </tr>
      
             <tr>
              <th>  {{ __('Phone') }} : </th>
               <th> {{ $order->user->phone }} </th>
            </tr>
      
             <tr>
              <th> {{ __('Payment type') }} : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>
      
             <tr>
              <th> {{ __('Transaction ID') }} : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>
      
             <tr>
              <th> {{ __('Invoice') }}  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>
      
             <tr>
              <th> {{ __('Order total') }} : </th>
               <th>{{ $order->amount }} </th>
            </tr>
      
            <tr>
              <th> {{ __('Order') }} : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
            </tr>
      
      
      
           </table>
      
      
         </div> 
      
        </div>
      
      </div> 
      </div>
		</div> 
	</div>
</div>



<div class="row">



<div class="col-md-12">

  <div class="table-responsive">
    <table class="table">
      <tbody>

        <tr style="background: #e2e2e2;">
          <td class="col-md-1">
            <label for=""> {{ __('Image') }}</label>
          </td>

          <td class="col-md-3">
            <label for=""> {{ __('Name product') }} </label>
          </td>

          <td class="col-md-3">
            <label for=""> {{ __('Product code') }}</label>
          </td>

           <td class="col-md-2">
            <label for=""> {{ __('Weight') }} </label>
          </td>

           <td class="col-md-1">
            <label for=""> {{ __('Quantity') }} </label>
          </td>

          <td class="col-md-1">
            <label for=""> {{ __('Price') }} </label>
          </td>

        </tr>


        @foreach($orderItem as $item)
 <tr>
          <td class="col-md-1">
            <label for=""><img src="{{ asset($item->product->thambnail_product) }}" height="50px;" width="50px;"> </label>
          </td>

          <td class="col-md-3">
            <label for=""> {{ $item->product->name_product }}</label>
          </td>


           <td class="col-md-3">
            <label for=""> {{ $item->product->code_product}}</label>
          </td>

          <td class="col-md-2">
            <label for=""> {{ $item->weight }}</label>
          </td>

           <td class="col-md-2">
            <label for=""> {{ $item->qty }}</label>
          </td>

    <td class="col-md-2">
            <label for=""> {{ $item->price }}  (  {{ $item->price * $item->qty}} PLN ) PLN </label>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @include('frontend.user_menu.user_menu')

 </div>
</div>

@endsection
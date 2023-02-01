@extends('frontend.main')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
      <hr>
      <div class="card">
        <div class="card-header"><h2>{{ __('Shipping details') }}</h2></div>
       <hr>
       <div class="card-body" style="background: #E9EBEC;">
         <table class="table">
        <tr>
          <th> <h4>{{ __('Shipping areas name') }} </h4> </th>
           <th> {{ $order->name }} </th>
        </tr>
    
         <tr>
          <th> <h4>{{ __('Shipping phone') }} </h4> </th>
           <th> {{ $order->phone }} </th>
        </tr>
    
         <tr>
          <th> <h4>{{ __('Shipping email') }} </h4> </th>
           <th> {{ $order->email }} </th>
        </tr>
    
         <tr>
          <th> <h4>{{ __('Area') }} </h4> </th>
           <th> {{ $order->area->area_name }} </th>
        </tr>
    
         <tr>
          <th> <h4>{{ __('District') }} </h4> </th>
           <th> {{ $order->district->district_name }} </th>
        </tr>
    
         <tr>
         <th> <h4>{{ __('State name') }} </h4> </th>
           <th>{{ $order->state->state_name }} </th>
        </tr>
    
        <tr>
          <th> <h4>{{ __('Post code') }} </h4> </th>
           <th> {{ $order->post_code }} </th>
        </tr>
    
        <tr>
          <th> <h4>{{ __('Order date') }} </h4> </th>
           <th> {{ $order->order_date }} </th>
        </tr>
    
         </table>
    
    
       </div> 
       <div class="col-md-5">
        <div class="card">
          <div class="card-header"><h2>{{ __('Order details') }}</h2>
        <span class="text-danger"> {{ __('Invoice') }} : {{ $order->invoice_no }}</span></h4>
          </div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>  <h4>{{ __('Name') }} </h4> </th>
               <th> {{ $order->user->name }} </th>
            </tr>
      
             <tr>
              <th>  <h4>{{ __('Phone') }} </h4> </th>
               <th> {{ $order->user->phone }} </th>
            </tr>
      
             <tr>
              <th> <h4>{{ __('Payment type') }} </h4> </th>
               <th> {{ $order->payment_method }} </th>
            </tr>
      
             <tr>
              <th> <h4>{{ __('Transaction ID') }} </h4> </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>
      
             <tr>
              <th> <h4>{{ __('Invoice') }}  </h4> </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>
      
             <tr>
              <th> <h4>{{ __('Order total') }} </h4> </th>
               <th>{{ $order->amount }} </th>
            </tr>
      
            <tr>
              <th> <h4>{{ __('Order') }} </h4> </th>
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
            <h4><label for=""> {{ __('Image') }}</label></h4>
          </td>

          <td class="col-md-3">
            <h4><label for=""> {{ __('Name product') }} </label></h4>
          </td>

          <td class="col-md-3">
            <h4><label for=""> {{ __('Product code') }}</label></h4>
          </td>

           <td class="col-md-2">
            <h4><label for=""> {{ __('Weight') }} </label></h4>
          </td>

           <td class="col-md-1">
            <h4><label for=""> {{ __('Quantity') }} </label></h4>
          </td>

          <td class="col-md-1">
            <h4><label for=""> {{ __('Price') }} </label></h4>
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

  @if($order->status !== "delivered")
      
  @else

  @php 
  $order = App\Models\Order::where('id', $order->id)->where('return_reason', '=', NULL)->first();
  @endphp

      @if($order)
          <form action="{{ route('return.order', $order->id) }}" method="post" >
            @csrf
            <div class="form-group">
              <label for="label">{{ __('Order return reason') }}:</label>
              <textarea name="return_reason" id="" class="form-control" cols="20" rows="4">{{ __('Return reason') }}</textarea>    
            </div>
            <button type="submit" class="btn btn-danger">{{ __('Submit') }}</button><br><br>
          </form>
      @else
          <span class="badge badge-pill badge-warning" style="background:red;"> 
            {{ __('You have send return request for this product') }}</span><br><br>
      @endif
    
  @endif
    </table>
  </div>

  @include('frontend.user_menu.user_menu')

 </div>
</div>

@endsection
@extends('frontend.main')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('title')
{{ __('Cash on delivery') }}
@endsection

<style>

.StripeElement {
box-sizing: border-box;
height: 40px;
padding: 10px 12px;
border: 1px solid transparent;
border-radius: 4px;
background-color: white;
box-shadow: 0 1px 3px 0 #e6ebf1;
-webkit-transition: box-shadow 150ms ease;
transition: box-shadow 150ms ease;
}
.StripeElement--focus {
box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
border-color: #fa755a;
}
.StripeElement--webkit-autofill {
background-color: #fefde5 !important;}
</style>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">{{ __('Home') }}</a></li>
				<li class='active'>{{ __('Cash on delivery') }}</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">

				<div class="col-md-6">
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">{{ __('Your shopping amount') }}</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">


<hr>
<li>
  @if(Session::has('coupon'))

  <strong>{{ __('Sub total') }}: </strong> {{ $totalCart }} PLN<hr>

  <strong>{{ __('Grand total') }}: </strong> {{ session()->get('coupon')['total_amount'] }} PLN
  <hr>


  @else

<strong>{{ __('Sub total') }}: </strong> {{ $totalCart }} PLN<hr>

<strong>{{ __('Grand total') }}: </strong> {{ $totalCart }} PLN<hr>


  @endif 
</li>

				</ul>		
			</div>
		</div>
	</div>
</div> 
 </div> 
	<div class="col-md-6">
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">{{ __('Select payment method') }}</h4>
		    </div>


		    <form action="{{ route('cash.order') }}" method="post" id="payment-form">
          @csrf
          <div class="form-row">
            <img src="{{ asset('styles_frontend/assets/images/payments/2.png') }}">
          <label for="card-element">
            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
            <input type="hidden" name="area_id" value="{{ $data['area_id'] }}">
            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
            <input type="hidden" name="notes" value="{{ $data['notes'] }}">           
          </label>

          <div id="card-element">
          </div>
          <div id="card-errors" role="alert"></div>
          </div>
          <br>
          <button class="btn btn-primary">{{ __('Submit Payment') }}</button>
        </form>


			</div>
<hr>
		</div>
	</div>
</div> 
 </div>

</form>
			</div>
		</div>
</div>
</div>

@endsection
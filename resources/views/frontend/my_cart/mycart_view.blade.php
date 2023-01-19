@extends('frontend.main')
@section('content')

@section('title')
    {{ __('My cart') }}
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ '/' }}">{{ __('Home') }}</a></li><br>
				<li class='active'>{{ __('My cart') }}</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">{{ __('My cart') }}</th>
				</tr>
			</thead>
			<tbody id="cartPage">				
			</tbody>
		</table>
	</div>
</div>
<div class="col-md-4 col-sm-12 estimate-ship-tax">

  @if (Session::has('coupon'))
      
  @else
      
	<table class="table" id="fieldCoupon">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">{{ __('Discount code') }}</span>
					<p>{{ __('Enter your coupon code if you have one..') }}</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="{{ __('You Coupon') }}" id="name_coupon">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">{{ __('APPLY COUPON') }}</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
  @endif
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead id="couponCalField">
			
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" class="btn btn-primary checkout-btn">{{ __('PROCCED TO CHEKOUT') }}</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>			
</div>
</div>

<br><br>



<br>
</div>

@endsection
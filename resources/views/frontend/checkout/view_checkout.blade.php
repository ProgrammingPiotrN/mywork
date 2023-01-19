@extends('frontend.main')
@section('content')

@section('title')
    {{ __('Checkout') }}
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ '/' }}">{{ __('Home') }}</a></li><br>
				<li class='active'>{{ __('Checkout') }}</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>{{ __('Checkout method') }}
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			

					<!-- radio-form  -->
					<form class="register-form" role="form">
					 
				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle">{{ __('Already registered') }}?</h4>
					<p class="text title-tag-line">{{ __('Please log in below') }}:</p>
					<form class="register-form" role="form">
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">{{ __('Email') }} <span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">{{ __('Password') }} <span>*</span></label>
					    <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
					    <a href="#" class="forgot-password">{{ __('Forgot your Password') }}?</a>
					  </div>
					  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Login') }}</button>
					</form>
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  
					  	<!-- checkout-step-06  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">{{ __('Your checkout progress') }}</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

                    @foreach($cart as $item)
					<li> 
						<strong>{{ __('Image') }}: </strong>
						<img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
					</li>

					<li> 
						<strong>{{ __('Quantity') }}: </strong>
						 ( {{ $item->qty }} )

						 <strong>{{ __('Weight') }}: </strong>
						 {{ $item->options->weight }}

					</li>
                    @endforeach 
					<li>
                        @if(Session::has('coupon'))

                        <strong>{{ __('Sub total') }}: </strong> {{ $totalCart }} PLN<hr>

                        <strong>{{ __('Coupon name') }}: </strong> {{ session()->get('coupon')['name_coupon'] }}
                        ( {{ session()->get('coupon')['discount_coupon'] }} % )
                        <hr>

                        <strong>{{ __('Coupon discount') }}: </strong> {{ session()->get('coupon')['discount_amount'] }} PLN
                        <hr>

                        <strong>{{ __('Grand total') }}: </strong> {{ session()->get('coupon')['total_amount'] }} PLN
                        <hr>


                        @else

            <strong>{{ __('Sub total') }}: </strong> {{ $totalCart }} PLN<hr>

            <strong>{{ __('Grand total') }}: </strong> ${{ $totalCart }} PLN<hr>


                        @endif 
                    </li>
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@extends('frontend.main')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	@if (session('status'))
	<div class="mb-4 font-medium text-sm text-green-600">
		{{ session('status') }}
	</div>
@endif
	<form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
		@csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">User email address <span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
			@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios"value="option2">Remember me!
		  	</label>
			  <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
		</div>
		<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
		</div>
	</form>					
</div>
<!-- Sign-in -->
<br/>
<!-- create a new account -->

<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div>
		<div class="logo-slider-inner">	
		</div>
</div>
</div>!
@endsection
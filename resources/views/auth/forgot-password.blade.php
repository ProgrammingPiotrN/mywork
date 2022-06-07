@extends('frontend.main')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Forget password</li>
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
	<h4 class="">Forget password</h4>
	<p class="">Forgot your password? No problem</p>
	@if (session('status'))
	<div class="mb-4 font-medium text-sm text-green-600">
		{{ session('status') }}
	</div>
@endif
	<form method="POST" action="{{ route('password.email') }}">
		@csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
		</div>
		
		<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email password reset link</button>
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
</div>
@endsection
@extends('frontend.main')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Reset password</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Reset password</h4>
	@if (session('status'))
	<div class="mb-4 font-medium text-sm text-green-600">
		{{ session('status') }}
	</div>
@endif
	<form method="POST" action="{{ route('password.update') }}">
		@csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm password <span>*</span></label>
		    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
		</div>
		
		<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset password</button>
		</div>
	</form>					
</div>
<br/>
	
		</div>
		</div>
<div>
		<div class="logo-slider-inner">	
		</div>
</div>
</div>
@endsection
@extends('frontend.main')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
<div class="panel panel-default checkout-step-01">

		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>{{ __('Checkout method') }}
	        </a>
	     </h4>
    </div>

	<div id="collapseOne" class="panel-collapse collapse in">

	    <div class="panel-body">
			<div class="row">		

					<form class="register-form" role="form" action="{{ route('checkout.store') }}" method="POST">
            @csrf

					 
				</div>

				<div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle"><b>{{ __('Shipping address') }}</b><span class="text-danger">*</span></h4>
					<form class="register-form" role="form">
						<div class="form-group">
					    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" 
              placeholder="{{ __('Full name') }}" value="{{ Auth::user()->name }}" required="">
					  </div>
					</form>
				</div>	

        <div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle"><b>{{ __('Email') }}</b><span class="text-danger">*</span></h4>
					<form class="register-form" role="form">
						<div class="form-group">
					    <input type="email" name="shipping_email" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" 
              placeholder="{{ __('Email') }}" value="{{ Auth::user()->email }}" required="">
					  </div>
					</form>
				</div>	

        <div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle"><b>{{ __('Phone') }}</b><span class="text-danger">*</span></h4>
					<form class="register-form" role="form">
						<div class="form-group">
					    <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" 
              placeholder="{{ __('Phone') }}" value="{{ Auth::user()->phone }}" required="">
					  </div>
					</form>
				</div>	

        <div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle"><b>{{ __('Post code') }}</b><span class="text-danger">*</span></h4>
					<form class="register-form" role="form">
						<div class="form-group">
					    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" 
              placeholder="{{ __('Post code') }}" required="">
					  </div>
					</form>
				</div>	

        <div class="col-md-6 col-sm-6 already-registered-login">
					
          <div class="form-group">
            <h5><b>{{ __('Select shipping area') }}</b><span class="text-danger">*</span></h5>
            <div class="controls">
             <select name="area_id" class="form-control" style="text-align: center">
                 <option value="">{{ __('Select shipping area') }}</option>
                 @foreach($areas as $item)
                 <option value="{{ $item->id }}">{{ $item->area_name }}</option>
                 @endforeach
             </select>
             @error('area_id')
                   <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
          </div>

          <div class="form-group">
            <h5><b>{{ __('District select') }}</b><span class="text-danger">*</span></h5>
            <div class="controls">
             <select name="district_id" class="form-control" style="text-align: center">
                 <option value="">{{ __('District select') }}</option>
                 
             </select>
             @error('district_id')
                   <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
          </div>

          <div class="form-group">
            <h5><b>{{ __('State select') }}</b><span class="text-danger">*</span></h5>
            <div class="controls">
             <select name="state_id" class="form-control" style="text-align: center">
                 <option value="">{{ __('State select') }}</option>
                 
             </select>
             @error('area_id')
                   <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
          </div>

          <div class="form-group">
            <h4 class="checkout-subtitle"><b>{{ __('Notes') }}</b><span class="text-danger">*</span></h4>
            <textarea class="form-control" cols="30" rows="5" placeholder="{{ __('Notes') }}" name="notes"></textarea>
          </div>	

					</form>
				</div>	
			</div>			
		</div>
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">{{ __('Select payment method') }}</h4>
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

            <strong>{{ __('Grand total') }}: </strong> {{ $totalCart }} PLN<hr>


                        @endif 
                    </li>
				</ul>		
			</div>
		</div>
	</div>
</div> 
	</div>
</div>
					</div>
				</div>
				<div class="col-md-4">


</div>
			</div>
		</div>

</div>

<script type="text/javascript">
  $(document).ready(function() {
      $('select[name="area_id"]').on('change', function() {
          var area_id = $(this).val();
          if(area_id) {
              $.ajax({
                  url: "{{ url('/district-get/ajax') }}/"+area_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      $('select[name="state_id"]').empty();
                      var p =$('select[name="district_id"]').empty();
                      $.each(data, function(key, value){
                          $('select[name="district_id"]').append('<option value="'+value.id + '">' + value.district_name + '</option>');
                      });
                  },
              });
          } else {
              alert('danger');
          }
      });

      $('select[name="district_id"]').on('change', function() {
          var district_id = $(this).val();
          if(district_id) {
              $.ajax({
                  url: "{{ url('/state-get/ajax') }}/"+district_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      var p =$('select[name="state_id"]').empty();
                      $.each(data, function(key, value){
                          $('select[name="state_id"]').append('<option value="'+value.id + '">' + value.state_name + '</option>');
                      });
                  },
              });
          } else {
              alert('danger');
          }
      });

  });
</script>

@endsection


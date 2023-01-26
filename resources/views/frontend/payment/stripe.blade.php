@extends('frontend.main')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('title')
{{ __('Stripe payment') }}
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
				<li class='active'>{{ __('Stripe') }}</li>
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


		    <form action="{{ route('stripe.order') }}" method="post" id="payment-form">
          @csrf
          <div class="form-row">
          <label for="card-element">
          {{ __('Credit or debit card') }}
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

<script type="text/javascript">
  // Create a Stripe client.
var stripe = Stripe('pk_test_51MUboxIRJ8ix16XZhgybG5uNPchtfzA9mPbZhKiVn7din7OEQzZLarepf3oPK1fOEd2izsRzvg50kLdALODmtWqt00B0fTeuYT');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
base: {
  color: '#32325d',
  fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
  fontSmoothing: 'antialiased',
  fontSize: '16px',
  '::placeholder': {
    color: '#aab7c4'
  }
},
invalid: {
  color: '#fa755a',
  iconColor: '#fa755a'
}
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
var displayError = document.getElementById('card-errors');
if (event.error) {
  displayError.textContent = event.error.message;
} else {
  displayError.textContent = '';
}
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
event.preventDefault();
stripe.createToken(card).then(function(result) {
  if (result.error) {
    // Inform the user if there was an error.
    var errorElement = document.getElementById('card-errors');
    errorElement.textContent = result.error.message;
  } else {
    // Send the token to your server.
    stripeTokenHandler(result.token);
  }
});
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
// Insert the token ID into the form so it gets submitted to the server
var form = document.getElementById('payment-form');
var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'stripeToken');
hiddenInput.setAttribute('value', token.id);
form.appendChild(hiddenInput);
// Submit the form
form.submit();
}
</script>

@endsection
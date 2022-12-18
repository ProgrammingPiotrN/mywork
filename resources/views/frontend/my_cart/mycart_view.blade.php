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
</div>
</div>


<br>
</div>

@endsection
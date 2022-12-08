@extends('frontend.main')
@section('content')

@section('title')
    {{ __('Sweet dream shop') }}
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
          
          @include('frontend.menu.menu')

          @include('frontend.deals.hot_deals')
          
          @include('frontend.offer.special_offer')

          @include('frontend.tags.tags_product')
        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">           
          
          @include('frontend.slider.slider')

          @include('frontend.new_product.new_product') 

          @include('frontend.featured.featured')
          
          @include('frontend.deals.special_deals')

          @include('frontend.category_skip.category_one')

          @include('frontend.category_skip.category_two')

          @include('frontend.category_skip.category_three')

          @include('frontend.product_model.product_model')

        </div>
      </div>
    </div>     
  @endsection
  
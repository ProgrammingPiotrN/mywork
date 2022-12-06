@extends('frontend.main')
@section('content')

@section('title')
   {{ __('Tags Product') }}
@endsection

<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{ ('/') }}">{{ __('Home') }}</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'> 
          @include('frontend.menu.menu')
          <div class="sidebar-module-container">
            <div class="sidebar-filter"> 
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">{{ __('Categories') }}</h4>
                </div>
                <div class="sidebar-widget-body">
                  <div class="accordion">
                    @foreach($cat as $category)
                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#collapseOne{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed"> {{ $category->name_category }} </a> </div>
                      <div class="accordion-body collapse" id="collapseOne{{ $category->id }}" style="height: 0px;">
                        <div class="accordion-inner">

                          @php
                            $subcat = App\Models\Subcategory::where('category_id', $category->id)->orderBy('name_subcategory', 'ASC')->get();   
                          @endphp

                          @foreach($subcat as $subcategory)
                          <ul>
                            <li><a href="#">{{ $subcategory->name_subcategory }}</a></li>
                          </ul>
                          @endforeach

                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">{{ __('Price Slider') }}</h4>
                </div>
                <div class="sidebar-widget-body m-t-10">
                  <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                    <input type="text" class="price-slider" value="" >
                  </div>
                  <a href="#" class="lnk btn btn-primary">{{ __('Show Now') }}</a> </div>
              </div>
 
             @include('frontend.tags.tags_product')
              
             <div class="home-banner"></div>
            </div>
          </div>
        </div>
        <div class='col-md-9'> 

          @include('frontend.grid_list.grid_list')

          @include('frontend.tags.product_list')

        </div>
      </div>
    </div>  
  </div>
</div>
@endsection
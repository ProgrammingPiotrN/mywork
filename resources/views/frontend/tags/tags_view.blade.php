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

          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>{{ __('Grid') }}</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>{{ __('List') }}</a></li>
                  </ul>
                </div>
              </div>
              <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">{{ __('Sort by') }}</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> {{ __('Position') }} <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">{{ __('Position') }}</a></li>
                          <li role="presentation"><a href="#">{{ __('Price:lowest first') }}</a></li>
                          <li role="presentation"><a href="#">{{ __('Price:highest first') }}</a></li>
                          <li role="presentation"><a href="#">{{ __('Name product:A to Z') }}</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">{{ __('Show') }}</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col col-sm-6 col-md-4 text-right">
                <div class="pagination-container">
                  
                </div>
               </div>
            </div>
          </div>
          {{-- Start product grid view --}}
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">
                    @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}"></a> </div>

                            @php
                              $amount = $product->price_selling - $product->price_discount;
                              $disc = ($amount/$product->price_selling) * 100;
                            @endphp
                            
                            <div>
                              @if($product->price_discount == NULL)
                              <div class="tag new">{{ __('New') }}</div>
                              @else
                              <div class="tag hot"><span>{{ round($disc) }}%</span></div>
                              @endif
                            </div>   

                          </div>
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}">{{ $product->name_product }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            @if($product->price_discount == NULL)
                            <div class="product-price"> <span class="price"> {{ $product->price_selling }} PLN</span> </div>
                            @else
                            <div class="product-price"> <span class="price"> {{ $product->price_discount }} PLN</span> <span class="price-before-discount"> {{ $product->price_selling }} PLN</span> </div>
                            @endif

                          </div>
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">{{ __('ADD TO CART') }}</button>
                                </li>
                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              {{--Start Product list view --}}
              <div class="tab-pane "  id="list-container">
                <div class="category-product">
                  @foreach($products as $product)
                  <div class="category-product-inner wow fadeInUp">
                    <div class="products">
                      <div class="product-list product">
                        <div class="row product-list-row">
                          <div class="col col-sm-4 col-lg-4">
                            <div class="product-image">
                              <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}"></a> </div>
                            </div>
                          </div>
                          <div class="col col-sm-8 col-lg-8">
                            <div class="product-info">
                              <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}">{{ $product->name_product }}</a></h3>
                              <div class="rating rateit-small"></div>

                              @if($product->price_discount == NULL)
                              <div class="product-price"> <span class="price"> {{ $product->price_selling }} PLN</span> </div>
                              @else
                              <div class="product-price"> <span class="price"> {{ $product->price_discount }} PLN</span> <span class="price-before-discount"> {{ $product->price_selling }} PLN</span> </div>
                              @endif

                              <div class="description m-t-10">{{ $product->description_short }}</div>
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                      <button class="btn btn-primary cart-btn" type="button">{{ __('ADD TO CART') }}</button>
                                    </li>
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                            @php
                              $amount = $product->price_selling - $product->price_discount;
                              $disc = ($amount/$product->price_selling) * 100;
                            @endphp
                            
                            <div>
                              @if($product->price_discount == NULL)
                              <div class="tag new">{{ __('New') }}</div>
                              @else
                              <div class="tag hot"><span>{{ round($disc) }}%</span></div>
                              @endif
                            </div> 
                      </div>
                    </div>
                  </div>
                  @endforeach
                  {{--end Product list view --}}
                </div>
              </div>
            </div>
            <div class="clearfix filters-container">
              <div class="text-right">
                <div class="pagination-container">
                  {{ $products->links() }}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
@endsection
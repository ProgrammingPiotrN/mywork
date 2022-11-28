@extends('frontend.main')
@section('content')

@section('title')
    Sweet dream shop
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
          
          <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>                     
              @if(session()->get('language') == 'polish') Kategorie @else Categories @endif
            </div>
            <nav class="yamm megamenu-horizontal">
              <ul class="nav">

                @foreach ($cat as $category)                                    
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name_category }}</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                      
                        @php
                        $subcat = App\Models\Subcategory::where('category_id', $category->id)->orderBy('name_subcategory', 'ASC')->get();   
                       @endphp

                        @foreach($subcat as $subcategory)
                        <div class="col-sm-12 col-md-3">
                          <h2 class="title">{{ $subcategory->name_subcategory }}</h2>   
                          @php
                            $subsubcat = App\Models\SubSubcategory::where('subcategory_id', $subcategory->id)->orderBy('name_subsubcategory', 'ASC')->get();   
                          @endphp   
                          @foreach($subsubcat as $subsubcategory)      
                          <ul class="links list-unstyled">
                            <li><a href="#">{{ $subsubcategory->name_subsubcategory }}</a></li>
                          </ul>
                          @endforeach
                        </div>
                        @endforeach                                          

                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach            
              </ul>                             
            </nav>
          </div>

          <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">hot deals</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

              @foreach($hotdeals as $product)
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}" alt=""></a> </div>

                      @php
                        $amount = $product->price_selling - $product->price_discount;
                        $disc = ($amount/$product->price_selling) * 100;
                      @endphp
    
                      <div>
                        @if($product->price_discount == NULL)
                        <div class="tag new">
                          @if(session()->get('language') == 'polish') Nowe @else New @endif
                        </div>
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
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">           
          <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

              @foreach($slider as $slider)
              <div class="item" style="background-image: url({{ asset($slider->img_slider) }});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">{{ $slider->title }}</div>
                    <div class="big-text fadeInDown-1"> {{ $slider->description }} </div>
                  </div>
                </div>
              </div> 
              @endforeach             
            </div>
          </div>

          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">                    
                @if(session()->get('language') == 'polish') Nowe produkty @else New products @endif
              </h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">
                  @if(session()->get('language') == 'polish') Wszystko @else All @endif
                </a></li>
                @foreach($cat as $category)
                <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->name_category }}</a></li>
                @endforeach
                {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>

                <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
              </ul>
              <!-- /.nav-tabs --> 
            </div>

            <div class="tab-content outer-top-xs">
              <div class="tab-pane in active" id="all">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @foreach($prod as $product)
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}" alt=""></a> </div>
                            <!-- /.image -->
                            @php
                              $amount = $product->price_selling - $product->price_discount;
                              $disc = ($amount/$product->price_selling) * 100;
                            @endphp

                            <div>
                              @if($product->price_discount == NULL)
                              <div class="tag new">
                                @if(session()->get('language') == 'polish') Nowe @else New @endif
                              </div>
                              @else
                              <div class="tag hot"><span>{{ round($disc) }}%</span></div>
                              @endif
                            </div>

                          </div>
                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}">{{ $product->name_product }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            @if($product->price_discount == NULL)
                            <div class="product-price"> <span class="price"> {{ $product->price_selling }} PLN</span> </div>
                            @else
                            <div class="product-price"> <span class="price"> {{ $product->price_discount }} PLN</span> <span class="price-before-discount"> {{ $product->price_selling }} PLN</span> </div>
                            @endif

                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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
              @foreach($cat as $category)
              <div class="tab-pane" id="category{{ $category->id }}">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @php
                      $wisecatprod = App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
                    @endphp
                    @forelse($wisecatprod as $product)
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}" alt=""></a> </div>
                            <!-- /.image -->
                            @php
                              $amount = $product->price_selling - $product->price_discount;
                              $disc = ($amount/$product->price_selling) * 100;
                            @endphp

                            <div>
                              @if($product->price_discount == NULL)
                              <div class="tag new">
                                @if(session()->get('language') == 'polish') Nowe @else New @endif
                              </div>
                              @else
                              <div class="tag hot"><span>{{ round($disc) }}%</span></div>
                              @endif
                            </div>

                          </div>
                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}">{{ $product->name_product }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            @if($product->price_discount == NULL)
                            <div class="product-price"> <span class="price"> {{ $product->price_selling }} PLN</span> </div>
                            @else
                            <div class="product-price"> <span class="price"> {{ $product->price_discount }} PLN</span> <span class="price-before-discount"> {{ $product->price_selling }} PLN</span> </div>
                            @endif

                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @empty
                        <h4 class="text-danger">
                          @if(session()->get('language') == 'polish') Nie znaleziono produktów @else No product found @endif
                        </h4>
                    @endforelse
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>                  
        </div>
      </div>

      <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">Featured products</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

          @foreach($featured as $product)
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}" alt=""></a> </div>
                  <!-- /.image -->
                  @php
                    $amount = $product->price_selling - $product->price_discount;
                    $disc = ($amount/$product->price_selling) * 100;
                  @endphp

                  <div>
                    @if($product->price_discount == NULL)
                    <div class="tag new">
                      @if(session()->get('language') == 'polish') Nowe @else New @endif
                    </div>
                    @else
                    <div class="tag hot"><span>{{ round($disc) }}%</span></div>
                    @endif
                  </div>

                </div>
                <!-- /.product-image -->
                
                <div class="product-info text-left">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}">{{ $product->name_product }}</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>

                  @if($product->price_discount == NULL)
                  <div class="product-price"> <span class="price"> {{ $product->price_selling }} PLN</span> </div>
                  @else
                  <div class="product-price"> <span class="price"> {{ $product->price_discount }} PLN</span> <span class="price-before-discount"> {{ $product->price_selling }} PLN</span> </div>
                  @endif

                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                      <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                      <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>

      <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">Featured products</h3>
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

          @foreach($featured as $product)
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}" alt=""></a> </div>
                  <!-- /.image -->
                  @php
                    $amount = $product->price_selling - $product->price_discount;
                    $disc = ($amount/$product->price_selling) * 100;
                  @endphp

                  <div>
                    @if($product->price_discount == NULL)
                    <div class="tag new">
                      @if(session()->get('language') == 'polish') Nowe @else New @endif
                    </div>
                    @else
                    <div class="tag hot"><span>{{ round($disc) }}%</span></div>
                    @endif
                  </div>

                </div>
                <!-- /.product-image -->
                
                <div class="product-info text-left">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}">{{ $product->name_product }}</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>

                  @if($product->price_discount == NULL)
                  <div class="product-price"> <span class="price"> {{ $product->price_selling }} PLN</span> </div>
                  @else
                  <div class="product-price"> <span class="price"> {{ $product->price_discount }} PLN</span> <span class="price-before-discount"> {{ $product->price_selling }} PLN</span> </div>
                  @endif

                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </li>
                      <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                      <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>

      <section>
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Offer</h3>
        <div class="sidebar-widget-body outer-top-xs">
          <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            @foreach($specialoffer as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}" alt="" style="height: 700px; weight: 300px"></a> </div>
                    <!-- /.image -->
                    @php
                      $amount = $product->price_selling - $product->price_discount;
                      $disc = ($amount/$product->price_selling) * 100;
                    @endphp
  
                    <div>
                      @if($product->price_discount == NULL)
                      <div class="tag new">
                        @if(session()->get('language') == 'polish') Nowe @else New @endif
                      </div>
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
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      </section>

      

      <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Deals</h3>
        <div class="sidebar-widget-body outer-top-xs">
          <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            @foreach($specialdeals as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}" alt="" style="height: 700px; weight: 300px"></a> </div>
                    <!-- /.image -->
                    @php
                      $amount = $product->price_selling - $product->price_discount;
                      $disc = ($amount/$product->price_selling) * 100;
                    @endphp
  
                    <div>
                      @if($product->price_discount == NULL)
                      <div class="tag new">
                        @if(session()->get('language') == 'polish') Nowe @else New @endif
                      </div>
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
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  
@php
  $hotdeals = App\Models\Product::where('deals', 1)->where('price_discount', '!=', NULL)->orderBy('id', 'DESC')->limit(6)->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
    <h3 class="section-title">{{ __('Hot deals') }}</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
      
          @foreach($hotdeals as $product)
          <div class="item">
            <div class="products">
              <div class="hot-deal-wrapper">
                <div class="image">
                  <img src="{{ asset($product->thambnail_product) }}" alt="">
                </div>

                @php
                $amount = $product->price_selling - $product->price_discount;
                $disc = ($amount/$product->price_selling) * 100;
                @endphp

                @if($product->price_discount == NULL)
                <div class="sale-offer-tag"><span>{{ __('New') }}<br>!!!</span></div>
                @else
                <div class="sale-offer-tag"><span>{{ round($disc) }}%<br>!!!</span></div>
                @endif

              </div>
  
              <div class="product-info text-left m-t-20">
                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}">{{ $product->name_product }}</a></h3>
                <div class="rating rateit-small"></div>
  
                @if($product->price_discount == NULL)
                    <div class="product-price"> <span class="price"> {{ $product->price_selling }} PLN</span> </div>
                    @else
                    <div class="product-price"> <span class="price"> {{ $product->price_discount }} PLN</span> 
                    <span class="price-before-discount"> {{ $product->price_selling }} PLN</span> </div>
                    @endif                                              
              </div>
  
              <div class="cart clearfix animate-effect">
                <div class="action">
                  
                  <div class="add-cart-button btn-group">
                    <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" id="{{ $product->id }}">
                      <i class="fa fa-shopping-cart"></i>													
                    </button>
                    <button class="btn btn-primary cart-btn" type="button">{{ __('ADD TO CART') }}</button>
                                
                  </div>
                  
                </div>
              </div>
            </div>	
          </div>	
          @endforeach	        	                        		                      
      </div>
  </div>



  
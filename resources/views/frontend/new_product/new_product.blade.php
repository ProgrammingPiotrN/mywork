<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
      <h3 class="new-product-title pull-left">{{ __('New products') }}</h3>
      <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
        <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">{{ __('All') }}</a></li>
        @foreach($cat as $category)
        <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->name_category }}</a></li>
        @endforeach
      </ul>
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

                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" id="{{ $product->id }}"> <i class="fa fa-shopping-cart"></i> </button>
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

                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary mb-2" type="button">Add to cart</button>
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


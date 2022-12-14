<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
      <h3 class="new-product-title pull-left">{{ $category_skip_2->name_category }}</h3>
    </div>

    <div class="tab-content outer-top-xs">
      <div class="tab-pane in active" id="all">
        <div class="product-slider">
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
            @foreach($product_skip_2 as $product)
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
                        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="AddToWishlist(this.id)"> <i class="fa fa-heart"></i> </button>
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
    </div>         
  </div>


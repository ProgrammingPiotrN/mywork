<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
      <h3 class="new-product-title pull-left">{{ __('Related products') }}</h3>
    </div>

    <div class="tab-content outer-top-xs">
      <div class="tab-pane in active" id="all">
        <div class="product-slider">
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
            @foreach($productRelated as $product)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"><img  src="{{ asset($product->thambnail_product) }}" alt=""></a> </div>

                    <div class="tag sale"><span>{{ __('Sale') }}</span></div>

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
                          <button class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart" data-toggle="modal" data-target="#exampleModal" onclick="productView(this.id)" id="{{ $product->id }}"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">{{ __('ADD TO CART') }}</button>
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
    </div>
  </div> 
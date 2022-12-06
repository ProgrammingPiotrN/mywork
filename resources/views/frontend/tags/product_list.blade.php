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
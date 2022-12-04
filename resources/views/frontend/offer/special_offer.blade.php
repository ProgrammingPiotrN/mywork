<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">{{ __('Special offer') }}</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        <div class="item">
          <div class="products special-product">

            @foreach($specialoffer as $product)
            <div class="product">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-3">
                    <div class="product-image">
                      <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}"> <img src="{{ asset($product->thambnail_product) }}" alt=""> </a> </div>
                       
                    </div>
                  </div>
                  <div class="col col-xs-6">
                    <div class="product-info">
                      <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->slug_product) }}">{{ $product->name_product }}</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="product-price"> <span class="price"> {{ $product->price_selling }} PLN</span> </div>
                      
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
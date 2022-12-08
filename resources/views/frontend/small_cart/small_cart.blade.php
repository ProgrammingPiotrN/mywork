<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            
    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
      <div class="items-cart-inner">
        <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
        <div class="basket-item-count"><span class="count" id="cartQuantity"></span></div>
        <div class="total-price-basket"> <span class="lbl">{{ __('Cart') }}</span> <span class="total-price"> <span class="sign"> PLN</span>
          <span class="value" id="cartTotal"></span> </span> </div>
      </div>
      </a>
      <ul class="dropdown-menu">
        <li>
          <div id="miniCart">

          </div>
          <div class="clearfix cart-total">
            <div class="pull-right"> <span class="price">{{ __('Sub total') }} : </span><span class='price' id="cartTotal"></span> PLN</div>
            <div class="clearfix"></div>
            <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">{{ __('Checkout') }}</a> 
          </div>
          
        </li>
      </ul>
    </div>           
   </div>
</div> 
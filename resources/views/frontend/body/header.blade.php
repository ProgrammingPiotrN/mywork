<header class="header-style-1"> 
  
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="#"><i class="icon fa fa-user"></i>
                @if(session()->get('language') == 'polish') Moje konto @else My Account @endif
                </a></li>
              <li><a href="#"><i class="icon fa fa-heart"></i>
                @if(session()->get('language') == 'polish') Lista życzeń @else Wishlist @endif
               </a></li>
              <li><a href="#"><i class="icon fa fa-shopping-cart"></i>
                @if(session()->get('language') == 'polish') Mój koszyk @else My cart @endif
              </a></li>
              <li><a href="#"><i class="icon fa fa-check"></i>
                @if(session()->get('language') == 'polish') Sprawdź zamówienie @else Checkout @endif
              </a></li>
              
              <li>
              @auth
              <a href="{{ route('login') }}"><i class="icon fa fa-user"></i>
                @if(session()->get('language') == 'polish') Profil użytkownika @else User profile @endif
              </a></li>
              @else
              <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                @if(session()->get('language') == 'polish') Logowanie @else Login @endif
              </a>
              <a href="{{ route('register') }}"><i class="icon fa fa-lock"></i>
                @if(session()->get('language') == 'polish') Rejestracja @else Register @endif
              </a>

              @endauth
            </ul>
          </div>
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">USD</a></li>
                  <li><a href="#">INR</a></li>
                  <li><a href="#">GBP</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                @if(session()->get('language') == 'polish') Język @else Language @endif
                </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  @if(session()->get('language') == 'polish')
                  <li><a href="{{ route('language.english') }}">English</a></li>
                  @else 
                  <li><a href="{{ route('language.polish') }}">Polish</a></li>
                  @endif
                </ul>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset('styles_backend/images/logo/logo.svg') }}" style="width: 200px; height: 200px;" alt="logo"> </a> </div>
          </div>
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <div class="search-area">
              <form>
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">
                      @if(session()->get('language') == 'polish') Kategorie @else Categories @endif
                      <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- 
                          @if(session()->get('language') == 'polish') Torty @else Cakes @endif
                        </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- 
                          @if(session()->get('language') == 'polish') Ciasta @else Pies @endif
                        </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- 
                          @if(session()->get('language') == 'polish') Naleśniki @else Pancakes @endif
                        </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- 
                          @if(session()->get('language') == 'polish') Pączki @else Donuts @endif
                        </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- 
                          @if(session()->get('language') == 'polish') Babeczki @else Muffins @endif
                        </a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="Search here..." />
                  <a class="search-button" href="#" ></a> </div>
              </form>
            </div>
             </div>
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count">2</span></div>
                <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign">$</span><span class="value">600.00</span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="cart-item product-summary">
                    <div class="row">
                      <div class="col-xs-4">
                        <div class="image"> <a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a> </div>
                      </div>
                      <div class="col-xs-7">
                        <h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
                        <div class="price">$600.00</div>
                      </div>
                      <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <hr>
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>$600.00</span> </div>
                    <div class="clearfix"></div>
                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  
                </li>
              </ul>
            </div>           
           </div>
        </div>        
      </div>
    </div>
    
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Cakes</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <ul class="links">
                                <li><a href="#">Birthday cakes</a></li>
                                <li><a href="#">Themed cakes </a></li>
                                <li><a href="#">Wedding anniversary cakes</a></li>
                                <li><a href="#">Communion cakes</a></li>
                              </ul>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown mega-menu"> 
                  <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Pies</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                              <ul class="links">
                                <li><a href="#">Cheese cake</a></li>
                                <li><a href="#">Shrek</a></li>
                                <li><a href="#">Chocolate cake</a></li>
                                <li><a href="#">Poppy seed cake</a></li>
                                <li><a href="#">Cow</a></li>
                              </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="assets/images/banners/banner-side.png"></a> </div>
                          </div>
                        </div>
                       </li>
                    </ul>
                  </li>
                  <li class="dropdown mega-menu"> 
                    <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Pancakes</a>
                      <ul class="dropdown-menu container">
                        <li>
                          <div class="yamm-content">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                <ul class="links">
                                  <li><a href="#">Pancakes with chocolate</a></li>
                                  <li><a href="#">Pancakes with whipped cream</a></li>
                                  <li><a href="#">Pancakes with powdered sugar</a></li>
                                  <li><a href="#">Fruit pancakes</a></li>
                                </ul>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="assets/images/banners/banner-side.png"></a> </div>
                            </div>
                          </div>
                         </li>
                      </ul>
                    </li>
                    <li class="dropdown mega-menu"> 
                      <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Donuts</a>
                        <ul class="dropdown-menu container">
                          <li>
                            <div class="yamm-content">
                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                  <ul class="links">
                                    <li><a href="#">Donuts with jam</a></li>
                                    <li><a href="#">Donuts with pudding</a></li>
                                    <li><a href="#">Donuts with fudge</a></li>
                                    <li><a href="#">Donuts with marmalade</a></li>
                                  </ul>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="assets/images/banners/banner-side.png"></a> </div>
                              </div>
                            </div>
                           </li>
                        </ul>
                      </li>
                      <li class="dropdown mega-menu"> 
                        <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Muffins</a>
                          <ul class="dropdown-menu container">
                            <li>
                              <div class="yamm-content">
                                <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                    <ul class="links">
                                      <li><a href="#">Muffins with chocolate</a></li>
                                      <li><a href="#">Muffins with fruits</a></li>
                                    </ul>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="assets/images/banners/banner-side.png"></a> </div>
                                </div>
                              </div>
                             </li>
                          </ul>
                        </li>
                    <ul class="dropdown-menu pages">
                      <li>
                        <div class="yamm-content">
                          <div class="row">
                            <div class="col-xs-12 col-menu">
                              <ul class="links">
                                <li><a href="home.html">Home</a></li>
                                <li><a href="category.html">Category</a></li>
                                <li><a href="detail.html">Detail</a></li>
                                <li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="sign-in.html">Sign In</a></li>
                                <li><a href="my-wishlist.html">Wishlist</a></li>
                                <li><a href="terms-conditions.html">Terms and Condition</a></li>
                                <li><a href="track-orders.html">Track Orders</a></li>
                                <li><a href="product-comparison.html">Product-Comparison</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="404.html">404</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                </ul>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
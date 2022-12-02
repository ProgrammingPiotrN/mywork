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
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">{{ __('header.Language') }}</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">English</a></li>
                  <li><a href="#">Polish</a></li>
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
                          @if(session()->get('language') == 'polish') Drożdżówki @else Buns @endif
                        </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- 
                          @if(session()->get('language') == 'polish') Rogaliki @else Croissants @endif
                        </a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- 
                          @if(session()->get('language') == 'polish') Torty @else Cakes @endif
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
                <div class="total-price-basket"> <span class="lbl">
                  @if(session()->get('language') == 'polish') Koszyk @else Cart @endif</span> <span class="total-price"> <span class="sign">$</span><span class="value">600.00</span> </span> </div>
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
                  <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                    @if(session()->get('language') == 'polish') Strona główna @else Home @endif
                  </a> </li>

                    @php
                     $cat = App\Models\Category::orderBy('name_category', 'ASC')->get();   
                    @endphp

                  @foreach ($cat as $category)                 
                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                    @if(session()->get('language') == 'polish') {{ $category->name_category }} @else {{ $category->name_category }} @endif
                    </a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">

                            @php
                            $subcat = App\Models\Subcategory::where('category_id', $category->id)->orderBy('name_subcategory', 'ASC')->get();   
                           @endphp

                            @foreach ($subcat as $subcategory)                                                        
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <h2 class="title">{{ $subcategory->name_subcategory }}</h2>
                              <ul class="links">

                                @php
                                $subsubcat = App\Models\SubSubcategory::where('subcategory_id', $subcategory->id)->orderBy('name_subsubcategory', 'ASC')->get();   
                               @endphp

                                @foreach ($subsubcat as $subsubcategory)                                                                
                                <li><a href="#">{{ $subsubcategory->name_subsubcategory }}</a></li>
                                @endforeach
                              </ul>
                            </div>
                            @endforeach
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  @endforeach
                  <li class="dropdown  navbar-right special-menu"> <a href="#">
                    @if(session()->get('language') == 'polish') Dzisiejsza oferta @else Todays offer @endif
                    </a> </li>
                </ul>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
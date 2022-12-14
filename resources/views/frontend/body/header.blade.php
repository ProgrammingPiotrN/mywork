<header class="header-style-1"> 
  
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="#"><i class="icon fa fa-user"></i>{{ __('My Account') }}</a></li>
              <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>{{ __('Wishlist') }}</a></li>
              <li><a href="#"><i class="icon fa fa-shopping-cart"></i>{{ __('My cart') }}</a></li>
              <li><a href="#"><i class="icon fa fa-check"></i>{{ __('Checkout') }}</a></li>
              
              <li>
              @auth
              <a href="{{ route('login') }}"><i class="icon fa fa-user"></i>{{ __('User profile') }}</a></li>
              @else
              <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>{{ __('Login') }}</a>
              <a href="{{ route('register') }}"><i class="icon fa fa-lock"></i>{{ __('Register') }}</a>

              @endauth
            </ul>
          </div>
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">{{ __('Language') }}</span><b class="caret"></b></a>
                <ul class="dropdown-menu" style="text-align: left">
                  <li><a href="/lang/en"><img src="{{ asset('styles_backend/images/flags/wb.jpg') }}" style="width: 25px"></a></li>
                  <li><a href="/lang/pl"><img src="{{ asset('styles_backend/images/flags/poland.png') }}" style="width: 25px"></a></li>
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
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">{{ __('Categories') }}<b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- {{ __('Buns') }}</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- {{ __('Croissants') }}</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- {{ __('Cakes') }}</a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="{{ __('Search here...') }}" />
                  <a class="search-button" href="#" ></a> </div>
              </form>
            </div>
             </div>
          
          @include('frontend.small_cart.small_cart')
             
      </div>
    </div>
    
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">{{ __('Toggle navigation') }}</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  
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
                              <a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_subcategory) }}"><h2 class="title">{{ $subcategory->name_subcategory }}</h2></a>
                              <ul class="links">

                                @php
                                $subsubcat = App\Models\SubSubcategory::where('subcategory_id', $subcategory->id)->orderBy('name_subsubcategory', 'ASC')->get();   
                               @endphp

                                @foreach ($subsubcat as $subsubcategory)                                                                
                                <li><a href="{{ url('product/subsubcategory/'.$subsubcategory->id.'/'.$subsubcategory->slug_subsubcategory) }}">{{ $subsubcategory->name_subsubcategory }}</a></li>
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
                  <li class="dropdown  navbar-right special-menu"> <a href="#">{{ __('Toddays offer') }}</a> </li>
                </ul>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
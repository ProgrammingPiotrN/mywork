@extends('frontend.main')
@section('content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row"> 
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
          
          <!-- ================================== TOP NAVIGATION ================================== -->
          <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
            <nav class="yamm megamenu-horizontal">
              <ul class="nav">
                {{-- torty --}}
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cakes</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Birthday cakes</a></li>
                            <li><a href="#">Themed cakes </a></li>
                            <li><a href="#">Wedding anniversary cakes</a></li>
                            <li><a href="#">Communion cakes</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                {{-- placki i naleśniki--}}
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pies</a> 
                  <!-- ================================== MEGAMENU VERTICAL ================================== -->
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                          <ul>
                            <li><a href="#">Cheese cake</a></li>
                            <li><a href="#">Shrek</a></li>
                            <li><a href="#">Chocolate cake</a></li>
                            <li><a href="#">Poppy seed cake</a></li>
                            <li><a href="#">Cow</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                  </li>
                
                  <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pancakes</a>
                    <ul class="dropdown-menu mega-menu">
                      <li class="yamm-content">
                        <div class="row">
                          <div class="col-sm-12 col-md-3">
                            <ul class="links list-unstyled">
                              <li><a href="#">Pancakes with chocolate</a></li>
                              <li><a href="#">Pancakes with whipped cream</a></li>
                              <li><a href="#">Pancakes with powdered sugar</a></li>
                              <li><a href="#">Fruit pancakes</a></li>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                   </li>
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Donuts</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Donuts with jam</a></li>
                            <li><a href="#">Donuts with pudding</a></li>
                            <li><a href="#">Donuts with fudge</a></li>
                            <li><a href="#">Donuts with marmalade</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                 </li>
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"></i>Muffins</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                          <ul>
                            <li><a href="#">Muffins with chocolate</a></li>
                            <li><a href="#">Muffins with fruits</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
      </div>
    </div>
  </div>
  @endsection
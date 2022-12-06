@php 
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp 

<aside class="main-sidebar">
    <section class="sidebar">			
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('styles_backend/images/logo/logo.svg') }}" alt="logo">
					 </div>
				</a>
			</div>
        </div>      
      <ul class="sidebar-menu" data-widget="tree">  		  
		<li>
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="monitor"></i>
			<span>{{ __('Dashboard') }}</span>
          </a>
        </li>  		
        <li class="treeview {{ ($prefix == '/brand')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>{{ __('Brands') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}">
              <i class="ti-more"></i>{{ __('All brand') }}</a></li>
          </ul>
        </li>  	       
        <li class="treeview {{ ($prefix == '/category')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>{{ __('Categories') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'view.category')? 'active':'' }}"><a href="{{ route('view.category') }}"><i class="ti-more"></i>{{ __('All categories') }}</a></li>
            <li class="{{ ($route == 'view.subcategory')? 'active':'' }}"><a href="{{ route('view.subcategory') }}"><i class="ti-more"></i>{{ __('All subcategories') }}</a></li>
            <li class="{{ ($route == 'view.subsubcategory')? 'active':'' }}"><a href="{{ route('view.subsubcategory') }}"><i class="ti-more"></i>{{ __('All subsubcategories') }}</a></li>
          </ul>
        </li>  
        <li class="treeview {{ ($prefix == '/product')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>{{ __('Products') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'add.product')? 'active':'' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>{{ __('Add products') }}</a></li>
            <li class="{{ ($route == 'product.list')? 'active':'' }}"><a href="{{ route('product.list') }}"><i class="ti-more"></i>{{ __('Product list') }}</a></li>
          </ul>
        </li> 
        <li class="treeview {{ ($prefix == '/slider')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>{{ __('Slider') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'slider.view')? 'active':'' }}"><a href="{{ route('slider.view') }}"><i class="ti-more"></i>{{ __('Add slider') }}</a></li>
          </ul>
        </li> 
	<div class="sidebar-footer">
		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
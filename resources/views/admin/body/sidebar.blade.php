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
			<span>Dashboard</span>
          </a>
        </li>  		
        <li class="treeview {{ ($prefix == '/brand')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}">
              <i class="ti-more"></i>All brand</a></li>
          </ul>
        </li>  	       
        <li class="treeview {{ ($prefix == '/category')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'view.category')? 'active':'' }}"><a href="{{ route('view.category') }}"><i class="ti-more"></i>All categories</a></li>
            <li class="{{ ($route == 'view.subcategory')? 'active':'' }}"><a href="{{ route('view.subcategory') }}"><i class="ti-more"></i>All subcategories</a></li>
            <li class="{{ ($route == 'view.subsubcategory')? 'active':'' }}"><a href="{{ route('view.subsubcategory') }}"><i class="ti-more"></i>All subsubcategories</a></li>
          </ul>
        </li>  
        <li class="treeview {{ ($prefix == '/product')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'add.product')? 'active':'' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add products</a></li>
            <li class="{{ ($route == 'product.list')? 'active':'' }}"><a href="{{ route('product.list') }}"><i class="ti-more"></i>Product list</a></li>
          </ul>
        </li> 
	<div class="sidebar-footer">
		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
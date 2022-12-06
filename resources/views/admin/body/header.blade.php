<header class="main-header">
    <nav class="navbar navbar-static-top pl-30">
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>			
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
					<i class="ti-check-box"></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="calendar.html" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
					<i class="ti-calendar"></i>
			    </a>
			</li>
		  </ul>
	  </div>	
    
      <div class="cnt-block">
        <ul class="list-unstyled list-inline">
          <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">{{ __('Language') }}</span><b class="caret"></b></a>
            <ul class="dropdown-menu" style="text-align: center">
              <li><a href="/lang/en"><img src="{{ asset('styles_backend/images/flags/wb.jpg') }}" style="width: 25px"></a></li>
              <li><a href="/lang/pl"><img src="{{ asset('styles_backend/images/flags/poland.png') }}" style="width: 25px"></a></li>
            </ul>
          </li>
        </ul>
      </div>
    
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
	      <li class="search-bar">		  
			  <div class="lookup lookup-circle lookup-right">
			     <input type="text" name="s">
			  </div>
		  </li>			
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown" title="Notifications">
			  <i class="ti-bell"></i>
			</a>
			<ul class="dropdown-menu animated bounceIn">
			  <li class="header">
				<div class="p-20">
					<div class="flexbox">
						
					</div>
				</div>
			  </li>
			</ul>
		  </li>	
		  
		  @php
			$adminData = DB::table('admins')->first();
		  @endphp

          <li class="dropdown user user-menu">	
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
				<img src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_photos/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="avatar">
			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">
				 <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ti-user text-muted mr-2"></i> {{ __('Profile') }}</a>
				 <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="ti-wallet text-muted mr-2"></i> {{ __('Change password') }}</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> {{ __('Settings') }}</a>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-lock text-muted mr-2"></i> {{ __('Logout') }}</a>
			  </li>
			</ul>
          </li>	
		  <li>
              <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
			  	<i class="ti-settings"></i>
			  </a>
          </li>
			
        </ul>
      </div>
    </nav>
  </header>
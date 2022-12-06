<div class="clearfix filters-container m-t-10">
    <div class="row">
      <div class="col col-sm-6 col-md-2">
        <div class="filter-tabs">
          <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
            <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>{{ __('Grid') }}</a> </li>
            <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>{{ __('List') }}</a></li>
          </ul>
        </div>
      </div>

      @include('frontend.sort.sort')

      <div class="col col-sm-6 col-md-4 text-right">
        <div class="pagination-container">
          
        </div>
       </div>
    </div>
  </div>
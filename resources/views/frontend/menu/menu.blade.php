@php
 $cat = App\Models\Category::orderBy('name_category', 'ASC')->get();   
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>{{ __('Categories') }}</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @foreach ($cat as $category)                                    
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name_category }}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
              
                @php
                $subcat = App\Models\Subcategory::where('category_id', $category->id)->orderBy('name_subcategory', 'ASC')->get();   
               @endphp

                @foreach($subcat as $subcategory)
                <div class="col-sm-12 col-md-3">

                  <a href="{{ url('product/subcategory/'.$subcategory->id.'/'.$subcategory->slug_subcategory) }}"><h2 class="title">{{ $subcategory->name_subcategory }}</h2>  </a>
                   
                  @php
                    $subsubcat = App\Models\SubSubcategory::where('subcategory_id', $subcategory->id)->orderBy('name_subsubcategory', 'ASC')->get();   
                  @endphp   
                  @foreach($subsubcat as $subsubcategory)      
                  <ul class="links list-unstyled">
                    <li><a href="{{ url('product/subsubcategory/'.$subsubcategory->id.'/'.$subsubcategory->slug_subsubcategory) }}">{{ $subsubcategory->name_subsubcategory }}</a></li>
                  </ul>
                  @endforeach
                </div>
                @endforeach                                          

              </div>
            </li>
          </ul>
        </li>
        @endforeach            
      </ul>                             
    </nav>
  </div>
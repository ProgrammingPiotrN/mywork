@extends('admin.admin')
@section('admin')

<div class="container-full">
    <section class="content">
      <div class="row">
  
      <div class="col-12">
  
        <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">Edit SubSubCategory</h3>
         </div>
         <div class="box-body">
           <div class="table-responsive">
            <form method="post" action="{{ route('subsubcategory.update') }}">
              @csrf			
              <input type="hidden" name="id" value="{{ $subsubcategories->id }}">		
                              <div class="form-group">
                                   <h5>Select category <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                    <select name="category_id" class="form-control">
                                        <option value="">Select category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected':'' }}>{{ $category->name_category }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                          <span class="text-danger">{{ $message }}</span> 
                                       @enderror
                                   </div>
                               </div>

                               <div class="form-group">
                                <h5>Select SubCategory <span class="text-danger">*</span></h5>
                                <div class="controls">
                                 <select name="subcategory_id" class="form-control">
                                     <option value="">Select SubCategory</option>
                                     @foreach($subcategories as $sub)
                                        <option value="{{ $sub->id }}" {{ $sub->id == $subsubcategories->subcategory_id ? 'selected':'' }}>{{ $sub->name_subcategory }}</option>
                                        @endforeach                                  
                                 </select>
                                 @error('subcategory_id')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>

                               <div class="form-group">
                                <h5>Name SubSubCategory <span class="text-danger">*</span></h5>
                                <div class="controls">
                                 <input type="text" name="name_subsubcategory" class="form-control" value="{{ $subsubcategories->name_subsubcategory }}">
                                 @error('name_subsubcategory')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>
  
                  <div class="text-xs-right">
  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
               </div>
              </form>
           </div>
         </div>
         </div>
       </div>
      </div>
    </section>    
    </div>
  
    <script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type','info') }}"
      switch(type){
         case 'info':
         toastr.info(" {{ Session::get('message') }} ");
         break;
         case 'success':
         toastr.success(" {{ Session::get('message') }} ");
         break;
         case 'warning':
         toastr.warning(" {{ Session::get('message') }} ");
         break;
         case 'error':
         toastr.error(" {{ Session::get('message') }} ");
         break; 
      }
      @endif 
    </script>

@endsection
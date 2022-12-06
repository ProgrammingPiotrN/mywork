@extends('admin.admin')
@section('admin')

<div class="container-full">
    <section class="content">
      <div class="row">
  
      <div class="col-12">
  
        <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">{{ __('Edit SubCategory') }}</h3>
         </div>
         <div class="box-body">
           <div class="table-responsive">
            <form method="post" action="{{ route('subcategory.update') }}">
              @csrf			
              <input type="hidden" name="id" value="{{ $subcategory->id }}">		
                              <div class="form-group">
                                   <h5>{{ __('Select category') }} <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                    <select name="category_id" class="form-control">
                                        <option value="">{{ __('Select category') }}</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': '' }}>{{ $category->name_category }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                          <span class="text-danger">{{ $message }}</span> 
                                       @enderror
                                   </div>
                              </div>

                            <div class="form-group">
                                <h5>{{ __('Name Subcategory') }} <span class="text-danger">*</span></h5>
                                <div class="controls">
                                 <input type="text" name="name_subcategory" class="form-control" value="{{ $subcategory->name_subcategory }}">
                                 @error('name_subcategory')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>
  
                  <div class="text-xs-right">
  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('Update') }}">
               </div>
              </form>
           </div>
         </div>
         </div>
       </div>
      </div>
    </section>    
    </div>
  
     
@endsection
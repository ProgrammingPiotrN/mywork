@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">{{ __('Edit brand') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
            @csrf	
            <input type="hidden" name="id" value="{{ $brand->id }}">	
            <input type="hidden" name="old_image" value="{{ $brand->brand_photos }}">	

                            <div class="form-group">
                                 <h5>{{ __('Brand name') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="name_brand" class="form-control" value="{{ $brand->name_brand }}">
                                     @error('name_brand')
                                        <span class="text-danger">{{ $message }}</span> 
                                     @enderror
                                 </div>
                             </div>

                             <div class="form-group">
                                 <h5>{{ __('Brand photos') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="file" name="brand_photos" class="form-control">
                                     @error('brand_photos')
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
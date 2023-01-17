@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

   
    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">{{ __('Edit shipping') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('area.update', $areas->id) }}" enctype="multipart/form-data">
              @csrf					
                            <div class="form-group">
                                 <h5>{{ __('Shipping areas name') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="area_name" class="form-control" value="{{ $areas->area_name }}">
                                     @error('areas_name')
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
@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">{{ __('Edit slider') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
            @csrf	
            <input type="hidden" name="id" value="{{ $sliders->id }}">
            <input type="hidden" name="image_old" value="{{ $sliders->img_slider }}">		

                            <div class="form-group">
                                 <h5>{{ __('Slider title') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="title" class="form-control" value="{{ $sliders->title }}">
                                 </div>
                             </div>

                             <div class="form-group">
                                <h5>{{ __('Slider description') }} <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="description" class="form-control" value="{{ $sliders->description }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>{{ __('Slider image') }} <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="img_slider" class="form-control" value="{{ $sliders->img_slider }}">
                                    @error('img_slider')
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
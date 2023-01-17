@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

   
    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">{{ __('Edit district') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('district.update', $district->id) }}" enctype="multipart/form-data">
              @csrf					
                            <div class="form-group">
                                 <h5>{{ __('Shipping areas name') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <select name="area_id" class="form-control"  >
                                      <option value="" selected="" disabled="">{{ __('Select shipping area') }}</option>
                                      @foreach($area as $div)
                                      <option value="{{ $div->id }}" {{ $div->id == $district->area_id ? 'selected': '' }} >{{ $div->area_name }}</option>	
                                      @endforeach
                                    </select>
                                    @error('area_id') 
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror 
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>{{ __('District name') }}<span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <input type="text"  name="district_name" class="form-control" value="{{ $district->district_name }}" > 
                                  @error('district_name') 
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
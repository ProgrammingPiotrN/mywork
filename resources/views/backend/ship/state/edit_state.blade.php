@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">{{ __('Edit state') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('state.update', $state->id) }}" enctype="multipart/form-data">
              @csrf					
              <div class="form-group">
                <h5>{{ __('Shipping areas name') }}<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <select name="area_id" class="form-control"  >
                          <option value="" selected="" disabled="">{{ __('Select shipping area') }}</option>
                          @foreach($area as $div)
                          <option value="{{ $div->id }}" {{ $div->id == $state->area_id ? 'selected': '' }}>{{ $div->area_name }}</option>	
                          @endforeach
                      </select>
                      @error('area_id') 
                  <span class="text-danger">{{ $message }}</span>
                  @enderror 
                  </div>
                </div>

                <div class="form-group">
                    <h5>{{ __('District select') }}<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="district_id" class="form-control"  >
                          <option value="" selected="" disabled="">{{ __('District select') }}</option>
                          @foreach($district as $dis)
                          <option value="{{ $dis->id }}" {{ $dis->id == $state->district_id ? 'selected': '' }}>{{ $dis->district_name }}</option>	
                          @endforeach
                        </select>
                        @error('district_id') 
                      <span class="text-danger">{{ $message }}</span>
                      @enderror 
                    </div>
                </div>

                <div class="form-group">
                  <h5>{{ __('State name') }}<span class="text-danger">*</span></h5>
                  <div class="controls">
                 <input type="text"  name="state_name" class="form-control" value="{{ $state->state_name }}"> 
                 @error('state_name') 
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
@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('State list') }}</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>{{ __('Shipping areas name') }}</th>
                <th>{{ __('District name') }}</th>
                <th>{{ __('State name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($state as $item)
            
            <tr>
              {{-- <td>{{ $item['area']['area_name'] }}</td>  --}}
              <td>{{ $item->area->area_name }}</td> 

              <td>{{ $item['district']['district_name'] }}</td>   
              <td>{{ $item->state_name }}</td>             
              <td width="25%">
                <a href="{{ route('state.edit', $item->id) }}" class="btn btn-info">{{ __('Edit') }}</a> 
                <a href="{{ route('state.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">{{ __('Delete') }}</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">{{ __('Add state') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('state.store') }}" enctype="multipart/form-data">
              @csrf					
              <div class="form-group">
                <h5>{{ __('Shipping areas name') }}<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <select name="area_id" class="form-control"  >
                          <option value="" selected="" disabled="">{{ __('Select shipping area') }}</option>
                          @foreach($area as $div)
                          <option value="{{ $div->id }}">{{ $div->area_name }}</option>	
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
                          <option value="{{ $dis->id }}">{{ $dis->district_name }}</option>	
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
                 <input type="text"  name="state_name" class="form-control" > 
                 @error('state_name') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                </div>
                </div>

                <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('Add') }}">
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
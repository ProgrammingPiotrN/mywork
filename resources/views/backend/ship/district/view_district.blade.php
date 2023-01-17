@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('District list') }}</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>{{ __('Area name') }}</th>
                <th>{{ __('District name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($district as $item)
            
            <tr>
              <td>{{ $item['area']['area_name'] }}</td> 
              <td>{{ $item->district_name }}</td>                             
              <td width="25%">
                <a href="{{ route('district.edit', $item->id) }}" class="btn btn-info">{{ __('Edit') }}</a> 
                <a href="{{ route('district.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">{{ __('Delete') }}</a>
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
         <h3 class="box-title">{{ __('Add district') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('district.store') }}" enctype="multipart/form-data">
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
                    <h5>{{ __('District name') }}<span class="text-danger">*</span></h5>
                    <div class="controls">
                  <input type="text"  name="district_name" class="form-control" > 
                  @error('district_name') 
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
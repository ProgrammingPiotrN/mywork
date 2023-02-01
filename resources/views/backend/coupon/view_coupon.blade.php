@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Coupon list') }} <span class="badge badge-pill badge-danger">
          {{ count($coupons) }}</span></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>{{ __('Coupon name') }}</th>
                <th>{{ __('Coupon discount') }}</th>
                <th>{{ __('Validity') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($coupons as $item)
            
            <tr>
                <td>{{ $item->name_coupon }}</td>
                <td>{{ $item->discount_coupon }}%</td>
                <td width="25%">
                  {{ Carbon\Carbon::parse($item->validity_coupon)->format('Y-m-d')}}
                </td>
                <td>
                  @if($item->validity_coupon >= Carbon\Carbon::now()->format('Y-m-d'))
                  <span class="badge badge-pill badge-success"> {{ __('Valid') }} </span>
                  @else
                  <span class="badge badge-pill badge-danger"> {{ __('Invalid') }} </span>
                  @endif
                </td>
              <td width="25%">
                <a href="{{ route('coupon.edit', $item->id) }}" class="btn btn-info">{{ __('Edit') }}</a> 
                <a href="{{ route('coupon.delete', $item->id) }}" class="btn btn-danger" data-id="{{ $item->id }}" id="delete">{{ __('Delete') }}</a>
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
         <h3 class="box-title">{{ __('Add coupon') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
              @csrf					
                            <div class="form-group">
                                 <h5>{{ __('Coupon name') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="name_coupon" class="form-control">
                                     @error('name_coupon')
                                        <span class="text-danger">{{ $message }}</span> 
                                     @enderror
                                 </div>
                            </div>

                            <div class="form-group">
                              <h5>{{ __('Coupon discount') }}(%) <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="discount_coupon" class="form-control">
                                  @error('discount_coupon')
                                     <span class="text-danger">{{ $message }}</span> 
                                  @enderror
                              </div>
                            </div>

                              <div class="form-group">
                                <h5>{{ __('Validity Date') }}<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="validity_coupon" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('validity_coupon')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                              </div>

                <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('add new coupon') }}">
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
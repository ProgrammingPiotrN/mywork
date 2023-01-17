@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

   
    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">{{ __('Edit coupon') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="post" action="{{ route('coupon.update', $coupons->id) }}" enctype="multipart/form-data">
              @csrf					
                            <div class="form-group">
                                 <h5>{{ __('Coupon name') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="name_coupon" class="form-control" value="{{ $coupons->name_coupon }}">
                                     @error('name_coupon')
                                        <span class="text-danger">{{ $message }}</span> 
                                     @enderror
                                 </div>
                            </div>

                            <div class="form-group">
                              <h5>{{ __('Coupon discount') }}(%) <span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="discount_coupon" class="form-control" value="{{ $coupons->discount_coupon }}">
                                  @error('discount_coupon')
                                     <span class="text-danger">{{ $message }}</span> 
                                  @enderror
                              </div>
                            </div>

                              <div class="form-group">
                                <h5>{{ __('Validity Date') }}<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="validity_coupon" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupons->validity_coupon }}">
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
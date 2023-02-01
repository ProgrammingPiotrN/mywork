@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

      <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">{{ __('Search by month') }}</h3>
       </div>
       <div class="box-body">
         <div class="table-responsive">
          <form method="POST" action="{{ route('search.month') }}">
            @csrf					
                            <div class="form-group">
                                 <h5>{{ __('Select month') }} <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                    <select name="month" class="form-control">
                                        <option label="{{ __('Choose one') }}"></option>  
                                        <option value="January">{{ __('January') }}</option> 
                                        <option value="February">{{ __('February') }}</option>  
                                        <option value="March">{{ __('March') }}</option>  
                                        <option value="April">{{ __('April') }}</option>  
                                        <option value="May">{{ __('May') }}</option>  
                                        <option value="June">{{ __('June') }}</option>  
                                        <option value="July">{{ __('July') }}</option>  
                                        <option value="August">{{ __('August') }}</option>  
                                        <option value="September">{{ __('September') }}</option>  
                                        <option value="October">{{ __('October') }}</option>  
                                        <option value="November">{{ __('November') }}</option>  
                                        <option value="December">{{ __('December') }}</option>    
                                    </select>                                     
                                    @error('month')
                                        <span class="text-danger">{{ $message }}</span> 
                                     @enderror
                                 </div>
                             </div>

                             <div class="form-group">
                                <h5>{{ __('Select year') }} <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <select name="year_name" class="form-control">
                                       <option label="Choose one"></option>  
                                       <option value="2020">2020</option> 
                                       <option value="2021">2021</option>  
                                       <option value="2022">2022</option>  
                                       <option value="2023">2023</option>     
                                   </select>                                     
                                   @error('year_name')
                                       <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>
                <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('Search') }}">
             </div>
            </form>
         </div>
       </div>
       </div>
     </div>
    </div>
    <div class="col-12">

        <div class="box">
         <div class="box-header with-border">
           <h3 class="box-title">{{ __('Search by date') }}</h3>
         </div>
         <div class="box-body">
           <div class="table-responsive">
            <form method="POST" action="{{ route('search.date') }}">
              @csrf					
                              <div class="form-group">
                                   <h5>{{ __('Select date') }} <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                       <input type="date" name="date" class="form-control">
                                       @error('date')
                                          <span class="text-danger">{{ $message }}</span> 
                                       @enderror
                                   </div>
                               </div>
  
                  <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('Search') }}">
               </div>
              </form>
           </div>
         </div>
             </div>
             <div class="col-12">

                <div class="box">
                 <div class="box-header with-border">
                   <h3 class="box-title">{{ __('Search by year') }}</h3>
                 </div>
                 <div class="box-body">
                   <div class="table-responsive">
                    <form method="POST" action="{{ route('search.year') }}">
                      @csrf					
                        <div class="form-group">
                            <h5>{{ __('Select year') }} <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <select name="year" class="form-control">
                                <option label="{{ __('Choose one') }}"></option>  
                                <option value="2020">2020</option> 
                                <option value="2021">2021</option>  
                                <option value="2022">2022</option>  
                                <option value="2023">2023</option>     
                            </select>                                     
                           @error('year')
                               <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
          
                          <div class="text-xs-right"><br>
                          <input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('Search') }}">
                       </div>
                      </form>
                   </div>
  </section>
  
  </div>

  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break; 
    }
    @endif 
   </script>
   
@endsection
@extends('admin.admin')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">

    <section class="content">
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">{{ __('Change password') }}</h4>
           </div>
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method="post" action="{{ route('update.change.password') }}">
                   @csrf
                     <div class="row">
                       <div class="col-12">						

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('Current password') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="current_password" name="oldpassword" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('New password') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password" name="password" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('Confirm password') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                       <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                    </div>
                   </form>

               </div>
             </div>
           </div>
         </div>
       </section>
   
</div>    

@endsection 
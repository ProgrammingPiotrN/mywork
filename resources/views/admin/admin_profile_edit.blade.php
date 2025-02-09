@extends('admin.admin')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">

    <section class="content">
         <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">{{ __('Edit Admin Profile') }}</h4>
          </div>
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method="post" action="{{ route('admin.profile.store') }}" 
                   enctype="multipart/form-data">
                   @csrf
                     <div class="row">
                       <div class="col-12">						

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('Admin name') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('Admin email') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" required="" value="{{ $editData->email }}">
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>{{ __('Profile image') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control" required="" id="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img class="rounded-circle" id="ShowImage" src="{{ (!empty($editData->profile_photo_path))? url('upload/admin_photos/'.$editData->profile_photo_path):url('upload/admin.png') }}" alt="User Avatar"
                                    style="width: 100px; height: 100px">
                                </div>
                            </div>
                        <br/>
                       <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{ __('Update') }}">
                    </div>
                   </form>

               </div>
             </div>
           </div>
         </div>
       </section>
   
</div>    

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImages').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection 
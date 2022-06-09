@extends('admin.admin')
@section('admin')

<div class="container-full">


    <section class="content">
        <div class="row">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black">
                  <h3 class="widget-user-username">Admin Name: {{ $adminData->name }}</h3>

                  <a href="{{ route('admin.profile.edit') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Edit profile</a>

                  <h6 class="widget-user-desc">Admin email: {{ $adminData->email }}</h6>
                </div>
                <div class="widget-user-image">
                  <img class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_photos/'.$adminData->profile_photo_path):url('upload/admin.png') }}" alt="User Avatar">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header"></h5>
                        <span class="description-text"></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 br-1 bl-1">
                      <div class="description-block">
                        <h5 class="description-header"></h5>
                        <span class="description-text"></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header"></h5>
                        <span class="description-text"></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>
        </div>
    </section>
</div>    
@endsection 
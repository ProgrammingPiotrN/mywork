@extends('admin.admin')
@section('admin')


  <div class="container-full">
  <section class="content">
    <div class="row">

    <div class="col-12">

     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('All user list') }} <span class="badge badge-pill badge-danger">
            {{ count($users) }}</span></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th> 
                <th>{{ __('Phone') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <img src="{{ (!empty($user->profile_photo_path))? 
                    url('upload/user_photos/'.$user->profile_photo_path):
                    url('upload/user_photos/user.png') }}" style="width: 70px; height: 40px;">
                </td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->phone}}</td>
                <td><span class="badge badge-pill badge-success">{{ __('Active') }}</span></td>
                <td>{{ $user->status}}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
          </div>
        </div>
      </div>
    </div> 
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
@extends('frontend.main')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%" src="{{
                     (!empty($user->profile_photo_path))? 
                     url('upload/user_photos/'.$user->profile_photo_path):
                     url('upload/user_photos/user.png') }}"
                      height="100" width="100"><br><br>
                      <ul class="list-group list-group-flush"><br>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
            </div>

            <div class="col-md-2">

            </div>
             <div class="col-md-6">
                <div class="card">
                   <h3 class="text-center"><span class="text-danger">WELCOME</span>
                    <strong>{{ Auth::user()->name }}</strong><br>Change password</h3> 
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.password.update') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current password<span></span></label>
                                <input type="password" id="current_password" name="oldpassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New password<span></span></label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm password<span></span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                           <br/>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
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
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">{{ __('Home') }}</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">{{ __('Profile update') }}</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">{{ __('Change password') }}</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">{{ __('Logout') }}</a>
                      </ul>
              </div>
              
           
             <div class="col-md-6">
                <div class="card">
                   <h3 class="text-center"><span class="text-danger">{{ __('WELCOME') }}</span>
                    <strong>{{ Auth::user()->name }}</strong><br>{{ __('Update your profile') }}</h3> 
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.profile.store') }}"
                         enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('Name') }}<span></span></label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('Email') }}<span></span></label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('Phone') }}<span></span></label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('User photos') }}<span></span></label>
                                <input type="file" name="profile_photo_path" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">{{ __('Update') }}</button>
                            </div>
                           <br/>
                        </form>  
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
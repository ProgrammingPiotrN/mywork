@extends('frontend.main')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                   <h3 class="text-center"><span class="text-danger">{{ __('WELCOME') }}</span>
                    <strong>{{ Auth::user()->name }}</strong>
                       </h3> 
                </div>
            </div>
            <div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%" src="{{
                     (!empty($user->profile_photo_path))? 
                     url('upload/user_photos/'.$user->profile_photo_path):
                     url('upload/user.png') }}" height="100" width="100">
                     <ul class="list-group list-group-flush"><br>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">{{ __('Home') }}</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">{{ __('Profile update') }}</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">{{ __('Change password') }}</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">{{ __('Logout') }}</a>
                    </ul>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
</div>

@endsection
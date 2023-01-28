@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp

<img class="card-img-top" style="border-radius: 50%" src="{{
    (!empty($user->profile_photo_path))? 
    url('upload/user_photos/'.$user->profile_photo_path):
    url('upload/user_photos/user.png') }}"
     height="100" width="100"><br><br>
     <ul class="list-group list-group-flush"><br>
       <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">{{ __('Home') }}</a>
       <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">{{ __('Profile update') }}</a>
       <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">{{ __('Change password') }}</a>
       <a href="{{ route('user.orders') }}" class="btn btn-primary btn-sm btn-block">{{ __('Orders') }}</a>
       <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">{{ __('Logout') }}</a>
     </ul>
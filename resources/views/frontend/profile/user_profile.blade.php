@extends('frontend.main')
@section('content')

<div class="body-content">
      <div class="container">
          <div class="row">
            <div class="col-md-2"><br>
                @include('frontend.user_menu.user_menu')
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
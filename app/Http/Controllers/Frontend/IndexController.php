<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;

use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $prod = Product::where('status', 1)->orderBy('id', 'DESC')->limit(100)->get();
        $slider = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $cat = Category::orderBy('name_category', 'ASC')->get();   
        return view('frontend.index', compact('cat', 'slider', 'prod'));
    }
    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }
    public function ProfileUser(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }
    public function StoreProfileUser(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;


        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_photos/'.$data->profile_photo_path));
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/user_photos/'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
			'message' => 'User profile updated successfully',
			'alert-type' => 'success'
		);

        return redirect()->route('dashboard')->with($notification);
    }
    public function ChangeUserPassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }
    public function PasswordUserUpdate(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}


    }

    public function UserLogin(array $input)
    {
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

    }

}


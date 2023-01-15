<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImage;

use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $prod = Product::where('status', 1)->orderBy('id', 'DESC')->limit(100)->get();
        $slider = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $cat = Category::orderBy('name_category', 'ASC')->get();   
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(100)->get();
        $hotdeals = Product::where('deals', 1)->where('price_discount', '!=', NULL)->orderBy('id', 'DESC')->limit(6)->get();
        $specialoffer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(100)->get();
        $specialdeals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(100)->get();

        $category_skip_0 = Category::skip(0)->first();
        $product_skip_0 = Product::where('status', 1)->where('category_id', $category_skip_0->id)->orderBy('id', 'DESC')->get();

        $category_skip_1 = Category::skip(1)->first();
        $product_skip_1 = Product::where('status', 1)->where('category_id', $category_skip_1->id)->orderBy('id', 'DESC')->get();

        $category_skip_2 = Category::skip(2)->first();
        $product_skip_2 = Product::where('status', 1)->where('category_id', $category_skip_2->id)->orderBy('id', 'DESC')->get();

        return view('frontend.index', compact('cat', 'slider', 'prod', 'featured', 'hotdeals', 'specialoffer', 'specialdeals',
    'category_skip_0', 'product_skip_0', 'category_skip_1', 'product_skip_1', 'category_skip_2', 'product_skip_2'));

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
    {dd($input);
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
    }

    public function DetailsProduct($id,$slug){

        $product = Product::findOrFail($id);

        $hotdeals = Product::where('deals', 1)->where('price_discount', '!=', NULL)->orderBy('id', 'DESC')->limit(6)->get();

        $weight = $product->weight_product;
        $weight_product = explode(',', $weight);

        $multiImg = MultiImage::where('product_id', $id)->get(); 

        $cat_id = $product->category_id;
        $productRelated = Product::where('category_id', $cat_id)->where('category_id', '!=', $id)->orderBy('id', 'DESC')->get();

        return view('frontend.product.details_product', compact('product', 'multiImg', 'weight_product', 'productRelated', 'hotdeals'));
    }

    public function TagsProduct($tag){

        $products = Product::where('status', 1)->where('tags_product', $tag)->orderBy('id', 'DESC')->paginate(3);
        $cat = Category::orderBy('name_category', 'ASC')->get();   
        return view('frontend.tags.tags_view', compact('products', 'cat'));

    }

    public function SubCategoryProduct($subc_id, $slug){

        $products = Product::where('status', 1)->where('subcategory_id', $subc_id)->orderBy('id', 'DESC')->paginate(3);
        $cat = Category::orderBy('name_category', 'ASC')->get();   
        return view('frontend.product.view_subcategory', compact('products', 'cat'));

    }

    public function SubSubCategoryProduct($subsubc_id, $slug){

        $products = Product::where('status', 1)->where('subsubcategory_id', $subsubc_id)->orderBy('id', 'DESC')->paginate(3);
        $cat = Category::orderBy('name_category', 'ASC')->get();   
        return view('frontend.product.view_subsubcategory', compact('products', 'cat'));

    }

    public function ModelProductAjax($id){

        $product = Product::with('category', 'brand')->findOrFail($id);

        $weight_prod = $product->weight_product;
        $product_weight = explode(',', $weight_prod);

        return response()->json(array(
            'product' => $product,
            'weight' => $product_weight,
        ));

    }

}


<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Wishlist;

use Carbon\Carbon;

class WishlistController extends Controller
{

    public function WishlistSite(){

        return view('frontend.wishlist.wishlist');

    }

    public function WishlistAjax(){

        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);

    }

    public function WishlistRemoveAjax($id){

        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();

        return response()->json(['success' => 'Successfully product remove / Usunięto produkt z koszyka']);

    }

}

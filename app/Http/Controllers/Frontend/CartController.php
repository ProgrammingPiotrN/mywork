<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;

use Auth;

use App\Models\Wishlist;
use App\Models\Coupon;

use Carbon\Carbon;

class CartController extends Controller
{
    
    public function AddToCartAjax(Request $request, $id){

        $product = Product::findOrFail($id);

        if($product->price_discount == NULL){

            Cart::add([
             'id' => $id,
             'name' => $request->name_product, 
             'qty' => $request->quantity, 
             'price' => $product->price_selling,
             'weight' => 1, 
             'options' => [
              'image' => $product->thambnail_product,
              'weight' => $request->weight,
             ],
            ]);

            return response()->json(['success' => 'Successfully added to your cart / Udało się dodać produkt']);

        }else{

            Cart::add([
              'id' => $id,
              'name' => $request->name_product, 
              'qty' => $request->quantity, 
              'price' => $product->price_discount,
              'weight' => 1, 
              'options' => [
              'image' => $product->thambnail_product,
              'weight' => $request->weight,
              ],
            ]);

            return response()->json(['success' => 'Successfully added to your cart / Udało się dodać produkt']);


        }

    }

    public function AddToSmallCartAjax(){

      $carts = Cart::content();
      $cartQuantity = Cart::count();
      $cartTotal = Cart::total();

      return response()->json(array(
        'carts' => $carts,
        'cartQuantity' => $cartQuantity,
        'cartTotal' => $cartTotal,
      ));

    }

    public function RemoveProductAjax($rowId){

      Cart::remove($rowId);

      return response()->json(['success' => 'Product remove from cart / Produkt usunięty z koszyka']);

    }

    public function WishlistAjax(Request $request, $product_id){

      if(Auth::check()){

        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

        if(!$wishlist){
          Wishlist::insert([

            'user_id' => Auth::id(),
            'product_id' => $product_id,
            'created_at' => Carbon::now(),

          ]);

          return response()->json(['success' => 'Successfully added on your wishlist / Dodano produkt do listy życzeń']);

        }else{

          return response()->json(['error' => 'This product has already on your wishlist / Ten produkt jest już na Twojej liście życzeń']);

        }

        

      }else{

        return response()->json(['error' => 'At first login a your account / Najpierw zaloguj się na swoje konto']);

      }

    }

    public function ApplyCoupon(Request $request){

    }

}

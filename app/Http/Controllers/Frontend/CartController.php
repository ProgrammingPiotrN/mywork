<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;

use Auth;

use App\Models\Wishlist;
use App\Models\Coupon;

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

class CartController extends Controller
{
    
    public function AddToCartAjax(Request $request, $id){

      if (Session::has('coupon')) {
        Session::forget('coupon');
      }

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

          $coupon = Coupon::where('name_coupon',$request->name_coupon)->where('validity_coupon','>=',Carbon::now()->format('Y-m-d'))->first();
            if ($coupon) {

                Session::put('coupon',[
                    'name_coupon' => $coupon->name_coupon,
                    'discount_coupon' => $coupon->discount_coupon,
                    'discount_amount' => round(Cart::total() * $coupon->discount_coupon/100), 
                    'total_amount' => round(Cart::total() - Cart::total() * $coupon->discount_coupon/100) 
                  ]);

              return response()->json(array(
  
                  'success' => 'Coupon applied successfully / Kupon jest poprawny'
              ));
  
          }else{
              return response()->json(['error' => 'Invalid coupon / Nieważny kupon']);
          }
  
      }

      public function CalculationCoupon(){

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'name_coupon' => session()->get('coupon')['name_coupon'],
                'discount_coupon' => session()->get('coupon')['discount_coupon'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
    }

    public function RemoveCoupon(){

      Session::forget('coupon');
      return response()->json(['success' => 'Coupon remove successfully / Usunięto kupon']);

    }

    public function CreateCheckout(){

      if (Auth::check()) {
          if (Cart::total() > 0) {

      $cart = Cart::content();
      $qtyCart = Cart::count();
      $totalCart = Cart::total();


      return view('frontend.checkout.view_checkout',compact('cart','qtyCart','totalCart'));

          }else{

          $notification = array(
          'message' => 'Shopping at list one product / Na liście może znajdować się tylko jeden produkt',
          'alert-type' => 'error'
      );

      return redirect()->to('/')->with($notification);

          }


      }else{

           $notification = array(
          'message' => 'You need to login first / Najpierw musisz się zalogować',
          'alert-type' => 'error'
      );

      return redirect()->route('login')->with($notification);

      }

  }

}

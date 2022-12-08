<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;

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

}

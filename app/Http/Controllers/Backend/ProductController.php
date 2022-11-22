<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImage;

use Carbon\Carbon;
use Image;



class ProductController extends Controller
{
    
    public function ProductAdd(){

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.add_product', compact('categories', 'brands'));

    }

    public function ProductStore(Request $request){

        $imageprod = $request->file('thambnail_product');
        $nameprod_generate = hexdec(uniqid()).''.$imageprod->getClientOriginalExtension();
        Image::make($imageprod)->resize(900,1000)->save('upload/product/thamb/'.$nameprod_generate);
        $saveprod_url = 'upload/product/thamb/'.$nameprod_generate;

        $product_id = Product::insert([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'name_product' => $request->name_product,
            'slug_product' => strtolower(str_replace(' ', '-', $request->name_product)),
            'code_product' => $request->code_product,
            'quantity_product' => $request->quantity_product,
            'tags_product' => $request->tags_product,
            'weight_product' => $request->weight_product,
            'price_selling' => $request->price_selling,
            'price_discount' => $request->price_discount,
            'description_short' => $request->description_short,
            'description_long' => $request->description_long,
            'deals' => $request->deals,
            'featured' => $request->featured,
            'special_deals' => $request->special_deals,
            'special_offer' => $request->special_offer,
            'thambnail_product' => $saveprod_url,
            'status' => 1,
            'created_at' => Carbon::now()

        ]);

        $imagesprod = $request->file('multi_image');
        foreach($imagesprod as $img){

            $prodname_generate = hexdec(uniqid()).''.$img->getClientOriginalExtension();
            Image::make($img)->resize(900,1000)->save('upload/product/multiImg/'.$prodname_generate);
            $prodsave_url = 'upload/product/multiImg/'.$prodname_generate;

            MultiImage::insert([

                'product_id' => $product_id,
                'name_photo' => $prodsave_url,
                'created_at' => Carbon::now()

            ]);

        }
     
        $notification = array(
            'message' => 'Product inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.list')->with($notification);

    }

    public function ProductList(){

        $products = Product::latest()->get();
        return view('backend.product.view_product', compact('products'));

    }

    public function EditProduct($id){

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $subsubcategory = SubSubcategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.edit_product', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products'));

    }

    public function UpdateProduct(Request $request){

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'name_product' => $request->name_product,
            'slug_product' => strtolower(str_replace(' ', '-', $request->name_product)),
            'code_product' => $request->code_product,
            'quantity_product' => $request->quantity_product,
            'tags_product' => $request->tags_product,
            'weight_product' => $request->weight_product,
            'price_selling' => $request->price_selling,
            'price_discount' => $request->price_discount,
            'description_short' => $request->description_short,
            'description_long' => $request->description_long,
            'deals' => $request->deals,
            'featured' => $request->featured,
            'special_deals' => $request->special_deals,
            'special_offer' => $request->special_offer,
            'status' => 1,
            'created_at' => Carbon::now()

        ]);

        $notification = array(
            'message' => 'Product updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product.list')->with($notification);

    }

}

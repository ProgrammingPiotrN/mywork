<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubcategory;
use App\Models\Brand;
use App\Models\Product;

use Carbon\Carbon;



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

        Product::insert([

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

    }

}

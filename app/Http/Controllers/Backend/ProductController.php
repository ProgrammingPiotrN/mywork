<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;


class ProductController extends Controller
{
    
    public function ProductAdd(){
  
		$subcategories = Subcategory::orderBy('name_subcategory', 'ASC')->get();
		$subcategories = Subcategory::latest()->get();
		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.add_product',compact('categories','brands'));

    }

}

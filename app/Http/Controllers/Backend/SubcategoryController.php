<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;


class SubcategoryController extends Controller
{
    public function Subcategory(){

        $categories = Category::OrderBy('name_category', 'ASC')->get();
        $subcategory = Subcategory::latest()->get();
        return view('backend.subcategory.subcategory_view', compact('subcategory', 'categories'));

    }

    public function SubcategoryStore(Request $request){

        $request->validate([
            'category_id' => 'required',
            'name_subcategory' => 'required',
        ],
        [
            'category_id.required' => 'Please select option',
            'name_subcategory.required' => 'Please enter the name of the subcategory',
        ]);

        Subcategory::insert([
            'category_id' => $request->category_id,
            'name_subcategory' => $request->name_subcategory,
            'slug_subcategory' => str_replace(' ', '-',$request->name_subcategory),
        ]);

        $notification = array(
			'message' => 'Subcategory inserted successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function EditSubcategory($id){

        $categories = Category::OrderBy('name_category', 'ASC')->get();
        $category = Category::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('subcategory', 'categories'));

    }

}

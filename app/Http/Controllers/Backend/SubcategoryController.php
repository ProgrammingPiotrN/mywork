<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\SubSubcategory;




class SubcategoryController extends Controller
{
    public function Subcategory(){

        $categories = Category::orderBy('name_category', 'ASC')->get();
        $subcategory = Subcategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory', 'categories'));

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

        $categories = Category::orderBy('name_category', 'ASC')->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));

    }

    public function UpdateSubcategory(Request $request){

        $sub_id = $request->id;

        Subcategory::findOrFail($sub_id)->update([
            'category_id' => $request->category_id,
            'name_subcategory' => $request->name_subcategory,
            'slug_subcategory' => str_replace(' ', '-',$request->name_subcategory),
        ]);

        $notification = array(
			'message' => 'Subcategory updated successfully',
			'alert-type' => 'info'
		);

        return redirect()->route('view.subcategory')->with($notification);

    }

    public function DeleteSubcategory($id){

        Subcategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Subcategory deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    // SubSubCategory 

    public function SubSubcategory(){

        $categories = Category::orderBy('name_category', 'ASC')->get();
        $subsubcategory = SubSubcategory::latest()->get();
        return view('backend.category.subsubcategory_view', compact('subsubcategory', 'categories'));

    }

    public function GetAjaxSubCategory($category_id){

        $subc = Subcategory::where('category_id', $category_id)->orderBy('name_subcategory', 'ASC')->get();
        return json_encode($subc);

    }

    public function GetAjaxSubSubCategory($subcategory_id){

        $subsubc = SubSubcategory::where('subcategory_id', $subcategory_id)->orderBy('name_subsubcategory', 'ASC')->get();
        return json_encode($subsubc);

    }

    public function SubSubCategoryStore(Request $request){

        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name_subsubcategory' => 'required',
        ],
        [
            'category_id.required' => 'Please select option',
            'name_subsubcategory.required' => 'Please enter the name of the subsubcategory',
        ]);

        SubSubcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name_subsubcategory' => $request->name_subsubcategory,
            'slug_subsubcategory' => str_replace(' ', '-',$request->name_subsubcategory),
        ]);

        $notification = array(
			'message' => 'SubSubCategory inserted successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function EditSubSubCategory($id){

        $categories = Category::orderBy('name_category', 'ASC')->get();
        $subcategories = Subcategory::orderBy('name_subcategory', 'ASC')->get();
        $subsubcategories = SubSubcategory::findOrFail($id);
        return view('backend.category.subsubcategory_edit', compact('subcategories', 'categories', 'subsubcategories'));

    }
   
    public function UpdateSubSubCategory(Request $request){

        $subsubcat_id = $request->id;

        SubSubcategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name_subsubcategory' => $request->name_subsubcategory,
            'slug_subsubcategory' => str_replace(' ', '-',$request->name_subsubcategory),
        ]);

        $notification = array(
			'message' => 'SubSubCategory updated successfully',
			'alert-type' => 'info'
		);

        return redirect()->route('view.subsubcategory')->with($notification);

    }

    public function DeleteSubSubCategory($id){

        SubSubcategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubSubCategory deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

}

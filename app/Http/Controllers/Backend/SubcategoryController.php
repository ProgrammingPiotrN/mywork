<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Subsubcategory;


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

    public function Subsubcategory(){

        $categories = Category::orderBy('name_category','ASC')->get();
           $subsubcategory = Subsubcategory::latest()->get();
           return view('backend.category.subsubcategory_view',compact('subsubcategory','categories'));
   
        }

}

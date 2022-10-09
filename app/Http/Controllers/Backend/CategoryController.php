<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Category(){

        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));

    }

    public function CategoryStore(Request $request){

        $request->validate([
            'name_category' => 'required'

        ],
        [
            'name_category.required' => 'Category name',
        ]);

        Category::insert([
            'name_category' => $request->name_category,
            'slug_category' => str_replace(' ', '-',$request->name_category),
        ]);

        $notification = array(
			'message' => 'Category inserted successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function EditCategory($id){

        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));

    }

    public function UpdateCategory(Request $request){

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name_category' => $request->name_category,
            'slug_category' => str_replace(' ', '-',$request->name_category),
        ]);

        $notification = array(
			'message' => 'Category updated successfully',
			'alert-type' => 'success'
		);

        return redirect()->route('view.category')->with($notification);
    }

    public function DeleteCategory($id){

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);


    }

}

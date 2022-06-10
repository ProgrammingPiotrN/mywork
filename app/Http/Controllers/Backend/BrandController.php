<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function Brand(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request){

        $request->validate([
            'name_brand' => 'required',
            'brand_photos' => 'required'

        ],
        [
            'name_brand.required' => 'Brand name',
        ]);

        $image = $request->file('brand_photos');
        $name_generate = hexdec(uniqid()).''.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_generate);
        $save_url = 'upload/brand/'.$name_generate;

        Brand::insert([
            'name_brand' => $request->name_brand,
            'slug_brand' => str_replace(' ', '-',$request->name_brand),
            'brand_photos' => $save_url,
        ]);

        $notification = array(
			'message' => 'Brand inserted successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function EditBrand($id){

        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));

    }

    public function UpdateBrand(Request $request){

        $brand_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('brand_photos')){

            unlink($old_img);
            $image = $request->file('brand_photos');
            $name_generate = hexdec(uniqid()).''.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_generate);
            $save_url = 'upload/brand/'.$name_generate;
    
            Brand::findOrFail($brand_id)->update([
                'name_brand' => $request->name_brand,
                'slug_brand' => str_replace(' ', '-',$request->name_brand),
                'brand_photos' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Brand updated successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.brand')->with($notification);
        }else{
            Brand::findOrFail($brand_id)->update([
                'name_brand' => $request->name_brand,
                'slug_brand' => str_replace(' ', '-',$request->name_brand),
            ]);
    
            $notification = array(
                'message' => 'Brand updated successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('all.brand')->with($notification);
        }

    }

}

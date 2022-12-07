<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function Slider(){

        $sliders = Slider::latest()->get();
        return view('backend.slider.view_slider', compact('sliders'));

    }

    public function SliderStore(Request $request){

        $request->validate([
            'img_slider' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

            $img = $request->file('img_slider');
            $gen_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,300)->save('upload/slider/'.$gen_name);
            $save_url = 'upload/slider/'.$gen_name;

            Slider::insert([

                'title' => $request->title,
                'description' => $request->description,
                'img_slider' => $save_url,

            ]);

            $notification = array(
                'message' => 'Slider inserted successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

    }

    public function EditSlider($id){

        $sliders = Slider::findOrFail($id);
        return view('backend.slider.edit_slider', compact('sliders'));

    }

    public function SliderUpdate(Request $request){

        $slider_id = $request->id;
        $img_old = $request-> image_old;

        if($request->file('img_slider')){

            unlink($img_old);
            $image = $request->file('img_slider');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(800,300)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;

            Slider::findOrFail($slider_id)->update([

                'title' => $request->title,
                'description' => $request->description,
                'img_slider' => $save_url,

            ]);

            
            $notification = array(
                'message' => 'Slider updated successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('slider.view')->with($notification);

        }else{

            Slider::findOrFail($slider_id)->update([

                'title' => $request->title,
                'description' => $request->description,

            ]);

            $notification = array(
                'message' => 'Slider updated without image successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->route('slider.view')->with($notification);

        }

    }

    public function DeleteSlider($id){

        $slider = Slider::findOrFail($id);
        $img = $slider->img_slider;
        unlink($img);
        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider deleted successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function SliderInactive($id){

        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider inactive successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function SliderActive($id){

        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Slider active successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

}

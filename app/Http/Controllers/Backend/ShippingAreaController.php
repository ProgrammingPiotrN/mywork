<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShipArea;
use App\Models\ShipDistrict;
use App\Models\ShipState;

use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function ViewArea(){
		$areas = ShipArea::orderBy('id','DESC')->get();
		return view('backend.ship.area.view_area',compact('areas'));

	}

    public function StoreArea(Request $request){

    	$request->validate([
    		'area_name' => 'required',   	 

    	]);


        ShipArea::insert([

            'area_name' => $request->area_name,
            'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Ship area Inserted Successfully / Dodano wysyłkę',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

    }

    public function EditArea($id){

      $areas = ShipArea::findOrFail($id);
       return view('backend.ship.area.edit_area',compact('areas'));

    }

    public function UpdateArea(Request $request, $id){

    	ShipArea::findOrFail($id)->update([

		'area_name' => $request->area_name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Shipping area name updated successfully / Pomyślnie zaktualizowano nazwę obszaru wysyłki',
			'alert-type' => 'info'
		);

		return redirect()->route('area.view')->with($notification);

    } 

    public function DeleteArea($id){

    	ShipArea::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Shipping area deleted successfully / Rodzaj przesyłki został usunięty pomyślnie ',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }

    public function ViewDistrict(){

      $area = ShipArea::orderBy('area_name','ASC')->get();
      $district = ShipDistrict::with('area')->orderBy('id','DESC')->get();
      return view('backend.ship.district.view_district',compact('area','district'));

    }

    public function StoreDistrict(Request $request){

    	$request->validate([
    		'area_id' => 'required',  
    		'district_name' => 'required',  	 

    	]);


      ShipDistrict::insert([

        'area_id' => $request->area_id,
        'district_name' => $request->district_name,
        'created_at' => Carbon::now(),

          ]);

          $notification = array(
          'message' => 'District inserted successfully / Dodano dzielnicę',
          'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function EditDistrict($id){

      $area = ShipArea::orderBy('area_name','ASC')->get();
      $district = ShipDistrict::findOrFail($id);
       return view('backend.ship.district.edit_district',compact('district','area'));

    }

    public function UpdateDistrict(Request $request,$id){

        ShipDistrict::findOrFail($id)->update([

        'area_id' => $request->area_id,
        'district_name' => $request->district_name,
        'created_at' => Carbon::now(),

          ]);

          $notification = array(
          'message' => 'District updated successfully / Zaktualizowano dzielnicę',
          'alert-type' => 'info'
        );

        return redirect()->route('district.view')->with($notification);

    }

    public function DeleteDistrict($id){

        ShipDistrict::findOrFail($id)->delete();

        $notification = array(
        'message' => 'District deleted successfully / Usunięto dzielnicę',
        'alert-type' => 'info'
      );

      return redirect()->back()->with($notification);

    }

    public function ViewState(){

        $area = ShipArea::orderBy('area_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::with('area','district')->orderBy('id','DESC')->get();
        
        return view('backend.ship.state.view_state',compact('area','district','state'));

    }

    public function StoreState(Request $request){

        $request->validate([
          'area_id' => 'required',  
          'district_id' => 'required', 
          'state_name' => 'required', 	 

        ]);


        ShipState::insert([

          'area_id' => $request->area_id,
          'district_id' => $request->district_id,
          'state_name' => $request->state_name,
          'created_at' => Carbon::now(),

            ]);

            $notification = array(
            'message' => 'State inserted successfully / Dodano stan wysyłki',
            'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);

    }

    public function EditState($id){

      $area = ShipArea::orderBy('area_name','ASC')->get();
      $district = ShipDistrict::orderBy('district_name','ASC')->get();
      $state = ShipState::findOrFail($id);

      return view('backend.ship.state.edit_state',compact('area','district','state'));

      }

      public function UpdateState(Request $request,$id){

          ShipState::findOrFail($id)->update([
  
          'area_id' => $request->area_id,
          'district_id' => $request->district_id,
          'state_name' => $request->state_name,
          'created_at' => Carbon::now(),
      
            ]);
      
            $notification = array(
            'message' => 'State updated successfully / Stan został zaktualizowany',
            'alert-type' => 'info'
          );
      
          return redirect()->route('state.view')->with($notification);
   
      }  

      public function DeleteState($id){

        ShipState::findOrFail($id)->delete();
  
        $notification = array(
        'message' => 'State deleted successfully / Stan został usunięty',
        'alert-type' => 'info'
      );
  
      return redirect()->back()->with($notification);
  
      }

}

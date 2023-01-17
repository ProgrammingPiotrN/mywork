<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipState extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',    
        'district_id',   
        'state_name', 
    ];

    public function area(){
    	return $this->belongsTo(ShipArea::class,'area_id','id');
    }

     public function district(){
    	return $this->belongsTo(ShipDistrict::class,'district_id','id');
    }

}

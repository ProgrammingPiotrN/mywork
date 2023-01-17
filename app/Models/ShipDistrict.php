<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipDistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',    
        'district_name',    
    ];

    public function area(){
    	return $this->belongsTo(ShipArea::class,'area_id','id');
    }

}

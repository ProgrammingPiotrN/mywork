<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_coupon',
        'discount_coupon',
        'validity_coupon',
        'status',
    ];


    public function getIsValidAttribute(): bool
    {
        return Carbon::parse($this->getAttribute('validity_coupon'))->timestamp > now()->timestamp;
    }
    
}

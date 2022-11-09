<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'name_product',
        'slug_product',
        'code_product',
        'quantity_product',
        'tags_product',
        'weight_product',
        'price_selling',
        'price_discount',
        'description_short',
        'description_long',
        'thambnail_product',
        'deals',
        'featured',
        'special_deals',
        'special_offer',
        'status',      
    ];
}

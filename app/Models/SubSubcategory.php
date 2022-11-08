<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name_subsubcategory',
        'slug_subsubcategory',
    ];

    public function CategoryCRUD(){

        return $this->belongsTo(Category::class, 'category_id', 'id');

    }

    public function SubCategoryCRUD(){

        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');

    }


}

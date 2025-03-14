<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $fillable = [
        'name_sub',
        'parent_id',
        'img_subcate',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function dishes()
    {
        return $this->hasMany(Dish::class, 'sub_category_id');
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}

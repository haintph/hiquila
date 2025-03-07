<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_active', 'img_category', 'description'];

    /**
     * Mối quan hệ với SubCategory
     */
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_id');
    }
}


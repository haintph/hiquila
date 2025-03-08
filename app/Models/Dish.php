<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\DishVariant; // Đảm bảo import đúng

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'sub_category_id',
        'image',
        'is_available'
    ];

    /**
     * Mối quan hệ với SubCategory.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    /**
     * Mối quan hệ với biến thể món ăn.
     */
    public function variants(): HasMany
    {
        return $this->hasMany(DishVariant::class, 'dish_id');
    }
    /**
     * Mối quan hệ với biến thể album ảnh.
     */
    public function images()
    {
        return $this->hasMany(DishImage::class, 'dish_id');
    }
    
    
}
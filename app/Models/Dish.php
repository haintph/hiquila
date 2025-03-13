<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\DishVariant;
use App\Models\PromotionDish;
use App\Models\DishImage;
use App\Models\SubCategory;

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
        'is_available',
        'is_new'
    ];

    /**
     * Mối quan hệ với SubCategory.
     */
    // public function subCategory(): BelongsTo
    // {
    //     return $this->belongsTo(SubCategory::class, 'sub_category_id');
    // }
    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    

    /**
     * Mối quan hệ với biến thể món ăn.
     */
    public function variants(): HasMany
    {
        return $this->hasMany(DishVariant::class, 'dish_id');
    }

    /**
     * Mối quan hệ với album ảnh.
     */
    public function images(): HasMany
    {
        return $this->hasMany(DishImage::class, 'dish_id');
    }

    /**
     * Lấy khuyến mãi hiện tại của món ăn (nếu có).
     */
    public function activePromotion(): HasOne
    {
        return $this->hasOne(PromotionDish::class, 'dish_id')
                    ->where('is_expired', false)
                    ->latest('created_at'); // Lấy khuyến mãi mới nhất
    }

    /**
     * Lấy tất cả khuyến mãi của món ăn.
     */
    public function promotionDishes(): HasMany
    {
        return $this->hasMany(PromotionDish::class, 'dish_id');
    }

    /**
     * Kiểm tra món có giảm giá không.
     */
    public function isDiscounted(): bool
    {
        return $this->activePromotion()->exists();
    }

    /**
     * Tính giá sau khi giảm (nếu có).
     */
    public function discountedPrice(): float
    {
        $promotion = $this->activePromotion()->first();
        return $promotion ? round($this->price * (1 - $promotion->discount / 100), 2) : $this->price;
    }
}

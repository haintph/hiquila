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
use Illuminate\Database\Eloquent\Builder;

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
        'is_new',
        'view'
    ];

    /**
     * Mối quan hệ với SubCategory.
     */
    // public function subCategory(): BelongsTo
    // {
    //     return $this->belongsTo(SubCategory::class, 'sub_category_id');
    // }
    public function subCategory()
    {
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
            ->where('status', 1) // Chỉ lấy khuyến mãi đang hoạt động
            ->where('is_expired', false) // Không lấy cái đã hết hạn
            ->latest('created_at'); // Lấy khuyến mãi mới nhất
    }


    /**
     * Lấy tất cả khuyến mãi của món ăn.
     */
    public function promotionDishes(): HasMany
    {
        return $this->hasMany(PromotionDish::class, 'dish_id');
    }

    public function promotion()
    {
        return $this->hasOne(PromotionDish::class, 'dish_id');
    }


    /**
     * Kiểm tra món có giảm giá không.
     */
    public function isDiscounted(): bool
    {
        return (bool) $this->activePromotion()->first(); // Kiểm tra nếu có dữ liệu
    }

    /**
     * Tính giá sau khi giảm (nếu có).
     */
    public function discountedPrice(): float
{
    $promotion = $this->activePromotion;

    if ($promotion && $promotion->discount > 0) {
        return round($this->price * (1 - $promotion->discount / 100), 2);
    }

    return $this->price;
}

    // Model SubCategory
    public function category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    public function scopeAvailable(Builder $query)
    {
        return $query->where('is_available', 1);
    }
}

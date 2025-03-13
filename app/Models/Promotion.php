<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';

    protected $fillable = [
        'name',
        'discount_type',
        'discount_value',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => 'boolean',
    ];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'promotion_dishes')
            ->withPivot('discount')
            ->withTimestamps();
    }

    // ✅ Tự động cập nhật status khi lấy từ database
    public function getStatusAttribute($value)
    {
        if (Carbon::parse($this->end_date)->isPast()) {
            return false; // Hết hạn thì luôn trả về Inactive
        }
        return $value;
    }

    // ✅ Tự động đặt `status` thành `Inactive` khi lưu
    protected static function booted()
    {
        static::saving(function ($promotion) {
            if (Carbon::parse($promotion->end_date)->isPast()) {
                $promotion->status = false;
            }
        });
    }
}

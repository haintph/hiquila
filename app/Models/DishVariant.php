<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DishVariant extends Model
{
    use HasFactory;

    protected $fillable = ['dish_id', 'name', 'price', 'stock', 'is_available'];

    /**
     * Mối quan hệ với Dish.
     */
    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }
}
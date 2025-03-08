<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishImage extends Model
{
    use HasFactory;

    protected $fillable = ['dish_id', 'image_path'];

    // Liên kết ngược lại với Dish
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
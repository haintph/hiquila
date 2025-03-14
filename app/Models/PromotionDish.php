<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionDish extends Model
{
    use HasFactory;

    protected $table = 'promotion_dishes';
    
    protected $fillable = [
        'promotion_id',
        'dish_id',
        'discount',
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id');
    }
}


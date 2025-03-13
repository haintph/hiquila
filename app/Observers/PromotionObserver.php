<?php

namespace App\Observers;

use App\Models\Promotion;
use Carbon\Carbon;

class PromotionObserver
{
    public function saving(Promotion $promotion)
    {
        // Nếu ngày hết hạn đã qua, tự động đặt trạng thái 'Inactive'
        if (Carbon::parse($promotion->end_date)->isPast()) {
            $promotion->status = 'Inactive';
        }
    }
}

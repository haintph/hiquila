<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use App\Models\Promotion;

class UpdateExpiredPromotions extends Command
{
    protected $signature = 'promotions:update-expired';
    protected $description = 'Cập nhật trạng thái khuyến mãi đã hết hạn';

    public function handle()
    {
        $expiredPromotions = Promotion::where('end_date', '<', Carbon::now())
            ->where('status', true)
            ->get();

        foreach ($expiredPromotions as $promotion) {
            // Cập nhật trạng thái Inactive
            $promotion->update(['status' => false]);

            // Đánh dấu tất cả món ăn trong khuyến mãi là hết hạn
            $promotion->dishes()->update(['is_expired' => true]);
        }

        $this->info('Cập nhật khuyến mãi hết hạn thành công!');
    }
}

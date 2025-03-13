<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dish;
use Carbon\Carbon;

class UpdateIsNewStatus extends Command
{
    protected $signature = 'update:is_new';
    protected $description = 'Cập nhật trạng thái is_new của sản phẩm';

    public function handle()
    {
        Dish::where('is_new', 1)
            ->where('created_at', '<', Carbon::now()->subDays(7))
            ->update(['is_new' => 0]);

        $this->info('Đã cập nhật trạng thái is_new thành công!');
    }
}

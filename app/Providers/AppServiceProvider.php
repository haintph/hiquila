<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Promotion;
use Illuminate\Support\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        if (Schema::hasTable('categories')) {
            $categories = Category::with('subCategories')->get();
            view()->share('categories', $categories);
        }
        if (Schema::hasTable('promotions') && Schema::hasTable('promotion_dishes')) {
            // Lấy danh sách các khuyến mãi hết hạn
            $expiredPromotions = Promotion::where('end_date', '<', Carbon::now())
                ->where('status', true) // Chỉ cập nhật những cái còn active
                ->get();
        
            foreach ($expiredPromotions as $promotion) {
                // Cập nhật tất cả món ăn trong khuyến mãi này thành is_expired = true
                $promotion->dishes()->update(['is_expired' => true]);
        
                // Cập nhật trạng thái khuyến mãi thành Inactive
                $promotion->update(['status' => false]);
            }
        }          
    }

}

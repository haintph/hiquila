<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

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

        // Kiểm tra xem có kết nối được DB không trước khi truy vấn
        try {
            if (DB::connection()->getPdo() && Schema::hasTable('categories')) {
                $categories = Category::with('subCategories')->get();
                view()->share('categories', $categories);
            }
        } catch (\Exception $e) {
            // Nếu lỗi, bỏ qua việc lấy dữ liệu
        }
    }
}

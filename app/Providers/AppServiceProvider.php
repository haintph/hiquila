<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

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
        // Lấy tất cả danh mục và các loại con
        $categories = Category::with('subCategories')->get();

        // Chia sẻ dữ liệu categories với tất cả các view
        view()->share('categories', $categories);
    }
}

}

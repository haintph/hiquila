<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\SubCategory;
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

        // Kiểm tra kết nối DB trước khi lấy dữ liệu
        if ($this->checkDatabaseConnection()) {
            $categories = Category::with('subCategories')->get();
            $subCategories = SubCategory::all();

            view()->share([
                'categories' => $categories,
                'subCategories' => $subCategories,
            ]);
        }
    }

    private function checkDatabaseConnection(): bool
    {
        try {
            return DB::connection()->getPdo() && Schema::hasTable('categories') && Schema::hasTable('sub_categories');
        } catch (\Exception $e) {
            return false;
        }
    }
}

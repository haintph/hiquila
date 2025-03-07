<?php
namespace App\Http\Controllers;

use App\Models\Category;

class MenuController extends Controller
{
    public function index()
    {
        // Lấy tất cả danh mục và các loại con
        $categories = Category::with('subCategories')->get();

        // Trả về view với dữ liệu
        return view('home', compact('categories'));
    }
}

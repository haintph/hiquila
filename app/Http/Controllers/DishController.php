<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function list()
    {
        $dishes = Dish::with('subCategory')->latest('id')->paginate(8);
        return view('admin.dishes.list', compact('dishes'));
    }

    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        $subCategories = SubCategory::where('is_active', 1)->get();
        return view('admin.dishes.create', compact('categories', 'subCategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý lưu ảnh
        $imagePath = $request->file('image')->store('dishes', 'public');

        // Lưu vào database
        Dish::create([
            'name' => $validatedData['name'],
            'sub_category_id' => $validatedData['sub_category_id'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'is_available' => $validatedData['is_available'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('dish_list')->with('success', 'Thêm món ăn thành công!');
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        $categories = Category::where('is_active', 1)->get();
        $subCategories = SubCategory::where('is_active', 1)->get();
        return view('admin.dishes.edit', compact('dish', 'categories', 'subCategories'));
    }

    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
            }
            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('dishes', 'public');
            $dish->image = $imagePath;
        }

        // Cập nhật dữ liệu vào database
        $dish->update([
            'name' => $validatedData['name'],
            'sub_category_id' => $validatedData['sub_category_id'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'is_available' => $validatedData['is_available'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('dish_list')->with('success', 'Cập nhật món ăn thành công!');
    }

    public function detail($id)
    {
        $dish = Dish::findOrFail($id);
        return view('admin.dishes.detail', compact('dish'));
    }

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);

        // Xóa ảnh nếu có
        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }

        $dish->delete();

        return redirect()->route('dish_list')->with('success', 'Đã xóa món ăn thành công!');
    }
}

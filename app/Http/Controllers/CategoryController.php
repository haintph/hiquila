<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::query()->latest('id')->paginate(8);
        return view('admin.Categories.list', compact('categories'));
    }
    public function create()
    {
        return view('admin.Categories.create');
    }
    //phuong thuc xu ly anh
    public function uploadFile(Request $request, $filename)
    {
        if ($request->hasFile($filename)) {
            return $request->file($filename)->store('images');
        }
        return null;
    }

    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'img_category' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
            'description' => 'required|string'
        ]);

        // Xử lý lưu ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('img_category')) {
            $imagePath = $request->file('img_category')->store('categories', 'public');
        }

        // Lưu vào database
        Category::create([
            'name' => $validatedData['name'],
            'img_category' => $imagePath,
            'is_active' => $validatedData['is_active'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('category-list')->with('success', 'Thêm danh mục thành công!');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.Categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'img_category' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
            'description' => 'required|string'
        ]);

        // Xử lý ảnh nếu có ảnh mới
        if ($request->hasFile('img_category')) {
            // Xóa ảnh cũ nếu có
            if ($category->img_category) {
                Storage::delete('public/' . $category->img_category);
            }
            // Lưu ảnh mới vào thư mục 'categories' trong storage
            $validatedData['img_category'] = $request->file('img_category')->store('categories', 'public');
        }

        // Cập nhật danh mục
        $category->update($validatedData);

        return redirect()->route('category-list')->with('success', 'Cập nhật danh mục thành công!');
    }


    public function detail($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.Categories.detail', compact('category'));
    }


    public function destroy($id)
    {
        // Tìm và xóa bản ghi
        $item = Category::findOrFail($id);

        // Xóa ảnh nếu có
        if ($item->img_category) {
            Storage::delete($item->img_category); // Xóa ảnh từ storage
        }

        // Xóa bản ghi trong cơ sở dữ liệu
        $item->delete();

        // Chuyển hướng về trang danh sách và thông báo thành công
        return redirect()->route('category-list')->with('success', 'Đã xóa thành công!');
    }
}

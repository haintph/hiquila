<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    /**
     * Hiển thị danh sách danh mục con.
     */
    // public function list()
    // {
    //     $subCategories = SubCategory::with('category')->paginate(10); // Dùng paginate() 
    //     return view('admin.sub_categories.list', compact('subCategories'));
    // }
    public function list()
    {
        $subCategories = SubCategory::with('category')->paginate(10);
        return view('admin.sub_categories.list', compact('subCategories'));
    }



    /**
     * Hiển thị form tạo danh mục con.
     */

    public function create()
    {
        $categories = Category::all(); // Lấy tất cả danh mục cha
        return view('admin.sub_categories.create', compact('categories')); // Truyền đúng biến vào view
    }


    /**
     * Xử lý lưu danh mục con mới.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'parent_id' => 'required|exists:categories,id',
            'name_sub' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'img_subcate' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý lưu ảnh
        $imagePath = $request->file('img_subcate')->store('sub_categories', 'public');

        // Lưu vào database
        SubCategory::create([
            'parent_id' => $validatedData['parent_id'],
            'name_sub' => $validatedData['name_sub'],
            'is_active' => $validatedData['is_active'],
            'img_subcate' => $imagePath,
        ]);

        return redirect()->route('sub_category_list')->with('success', 'Thêm danh mục con thành công!');
    }

    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.sub_categories.edit', compact('subCategory', 'categories'));
    }

    /**
     * Xử lý cập nhật danh mục con.
     */
    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $validatedData = $request->validate([
            'parent_id' => 'required|exists:categories,id',
            'name_sub' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'img_subcate' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img_subcate')) {
            if ($subCategory->img_subcate) {
                Storage::disk('public')->delete($subCategory->img_subcate);
            }
            $imagePath = $request->file('img_subcate')->store('sub_categories', 'public');
            $subCategory->img_subcate = $imagePath;
        }

        $subCategory->update([
            'parent_id' => $validatedData['parent_id'],
            'name_sub' => $validatedData['name_sub'],
            'is_active' => $validatedData['is_active'],
        ]);

        return redirect()->route('sub_category_list')->with('success', 'Cập nhật danh mục con thành công!');
    }

    /**
     * Xóa danh mục con.
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        return redirect()->route('sub_category_list')->with('success', 'Danh mục con đã được xóa!');
    }

    public function detail($id)
    {
        $subCategory = SubCategory::with('category')->findOrFail($id);
        return view('admin.sub_categories.detail', compact('subCategory'));
    }

}

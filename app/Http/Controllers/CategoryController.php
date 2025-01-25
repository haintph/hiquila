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
        $data = $request->validate([
            'name' => ['required', 'max:100'],
            'img_category' => ['nullable', 'image', 'max:2048'],
            'is_active' => ['required'],
            'description' => ['required']
        ]);

        $data['img_category'] = $this->uploadFile($request, 'img_category');

        // dd($data);
        
        Category::query()->create($data);

        return redirect()->route('category-list')->with('success', 'Thêm dữ liệu thành công');
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

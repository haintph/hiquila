<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use App\Models\DishImage;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DishController extends Controller
{
    // public function list()
    // {
    //     $dishes = Dish::with('subCategory')->latest('updated_at')->paginate(8);
    //     return view('admin.dishes.list', compact('dishes'));
    // }

    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::with('subCategories')->get();
        $dishes = Dish::with(['subCategory.category', 'images', 'activePromotion'])
            ->available() // Dùng scope để gọn code
            ->latest('updated_at')
            ->take(15)
            ->get();

        return view('client.index', compact('sliders', 'dishes', 'categories'));
    }


    public function list(Request $request)
    {
        $query = Dish::with(['subCategory', 'images', 'activePromotion'])
            ->where('is_available', 1)
            ->latest('updated_at');

        // Tìm kiếm theo tên món nếu có input search
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $dishes = $query->paginate(8);

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
            'view' => 'nullable|integer|min:0',
            'stock' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'description' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ảnh đại diện
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  // Ảnh album
        ]);

        // Tạo món ăn mới
        $dish = Dish::create([
            'name' => $validatedData['name'],
            'sub_category_id' => $validatedData['sub_category_id'],
            'price' => $validatedData['price'],
            'view' => $validatedData['view'],
            'stock' => $validatedData['stock'],
            'is_available' => $validatedData['is_available'],
            'description' => $validatedData['description'],
            'is_new' => 1,
        ]);

        // Xử lý ảnh đại diện
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('dishes/thumbnails', 'public');
            $dish->update(['image' => $thumbnailPath]);
        }

        // Xử lý ảnh album
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('dishes/albums', 'public');
                DishImage::create([
                    'dish_id' => $dish->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('dish_list')->with('success', 'Thêm món ăn thành công!');
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        $categories = Category::where('is_active', 1)->get();
        $subCategories = SubCategory::where('is_active', 1)->get();

        // Lấy danh sách ảnh từ bảng dish_images
        $albumImages = DishImage::where('dish_id', $dish->id)->get();

        return view('admin.dishes.edit', compact('dish', 'categories', 'subCategories', 'albumImages'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'price' => 'required|numeric|min:0',
            'view' => 'nullable|integer|min:0',
            'stock' => 'required|integer|min:0',
            'is_available' => 'required|boolean',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ảnh đại diện
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Ảnh album
        ]);

        // Tìm món ăn cần cập nhật
        $dish = Dish::findOrFail($id);
        $dish->update($validatedData);

        // ✅ Cập nhật ảnh đại diện
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
            }

            // Lưu ảnh mới
            $path = $request->file('image')->store('dishes', 'public');
            $dish->update(['image' => $path]);
        }

        // ✅ Xử lý cập nhật album ảnh (tối đa 3 ảnh)
        $currentImageCount = $dish->images()->count();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($currentImageCount < 3) {
                    $path = $image->store('dishes', 'public');
                    DishImage::create([
                        'dish_id' => $dish->id,
                        'image_path' => $path
                    ]);
                    $currentImageCount++;
                } else {
                    break; // Đạt giới hạn 3 ảnh thì dừng lại
                }
            }
        }

        return redirect()->route('dish_list', $dish->id)->with('success', 'Món ăn đã được cập nhật!');
    }
    public function detail($id)
    {
        $dish = Dish::with('variants')->findOrFail($id);
        $albumImages = DishImage::where('dish_id', $dish->id)->get();
        // Tăng số lượt xem
        $dish->increment('view');

        return view('admin.dishes.detail', compact('dish', 'albumImages'));
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


    public function showAdmin($id)
    {
        $dish = Dish::with('variants')->findOrFail($id);

        // Lấy danh sách ảnh từ bảng dish_images
        $albumImages = DishImage::where('dish_id', $dish->id)->get();

        return view('admin.dishes.detail', compact('dish', 'albumImages'));
    }

    public function showClient($id)
    {
        $dish = Dish::with(['subCategory', 'variants', 'images', 'activePromotion'])->findOrFail($id);

        // Lấy sản phẩm liên quan cùng danh mục
        $relatedDishes = Dish::whereHas('subCategory', function ($query) use ($dish) {
            $query->where('parent_id', $dish->subCategory->parent_id);
        })
            ->where('id', '!=', $dish->id) // Loại trừ chính sản phẩm đang xem
            ->take(10) // Giới hạn số lượng sản phẩm
            ->get();
        return view('client.dishes.dish_details', compact('dish', 'relatedDishes'));
    }


    //delete album ảnh
    public function deleteImage($id)
    {
        $image = DishImage::findOrFail($id);

        // Xóa file ảnh trong storage
        Storage::disk('public')->delete($image->image_path);

        // Xóa dữ liệu trong database
        $image->delete();

        return response()->json(['success' => true]);  // ✅ Đúng, trả về JSON
    }

    public function updateImage(Request $request, $id)
    {
        $image = DishImage::findOrFail($id);

        // Kiểm tra có file ảnh mới không
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            Storage::disk('public')->delete($image->image_path);

            // Lưu ảnh mới
            $newPath = $request->file('image')->store('dishes', 'public');

            // Cập nhật đường dẫn ảnh trong database
            $image->update(['image_path' => $newPath]);

            return response()->json([
                'success' => true,
                'new_path' => asset('storage/' . $newPath)
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function increaseView($id)
    {
        $dish = Dish::findOrFail($id);

        // Kiểm tra nếu khách đã xem chưa (dùng session)
        $sessionKey = 'dish_viewed_' . $id;
        if (!session()->has($sessionKey)) {
            $dish->increment('view'); // Tăng số lượt xem
            session()->put($sessionKey, true); // Lưu session
        }

        return response()->json(['views' => $dish->view]);
    }
    public function clientMenu(Request $request)
    {
        $dishes = Dish::where('is_available', 1);

        // Lọc theo giá nếu có giá trị min_price và max_price
        if ($request->has('min_price') && $request->has('max_price')) {
            $dishes->whereBetween('price', [
                $request->min_price,
                $request->max_price
            ]);
        }

        $dishes = $dishes->latest()->paginate(10);

        // Trả về view với các món ăn đã lọc
        return view('client.list.menu', compact('dishes'));
    }

    //Timkiem
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $subCategoryId = $request->input('sub_category_id');

        $query = \App\Models\Dish::with('images', 'promotion', 'subCategory');

        // Tìm kiếm theo từ khóa
        if ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%");
        }

        // Lọc theo danh mục con
        if ($subCategoryId) {
            $query->where('sub_category_id', $subCategoryId);
        }

        $dishes = $query->get();

        return view('client.search.search', compact('dishes'));
    }
}

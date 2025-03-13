<?php

namespace App\Http\Controllers;

use App\Models\PromotionDish;
use App\Models\Promotion;
use App\Models\Dish;
use Illuminate\Http\Request;

class PromotionDishController extends Controller
{
    /**
     * Hiển thị danh sách món ăn trong khuyến mãi.
     */
    public function list()
    {
        $promotionDishes = PromotionDish::whereHas('promotion', function ($query) {
            $query->where('status', true); // Chỉ lấy khuyến mãi Active
        })->with(['promotion', 'dish'])
            ->latest('id')
            ->paginate(10);

        return view('admin.promotion_dishes.list', compact('promotionDishes'));
    }


    /**
     * Hiển thị form tạo món ăn trong khuyến mãi.
     */
    public function create()
    {
        $dishes = Dish::all();
        $promotions = Promotion::where('status', true)->get(); // Chỉ lấy khuyến mãi Active

        return view('admin.promotion_dishes.create', compact('dishes', 'promotions'));
    }


    /**
     * Xử lý lưu món ăn trong khuyến mãi mới.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'promotion_id' => 'required|exists:promotions,id',
            'dish_id' => 'required|exists:dishes,id',
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        PromotionDish::create($validatedData);

        return redirect()->route('promotion_dish_list')->with('success', 'Thêm món ăn vào khuyến mãi thành công!');
    }




    /**
     * Hiển thị form chỉnh sửa món ăn trong khuyến mãi.
     */
    public function edit($id)
    {
        $promotionDish = PromotionDish::findOrFail($id);
        $promotions = Promotion::where('status', true)->get(); // Chỉ lấy khuyến mãi Active
        $dishes = Dish::all();

        return view('admin.promotion_dishes.edit', compact('promotionDish', 'promotions', 'dishes'));
    }


    /**
     * Xử lý cập nhật món ăn trong khuyến mãi.
     */
    public function update(Request $request, $id)
    {
        $promotionDish = PromotionDish::findOrFail($id);

        $validatedData = $request->validate([
            'promotion_id' => 'required|exists:promotions,id',
            'dish_id' => 'required|exists:dishes,id',
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        $promotionDish->update($validatedData);

        return redirect()->route('promotion_dish_list')->with('success', 'Cập nhật món ăn trong khuyến mãi thành công!');
    }

    /**
     * Xóa món ăn trong khuyến mãi.
     */
    public function destroy($id)
    {
        $promotionDish = PromotionDish::findOrFail($id);
        $promotionDish->delete();

        return redirect()->route('promotion_dish_list')->with('success', 'Món ăn trong khuyến mãi đã được xóa!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Hiển thị danh sách chương trình khuyến mãi.
     */
    public function list()
    {
        $promotions = Promotion::latest('id')->paginate(10);
        return view('admin.promotions.list', compact('promotions'));
    }

    /**
     * Hiển thị form tạo chương trình khuyến mãi.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Xử lý lưu chương trình khuyến mãi mới.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'discount_type' => 'required|in:percent,fixed,freeship',
            'discount_value' => 'required|numeric|min:0|max:99999999', // Hạn chế giá trị quá lớn
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'boolean', // Không bắt buộc nhưng nếu có thì phải là boolean
        ]);

        // Tạo khuyến mãi mới
        Promotion::create([
            'name' => $validatedData['name'],
            'discount_type' => $validatedData['discount_type'],
            'discount_value' => $validatedData['discount_value'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'status' => $request->boolean('status'), // Đảm bảo status luôn là true/false
        ]);

        // Chuyển hướng về danh sách + thông báo thành công
        return redirect()->route('promotion_list')->with('success', 'Khuyến mãi đã được tạo thành công!');
    }


    /**
     * Hiển thị form chỉnh sửa chương trình khuyến mãi.
     */
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Xử lý cập nhật chương trình khuyến mãi.
     */
    public function update(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'discount_type' => 'required|in:percent,fixed,freeship',
            'discount_value' => 'required|numeric|min:0|max:99999999', // Hạn chế giá trị quá lớn
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'boolean', // Không bắt buộc nhưng nếu có thì phải là boolean
        ]);

        // Lấy khuyến mãi cần cập nhật
        $promotion = Promotion::findOrFail($id);

        // Cập nhật vào database
        $promotion->update([
            'name' => $validatedData['name'],
            'discount_type' => $validatedData['discount_type'],
            'discount_value' => $validatedData['discount_value'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'status' => $request->boolean('status'), // Đảm bảo status luôn là true/false
        ]);

        return redirect()->route('promotion_list')->with('success', 'Khuyến mãi đã được cập nhật thành công!');
    }


    /**
     * Xóa chương trình khuyến mãi.
     */
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('promotion_list')->with('success', 'Chương trình khuyến mãi đã được xóa!');
    }

    /**
     * Hiển thị chi tiết chương trình khuyến mãi.
     */
    public function detail($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.detail', compact('promotion'));
    }
}

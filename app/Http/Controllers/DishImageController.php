<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishImageController extends Controller
{
    public function store(Request $request, Dish $dish)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('dish_images', 'public');

                DishImage::create([
                    'dish_id' => $dish->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('dish.show', $dish->id)->with('success', 'Thêm ảnh thành công!');
    }

    public function destroy($id)
    {
        $image = DishImage::findOrFail($id);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Xóa ảnh thành công!');
    }
    
}

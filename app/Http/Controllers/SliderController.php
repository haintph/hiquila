<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('sliders.index')->with('success', 'Thêm slider thành công');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ trước khi cập nhật ảnh mới
            if ($slider->image && file_exists(storage_path("app/public/{$slider->image}"))) {
                unlink(storage_path("app/public/{$slider->image}"));
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('sliders', 'public');
            $slider->image = $imagePath;
        }

        $slider->update($request->only('title', 'subtitle', 'description', 'link'));

        return redirect()->route('sliders.index')->with('success', 'Update slider thành công');
    }

    public function destroy(Slider $slider)
    {
        // Xóa ảnh trước khi xóa slider
        if ($slider->image && file_exists(storage_path("app/public/{$slider->image}"))) {
            unlink(storage_path("app/public/{$slider->image}"));
        }

        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Xóa thành công');
    }
}

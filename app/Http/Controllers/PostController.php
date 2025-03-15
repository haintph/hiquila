<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category') // Nạp dữ liệu danh mục
            ->where('status', 'published')
            ->latest('id')
            ->take(8)
            ->get();

        return view('client.index', compact('posts'));
    }

    public function list()
    {
        $posts = Post::query()->latest('id')->paginate(8);
        return view('admin.Posts.list', compact('posts'));
    }

    public function create()
    {
        return view('admin.Posts.create');
    }

    public function uploadFile(Request $request, $filename)
    {
        if ($request->hasFile($filename)) {
            return $request->file($filename)->store('images');
        }
        return null;
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'post_category' => 'required|exists:categories,id', // ✅ Đúng tên trường trong DB
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý lưu ảnh nếu có
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Đổi tên file tránh trùng
            $imagePath = $image->storeAs('posts', $imageName, 'public'); // Lưu vào storage/app/public/posts
        }

        // Lưu vào database
        $post = Post::create([
            'title' => $validatedData['title'],
            'post_category' => $validatedData['post_category'], // ✅ Đúng tên cột trong DB
            'content' => $validatedData['content'],
            'image' => $imagePath,
            'status' => 'published', // Đặt mặc định là published
        ]);

        return redirect()->route('post_list')->with([
            'success' => 'Thêm bài viết thành công!',
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null
        ]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.Posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validatedData = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'       => 'required|boolean',
            'post_category' => 'required|string|max:255', // Kiểm tra danh mục
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }
            $validatedData['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validatedData);

        return redirect()->route('post_list')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function detail($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.Posts.detail', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            Storage::delete('public/' . $post->image);
        }

        $post->delete();

        return redirect()->route('post_list')->with('success', 'Đã xóa bài viết thành công!');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.Posts.detail', compact('post')); // Trả về trang chi tiết bài viết cho client
    }
}

@extends('admin.layouts.master')
@section('content')
    <style>
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 300px;
            height: 180px;
            border: 2px dashed #ccc;
            border-radius: 10px;
            overflow: hidden;
            background-color: #f8f9fa;
            padding: 10px;
        }

        .preview-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
            border-radius: 8px;
        }

        .preview-img:hover {
            transform: scale(1.05);
        }
    </style>
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Edit Post</h3>
                </div>

                <div class="col-xl-9 col-lg-8 ">
                    <form action="{{ route('post_update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin bài viết</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="post-title" class="form-label">Tiêu đề bài viết</label>
                                            <input type="text" name="title" class="form-control" value="{{ $post->title }}" placeholder="Enter Title">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                                            <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Ngừng hoạt động</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="category" class="form-label">Danh mục</label>
                                        <select class="form-control" name="post_category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $post->post_category == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Hình ảnh bài viết</label><br>
                                        <div class="image-container">
                                            <img id="imagePreview" src="{{ $post->image ? asset('storage/' . $post->image) : '' }}" alt="Hình ảnh bài viết" class="preview-img" style="{{ $post->image ? '' : 'display: none;' }}">
                                        </div>
                                        <input type="file" name="image" id="image" class="form-control mt-2" onchange="previewImage(event)">
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="content" class="form-label">Nội dung</label>
                                            <textarea class="form-control bg-light-subtle" name="content" rows="7" placeholder="Type content">{{ $post->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">Update</button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{ route('post_list') }}" class="btn btn-primary w-100">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const image = document.getElementById('imagePreview');
                        image.src = e.target.result;
                        image.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
    </div>
@endsection

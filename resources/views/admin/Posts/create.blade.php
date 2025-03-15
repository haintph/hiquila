@extends('admin.layouts.master')

@section('content')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Create Post</h3>                  
                </div>

                <div class="col-xl-9 col-lg-8">
                    <form action="{{ route('post_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin bài viết</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <!-- Tiêu đề bài viết -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="post-title" class="form-label">Tiêu đề bài viết</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                        </div>
                                    </div> 
                                    
                                    <!-- Chọn danh mục -->
                                    <div class="col-lg-6">
                                        <label for="post_category" class="form-label">Danh mục</label>
                                        <select class="form-control" name="post_category">
                                            <option value="">Chọn danh mục</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Trạng thái -->
                                    <div class="col-lg-6">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="status">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="1">Xuất bản</option>
                                            <option value="0">Nháp</option>
                                        </select>
                                    </div>

                                    <!-- Ảnh bài viết -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Image</label><br>
                                        <input type="file" name="image" id="image" onchange="previewImage(event)">
                                        <br>
                                        <img id="imagePreview" src="" alt="Image Preview" style="max-width: 300px; max-height: 50px; display: none;"><br>
                                    </div>

                                    <!-- Nội dung bài viết -->
                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="content" class="form-label">Nội dung</label>
                                            <textarea class="form-control bg-light-subtle" name="content" rows="7" placeholder="Type content"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nút tạo bài viết -->
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">Create</button>
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
        <!-- End Container Fluid -->

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

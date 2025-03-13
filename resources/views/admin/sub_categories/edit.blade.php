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

        /* Thêm style cho button */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Edit Sub Category</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <form action="{{ route('sub_category_update', $subCategory->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin danh mục con</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Chọn danh mục cha -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="parent_id" class="form-label">Danh mục cha</label>
                                            <select class="form-control" name="parent_id" required>
                                                <option value="">Chọn danh mục cha</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $subCategory->parent_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tên danh mục con -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name_sub" class="form-label">Tên danh mục con</label>
                                            <input type="text" name="name_sub" class="form-control"
                                                value="{{ $subCategory->name_sub }}" required>
                                        </div>
                                    </div>

                                    <!-- Trạng thái -->
                                    <div class="col-lg-6">
                                        <label for="is_active" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="is_active">
                                            <option value="1" {{ $subCategory->is_active == 1 ? 'selected' : '' }}>Hoạt
                                                động</option>
                                            <option value="0" {{ $subCategory->is_active == 0 ? 'selected' : '' }}>
                                                Ngừng hoạt động</option>
                                        </select>
                                    </div>

                                    <!-- Upload hình ảnh -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Ảnh danh mục con</label><br>
                                    
                                        <!-- Hiển thị ảnh nếu có -->
                                        <div class="image-container">
                                            <img id="subCatePreview" 
                                                 src="{{ $subCategory->img_subcate ? asset('storage/' . $subCategory->img_subcate) : '' }}" 
                                                 alt="Hình ảnh danh mục con" 
                                                 class="preview-img" 
                                                 style="{{ $subCategory->img_subcate ? '' : 'display: none;' }}">
                                        </div>
                                    
                                        <!-- Input chọn ảnh -->
                                        <input type="file" name="img_subcate" id="img_subcate" class="form-control mt-2">
                                    </div>                                      
                                </div>
                            </div>
                        </div>

                        <!-- Nút cập nhật & hủy -->
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">Update</button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{ route('sub_category_list') }}" class="btn btn-primary w-100">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

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
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Edit Category</h3>
                </div>

                <div class="col-xl-9 col-lg-8 ">
                    <form action="{{ route('category_update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin chung</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="category-title" class="form-label">Tên danh mục</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $category->name }}" placeholder="Enter Title">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="crater" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="is_active">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="1" {{ $category->is_active == 1 ? 'selected' : '' }}>Hoạt
                                                động</option>
                                            <option value="0" {{ $category->is_active == 0 ? 'selected' : '' }}>Ngừng
                                                hoạt động</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Hình ảnh danh mục</label><br>

                                        <!-- Khung hiển thị ảnh -->
                                        <div class="image-container">
                                            <img id="imagePreview"
                                                src="{{ $category->img_category ? asset('storage/' . $category->img_category) : '' }}"
                                                alt="Hình ảnh danh mục" class="preview-img"
                                                style="{{ $category->img_category ? '' : 'display: none;' }}">
                                        </div>

                                        <!-- Input chọn ảnh -->
                                        <input type="file" name="img_category" id="img_category"
                                            class="form-control mt-2" onchange="previewImage(event)">
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="description" class="form-label">Miêu tả</label>
                                            <textarea class="form-control bg-light-subtle" name="description" rows="7" placeholder="Type description">{{ $category->description }}</textarea>
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
                                    <a href="{{ route('category-list') }}" class="btn btn-primary w-100">Cancel</a>
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
                        image.style.display = 'block'; // Hiển thị ảnh sau khi tải lên
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>

        <!-- ========== Footer Start ========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone"
                            class="fs-18 align-middle text-danger"></iconify-icon> <a href="https://1.envato.market/techzaa"
                            class="fw-bold footer-text" target="_blank">Techzaa</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ========== Footer End ========== -->
    </div>
@endsection

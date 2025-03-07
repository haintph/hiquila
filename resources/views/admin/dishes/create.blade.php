@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mb-4 text-center">Tạo món ăn mới</h3>
                    <div class="card shadow p-4">
                        <form action="{{ route('dish_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Tên món ăn -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tên món ăn</label>
                                    <input type="text" name="name" class="form-control rounded-3 shadow-sm" placeholder="Nhập tên món ăn">
                                </div>

                                <!-- Danh mục -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Danh mục con</label>
                                    <select class="form-control rounded-3 shadow-sm" name="sub_category_id">
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->name_sub }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Giá tiền -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Giá tiền</label>
                                    <input type="number" step="0.01" name="price" class="form-control rounded-3 shadow-sm" placeholder="Nhập giá tiền">
                                </div>

                                <!-- Số lượng -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Số lượng</label>
                                    <input type="number" name="stock" class="form-control rounded-3 shadow-sm" placeholder="Nhập số lượng">
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Trạng thái</label>
                                    <select class="form-control rounded-3 shadow-sm" name="is_available">
                                        <option value="1">Còn bán</option>
                                        <option value="0">Hết hàng</option>
                                    </select>
                                </div>

                                <!-- Hình ảnh -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Hình ảnh</label>
                                    <input type="file" name="image" id="dish_image" class="form-control rounded-3 shadow-sm" onchange="previewImage(event)">
                                    <div class="mt-2">
                                        <img id="imagePreview" src="" alt="Ảnh xem trước" style="max-width: 100%; height: auto; display: none; border-radius: 8px;">
                                    </div>
                                </div>

                                <!-- Miêu tả -->
                                <div class="col-12">
                                    <label class="form-label fw-bold">Miêu tả</label>
                                    <textarea class="form-control rounded-3 shadow-sm" name="description" rows="5" placeholder="Nhập miêu tả"></textarea>
                                </div>

                                <!-- Nút bấm -->
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-outline-primary px-4">Tạo món ăn</button>
                                    <a href="{{ route('dish_list') }}" class="btn btn-secondary px-4">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
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

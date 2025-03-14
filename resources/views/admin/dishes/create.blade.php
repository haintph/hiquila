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
                                    <input type="text" name="name" class="form-control rounded-3 shadow-sm"
                                        placeholder="Nhập tên món ăn">
                                </div>

                                <!-- Danh mục -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Danh mục con</label>
                                    <select class="form-control rounded-3 shadow-sm" name="sub_category_id">
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->name_sub }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Giá tiền -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Giá tiền</label>
                                    <input type="number" step="0.01" name="price"
                                        class="form-control rounded-3 shadow-sm" placeholder="Nhập giá tiền">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Lượt xem</label>
                                    <input type="number" name="view" class="form-control rounded-3 shadow-sm" placeholder="Nhập số lượt xem" value="0">
                                </div>

                                <!-- Số lượng -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Số lượng</label>
                                    <input type="number" name="stock" class="form-control rounded-3 shadow-sm"
                                        placeholder="Nhập số lượng">
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Trạng thái</label>
                                    <select class="form-control rounded-3 shadow-sm" name="is_available">
                                        <option value="1">Còn bán</option>
                                        <option value="0">Hết hàng</option>
                                    </select>
                                </div>

                                <!-- Chọn Ảnh Đại Diện -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Ảnh đại diện</label>
                                    <input type="file" name="thumbnail" class="form-control" accept="image/*"
                                        onchange="previewThumbnail(event)">
                                    <div class="mt-2" id="thumbnailPreviewContainer">
                                        <img id="thumbnailPreview" class="rounded"
                                            style="width: 120px; height: 120px; object-fit: cover; display: none;">
                                    </div>
                                </div>

                                <!-- Chọn Album Ảnh -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Album ảnh (có thể chọn nhiều ảnh)</label>
                                    <input type="file" name="images[]" class="form-control" multiple accept="image/*"
                                        onchange="previewImages(event)">
                                    <div class="mt-2 d-flex flex-wrap gap-2" id="imagePreviewContainer"></div>
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
            function previewThumbnail(event) {
                let file = event.target.files[0];
                let preview = document.getElementById("thumbnailPreview");
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = "block";
                    };
                    reader.readAsDataURL(file);
                }
            }

            function previewImages(event) {
                let files = event.target.files;
                let container = document.getElementById("imagePreviewContainer");
                container.innerHTML = ""; // Xóa preview cũ

                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        let img = document.createElement("img");
                        img.src = e.target.result;
                        img.classList.add("rounded");
                        img.style.width = "80px";
                        img.style.height = "80px";
                        img.style.objectFit = "cover";
                        img.style.marginRight = "5px";
                        container.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                }
            }
        </script>

    </div>
@endsection

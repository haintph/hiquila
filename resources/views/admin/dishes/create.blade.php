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
                                    <input type="text" name="name"
                                        class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror"
                                        placeholder="Nhập tên món ăn" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Danh mục -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Danh mục con</label>
                                    <select
                                        class="form-control rounded-3 shadow-sm @error('sub_category_id') is-invalid @enderror"
                                        name="sub_category_id">
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}"
                                                {{ old('sub_category_id') == $subCategory->id ? 'selected' : '' }}>
                                                {{ $subCategory->name_sub }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Giá tiền -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Giá tiền</label>
                                    <input type="number" step="0.01" name="price"
                                        class="form-control rounded-3 shadow-sm @error('price') is-invalid @enderror"
                                        placeholder="Nhập giá tiền" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Số lượng -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Số lượng</label>
                                    <input type="number" name="stock"
                                        class="form-control rounded-3 shadow-sm @error('stock') is-invalid @enderror"
                                        placeholder="Nhập số lượng" value="{{ old('stock') }}">
                                    @error('stock')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Trạng thái</label>
                                    <select
                                        class="form-control rounded-3 shadow-sm @error('is_available') is-invalid @enderror"
                                        name="is_available">
                                        <option value="1" {{ old('is_available') == '1' ? 'selected' : '' }}>Còn bán
                                        </option>
                                        <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>Hết hàng
                                        </option>
                                    </select>
                                    @error('is_available')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Chọn Ảnh Đại Diện -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Ảnh đại diện</label>
                                    <input type="file" name="thumbnail"
                                        class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*">
                                    @error('thumbnail')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Chọn Album Ảnh -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Album ảnh (có thể chọn nhiều ảnh)</label>
                                    <input type="file" name="images[]"
                                        class="form-control @error('images.*') is-invalid @enderror" multiple
                                        accept="image/*">
                                    @error('images.*')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Miêu tả -->
                                <div class="col-12">
                                    <label class="form-label fw-bold">Miêu tả</label>
                                    <textarea class="form-control rounded-3 shadow-sm @error('description') is-invalid @enderror" name="description"
                                        rows="5" placeholder="Nhập miêu tả">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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

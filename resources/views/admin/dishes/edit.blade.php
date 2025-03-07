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
                    <h3>Edit Dish</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <form action="{{ route('dish_update', $dish->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin món ăn</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Chọn danh mục con -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="sub_category_id" class="form-label">Danh mục con</label>
                                            <select class="form-control" name="sub_category_id" required>
                                                <option value="">Chọn danh mục con</option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}"
                                                        {{ $subCategory->id == $dish->sub_category_id ? 'selected' : '' }}>
                                                        {{ $subCategory->name_sub }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tên món ăn -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên món ăn</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $dish->name }}" required>
                                        </div>
                                    </div>

                                    <!-- Giá -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Giá</label>
                                            <input type="number" name="price" class="form-control"
                                                value="{{ $dish->price }}" required min="0" step="0.01">
                                        </div>
                                    </div>

                                    <!-- Số lượng tồn kho -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Số lượng tồn kho</label>
                                            <input type="number" name="stock" class="form-control"
                                                value="{{ $dish->stock }}" required min="0">
                                        </div>
                                    </div>

                                    <!-- Trạng thái -->
                                    <div class="col-lg-6">
                                        <label for="is_available" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="is_available">
                                            <option value="1" {{ $dish->is_available == 1 ? 'selected' : '' }}>Còn hàng
                                            </option>
                                            <option value="0" {{ $dish->is_available == 0 ? 'selected' : '' }}>Hết hàng
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Mô tả -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô tả</label>
                                            <textarea name="description" class="form-control" rows="3" required>{{ $dish->description }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Upload hình ảnh -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Ảnh món ăn</label><br>

                                        <div class="image-container">
                                            <img id="dishPreview"
                                                src="{{ $dish->image ? asset('storage/' . $dish->image) : '' }}"
                                                alt="Hình ảnh món ăn" class="preview-img"
                                                style="{{ $dish->image ? '' : 'display: none;' }}">
                                        </div>

                                        <input type="file" name="image" id="image" class="form-control mt-2">
                                    </div>

                                    <!-- Album ảnh dạng danh sách -->
                                    <div class="card-body">
                                        <div class="row">
                                            @include('admin.dishes.ablum')
                                        </div>
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
                                    <a href="{{ route('dish_list') }}" class="btn btn-primary w-100">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Hiển thị ảnh xem trước khi chọn file
        document.getElementById("image").addEventListener("change", function(event) {
            let file = event.target.files[0];
            let preview = document.getElementById("dishPreview");
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection

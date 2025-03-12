@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mb-4 text-center">Thêm Slider Mới</h3>
                    <div class="card shadow p-4">
                        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Tiêu đề -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tiêu đề</label>
                                    <input type="text" name="title" class="form-control rounded-3 shadow-sm"
                                        placeholder="Nhập tiêu đề" required>
                                </div>

                                <!-- Tiêu đề phụ -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tiêu đề phụ</label>
                                    <input type="text" name="subtitle" class="form-control rounded-3 shadow-sm"
                                        placeholder="Nhập tiêu đề phụ">
                                </div>

                                <!-- Mô tả -->
                                <div class="col-12">
                                    <label class="form-label fw-bold">Mô tả</label>
                                    <textarea class="form-control rounded-3 shadow-sm" name="description" rows="4" placeholder="Nhập mô tả"></textarea>
                                </div>

                                <!-- Chọn ảnh -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Ảnh slider</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" required onchange="previewSliderImage(event)">
                                    <div class="mt-2" id="sliderImagePreviewContainer">
                                        <img id="sliderImagePreview" class="rounded shadow-sm"
                                            style="width: 250px; height: auto; display: none;">
                                    </div>
                                </div>

                                <!-- Link -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Liên kết (nếu có)</label>
                                    <input type="text" name="link" class="form-control rounded-3 shadow-sm"
                                        placeholder="Nhập URL liên kết">
                                </div>

                                <!-- Nút bấm -->
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-outline-primary px-4">Thêm Slider</button>
                                    <a href="{{ route('sliders.index') }}" class="btn btn-secondary px-4">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function previewSliderImage(event) {
                let file = event.target.files[0];
                let preview = document.getElementById("sliderImagePreview");
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = "block";
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
    </div>
@endsection

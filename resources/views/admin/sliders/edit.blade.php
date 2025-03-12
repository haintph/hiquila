@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mb-4 text-center">Chỉnh sửa Slider</h3>
                    <div class="card shadow p-4">
                        <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Tiêu đề -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tiêu đề</label>
                                    <input type="text" name="title" class="form-control rounded-3 shadow-sm"
                                        value="{{ $slider->title }}" required>
                                </div>

                                <!-- Tiêu đề phụ -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tiêu đề phụ</label>
                                    <input type="text" name="subtitle" class="form-control rounded-3 shadow-sm"
                                        value="{{ $slider->subtitle }}">
                                </div>

                                <!-- Mô tả -->
                                <div class="col-12">
                                    <label class="form-label fw-bold">Mô tả</label>
                                    <textarea class="form-control rounded-3 shadow-sm" name="description" rows="4">{{ $slider->description }}</textarea>
                                </div>

                                <!-- Hình ảnh hiện tại -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Hình ảnh hiện tại</label>
                                    <div class="border p-2 rounded bg-light">
                                        <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image"
                                            class="rounded shadow-sm" style="width: 250px; height: auto;">
                                    </div>
                                </div>

                                <!-- Chọn ảnh mới -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Chọn ảnh mới (nếu cần thay đổi)</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" onchange="previewNewImage(event)">
                                    <div class="mt-2" id="newImagePreviewContainer">
                                        <img id="newImagePreview" class="rounded shadow-sm"
                                            style="width: 250px; height: auto; display: none;">
                                    </div>
                                </div>

                                <!-- Link -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Liên kết (nếu có)</label>
                                    <input type="text" name="link" class="form-control rounded-3 shadow-sm"
                                        value="{{ $slider->link }}">
                                </div>

                                <!-- Nút bấm -->
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-outline-primary px-4">Cập nhật Slider</button>
                                    <a href="{{ route('sliders.index') }}" class="btn btn-secondary px-4">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function previewNewImage(event) {
                let file = event.target.files[0];
                let preview = document.getElementById("newImagePreview");
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

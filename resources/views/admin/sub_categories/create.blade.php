@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Create Sub Category</h3>
                </div>

                <div class="col-xl-9 col-lg-8 ">
                    <form action="{{ route('sub_category_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tên danh mục con -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name_sub" class="form-label">Tên danh mục con</label>
                                            <input type="text" name="name_sub" class="form-control"
                                                placeholder="Nhập tên danh mục con" required>
                                        </div>
                                    </div>

                                    <!-- Trạng thái -->
                                    <div class="col-lg-6">
                                        <label for="is_active" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="is_active">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="1">Hoạt động</option>
                                            <option value="0">Ngừng hoạt động</option>
                                        </select>
                                    </div>

                                    <!-- Upload hình ảnh -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Ảnh danh mục con</label><br>
                                        <input type="file" name="img_subcate" id="img_subcate"
                                            onchange="previewImage(event)" required>
                                        <br>
                                        <img id="imagePreview" src="" alt="Image Preview"
                                            style="max-width: 300px; max-height: 50px; display: none;"><br>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Nút tạo & hủy -->
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">Create</button>
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

        <!-- Script xem trước ảnh -->
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

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>document.write(new Date().getFullYear())</script> &copy; Larkon.
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

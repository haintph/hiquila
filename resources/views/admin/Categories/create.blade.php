@extends('admin.layouts.master')
@section('content')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Create Category</h3>                  
                </div>

                <div class="col-xl-9 col-lg-8 ">
                    <form action="{{ route('category_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                                placeholder="Enter Title">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <label for="crater" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="is_active">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="1">Hoạt động</option>
                                            <option value="0">Ngừng hoạt động</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-6">

                                        <label class="form-label">Image</label><br>
                                        <input type="file" name="img_category" id="img_category"
                                            onchange="previewImage(event)">
                                        <br>
                                        <img id="imagePreview" src="" alt="Image Preview"
                                            style="max-width: 300px; max-height: 50px; display: none;"><br>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-0">
                                            <label for="description" class="form-label">Miêu tả</label>
                                            <textarea class="form-control bg-light-subtle" name="description" rows="7" placeholder="Type description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">Create</button>
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
                        image.style.display = 'block';
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

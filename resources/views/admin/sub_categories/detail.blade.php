@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Chi tiết danh mục con</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin danh mục con</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Danh mục cha -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Danh mục cha</label>
                                        <p class="form-control">{{ $subCategory->category->name ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Tên danh mục con -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tên danh mục con</label>
                                        <p class="form-control">{{ $subCategory->name_sub }}</p>
                                    </div>
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-lg-6">
                                    <label class="form-label">Trạng thái</label>
                                    <p class="form-control">{{ $subCategory->is_active ? 'Hoạt động' : 'Ngừng hoạt động' }}</p>
                                </div>

                                <!-- Hình ảnh -->
                                <div class="col-lg-6">
                                    <label class="form-label">Ảnh danh mục con</label><br>
                                    <img src="{{ asset('storage/' . $subCategory->img_subcate) }}" alt="Hình ảnh danh mục" style="max-width: 300px; max-height: 150px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nút quay lại -->
                    {{-- <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('sub_category_list') }}" class="btn btn-primary w-100">Quay lại</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('sub_category_list') }}" class="btn btn-primary w-100">Quay lại</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ route('sub_category_edit', $subCategory->id) }}" class="btn btn-outline-secondary w-100">Chỉnh sửa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
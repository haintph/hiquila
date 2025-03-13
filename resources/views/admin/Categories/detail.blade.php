@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Detail Category</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin chi tiết</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Tên danh mục -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="category-title" class="form-label">Tên danh mục</label>
                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" readonly>
                                    </div>
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-lg-6">
                                    <label for="crater" class="form-label">Trạng thái</label>
                                    <input type="text" class="form-control" 
                                           value="{{ $category->is_active == 1 ? 'Hoạt động' : 'Ngừng hoạt động' }}" readonly>
                                </div>

                                <!-- Hình ảnh -->
                                <div class="col-lg-6">
                                    <label class="form-label">Hình ảnh</label>
                                    <br>
                                    @if($category->img_category)
                                        <img src="{{ asset('storage/' . $category->img_category) }}" alt="Category Image" 
                                             style="max-width: 300px; max-height: 50px;">
                                    @else
                                        <p>Không có hình ảnh</p>
                                    @endif
                                </div>

                                <!-- Miêu tả -->
                                <div class="col-lg-12">
                                    <div class="mb-0">
                                        <label for="description" class="form-label">Miêu tả</label>
                                        <textarea class="form-control bg-light-subtle" name="description" rows="7" readonly>{{ $category->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('category-list') }}" class="btn btn-primary w-100">Quay lại</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ route('category_edit', $category->id) }}" class="btn btn-outline-secondary w-100">Chỉnh sửa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Container Fluid -->
    </div>
@endsection

@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Detail Post</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin chi tiết</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Tiêu đề bài viết -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="post-title" class="form-label">Tiêu đề</label>
                                        <input type="text" name="title" class="form-control" value="{{ $post->title }}" readonly>
                                    </div>
                                </div>

                                <!-- Danh mục bài viết -->
                                <div class="col-lg-6">
                                    <label for="category" class="form-label">Danh mục</label>
                                    <input type="text" class="form-control" 
                                           value="{{ $post->category ? $post->category->name : 'Không có danh mục' }}" readonly>
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-lg-6">
                                    <label for="status" class="form-label">Trạng thái</label>
                                    <input type="text" class="form-control" 
                                           value="{{ $post->status == 1 ? 'Hoạt động' : 'Không hoạt động' }}" readonly>
                                </div>

                                <!-- Hình ảnh -->
                                <div class="col-lg-6">
                                    <label class="form-label">Hình ảnh</label>
                                    <br>
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" 
                                             style="max-width: 300px; max-height: 150px;">
                                    @else
                                        <p>Không có hình ảnh</p>
                                    @endif
                                </div>

                                <!-- Nội dung -->
                                <div class="col-lg-12">
                                    <div class="mb-0">
                                        <label for="content" class="form-label">Nội dung</label>
                                        <textarea class="form-control bg-light-subtle" name="content" rows="7" readonly>{{ $post->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('post_list') }}" class="btn btn-primary w-100">Quay lại</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ route('post_edit', $post->id) }}" class="btn btn-outline-secondary w-100">Chỉnh sửa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Container Fluid -->
    </div>
@endsection

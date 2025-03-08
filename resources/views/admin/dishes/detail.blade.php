@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Detail Dish</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông tin chi tiết</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Tên món ăn -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="dish-title" class="form-label">Tên món ăn</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $dish->name }}" readonly>
                                    </div>
                                </div>

                                <!-- Giá -->
                                <div class="col-lg-6">
                                    <label for="price" class="form-label">Giá</label>
                                    <input type="text" class="form-control"
                                        value="{{ number_format($dish->price, 0, ',', '.') }} VND" readonly>
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-lg-6">
                                    <label for="status" class="form-label">Trạng thái</label>
                                    <input type="text" class="form-control"
                                        value="{{ $dish->is_available == 1 ? 'Có sẵn' : 'Hết hàng' }}" readonly>
                                </div>

                                <!-- Hình ảnh -->
                                <div class="col-lg-6">
                                    <label class="form-label">Hình ảnh</label>
                                    <br>
                                    @if ($dish->image)
                                        <img src="{{ asset('storage/' . $dish->image) }}" alt="Dish Image"
                                            style="max-width: 300px; max-height: 200px;">
                                    @else
                                        <p>Không có hình ảnh</p>
                                    @endif
                                </div>

                                <!-- Miêu tả -->
                                <div class="col-lg-12">
                                    <div class="mb-0">
                                        <label for="description" class="form-label">Miêu tả</label>
                                        <textarea class="form-control bg-light-subtle" name="description" rows="7" readonly>{{ $dish->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Danh sách biến thể -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách biến thể</h4>
                        </div>
                        <div class="card-body">
                            @if ($dish->variants->isEmpty())
                                <p>Không có biến thể nào.</p>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên biến thể</th>
                                            <th>Giá</th>
                                            <th>Tồn kho</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                        <a href="{{ route('variants.create', $dish->id) }}"
                                            class="btn btn-primary mb-3">Thêm biến thể</a>

                                    </thead>
                                    <tbody>
                                        @foreach ($dish->variants as $variant)
                                            <tr>
                                                <td>{{ $variant->name }}</td>
                                                <td>{{ number_format($variant->price, 0, ',', '.') }} VND</td>
                                                <td>{{ $variant->stock }}</td>
                                                <td>{{ $variant->is_available ? 'Còn bán' : 'Hết hàng' }}</td>
                                                <td>
                                                    <!-- Nút Sửa -->
                                                    <a href="{{ route('variants.edit', $variant->id) }}"
                                                        class="btn btn-warning">Sửa</a>

                                                    <!-- Nút Xóa -->
                                                    <form action="{{ route('variants.destroy', $variant->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

                    <!-- Nút Quay lại và Chỉnh sửa -->
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('dish_list') }}" class="btn btn-primary w-100">Quay lại</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ route('dish_edit', $dish->id) }}" class="btn btn-outline-secondary w-100">Chỉnh
                                    sửa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editVariant(variant) {
            alert("Bạn muốn chỉnh sửa biến thể: " + variant.name);
            // Thêm logic mở modal hoặc điều hướng đến trang sửa biến thể
        }
    </script>

@endsection
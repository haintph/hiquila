@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Chỉnh sửa biến thể</h3>
                </div>
                <form action="{{ route('variants.update', $variant->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Tên biến thể</label>
                        <input type="text" name="name" class="form-control" value="{{ $variant->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input type="number" name="price" class="form-control" value="{{ $variant->price }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tồn kho</label>
                        <input type="number" name="stock" class="form-control" value="{{ $variant->stock }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="is_available" class="form-control">
                            <option value="1" {{ $variant->is_available ? 'selected' : '' }}>Còn bán</option>
                            <option value="0" {{ !$variant->is_available ? 'selected' : '' }}>Hết hàng</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <a href="{{ route('variant_list', $variant->dish_id) }}" class="btn btn-secondary">Quay lại</a>
                </form>
                <div class="col-xl-9 col-lg-8">
                </div>
            </div>
        </div>
    </div>
@endsection

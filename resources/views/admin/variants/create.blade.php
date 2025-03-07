@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Thêm biến thể mới</h3>
                </div>
                <form action="{{ route('variants.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="dish_id" value="{{ $dish->id }}">

                    <div class="mb-3">
                        <label class="form-label">Tên biến thể</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tồn kho</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="is_available" class="form-control">
                            <option value="1">Còn bán</option>
                            <option value="0">Hết hàng</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <a href="{{ route('dish_detail', $dish->id) }}" class="btn btn-secondary">Quay lại</a>
                </form>

                <div class="col-xl-9 col-lg-8">
                </div>
            </div>
        </div>
    </div>
@endsection

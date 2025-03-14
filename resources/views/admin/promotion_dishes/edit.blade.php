@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Chỉnh sửa món trong khuyến mãi</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <form action="{{ route('promotion_dish_update', $promotionDish->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin món khuyến mãi</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Chương trình khuyến mãi -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Chương trình khuyến mãi</label>
                                        <select class="form-control" name="promotion_id" required>
                                            @foreach($promotions as $promotion)
                                                <option value="{{ $promotion->id }}" {{ $promotionDish->promotion_id == $promotion->id ? 'selected' : '' }}>
                                                    {{ $promotion->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Món ăn -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Món ăn</label>
                                        <select class="form-control" name="dish_id" required>
                                            @foreach($dishes as $dish)
                                                <option value="{{ $dish->id }}" {{ $promotionDish->dish_id == $dish->id ? 'selected' : '' }}>
                                                    {{ $dish->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Giá trị giảm -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Giá trị giảm</label>
                                            <input type="number" name="discount" class="form-control" value="{{ $promotionDish->discount }}" min="0" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nút cập nhật -->
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">Cập nhật</button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{ route('promotion_dish_list') }}" class="btn btn-primary w-100">Hủy</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
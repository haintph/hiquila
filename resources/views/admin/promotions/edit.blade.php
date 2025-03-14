@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Chỉnh sửa khuyến mãi</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <form action="{{ route('promotion_update', $promotion->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin khuyến mãi</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Tên khuyến mãi -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên khuyến mãi</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $promotion->name }}" required>
                                        </div>
                                    </div>

                                    <!-- Loại giảm giá -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Loại giảm giá</label>
                                            <select class="form-control" name="discount_type">
                                                <option value="percent"
                                                    {{ $promotion->discount_type == 'percent' ? 'selected' : '' }}>Giảm theo
                                                    %</option>
                                                <option value="fixed"
                                                    {{ $promotion->discount_type == 'fixed' ? 'selected' : '' }}>Giảm theo
                                                    số tiền</option>
                                                <option value="freeship"
                                                    {{ $promotion->discount_type == 'freeship' ? 'selected' : '' }}>Miễn phí
                                                    vận chuyển</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Giá trị giảm -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Giá trị giảm</label>
                                            <input type="number" name="discount_value" class="form-control"
                                                value="{{ $promotion->discount_value }}" required>
                                        </div>
                                    </div>

                                    <!-- Ngày bắt đầu -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ngày bắt đầu</label>
                                            <input type="datetime-local" name="start_date" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($promotion->start_date)->format('Y-m-d\TH:i:s') }}"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Ngày kết thúc -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ngày kết thúc</label>
                                            <input type="datetime-local" name="end_date" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($promotion->end_date)->format('Y-m-d\TH:i:s') }}"
                                                required>
                                        </div>
                                    </div>


                                    <!-- Trạng thái -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Trạng thái</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ $promotion->status == 1 ? 'selected' : '' }}>Hoạt động
                                            </option>
                                            <option value="0" {{ $promotion->status == 0 ? 'selected' : '' }}>Ngừng
                                                hoạt động</option>
                                        </select>
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
                                    <a href="{{ route('promotion_list') }}" class="btn btn-primary w-100">Hủy</a>
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
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Larkon.
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

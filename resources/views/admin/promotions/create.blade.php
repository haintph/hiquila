@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Tạo khuyến mãi</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <form action="{{ route('promotion_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin khuyến mãi</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    
                                    <!-- Tên khuyến mãi -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Tên khuyến mãi</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nhập tên khuyến mãi" required>
                                        </div>
                                    </div>

                                    <!-- Loại giảm giá -->
                                    <div class="col-lg-6">
                                        <label for="discount_type" class="form-label">Loại giảm giá</label>
                                        <select class="form-control" name="discount_type" required>
                                            <option value="">Chọn loại giảm giá</option>
                                            <option value="percent">Giảm theo %</option>
                                            <option value="fixed">Giảm số tiền cố định</option>
                                            <option value="freeship">Miễn phí vận chuyển</option>
                                        </select>
                                    </div>

                                    <!-- Giá trị giảm -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="discount_value" class="form-label">Giá trị giảm</label>
                                            <input type="number" name="discount_value" class="form-control" placeholder="Nhập giá trị giảm" min="0" required>
                                        </div>
                                    </div>

                                    <!-- Ngày bắt đầu -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">Ngày bắt đầu</label>
                                            <input type="date" name="start_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Ngày kết thúc -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">Ngày kết thúc</label>
                                            <input type="date" name="end_date" class="form-control" required>
                                        </div>
                                    </div>

                                    <!-- Trạng thái -->
                                    <div class="col-lg-6">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Hoạt động</option>
                                            <option value="0">Ngừng hoạt động</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Nút tạo & hủy -->
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">Tạo</button>
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
                        <script>document.write(new Date().getFullYear())</script> &copy; Larkon.
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

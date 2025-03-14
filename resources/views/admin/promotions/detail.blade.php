@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <h3>Chi tiết khuyến mãi</h3>
                </div>

                <div class="col-xl-9 col-lg-8">
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
                                        <p class="form-control">{{ $promotion->name }}</p>
                                    </div>
                                </div>

                                <!-- Loại giảm giá -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Loại giảm giá</label>
                                        <p class="form-control">
                                            {{ ucfirst($promotion->discount_type) }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Giá trị giảm -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Giá trị giảm</label>
                                        <p class="form-control">
                                            @if ($promotion->discount_type == 'percent')
                                                {{ $promotion->discount_value }}%
                                            @elseif ($promotion->discount_type == 'fixed')
                                                ${{ number_format($promotion->discount_value, 2) }}
                                            @else
                                                Miễn phí vận chuyển
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <!-- Ngày bắt đầu -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ngày bắt đầu</label>
                                        <p class="form-control">{{ $promotion->start_date }}</p>
                                    </div>
                                </div>

                                <!-- Ngày kết thúc -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ngày kết thúc</label>
                                        <p class="form-control">{{ $promotion->end_date }}</p>
                                    </div>
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Trạng thái</label>
                                        <p class="form-control">
                                            {{ $promotion->status ? 'Hoạt động' : 'Ngừng hoạt động' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nút quay lại & chỉnh sửa -->
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('promotion_list') }}" class="btn btn-primary w-100">Quay lại</a>
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ route('promotion_edit', $promotion->id) }}" class="btn btn-outline-secondary w-100">Chỉnh sửa</a>
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

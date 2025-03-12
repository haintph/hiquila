@extends('admin.layouts.master')

@section('content')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">All Attribute List</h4>

                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light rounded"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    This Month
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="#!" class="dropdown-item">Download</a>
                                    <!-- item-->
                                    <a href="#!" class="dropdown-item">Export</a>
                                    <!-- item-->
                                    <a href="#!" class="dropdown-item">Import</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Tên món</th>
                                            <th>Ảnh món</th>
                                            <th>Các loại</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- dish --}}
                                        @foreach ($dishes as $dish)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck{{ $dish->id }}">
                                                        <label class="form-check-label"
                                                            for="customCheck{{ $dish->id }}">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $dish->id }}</td>
                                                <td>{{ $dish->name }}</td>
                                                <td><img src="{{ asset('storage/' . $dish->image) }}" alt=""
                                                        class="avatar-md"></td>
                                                {{-- hiển thị danh sách biến thể --}}
                                                <td onclick="toggleVariants({{ $dish->id }})" style="cursor: pointer;">
                                                    @if ($dish->variants->isNotEmpty())
                                                        {{ $dish->variants->pluck('name')->implode(', ') }}
                                                    @else
                                                        <span class="text-muted">Chưa có loại</span>
                                                    @endif
                                                </td>

                                                <td>{{ $dish->created_at ? $dish->created_at->format('d/m/Y H:i:s') : 'N/A' }}
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2">
                                                        {{-- <a href="#!" class="btn btn-light btn-sm">
                                                            <iconify-icon icon="solar:eye-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a>

                                                        <a href="#!" class="btn btn-soft-danger btn-sm">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a> --}}
                                                        {{-- Nút thêm biến thể --}}
                                                        <a href="{{ route('variants.create', $dish->id) }}"
                                                            class="btn btn-soft-success btn-sm">
                                                            <iconify-icon icon="solar:add-circle-bold"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- Hàng ẩn chứa danh sách biến thể --}}
                                            <tr id="variants-{{ $dish->id }}" style="display: none;">
                                                <td colspan="8">
                                                    <ul class="list-group">
                                                        @foreach ($dish->variants as $variant)
                                                            <li class="list-group-item d-flex justify-content-between align-items-center"
                                                                style="background-color: #e4e6ea;"
                                                                id="variant-row-{{ $variant->id }}">
                                                                <div class="d-flex flex-grow-1 align-items-center">
                                                                    <span class="me-3">{{ $variant->name }}</span>
                                                                    <span
                                                                        class="me-3">{{ number_format($variant->price, 0, ',', '.') }}đ</span>
                                                                    <span class="me-3">Tồn kho:
                                                                        {{ $variant->stock }}</span>

                                                                    {{-- Trạng thái có sẵn / hết hàng --}}
                                                                    @if ($variant->is_available)
                                                                        <span class="badge bg-success me-3">Có sẵn</span>
                                                                    @else
                                                                        <span class="badge bg-danger me-3">Hết hàng</span>
                                                                    @endif
                                                                </div>

                                                                {{-- Các nút chức năng --}}
                                                                <div class="d-flex gap-2">
                                                                    <a href="{{ route('variants.edit', $variant->id) }}"
                                                                        class="btn btn-soft-primary btn-sm">
                                                                        <iconify-icon icon="solar:pen-2-broken"
                                                                            class="align-middle fs-18"></iconify-icon>
                                                                    </a>
                                                                    <form
                                                                        onsubmit="deleteVariant(event, {{ $variant->id }})"
                                                                        style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-soft-danger btn-sm">
                                                                            <iconify-icon
                                                                                icon="solar:trash-bin-minimalistic-2-broken"
                                                                                class="align-middle fs-18"></iconify-icon>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                        <div class="card-footer border-top">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end mb-0">
                                    {{-- Hiển thị phân trang --}}
                                    {{ $dishes->links('vendor.pagination.bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- End Container Fluid -->


        <!-- ========== Footer Start ========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Larkon. Crafted by
                        <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon>
                        <a href="https://1.envato.market/techzaa" class="fw-bold footer-text" target="_blank">Techzaa</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ========== Footer End ========== -->

    </div>
@endsection

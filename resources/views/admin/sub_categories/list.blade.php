@extends('admin.layouts.master')

@section('content')
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Subcategories List</h4>

                            <a href="{{ route('sub_category_create') }}" class="btn btn-sm btn-primary">
                                Add Subcategory
                            </a>

                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    This Month
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#!" class="dropdown-item">Download</a>
                                    <a href="#!" class="dropdown-item">Export</a>
                                    <a href="#!" class="dropdown-item">Import</a>
                                </div>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

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
                                            <th>Subcategories</th>
                                            <th>Parent Category</th>
                                            {{-- <th>ID</th> --}}
                                            <th>Time update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subCategories as $sub)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label" for="customCheck2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('storage/' . $sub->img_subcate) }}" alt="" class="avatar-md">
                                                        </div>
                                                        <p class="text-dark fw-medium fs-15 mb-0">{{ $sub->name_sub }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ $sub->category->name ?? 'N/A' }}</td>
                                                {{-- <td>{{ $sub->id }}</td> --}}
                                                <td>{{ $sub->updated_at }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('sub_category_detail', $sub->id) }}" class="btn btn-light btn-sm">
                                                            <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                        </a> <!-- Detail -->
                                                        
                                                        <a href="{{ route('sub_category_edit', $sub->id) }}" class="btn btn-soft-primary btn-sm">
                                                            <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                        </a> <!-- Edit -->
                                                        <form action="{{ route('sub_category_destroy', $sub->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" type="submit"
                                                                class="btn btn-soft-danger btn-sm">
                                                                <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>

                        <div class="card-footer border-top">
                            {{ $subCategories->links() }} <!-- Hiển thị phân trang -->
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
                        </script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone"
                            class="fs-18 align-middle text-danger"></iconify-icon> <a
                            href="https://1.envato.market/techzaa" class="fw-bold footer-text"
                            target="_blank">Techzaa</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ========== Footer End ========== -->

    </div>
@endsection

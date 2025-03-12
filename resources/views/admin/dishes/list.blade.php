@extends('admin.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Dishes List</h4>

                            <form action="{{ route('dish_list') }}" method="GET" class="d-flex gap-2">
                                <input type="text" name="search" class="form-control form-control-sm" placeholder="Tìm kiếm món ăn..."
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Tìm kiếm</button>
                            </form>                            

                            <a href="{{ route('dish_create') }}" class="btn btn-sm btn-primary">
                                Add Dish
                            </a>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th>STT</th>
                                        <th>Món ănăn</th>
                                        {{-- <th>Description</th> --}}
                                        <th>GiáGiá</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục phụ</th>
                                        <th>Khả dụng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dishes as $dish)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div
                                                        class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                        <img src="{{ asset('storage/' . $dish->image) }}" alt=""
                                                            class="avatar-md">
                                                    </div>
                                                    <p class="text-dark fw-medium fs-15 mb-0">{{ $dish->name }}</p>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $dish->description }}</td> --}}
                                            <td>{{ number_format($dish->price, 0, ',', '.') }} VND</td>
                                            <td>{{ $dish->stock }}</td>
                                            <td>{{ $dish->subCategory->name_sub ?? 'N/A' }}</td>
                                            <td>{{ $dish->is_available ? 'Sẵn có' : 'Không sẵn có' }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('dish_detail', $dish->id) }}"
                                                        class="btn btn-light btn-sm">
                                                        <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <a href="{{ route('dish_edit', $dish->id) }}"
                                                        class="btn btn-soft-primary btn-sm">
                                                        <iconify-icon icon="solar:pen-2-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <form action="{{ route('dish_destroy', $dish->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                                            type="submit" class="btn btn-soft-danger btn-sm">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer border-top">
                            {{ $dishes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone"
                            class="fs-18 align-middle text-danger"></iconify-icon> <a href="https://1.envato.market/techzaa"
                            class="fw-bold footer-text" target="_blank">Techzaa</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

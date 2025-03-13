@extends('admin.layouts.master')

@section('content')
<div class="page-content">
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    {{-- Card Header --}}
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">All Dishes List</h4>
                        <a href="{{ route('dish_create') }}" class="btn btn-sm btn-primary">Add Dish</a>
                    </div>

                    {{-- Alert Messages --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show m-3">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Table Content --}}
                    <div class="table-responsive">
                        <table class="table table-hover table-centered align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center" style="width: 5%">#</th>
                                    <th style="width: 30%">Dish</th>
                                    <th class="text-center" style="width: 20%">Price</th>
                                    <th style="width: 15%">Sub Category</th>
                                    <th class="text-center" style="width: 10%">Stock</th>
                                    <th class="text-center" style="width: 10%">Status</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dishes as $dish)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset('storage/' . ($dish->image ?? $dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}" 
                                                     alt="{{ $dish->name }}" 
                                                     class="rounded" width="60" height="60">
                                                <span class="text-dark fw-medium">{{ $dish->name }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if ($dish->isDiscounted())
                                                <div class="text-success fw-bold fs-5">{{ number_format($dish->discountedPrice(), 0, ',', '.') }} VND</div>
                                                <div class="text-decoration-line-through text-danger small">{{ number_format($dish->price, 0, ',', '.') }} VND</div>
                                                <span class="badge bg-success">-{{ $dish->activePromotion->first()->discount ?? 0 }}%</span>
                                            @else
                                                <div class="fw-bold fs-5">{{ number_format($dish->price, 0, ',', '.') }} VND</div>
                                            @endif
                                        </td>
                                        <td>{{ $dish->subCategory->name_sub ?? 'N/A' }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $dish->stock == 0 ? 'bg-warning' : 'bg-primary' }}">
                                                {{ $dish->stock == 0 ? 'Hết hàng' : $dish->stock }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge {{ $dish->stock == 0 ? 'bg-danger' : 'bg-success' }}">
                                                {{ $dish->stock == 0 ? 'Ngừng bán' : 'Còn bán' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('dish_detail', $dish->id) }}" class="btn btn-light btn-sm" title="View">
                                                    <iconify-icon icon="solar:eye-broken" class="fs-18"></iconify-icon>
                                                </a>
                                                <a href="{{ route('dish_edit', $dish->id) }}" class="btn btn-soft-primary btn-sm" title="Edit">
                                                    <iconify-icon icon="solar:pen-2-broken" class="fs-18"></iconify-icon>
                                                </a>
                                                <form action="{{ route('dish_destroy', $dish->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" title="Delete">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="fs-18"></iconify-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">Không có món ăn nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if($dishes->hasPages())
                        <div class="card-footer border-top py-3 text-center">
                            {{ $dishes->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
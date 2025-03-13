@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-xxl">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">All Promotion Dishes</h4>
                            <a href="{{ route('promotion_dish_create') }}" class="btn btn-sm btn-primary">
                                Add Promotion Dish
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
                                        <th>Promotion</th>
                                        <th>Dish</th>
                                        <th>Discount (%)</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promotionDishes as $promotionDish)
                                        <tr>
                                            <td class="text-dark fw-medium fs-15">{{ $promotionDish->promotion->name }}</td>
                                            <td>{{ $promotionDish->dish->name }}</td>
                                            <td>{{ (int) $promotionDish->discount }}%</td>
                                            <td>{{ $promotionDish->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('promotion_dish_edit', $promotionDish->id) }}" class="btn btn-soft-primary btn-sm">
                                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a> 
                                                    <form action="{{ route('promotion_dish_destroy', $promotionDish->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" type="submit" class="btn btn-soft-danger btn-sm">
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

                        <div class="card-footer border-top">
                            {{ $promotionDishes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
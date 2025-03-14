@extends('client.layouts.master')

@section('content')
<div class="shop_area mt-70 mb-70">
    <div class="container">
        <div class="row shop_wrapper">
            @if ($dishes->count() > 0)
                @foreach ($dishes as $dish)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="single_product">
                            <div class="product_thumb">
                                <!-- Ảnh chính -->
                                <a class="primary_img" href="{{ route('dish_detail', $dish->id) }}">
                                    <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                                </a>

                                <!-- Hiện ảnh phụ khi hover -->
                                @if ($dish->images->count() > 0)
                                    <a class="secondary_img" href="{{ route('dish_detail', $dish->id) }}">
                                        <img src="{{ asset('storage/' . $dish->images[0]->image_path) }}" alt="{{ $dish->name }}">
                                    </a>
                                @endif

                                <!-- Nhãn sản phẩm -->
                                <div class="label_product">
                                    @if (optional($dish->promotion)->discount > 0)
                                        <span class="label_sale">Sale </span>
                                    @endif
                                    <span class="label_new">New</span>
                                </div>

                                <!-- Nút chức năng -->
                                <div class="action_links">
                                    <ul>
                                        <li class="add_to_cart">
                                            <a href="#" data-tippy="Add to cart">
                                                <span class="lnr lnr-cart"></span>
                                            </a>
                                        </li>
                                        <li class="quick_button">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_{{ $dish->id }}">
                                                <span class="lnr lnr-magnifier"></span>
                                            </a>
                                        </li>
                                        <li class="wishlist">
                                            <a href="#"><span class="lnr lnr-heart"></span></a>
                                        </li>
                                        <li class="compare">
                                            <a href="#"><span class="lnr lnr-sync"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Phần thông tin sản phẩm -->
                            <div class="product_content grid_content">
                                <h4 class="product_name">
                                    <a href="{{ route('dish_detail', $dish->id) }}">{{ $dish->name }}</a>
                                </h4>
                                <p><a href="#">{{ $dish->subCategory->name_sub ?? 'Không xác định' }}</a></p>
                                <div class="price_box">
                                    @if (optional($dish->promotion)->discount > 0)
                                        <span class="current_price">
                                            {{ number_format($dish->price - ($dish->price * optional($dish->promotion)->discount / 100)) }} VNĐ
                                        </span>
                                        <span class="old_price">{{ number_format($dish->price) }} VNĐ</span>
                                    @else
                                        <span class="current_price">{{ number_format($dish->price) }} VNĐ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Không tìm thấy món ăn phù hợp.</p>
            @endif
        </div>
    </div>
</div>

@endsection

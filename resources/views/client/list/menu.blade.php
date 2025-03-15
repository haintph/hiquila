@extends('client.layouts.master')
@section('content')
    <div class="shop_area mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip"
                                title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip"
                                title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                                title="List"></button>
                        </div>
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <div class="row shop_wrapper">
                        @foreach ($dishes as $dish)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        @php
                                            $images = $dish->images; // Lấy danh sách ảnh từ quan hệ
                                        @endphp

                                        <!-- Ảnh chính -->
                                        <a class="primary_img" href="{{ route('dish_detail', $dish->id) }}">
                                            <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                                        </a>

                                        <!-- Ảnh album -->
                                        @if ($images->count() > 0)
                                            <a class="secondary_img" href="{{ route('dish_detail', $dish->id) }}">
                                                <img class="hover-img"
                                                    src="{{ asset('storage/' . $images[0]->image_path) }}"
                                                    alt="{{ $dish->name }}">
                                            </a>
                                        @endif

                                        <!-- Nhãn sản phẩm -->
                                        <!-- Nhãn sản phẩm -->
                                        <div class="label_product">
                                            @if (optional($dish->promotion)->discount > 0)
                                                <span class="label_sale">Sale</span>
                                            @endif

                                            @if (now()->diffInDays($dish->created_at) <= 7)
                                                <span class="label_new">New</span>
                                            @endif
                                        </div>

                                        <!-- Nút chức năng -->
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart">
                                                    <a href="#" data-tippy="Add to cart" data-tippy-placement="top"
                                                        data-tippy-arrow="true" data-tippy-inertia="true">
                                                        <span class="lnr lnr-cart"></span>
                                                    </a>
                                                </li>
                                                <li class="quick_button">
                                                    <a href="#" data-tippy="Quick view" data-tippy-placement="top"
                                                        data-tippy-arrow="true" data-tippy-inertia="true"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal_box_{{ $dish->id }}">
                                                        <span class="lnr lnr-magnifier"></span>
                                                    </a>
                                                </li>
                                                <li class="wishlist">
                                                    <a href="#" data-tippy="Add to Wishlist"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true">
                                                        <span class="lnr lnr-heart"></span>
                                                    </a>
                                                </li>
                                                <li class="compare">
                                                    <a href="#" data-tippy="Add to Compare" data-tippy-placement="top"
                                                        data-tippy-arrow="true" data-tippy-inertia="true">
                                                        <span class="lnr lnr-sync"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="product_content grid_content">
                                        <h4 class="product_name">
                                            <a href="{{ route('dish_detail', $dish->id) }}">{{ $dish->name }}</a>
                                        </h4>
                                        <p>
                                            <a href="#">{{ $dish->subCategory->name_sub ?? 'Không xác định' }}</a>
                                        </p>
                                        <div class="price_box">
                                            @if (optional($dish->promotion)->discount > 0)
                                                <span class="current_price">
                                                    {{ number_format($dish->price - ($dish->price * optional($dish->promotion)->discount) / 100) }}
                                                    VNĐ
                                                </span>
                                                <span class="old_price">{{ number_format($dish->price) }} VNĐ</span>
                                            @else
                                                <span class="current_price">{{ number_format($dish->price) }} VNĐ</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="product_content list_content">
                                        <h4 class="product_name">
                                            <a href="{{ route('dish_detail', $dish->id) }}">{{ $dish->name }}</a>
                                        </h4>
                                        <p>
                                            <a href="#">{{ $dish->subCategory->name_sub ?? 'Không xác định' }}</a>
                                        </p>
                                        <div class="price_box">
                                            <span class="current_price">${{ number_format($dish->price, 2) }}</span>
                                            <span class="old_price">$362.00</span> <!-- Nếu có giá cũ thì lấy từ DB -->
                                        </div>
                                        <div class="product_desc">
                                            <p>{{ Str::limit($dish->description, 100) }}</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="#" title="Add to cart">Add to
                                                        Cart</a></li>
                                                <li class="quick_button">
                                                    <a href="#" data-tippy="Quick view" data-tippy-placement="top"
                                                        data-tippy-arrow="true" data-tippy-inertia="true"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal_box_{{ $dish->id }}">
                                                        <span class="lnr lnr-magnifier"></span>
                                                    </a>
                                                </li>
                                                <li class="wishlist">
                                                    <a href="#" data-tippy="Add to Wishlist"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true">
                                                        <span class="lnr lnr-heart"></span>
                                                    </a>
                                                </li>
                                                <li class="compare">
                                                    <a href="#" data-tippy="Add to Compare"
                                                        data-tippy-placement="top" data-tippy-arrow="true"
                                                        data-tippy-inertia="true">
                                                        <span class="lnr lnr-sync"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                {{-- Nút "<<" để về trang đầu --}}
                                @if ($dishes->onFirstPage())
                                    <li class="disabled"><span>&laquo;</span></li>
                                @else
                                    <li><a href="{{ $dishes->url(1) }}">&laquo;</a></li>
                                @endif

                                {{-- Hiển thị danh sách số trang --}}
                                @foreach ($dishes->getUrlRange(max($dishes->currentPage() - 2, 1), min($dishes->currentPage() + 2, $dishes->lastPage())) as $page => $url)
                                    @if ($page == $dishes->currentPage())
                                        <li class="current"><span>{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                {{-- Nút "next" --}}
                                @if ($dishes->hasMorePages())
                                    <li class="next"><a href="{{ $dishes->nextPageUrl() }}">next</a></li>
                                @else
                                    <li class="disabled"><span>next</span></li>
                                @endif

                                {{-- Nút ">>" để về trang cuối --}}
                                @if ($dishes->currentPage() == $dishes->lastPage())
                                    <li class="disabled"><span>&raquo;</span></li>
                                @else
                                    <li><a href="{{ $dishes->url($dishes->lastPage()) }}">&raquo;</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h3>Women</h3>
                                <ul>
                                    <li class="widget_sub_categories sub_categories1"><a
                                            href="javascript:void(0)">Shoes</a>
                                        <ul class="widget_dropdown_categories dropdown_categories1">
                                            <li><a href="#">Document</a></li>
                                            <li><a href="#">Dropcap</a></li>
                                            <li><a href="#">Dummy Image</a></li>
                                            <li><a href="#">Dummy Text</a></li>
                                            <li><a href="#">Fancy Text</a></li>
                                        </ul>
                                    </li>
                                    <li class="widget_sub_categories sub_categories2"><a
                                            href="javascript:void(0)">Bags</a>
                                        <ul class="widget_dropdown_categories dropdown_categories2">
                                            <li><a href="#">Flickr</a></li>
                                            <li><a href="#">Flip Box</a></li>
                                            <li><a href="#">Cocktail</a></li>
                                            <li><a href="#">Frame</a></li>
                                            <li><a href="#">Flickrq</a></li>
                                        </ul>
                                    </li>
                                    <li class="widget_sub_categories sub_categories3"><a
                                            href="javascript:void(0)">Clothing</a>
                                        <ul class="widget_dropdown_categories dropdown_categories3">
                                            <li><a href="#">Platform Beds</a></li>
                                            <li><a href="#">Storage Beds</a></li>
                                            <li><a href="#">Regular Beds</a></li>
                                            <li><a href="#">Sleigh Beds</a></li>
                                            <li><a href="#">Laundry</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget_list widget_filter">
                                <h3>Filter by price</h3>
                                <form method="GET" action="{{ route('menu') }}" id="priceFilterForm">
                                    @csrf
                                    <div id="slider-range"></div>
                                    <div class="price-display" id="amount"></div>

                                    <input type="hidden" name="min_price" id="minPrice">
                                    <input type="hidden" name="max_price" id="maxPrice">
                                    <button type="submit">Filter</button>
                                </form>
                            </div>
                            <div class="widget_list widget_color">
                                <h3>Select By Color</h3>
                                <ul>
                                    <li>
                                        <a href="#">Black <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> Blue <span>(8)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Brown <span>(10)</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> Green <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Pink <span>(4)</span></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="widget_list widget_color">
                                <h3>Select By SIze</h3>
                                <ul>
                                    <li>
                                        <a href="#">S <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> M <span>(8)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">L <span>(10)</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> XL <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">XLL <span>(4)</span></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="widget_list widget_manu">
                                <h3>Manufacturer</h3>
                                <ul>
                                    <li>
                                        <a href="#">Brake Parts <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Accessories <span>(10)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Engine Parts <span>(4)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">hermes <span>(10)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">louis vuitton <span>(8)</span></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="widget_list tags_widget">
                                <h3>Product tags</h3>
                                <div class="tag_cloud">
                                    <a href="#">Men</a>
                                    <a href="#">Women</a>
                                    <a href="#">Watches</a>
                                    <a href="#">Bags</a>
                                    <a href="#">Dress</a>
                                    <a href="#">Belt</a>
                                    <a href="#">Accessories</a>
                                    <a href="#">Shoes</a>
                                </div>
                            </div>
                            <div class="widget_list banner_widget">
                                <div class="banner_thumb">
                                    <a href="#"><img src="assets/img/bg/banner17.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Tạo slider giá
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 1000000, // 100 triệu
                values: [0, 1000000], // Giá trị ban đầu
                slide: function(event, ui) {
                    // Cập nhật giá trị hiển thị trong div
                    var minPrice = ui.values[0].toLocaleString();
                    var maxPrice = ui.values[1].toLocaleString();
                    $("#amount").text("₫" + minPrice + " - ₫" + maxPrice); // Hiển thị giá trị tiền tệ
                    $("#minPrice").val(ui.values[0]);
                    $("#maxPrice").val(ui.values[1]);
                }
            });

            // Hiển thị giá trị ban đầu
            var minPrice = $("#slider-range").slider("values", 0).toLocaleString();
            var maxPrice = $("#slider-range").slider("values", 1).toLocaleString();
            $("#amount").text("₫" + minPrice + " - ₫" + maxPrice); // Cập nhật giá trị ban đầu
        });
    </script>
    <style>
        .price-display {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 10px 15px;
            font-size: 16px;
            /* Giảm kích thước font để dễ nhìn hơn */
            color: #f6931f;
            font-weight: bold;
            text-align: left;
            /* Căn trái */
            border-radius: 5px;
            width: 100%;
            /* Tùy chỉnh chiều rộng nếu cần */
            max-width: 350px;
            /* Tối đa chiều rộng */
            margin: 0 auto;
            /* Căn giữa */
            white-space: nowrap;
            /* Ngăn việc cắt text */
            padding-left: 10px;
            /* Thêm khoảng cách từ bên trái */
        }
    </style>
@endsection

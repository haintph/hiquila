@extends('client.layouts.master')
@section('content')
    <!--slider area start-->
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="/client/assets/img/slider/banner1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Vegetables Big Sale</h1>
                                <h2>Fresh Farm Products</h2>
                                <p>
                                    10% certifled-organic mix of fruit and veggies. Perfect for weekly cooking and
                                    snacking!
                                </p>
                                <a href="shop.html">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="/client/assets/img/slider/banner2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Fresh Vegetables</h1>
                                <h2>Natural Farm Products</h2>
                                <p>
                                    Widest range of farm-fresh Vegetables, Fruits & seasonal produce
                                </p>
                                <a href="shop.html">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="/client/assets/img/slider/banner3.png">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider_content">
                                <h1>Fresh Tomatoes</h1>
                                <h2>Natural Farm Products</h2>
                                <p>
                                    Natural organic tomatoes make your health stronger. Put your information here
                                </p>
                                <a href="shop.html">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->
    <hr>
    <!--product area start-->
    <div class="product_area  mb-64">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <p>Recently added our store</p>
                            <h2>Trending Dishes</h2>
                        </div>
                        <div class="product_tab_btn">
                            {{-- <ul class="nav" role="tablist" id="nav-tab">
                                <li>
                                    <a class="active" data-toggle="tab" href="#plant1" role="tab" aria-controls="plant1"
                                        aria-selected="true">
                                        Vegetables
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#plant2" role="tab" aria-controls="plant2"
                                        aria-selected="false">
                                        Fruits
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#plant3" role="tab" aria-controls="plant3"
                                        aria-selected="false">
                                        Salads
                                    </a>
                                </li>
                            </ul> --}}
                            <ul class="nav" role="tablist" id="nav-tab">
                                @foreach ($categories->take(5) as $index => $category)
                                    <li>
                                        <a class="{{ $index == 0 ? 'active' : '' }}" data-toggle="tab"
                                            href="#category{{ $category->id }}" role="tab"
                                            aria-controls="category{{ $category->id }}"
                                            aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="plant1" role="tabpanel">
                                <div class="product_carousel product_column5 owl-carousel">
                                    @foreach ($dishes->filter(fn($dish) => $dish->is_new || $dish->isDiscounted())->chunk(2) as $pair)
                                        <div class="product_item">
                                            @foreach ($pair as $dish)
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img"
                                                                href="{{ route('dish.details', $dish->id) }}">
                                                                <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                                                    alt="{{ $dish->name }}" class="rounded primary"
                                                                    width="212" height="212">
                                                            </a>
                                                            <a class="secondary_img"
                                                                href="{{ route('dish.details', $dish->id) }}">
                                                                <img src="{{ asset('storage/' . ($dish->images->skip(1)->first()->image_path ?? ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg'))) }}"
                                                                    alt="{{ $dish->name }}" class="rounded secondary"
                                                                    width="212" height="212">
                                                            </a>
                                                            <div class="label_product">
                                                                @if ($dish->isDiscounted())
                                                                    <span class="label_sale">Sale</span>
                                                                @endif
                                                                @if ($dish->is_new)
                                                                    <span class="label_new">New</span>
                                                                @endif
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="add_to_cart">
                                                                        <a href="#" title="Thêm vào giỏ">
                                                                            <i class="lnr lnr-cart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="quick_button">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal_box_{{ $dish->id }}">
                                                                            <i class="lnr lnr-magnifier"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="wishlist">
                                                                        <a href="#" title="Yêu thích">
                                                                            <i class="lnr lnr-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="compare">
                                                                        <a href="#" title="So sánh">
                                                                            <i class="lnr lnr-sync"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name">
                                                                <a
                                                                    href="{{ route('dish.details', $dish->id) }}">{{ $dish->name }}</a>
                                                            </h4>
                                                            <p><a
                                                                    href="#">{{ $dish->subCategory->name_sub ?? 'Danh mục' }}</a>
                                                            </p>
                                                            <div class="price_box">
                                                                <span class="current_price">
                                                                    {{ number_format($dish->discountedPrice(), 0, ',', '.') }}đ
                                                                </span>
                                                                @if ($dish->isDiscounted())
                                                                    <span class="old_price">
                                                                        {{ number_format($dish->price, 0, ',', '.') }}đ
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->

    <!--banner area start-->
    <div class="banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="/client/assets/img/bg/banner1.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="/client/assets/img/bg/banner2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--banner fullwidth area satrt-->
    <div class="banner_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_full_content">
                        <p>Black Fridays !</p>
                        <h2>Sale 50% OFf <span>all vegetable products</span></h2>
                        <a href="shop.html">discover now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner fullwidth area end-->

    <!--product banner area satrt-->
    <div class="product_banner_area mb-65">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <p>Recently added our store </p>
                        <h2>Best Sellers</h2>
                    </div>
                </div>
            </div>
            <div class="product_banner_container">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="/client/assets/img/bg/banner4.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="small_product_area product_carousel  product_column2 owl-carousel">
                            @foreach (collect($dishes)->filter(fn($dish) => $dish->isDiscounted() && optional($dish->promotion)->discount >= 30 && optional($dish->promotion)->discount <= 100)->chunk(3) as $group)
                                <div class="product_item">
                                    @foreach ($group as $dish)
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="{{ route('dish.details', $dish->id) }}">
                                                        <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                                            alt="{{ $dish->name }}" class="rounded primary"
                                                            width="212" height="212">
                                                    </a>
                                                    <a class="secondary_img"
                                                        href="{{ route('dish.details', $dish->id) }}">
                                                        <img src="{{ asset('storage/' . ($dish->images->skip(1)->first()->image_path ?? ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg'))) }}"
                                                            alt="{{ $dish->name }}" class="rounded secondary"
                                                            width="212" height="212">
                                                    </a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name">
                                                        <a
                                                            href="{{ route('dish.details', $dish->id) }}">{{ $dish->name }}</a>
                                                    </h4>
                                                    <p><a
                                                            href="#">{{ $dish->subCategory->name_sub ?? 'Danh mục' }}</a>
                                                    </p>
                                                    <div class="action_links">
                                                        <ul>
                                                            <li class="add_to_cart">
                                                                <a href="#" title="Thêm vào giỏ">
                                                                    <i class="lnr lnr-cart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="quick_button">
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#modal_box_{{ $dish->id }}">
                                                                    <i class="lnr lnr-magnifier"></i>
                                                                </a>
                                                            </li>
                                                            <li class="wishlist">
                                                                <a href="#" title="Yêu thích">
                                                                    <i class="lnr lnr-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="compare">
                                                                <a href="#" title="So sánh">
                                                                    <i class="lnr lnr-sync"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="price_box">
                                                        <span class="current_price">
                                                            {{ number_format($dish->discountedPrice(), 0, ',', '.') }}đ
                                                        </span>
                                                        <span class="old_price">
                                                            {{ number_format($dish->price, 0, ',', '.') }}đ
                                                        </span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product banner area end-->

    <!--product area start-->
    <div class="product_area mb-65">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <p>Recently added our store </p>
                        <h2>Mostview Deshes</h2>
                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_carousel product_column5 owl-carousel">
                            @foreach (collect($dishes)->filter(fn($dish) => 
                                optional($dish->promotion)->discount >= 1 && 
                                optional($dish->promotion)->discount <= 100 && 
                                !optional($dish->promotion)->is_expired || 
                                ($dish->view >= 50 && optional($dish->promotion)->discount > 0)
                            ) as $dish)
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{ route('dish.details', $dish->id) }}">
                                                <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                                    alt="{{ $dish->name }}" class="rounded primary"
                                                    width="212" height="212">
                                            </a>
                                            <a class="secondary_img" href="{{ route('dish.details', $dish->id) }}">
                                                <img src="{{ asset('storage/' . ($dish->images->skip(1)->first()->image_path ?? ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg'))) }}"
                                                    alt="{{ $dish->name }}" class="rounded secondary"
                                                    width="212" height="212">
                                            </a>
                                            <div class="label_product">
                                                @if(optional($dish->promotion)->discount > 0)
                                                    <span class="label_sale">Sale {{ optional($dish->promotion)->discount }}%</span>
                                                @endif
                                                @if($dish->view >= 50)
                                                    <span class="label_new">View</span>
                                                @endif
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart">
                                                        <a href="#" title="Thêm vào giỏ">
                                                            <i class="lnr lnr-cart"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quick_button">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_{{ $dish->id }}">
                                                            <i class="lnr lnr-magnifier"></i>
                                                        </a>
                                                    </li>
                                                    <li class="wishlist">
                                                        <a href="#" title="Yêu thích">
                                                            <i class="lnr lnr-heart"></i>
                                                        </a>
                                                    </li>
                                                    <li class="compare">
                                                        <a href="#" title="So sánh">
                                                            <i class="lnr lnr-sync"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <h4 class="product_name">
                                                <a href="{{ route('dish.details', $dish->id) }}">{{ $dish->name }}</a>
                                            </h4>
                                            <p><a href="#">{{ $dish->subCategory->name_sub ?? 'Danh mục' }}</a></p>
                                            <div class="price_box">
                                                <span class="current_price">
                                                    {{ number_format($dish->discountedPrice(), 0, ',', '.') }}đ
                                                </span>
                                                <span class="old_price">
                                                    {{ number_format($dish->price, 0, ',', '.') }}đ
                                                </span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area end-->

    <!--blog area start-->
    <section class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <p>Our recent articles about Organic</p>
                        <h2>Our Blog Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog_carousel blog_column3 owl-carousel">
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="/client/assets/img/blog/blog1.jpg"
                                            alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="articles_date">
                                        <p>23/06/2021 | <a href="#">eCommerce</a> </p>
                                    </div>
                                    <h4 class="post_title"><a href="blog-details.html">Lorem ipsum dolor sit amet,
                                            elit.
                                            Impedit, aliquam animi, saepe ex.</a></h4>
                                    <footer class="blog_footer">
                                        <a href="blog-details.html">Show more</a>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="/client/assets/img/blog/blog2.jpg"
                                            alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="articles_date">
                                        <p>23/06/2021 | <a href="#">eCommerce</a> </p>
                                    </div>
                                    <h4 class="post_title"><a href="blog-details.html"> dolor sit amet, elit. Illo
                                            iste
                                            sed animi quaerat nobis odit nulla.</a></h4>
                                    <footer class="blog_footer">
                                        <a href="blog-details.html">Show more</a>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="/client/assets/img/blog/blog3.jpg"
                                            alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="articles_date">
                                        <p>23/06/2021 | <a href="#">eCommerce</a> </p>
                                    </div>
                                    <h4 class="post_title"><a href="blog-details.html">maxime laborum voluptas
                                            minus,
                                            est, unde eaque esse tenetur.</a></h4>
                                    <footer class="blog_footer">
                                        <a href="blog-details.html">Show more</a>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="/client/assets/img/blog/blog2.jpg"
                                            alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="articles_date">
                                        <p>23/06/2021 | <a href="#">eCommerce</a> </p>
                                    </div>
                                    <h4 class="post_title"><a href="blog-details.html">Lorem ipsum dolor sit amet,
                                            elit.
                                            Impedit, aliquam animi, saepe ex.</a></h4>
                                    <footer class="blog_footer">
                                        <a href="blog-details.html">Show more</a>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog area end-->

    <!--brand area start-->
    <!--brand area start-->
    <div class="brand_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel ">
                        <div class="single_brand">
                            <a href="#"><img src="/client/assets/img/brand/brand1.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/client/assets/img/brand/brand2.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/client/assets/img/brand/brand3.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/client/assets/img/brand/brand4.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/client/assets/img/brand/brand2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .product_item {
            display: flex;
            flex-direction: column;
            gap: 30px;
            /* Tăng khoảng cách giữa 2 hàng */
        }

        .product_column5 .owl-stage {
            display: flex;
            align-items: start;
        }

        .product_thumb img {
            width: 212px;
            height: 212px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
    <!--brand area end-->
@endsection

<div class="tab-content">
    <div class="tab-pane fade show active" id="plant1" role="tabpanel">
        <div class="product_carousel product_column5 owl-carousel">
            @foreach ($dishes as $dish)
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('dish.details', $dish->id) }}">
                                <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                    alt="{{ $dish->name }}">
                            </a>
                            <a class="secondary_img" href="{{ route('dish.details', $dish->id) }}">
                                <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                    alt="{{ $dish->name }}">
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
                                        {{-- {{ route('cart.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="Thêm vào giỏ">
                                            <span class="lnr lnr-cart"></span>
                                        </a>
                                    </li>
                                    <li class="quick_button">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal_box_{{ $dish->id }}">
                                            <span class="lnr lnr-magnifier"></span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        {{-- {{ route('wishlist.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="Yêu thích">
                                            <span class="lnr lnr-heart"></span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        {{-- {{ route('compare.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="So sánh">
                                            <span class="lnr lnr-sync"></span>
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
                            <p><a href="#">{{ $dish->subCategory->name ?? 'Danh mục' }}</a>
                            </p>
                            <div class="price_box">
                                <span class="current_price">${{ $dish->discountedPrice() }}</span>
                                @if ($dish->isDiscounted())
                                    <span class="old_price">${{ $dish->price }}</span>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                </article>
            @endforeach
            {{-- <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product1.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product2.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Aliquam
                                    Consequat</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product3.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product4.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Donec Non
                                    Est</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$46.00</span>
                                <span class="old_price">$382.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product5.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product6.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>

                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Etiam
                                    Gravida</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$56.00</span>
                                <span class="old_price">$322.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product7.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product8.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Fusce
                                    Aliquam</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$66.00</span>
                                <span class="old_price">$312.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product9.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product10.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Letraset
                                    Sheets</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$38.00</span>
                                <span class="old_price">$262.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product11.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product12.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Lorem
                                    Ipsum
                                    Lec</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$36.00</span>
                                <span class="old_price">$145.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product13.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product1.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                    Tellus</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$48.00</span>
                                <span class="old_price">$257.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product12.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product2.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Nunc Neque
                                    Eros</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$35.00</span>
                                <span class="old_price">$245.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product11.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product3.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Proin
                                    Lectus
                                    Ipsum</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product9.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product4.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Quisque In
                                    Arcu</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$55.00</span>
                                <span class="old_price">$235.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product8.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product5.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Cas Meque
                                    Metus</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product7.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product6.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Aliquam
                                    Consequat</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div> --}}
        </div> 
    </div>

     <div class="tab-pane fade" id="plant2" role="tabpanel">
        <div class="product_carousel product_column5 owl-carousel">
            @foreach ($dishes as $dish)
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('dish.details', $dish->id) }}">
                                <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                    alt="{{ $dish->name }}">
                            </a>
                            <a class="secondary_img" href="{{ route('dish.details', $dish->id) }}">
                                <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                    alt="{{ $dish->name }}">
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
                                        {{-- {{ route('cart.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="Thêm vào giỏ">
                                            <span class="lnr lnr-cart"></span>
                                        </a>
                                    </li>
                                    <li class="quick_button">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal_box_{{ $dish->id }}">
                                            <span class="lnr lnr-magnifier"></span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        {{-- {{ route('wishlist.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="Yêu thích">
                                            <span class="lnr lnr-heart"></span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        {{-- {{ route('compare.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="So sánh">
                                            <span class="lnr lnr-sync"></span>
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
                            <p><a href="#">{{ $dish->subCategory->name ?? 'Danh mục' }}</a>
                            </p>
                            <div class="price_box">
                                <span class="current_price">${{ $dish->discountedPrice() }}</span>
                                @if ($dish->isDiscounted())
                                    <span class="old_price">${{ $dish->price }}</span>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                </article>
            @endforeach
            {{-- <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product13.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product1.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Mauris Vel
                                    Tellus</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$48.00</span>
                                <span class="old_price">$257.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product12.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product2.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Nunc Neque
                                    Eros</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$35.00</span>
                                <span class="old_price">$245.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product11.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product3.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Proin
                                    Lectus
                                    Ipsum</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product9.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product4.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Quisque In
                                    Arcu</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$55.00</span>
                                <span class="old_price">$235.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product8.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product5.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Cas Meque
                                    Metus</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product7.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product6.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare" data-tippy-placement="top"
                                            data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Aliquam
                                    Consequat</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product1.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product2.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Aliquam
                                    Consequat</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product3.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product4.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Donec
                                    Non
                                    Est</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$46.00</span>
                                <span class="old_price">$382.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product5.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product6.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>

                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Etiam
                                    Gravida</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$56.00</span>
                                <span class="old_price">$322.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product7.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product8.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Fusce
                                    Aliquam</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$66.00</span>
                                <span class="old_price">$312.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product9.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product10.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Letraset
                                    Sheets</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$38.00</span>
                                <span class="old_price">$262.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product11.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product12.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Lorem
                                    Ipsum
                                    Lec</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$36.00</span>
                                <span class="old_price">$145.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div> --}}

        </div>
    </div>
    <div class="tab-pane fade" id="plant3" role="tabpanel">
        <div class="product_carousel product_column5 owl-carousel">
            @foreach ($dishes as $dish)
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('dish.details', $dish->id) }}">
                                <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                    alt="{{ $dish->name }}">
                            </a>
                            <a class="secondary_img" href="{{ route('dish.details', $dish->id) }}">
                                <img src="{{ asset('storage/' . ($dish->images->first()->image_path ?? 'client/assets/img/no-image.jpg')) }}"
                                    alt="{{ $dish->name }}">
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
                                        {{-- {{ route('cart.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="Thêm vào giỏ">
                                            <span class="lnr lnr-cart"></span>
                                        </a>
                                    </li>
                                    <li class="quick_button">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal_box_{{ $dish->id }}">
                                            <span class="lnr lnr-magnifier"></span>
                                        </a>
                                    </li>
                                    <li class="wishlist">
                                        {{-- {{ route('wishlist.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="Yêu thích">
                                            <span class="lnr lnr-heart"></span>
                                        </a>
                                    </li>
                                    <li class="compare">
                                        {{-- {{ route('compare.add', $dish->id) }} --}}
                                        <a href="#" data-tippy="So sánh">
                                            <span class="lnr lnr-sync"></span>
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
                            <p><a href="#">{{ $dish->subCategory->name ?? 'Danh mục' }}</a>
                            </p>
                            <div class="price_box">
                                <span class="current_price">${{ $dish->discountedPrice() }}</span>
                                @if ($dish->isDiscounted())
                                    <span class="old_price">${{ $dish->price }}</span>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                </article>
            @endforeach
            {{-- <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product11.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product3.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Proin
                                    Lectus
                                    Ipsum</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product9.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product4.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Quisque
                                    In
                                    Arcu</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$55.00</span>
                                <span class="old_price">$235.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product13.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product1.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Mauris
                                    Vel
                                    Tellus</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$48.00</span>
                                <span class="old_price">$257.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product12.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product2.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Nunc
                                    Neque
                                    Eros</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$35.00</span>
                                <span class="old_price">$245.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product1.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product2.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Aliquam
                                    Consequat</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product3.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product4.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Donec
                                    Non
                                    Est</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$46.00</span>
                                <span class="old_price">$382.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product5.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product6.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>

                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Etiam
                                    Gravida</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$56.00</span>
                                <span class="old_price">$322.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product7.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product8.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Fusce
                                    Aliquam</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$66.00</span>
                                <span class="old_price">$312.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product9.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product10.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Letraset
                                    Sheets</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$38.00</span>
                                <span class="old_price">$262.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product11.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product12.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                                <span class="label_new">New</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Lorem
                                    Ipsum
                                    Lec</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$36.00</span>
                                <span class="old_price">$145.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="product_items">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product8.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product5.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Cas
                                    Meque
                                    Metus</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product7.jpg"
                                    alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/client/assets/img/product/product6.jpg"
                                    alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart"><a href="cart.html"
                                            data-tippy="Add to cart" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true">
                                            <span class="lnr lnr-cart"></span></a></li>
                                    <li class="quick_button"><a href="#"
                                            data-tippy="quick view" data-tippy-placement="top"
                                            data-tippy-arrow="true" data-tippy-inertia="true"
                                            data-bs-toggle="modal" data-bs-target="#modal_box">
                                            <span class="lnr lnr-magnifier"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html"
                                            data-tippy="Add to Wishlist"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-heart"></span></a></li>
                                    <li class="compare"><a href="#"
                                            data-tippy="Add to Compare"
                                            data-tippy-placement="top" data-tippy-arrow="true"
                                            data-tippy-inertia="true"><span
                                                class="lnr lnr-sync"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <h4 class="product_name"><a href="product-details.html">Aliquam
                                    Consequat</a></h4>
                            <p><a href="#">Fruits</a></p>
                            <div class="price_box">
                                <span class="current_price">$26.00</span>
                                <span class="old_price">$362.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div> --}}
        </div>
    </div> 
</div>
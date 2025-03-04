<div class="main_header">
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="language_currency">
                        <ul>
                            <li class="language"><a href="#"> Language <i
                                        class="icon-right ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Russian</a></li>
                                </ul>
                            </li>
                            <li class="currency"><a href="#"> Currency <i
                                        class="icon-right ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">€ Euro</a></li>
                                    <li><a href="#">£ Pound Sterling</a></li>
                                    <li><a href="#">$ US Dollar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header_social text-right">
                        <ul>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                    <div class="logo">
                        <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-sm-7 col-8">
                    <div class="header_right_info">
                        <div class="search_container mobail_s_none">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori2">
                                        <option selected value="1">Select a categories</option>
                                        <option value="2">Accessories</option>
                                        <option value="3">Accessories & More</option>
                                        <option value="4">Butters & Eggs</option>
                                        <option value="5">Camera & Video </option>
                                        <option value="6">Mornitors</option>
                                        <option value="7">Tablets</option>
                                        <option value="8">Laptops</option>
                                        <option value="9">Handbags</option>
                                        <option value="10">Headphone & Speaker</option>
                                        <option value="11">Herbs & botanicals</option>
                                        <option value="12">Vegetables</option>
                                        <option value="13">Shop</option>
                                        <option value="14">Laptops & Desktops</option>
                                        <option value="15">Watchs</option>
                                        <option value="16">Electronic</option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                </div>
                            </form>
                        </div>
                        <div class="header_account_area">
                            <div class="header_account_list register">
                                <ul>
                                    @auth
                                        <li><a href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
                                        <li><span>/</span></li>
                                        <li>
                                            <a style="color: red;" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <li><a href="{{ route('auth') }}">Register</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="{{ route('auth') }}">Login</a></li>
                                    @endauth
                                </ul>

                            </div>
                            <div class="header_account_list header_wishlist">
                                <a href="wishlist.html"><span class="lnr lnr-heart"></span> <span
                                        class="item_count">3</span> </a>
                            </div>
                            <div class="header_account_list  mini_cart_wrapper">
                                <a href="javascript:void(0)"><span class="lnr lnr-cart"></span><span
                                        class="item_count">2</span></a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="cart_gallery">
                                        <div class="cart_close">
                                            <div class="cart_text">
                                                <h3>cart</h3>
                                            </div>
                                            <div class="mini_cart_close">
                                                <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="assets/img/s-product/product.jpg"
                                                        alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">Primis In Faucibus</a>
                                                <p>1 x <span> $65.00 </span></p>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="#"><i class="icon-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="assets/img/s-product/product2.jpg"
                                                        alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">Letraset Sheets</a>
                                                <p>1 x <span> $60.00 </span></p>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="#"><i class="icon-x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini_cart_table">
                                        <div class="cart_table_border">
                                            <div class="cart_total">
                                                <span>Sub total:</span>
                                                <span class="price">$125.00</span>
                                            </div>
                                            <div class="cart_total mt-10">
                                                <span>total:</span>
                                                <span class="price">$125.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> View
                                                cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="checkout.html"><i class="fa fa-sign-in"></i> Checkout</a>
                                        </div>

                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 mobail_s_block">
                    <div class="search_container">
                        <form action="#">
                            <div class="hover_category">
                                <select class="select_option" name="select" id="categori3">
                                    <option selected value="1">Select a categories</option>
                                    <option value="2">Accessories</option>
                                    <option value="3">Accessories & More</option>
                                    <option value="4">Butters & Eggs</option>
                                    <option value="5">Camera & Video </option>
                                    <option value="6">Mornitors</option>
                                    <option value="7">Tablets</option>
                                    <option value="8">Laptops</option>
                                    <option value="9">Handbags</option>
                                    <option value="10">Headphone & Speaker</option>
                                    <option value="11">Herbs & botanicals</option>
                                    <option value="12">Vegetables</option>
                                    <option value="13">Shop</option>
                                    <option value="14">Laptops & Desktops</option>
                                    <option value="15">Watchs</option>
                                    <option value="16">Electronic</option>
                                </select>
                            </div>
                            <div class="search_box">
                                <input placeholder="Search product..." type="text">
                                <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="categories_menu">
                        <div class="categories_title">
                            <h2 class="categori_toggle">All Cattegories</h2>
                        </div>
                        <div class="categories_menu_toggle">
                            <ul>
                                @foreach ($categories as $item)
                                    <li class="menu_item_children"><a href="#">{{ $item->name }}<i
                                                class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            @foreach ($item->subCategories as $subCategory)
                                                <li class="menu_item_children"><a
                                                        href="#">{{ $subCategory->name_sub }}</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">Sweater</a></li>
                                                        <li><a href="#">Evening</a></li>
                                                        <li><a href="#">Day</a></li>
                                                        <li><a href="#">Sports</a></li>
                                                    </ul>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                @endforeach
                                <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i>
                                        More
                                        Categories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!--main menu start-->
                    <div class="main_menu menu_position">
                        <nav>
                            <ul>
                                <li><a class="active" href="/">home</a>

                                </li>
                                <li class="mega_items"><a href="{{ route('menu') }}">Menu<i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="mega_menu">
                                        <ul class="mega_menu_inner">
                                            <li><a href="#">Shop Layouts</a>
                                                <ul>
                                                    <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                    <li><a href="shop-fullwidth-list.html">Full Width list</a>
                                                    </li>
                                                    <li><a href="shop-right-sidebar.html">Right Sidebar </a>
                                                    </li>
                                                    <li><a href="shop-right-sidebar-list.html"> Right Sidebar
                                                            list</a></li>
                                                    <li><a href="shop-list.html">List View</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">other Pages</a>
                                                <ul>
                                                    <li><a href="cart.html">cart</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="my-account.html">my account</a></li>
                                                    <li><a href="404.html">Error 404</a></li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                                <li><a href="{{ route('blog') }}">blog<i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">services</a></li>
                                        <li><a href="faq.html">Frequently Questions</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html"> Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                </div>
                <div class="col-lg-3">
                    <div class="call-support">
                        <p><a href="tel:(08)23456789">(08) 23 456 789</a> Customer Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

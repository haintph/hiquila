<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/safira/safira/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 12:07:51 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hiquila </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    @include('client.layouts.partials.style')
</head>

<body>
    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        @include('client.layouts.partials.canva-menu')
    </div>
    <!--offcanvas menu area end-->

    <header>
        @include('client.layouts.partials.header')
    </header>
    <!--header area end-->
    <div>
        @yield('content')
    </div>

    <!--brand area end-->
    <div>
        @include('client.layouts.partials.AI')
    </div>
    <!--footer area start-->
    <footer class="footer_widgets">
        @include('client.layouts.partials.footer')
    </footer>
    <!--footer area end-->

    <!-- modal area start-->
    {{-- <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-x"></i></span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="/client/assets/img/product/productbig1.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="/client/assets/img/product/productbig2.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="/client/assets/img/product/productbig3.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="/client/assets/img/product/productbig4.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1"
                                                    role="tab" aria-controls="tab1" aria-selected="false"><img
                                                        src="/client/assets/img/product/product1.jpg"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                    aria-controls="tab2" aria-selected="false"><img
                                                        src="/client/assets/img/product/product6.jpg"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                    role="tab" aria-controls="tab3" aria-selected="false"><img
                                                        src="/client/assets/img/product/product2.jpg"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                                    aria-controls="tab4" aria-selected="false"><img
                                                        src="/client/assets/img/product/product7.jpg"
                                                        alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Donec Ac Tempus</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price">$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                            laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                            in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                            recusandae </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                            <h2>size</h2>
                                            <select class="select_option">
                                                <option selected value="1">s</option>
                                                <option value="1">m</option>
                                                <option value="1">l</option>
                                                <option value="1">xl</option>
                                                <option value="1">xxl</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>color</h2>
                                            <select class="select_option">
                                                <option selected value="1">purple</option>
                                                <option value="1">violet</option>
                                                <option value="1">black</option>
                                                <option value="1">pink</option>
                                                <option value="1">orange</option>
                                            </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1"
                                                    type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest"><a href="#"><i
                                                        class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i
                                                        class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- modal area end-->

    <!--news letter popup start-->
    <!--news letter popup start-->

    <!-- JS
============================================ -->
    @include('client.layouts.partials.script')
</body>
<!-- Mirrored from htmldemo.net/safira/safira/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 12:08:00 GMT -->

</html>

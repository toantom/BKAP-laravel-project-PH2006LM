<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/ruiz-preview/ruiz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 11:43:11 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ruiz - Watch Store HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('public/css/vendor/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{URL::asset('public/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/vendor/simple-line-icons.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{URL::asset('public/css/plugins/animation.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/plugins/animation.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/plugins/fancy-box.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/css/plugins/jqueryui.min.css')}}">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="{{URL::asset('public/css/style.css')}}">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

</head>

<body>

    <div class="main-wrapper">
        
        <!--  Header Start -->
        <header class="header">

            <!-- Header Top Start -->
            <div class="header-top-area d-none d-lg-block text-color-white bg-gren border-bm-1">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('checkout_success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('checkout_success')}}
                </div>
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <li class="language">English <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list">
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                        </ul>
                                    </li>
                                    <li class="curreny-wrap">Currency <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list curreny-list">
                                            <li><a href="#">$ USD</a></li>
                                            <li><a href="#"> € EURO</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top-info-wrap text-right">
                                <ul class="my-account-container">
                                    @if (Auth::check())
                                    <li><a href="{{route('frontend.information')}}">Xin chào {{Auth::user()->name}}</a></li>
                                    <li><a onclick="return confirm('Bạn có muốn đăng xuất không?')" href="{{route('frontend.logout')}}">Đăng xuất</a></li>
                                    <li><a href="{{route('frontend.wishlist')}}">Danh sách ưa thích</a></li>
                                    @else
                                    <li><a href="{{route('frontend.login-register')}}">Đăng nhập/Đăng ký</a></li>
                                    @endif
                                    <li><a href="{{route('frontend.cart')}}">Giỏ hàng</a></li>
                                    <li><a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thanh toán')" @endif href="{{route('frontend.checkout')}}">Thanh toán</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Header Top End -->

            <!-- haeader Mid Start -->
            <div class="haeader-mid-area bg-gren border-bm-1 d-none d-lg-block ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-5">
                            <div class="logo-area">
                                <a href="{{route('frontend.index')}}"><img src="{{URL::asset('public/images/logo/logo1.png')}}" alt="" width="124" height="122"></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="search-box-wrapper">
                                <div class="search-box-inner-wrap">
                                    <form class="search-box-inner">
                                        <div class="search-select-box">
                                            <select class="nice-select">
                                                <optgroup label=" Watch">
                                                    <option value="saab">Sản phẩm</option>
                                                    <option value="saab">Hãng</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="search-field-wrap">
                                            <input type="text" class="search-field" placeholder="Tìm kiếm...">

                                            <div class="search-btn">
                                                <button><i class="icon-magnifier"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="right-blok-box text-white d-flex">

                                <div class="user-wrap">
                                    <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để xem danh sách yêu thích')" @endif href="{{route('frontend.wishlist')}}"><span class="cart-total">@if(Auth::check()){{count($wishlist)}}@else 0 @endif</span> <i class="icon-heart"></i></a>
                                </div>

                                <div class="shopping-cart-wrap">
                                    <a href="{{route('frontend.cart')}}"><i class="icon-basket-loaded"></i><span class="cart-total">{{count($cart->items)}}</span></a>
                                    <ul class="mini-cart">
                                        @foreach ($cart->items as $item)
                                        <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="{{route('frontend.product',$item['id'])}}"><img alt="" src="{{URL::asset('public/images/product/')}}/{{$item['image']}}"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="{{route('frontend.product',$item['id'])}}">
                                                    <h4>{{$item['name']}}</h4>
                                                </a>
                                                <div class="quanti-price-wrap">
                                                    <span class="quantity">{{$item['quantity']}} ×</span>
                                                    <div class="price-box"><span class="new-price">${{$item['price']}}</span></div>
                                                </div>
                                                <a class="remove_from_cart" onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?')" href="{{route('frontend.deletecart',$item['id'])}}"><i class="icon_close"></i></a>
                                            </div>
                                        </li>
                                        @endforeach
                                        <li class="subtotal-box">
                                            <div class="subtotal-title">
                                                <h3>Tổng tiền cần thanh toán :</h3><span>$ {{$cart->total_price}}</span>
                                            </div>
                                        </li>
                                        <li class="mini-cart-btns">
                                            <div class="cart-btns">
                                                <a href="{{route('frontend.cart')}}">Xem giỏ hàng</a>
                                                <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thanh toán')" @endif href="{{route('frontend.checkout')}}">Thanh toán</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- haeader Mid End -->

            <!-- haeader bottom Start -->
            <div class="haeader-bottom-area bg-gren header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 d-none d-lg-block">
                            <div class="main-menu-area white_text">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation text-center">
                                    <ul>
                                        <li class="active"><a href="{{route('frontend.index')}}">Trang chủ</a>
                                        </li>

                                        <li><a href="#">Danh mục sản phẩm <i class="fa fa-angle-down"></i></a>
                                            <ul class="mega-menu">
                                                <li><a href="#">Đồng hồ chính hãng</a>
                                                    <ul>
                                                        @foreach ($cates as $item)
                                                        <li><a href="{{route('frontend.category',$item->id)}}">{{$item->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li><a href="#">Shop Pages</a>
                                                    <ul>
                                                        <li><a href="error404.html">Error 404</a></li>
                                                        <li><a href="compare.html">Compare Page</a></li>
                                                        <li><a href="cart.html">Cart Page</a></li>
                                                        <li><a href="checkout.html">Checkout Page</a></li>
                                                        <li><a href="wishlist.html">Wish List Page</a></li>
                                                    </ul>
                                                </li>
                                            </ul>

                                        </li>
                                        <li><a href="blog.html">Bài viết<i class="fa fa-angle-down"></i></a>

                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Tin tức-Sự Kiện</a></li>
                                                <li><a href="blog-right-sidebar.html">Kiến thức về đồng hồ</a></li>
                                                <li><a href="blog-grid.html">Hỏi đáp về đồng hồ</a></li>
                                                <li><a href="blog-largeimage.html">Báo chí viết về TBT Watch</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="frequently-questions.html">FAQ</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="login-register.html">login &amp; register</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-5 col-md-6 d-block d-lg-none">
                            <div class="logo"><a href="index.html"><img src="./resources/images/logo/logo.png" alt=""></a></div>
                        </div>
                        
                        
                        <div class="col-lg-3 col-md-6 col-7 d-block d-lg-none">
                            <div class="right-blok-box text-white d-flex">

                                <div class="user-wrap">
                                    <a href="wishlist.html"><span class="cart-total">2</span> <i class="icon-heart"></i></a>
                                </div>

                                <div class="shopping-cart-wrap">
                                    <a href="#"><i class="icon-basket-loaded"></i><span class="cart-total">2</span></a>
                                    <ul class="mini-cart">
                                        <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="./resources/images/product/product-02.png"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>Product Name 01</h4>
                                                </a>
                                                <div class="quanti-price-wrap">
                                                    <span class="quantity">1 ×</span>
                                                    <div class="price-box"><span class="new-price">$130.00</span></div>
                                                </div>
                                                <a class="remove_from_cart" href="#"><i class="fa fa-times"></i></a>
                                            </div>
                                        </li>
                                        <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="./resources/images/product/product-03.png"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>Product Name 03</h4>
                                                </a>
                                                <div class="quanti-price-wrap">
                                                    <span class="quantity">1 ×</span>
                                                    <div class="price-box"><span class="new-price">$130.00</span></div>
                                                </div>
                                                <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>
                                            </div>
                                        </li>
                                        <li class="subtotal-box">
                                            <div class="subtotal-title">
                                                <h3>Sub-Total :</h3><span>$ 260.99</span>
                                            </div>
                                        </li>
                                        <li class="mini-cart-btns">
                                            <div class="cart-btns">
                                                <a href="cart.html">View cart</a>
                                                <a href="checkout.html">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mobile-menu-btn d-block d-lg-none">
                                    <div class="off-canvas-btn">
                                        <a href="#"><img src="./resources/images/icon/bg-menu.png" alt=""></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
            <!-- haeader bottom End -->
            
            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>

                    <div class="off-canvas-inner">

                        <div class="search-box-offcanvas">
                            <form>
                                <input type="text" placeholder="Search product...">
                                <button class="search-btn"><i class="icon-magnifier"></i></button>
                            </form>
                        </div>

                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children"><a href="#">Home</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home Page 1</a></li>
                                            <li><a href="index-2.html">Home Page 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Shop</a>
                                        <ul class="megamenu dropdown">
                                            <li class="mega-title has-children"><a href="#">Shop Layouts</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Shop Left Sidebar</a></li>
                                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                    <li><a href="shop-list-left.html">Shop List Left Sidebar</a></li>
                                                    <li><a href="shop-list-right.html">Shop List Right Sidebar</a></li>
                                                    <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-title has-children"><a href="#">Product Details</a>
                                                <ul class="dropdown">
                                                    <li><a href="product-details.html">Single Product Details</a></li>
                                                    <li><a href="variable-product-details.html">Variable Product Details</a></li>
                                                    <li><a href="affiliate-product-details.html">affiliatel Product Details</a></li>
                                                    <li><a href="gallery-product-details.html">Gallery Product Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-title has-children"><a href="#">Shop Pages</a>
                                                <ul class="dropdown">
                                                    <li><a href="error404.html">Error 404</a></li>
                                                    <li><a href="compare.html">Compare Page</a></li>
                                                    <li><a href="cart.html">Cart Page</a></li>
                                                    <li><a href="checkout.html">Checkout Page</a></li>
                                                    <li><a href="wishlist.html">Wish List Page</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.html">Blog Left Sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                            <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                            <li><a href="blog-largeimage.html">Blog Large Image</a></li>
                                            <li><a href="blog-details.html">Blog Details Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="frequently-questions.html">FAQ</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="login-register.html">login &amp; register</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->


                        <div class="header-top-settings offcanvas-curreny-lang-support">
                            <h5>My Account</h5>
                            <ul class="nav align-items-center">
                                <li class="language">English <i class="fa fa-angle-down"></i>
                                    <ul class="dropdown-list">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                    </ul>
                                </li>
                                <li class="curreny-wrap">Currency <i class="fa fa-angle-down"></i>
                                    <ul class="dropdown-list curreny-list">
                                        <li><a href="#">$ USD</a></li>
                                        <li><a href="#"> € EURO</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <div class="top-info-wrap text-left text-black">
                                <h5>My Account</h5>
                                <ul class="offcanvas-account-container">
                                    <li><a href="my-account.html">My account</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul>
                            </div>

                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->
            
        </header>
        <!--  Header Start -->
        
        @yield('content')
       
        <!-- footer Start -->
        <footer>
            <div class="footer-top section-pb section-pt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">

                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Thông tin liên hệ</h6>

                                <div class="footer-addres">
                                    <div class="widget-content mb--20">
                                        <p>Địa chỉ: Số 38A Hoàng Cầu Mới, Phường Trung Liệt <br> Quận Đống Đa, Hà Nội.</p>
                                        <p>Phone: <a href="tel:">0396 757 400</a></p>
                                        <p>Fax: <a href="tel:">(012) 800 888 789</a></p>
                                        <p>Email: <a href="tel:">tbtwatch@gmail.com</a></p>
                                    </div>
                                </div>

                                <ul class="social-icons">
                                    <li>
                                        <a class="facebook social-icon" href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter social-icon" href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="instagram social-icon" href="#" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a class="linkedin social-icon" href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss social-icon" href="#" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Thông tin</h6>
                                <ul class="footer-list">
                                    <li><a href="index.html">Trang chủ</a></li>
                                    <li><a href="about-us.html">Giới thiệu</a></li>
                                    <li><a href="contact.html">Liên hệ nhanh</a></li>
                                    <li><a href="blog.html">Trang Blogs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="widget-footer mt-40">
                                <h6 class="title-widget">Get the app</h6>
                                <p>GreenLife App is now available on Google Play & App Store. Get it now.</p>
                                <ul class="footer-list">
                                    <li><img src="./public/images/brand/img-googleplay.jpg" alt=""></li>
                                    <li><img src="./public/images/brand/img-appstore.jpg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="copy-left-text">
                                <p>Copyright &copy; <a href="#">TBT Watch</a> 2020. All Right Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="copy-right-image">
                                <img src="assets/images/icon/img-payment.png" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer End -->
          
           
        
           
        
        
    </div>

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{URL::asset('public/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{URL::asset('public/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{URL::asset('public/js/vendor/popper.min.js')}}"></script>
    <script src="{{URL::asset('public/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Plugins JS -->
    <script src="{{URL::asset('public/js/plugins/slick.min.js')}}"></script>
    <script src="{{URL::asset('public/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{URL::asset('public/js/plugins/countdown.min.js')}}"></script>
    <script src="{{URL::asset('public/js/plugins/image-zoom.min.js')}}"></script>
    <script src="{{URL::asset('public/js/plugins/fancybox.js')}}"></script>
    <script src="{{URL::asset('public/js/plugins/scrollup.min.js')}}"></script>
    <script src="{{URL::asset('public/js/plugins/jqueryui.min.js')}}"></script> 
    <script src="{{URL::asset('public/js/plugins/ajax-contact.js')}}"></script>

    <!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
    <!--
<script src="assets/js/vendor/vendor.min.js');}}"></script>
<script src="assets/js/plugins/plugins.min.js');}}"></script>
-->

    <!-- Main JS -->
    <script src="{{URL::asset('public/js/main.js')}}"></script>

</body>


<!-- Mirrored from demo.hasthemes.com/ruiz-preview/ruiz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 11:43:43 GMT -->
</html>
@extends('frontend.main')
@section('content')
    <!-- Hero Section Start -->
    <div class="hero-slider hero-slider-one">

        <!-- Single Slide Start -->
        @foreach ($bans_client_1 as $item)
        <div class="single-slide" style="background-image: url(./public/images/banner/{{$item->image}})">
            <!-- Hero Content One Start -->
            <div class="hero-content-one container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="slider-content-text text-left">
                            <h5>Ưu đãi giảm 20% chỉ trong tuần này</h5>
                            <h1>{{$item->name}}</h1>
                            <p>{{$item->content}} </p>
                            <p>Chỉ từ <strong>{{$item->title}}</strong></p>
                            <div class="slide-btn-group">
                                <a href="{{route('frontend.category',1)}}" class="btn btn-bordered btn-style-1">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Content One End -->
        </div>
        @endforeach
        <!-- Single Slide End -->
    </div>
    <!-- Hero Section End -->
    <!-- Banner Area Start -->
    <div class="banner-area section-pt">
        <div class="container">
             <div class="row">
             @foreach ($bans_client_2 as $item)
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner mb-30">
                        <a href="{{route('frontend.category',2)}}"><img src="./public/images/banner/{{$item->image}}" alt=""></a>
                    </div>
                </div>
             @endforeach
             </div>
        </div>
    </div>
    <!-- Banner Area End -->
    <!-- Product Area Start -->
    <div class="product-area section-pb section-pt-30">
        <div class="container">
           <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4>Sản phẩm bán chạy nhất</h4>
                    </div>
                </div>
            </div>
            <div class="row product-active-lg-4">
                @foreach ($pros as $item)
                <div class="col-lg-12">
                    <!-- single-product-area start -->
                    <div class="single-product-area mt-30">
                        <div class="product-thumb">
                            <a href="{{route('frontend.product',$item->id)}}">
                            <img class="primary-image" src="./public/images/product/{{$item->image}}" alt="">
                            </a>
                            <div class="label-product label_new">New</div>
                            <div class="action-links">
                                <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thêm danh sách yêu thích')" @endif href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                
                            </div>
                        </div>
                        <div class="product-caption">
                            <h4 class="product-name"><a href="{{route('frontend.product',$item->id)}}">{{$item->name}}</a></h4>
                            <div class="price-box">
                                <span class="new-price">${{$item->discount}}</span>
                                <span class="old-price">${{$item->price}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-area end -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Product Area End -->
    <!-- Banner Area Start -->
    <div class="banner-area">
        <div class="container">
            <div class="row">
                @foreach ($bans_client_3 as $item)
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner mb-30">
                        <a href="#"><img src="./public/images/banner/{{$item->image}}" alt=""></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Area End -->
    <!-- Product Area Start -->
    <div class="product-area section-pb section-pt-30">
        <div class="container">
           <div class="row">
                <div class="col-12 text-center">
                    <ul class="nav product-tab-menu" role="tablist">
                        <li class="product-tab-item nav-item active">
                            <a class="product-tab__link nav-link active" id="nav-featured-tab" data-toggle="tab" href="#nav-man" role="tab" aria-selected="true">Đồng hồ Nam</a>
                        </li>
                        <li class="product-tab__item nav-item">
                            <a class="product-tab__link nav-link" id="nav-new-tab" data-toggle="tab" href="#nav-woman" role="tab" aria-selected="false">Đồng hồ Nữ</a>
                        </li>
                        <li class="product-tab__item nav-item">
                            <a class="product-tab__link nav-link" id="nav-bestseller-tab" data-toggle="tab" href="#nav-bestseller" role="tab" aria-selected="false">Bestseller</a>
                        </li>
                        <li class="product-tab__item nav-item">
                            <a class="product-tab__link nav-link" id="nav-onsale-tab" data-toggle="tab" href="#nav-onsale" role="tab" aria-selected="false">On Sale</a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Đồng hồ Nam --}}
             <div class="tab-content product-tab__content" id="product-tabContent">
                <div class="tab-pane fade show active" id="nav-man" role="tabpanel">
                    <div class="product-carousel-group">
                        <div class="row product-active-row-4">
                            @foreach($pros_man as $item)
                            <div class="col-lg-12">
                                <!-- single-product-area start -->
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="{{route('frontend.product',$item->id)}}">
                                            <img class="primary-image" src="./public/images/product/{{$item->image}}" alt="">
                                        </a>
                                        <div class="label-product label_new">New</div>
                                        <div class="action-links">
                                            <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                            <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thêm danh sách yêu thích')" @endif href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                            
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <h4 class="product-name"><a href="{{route('frontend.product',$item->id)}}">{{$item->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">${{$item->discount}}</span>
                                            <span class="old-price">${{$item->price}}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-area end -->
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            {{-- Đồng hồ Nữ --}}   
                <div class="tab-pane fade" id="nav-woman" role="tabpanel">
                    <div class="product-carousel-group">
                        <div class="row product-active-row-4">
                            @foreach($pros_woman as $item)
                            <div class="col-lg-12">
                                <!-- single-product-area start -->
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="{{route('frontend.product',$item->id)}}">
                                            <img class="primary-image" src="./public/images/product/{{$item->image}}" alt="">
                                        </a>
                                        <div class="label-product label_new">New</div>
                                        <div class="action-links">
                                            <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                            <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thêm danh sách yêu thích')" @endif href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                            
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <h4 class="product-name"><a href="{{route('frontend.product',$item->id)}}">{{$item->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">${{$item->discount}}</span>
                                            <span class="old-price">${{$item->price}}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-area end -->
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            {{-- BestSeller --}}   
                <div class="tab-pane fade" id="nav-bestseller" role="tabpanel">
                    <div class="product-carousel-group">
                        <div class="row product-active-row-4">
                            @foreach($pros_bestsell as $item)
                            <div class="col-lg-12">
                                <!-- single-product-area start -->
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="{{route('frontend.product',$item->id)}}">
                                            <img class="primary-image" src="./public/images/product/{{$item->image}}" alt="">
                                        </a>
                                        <div class="label-product label_new">New</div>
                                        <div class="action-links">
                                            <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                            <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thêm danh sách yêu thích')" @endif href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                            
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <h4 class="product-name"><a href="{{route('frontend.product',$item->id)}}">{{$item->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">${{$item->discount}}</span>
                                            <span class="old-price">${{$item->price}}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-area end -->
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            {{-- Onsale --}}    
                <div class="tab-pane fade" id="nav-onsale" role="tabpanel">
                    <div class="product-carousel-group">
                        <div class="row product-active-row-4">
                            @foreach($pros_sale as $item)
                            <div class="col-lg-12">
                                <!-- single-product-area start -->
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="{{route('frontend.product',$item->id)}}">
                                            <img class="primary-image" src="./public/images/product/{{$item->image}}" alt="">
                                        </a>
                                        <div class="label-product label_new">New</div>
                                        <div class="action-links">
                                            <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                            <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thêm danh sách yêu thích')" @endif href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                            
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <h4 class="product-name"><a href="{{route('frontend.product',$item->id)}}">{{$item->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">${{$item->discount}}</span>
                                            <span class="old-price">${{$item->price}}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-area end -->
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Product Area End -->
    {{-- Blog Area Start --}}
    <div class="letast-blog-area section-pb">
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $item)
                    <div class="col-lg-4">
                        <div class="singel-latest-blog">
                            <div class="aritcles-content">
                                <div class="author-name">
                                    post by: <a href="#">{{$item->admins->name}}</a> - {{$item->created_at}}
                                </div>
                                <h4><a href="blog-details.html" class="articles-name">{{$item->name}}</a></h4>
                            </div>
                            <div class="articles-image">
                                <a href="blog-details.html">
                                    <img src="./public/images/blog/{{$item->image}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
    {{-- Blog Area End --}}
    {{-- Brands area start --}}
    <div class="our-brand-area section-pb">
        <div class="container">
            <div class="row our-brand-active">
                @foreach ($cates as $item)
                <div class="brand-single-item" >
                    <a href="{{route('frontend.category',$item->id)}}"><img src="./public/images/brand/{{$item->image}}" alt=""></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Brands area end --}}
    {{-- Email Contact --}}
    <div class="newletter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newletter-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12">
                                <div class="newsletter-title mb-30">
                                    <h3>Join Our <br><span>Newsletter Now</span></h3>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-7">
                                <div class="newsletter-footer mb-30">
                                    <input type="text" placeholder="Your email address...">
                                    <div class="subscribe-button">
                                        <button class="subscribe-btn">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
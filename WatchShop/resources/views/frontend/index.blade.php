@extends('frontend.main')
@section('content')
    <!-- Hero Section Start -->
    <div class="hero-slider hero-slider-one">

        <!-- Single Slide Start -->
        @foreach ($bans_client as $item)
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
                                <a href="shop.html" class="btn btn-bordered btn-style-1">Mua ngay</a>
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
             @foreach ($bans_client_small as $item)
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
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4>Best seller products</h4>
                    </div>
                </div>
            </div>
            <div class="row product-active-lg-4">
                <div class="col-lg-12">
                    <!-- single-product-area start -->
                    @foreach ($pros as $item)
                    <div class="single-product-area mt-30">
                        <div class="product-thumb">
                            <a href="product-details.html">
                            <img class="primary-image" src=".public/images/product/{{$item->image}}" alt="">
                            </a>
                            <div class="label-product label_new">New</div>
                            <div class="action-links">
                                <a href="cart.html" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                <a href="wishlist.html" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                            </div>
                        </div>
                        <div class="product-caption">
                            <h4 class="product-name"><a href="product-details.html">{{$item->name}}</a></h4>
                            <div class="price-box">
                                <span class="new-price">${{$item->discount}}</span>
                                <span class="old-price">${{$item->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- single-product-area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End -->

@endsection
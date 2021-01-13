@extends('frontend.main')
@section('content')
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Giới thiệu về TBT Watch</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- Page Conttent -->
<main class="about-us-page section-ptb">
    
    <div class="about-us_area section-pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-us_img">
                        <img src="{{URL::asset('public/images/banner/about-us_bg.jpg')}}" alt="About Us Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us_content">
                        <h3 class="heading mb-20">TBT WATCH</h3>
                        <p class="short-desc mb-20">
                            Nhà phân phối độc quyền các thương hiệu đồng hồ, kính mắt, bút ký nổi tiếng thế giới: Epos Swiss, Atlantic Swiss, Diamond D, Philippe Auguste, Jacques Lemans, Citizen, Aries Gold, dây da đồng hồ, dây đồng hồ đeo tay....
                        </p>
                        <div class="munoz-btn-ps_left slide-btn">
                            <a class="btn" href="{{route('frontend.index')}}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="testimonials-area bg-gray section-ptb">
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" testimonials-area">
                        <div class="row testimonial-two">
                            <div class="col-lg-6 ml-auto mr-auto">
                                <div class="testimonial-wrap-two text-center">
                                    <div class="quote-container">
                                        <div class="quote-image">
                                            <img src="{{URL::asset('public/images/testimonial/testimonial-01.jpg')}}" alt="">
                                        </div>
                                        <div class="author">
                                            <h6>Niloba Khan</h6>
                                            <p>CEO of Hasbar</p>
                                        </div>
                                        <div class="testimonials-text">
                                            <p>Hỗ trợ và phản hồi rất tuyệt vời, giúp tôi giải quyết một số vấn đề mà tôi gặp phải và giải quyết gần như cùng ngày. Rất vui được hợp tác cùng TBT WATCH!!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ml-auto mr-auto">
                                <div class="testimonial-wrap-two text-center">
                                    <div class="quote-container">
                                        <div class="quote-image">
                                            <img src="{{URL::asset('public/images/testimonial/testimonial-02.jpg')}}" alt="">
                                        </div>
                                        <div class="author">
                                            <h6>Devite oni</h6>
                                            <p>CEO of SunPark</p>
                                        </div>
                                        <div class="testimonials-text">
                                            <p>Hỗ trợ và phản hồi rất tuyệt vời, giúp tôi giải quyết một số vấn đề mà tôi gặp phải và giải quyết gần như cùng ngày. Rất vui được hợp tác cùng TBT WATCH!!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ml-auto mr-auto">
                                <div class="testimonial-wrap-two text-center">
                                    <div class="quote-container">
                                        <div class="quote-image">
                                            <img src="{{URL::asset('public/images/testimonial/testimonial-01.jpg')}}" alt="">
                                        </div>
                                        <div class="author">
                                            <h6>Kathy Young</h6>
                                            <p>CEO of SunPark</p>
                                        </div>
                                        <div class="testimonials-text">
                                            <p>Hỗ trợ và phản hồi rất tuyệt vời, giúp tôi giải quyết một số vấn đề mà tôi gặp phải và giải quyết gần như cùng ngày. Rất vui được hợp tác cùng TBT WATCH!!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</main>
<!--// Page Conttent -->
@endsection
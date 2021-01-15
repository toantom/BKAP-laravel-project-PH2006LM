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
                    <li class="breadcrumb-item"><a href="{{route('frontend.blog')}}">Danh sách bài viết</a></li>
                    <li class="breadcrumb-item active">{{$blog->name}}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- main-content-wrap start -->
<div class="main-content-wrap shop-page section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- blog-sidebar-wrap start -->
                <div class="blog-sidebar-wrap">
                    <div class="blog-sidebar-widget-area">
                        <!--single-widget start  -->
                        <div class="single-widget mb-30">
                            <h4 class="widget-title">Danh mục</h4>
                            <!-- category-widget start -->
                            <div class="category-widget-list">
                                <ul>
                                    @foreach ($cateblog as $item)
                                        <li><a href="{{route('frontend.show-blog',$item->slug)}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- category-widget end -->
                        </div>
                        <!--single-widget end  -->
                    </div>
                </div>
                <!-- blog-sidebar-wrap end -->
            </div>
            <div class="col-lg-9 order-lg-2 order-1">

                <div class="blog-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- single-blog-wrap Start -->
                            <div class="single-blog-wrap mb-40">
                                <div class="latest-blog-content mt-0">
                                    <h4><a href="">{{$blog->name}}</a></h4>
                                    <ul class="post-meta">
                                        <li class="post-author">By <a href="#">{{$blog->admin->name}} </a></li>
                                        <li class="post-date">{{$blog->created_at}}</li>
                                    </ul>
                                </div>
                                <div class="latest-blog-image">
                                    <a href=""><img src="{{URL::asset('public/images/blog')}}/{{$blog->image}}" alt="" width="870px" height="494px"></a>
                                </div>
                                <div class="latest-blog-content mt-20">
                                    {!!$blog->content!!}
                                </div>

                                <div class="meta-sharing">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="entry-meta mt-15">
                                                Tags: <a href="#">Watch</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="social-icons text-right">
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
                                </div>
                            </div>
                            <!-- single-blog-wrap End -->

                        </div>
                    </div>

                    <div class="related-post-blog-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h4>Bài viết gần đây</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($blogs as $item)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-latest-blog mt-30">
                                        <div class="latest-blog-image">
                                            <a href="blog-details.html"><img src="{{URL::asset('public/images/blog')}}/{{$item->image}}" alt="" width="270px" height="205px"></a>
                                        </div>
                                        <div class="latest-blog-content mt-20">
                                            <h4><a href="blog-details.html"> {{$item->name}}</a></h4>
                                            <ul class="post-meta">
                                                <li class="post-date">{{$item->created_at}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@endsection
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
                    <li class="breadcrumb-item active">Danh sách bài viết</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- main-content-wrap start -->
<div class="main-content-wrap blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- blog-sidebar-wrap start -->
                <div class="blog-sidebar-wrap section-pt">
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
                <div class="blog-wrapper section-pt">
                    <div class="row"> 
                        @foreach ($blogs as $item)
                            <div class="col-lg-6 col-md-6">
                                <div class="singel-latest-blog">
                                    <div class="articles-image">
                                        <a href="{{route('frontend.blog-detail',$item->slug)}}">
                                            <img src="{{URL::asset('public/images/blog')}}/{{$item->image}}" alt="" width="420px" height="318px">
                                        </a>
                                    </div>
                                    <div class="aritcles-content">
                                        <div class="author-name">
                                            post by: <a href="#"> {{$item->admin->name}}</a> - {{$item->created_at}}
                                        </div>
                                        <h4><a href="{{route('frontend.blog-detail',$item->slug)}}" class="articles-name">{{$item->name}}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach                 
                    </div>
                    <!-- paginatoin-area start -->
                    <div class="paginatoin-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                {{$blogs->links()}}
                            </div>
                        </div>
                    </div>
                    <!-- paginatoin-area end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@endsection
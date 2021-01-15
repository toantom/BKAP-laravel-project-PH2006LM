@extends('frontend.main')
@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="i{{route('frontend.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
                <!-- shop-sidebar-wrap start -->
                <div class="shop-sidebar-wrap">
                    <div class="shop-box-area">

                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box shop-sidebar mb-30">
                            <h4 class="title">Đồng hồ chính hãng</h4>
                            <!-- category-sub-menu start -->
                            <div class="category-sub-menu">
                                <ul>
                                    @foreach ($cates as $item)
                                    <li><h4 style="color: red"><a href="{{route('frontend.category',$item->id)}}">{{$item->name}}</a></h4>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- category-sub-menu end -->
                        </div>
                        <!--sidebar-categores-box end  -->
                        <!-- man-woman start -->
                        <div class="shop-sidebar mb-30">
                            <h4 class="title"><a href="">Đồng hồ Nam</a></h4>
                            <h4 class="title"><a href="">Đồng hồ Nữ</a></h4>
                        </div>
                        <!-- man-woman end -->
                        <!-- shop-sidebar start -->
                        <div class="shop-sidebar mb-30">
                            <h4 class="title">Khoảng giá</h4>
                            <!-- filter-price-content start -->
                            <div class="filter-price-content">
                                <form action="#" method="post">
                                    <div id="price-slider" class="price-slider"></div>
                                    <div class="filter-price-wapper">

                                        <a class="add-to-cart-button" href="#">
                                            <span>FILTER</span>
                                        </a>
                                        <div class="filter-price-cont">

                                            <span>Price:</span>
                                            <div class="input-type">
                                                <input type="text" id="min-price" readonly="" />
                                            </div>
                                            <span>—</span>
                                            <div class="input-type">
                                                <input type="text" id="max-price" readonly="" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- filter-price-content end -->
                        </div>
                        

                    </div>
                </div>
                <!-- shop-sidebar-wrap end -->
            </div>
            <div class="col-lg-9 order-lg-2 order-1">

                <!-- shop-product-wrapper start -->
                <div class="shop-product-wrapper">
                    <div class="row align-itmes-center">
                        <div class="col">
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar">
                                <!-- product-view-mode start -->

                                <div class="product-mode">
                                    <!--shop-item-filter-list-->
                                    <h4>Danh sách sản phẩm</h4>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <!-- product-view-mode end -->
                                <!-- product-short start -->
                                <div class="product-short">
                                    <p>Sắp xếp :</p>
                                    <select class="nice-select" name="sortby">
                                        <option value="rating">Giá(Cao > Thấp)</option>
                                        <option value="date">Đánh giá</option>
                                    </select>
                                </div>
                                <!-- product-short end -->
                            </div>
                            <!-- shop-top-bar end -->
                        </div>
                    </div>

                    <!-- shop-products-wrap start -->
                    <div class="shop-products-wrap">
                        <div class="tab-content">
                            <div class="tab-pane active" id="list">
                                @foreach ($pros as $item)
                                <div class="shop-product-list-wrap">
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-3">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product">
                                                <div class="product-image">
                                                <a href="{{route('frontend.product',$item->id)}}"><img src="{{URL::asset('public/images/product')}}/{{$item->image}}" alt="Produce Images"></a>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="product-content-list text-left">
                                               
                                                <h4><a href="{{route('frontend.product',$item->id)}}" class="product-name">{{$item->name}}</a></h4>
                                                <div class="price-box">
                                                    @if ($item->discount)
                                                        <span class="old-price">{{number_format($item->price)}} VND</span>
                                                        <span class="new-price">{{number_format($item->price - ($item->price * ($item->discount / 100)))}} VND</span>
                                                    @else
                                                        <span class="new-price">{{number_format($item->price)}} VND</span>
                                                    @endif
                                                </div>

                                                <div class="product-rating">
                                                    <ul class="d-flex">
                                                        @for($i=0;$i<$item->star;$i++)
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        @endfor
                                                    </ul>
                                                </div>

                                                <p>{{$item->des}}</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3">
                                            <div class="block2">
                                                <ul class="stock-cont">
                                                    <li class="product-sku">Sku: <span>{{$item->sku}}</span></li>
                                                    <li class="product-stock-status">Trạng thái: <span class="in-stock">Còn hàng</span></li>
                                                </ul>
                                                <div class="product-button">
                                                   
                                                    <ul class="actions">
                                                        <li class="add-to-wishlist">
                                                            <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thêm danh sách yêu thích')" @endif href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i>Thêm vào danh sách yêu thích</a>
                                                        </li>
                                                    </ul>
                                                    <div class="add-to-cart">
                                                        <div class="product-button-action">
                                                            <a href="{{route('frontend.addcart',[$item->id,1])}}" class="add-to-cart">Thêm vào giỏ hàng</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrap end -->

                    <!-- paginatoin-area start -->
                    {{-- <div class="paginatoin-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12"> --}}
                                {{$pros->links()}}
                            {{-- </div>
                        </div>
                    </div> --}}
                    <!-- paginatoin-area end -->
                </div>
                <!-- shop-product-wrapper end -->
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->







@endsection
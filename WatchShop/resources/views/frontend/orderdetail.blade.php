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
                    <li class="breadcrumb-item"><a href="{{route('frontend.information')}}">Thông tin tài khoản</a></li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb cart-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="" class="cart-table" method="post">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Ảnh sản phẩm</th>
                                    <th class="cart-product-name">Tên sản phẩm </th>
                                    <th class="plantmore-product-price">Giá tiền</th>
                                    <th class="plantmore-product-quantity">Số lượng</th>
                                    <th class="plantmore-product-subtotal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail as $item)
                                <tr>
                                    
                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="{{URL::asset('public/images/product/')}}/{{$item->product->image}}" alt="" height="120px" width="auto"></a></td>
                                    <td class="plantmore-product-name"><a href="#">{{$item->product->name}}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">{{number_format($item->product->price)}} VND</span></td>
                                    <td class="plantmore-product-quantity"><span class="amount">{{$item->quantity}}</span></td>
                                    <td class="product-subtotal"><span class="amount">{{number_format(($item->price)*($item->quantity))}} VND</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="coupon-all">
                                <div class="coupon2">
                                    <a href="{{route('frontend.information')}}" class=" continue-btn">Quay lại</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="cart-page-total">
                                <h2>Thành tiền</h2>
                                <ul>
                                    <li>Số lượng sản phẩm <span>{{count($detail)}}</span></li>
                                    <li>Tổng tiền cần thanh toán <span>${{$bill->total_price}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->








@endsection

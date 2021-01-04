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
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb checkout-page">
    <div class="container">
        <!-- checkout-details-wrapper start -->
        <div class="checkout-details-wrapper">
            <form action="{{route('frontend.checkout')}}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- billing-details-wrap start -->
                        <div class="billing-details-wrap">
                            
                                <h3 class="shoping-checkboxt-title">Thông tin người nhận</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Họ tên<span class="required">*</span></label>
                                            <input type="text" name="name">
                                        @error('name')
                                            <small class='text-danger'>{{$message}}</small>
                                        @enderror
                                        </p>
                                    </div>
                                            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Địa chỉ Email<span class="required">*</span></label>
                                            <input type="text" name="email">
                                        @error('email')
                                            <small class='text-danger'>{{$message}}</small>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Địa chỉ nhận hàng <span class="required">*</span></label>
                                            <input type="text" placeholder="Ghi rõ số nhà, quận, huyện, thành phố" name="address_ship">
                                        @error('address_ship')
                                            <small class='text-danger'>{{$message}}</small>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Số điện thoại người nhận</label>
                                            <input type="number" name="phone" placeholder="Gồm 10-13 chữ số">
                                        @error('phone')
                                            <small class='text-danger'>{{$message}}</small>
                                        @enderror
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row m-0">
                                            <label>Ghi chú nhận hàng</label>
                                            <input type="textarea" placeholder="Ghi chú về đơn hàng của bạn, ví dụ như hàng dễ vỡ,.v.v." name="note" class="checkout-mess" rows="2" cols="5">
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <!-- billing-details-wrap end -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- your-order-wrapper start -->
                        <div class="your-order-wrapper">
                            <h3 class="shoping-checkboxt-title">Chi tiết đơn hàng</h3>
                            <!-- your-order-wrap start-->
                            <div class="your-order-wrap">
                                <!-- your-order-table start -->
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart->items as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$item['name']}} <strong class="product-quantity"> × {{$item['quantity']}}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">${{$item['price']}}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <th>Tổng tiền</th>
                                                <td><strong><span class="amount">${{$cart->total_price}}</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- your-order-table end -->

                                <!-- your-order-wrap end -->
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <!-- ACCORDION START -->
                                        <h5>Thanh toán COD (Cash on deliver)</h5>
                                        <div class="payment-content">
                                            <p>Thanh toán khi nhận hàng</p>
                                        </div>
                                        <!-- ACCORDION END -->
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="Xác nhận đặt hàng">
                                    </div>
                                </div>
                                <!-- your-order-wrapper start -->

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- checkout-details-wrapper end -->
    </div>
</div>
<div id="serviceSup">
    <div class="wrp">
        <div class="group">
            <div class="item">
                <div class="flex">
                    <div class="img">
                        <img data-src="/view/css/icon/sup1.png" alt="Ship" class="lazy" src="/view/css/icon/sup1.png">
                    </div>
                    <div class="text">
                        <p class="ttu fRobotoB">GIAO HÀNG MIỄN PHÍ</p>
                        <p>Thanh toán (COD) tại nhà</p>
                    </div>
                </div> 
            </div>
            <div class="item">
                <div class="flex">
                    <div class="img">
                        <img data-src="/view/css/icon/sup2.png" alt="Doi san pham" class="lazy" src="/view/css/icon/sup2.png">
                    </div>
                    <div class="text">
                        <p class="ttu fRobotoB">30 NGÀY ĐỔI SẢN PHẨM</p>
                        <p>Miễn phí</p>
                    </div>
                </div> 
            </div>
            <div class="item">
                <div class="flex">
                    <div class="img">
                        <img data-src="/view/css/icon/sup3.png" alt="Bao hanh" class="lazy" src="/view/css/icon/sup3.png">
                    </div>
                    <div class="text">
                        <p class="ttu fRobotoB">BẢO HÀNH QUỐC TẾ</p>
                        <p>Thay pin miễn phí</p>
                    </div>
                </div> 
            </div>
            <div class="item">
                <div class="flex">
                    <div class="img">
                        <img data-src="/view/css/icon/sup4.png" alt="Hoa don do" class="lazy" src="/view/css/icon/sup4.png">
                    </div>
                    <div class="text">
                        <p class="ttu fRobotoB">CHÍNH HÃNG 100%</p>
                        <p>Xuất hóa đơn đỏ</p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->








@endsection
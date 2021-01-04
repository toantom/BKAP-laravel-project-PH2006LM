@extends('frontend.main')
@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cart Page</li>
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
                                    <th class="plantmore-product-remove">Xóa sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->items as $item)
                                <tr>
                                    
                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="{{URL::asset('public/images/product/')}}/{{$item['image']}}" alt="" height="120px" width="100px"></a></td>
                                    <td class="plantmore-product-name"><a href="#">{{$item['name']}}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">${{$item['price']}}</span></td>
                                    <td class="plantmore-product-quantity">
                                        @csrf
                                        <input value="{{$item['quantity']}}" dataId="{{$item['id']}}" class="update" type="number">
                                    </td>
                                    <td class="product-subtotal"><span class="amount">${{$item['price']*$item['quantity']}}</span></td>
                                    <td class="plantmore-product-remove"><a onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?')" href="{{route('frontend.deletecart',$item['id'])}}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="coupon-all">
                                <div class="coupon2">
                                    <a href="{{route('frontend.index')}}" class=" continue-btn">Tiếp tục mua sắm</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Số lượng sản phẩm <span>{{count($data->items)}}</span></li>
                                    <li>Tổng tiền cần thanh toán <span>${{$data->total_price}}</span></li>
                                </ul>
                                <a @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để thanh toán')" @endif href="{{route('frontend.checkout')}}" class="proceed-checkout-btn">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->







<script src="{{URL::asset('public/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript">
    
    $('.update').change(function(event){
        var qty = this.value;
        var id = this.getAttribute('dataId');
        var _token = $('input[name="_token"]').val();
        $.ajax({
           type:'POST',
           url:"{{route('frontend.updatecart')}}",
           data:{id:id, qty:qty, _token:_token},
           success:function(data){
            location.reload()
           }
        });
    });
</script>
@endsection

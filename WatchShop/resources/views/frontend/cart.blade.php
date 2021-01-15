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
                            @if(count($data->items) == 0) 
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Giỏ hàng chưa có sản phẩm nào,</strong> <a href="{{route('frontend.index')}}">Vui lòng mua sắm thêm...</a>
                                </div>
                                @endif
                            <tbody>
                                
                                @foreach($data->items as $item)
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="{{route('frontend.product',$item['id'])}}"><img src="{{URL::asset('public/images/product/')}}/{{$item['image']}}" alt="" height="120px" width="auto"></a></td>
                                    <td class="plantmore-product-name"><a href="{{route('frontend.product',$item['id'])}}">{{$item['name']}}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">{{number_format($item['price'])}} VND</span></td>
                                    <td class="plantmore-product-quantity">
                                        @csrf
                                        <input style="margin : 10px" value="{{$item['quantity']}}" min="1" max="{{$item['stock']}}" dataId="{{$item['id']}}" class="update" type="number">
                                        <br>
                                        <p >Sản phẩm này còn <strong style="color: red"> {{$item['stock']}} </strong>chiếc </p>
                                        @isset($error)
                                          <small class='text-danger'>Không thể mua quá số lượng tồn kho</small>
                                        @endisset
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($item['price']*$item['quantity'])}} VND</span></td>
                                    <td class="plantmore-product-add-cart"><a onclick="return sweetConfirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?')" href="{{route('frontend.deletecart',$item['id'])}}">Xóa</a></td>
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
                                <h2>Chi tiết giỏ hàng</h2>
                                <ul>
                                    <li>Số lượng sản phẩm <span>{{count($data->items)}}</span></li>
                                    <li>Tổng tiền cần thanh toán <span>{{number_format($data->total_price)}} VND</span></li>
                                </ul>
                                <a @if(!Auth::check()) onclick="return sweetConfirm('Bạn cần đăng nhập để thanh toán')" @endif href="{{route('frontend.checkout')}}" class="proceed-checkout-btn">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->







<script src="{{URL::asset('public/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
@if(Session::has('delete'))
    <script>swal("", "Đã bỏ một sản phẩm", "success"); </script>
@endif
@endsection

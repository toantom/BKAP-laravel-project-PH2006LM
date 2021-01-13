@extends('frontend.main')
@section('content')
<!-- breadcrumb-area start -->
{{-- @foreach($wishlist as $item)
{{$item->id_product}}
@endforeach --}}
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách yêu thích</li>
                </ul>
                
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" class="cart-table">
                    <div class=" table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Ảnh sản phẩm</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="plantmore-product-price">Giá</th>
                                    <th class="plantmore-product-stock-status">Trạng thái tồn kho</th>
                                    <th class="plantmore-product-add-cart">Thêm vào giỏ hàng</th>
                                    <th class="plantmore-product-remove">Xóa khỏi danh sách ưa thích</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $item)
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="{{route('frontend.product',$item->product->id)}}"><img src="{{URL::asset('public/images/product/')}}/{{$item->product->image}}" height="120px" width="auto" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="{{route('frontend.product',$item->product->id)}}">{{$item->product->name}}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">${{$item->product->price}}</span></td>
                                    <td class="plantmore-product-stock-status"><span class="in-stock">in stock</span></td>
                                    <td class="plantmore-product-add-cart"><a href="{{route('frontend.addcart',[$item->product->id,1])}}">Thêm vào giỏ hàng</a></td>
                                    <td class="plantmore-product-add-cart"><a onclick="return sweetConfirm('Bạn có muốn xóa sản phẩm này khỏi danh sách yêu thích không?')" style="color: white" href="{{route('frontend.delete-wishlist',$item->product->id)}}"> Xóa</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->






<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{URL::asset('public/js/vendor/jquery-3.3.1.min.js')}}"></script>


@if(Session::has('delete'))
 <script>swal("","Đã bỏ một sản phẩm ưa thích", "success");</script>
  @endif
 @if(Session::has('wish'))
 <script>swal("Sản phẩm này đã có trong danh sách yêu thích!");</script>
@endif


@endsection
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
                @if(Session::has('delete'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('delete')}}
                </div>
                @endif
                @if(Session::has('wish'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('wish')}}
                </div>
                @endif
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
                                    <td class="plantmore-product-thumbnail"><a href="{{route('frontend.product',$item->product->id)}}"><img src="{{URL::asset('public/images/product/')}}/{{$item->product->image}}" height="120px" width="100px" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="{{route('frontend.product',$item->product->id)}}">{{$item->product->name}}</a></td>
                                    <td class="plantmore-product-price"><span class="amount">${{$item->product->price}}</span></td>
                                    <td class="plantmore-product-stock-status"><span class="in-stock">in stock</span></td>
                                    <td class="plantmore-product-add-cart"><a href="{{route('frontend.addcart',[$item->product->id,1])}}">Thêm vào giỏ hàng</a></td>
                                    <td class="plantmore-product-remove"><a onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi danh sách ưa thích không?')" href="{{route('frontend.delete-wishlist',$item->product->id)}}"><i class="fa fa-times"></i></a></td>
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








@endsection
@component('mail::message')
Chào {{ $bill->name }},
    <br> Cám ơn bạn đã mua sắm tại TBTWatch
    <br> Đơn hàng của bạn đang <b>chờ shop xác nhận</b> (trong vòng 24h)
    <br> Chúng tôi sẽ thông tin <b>trạng thái đơn hàng</b> trong email tiếp theo.
    <br> Bạn vui lòng kiểm tra email thường xuyên nhé.
@component('mail::table')
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
                                    <th class="plantmore-product-thumbnail">Id sản phẩm</th>
                                    <th class="cart-product-name">Tên sản phẩm </th>
                                    <th class="plantmore-product-price">Giá tiền</th>
                                    <th class="plantmore-product-quantity">Số lượng</th>
                                    <th class="plantmore-product-subtotal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail as $item)
                                <tr>
                                    <td class="plantmore-product-thumbnail">{{$item->product->id}}</td>
                                    <td class="plantmore-product-name">{{$item->product->name}}</td>
                                    <td class="plantmore-product-price"><span class="amount">{{number_format($item->product->price)}} VND</span></td>
                                    <td class="plantmore-product-quantity" style="align-items: center"><span class="amount">{{$item->quantity}}</span></td>
                                    <td class="product-subtotal"><span class="amount">{{number_format(($item->price)*($item->quantity))}} VND</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
                    <div class="row">
                        <div class="col-md-4 ml-auto">
                            <div class="cart-page-total">
                                <h2>Thành tiền</h2>
                                <ul>
                                    <li>Số lượng sản phẩm <span>{{count($detail)}}</span></li>
                                    <li>Tổng tiền cần thanh toán <span> {{number_format($bill->total_price)}}VND</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
            
</div>
<!-- main-content-wrap end -->
@endcomponent

Rất hân hạnh được phục vụ bạn,<br>
TBTWatch
@endcomponent

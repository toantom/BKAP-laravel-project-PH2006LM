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
                    <li class="breadcrumb-item active">Thông tin tài khoản</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
@if(Session::has('success'))
        <script>swal("", "Sửa thông tin thành công", "success"); </script>
@endif
@if(Session::has('updateok'))
<script>swal("", "Đổi mật khẩu thành công", "success"); </script>
@endif

<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb my-account-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="account-dashboard">
                    <div class="dashboard-upper-info">
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-3 col-md-12">
                                <div class="d-single-info">
                                    <p class="user-name">Xin chào <span>{{Auth::user()->name}}</span></p>
                                    <a onclick="return sweetConfirm('Bạn có muốn đăng xuất không?')" href="{{route('frontend.logout')}}"> <strong> Đăng xuất </strong></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="d-single-info">
                                    <p>Mọi thắc mắc xin liên hệ dịch vụ chăm sóc khách hàng.</p>
                                    <strong>support@tbtwatch.com.</strong>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <div class="d-single-info text-lg-center">
                                    <a href="{{route('frontend.cart')}}" class="view-cart"><i class="fa fa-cart-plus"></i>Xem giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-2">
                            <!-- Nav tabs -->
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Lịch sử đơn hàng</a></li>
                                <li><a href="#account-details" data-toggle="tab" class="nav-link">Thông tin tài khoản</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-md-12 col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active" id="orders">
                                    <h3>Lịch sử đơn hàng</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Ngày tạo đơn</th>
                                                    <th>Trạng thái đơn hàng</th>
                                                    <th>Tổng hóa đơn</th>
                                                    <th>Xem chi tiết</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bill as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                                    <td>@switch($item->status)
                                                        @case(0)
                                                            Đang chờ xử lý
                                                            @break
                                                        @case(1)
                                                            Đang giao hàng
                                                            @break
                                                        @case(2)
                                                            Giao hàng thành công
                                                            @break
                                                        @endswitch</td>
                                                    <td>{{number_format($item->total_price)}}VND </td>
                                                    <td><a href="{{route('frontend.orderdetail',$item->id)}}" class="view">view</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="account-details">
                                    <h3>Thông tin tài khoản </h3>
                                    <div class="login">
                                        <div class="login-form-container">
                                            <div class="account-login-form">
                                                <form action="{{route('frontend.updateinfo',Auth::user()->id)}}" method="post">
                                                    @csrf
                                                    <div class="account-input-box">
                                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                                        <label>Họ tên</label>
                                                        <input type="text" value="{{Auth::user()->name}}" name="name">
                                                        @error('name')
                                                            <small class='text-danger'>{{$message}}</small>
                                                        @enderror
                                                        <label>Email</label>
                                                        <input type="text" name="email" value="{{Auth::user()->email}}">
                                                        @error('email')
                                                            <small class='text-danger'>{{$message}}</small>
                                                        @enderror
                                                        <label>Số điện thoại</label>
                                                        <input type="number" name="phone" value="{{Auth::user()->phone}}">
                                                        @error('phone')
                                                            <small class='text-danger'>{{$message}}</small>
                                                        @enderror
                                                        <label>Địa chỉ</label>
                                                        <input type="text" name="address" value="{{Auth::user()->address}}">
                                                        @error('address')
                                                            <small class='text-danger'>{{$message}}</small>
                                                        @enderror
                                                        <label>Ngày sinh</label>
                                                        <input type="date" name="birthday" value="{{Auth::user()->birthday}}">
                                                        @error('birthday')
                                                            <small class='text-danger'>{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="example">
                                                        (Ví dụ : 05/31/1970)
                                                    </div>
                                                    <label>Giới tính</label>
                                                    <div class="input-radio">
                                                        <span class="custom-radio"><input type="radio" value="0" @if((Auth::user()->gender)==0) checked @endif name="gender"> Nam</span>
                                                        <span class="custom-radio"><input type="radio" value="1" @if((Auth::user()->gender)==1) checked @endif name="gender"> Nữ.</span>
                                                    </div>
                                                    <div class="button-box">
                                                        <button onclick="return sweetSubmit('Xác nhận thay đổi thông tin cá nhân?')" class="btn default-btn" type="submit">Thay đổi thông tin tài khoản</button>
                                                    </div>
                                                    
                                                </form>
                                                <a href="{{route('frontend.view.updatepass',Auth::user()->id)}}"><button class="btn default-btn">Thay đổi mật khẩu</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

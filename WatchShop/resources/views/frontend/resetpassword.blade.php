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
                            <li class="breadcrumb-item active">Lấy lại mật khẩu</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb lagin-and-register-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <!-- login-register-tab-list start -->
                            <div class="login-register-tab-list nav">
                                <a data-toggle="tab" href="#lg2">
                                    <h4> Lấy lại mật khẩu </h4>
                                </a>
                            </div>
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">
                                <div id="lg2"  class ="tab-pane active" >
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="{{route('frontend.resetpass')}}" method="post">
                                            @csrf
                                                <div class="login-input-box">
                                                    @error('email')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input name="email" placeholder="Email" type="Email">
                                                    @error('phone')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="number" name="phone" placeholder="Nhập số điện thoại">
                                                    @error('password')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="password" name="password" placeholder="Mật khẩu">
                                                    
                                                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                                    @if(Session::has('fail'))
                                                    <div class="alert alert-danger">
                                                        <script> swal("","Email và Số điện thoại đã đăng ký không trùng khớp", "error"); </script>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="button-box">
                                                    <button class="register-btn btn" type="submit"><span>Đặt lại mật khẩu</span></button>
                                                </div>
                                            </form>
                                            
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







@endsection
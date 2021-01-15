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
                            <li class="breadcrumb-item active">Đăng nhập &amp; Đăng ký</li>
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
                    <div class="col-lg-6 col-md-6 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <!-- login-register-tab-list start -->
                            <div class="login-register-tab-list nav" id="myTab">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> Đăng nhập </h4>
                                </a>
                            </div>
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">
                                <div id="lg1" class ="tab-pane active" >
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="{{route('frontend.login')}}" method="post">
                                            @csrf
                                                @isset($check)
                                                <input type="hidden" name="check" value="{{$check}}">  
                                                @endisset
                                                @isset($id)
                                                <input type="hidden" name="id" value="{{$id}}">  
                                                @endisset
                                                <div class="login-input-box">
                                                    <input type="text" name="email" placeholder="Email">
                                                    <input type="password" name="password" placeholder="Password">
                                                </div>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox" name="remember">
                                                        <label>Ghi nhớ đăng nhập</label>
                                                        <a href="{{route('frontend.view.resetpass')}}">Quên mật khẩu?</a>
                                                    </div>
                                                    @if(Session::has('resetok'))
                                                        <script>swal("", "Lấy lại mật khẩu thành công", "success"); </script>
                                                    @endif
                                                    @if(Session::has('error'))
                                                        <script>swal("", "Tên đăng nhập hoặc mật khẩu không đúng!", "error"); </script>
                                                    @endif
                                                    @if(Session::has('register'))
                                                        <script>swal("", "Đăng ký thành công!", "success"); </script>
                                                     @endif
                                                    <div class="button-box">
                                                        <button class="login-btn btn" type="submit"><span>Đăng nhập</span></button>
                                                    </div>
                                                    <div class="button-box">
                                                        <a class="login-btn btn" href="{{route('backend.login')}}" role="button"><span>Đăng nhập trang quản trị</span></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <!-- login-register-tab-list start -->
                            <div class="login-register-tab-list nav" id="myTab">
                                <a data-toggle="tab" class="active" href="#lg2">
                                    <h4> Đăng ký </h4>
                                </a>
                            </div>
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">
                                <div id="lg2"  class ="tab-pane active" >
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="{{route('frontend.register')}}" method="post">
                                            @csrf
                                                <div class="login-input-box">
                                                    @error('name')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="text" name="name" placeholder="Họ và tên">
                                                    @error('password')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="password" name="password" placeholder="Mật khẩu">
                                                    
                                                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                                    @error('email')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input name="email" placeholder="Email" type="Email">
                                                    @error('phone')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="number" name="phone" placeholder="Nhập số điện thoại">
                                                    @error('address')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="text" name="address" placeholder="Nhập địa chỉ">
                                                    @error('birthday')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="date" name="birthday" placeholder="Nhập ngày sinh">
                                                    
                                                    <select class="form-control" name="gender">
                                                            <option value="0">Nam</option>
                                                            <option value="1">Nữ</option>
                                                    </select>
                                                </div>
                                                <div class="button-box">
                                                    <button class="register-btn btn" type="submit"><span>Đăng ký</span></button>
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
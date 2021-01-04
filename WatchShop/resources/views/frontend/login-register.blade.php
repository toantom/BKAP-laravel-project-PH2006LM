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
                            <li class="breadcrumb-item active">login &amp; register</li>
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
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">
                                <div id="lg1" class ="tab-pane active " >
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="{{route('frontend.login')}}" method="post">
                                            @csrf
                                                <div class="login-input-box">
                                                    <input type="text" name="email" placeholder="Email">
                                                    <input type="password" name="password" placeholder="Password">
                                                </div>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox" name="remember">
                                                        <label>Ghi nhớ đăng nhập</label>
                                                        <a href="#">Quên mật khẩu?</a>
                                                    </div>
                                                    @if(Session::has('error'))
                                                    <div class="alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        {{Session::get('error')}}
                                                    </div>
                                                    @endif
                                                    @if(Session::has('register'))
                                                    <div class="alert alert-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        {{Session::get('register')}}
                                                    </div>
                                                    @endif
                                                    <div class="button-box">
                                                        <button class="login-btn btn" type="submit"><span>Đăng nhập</span></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2"  class ="tab-pane" >
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="{{route('frontend.register')}}" method="post">
                                            @csrf
                                                <div class="login-input-box">
                                                    @error('name')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="text" name="name" placeholder="Tên đăng nhập">
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
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
                            <li class="breadcrumb-item active">Đổi mật khẩu</li>
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
                                    <h4> Đổi mật khẩu </h4>
                                </a>
                            </div>
                            @if(Session::has('updatefail'))
                                    <div class="alert alert-danger">
                                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                          {{Session::get('updatefail')}}
                                    </div>
                            @endif
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">
                                <div id="lg2"  class ="tab-pane active" >
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="{{route('frontend.updatepass',Auth::user()->id)}}" method="post">
                                            @csrf
                                                <div class="login-input-box">
                                                    <input type="password" name="old_password" placeholder="Nhập mật khẩu cũ">
                                                    @error('password')
                                                            <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="password" name="password" placeholder="Nhập mật khẩu mới">
                                                    
                                                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                                    @if(Session::has('fail'))
                                                    <div class="alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        {{Session::get('fail')}}
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="button-box">
                                                    <button class="register-btn btn" type="submit"><span>Thay đổi mật khẩu</span></button>
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
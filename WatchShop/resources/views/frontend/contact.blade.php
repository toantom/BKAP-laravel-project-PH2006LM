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
                    <li class="breadcrumb-item active">Phản hồi</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- Page Conttent -->
<main class="page-content section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-12">
                <div class="contact-form">
                    <div class="contact-form-info">
                        <div class="contact-title">
                            <h3>VUI LÒNG ĐỂ LẠI THÔNG TIN CHO CHÚNG TÔI BIẾT VẤN ĐỀ CỦA BẠN</h3>
                        </div>
                        <form action="{{route('frontend.postcontact')}}" method="post">
                            @csrf
                            <div class="contact-page-form">
                                <div class="contact-input">
                                    <div class="contact-inner">
                                        <input name="name" type="text" placeholder="Tên của bạn *">
                                        @error('name')
                                            <small class='text-danger'>{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="contact-inner">
                                        <input name="phone" type="number" placeholder="Số điện thoại liên hệ *">
                                        @error('phone')
                                            <small class='text-danger'>{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="contact-inner contact-message">
                                        <textarea name="content" placeholder="Lời nhắn *"></textarea>
                                        @error('content')
                                            <small class='text-danger'>{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="contact-submit-btn">
                                    <button class="submit-btn" onclick="return sweetSubmit('Xác nhận gửi yêu cầu hỗ trợ online?')" type="submit">Yêu cầu hỗ trợ</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="contact-infor">
                    <div class="contact-title">
                        <h3>HOẶC ĐẾN NGAY CỬA HÀNG GẦN NHẤT ĐỂ ĐƯỢC TƯ VẤN VÀ HỖ TRỢ</h3>
                    </div>
                    <div class="contact-address">
                        <ul>
                            <li>Địa chỉ : Số 38a Hoàng Cầu mới, phường Trung Liệt, Quận Đống Đa, thành phố Hà Nội</li>
                            <li>Email: Infor@TBTWatch.com</li>
                            <li>Phone: 0396 757 400</li>
                        </ul>
                    </div>
                    <div class="work-hours">
                        <h5>Giờ mở cửa</h5>
                        <p><strong>Tất cả các ngày trong tuần</strong>: &nbsp;08AM &ndash; 22PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--// Page Conttent -->
@endsection
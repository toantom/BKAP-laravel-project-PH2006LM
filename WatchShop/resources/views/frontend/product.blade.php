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
                    <li class="breadcrumb-item active">Product Details</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- main-content-wrap start -->
<div class="main-content-wrap shop-page section-ptb">
    <div class="container">
        <div class="row  product-details-inner">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-large-slider">
                  @foreach ($pro_img as $item)
                    <div class="pro-large-img img-zoom">
                        <img src="{{URL::asset('public/images/product/')}}/{{$item->image}}" alt="product-details" />
                        <a href="{{URL::asset('public/images/product/')}}/{{$item->image}}" data-fancybox="images"><i class="fa fa-search"></i></a>
                    </div>
                    @endforeach
                </div>
                <div class="product-nav">
                 @foreach ($pro_img as $item)
                    <div class="pro-nav-thumb">
                        <img src="{{URL::asset('public/images/product/')}}/{{$item->image}}" alt="product-details" />
                    </div>
                @endforeach
                </div>
                 
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content">
                    <div class="product-info">
                        <h3>{{$pro_fend->name}}</h3>
                        <div class="product-rating d-flex">
                            <ul class="d-flex">
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                            </ul>
                            <a href="#reviews">(<span class="count">1</span> đánh giá)</a>
                        </div>
                        <div class="price-box">
                            <span class="new-price">${{$pro_fend->discount}}</span>
                            <span class="old-price">${{$pro_fend->price}}</span>
                        </div>
                        <p>{{$pro_fend->des}}</p>

                        <div class="single-add-to-cart">
                            <form action="{{route('frontend.addcartdetail')}}" class="cart-quantity d-flex" method="get">
                                @csrf
                                <div class="quantity">
                                    <div class="cart-plus-minus">
                                        <input type="number" class="input-text" name="quantity" min="1" value="1" title="Qty">
                                        <input type="hidden" name="id" value="{{$pro_fend->id}}">
                                    </div>
                                </div>
                                <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                        <ul class="single-add-actions">
                            <li class="add-to-wishlist">
                                <a href="{{route('frontend.add-wishlist',$pro_fend->id)}}" class="add_to_wishlist"><i class="icon-heart"></i> Thêm vào danh sách yêu thích</a>
                            </li>
                            <li class="add-to-compare">
                                <div class="compare-button"><a href="compare.html"><i class="icon-refresh"></i> Compare</a></div>
                            </li>
                        </ul>
                        <ul class="stock-cont">
                            <li class="product-sku">Sku: <span>{{$pro_fend->sku}}</span></li>
                            <li class="product-stock-status">Danh mục: <a href="{{$pro_fend->category->id}}">{{$pro_fend->category->name}}</a></li>
                            
                        </ul>
                        <div class="share-product-socail-area">
                            <p>Share this product</p>
                            <ul class="single-product-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-description-area section-pt">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-tab">
                        <ul role="tablist" class="nav">
                            <li class="active" role="presentation">
                                <a data-toggle="tab" role="tab" href="#description" class="active">Thông số kỹ thuật</a>
                            </li>
                            <li role="presentation">
                                <a data-toggle="tab" role="tab" href="#reviews">Đánh giá</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product_details_tab_content tab-content">
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                            <div class="product_description_wrap  mt-30">
                                <div class="product_desc mb-30">
                                   <table class="table table-dark">
                                       <tbody>
                                           <tr>
                                               <td>Đường kính mặt</td>
                                               <td>Chống nước</td>
                                               <td>Chất liệu mặt</td>
                                               <td>Năng lượng sử dụng</td>
                                               <td>Chất liệu dây</td>
                                               <td>Chất liệu vỏ</td>
                                               <td>Xuất xứ</td>
                                               <td>Bảo hành</td>
                                           </tr>
                                           <tr>
                                           <td>{{$pro_fend->attribute->length_face}}</td>
                                           <td>{{$pro_fend->attribute->waterproof}}</td>
                                           <td>{{$pro_fend->attribute->material_face}}</td>
                                           <td>{{$pro_fend->attribute->use_energy}}</td>
                                           <td>{{$pro_fend->attribute->material_strap}}</td>
                                           <td>{{$pro_fend->attribute->material_coat}}</td>
                                           <td>{{$pro_fend->attribute->origin}}</td>
                                           <td>Bảo hành quốc tế <strong>{{$pro_fend->attribute->guarantee}}</strong> năm</td>
                                        </tr>
                                       </tbody>
                                   </table>
                                </div>

                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                            <div class="review_address_inner mt-30">
                                <!-- Start Single Review -->
                                @foreach ($feedbacks as $item)
                                <div class="pro_review" style="margin: 20px">
                                    <div class="review_thumb">
                                        <a href="{{URL::asset('public/images/feedback/')}}/{{$item->image}}" data-fancybox="images">
                                        <img src="{{URL::asset('public/images/feedback/')}}/{{$item->image}}" alt="review images" height="180px" width="180px" />
                                        </a>
                                    </div>
                                    <div class="review_details">
                                        <div class="review_info mb-10">
                                            <ul class="product-rating d-flex mb-10">
                                                @for($i=0;$i<($item->star);$i++)
                                                <li><span class="icon-star"></span></li>
                                                @endfor
                                            </ul>
                                            <h5>{{$item->name}} - <span> {{$item->updated_at->format('d-m-Y')}}</span></h5>
                                        </div>
                                        <p>{{$item->content}}</p>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Single Review -->
                            </div>
                            <!-- Start RAting Area -->
                            <div class="rating_wrap mt-50">
                                <h5 class="rating-title-1">Thêm đánh giá </h5>
                                <p>Địa chỉ email của bạn sẽ không được công bố. Các mục bắt buộc được đánh dấu *</p>
                                <p>Bạn cần đăng nhập và mua sản phẩm để có thể viết đánh giá về sản phẩm này *</p>
                                <h6 class="rating-title-2">Đánh giá của bạn</h6>
                                <div class="rating_list">
                                    <div class="review_info mb-10">
                                        <ul class="product-rating d-flex mb-10">
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                            <li><span class="icon-star"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End RAting Area -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{route('frontend.feedback')}}" class="comment-form-area" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row comment-input">
                                                <div class="col-md-6 comment-form-author mt-15">
                                                    <label>Tên <span class="required">*</span></label>
                                                    <input type="text" name="name">
                                                    @error('name')
                                                        <small class='text-danger'>{{$message}}</small>
                                                    @enderror
                                                    <input type="hidden" name="id_product" value="{{$pro_fend->id}}">
                                                </div>
                                            </div>
                                            <div class="row comment-input">
                                                <div class="col-md-6 comment-form-author mt-15">
                                                    <label>Ảnh sản phẩm <span class="required"></span></label>
                                                    <input type="file" name="image">
                                                @error('image')
                                                    <small class='text-danger'>{{$message}}</small>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="comment-form-comment mt-15">
                                                <label>Đánh giá/ Nhận xét</label>
                                                <textarea class="comment-notes" name="content" placeholder="Nhận xét..."></textarea>
                                                @error('content')
                                                    <small class='text-danger'>{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="comment-form-submit mt-15">
                                                <input @if(!Auth::check()) onclick="return confirm('Bạn cần đăng nhập để đánh giá sản phẩm')" @endif    type="submit" value="Đánh giá" class="comment-submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
        </div>

        <div class="related-product-area section-pt">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3> Related Product</h3>
                    </div>
                </div>
            </div>
            <div class="row product-active-lg-4">
                    <!-- single-product-area start -->
                    @foreach ($pro_related as $item)
                    <div class="col-lg-12">
                        <!-- single-product-area start -->
                        <div class="single-product-area mt-30">
                            <div class="product-thumb">
                                <a href="product-details.html">
                                    <img class="primary-image" src="{{URL::asset('public/images/product/')}}/{{$item->image}}" alt="">
                                </a>
                                <div class="label-product label_new">New</div>
                                <div class="action-links">
                                    <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                    <a href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                    <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                                </div>
                            </div>
                            <div class="product-caption">
                                <h4 class="product-name"><a href="product-details.html">{{$item->name}}</a></h4>
                                <div class="price-box">
                                    <span class="new-price">${{$item->discount}}</span>
                                    <span class="old-price">${{$item->price}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-area end -->
                    </div>
                    @endforeach
            </div>
        </div>

        <div class="related-product-area section-pt">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Upsell Products</h3>
                    </div>
                </div>
            </div>
            <div class="row product-active-lg-4">
                @foreach ($pro_upsell as $item)
                <div class="col-lg-12">
                    <!-- single-product-area start -->
                    <div class="single-product-area mt-30">
                        <div class="product-thumb">
                            <a href="product-details.html">
                                <img class="primary-image" src="{{URL::asset('public/images/product/')}}/{{$item->image}}" alt="">
                            </a>
                            <div class="label-product label_new">New</div>
                            <div class="action-links">
                                <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                <a href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                <a href="#" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter"><i class="icon-magnifier icons"></i></a>
                            </div>
                        </div>
                        <div class="product-caption">
                            <h4 class="product-name"><a href="product-details.html">{{$item->name}}</a></h4>
                            <div class="price-box">
                                <span class="new-price">${{$item->discount}}</span>
                                <span class="old-price">${{$item->price}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-area end -->
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
<!-- main-content-wrap end -->

@endsection
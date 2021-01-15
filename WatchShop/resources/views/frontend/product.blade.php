@extends('frontend.main')
@section('content')
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>

<style>
    div.stars {
  width: 270px;
  display: inline-block;
}
 
input.star { display: none; }
 
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
 
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
 
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
 
input.star-1:checked ~ label.star:before { color: #F62; }
 
label.star:hover { transform: rotate(-15deg) scale(1.3); }
 
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
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
                        <img src="{{URL::asset('public/images/product/imgs')}}/{{$item->image}}" alt="product-details" />
                        <a href="{{URL::asset('public/images/product/imgs')}}/{{$item->image}}" data-fancybox="images"><i class="fa fa-search"></i></a>
                    </div>
                    @endforeach
                </div>
                <div class="product-nav">
                 @foreach ($pro_img as $item)
                    <div class="pro-nav-thumb">
                        <img src="{{URL::asset('public/images/product/imgs')}}/{{$item->image}}" alt="product-details" />
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
                                @for($i=0;$i<$pro_fend->star;$i++)
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                @endfor
                            </ul>
                            <a href="#reviews">(<span class="count">{{$review}}</span> đánh giá)</a>
                        </div>
                        
                        <div class="price-box">

                            @if ($pro_fend->discount)
                                <span class="old-price">{{number_format($pro_fend->price)}} VND</span>
                                <span class="new-price">{{number_format($pro_fend->price - ($pro_fend->price * ($pro_fend->discount / 100)))}} VND</span>
                            @else
                                <span class="new-price">{{number_format($pro_fend->price)}} VND</span>
                            @endif
                        </div>
                        <p>{{$pro_fend->des}}</p>

                        <div class="single-add-to-cart">
                            <form action="{{route('frontend.addcartdetail')}}" class="cart-quantity d-flex" method="get">
                                @csrf
                                <div class="quantity">
                                    <div class="cart-plus-minus">
                                        <input type="number" class="input-text" name="quantity" min="1" max="{{$pro_fend->stock}}" value="1" title="Qty">
                                        <input type="hidden" name="id" value="{{$pro_fend->id}}">
                                    </div>
                                </div>
                                <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                        <br>
                        <p>Còn {{$pro_fend->stock}} sản phẩm</p>
                        <ul class="single-add-actions">
                            <li class="add-to-wishlist">
                                <a href="{{route('frontend.add-wishlist',$pro_fend->id)}}" class="add_to_wishlist"><i class="icon-heart"></i> Thêm vào danh sách yêu thích</a>
                            </li>
                        </ul>
                        <ul class="stock-cont">
                            <li class="product-sku">Sku: <span>{{$pro_fend->sku}}</span></li>
                            <li class="product-stock-status">Danh mục: <a href="{{route('frontend.category',$pro_fend->category->id)}}">{{$pro_fend->category->name}}</a></li>
                            
                        </ul>
                        <div class="share-product-socail-area">
                            <p>Chia sẻ sản phẩm này</p>
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
                            
                            <li role="presentation">
                                <a data-toggle="tab" role="tab" href="#reviews" class="active">Đánh giá</a>
                            </li>
                            <li class="active" role="presentation">
                                <a data-toggle="tab" role="tab" href="#description" >Thông số kỹ thuật</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product_details_tab_content tab-content">
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane active" id="reviews" role="tabpanel">
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
                                <br>
                                
                            </div>
                            <!-- End RAting Area -->
                            <div class="comments-area comments-reply-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{route('frontend.feedback')}}" class="comment-form-area" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <h6 class="rating-title-2">Đánh giá của bạn</h6>
                                                    <div class="rating_list">
                                                        <div class="stars">
                                                              <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                                                              <label class="star star-5" for="star-5"></label>
                                                              <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                                                              <label class="star star-4" for="star-4"></label>
                                                              <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                                                              <label class="star star-3" for="star-3"></label>
                                                              <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                                                              <label class="star star-2" for="star-2"></label>
                                                              <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                                                              <label class="star star-1" for="star-1"></label>
                                                              @error('star')
                                                              <small class='text-danger'>{{$message}}</small>
                                                          @enderror
                                                          </div>
                                                    </div>
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
                                                <input @if(!Auth::check()) onclick="return sweetSubmit('Bạn cần đăng nhập để đánh giá sản phẩm')" @endif    type="submit" value="Đánh giá" class="comment-submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane" id="description" role="tabpanel">
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
                                <a href="{{route('frontend.product',$item->slug)}}">
                                    <img class="primary-image" src="{{URL::asset('public/images/product/')}}/{{$item->image}}"  style="margin-left: auto;
                                                                margin-right: auto;
                                                                display: block;"
                                    width="150px"alt="">
                                </a>
                                <div class="label-product label_new">New</div>
                                <div class="action-links">
                                    <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                    <a href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                    
                                </div>
                            </div>
                            <div class="product-caption">
                                <h4 class="product-name"><a href="{{route('frontend.product',$item->slug)}}">{{$item->name}}</a></h4>
                                <div class="price-box">
                                    @if ($item->discount)
                                        <span class="old-price">{{number_format($item->price)}} VND</span> <br>
                                        <span class="new-price">{{number_format($item->price - ($item->price * ($item->discount / 100)))}} VND</span>
                                    @else
                                        <span class="new-price">{{number_format($item->price)}} VND</span>
                                    @endif
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
                            <a href="{{route('frontend.product',$item->slug)}}">
                                <img class="primary-image" src="{{URL::asset('public/images/product/')}}/{{$item->image}}"  style="margin-left: auto;
                                                            margin-right: auto;
                                                            display: block;"
                                width="150px"alt="">
                            </a>
                            <div class="label-product label_new">New</div>
                            <div class="action-links">
                                <a href="{{route('frontend.addcart',[$item->id,1])}}" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a>
                                <a href="{{route('frontend.add-wishlist',$item->id)}}" class="wishlist-btn" title="Add to Wish List"><i class="icon-heart"></i></a>
                                
                            </div>
                        </div>
                        <div class="product-caption">
                            <h4 class="product-name"><a href="{{route('frontend.product',$item->slug)}}">{{$item->name}}</a></h4>
                            <div class="price-box">
                                @if ($item->discount)
                                    <span class="old-price">{{number_format($item->price)}} VND</span> <br>
                                    <span class="new-price">{{number_format($item->price - ($item->price * ($item->discount / 100)))}} VND</span>
                                @else
                                    <span class="new-price">{{number_format($item->price)}} VND</span>
                                @endif
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
@if(Session::has('fail'))
 <script>swal("Bạn cần mua sản phẩm này để có thể đánh giá sản phẩm!");</script>
@endif
@if(Session::has('success'))
 <script>swal("Cảm ơn bạn đã góp ý cho sản phẩm");</script>
@endif

@endsection
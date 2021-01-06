@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Chi tiết đơn hàng {{$order->id}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('order.index')}}">Danh sách đơn hàng</a></li>
            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-4">
              <form action="{{route('order.update',$order->id)}}" method="POST">
                @csrf
                <div class="card card-outline">
                <div class="card-body box-profile">
                  <h3 class="profile-username text-center">{{$order->name}}</h3>
  
                  <p class="text-center">{{$order->email}}</p>
                  <p class="text-center">{{$order->phone}}</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Địa chỉ giao hàng</b> <a class="float-right">{{$order->address_ship}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Tổng tiền thành toán</b> <a class="float-right">{{number_format($order->total_price)}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Note</b> <a class="float-right">{{$order->note}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Trạng thái</b>
                      <div class="form-group float-right">
                        <select class="form-control" name="status" id="">
                          <option value="0" @if($order->status == 0) selected @endif @if($order->status > 0) disabled @endif>Chờ duyệt</option>
                          <option value="1" @if($order->status == 1) selected @endif @if($order->status > 1) disabled @endif>Đang giao</option>
                          <option value="2" @if($order->status == 2) selected @endif>Thành công</option>
                        </select>
                      </div>
                    </li>
                  </ul>
                  <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                </div>
                <!-- /.card-body -->
              </div>
              </form>
              
            </div>
            <div class="col-8">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table-detail" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th>Ảnh sản phẩm</th>
                      <th>Giá tiền</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_detail as $key => $item)
                    <tr>
                      <td>{{$item->product->name}}</td>
                      <td><img src="{{URL::asset('public/images/product/')}}/{{$item->product->image}}" alt="" width="100px"></td>
                      <td>{{$item->price}}</td>
                      <td>{{$item->quantity}}</td>
                      <td>{{$item->price * $item->quantity}}</td>
                    </tr> 
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      {{-- sweetalert category --}}
      @if(Session::has('updateorder-success'))
        <script>
          swal("Thành công","Bạn đã cập nhật đơn hàng thành công", "success");
        </script>
      @endif
      @if(Session::has('updateorder-error'))
        <script>
          swal("Thất bại","Bạn cập nhật đơn hàng không thành công", "error");
        </script>
      @endif
@endsection




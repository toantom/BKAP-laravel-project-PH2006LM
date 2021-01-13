@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách đơn hàng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách đơn hàng</li>
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
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table-order" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên khách hàng</th>
                      <th>Ngày đặt</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái đơn hàng</th>
                      <th>Ghi chú</th>
                      <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $key => $item)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>{{number_format($item->total_price)}} VND</td>
                      <td>
                        @if ($item->status == 0)
                          Chờ duyệt   <i class="fas fa-minus-square" style="color: red"></i>
                        @elseif($item->status == 1)
                          Đang giao <i class="fas fa-minus-square" style="color: red"></i>
                        @else
                          Thành công <i class="fas fa-check-square" style="color: green"></i>
                        @endif
                      </td>
                      <td>{{$item->note}}</td>
                      <td>
                        <a href="{{route('order.detail',$item->id)}}">Xem chi tiết</a>
                      </td>
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
      {{$order->links()}}
      <!-- /.content -->

@endsection




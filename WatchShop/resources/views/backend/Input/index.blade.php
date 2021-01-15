@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách nhập hàng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách nhập hàng</li>
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
                    <label for="">Lịch sử nhập hàng</label>
                  <table id="table-cate" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Mã phiếu</th>
                      <th>Tên sản phẩm</th>
                      <th>Mã sku</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Thành tiền</th>
                      <th>Người tạo đơn</th>
                      <th>Ngày tạo đơn</th>
                      <th>Hàng động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inputs as $key => $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->sku}}</td>
                      <td>{{$item->quantity}}</td>
                      <td>{{$item->price}}</td>
                      <td>{{$item->total}}</td>
                      <td>{{$item->admin->name}}</td>
                      <td style="text-align: center">{{$item->created_at->format('d-m-Y')}}
                        <br>
                        @if(($item->created_at) != ($item->updated_at)) Đã chỉnh sửa {{$item->updated_at->format('d-m-Y')}} @endif
                      </td>
                      <td>
                        <a href="{{route('backend.input.edit',$item->id)}}"><button type="button" class="btn btn-block btn-outline-warning btn-sm">Sửa</button></a>
                        <form action="{{route('backend.input.delete',$item->id)}}" method="POST">
                          @method('DELETE') @csrf 
                          <a href="" onclick=" return sweetSubmit('Xác nhận xóa phiếu nhập hàng?')"><button class="btn btn-block btn-outline-danger btn-sm">Xóa</button></a>
                        </form>
                      </td>
                    </tr> 
                    @endforeach
                    </tbody>
                  </table>
                  {{$inputs->links()}}
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
      {{-- SweetAlert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- sweetalert category --}}
@if(Session::has('inputsuccess'))
  <script>
    swal("Thành công","Đã tạo phiếu", "success");
  </script>
@endif
@if(Session::has('deleteinput'))
  <script>
    swal("Thành công","Đã xóa phiếu", "success");
  </script>
@endif
@if(Session::has('editsuccess'))
  <script>
    swal("Thành công","Đã sửa phiếu", "success");
  </script>
@endif
@endsection




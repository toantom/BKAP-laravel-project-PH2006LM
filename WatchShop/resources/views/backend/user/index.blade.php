@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách người dùng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách người dùng</li>
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
                    <label for="">Danh sách người dùng </label>
                  <table id="table-cate" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Id người dùng</th>
                      <th>Tên người dùng</th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
                      <th>Giới tính</th>
                      <th>Ngày sinh</th>
                      <th>Địa chỉ</th>
                      <th>Liên hệ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td style="text-align: center">{{$item->email}}</td>
                      <td>{{$item->phone}}</td>
                      <td >@if(($item->gender) == 0) Nam @else Nữ @endif</td>
                      <td style="width : 15%">{{$item->birthday}}</td>
                      <td style="width : 15%">{{$item->address}}</td>
                      </td>
                      <td>
                        @if(($item->status) == 0)
                        <form action="{{route('backend.user.seen',$item->id)}}" method="POST">
                             @csrf 
                            <a href=""><button type="button" onclick="return sweetSubmit('Xác nhận đã liên hệ người dùng mới?')" class="btn btn-block btn-outline-warning btn-sm">Phản hồi</button></a>
                        </form>
                        @else
                            Đã liên hệ <i class="fas fa-check-square" style="color: green"></i>
                        @endif
                      </td>
                    </tr> 
                    @endforeach
                    </tbody>
                  </table>
                  {{$users->links()}}
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
@if(Session::has('success'))
  <script>
    swal("","Đã xử lý", "success");
  </script>
@endif
@if(Session::has('deletefeedback'))
  <script>
    swal("","Đã xóa đánh giá", "success");
  </script>
@endif
@endsection




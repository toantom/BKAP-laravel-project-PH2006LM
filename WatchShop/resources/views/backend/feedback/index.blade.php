@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách đánh giá</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách đánh giá</li>
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
                    <label for="">Danh sách đánh giá sản phẩm</label>
                  <table id="table-cate" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Mã sản phẩm</th>
                      <th>Tên sản phẩm</th>
                      <th>Tên người đánh giá</th>
                      <th>Số sao</th>
                      <th>Ảnh minh họa</th>
                      <th>Nội dung</th>
                      <th>Ngày tạo</th>
                      <th>Hàng động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedbacks as $key => $item)
                    <tr>
                      <td>{{$item->id_product}}</td>
                      <td>{{$item->product->name}}</td>
                      <td style="text-align: center">{{$item->user->name}}</td>
                      <td>{{$item->star}}</td>
                      <td ><img src="{{URL::asset('public/images/feedback')}}/{{$item->image}}" alt="" width="60"></td>
                      <td style="width : 15%">{{$item->content}}</td>
                      <td style="text-align: center">{{$item->created_at->format('d-m-Y')}}
                      </td>
                      <td>
                        @if(($item->status) == 0)
                        <form action="{{route('backend.feedback.seen',$item->id)}}" method="POST">
                             @csrf 
                            <a href=""><button type="button" onclick="return sweetSubmit('Xác nhận đã phản hồi khách hàng?')" class="btn btn-block btn-outline-warning btn-sm">Phản hồi</button></a>
                        </form>
                        @else
                            Đã phản hồi <i class="fas fa-check-square" style="color: green"></i>
                        @endif
                        
                        <form action="{{route('backend.feedback.delete',$item->id)}}" method="POST">
                          @method('DELETE') @csrf 
                          <a href="" onclick=" return sweetSubmit('Xác nhận xóa đánh giá?')"><button class="btn btn-block btn-outline-danger btn-sm">Xóa</button></a>
                        </form>
                      </td>
                    </tr> 
                    @endforeach
                    </tbody>
                  </table>
                  {{$feedbacks->links()}}
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




@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách Blog</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách Blog</li>
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
                <div class="card-body table-responsive" >
                  <table id="table-pro" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên blog</th>
                        <th>Danh mục</th>
                        <th>Người viết</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($blogs as $key => $blog)    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td style="width: 200px; word-wrap: break-word">{{$blog->name}}</td>
                        <td>{{($blog->id_cate)?$blog->category->name : ''}}</td>
                        <td>{{($blog->id_admin)?$blog->admin->name : ''}}</td>
                        @if($blog->status==1)
                        <td> Hiện</td>
                        @else
                        <td>Ẩn</td>
                        @endif
                        <td>
                            {{-- <a href="{{route('backend.product.editPic', $blog->id)}}"><button type="button" class="btn btn-block btn-outline-primary btn-sm">Sửa ảnh</button></a> --}}
                            <a href="{{route('blog.edit', $blog->id)}}"><button type="button" class="btn btn-block btn-outline-warning btn-sm">Sửa thông tin</button></a>
                            <form action="{{route('blog.destroy',$blog->id)}}" method="POST">
                            @method('DELETE') @csrf 
                            <a href="" onclick=" return confirm('Bạn có chắc là muốn xóa blog {{$blog->name}}')"><button class="btn btn-block btn-outline-danger btn-sm">Xóa</button></a>                            
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{$blogs->links()}}
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
{{-- sweetalert product --}}
@if(Session::has('addblog-success'))
  <script>
    swal("Thành công","Bạn đã thêm blog thành công", "success");
  </script>
@endif
@if(Session::has('addblog-error'))
  <script>
    swal("Thất bại","Bạn thêm blog không thành công", "error");
  </script>
@endif
@if(Session::has('updateblog-success'))
  <script>
    swal("Thành công","Bạn đã sửa blog thành công", "success");
  </script>
@endif
@if(Session::has('updateblog-error'))
  <script>
    swal("Thất bại","Bạn sửa blog không thành công", "error");
  </script>
@endif
@if(Session::has('delblog-success'))
  <script>
    swal("Thành công","Bạn đã xóa blog thành công", "success");
  </script>
@endif
@if(Session::has('delblog-error'))
  <script>
    swal("Thất bại","Bạn xóa blog không thành công", "error");
  </script>
@endif
@endsection
@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách danh mục</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách danh mục</li>
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
            <div class="col-md-4 ">
              <div class="card">
                <div class="card-body">
                  <form action="{{route('category.store')}}" role="form" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tên danh mục</label>
                      <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                      @error('name')
                        <small class="help-block text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Trạng thái</label>
                      <select class="form-control custom-select" name="status">
                        <option selected value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                      </select>
                      @error('status')
                        <small class="help-block text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Ảnh danh mục</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                      @error('image')
                        <small class="help-block text-danger">{{$message}}</small>
                      @enderror
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                  </div>
              </form>
                </div>
              </div>
          </div> 
            <div class="col-8">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table-cate" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên danh mục</th>
                      <th>Ảnh danh mục</th>
                      <th>Trạng thái</th>
                      <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cats as $key => $cate)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$cate->name}}
                      </td>
                      <td><img src="{{URL::asset('public/images/brand/')}}/{{$cate->image}}" alt="" width="100"></td>
                      @if($cate->status==1)
                      <td> Hiện</td>
                      @else
                      <td>Ẩn</td>
                      @endif
                      <td>
                        <a href="{{route('category.edit', $cate->id)}}"><button type="button" class="btn btn-block btn-outline-warning btn-sm">Sửa</button></a>
                        <form action="{{route('category.destroy',$cate->id)}}" method="POST">
                          @method('DELETE') @csrf 
                          <a href="" onclick=" return confirm('Bạn có chắc là muốn xóa {{$cate->name}}')"><button class="btn btn-block btn-outline-danger btn-sm">Xóa</button></a>
                        </form>
                      </td>
                    </tr> 
                    @endforeach
                    </tbody>
                  </table>
                  {{$cats->links()}}
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
@if(Session::has('addcate-success'))
  <script>
    swal("Thành công","Bạn đã thêm mới danh mục thành công", "success");
  </script>
@endif
@if(Session::has('addcate-error'))
  <script>
    swal("Thất bại","Bạn thêm mới danh mục không thành công", "error");
  </script>
@endif
@if(Session::has('updatecate-success'))
  <script>
    swal("Thành công","Bạn sửa danh mục thành công", "success");
  </script>
@endif
@if(Session::has('updatecate-error'))
  <script>
    swal("Thất bại","Bạn sửa danh mục không thành công", "error");
  </script>
@endif
@if(Session::has('delcate-success'))
  <script>
    swal("Thành công","Bạn đã xóa danh mục thành công", "success");
  </script>
@endif
@if(Session::has('delcate-error'))
  <script>
    swal("Thất bại","Bạn đã xóa danh mục không thành công", "error");
  </script>
@endif
@endsection




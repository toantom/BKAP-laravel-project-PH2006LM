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
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="" class="table table-bordered table-hover">
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
                      <td><img src="{{URL::asset('public/be/img/brand/')}}/{{$cate->image}}" alt="" width="100"></td>
                      @if($cate->status==1)
                      <td> Hiện</td>
                      @else
                      <td>Ẩn</td>
                      @endif
                      <td>
                        <a href="{{route('backend.category.edit', $cate->id)}}"><button type="button" class="btn btn-block btn-outline-warning btn-sm">Sửa</button></a>
                        <form action="{{route('backend.category.destroy',$cate->id)}}" method="POST">
                          @method('DELETE') @csrf 
                          <a href="" onclick=" return confirm('Bạn có chắc là muốn xóa {{$cate->name}}')"><button class="btn btn-block btn-outline-danger btn-sm">Xóa</button></a>
                        </form>
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
        {{$cats->links()}}
      </section>
      <!-- /.content -->
      
@endsection

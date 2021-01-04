@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
              <div class="card" style=" height: 800px ,overflow: scroll">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Ảnh chi tiết</th>
                        <th>Tồn kho</th>
                        <th>Giá sản phẩm</th>
                        <th>Giảm giá</th>
                        <th>Danh mục</th>
                        <th>Miêu tả sản phẩm</th>
                        <th>Thông tin sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($prod as $pro)    
                    <tr>
                        <td>1</td>
                        <td>{{$pro->name}}</td>
                        <td><img src="{{URL::asset('public/images/product')}}/{{$pro->image}}" alt="" width="100"></td>
                        <td></td>
                        <td>{{$pro->stock}}</td>
                        <td>{{$pro->price}}</td>
                        <td>{{$pro->discount}}</td>
                        <td></td>
                        <td>{{$pro->des}}</td>
                        <td></td>
                        @if($pro->status==1)
                        <td> Hiện</td>
                        @else
                        <td>Ẩn</td>
                        @endif
                        <td>
                            <a href="{{route('backend.product.edit', $pro->id)}}"><button type="button" class="btn btn-block btn-outline-warning btn-sm">Sửa</button></a>
                            <form action="{{route('backend.product.destroy',$pro->id)}}" method="POST">
                            @method('DELETE') @csrf 
                            <button class="btn btn-block btn-outline-danger btn-sm">Xóa</button>
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
    {{$prod->links()}}
      </section>
      <!-- /.content -->
@endsection
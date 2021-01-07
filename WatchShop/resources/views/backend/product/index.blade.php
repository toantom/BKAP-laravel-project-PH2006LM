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
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive" >
                  <table id="table-pro" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width:10%" >Tên sản phẩm</th>
                        <th style="width:10%">Ảnh sản phẩm</th>
                        <th>Tồn kho</th>
                        <th style="width:10%">Giá sản phẩm</th>
                        <th style="width:10%">Giảm giá</th>
                        <th style="width:10%">Danh mục</th>
                        <th>Miêu tả sản phẩm</th>
                        <th style="width:10%">Thông tin sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($prod as $key=> $pro)    
                    <tr>
                        <td>{{$pro->name}}</td>
                        <td><img src="{{URL::asset('public/images/product/')}}/{{$pro->image}}" alt="" width="100"></td>
                        <td>{{$pro->stock}}</td>
                        <td>{{number_format($pro->price)}} VND</td>
                        <td>{{$pro->discount}}</td>
                        <td>{{$pro->category->name}}</td>
                        <td style="display:block;text-overflow: ellipsis;width:150px;overflow: hidden !important; white-space: nowrap; border-left: inherit">{{$pro->des}}</td>
                        <td>
                          {{$pro->attribute->length_face}}mm <br>
                          {{$pro->attribute->waterproof}} ATM <br>
                          {{$pro->attribute->material_face}}
                        </td>
                        @if($pro->status==1)
                        <td> Hiện</td>
                        @else
                        <td>Ẩn</td>
                        @endif
                        <td>
                            <a href="{{route('backend.product.editPic', $pro->id)}}"><button type="button" class="btn btn-block btn-outline-primary btn-sm">Sửa ảnh</button></a>
                            <a href="{{route('product.edit', $pro->id)}}"><button type="button" class="btn btn-block btn-outline-warning btn-sm">Sửa thông tin</button></a>
                            <form action="{{route('product.destroy',$pro->id)}}" method="POST">
                            @method('DELETE') @csrf 
                            <a href="" onclick=" return confirm('Bạn có chắc là muốn xóa {{$pro->name}}')"><button class="btn btn-block btn-outline-danger btn-sm">Xóa</button></a>                            
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{$prod->links()}}
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
@if(Session::has('addpro-success'))
  <script>
    swal("Thành công","Bạn đã thêm sản phẩm thành công", "success");
  </script>
@endif
@if(Session::has('addpro-error'))
  <script>
    swal("Thất bại","Bạn thêm sản phẩm không thành công", "error");
  </script>
@endif
@if(Session::has('updatepro-success'))
  <script>
    swal("Thành công","Bạn đã sửa sản phẩm thành công", "success");
  </script>
@endif
@if(Session::has('updatepro-error'))
  <script>
    swal("Thất bại","Bạn sửa sản phẩm không thành công", "error");
  </script>
@endif
@if(Session::has('delpro-success'))
  <script>
    swal("Thành công","Bạn đã xóa sản phẩm thành công", "success");
  </script>
@endif
@if(Session::has('delpro-error'))
  <script>
    swal("Thất bại","Bạn xóa sản phẩm không thành công", "error");
  </script>
@endif
@endsection
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
                <div class="card-body" >
                  <table id="table-pro" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th style="width:5em" >Tên sản phẩm</th>
                        <th style="width:100px">Ảnh sản phẩm</th>
                        <th>Tồn kho</th>
                        <th style="width:3em">Giá sản phẩm</th>
                        <th style="width:3em">Giảm giá</th>
                        <th style="width:5em">Danh mục</th>
                        <th>Miêu tả sản phẩm</th>
                        <th style="width:10em">Thông tin sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($prod as $key=> $pro)    
                    <tr>
                        <td>{{$key+1}} </td>
                        <td>{{$pro->name}}</td>
                        <td><img src="{{URL::asset('public/be/img/product/')}}/{{$pro->image}}" alt="" width="100"></td>
                        <td>{{$pro->stock}}</td>
                        <td>{{$pro->price}}</td>
                        <td>{{$pro->discount}}</td>
                        <td>{{$pro->category->name}}</td>
                        <td style="display:inline-block;text-overflow: ellipsis;width: 100px;overflow: hidden !important; white-space: nowrap;">{{$pro->des}}</td>
                        <td>
                          Đường kính mặt: {{$pro->attribute->length_face}}mm
                          Chống nước: {{$pro->attribute->waterproof}} ATM <br>
                          Chất liệu mặt: {{$pro->attribute->material_face}} <br>
                          Năng lượng sử dụng: {{$pro->attribute->use_energy}} <br>
                          Chất liệu dây: {{$pro->attribute->material_strap}} <br>
                          Chất liệu vỏ: {{$pro->attribute->material_coat}} <br>
                          Xuất xứ: {{$pro->attribute->origin}} <br>
                          Chế độ bảo hành: {{$pro->attribute->guarantee}} <br>
                        </td>
                        @if($pro->status==1)
                        <td> Hiện</td>
                        @else
                        <td>Ẩn</td>
                        @endif
                        <td>
                            <a href="{{route('product.edit', $pro->id)}}"><button type="button" class="btn btn-block btn-outline-warning btn-sm">Sửa</button></a>
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
      {{$prod->links()}}
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
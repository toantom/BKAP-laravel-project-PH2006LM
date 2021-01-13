
@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tạo phiếu nhập hàng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Tạo phiếu nhập hàng</li>
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
            <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <form action="{{route('backend.input.store')}}" role="form" method="POST" >
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <select class="form-control" name="id" >
                          @foreach ($sku as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                          </select>
                        @error('id')
                          <small class="help-block text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label>Số lượng</label>
                          <input type="number" class="form-control" name="quantity" placeholder="Nhập số lượng">
                          @error('quantity')
                            <small class="help-block text-danger">{{$message}}</small>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>Đơn giá</label>
                          <input type="number" class="form-control" name="price" placeholder="Nhập giá nhập">
                          @error('price')
                            <small class="help-block text-danger">{{$message}}</small>
                          @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" onclick="return sweetSubmit('Xác nhận tạo phiếu?')" class="btn btn-primary">Tạo phiếu nhập hàng</button>
                    </div>
                </form>
                  </div>
                </div>
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
@endsection




            
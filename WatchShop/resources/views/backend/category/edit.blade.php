@extends('backend.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa danh mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('backend.category')}}">Danh sách danh mục</a></li>
              <li class="breadcrumb-item active">Sửa danh mục</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
            <form action="{{route('backend.category.store')}}" role="form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên danh mục</label>
                    <input type="text" class="form-control" name="name" value="{{$cat->name}}">
                    @error('name')
                      <small class="help-block text-danger">{{$message}}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control custom-select" name="status">
                      <option @if ($cat->status == 1)
                        selected @endif value="1">Hiện</option>
                      <option @if ($cat->status == 0)
                        selected @endif value="0">Ẩn</option>
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
                  <div class="form-group">
                    <label>Đường dẫn</label>
                    <input type="text" class="form-control" name="slug" value="{{$cat->slug}}">
                    @error('slug')
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
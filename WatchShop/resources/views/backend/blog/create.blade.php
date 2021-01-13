@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm mới Blog</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thêm mới Blog</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <label>Tiêu đề</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tiêu đề">
                @error('name')
                  <small class="help-block text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="">Danh mục</label>
                <select class="form-control" name="id_cate">
                @foreach ($cates as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>
                @error('id_cate')
                  <small class="help-block text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="">Người đăng</label>
                <select class="form-control" name="id_admin" id="">
                @foreach ($admin as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>
                @error('id_admin')
                  <small class="help-block text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Trạng thái</label>
                <select class="form-control custom-select" name="status">
                <option selected value="1">Hiện</option>
                <option value="0">Ẩn</option>
                </select>
                @error('status')
                  <small class="help-block text-danger">{{$message}}</small>
                @enderror
              </div>
            </div>{{-- end row  --}}
            <div class="form-group">
              <label for="exampleInputFile">Ảnh blog</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
              @error('image')
                <small class="help-block text-danger">{{$message}}</small>
              @enderror
            
            <div class="card card-outline mt-2">
              <div class="card-header">
                <h3 class="card-title">
                  Nội dung
                </h3>
                <!-- tools box -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                          title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
                <div class="card-body pad">
                    <div class="mb-3">
                    <textarea class="summernote" placeholder="Place some text here" name="content" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
@endsection
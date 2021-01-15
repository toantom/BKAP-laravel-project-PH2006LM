@extends('backend.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sửa Banner</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('banner.index')}}">Danh sách banner</a></li>
            <li class="breadcrumb-item active">Sửa Banner</li>
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
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <form action="{{route('banner.update',$banner->id)}}" role="form" method="POST" enctype="multipart/form-data">
                  @csrf @method('PUT')
                  <input type="hidden" name="id" value="{{$banner->id}}">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tên banner</label>
                      <input type="text" class="form-control" name="name" value="{{$banner->name}}">
                      @error('name')
                        <small class="help-block text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Ảnh banner</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image">
                          <label class="custom-file-label">{{$banner->image}}</label>
                        </div>
                      </div>
                      @error('image')
                        <small class="help-block text-danger">{{$message}}</small>
                      @enderror
                      <br><img src="{{URL::asset('public/images/banner/')}}/{{$banner->image}}" alt="" width="250px">
                    </div>
                    <div class="form-group">
                      <label>Tiêu đề banner</label>
                      <input type="text" class="form-control" name="title" value="{{$banner->title}}">
                      @error('title')
                        <small class="help-block text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Nội dung banner</label>
                      <input type="text" class="form-control" name="content" value="{{$banner->content}}">
                      @error('content')
                        <small class="help-block text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Trạng thái</label>
                      <select class="form-control custom-select" name="status">
                        <option value="1" @if ($banner->status == 1) selected @endif>Slide</option>
                        <option value="2" @if ($banner->status == 2) selected @endif>Khuyến mãi</option>
                        <option value="3" @if ($banner->status == 3) selected @endif>Quảng cáo</option>
                      </select>
                      @error('status')
                        <small class="help-block text-danger">{{$message}}</small>
                      @enderror
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
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
                      <th>Tên banner</th>
                      <th>Ảnh banner</th>
                      <th>Tiêu đề</th>
                      <th>Nội dung</th>
                      <th>Trạng thái</th>
                      <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banners as $item)
                    <tr>
                      <td>{{$item->name}}
                      </td>
                      <td><img src="{{URL::asset('public/images/banner/')}}/{{$item->image}}" alt="" width="100"></td>
                      <td>{{$item->title}}</td>
                      <td style="display:block;text-overflow: ellipsis;width: 150px;overflow: hidden !important; white-space: nowrap;height:4em ">{{$item->content}}</td>
                      <td>
                        @if ($item->status == 1)
                          Slide
                        @elseif ($item->status == 2)
                          Khuyến mãi
                        @else
                          Quảng cáo
                        @endif
                      </td>
                      <td>
                        <a href="{{route('banner.edit', $item->id)}}"><button type="button" class="btn btn-block btn-outline-warning btn-sm">Sửa</button></a>
                        <form action="{{route('banner.destroy',$item->id)}}" method="POST">
                          @method('DELETE') @csrf 
                          <a href="" onclick=" return confirm('Bạn có chắc là muốn xóa {{$item->name}}')"><button class="btn btn-block btn-outline-danger btn-sm">Xóa</button></a>
                        </form>
                      </td>
                    </tr> 
                    @endforeach
                    </tbody>
                  </table>
                  {{$banners->links()}}
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
@endsection




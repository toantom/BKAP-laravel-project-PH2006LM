	@extends('backend.master')
	@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Thêm mới sản phẩm</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm mới sản phẩm</li>
				</ol>
			</div>
			</div>
		</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
		<div class="row">
			<div class="col-md-6">
				<form action="{{route('product.store')}}" role="form" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
						@error('name')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>                 
					<div class="form-group">
						<label>Mã sản phẩm</label>
						<input type="text" class="form-control" name="sku" placeholder="Nhập mã sản phẩm">
						@error('sku')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>                 
					
					<div class="form-group">
						<label for="">Danh mục</label>
						<select class="form-control" name="id_cate" id="">
						@foreach ($cate as $item)
							<option value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
						</select>
						@error('id_cate')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>                 
					<div class="form-group">
						<label for="exampleInputFile">Ảnh đại diện</label>
						<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="avatar">
							<label class="custom-file-label" for="exampleInputFile">Choose file</label>
						</div>
						</div>
						@error('avatar')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Ảnh chi tiết</label>
						<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="avatars[]" multiple>
							<label class="custom-file-label" for="exampleInputFile">Choose file</label>
						</div>
						</div>
						@error('avatars')
						<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
					  <label for="">Kiểu đồng hồ</label>
					  <select class="form-control" name="type" id="">
						<option value="0">Nam</option>
						<option value="1">Nữ</option>
					  </select>
					  @error('type')
						<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Tồn kho</label>
						<input type="text" class="form-control" name="stock" placeholder="Nhập tồn kho">
						@error('stock')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Giá sản phẩm</label>
						<input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
						@error('price')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Giảm giá</label>
						<input type="number" class="form-control" name="discount" placeholder="Nhập giảm giá">
						@error('discount')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Miêu tả sản phẩm</label>
						<textarea class="form-control" name="des" id="" rows="3"></textarea>
						@error('des')
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
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
					<button type="submit" class="btn btn-primary">Thêm mới</button>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card-body">
						<div class="form-group">
							<label for="">Đường kính mặt</label>
							<input type="text" class="form-control" name="length_face" required>
						</div>
						<div class="form-group">
							<label for="">Chất liệu mặt</label>
							<input type="text" class="form-control" name="material_face" required>
						</div>
						<div class="form-group">
							<label for="">Chống nước</label>
							<input type="text" class="form-control" name="waterproof" required>
						</div>
						<div class="form-group">
							<label for="">Năng lượng sử dụng</label>
							  <select class="form-control" name="use_energy" id="" required>
								<option value="Pin">Pin</option>
								<option value="Cơ">Cơ</option>
							  </select>
						</div>
						<div class="form-group">
							<label for="">Chất liệu dây</label>
							<input type="text" class="form-control" name="material_strap" required>
						</div>
						<div class="form-group">
							<label for="">Chất liệu vỏ</label>
							<input type="text" class="form-control" name="material_coat" required>
						</div>
						<div class="form-group">
							<label for="">Nguồn gốc</label>
							<input type="text" class="form-control" name="origin" required>
						</div>
						<div class="form-group">
							<label for="">Bảo hàng (năm)</label>
							<input type="number" class="form-control" name="guarantee" required>
						</div>
						
					</div>
				</div>
			</form>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	@endsection

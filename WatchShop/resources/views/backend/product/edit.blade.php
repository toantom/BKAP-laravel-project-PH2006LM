	@extends('backend.master')
	@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Sửa sản phẩm {{$pro->sku}}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{route('product.index')}}">Danh sách sản phẩm</a></li>
				<li class="breadcrumb-item active">Sửa sản phẩm</li>
				</ol>
			</div>
			</div>
		</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
		<div class="row">
			<div class="col-md-6">
				<form action="{{route('product.update',$pro->id)}}" role="form" method="POST" enctype="multipart/form-data">
					@csrf @method('PUT')
					<input type="hidden" name="id" value="{{$pro->id}}">
					<div class="card-body">
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" class="form-control" name="name" value="{{$pro->name}}">
						@error('name')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>                 
					<div class="form-group">
						<label>Mã sản phẩm</label>
						<input type="text" class="form-control" name="sku" value="{{$pro->sku}}">
						@error('sku')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>                 
					<div class="form-group">
						<label for="">Danh mục</label>
						<select class="form-control" name="id_cate" id="">
						@foreach ($cate as $item)
							<option value="{{$item->id}}" @if($pro->id_cate == $item->id) selected @endif>{{$item->name}}</option>
						@endforeach
						</select>
						@error('id_cate')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>                 
					<div class="form-group">
						<label for="">Kiểu đồng hồ</label>
						<select class="form-control" name="type" id="">
							<option value="0" @if($pro->type == 0)selected @endif>Nam</option>
							<option value="1" @if($pro->type == 1)selected @endif>Nữ</option>
						</select>
					  	@error('type')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Tồn kho</label>
						<input type="text" class="form-control" name="stock" value="{{$pro->stock}}">
						@error('stock')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Giá sản phẩm</label>
						<input type="text" class="form-control" name="price" value="{{$pro->price}}">
						@error('price')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Giảm giá</label>
						<input type="number" class="form-control" name="discount" value="{{$pro->discount}}">
						@error('discount')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="">Miêu tả sản phẩm</label>
						<textarea class="form-control" name="des" id="" rows="3">{{$pro->des}}</textarea>
						@error('des')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
					</div>
					<div class="form-group">
						<label>Trạng thái</label>
						<select class="form-control custom-select" name="status">
						<option value="1" @if($pro->status == 1)selected @endif>Hiện</option>
						<option value="0" @if($pro->status == 0)selected @endif>Ẩn</option>
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
				</div>
				<div class="col-md-4">
					<div class="card-body">
						<div class="form-group">
							<label for="">Đường kính mặt</label>
							<input type="text" class="form-control" name="length_face" value="{{$pro->attribute->length_face}}" required>
						</div>
						<div class="form-group">
							<label for="">Chất liệu mặt</label>
							<input type="text" class="form-control" name="material_face" value="{{$pro->attribute->material_face}}" required>
						</div>
						<div class="form-group">
							<label for="">Chống nước</label>
							<input type="text" class="form-control" name="waterproof" value="{{$pro->attribute->waterproof}}" required>
						</div>
						<div class="form-group">
							<label for="">Năng lượng sử dụng</label>
							  <select class="form-control" name="use_energy" id="" required>
								<option value="Pin" @if($pro->attribute->use_energy == 'Pin')selected @endif>Pin</option>
								<option value="Cơ" @if($pro->attribute->use_energy == 'Cơ')selected @endif>Cơ</option>
							  </select>
						</div>
						<div class="form-group">
							<label for="">Chất liệu dây</label>
							<input type="text" class="form-control" name="material_strap" value="{{$pro->attribute->material_strap}}" required>
						</div>
						<div class="form-group">
							<label for="">Chất liệu vỏ</label>
							<input type="text" class="form-control" name="material_coat" value="{{$pro->attribute->material_coat}}" required>
						</div>
						<div class="form-group">
							<label for="">Nguồn gốc</label>
							<input type="text" class="form-control" name="origin" value="{{$pro->attribute->origin}}" required>
						</div>
						<div class="form-group">
							<label for="">Bảo hàng (năm)</label>
							<input type="number" class="form-control" name="guarantee" value="{{$pro->attribute->guarantee}}" required>
						</div>
						
					</div>
				</div>
			</form>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	@endsection

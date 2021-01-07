	@extends('backend.master')
	@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Sửa ảnh sản phẩm {{$pro->name}}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{route('backend.index')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{route('product.index')}}">Danh sách sản phẩm</a></li>
				<li class="breadcrumb-item active">Sửa ảnh sản phẩm</li>
				</ol>
			</div>
			</div>
		</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
		<div class="row">
			<div class="col-md-6">
				<form action="{{route('backend.product.updatePic',$pro->id)}}" role="form" method="POST" enctype="multipart/form-data">
					@csrf @method('PUT')
					<input type="hidden" name="id" value="{{$pro->id}}">
					<div class="card-body">                 
					<div class="form-group">
						<label for="exampleInputFile">Ảnh đại diện</label>
						<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="avatar">
							<label class="custom-file-label" for="exampleInputFile">{{$pro->image}}</label>
						</div>
						</div>
						@error('avatar')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
						<img src="{{URL::asset('public/images/product/'.$pro->image)}}" alt="" width="200px">
					</div>
					@foreach ($pro_imgs as $key => $item)
						
					<div class="form-group">
						<label for="exampleInputFile">Ảnh chi tiết {{$key+1}}</label>
						<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="avatars">
							<label class="custom-file-label" for="exampleInputFile">{{$item->image}}</label>
						</div>
						</div>
						@error('avatars')
							<small class="help-block text-danger">{{$message}}</small>
						@enderror
							<img src="{{URL::asset('public/images/product/imgs/'.$item->image)}}" alt="" width="200px">
					</div>
					@endforeach

					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Sửa ảnh</button>
					</div>
				</div>
			</form>
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	@endsection

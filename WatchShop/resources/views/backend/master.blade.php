<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>TBT WatchShop</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{URL::asset('public/be/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('public/be/css/adminlte.min.css')}}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{URL::asset('public/be/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/be/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('backend.index')}}" class="nav-link">Trang quản trị</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('frontend.index')}}" class="nav-link">Trang mua hàng</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto" >
      <a onclick="return sweetConfirm('Bạn có muốn đăng xuất không?')" href="{{route('backend.logout')}}" class="nav-link" style="color: red">Đăng xuất</a>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('backend.index')}}" class="brand-link">
      <img src="{{URL::asset('public/images/logo/logo1.png')}}" alt="TBT Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TBT WatchShop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::asset('public/images/logo/logo2.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link active">
                <i class="nav-icon fas fa-list-alt"></i>  
                <p>Quản lý danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link ">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-clock"></i>              
                <p>Quản lý sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link ">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.create')}}" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Thêm mới sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-truck"></i>              
                <p>Quản lý nhập hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('backend.input')}}" class="nav-link ">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Danh sách nhập hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('backend.input.create')}}" class="nav-link ">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Tạo mới phiếu nhập hàng</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-receipt"></i>         
                <p>Quản lý đơn hàng
                <i class="right fas fa-angle-left"></i>
                @if(($noti_order)>0)
                <span class="pull-right-container">
                  <span class="label pull-right bg-red">NEW</span>
                </span>
                @endif
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('order.index')}}" class="nav-link ">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Danh sách đơn hàng</p>
                  @if(($noti_order)>0)
                  <span class="pull-right-container">
                    <span class="label pull-right bg-red">{{$noti_order}}</span>
                  </span>
                  @endif
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>              
                <p>Quản lý Banner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Danh sách Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Thêm mới Banner</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fab fa-blogger"></i>             
                <p>Quản lý Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Danh sách Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Thêm mới Blog</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-comments"></i>              
                <p>Quản lý Feedback
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Danh sách Feedback</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

    
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> --}}
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">TBT Company</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{URL::asset('public/be/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('public/be/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{URL::asset('public/be/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('public/be/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('public/be/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('public/be/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{URL::asset('public/be/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('public/be/js/adminlte.min.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
  $(document).ready(function() {
    $('#table-pro').DataTable( {
        "searching": true,
        "lengthChange": false,
        "paging": false,
        "info": false,
    });
    $('#table-cate').DataTable({
        "searching": true,
        "lengthChange": false,
        "paging": false,
        "info": false,
    });
    $('#table-order').DataTable({
        "searching": true,
        "lengthChange": false,
        "paging": false,
        "info": false,
    });
    $('#table-detail').DataTable({
        "searching": true,
        "lengthChange": false,
        "paging": false,
        "info": false,
    });
  } );
</script>
{{-- SweetAlert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- sweetalert category --}}
@if(Session::has('addcate-success'))
  <script>
    swal("Thành công","Bạn đã thêm mới danh mục thành công", "success");
  </script>
@endif
@if(Session::has('addcate-error'))
  <script>
    swal("Thất bại","Bạn thêm mới danh mục không thành công", "error");
  </script>
@endif
@if(Session::has('updatecate-success'))
  <script>
    swal("Thành công","Bạn sửa danh mục thành công", "success");
  </script>
@endif
@if(Session::has('updatecate-error'))
  <script>
    swal("Thất bại","Bạn sửa danh mục không thành công", "error");
  </script>
@endif
@if(Session::has('delcate-success'))
  <script>
    swal("Thành công","Bạn đã xóa danh mục thành công", "success");
  </script>
@endif
@if(Session::has('delcate-error'))
  <script>
    swal("Thất bại","Bạn đã xóa danh mục không thành công", "error");
  </script>
@endif
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
<script src="{{URL::asset('public/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript">
        function sweetConfirm(text) {
        event.preventDefault();
        var target = $(event.target);
        var linkURL = target.attr("href");
        swal({
                title: "",
                text: text,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    window.location.href = linkURL;
                }
            })
    };
        function sweetSubmit(text) {
            event.preventDefault();
            var target = $(event.target);
            var form = target.closest("form");
            swal({
                    title: "",
                    text: text,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        form.submit();
                    }
                })
        };

</script>
</body>
</html>

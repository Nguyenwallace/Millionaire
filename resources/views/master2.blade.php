<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
	<link rel="icon" href="{{ asset('demo_icon.png')}}" type="image/png" size="16x16">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('bd/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('bd/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('bd/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('bd/vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('bd/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
     <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
	<script src="{{ asset('bd/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	@yield('headscript')

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="" ><p style="color:red;"><b>SSM - Quản Lý Bán Hàng & Kho Bãi</b></p></a>				
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Son Huy</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hôm qua</em>
                                    </span>
                                </div>
                                <div>Đây chỉ là giai đoạn Mô phòng dùng thử, phần mềm sẽ chính thức đi vào vận hành sớm nhất có thể...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Nguyen</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hôm qua</em>
                                    </span>
                                </div>
                                <div>Đây chỉ là giai đoạn Mô phòng dùng thử, phần mềm sẽ chính thức đi vào vận hành sớm nhất có thể...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Le Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hôm qua</em>
                                    </span>
                                </div>
                                <div>Đây chỉ là giai đoạn Mô phòng dùng thử, phần mềm sẽ chính thức đi vào vận hành sớm nhất có thể...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Đọc tất cả thư</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Tác vụ 1</strong>
                                        <span class="pull-right text-muted">40% Hoàn thành</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Tác vụ 2</strong>
                                        <span class="pull-right text-muted">20% Hoàn thành</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Tác vụ 3</strong>
                                        <span class="pull-right text-muted">60% Hoàn thành</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Tác vụ 4</strong>
                                        <span class="pull-right text-muted">80% Hoàn thành</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Xem tất cả tác vụ</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Phản hồi mới
                                    <span class="pull-right text-muted small">4 phút trước</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 Người theo dõi mới
                                    <span class="pull-right text-muted small">12 phút trước</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Thư đã gởi
                                    <span class="pull-right text-muted small">4 phút trước</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> Tác vụ mới
                                    <span class="pull-right text-muted small">4 Phút trước</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Tác vụ ẩn
                                    <span class="pull-right text-muted small">4 phút trước</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Xem tất cả các thông báo</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Thông tin người dùng</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Thiết lập</a>
                        </li>
                        <li class="divider"></li>						
						@if (Auth::check())
							@if(Auth::user()->hasRole('manager'))
							<li><a href="/users/logout">Quản lý:{!! Auth::user()->name !!}/logout</a></li>
							@else
							<li><a href="/users/logout">{!! Auth::user()->name !!}/logout</a></li>							
							@endif
						@else
							<li><a href="/users/register">Register</a></li>
							<li><a href="/login">Login</a></li>
						@endif
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ url('admin') }}"><i class="fa fa-dashboard fa-fw"></i><b>Tổng Quan</b></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> <b>Báo cáo</b><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/quotation/report') }}">Theo sản phẩm</a>
                                </li>
                                <li>
                                    <a href="#">Theo Doanh số</a>
                                </li>
								<li>
                                    <a href="#">Theo khách hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-phone fa-fw"></i><b> Hệ Thống Báo giá</b><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/quotation') }}">Báo giá trong ngày</a>
                                </li>
                                <li>
                                    <a href="#">Đơn hàng sắp mua</a>
                                </li>
								<li>
                                    <a href="#">Đơn hàng không mua</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="{{ url('admin/customer') }}"><i class="fa fa-female fa-fw"></i><b> Khách Hàng</b><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/customer') }}">Quản lý chung</a>
                                </li>
                                <li>
                                    <a href="#">Theo khu vực</a>
                                </li>
								<li>
                                    <a href="#">Khách ưu đãi</a>
                                </li>
								<li>
                                    <a href="#">Khách thường xuyên</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-male fa-fw"></i><b> Nhà cung cấp</b><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('admin/supplier')}}">NCC Thường xuyên</a>
                                </li>
								<li>
                                    <a href="#">NCC Nhỏ phụ</a>
                                </li>
								<li>
                                    <a href="#">NCC Mới</a>
                                </li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                     
                        						
                        <li>
                            <a href="#"><i class="fa fa-building-o fa-fw"></i><b> Sản Phẩm </b><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
									<a href="{{ url('admin/products') }}">Quản lý chung</a>                                 
                                </li>
                                <li>
                                    <a href="#">Xuất Kho</a>
                                </li>
                                <li>
                                    <a href="#">Nhập kho</a>
                                </li>                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-heart fa-fw"></i><b> Đơn hàng</b><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Quản lý đơn hàng</a>
                                </li>
                                <li>
                                    <a href="#">Đơn hàng sắp giao</a>
                                </li>
                                <li>
                                    <a href="#">Đơn hàng đã giao</a>
                                </li>                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Hướng Dẫn sử dụng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Tầng 2</a>
                                </li>                                
                                <li>
                                    <a href="#">Tầng 3 <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Tầng 31</a>
                                        </li>
                                        <li>
                                            <a href="#">Tầng 32</a>
                                        </li>                                        
                                    </ul>
                                    
                                </li>
                            </ul>
                           
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Thông tin tham khảo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Trang trắng</a>
                                </li>
                                <li>
                                    <a href="login.html">Trang đăng nhập</a>
                                </li>
                            </ul>                            
                        </li>
						<li>						
							@if (Auth::check())
								@if(Auth::user()->hasRole('manager'))
								<li><a href="/manager/users"><i class="fa fa-male fa-fw"></i>Quản lý</a></li>
								@else
								<li><a href="/admin/quotation/report"><i class="fa fa-male fa-fw"></i>Nhân Viên</a></li>							
								@endif							
							@endif                          
                       
						<!-- -->
						</li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		
	@yield('content')        

    </div>
		<div id="footer">
		<div id="wrapper">
		<p align="center" color = "red"><b> Phần Mềm Được Phát Triển Bởi HITEKKO</b></p>	
	</div>
	<div>
	
    <!-- /#wrapper -->

    <!-- jQuery -->    

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bd/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('bd/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('bd/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('bd/vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{asset('bd/data/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('bd/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>

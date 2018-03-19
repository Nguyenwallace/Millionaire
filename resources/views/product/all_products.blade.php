@extends('master2')
@section('title', 'Sản phẩm')
@section('headscript')

@endsection
@section('content')
 <div id="page-wrapper">
			<div id="topbar">
				<nav class="navbar navbar-default">
					  <div class="container-fluid">						
						<ul class="nav navbar-nav">
							<li><a href="#" ><b>Quản lý chung</b></a></li>						
						  <li><a href="#"><b>Sản phẩm nội</b></a></li>
						  <li><a href="#"><b>Hàng Nhập</b></a></li>					  
						</ul>
					  </div>
				</nav>
			</div>
         
            <!-- /.row
				<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản Lý Khách Hàng</h1>
                </div>                
            </div>
			-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <b> Bảng Liệt Kê Sản phẩm</b>						   
                        </div>
						<div class="row">
						<div class="container col-md-6">
						<form class="form-horizontal" method="post" action="{!! url('admin/products')!!}">
								@foreach ($errors->all() as $error)
								<p class="alert alert-danger">{{ $error }}</p>
								@endforeach
								@if (session('status'))
								<div class="alert alert-success">
								{{ session('status') }}
								</div>
								@endif
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">						
									<!--
									<div class="panel-heading">
										<label for="page" class="control-label">Khách /Trang</label>							
										<input type="text" name="perpage"/>	
										
										<button type="submit" class="btn btn-primary">Chọn</button>
									</div>
									-->									
									<div class="panel-heading container col-md-6 input-group custom-search-form pull-left">
										<input type="text" name= "perpage" class="form-control" placeholder="Khách/ Trang">
										<span class="input-group-btn">
										<button class="btn btn-default" type="submit">
											<i class="fa fa-thumbs-o-up "></i>
										</button>
										</span>
									</div>
						</form>	
						</div>
						<div class="container col-md-6">
							<form class="form-horizontal" method="post" action="{!! url('admin/products')!!}">						
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">	
										<!--
										<div class="panel-heading">
											<label for="page" class="control-label">Tìm kiếm</label>							
											<input type="text" name="quotesearch" placeholder = "tìm báo giá" />	
											<button type="submit" class="btn btn-primary">Tìm</button>
										</div> 
										-->
									<div class="panel-heading container col-md-6 input-group custom-search-form pull-right">
										<input type="text" class="form-control" placeholder="Tìm kiếm...">
										<span class="input-group-btn">
										<button class="btn btn-default" type="button">
											<i class="fa fa-search"></i>
										</button>
										</span>
									</div>
							</form>	
						</div>
						</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>TT</th>
										<th>Tên Sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Giá</th>
                                        <th>Số lượng tồn kho</th>
                                        <th>Ngày Nhập hàng</th>
										<td><div class="dropdown">
											<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tác vụ
											<span class="caret"></span></button>
											<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
											  <li role="presentation"><input type="button" role="menuitem" tabindex="-1" value="Chọn tất" id="checkAll" /></li>
											  <li role="presentation"><a class = "btn-danger" role="menuitem" tabindex="-1" href="#" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa mục chọn</a></li>
											  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Bỏ chọn</a></li>										  
											</ul>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $i=0;?>
                                    @foreach ($products as $product)
                                    <tr class="gradeU">										
										<?php $i++;?>
										<td>{{$i}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->content}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$stocks[$i-1]}}</td>
                                        <td>{{$product->manu_date}}</td>
                                        <td class="column-verticallineMiddle form-inline"><div class="dropdown">
											<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-eye-open"></span>
											<span class="caret"></span></button>
											<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
											  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Cập nhật</a></li>
											  <li role="presentation"><a role="menuitem" tabindex="-1" href="{!! action('ProductController@delete', $product->id) !!}" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a></li>
											  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Chọn thêm</a></li>										  
											</ul>
										  </div></td>
										  <td><label class="checkbox-inline"><input type="checkbox" id="checkbox{{$product->id}}" value="">Chọn</label></td>
                                    </tr>
                                    @endforeach
                                </tbody>								
                            </table>
							{{ $products->links() }}
						<div class="row">
						<div class="container col-md-6">
						<fieldset>
							<legend>Tải lên/Tải xuống</legend>
							
								<form class="form-horizontal" method="post" action="{!!url('admin/product/upload')!!}" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">
									
										
										<div class="form-group">			
											<div class="col-lg-10">
											<input type="file" id="excelFile" name="excelFile">			
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-lg-10">				
												<button type="submit" class="btn btn-warning">Tải file (.CSV) lên</button>
											</div>
										</div>
									
								</form>
								<form class="form-horizontal" method="post" action="{!!url('admin/product/download')!!}" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">												
										<div class="form-group">
											<div class="col-lg-10">				
												<button type="submit" class="btn btn-primary">Tải file (.CSV) xuống</button>
											</div>
										</div>
									
								</form>	
							</fieldset>
						</div>
						<div class="container col-md-6">
							<fieldset>
								
								<legend>Lựa chọn khác</legend>
									<!-- 								
									<input type="button" class="btn btn-primary" value="Thêm khách mới (window.open)" onClick= 'window.open("{{ url("admin/product/addproduct")}}", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=100,left=200,width=600, height=500");' />	
									/new product portion -->								
									
							<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Thêm sản phẩm mới (Boostrap Modal)
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Sản phẩm mới</h3>
										<div id="addproduct">
										<form class="form-horizontal" method="post" action="{!!url('admin/product/quickadd')!!}" enctype="multipart/form-data">	
											<input type="hidden" name="_token" value="{!! csrf_token() !!}">
											<fieldset>
												<legend></legend>
												
												<div class="form-group">
													<label for="name" class="col-lg-2 control-label">Tên:</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="name" placeholder="Ví dụ: Motor 25kW" name="name" size="35"/>			
													</div>			
												</div>											
												
												<div class="form-group">
													<label for="name" class="col-lg-2 control-label">Mô tả:</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="content" placeholder="Ví dụ: Motor Trục đứng, Chống cháy nổ" name="content"/>
													</div>
												</div>
												
												<div class="form-group">
													<label for="price" class="col-lg-2 control-label">Giá tiền:</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="price" placeholder="ví dụ: 320$" name="price" onkeypress="return numbersonly(event)"/>
													</div>
													
												</div>
												
												<div class="form-group">
													
													<label for="name" class="col-lg-2 control-label">Số lượng</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="quantity" placeholder="100?" name="quantity"/>
													</div>
												</div>
														
												<div class="form-group">
													<label for="price" class="col-lg-2 control-label">Ngày Nhập kho</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="manu_date" placeholder="10/12/2017" name="manu_date"/>
													</div>
													
												</div>
												
												<div class="form-group">
													
													<label for="image" class="col-lg-2 control-label">Ảnh</label>
													<div class="col-lg-5">
														<input type="file" id="photo" name="photo" />	
													</div>
												</div>											
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
													<button type="submit" class="btn btn-success">Thêm sản phẩm mới</button>
												  </div>
											</fieldset>
										</form>
										</div>
									  </div>									  									  
									</div>
								  </div>
								</div>
							</fieldset>
						</div>	
						
							
						</div>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Thông tin sử dụng cần lưu ý</h4>
                                <p>Sẽ cập nhật thêm thông tin...</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="#">Tham khảo thêm</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->       

    </div>
    <!-- /#wrapper -->
<script src="{{ asset('bd/dist/js/colorbox.js') }}"></script>	

@endsection

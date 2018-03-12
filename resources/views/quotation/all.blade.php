@extends('master2')
@section('title', 'Báo Giá')
@section('headscript')
<!--<script src="{{ asset('js/quote.js') }}"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
@include('jsblade/jsquote')
 <div id="page-wrapper">
			<div id="topbar">
				<nav class="navbar navbar-default">
					  <div class="container-fluid">						
						<ul class="nav navbar-nav">
							<li><a href="#"><b>Tổng quan</b></a></li>						
						  <li><a href="#"><b>Báo giá tuần qua VIP</b></a></li>
						  <li><a href="#"><b>Báo giá tiềm năng</b></a></li>					  
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
                           <b> Bảng Liệt Kê Báo giá</b>						   
                        </div>
						<div class = "row">
							<div class="container col-md-6">
							<form class="form-horizontal" method="post" action="{!! url('admin/quotation')!!}">
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
											<input type="text" name="perpage" placeholder = "bao nhiêu báo giá?" />	
											<button type="submit" class="btn btn-primary">Chọn</button>
										</div>
										-->
										<div class="panel-heading container col-md-6 input-group custom-search-form pull-left">
										<input type="text" name= "perpage" class="form-control" placeholder="Báo Giá/trang">
										<span class="input-group-btn">
										<button class="btn btn-default" type="submit">
											<i class="fa fa-thumbs-o-up "></i>
										</button>
										</span>
										</div>
							</form>
							</div>
							<div class="container col-md-6">
							<form class="form-horizontal" method="post" action="{!! url('admin/quotation')!!}">
									@foreach ($errors->all() as $error)
									<p class="alert alert-danger">{{ $error }}</p>
									@endforeach									
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">	
										<!--
										<div class="panel-heading">
											<label for="page" class="control-label">Tìm kiếm</label>							
											<input type="text" name="quotesearch" placeholder = "tìm báo giá" />	
											<button type="submit" class="btn btn-primary">Tìm</button>
										</div> 
										-->
									<div class="panel-heading container col-md-6 input-group custom-search-form pull-right">
										<input type="text" class="form-control" placeholder="Search...">
										<span class="input-group-btn">
										<button class="btn btn-default" type="button">
											<i class="fa fa-search"></i>
										</button>
										</span>
									</div>
							</form>	
							</div>
						</div>
                        <!-- /.panel-heading style='height:500px;display:block;overflow:scroll'-->
                        <div class="panel-body">
                            <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>TT</th>
										<th>Số Báo giá</th>
										<th>Tên khách</th>
                                        <th>Email khách</th>
                                        <th>Ngày báo</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php $i=0;?>
                                    @foreach ($quotes as $quote)
                                    <tr class="gradeU">
										<?php $i++;?>
										<td><p name = "item[]">{{$i}}</p></td>										
                                        <td>{{$quote->quote_number}}</td>
                                        <td>{{ $cusArray[$i-1] }}</td>
                                        <td>{{$quote->cusEmail}}</td>
                                        <td>{{$quote->quoted_date}}</td>
                                        <td>{{$quote->amount}}</td>
                                        <td> <div class="dropdown">
											<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-eye-open"></span>
											<span class="caret"></span></button>
											<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
											  <li role="presentation"><a role="menuitem" class= "btn btn-primary" tabindex="-1" target="_blank" href="{!! action('QuotationController@show', $quote->id) !!}">Cập nhật</a></li>								  
											  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id= "but{{$quote->id}}" class = "btn btn-danger"  role="menuitem" tabindex="-1" onclick ="deleteQuote('{{$quote->id}}');">Xóa</a></li>
											  <!-- 
											  <li role="presentation"><input type="button" id= "but{{$quote->id}}"
											  value="Xóa" class="btn btn-danger" role="menuitem" tabindex="-1" onclick ="deleteQuote('{{$quote->id}}');" /></li>
											  <li role="presentation"><a role="menuitem" tabindex="-1" href="{!! action('QuotationController@delete', $quote->id) !!}" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a></li>
											  -->
											  <li role="presentation"><a role="menuitem" class= "btn btn-success" tabindex="-1" href="#">Chọn thêm</a></li>										  
											</ul>
										  </div></td>
                                    </tr>
                                    @endforeach
									<input type="hidden" id ="item_no" value = "{!!$i!!}" />									
                                </tbody>								
                            </table>
							{{ $quotes->links() }}
						<div class="row">
						<div class="container col-md-6">
						<fieldset>
							<legend>Tải lên/Tải xuống</legend>
							
								<form class="form-horizontal" method="post" action="{!!url('admin/customer/upload')!!}" enctype="multipart/form-data">
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
								<form class="form-horizontal" method="post" action="{!!url('admin/customer/download')!!}" enctype="multipart/form-data">
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
									<input type="button" class="btn btn-primary" value="Thêm khách mới (window.open)" onClick= 'window.open("{{ url("admin/customer/addcustomer")}}", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=100,left=200,width=600, height=500");' />	
									/new customer portion -->						
								<a class="btn btn-primary" target="_blank" href="{{ url('admin/quotation/add')}}">Báo giá mới</a>	
							<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								  Thêm Báo giá mới (Boostrap Modal)
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Thêm báo giá mới</h3>
										<div id="addcustomer">
										<form class="form-horizontal" method="post" action="{!!url('admin/customer/quickadd')!!}" enctype="multipart/form-data">	
											<input type="hidden" name="_token" value="{!! csrf_token() !!}">
											<fieldset>
												<legend></legend>											
												<div class="form-group">
													<label for="name" class="col-lg-2 control-label">Tên:</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="name" placeholder="Ví dụ: Nguyễn Văn A" name="name" size="35"/>			
													</div>			
												</div>
												
												<div class="form-group">
												  <label for="name" class="col-lg-2 control-label">Chọn Loại</label>
												 <div class="col-lg-5">
												 <select name="sel1" class="form-control">
													<option class="form-control"></option>
													
												  </select>
												  </div>
												</div>
												
												<div class="form-group">
													<label for="name" class="col-lg-2 control-label">Địa chỉ:</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="address" placeholder="Ví dụ: 72 Nguyễn Thị Minh Khai, HCMC" name="address"/>
													</div>
												</div>
												
												<div class="form-group">
													<label for="price" class="col-lg-2 control-label">Điện Thoại:</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="telephone" placeholder="ví dụ: 0909362806" name="telephone" onkeypress="return numbersonly(event)"/>
													</div>
													
												</div>
												
												<div class="form-group">
													
													<label for="name" class="col-lg-2 control-label">Email:</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="email" placeholder="NguyenvanA@gmail.com" name="email"/>
													</div>
												</div>
														
												<div class="form-group">
													<label for="price" class="col-lg-2 control-label">Ngày tạo</label>
													<div class="col-lg-5">
													<input type="text" class="form-control" id="created_date" placeholder="10/12/2017" name="created_date"/>
													</div>
													
												</div>
												
												<div class="form-group">
													
													<label for="image" class="col-lg-2 control-label">Ảnh</label>
													<div class="col-lg-5">
														<input type="file" id="photo" name="photo" />	
													</div>
												</div>											
												<div class="modal-footer">
													<button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button>
													<button type="submit" class="btn btn-primary">Lưu Báo Giá Mới</button>
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

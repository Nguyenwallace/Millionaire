@extends('master2')
@section('title', 'Báo Giá mới')
@section('headscript')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="{!! asset('js/jquery-ui.js') !!}"></script>
<!-- <script src="{{ asset('js/quotation.js') }}"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
@include(('jsblade/jsquotation'))
 <div id="page-wrapper">
			<div id="topbar">
				<nav class="navbar navbar-default">
					  <div class="container-fluid">						
						<ul class="nav navbar-nav">
							<li><a href="#" ><b>Tổng quan</b></a></li>						
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
                           <b style="color:red;"> BÁO GIÁ MỚI</b>						   
                     </div>
					<div class="panel-body">
						<form name="productForm" class="form-horizontal" method="post">
							@foreach ($errors->all() as $error)
							<p class="alert alert-danger">{{ $error }}</p>
							@endforeach
							@if (session('status'))
							<div class="alert alert-success">
							{{ session('status') }}
							</div>
							@endif	
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<fieldset>							
								<div class="container col-md-12">
								<legend><p style="color:blue;">Thông tin khách & Nhà Cung cấp</p></legend>
								<table class="table table-bordered table-responsive">
									<tr>														
										<td colspan='2'><label>Khách Hàng:</label><button type="button" class="btn btn-primary" 	data-toggle="modal" data-target="#newCusModal">
										Khách Mới?</button></td>				
										<td colspan='2'><label>Nhà Cung cấp:</label><button type="button" class="btn btn-primary" 	data-toggle="modal" data-target="#newSupModal">
										Thêm NCC?</button></td>
									</tr>
									<tr>		
										<td><label>Tên:</label></td><td><input class="form-control" type="text"  id="cusName" placeholder="Name" /></td>
										<td><label>Tên:</label></td><td><input type="text" class="form-control"  id="supName" placeholder="Name" /></td>				
									</tr>			
									<tr>		
										<td><label>Địa chỉ:</label></td><td><p id="cusAddress"></p></td>
										<input type = "hidden" name="cusAddress" />
										<td><label>Địa chỉ:</label></td><td><p id="supAddress"></p></td>	
									</tr>
									<tr>		
										<td><label>Điện thoại.:</label></td><td><p id="cusTelephone"></p></td>
										<input type = "hidden" name="cusTelephone" />
										<td><label>Điện thoại.:</label></td><td><p id="supTelephone"></p></td>	
									</tr>
									<tr>		
										<td><label>Email:</label></td><td><p id="cusEmail"></p></td>
										<input type = "hidden" name="cusEmail" />
										<td><label>Email:</label></td><td><p id="supEmail"></p></td>	
									</tr>
								</table>
								<div class="container col-md-16">
									<div class="modal fade" id="newCusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h3 class="modal-title" id="exampleModalLabel">Thêm khách mới</h3>
											<div id="addcustomer">											
												<fieldset>
													<legend></legend>													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="name" class="col-lg-3 control-label">Tên:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="cusQuickName" placeholder="Ví dụ: Nguyễn Văn A" name="name" size="35"/>	
															</div>
														</div>			
													</div>													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="name" class="col-lg-3 control-label">Chọn Loại</label>
															<div class="col-lg-9">
															<select name="sel1" class="form-control">
															<option class="form-control">Khách tiềm năng</option>
															<option class="form-control">Khách từ đối thủ</option>
															<option class="form-control">3</option>
															<option class="form-control">4</option>
														  </select>
														  </div>
													  </div>
													</div>
													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="name" class="col-lg-3 control-label">Địa chỉ:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="cusQuickAddress" placeholder="Ví dụ: 72 Nguyễn Thị Minh Khai, HCMC" name="address"/>
															</div>
														</div>
													</div>
													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="price" class="col-lg-3 control-label">Điện Thoại:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="cusQuickTel" placeholder="ví dụ: 0909362806" name="telephone" onkeypress="return numbersonly(event)"/>
															</div>														
														</div>														
													</div>													
													<div class="form-group">	
														<div class="col-lg-12">
															<label for="name" class="col-lg-3 control-label">Email:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="cusQuickEmail" placeholder="NguyenvanA@gmail.com" name="email"/>
															</div>
														</div>
													</div>
															
													<div class="form-group">
														<div class="col-lg-12">
															<label for="price" class="col-lg-3 control-label">Ngày tạo:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="created_date" placeholder="10/12/2017" name="created_date"/>
															</div>														
														</div>														
													</div>													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="image" class="col-lg-3 control-label">Ảnh:</label>
															<div class="col-lg-5">
																<input type="file" id="photo" name="photo" />	
															</div>
														</div>
													</div>											
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
														<input type="button" class="btn btn-success" value = "Lưu Khách Mới" onClick = "quickAddCustomer();" data-dismiss="modal" />
													  </div>
												</fieldset>											
											</div>
										  </div>									  									  
										</div>
									  </div>
									</div>
								</div>
								<div class="container col-md-16">
									<div class="modal fade" id="newSupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
										<div class="modal-content">
										  <div class="modal-header">
											<h3 class="modal-title" id="exampleModalLabel">Thêm NCC Mới</h3>
											<div id="addcustomer">											
												<fieldset>
													<legend></legend>													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="name" class="col-lg-3 control-label">Tên:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="supQuickName" placeholder="Ví dụ: Toshiba" name="supQuickName" />	
															</div>
														</div>			
													</div>													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="name" class="col-lg-3 control-label">Chọn Loại</label>
															<div class="col-lg-9">
															<select name="sel1" class="form-control">
															<option class="form-control">NCC Thường Xuyên</option>
															<option class="form-control">NCC Rẻ</option>
															<option class="form-control">3</option>
															<option class="form-control">4</option>
														  </select>
														  </div>
													  </div>
													</div>
													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="name" class="col-lg-3 control-label">Địa chỉ:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="supQuickAddress" placeholder="Ví dụ: 72 Nguyễn Thị Minh Khai, HCMC" name="supQuickAddress"/>
															</div>
														</div>
													</div>
													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="price" class="col-lg-3 control-label">Điện Thoại:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="supQuickTel" placeholder="ví dụ: 0909362806" name="supQuickTel" onkeypress="return numbersonly(event)"/>
															</div>														
														</div>														
													</div>													
													<div class="form-group">	
														<div class="col-lg-12">
															<label for="name" class="col-lg-3 control-label">Email:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="supQuickEmail" placeholder="contact@toshiba.com" name="supQuickEmail"/>
															</div>
														</div>
													</div>
															
													<div class="form-group">
														<div class="col-lg-12">
															<label for="price" class="col-lg-3 control-label">Ngày tạo:</label>
															<div class="col-lg-9">
															<input type="text" class="form-control" id="created_date" placeholder="10/12/2017" name="created_date"/>
															</div>														
														</div>														
													</div>													
													<div class="form-group">
														<div class="col-lg-12">
															<label for="image" class="col-lg-3 control-label">Ảnh:</label>
															<div class="col-lg-5">
																<input type="file" id="photo" name="photo" />	
															</div>
														</div>
													</div>											
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
														<input type="button" class="btn btn-success" value = "Lưu NCC Mới" onClick = "quickAddSupplier();" data-dismiss="modal" />
													  </div>
												</fieldset>											
											</div>
										  </div>									  									  
										</div>
									  </div>
									</div>
								</div>
								</div>
								
								<div class="container col-md-12">
								<legend><p style="color:green;">Báo Giá - Thêm hạng mục mới</p></legend>
								<table class="table table-bordered table-responsive">
									<tr>
										<td><label>Số báo giá.: </label></td><td><input type="text" style="background-color:White; color:Black;" class="form-control" id="quote_number"  name="quote_number" value = "{!!uniqid()!!}" readonly /></td>
										<td><label>Ngày Báo.: </label></td><td><input type="text" class="form-control" id="quotedDate" placeholder="Chọn ngày" style="background-color:White; color:Black;" name="quotedDate" readonly /></td>
									</tr>
									<tr>
										<td>
											<label class="form-control" for="name" >Tên sản phẩm</label>
										</td>
										<td>					
											<label class="form-control" for="price" >Giá</label>					
										</td>
										<td>					
											<label class="form-control" for="quantity" >Số lượng</label>					
										</td>
										<td>					
											<label class="form-control" for="stock" >SL Có sẵn kho</label>					
										</td>
										<td>					
											<label class="form-control" for="new item" >Thêm vào</label>					
										</td>
									</tr>
									
									<tr>
										<td>				
											<input type="text" class="form-control" id="product" placeholder="Điền tên" name=""/>					
										</td>
										<td>					
											<input type="text" class="form-control" id="price" placeholder="Giá" style="background-color:White; color:Black;" name="" readonly />					
										</td>
										<td>					
											<input type="text" class="form-control" id="quantity" placeholder="Số lượng" name="" onkeypress="return numbersonly(event)"/>	
										</td>
										<td>					
											<input type="text" class="form-control" id="stock" placeholder="Còn trong kho" style="background-color:White; color:Black;" name="" readonly />					
										</td>
										<td>					
										<button class = "btn btn-primary" type="button"  id="addItem"  name="add">Thêm vào</button>			
										</td>
									</tr>									
								</table>	
															
								</div>							
								
								<div class="container col-md-12">
									<legend><p style="color:purple;">Hạng mục báo giá</p></legend>
										<table class = "tabel table-bordered table-responsive" id = "quotedTable" name = "quotedTable">
											
											<tr>
												<td width = "10%">
													<label for="name">Thứ tự</label>
												</td>
												<td width = "30%">
													<label for="name">Tên sản phẩm</label>
												</td>
												<td width = "15%">					
													<label for="price">Giá</label>					
												</td>
												<td width = "15%">					
													<label for="quantity">Số lượng</label>					
												</td>
												<td>					
													<label for="stock">Kho Có sẵn</label>					
												</td>
												<td>					
													<label for="subtotal">Tổng con</label>					
												</td>					
												<td>					
													<label for="delete">Xóa?</label>					
												</td>
											</tr>
											
											
										</table>
									<br>									
									<input type="hidden" id="hiddenItem" value ='0'/>									
								</div>
								
								<div class="container col-md-8">
								<legend><p style="color:red;"> Giảm giá & Tổng Đơn Hàng & Thuế </p></legend>
								<table class = "table table-bordered">		
								<tr>
									<td>				
									</td>
									<td>				
									</td>
									<td>
										<label for="amount" >Tổng đơn hàng trước thuế</label>
									</td>
									<td>
										<input name ="amount" class="form-control" id="amount" style="background-color:White; color:Black;" readonly />
									</td>
								</tr>
								<tr>
									<td>
										<label for="discount" >Giảm giá %</label>
									</td>
									<td>
										<input name="discount" class="form-control" id = "discount" placeholder ="Giảm giá?" onkeypress="return numbersonly(event);" onkeyup="getdiscount();" />
									</td>
									<td>
										<label for="amount" >Tổng Sau Giảm Giá</label>
									</td>
									<td>
										<input name ="totalAmount" class="form-control" style="background-color:White; color:Black;" id="totalAmount" readonly />
									</td>
								</tr>
								<tr>
									<td>
										<label for="tax" >Thuế %</label>
									</td>
									<td>
										<input name="tax" class="form-control" id = "tax" placeholder ="Thuế?" onkeypress="return numbersonly(event);" onkeyup="gettax();"/>
									</td>
									<td>
										<label for="taxAmount">Giá trị Thuế</label>
									</td>
									<td>
										<input type="text" name ="taxAmount" class="form-control" style="background-color:White; color:Black;" id="taxAmount" readonly />
									</td>
								</tr>	
								<tr>
									<td></td>
									<td></td>
									<td>
										<label for="total" >Tổng sau thuế</label>
									</td>
									<td>
										<input type= "text" style="background-color:White; color:Black;" class="form-control" name ="grandTotal" id="grandTotal" readonly />
									</td>
								</tr>
								</table>
								<div class="col-lg-10 col-lg-offset-2">
										<button class="btn btn-default">Bỏ chọn</button>
										<button type="submit" class="btn btn-primary">Báo Giá</button>
								</div>
							</fieldset>
						</form>
                        
						</div>
						</div>
					</div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>            <!-- /.row -->      

    </div>
    <!-- /#wrapper -->
@endsection

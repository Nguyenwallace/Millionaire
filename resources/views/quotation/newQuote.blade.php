@extends('master2')
@section('title', 'Báo Giá')
@section('headscript')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="{!! asset('js/jquery-ui.js') !!}"></script>
<script src="{{ asset('js/quotation.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
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
							
								<legend>Customer & Vendor Information</legend>
								<table class="table table-bordered table-responsive">
									<tr>		
										<td colspan='2'><label>Customer Information:</label><a href="{!!url('admin/customer/add')!!}" class="edit-link btn btn-success" >Add New Customer ?</a></td>				
										<td colspan='2'><label>Vendor Information:</label></td>
									</tr>
									<tr>		
										<td><label>Name:</label></td><td><input type="text"  id="cusName" placeholder="Name" /></td>
										<td><label>Name:</label></td><td><input type="text"  id="supName" placeholder="Name" /></td>				
									</tr>			
									<tr>		
										<td><label>Address:</label></td><td><p id="cusAddress"></p></td>
										<input type = "hidden" name="cusAddress" />
										<td><label>Address:</label></td><td><p id="supAddress"></p></td>	
									</tr>
									<tr>		
										<td><label>Tel No.:</label></td><td><p id="cusTelephone"></p></td>
										<input type = "hidden" name="cusTelephone" />
										<td><label>Tel No.:</label></td><td><p id="supTelephone"></p></td>	
									</tr>
									<tr>		
										<td><label>Email:</label></td><td><p id="cusEmail"></p></td>
										<input type = "hidden" name="cusEmail"/>
										<td><label>Email:</label></td><td><p id="supEmail"></p></td>	
									</tr>
								</table>
								<legend>QUOTATION - Add New Item</legend>		
								<div class="form-group">
								<table class="table table-bordered">
									<tr>
										<td><label>Quo NO.: </label></td><td><input type="text"  id="quote_number" placeholder="Input Quote Number" name="quote_number" value = "{!!uniqid()!!}" readonly /></td>
										<td><label>Date of quote.: </label></td><td><input type="text"  id="quotedDate" placeholder="Input Date" name="quotedDate" readonly /></td>
									</tr>
									<tr>
										<td>
											<label for="name" >Product Name</label>
										</td>
										<td>					
											<label for="price" >Price</label>					
										</td>
										<td>					
											<label for="quantity" >Quantity</label>					
										</td>
										<td>					
											<label for="stock" >Stock Available</label>					
										</td>
										<td>					
											<label for="new item" >Add New Item</label>					
										</td>
									</tr>
									
									<tr>
										<td>				
											<input type="text"  id="product" placeholder="Input name" name=""/>					
										</td>
										<td>					
											<input type="text"  id="price" placeholder="Price" name="" readonly />					
										</td>
										<td>					
											<input type="text"  id="quantity" placeholder="Quantity" name="" onkeypress="return numbersonly(event)"/>	
										</td>
										<td>					
											<input type="text"  id="stock" placeholder="Stock" name="" readonly />					
										</td>
										<td>					
										<button class = "btn btn-primary" type="button"  id="addItem"  name="add">Add Item</button>			
										</td>
									</tr>
									
								</table>				
								</div>
								
								<legend>Items to be quoted</legend>
								<div class="form-group">
									<table class = "tabel table-bordered table-responsive" id = "quotedTable" name = "quotedTable">
										<tr>
											<td>
												<label for="name" >Item</label>
											</td>
											<td>
												<label for="name" >Product Name</label>
											</td>
											<td>					
												<label for="price" >Price</label>					
											</td>
											<td>					
												<label for="quantity" >Quantity</label>					
											</td>
											<td>					
												<label for="stock" >Stock Available</label>					
											</td>
											<td>					
												<label for="subtotal" >Sub total</label>					
											</td>					
											<td>					
												<label for="delete" >Delete</label>					
											</td>
										</tr>
										
									</table>
									<input type="hidden" id="hiddenItem" value ='0'/>
								</div>
								<legend> Discount & Amount & Tax</legend>
								<table class = "table table-bordered">		
								<tr>
									<td>				
									</td>
									<td>				
									</td>
									<td>
										<label for="amount" >Amount  before Discount</label>
									</td>
									<td>
										<input name ="amount" id="amount" readonly />
									</td>
								</tr>
								<tr>
									<td>
										<label for="discount" >Discount %</label>
									</td>
									<td>
										<input name="discount" id = "discount" placeholder ="input discount" onkeypress="return numbersonly(event);" onkeyup="getdiscount();" />
									</td>
									<td>
										<label for="amount" >Total Amount</label>
									</td>
									<td>
										<input name ="totalAmount" id="totalAmount" readonly />
									</td>
								</tr>
								<tr>
									<td>
										<label for="tax" >Tax %</label>
									</td>
									<td>
										<input name="tax" id = "tax" placeholder ="input Tax" onkeypress="return numbersonly(event);" onkeyup="gettax();"/>
									</td>
									<td>
										<label for="taxAmount">Tax Value</label>
									</td>
									<td>
										<input name ="taxAmount" id="taxAmount" readonly />
									</td>
								</tr>	
								<tr>
									<td></td>
									<td></td>
									<td>
										<label for="total" >Grand Total</label>
									</td>
									<td>
										<input name ="grandTotal" id="grandTotal" readonly />
									</td>
								</tr>
								</table>
								<div class="col-lg-10 col-lg-offset-2">
										<button class="btn btn-default">Cancel</button>
										<button type="submit" class="btn btn-primary">Quote</button>
								</div>
							</fieldset>
						</form>
                        
                    </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->      

    </div>
    <!-- /#wrapper -->
@endsection

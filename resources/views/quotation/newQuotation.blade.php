@extends('master2')
@section('title', 'Add new Quotation')
@section('headerscript')
<script src = "{!! asset('js/quotation.js') !!}"></script>
@endsection	
@section('topbar')
<nav class="navbar navbar-default">
  <div class="container-fluid">    
    <ul class="nav navbar-nav">
	  <li><a href="" class="active">Home</a></li>
	  <li><a href="{!!url('admin/quotation/add')!!}">New Quotation</a></li>
      <li><a href="{!!url('admin/quotation/all')!!}">List All Quotation</a></li>      
    </ul>
  </div>
</nav>
@endsection	
@section('content')
<div class="container col-md-10 col-md-offset-0 fl">
<div class="well well bs-component">
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
				<td><label>Address:</label></td><td><input type="text"  id="cusAddress" placeholder="Customer address" name="cusAddress" readonly /></td>
				<td><label>Address:</label></td><td><input type="text"  id="supAddress" placeholder="Supplier Address" name="supAddress" readonly /></td>	
			</tr>
			<tr>		
				<td><label>Tel No.:</label></td><td><input type="text"  id="cusTelephone" placeholder="Customer Tel" name="cusTelephone" readonly /></td>
				<td><label>Tel No:</label></td><td><input type="text"  id="supTelephone" placeholder="Supplier Tel" name="subTelephone" readonly /></td>	
			</tr>
			<tr>		
				<td><label>Email:</label></td><td><input type="text"  id="cusEmail" placeholder="Customer Email" name="cusEmail" readonly /></td>
				<td><label>Email:</label></td><td><input type="text"  id="supEmail" placeholder="Supplier Email" name="supEmail" readonly /></td>	
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
@endsection
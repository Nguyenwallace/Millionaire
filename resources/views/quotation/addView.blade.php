@extends('master')
@section('title', 'Add new Quotation')
@section('headerscript')
<script src = "{!! asset('js/quotation.js') !!}"></script>
@endsection		
@section('content')
<div class="container col-md-10 col-md-offset-2">
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
		<table class="table table-bordered">
			<tr>		
				<td colspan='2'><label>Customer Information:</label><a href="{!!url('customer/add')!!}" class= "btn btn-success">Add New Customer ?</a></td>				
				<td colspan='2'><label>Vendor Information:</label></td>
			</tr>
			<tr>		
				<td><label>Name:</label></td><td><input type="text"  id="cusName" placeholder="Name" /></td>
				<td><label>Name:</label></td><td><input type="text"  id="supName" placeholder="Name" /></td>				
			</tr>			
			<tr>		
				<td><label>Address:</label></td><td><input type="text"  id="cusAddress" placeholder="Customer address" name="cusAddress" /></td>
				<td><label>Address:</label></td><td><input type="text"  id="supAddress" placeholder="Supplier Address" name="supAddress" /></td>	
			</tr>
			<tr>		
				<td><label>Tel No.:</label></td><td><input type="text"  id="cusTelephone" placeholder="Customer Tel" name="cusTelephone" /></td>
				<td><label>Tel No:</label></td><td><input type="text"  id="supTelephone" placeholder="Supplier Tel" name="subTelephone" /></td>	
			</tr>
			<tr>		
				<td><label>Email:</label></td><td><input type="text"  id="cusEmail" placeholder="Customer Email" name="cusEmail" /></td>
				<td><label>Email:</label></td><td><input type="text"  id="supEmail" placeholder="Supplier Email" name="supEmail" /></td>	
			</tr>
		</table>
		<legend>QUOTATION - Add New Item</legend>		
		<div class="form-group">
		<table class="table table-bordered">
			<tr>
				<td><label>Quo NO.: </label></td><td><input type="text"  id="quote_number" placeholder="Input Quote Number" name="quote_number"/></td>
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
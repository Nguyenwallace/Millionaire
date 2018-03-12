@extends('master')
@section('title', 'show quotation')
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
<div class="container col-md-10 col-md-offset-0 fr">
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
		<div class = "table-responsive">
		<table class="table table-bordered col-md-1" style="background-color: #87CEEB">
			<tr>		
				<td colspan='2'><label>Customer Information:</label></td>
				<td colspan='2'><label>Vendor Information:</label></td>
			</tr>
			<tr>		
				<td><label class="col-md-1">Name:</label></td><td><input type="text"  id="cusName" value="{!! $customer->name !!}" name="cusName" /></td>
				<td><label class="col-md-1">Name:</label></td><td><input type="text"  id="supName" placeholder="Supplier Name" name="" /></td>				
			</tr>			
			<tr>		
				<td><label class="col-md-1">Address:</label></td><td><input type="text"  id="cusAddress" value="{!! $customer->address !!}" name="cusAddress" /></td>
				<td><label class="col-md-1">Address:</label></td><td><input type="text"  id="supAddress" placeholder="Supplier Address" name="" /></td>	
			</tr>
			<tr>		
				<td><label class="col-md-1">Tel No.:</label></td><td><input type="text"  id="cusTelephone" value="{!! $customer->telephone !!}" name="cusTelephone" /></td>
				<td><label class="col-md-1">Tel No:</label></td><td><input type="text"  id="supTelephone" placeholder="Supplier Tel" name="" /></td>	
			</tr>
			<tr>		
				<td><label class="col-md-1">Email:</label></td><td><input type="text"  id="cusEmail" value="{!! $customer->email !!}" name="cusEmail" /></td>
				<td><label class="col-md-1">Email:</label></td><td><input type="text"  id="supEmail" placeholder="Supplier Email" name="" /></td>	
			</tr>
		</table>
		</div>
		<legend>QUOTATION - Add New Item</legend>
		
		<div class = "table-responsive">
		<table class="table table-bordered" style="background-color:#D8BFD8">
			<tr>
				<td><label class="col-md-1">Quo NO.: </label></td><td><input type="text"  id="quote_number" value="{!! $quote->quote_number!!}" name="quote_number" readonly /></td>
				<td><label class="col-md-1">Quoted Date.: </label></td><td><input type="text"  id="quotedDate" value="{!! $quote->quoted_date!!}" name="quotedDate" readonly /></td>
			</tr>
			<tr>
				<td>
					<label for="name" class="col-md-1">Product Name</label>
				</td>
				<td>					
					<label for="price" class="col-md-1">Price</label>					
				</td>
				<td>					
					<label for="quantity" class="col-md-1">Quantity</label>					
				</td>
				<td>					
					<label for="stock" >Stock Available</label>					
				</td>
				<td>					
					<label for="new item" class="col-md-1">Add New Item</label>					
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
				<button class = "btn btn-primary" type="button" id="addItem"  name="add"><span class="glyphicon glyphicon-plus"></span>Add Item</button>			
				</td>
			</tr>
			
		</table>
		</div>		
		
		<legend>Items to be quoted</legend>		
		
			<div class = "table-responsive">
			<table class = "tabel table-bordered" id = "quotedTable" name = "quotedTable" style="background-color:#F0FFFF">
				<tr>
					<td>
						<label for="name" class= "col-md-1" >Item</label>
					</td>
					<td>
						<label for="name" class= "col-md-1">Product Name</label>
					</td>
					<td>					
						<label for="price" class= "col-md-1">Price</label>					
					</td>
					<td>					
						<label for="quantity" class= "col-md-1">Quantity</label>					
					</td>
					<td>					
						<label for="stock" class= "col-md-1" >Stock Available</label>					
					</td>
					<td>					
						<label for="subtotal" class= "col-md-1">Sub total</label>					
					</td>					
					<td>					
						<label for="delete" class= "col-md-1">Delete</label>					
					</td>
				</tr>
				
				@if($qps->isEmpty())
				<p> There is No Item.</p>
				@else
				<?php $item = 0 ?>
				<?php $qty = 0 ?>			
				@foreach($qps as $qp)
				<?php $item ++ ?>
				<tr>
					<td><input type="text" name="item[]" value={!! $item !!} readonly ></td>
					<td><input type="text" id="product{!! $item !!}" name="product[]" value="{!!$qp->product!!}" readonly ></td>
					<td><input type="text" id="price{!! $item !!}" name="price[]" value="{!!$qp->price!!}" readonly ></td> 
					<td><input type="text" id="quantity{!! $item !!}" name="quantity[]" value="{!!$qp->quantity!!}" onkeyup="updateSub('{!! $item !!}');"></td>
					<td><input type="text" id="stock{!! $item !!}" name="stock[]" value="{!!$quantities[$qty]!!}" readonly ></td>
					<td><input type="text" id="subTotal{!! $item !!}" name="subTotal[]" value="{!!$qp->quantity*$qp->price!!}" readonly ></td>					
					<td><button type="button" class = "btn btn-danger" class="glyphicon glyphicon-remove" onclick ="$(this).closest('tr').remove();reduceAmount();" ><span class="glyphicon glyphicon-remove"></span> </button></td>
				</tr>
				<?php $qty++ ?>
				@endforeach	
				<input type="hidden" id="hiddenItem" value ="{!! $item !!}"/>
				@endif
			</table>
		</div>		
		<legend> Discount & Amount & Tax</legend>
		<table class = "table-responsive">		
		<table class = "table table-bordered" style="background-color:#FFA07A">		
		<tr>
			<td>				
			</td>
			<td>				
			</td>
			<td>
				<label for="amount" >Amount  before Discount</label>
			</td>
			<td>
				<input name ="amount" value="{!! $quote->amount!!}" id="amount" readonly />
			</td>
		</tr>
		<tr>
			<td>
				<label for="discount" >Discount %</label>
			</td>
			<td>
				<input name="discount" id = "discount" value="{!! $quote->discount!!}" onkeypress="return numbersonly(event);" onkeyup="getdiscount();" />
			</td>
			<td>
				<label for="amount" >Total Amount</label>
			</td>
			<td>
				<input name ="totalAmount" value="{!! $quote->amount*(1-$quote->discount/100)!!}" id="totalAmount" readonly />
			</td>
		</tr>
		<tr>
			<td>
				<label for="tax" >Tax %</label>
			</td>
			<td>
				<input name="tax" id = "tax" value="{!! $quote->tax!!}" onkeypress="return numbersonly(event);" onkeyup="gettax();"/>
			</td>
			<td>
				<label for="taxAmount">Tax Value</label>
			</td>
			<td>
				<input name ="taxAmount" value="{!! $quote->amount*(1-$quote->discount/100)*$quote->tax/100!!}"  id="taxAmount" readonly />
			</td>
		</tr>	
		<tr>
			<td></td>
			<td></td>
			<td>
				<label for="total" >Grand Total</label>
			</td>
			<td>
				<input name ="grandTotal" value="{!! $quote->amount*(1-$quote->discount/100)*(1+$quote->tax/100)!!}"  id="grandTotal" readonly />
			</td>
		</tr>
		</table>
	</div>
		<div class="col-lg-10 col-lg-offset-2">
				<button class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Update Quote</button>
		</div>
	</fieldset>
</form>

</div>
@endsection
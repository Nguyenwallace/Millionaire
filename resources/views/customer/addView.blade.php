@extends('master')
@section('title', 'Add new customer')
@section('headerscript')
<script src="{!!asset('js/customer.js')!!}"></script>
@endsection	
@section('topbar')
<nav class="navbar navbar-default">
  <div class="container-fluid">    
    <ul class="nav navbar-nav">
	  <li><a href="" class="active">Home</a></li>
	  <li><a href="{!!url('admin/customer/add')!!}">New Customer</a></li>
      <li><a href="{!!url('admin/customer/all')!!}">List All Customer</a></li>      
    </ul>
  </div>
</nav>
@endsection	
@section('content')
<div class="container col-md-8 col-md-offset-0">
<div class="well well bs-component">
<form class="form-horizontal" method="post" action="{!!url('admin/customer/add')!!}" enctype="multipart/form-data">
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
		<legend>Adding new customer</legend>
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Name:</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="name" placeholder="Input name" name="name"/>
			</div>
		</div>
		
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Address:</label>
			<div class="col-lg-10">
			<textarea rows = '5' class="form-control" id="address" placeholder="Input Address" name="address"></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label for="price" class="col-lg-2 control-label">Tel:</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="telephone" placeholder="Input Tel No." name="telephone" onkeypress="return numbersonly(event)"/>
			</div>
		</div>	
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Email:</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="email" placeholder="Input Email" name="email"/>
			</div>
		</div>
				
		<div class="form-group">
			<label for="price" class="col-lg-2 control-label">Created Date</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="created_date" placeholder="Input Date" name="created_date"/>
			</div>
		</div>
		
		<div class="form-group">
			<label for="image" class="col-lg-2 control-label">Image</label>
			<div class="col-lg-10">
			<input type="file" id="photo" name="photo" onchange="readURL(this);">
			<img id="preview" src="http://localhost:8000/images/products/laravel_logo.jpg" width=200 alt="Photo Preview"/>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</fieldset>
</form>
</div>
</div>
<div class="container col-md-2 col-md-offset-0">
<div class="well well bs-component">
<form class="form-horizontal" method="post" action="{!!url('admin/customer/upload')!!}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<fieldset>
		<legend>Upload/Download Customer</legend>
		<div class="form-group">			
			<div class="col-lg-10">
			<input type="file" id="excelFile" name="excelFile">			
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-10">				
				<button type="submit" class="btn btn-warning">Upload</button>
			</div>
		</div>
	</fieldset>
</form>
<form class="form-horizontal" method="post" action="{!!url('admin/customer/download')!!}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<fieldset>				
		<div class="form-group">
			<div class="col-lg-10">				
				<button type="submit" class="btn btn-primary">Download Customer</button>
			</div>
		</div>
	</fieldset>
</form>
</div>
</div>
@endsection
@extends('master')
@section('title', 'Add new product')
@section('headerscript')
<script src = "{!! asset('js/product.js') !!}"></script>
@endsection	
@section('topbar')
<nav class="navbar navbar-default">
  <div class="container-fluid">    
    <ul class="nav navbar-nav">
	  <li><a href="" class="active">Home</a></li>
	  <li><a href="{!!url('admin/product/add')!!}">New Product</a></li>
      <li><a href="{!!url('admin/product/all')!!}">List All Product</a>	</li>      
    </ul>
  </div>
</nav>
@endsection	
@section('content')

<div class="container col-md-10 fl">
<div class="well well bs-component">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
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
		<legend>Adding new product</legend>
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Name</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="name" placeholder="Input name" name="name"/>
			</div>
		</div>
		
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Description</label>
			<div class="col-lg-10">
			<textarea rows = '5' class="form-control" id="content" placeholder="Input Content" name="content"></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label for="price" class="col-lg-2 control-label">Price</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="price" placeholder="Input price" name="price" onkeypress="return numbersonly(event)"/>
			</div>
		</div>			
		<div class="form-group">
			<label for="category" class="col-lg-2 control-label">Category</label>
			<div class="col-lg-10">
			<select class="form-control" id = 'cate' name ='cate'>
				<option></option>
				@foreach($cates as $cate)
				<option  value = '{!! $cate->id !!}' >{!! $cate->name!!}</option>
				@endforeach
			</select>
			</div>
		</div>
		
		<div class="form-group">
			<label for="price" class="col-lg-2 control-label">Check Category</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="category" placeholder="Input Category" name="category"/>
			</div>
		</div>
		
		<div class="form-group">
			<label for="price" class="col-lg-2 control-label">Manufactured Date</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="manu_date" placeholder="Input Date" name="manu_date"/>
			</div>
		</div>
		
		<div class="form-group">
			<label for="image" class="col-lg-2 control-label">Product Image</label>
			<div class="col-lg-10">
			<input type="file" id="image" name="image" onchange="readURL(this);">
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

@endsection
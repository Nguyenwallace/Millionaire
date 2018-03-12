@extends('master')
@section('title', 'Add new product')
@section('headerscript')
<script src = "{!! asset('js/product.js') !!}"></script>
@endsection		
@section('content')
	<div class="container col-md-8 col-md-offset-2">
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
		<legend>Adding new category</legend>
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Name</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="name" placeholder="Input name" name="name"/>
			</div>
		</div>
		

		<div class="form-group">
			<label for="category" class="col-lg-2 control-label">Parent Category</label>
			<div class="col-lg-10">
			<select class="form-control" id = 'parent_id' name ='parent_id'>
				<option></option>
				@foreach($cates as $cate)
				<option  value = '{!! $cate->id !!}' >{!! $cate->name!!}</option>
				@endforeach
			</select>
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
@extends('master')
@section('title', 'all customer')
@section('headerscript')
<script src= "{!! asset('js/customer.js') !!}"></script>
@endsection
@section('topbar')

<nav class="navbar navbar-default">
	<div class="container-fluid">		
		<!-- Navbar Right -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="" class="active">Home</a></li>
				<li><a href="{!!url('admin/customer/add')!!}">New Customer</a></li>
			    <li><a href="{!!url('admin/customer/all')!!}">List All Customer</a></li>  
				
			</ul>
		</div>
	</div>
</nav>
@endsection
@section('content')
<div class="container col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2> Customers </h2>				
				<form class="form-horizontal" method="post" action="{!! url('admin/customer/all')!!}">
					@foreach ($errors->all() as $error)
					<p class="alert alert-danger">{{ $error }}</p>
					@endforeach
					@if (session('status'))
					<div class="alert alert-success">
					{{ session('status') }}
					</div>
					@endif
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">						
						<div class="panel-heading">
							<label for="page" class="control-label">Number per page</label>							
							<input type="text" placeholder="Please input" name="perpage"/>	
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
				</form>
			</div>			
			@if ($customers->isEmpty())
			<p> There is customer.</p>
			@else
			<table class="table">
				<thead>
				<tr>
					<th>Item</th>
					<th>Name</th>
					<th>Address</th>
					<th>Email</th>
					<th>Telephone</th>
					<th><a href='{!! action("CustomerController@show", "1")!!}'>Delete All</a></th>
				</tr>
				</thead>
				<tbody>
				<?php $item=1; ?>
					@foreach($customers as $customer)
					<tr>
						<td>{!! $item !!} </td>
						<td>
						<a href='{!! action("CustomerController@show", $customer->id) !!}'>{!! $customer->name !!} </a>
						</td>
						<td>{!! $customer->address !!}</td>
						<td>{!! $customer->email !!}</td>
						<td>{!! $customer->telephone !!}</td>
						<td>
						<a href="{!! action('CustomerController@delete', $customer->id) !!}" onclick="return confirm('Bạn chắc chắn muốn xóa?');">delete </a>
						</td>
					</tr>
				<?php $item=$item+1; ?>
					@endforeach					
				</tbody>				
			</table>
			{{ $customers->links() }}
			@endif
		</div>
	</div>

<div class="container col-md-2">
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

@extends('master')
@section('title', 'all product')
@section('headerscript')
<script src= "{!! asset('js/product.js') !!}}"></script>
@endsection
@section('topbar')
<nav class="navbar navbar-default">
  <div class="container-fluid">    
    <ul class="nav navbar-nav">
	  <li><a href="" class="active">Home</a></li>
	  <li><a href="{!!url('admin/product/add')!!}">New Product</a></li>
      <li><a href="{!!url('admin/product/all')!!}">List All Product</a></li>      
    </ul>
  </div>
</nav>
@endsection
@section('content')

<div class="container col-md-10 col-md-offset-0 fl">
		<div class="panel panel-default">
			<div class="panel-heading">
			<h2> Products </h2></div>
			@if (session('status'))
				<div class="alert alert-success">
				{{ session('status') }}
				</div>
			@endif
			@if ($products->isEmpty())
			<p> There is product.</p>
			@else
			<table class="table">
				<thead>
				<tr>
					<th>Item</th>
					<th>Name</th>
					<th>Price</th>
					<th><a href="{!! action('ProductController@delete') !!}">Delete All </a></th>
				</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					@foreach($products as $product)
					<tr>
						<td>{!! $i !!} </td>
						<td>
						<a href="{!! action('ProductController@show', $product->id) !!}">{!! $product->name !!} </a>
						</td>
						<td>{!! $product->price !!}</td>
						<td>
						<a href="{!! action('ProductController@delete', $product->id) !!}" onclick="return confirm('Bạn chắc chắn muốn xóa?');">delete </a>
						</td>
						<?php $i++; ?>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div>
@endsection
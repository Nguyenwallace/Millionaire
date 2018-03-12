@extends('master')
@section('title', 'all stocks')
@section('headerscript')
<script src= "{!! asset('js/customer.js') !!}}"></script>
@endsection
@section('topbar')
<nav class="navbar navbar-default">
  <div class="container-fluid">    
    <ul class="nav navbar-nav">
	  <li><a href="{!!url('admin/stock/all')!!}">Stock Management</a></li>
      <li><a href="{!!url('admin/stock/add')!!}">Add Stock</a></li>
      
    </ul>
  </div>
</nav>
@endsection
@section('content')
<div class="container col-md-10 col-md-offset-0 fl">
		<div class="panel panel-default">
			<div class="panel-heading">
			<h2> Stock </h2></div>
			@if (session('status'))
				<div class="alert alert-success">
				{{ session('status') }}
				</div>
			@endif
			@if ($stocks->isEmpty())
			<p> There is No Product Available.</p>
			@else
			<table class="table">
				<thead>
				<tr>
					<th>Item</th>
					<th>Name</th>
					<th>Quantity Available</th>								
				</tr>
				</thead>
				<tbody>	
					<?php $i= 1; ?>
					@for($j=0; $j<count($stocks); $j++)				
					<tr>
						<td>{!! $i !!} </td>						
						<td>{!! $products[$j]->name !!}</td>
						<td>{!! $stocks[$j]->quantity !!}</td>
						<?php $i++; ?>						
					</tr>
					@endfor
				</tbody>
			</table>
			@endif
		</div>
	</div>
@endsection
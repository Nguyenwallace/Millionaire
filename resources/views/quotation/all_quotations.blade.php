@extends('master')
@section('title', 'all quotes')
@section('headerscript')
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

<div class="container col-md-10  fl">
		<div class="panel panel-default">
			<div class="panel-heading">
			<h2> Quotation </h2></div>
			@if (session('status'))
				<div class="alert alert-success">
				{{ session('status') }}
				</div>
			@endif
			@if ($quotes->isEmpty())
			<p> There is No Quotation.</p>
			@else
			<table class="table">
				<thead>
				<tr>
					<th>Item</th>
					<th>Quote Number</th>					
					<th>View & Update</th>
					<th>Customer Email</th>
					<th>Grand Total Amount</th>
					<th>Quoted Date</th>
					<th>Updated Date</th>
					<th><a href="{!! action('QuotationController@deleteAll') !!}" onclick="return confirm('Bạn chắc chắn muốn xóa tất cả báo giá?');">Delete All</a></th>
				</tr>
				</thead>
				<tbody>
					<?php $item=1; ?>
					@foreach($quotes as $quote)
					<tr>
						<td>{!! $item !!} </td>
						<td>{!! $quote->quote_number !!}</td>
						<td>
						<a href="{!! action('QuotationController@show', $quote->id) !!}">view & Update </a>
						</td>
						<td>{!! $quote->cusEmail !!}</td>
						<td>{!! $quote->amount*(1- $quote->discount/100)*(1+$quote->tax/100)!!} </td>
						<td>{!! $quote->quoted_date !!} </td>
						<td>{!! $quote->updated_at !!} </td>
						<td>
						<a href="{!! action('QuotationController@delete', $quote->id) !!}" onclick="return confirm('Bạn chắc chắn muốn xóa?');">delete </a>
						</td>
						<?php $item++; ?>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div>
@endsection
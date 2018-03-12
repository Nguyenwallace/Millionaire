<!DOCTYPE html>
<html>
<head>
<title> @yield('title') </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/jquery-ui.js') !!}"></script>
@yield('headerscript')
<link rel="stylesheet" href="{!! asset('css/bootstrap.min.css')!!}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{!! asset('css/style.css')!!}">
<link rel="stylesheet" href="{!! asset('css/bootstrap-theme.min.css') !!}">	
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery-1.12.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{!! asset('js/jquery-1.12.4.js') !!}"></script>
-->
</head>
<body>
@include('navbar')
@yield('topbar')
<div class="row">
<div class="navbar navbar-default col-md-2 vertical-menu ">
	  <a href="" >Home</a>
	  <a href="{!!url('admin/quotation/all')!!}">Quotation</a>
      <a href="{!!url('admin/quotation/all')!!}">Order</a>	  
	  <a href="{!!url('admin/stock/all')!!}">Inventory</a>
      <a href="{!!url('admin/product/all')!!}">Product</a>
      <a href="{!!url('admin/customer/all')!!}">Customer</a>
      <a href="{!!url('admin/supplier/all')!!}">Supplier</a>      
      <a href="{!!url('admin/quotation/report')!!}">Sales Report & Analyse</a>
</div>	
@yield('content')
</div>
<div class="panel-footer">
	<p align="center">Software are Created And Developed By <b>INTSAMA</b> </p>
</div>
</body>
</html>
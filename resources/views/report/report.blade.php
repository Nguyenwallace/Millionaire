@extends('master2')
@section('title', 'Báo cáo')
@section('headscript')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="{!! asset('js/jquery-ui.js') !!}"></script>
<!--<script src="{{ asset('js/quotation.js') }}"></script>-->
<script src="{!! asset('js/jquery.canvasjs.min.js') !!}"></script>
<!--<script src="{!! asset('js/report.js') !!}"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection	

<script>

window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Tổng quan gần đấy"
	},
	data: [{
		type: "pie",
		//showInLegend:"true",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
		<?php $sum = 0; ?>
		@foreach ($quotes as $quote) 
			<?php $sum += $quote->amount; ?>
		@endforeach
		@foreach ($quotes as $quote) 
			{y: {!! $quote->amount /$sum*100!!}, label: "{!! $quote->quoted_date !!}" },	
		@endforeach
		]
		
	}]
});

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,	
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Doanh số gần đây"
	},
	axisY: {
		title: "Đơn vị VND"
	},
	data: [{        
		type: "line",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "MD = Triệu Đồng",
		dataPoints: [		
		@foreach ($quotes as $quote) 
			{y: {!! $quote->amount!!}, label: "{!! $quote->quoted_date !!}" },	
		@endforeach
		]
	}]
});
var chart2 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	title:{
		text: "Doanh số gần đây",
		horizontalAlign: "center"
	},
	data: [{
		type: "doughnut",
		startAngle: 240,
		innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
		<?php $sum = 0; ?>
		@foreach ($quotes as $quote) 
			<?php $sum += $quote->amount; ?>
		@endforeach
		@foreach ($quotes as $quote) 
			{y: {!! $quote->amount /$sum*100!!}, label: "{!! $quote->quoted_date !!}" },	
		@endforeach
		]
		
	}]
});
var chart3 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,	
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Doanh số gần đây"
	},
	axisY: {
		title: "Đơn vị VND"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "MD = Triệu Đồng",
		dataPoints: [		
		@foreach ($quotes as $quote) 
			{y: {!! $quote->amount!!}, label: "{!! $quote->quoted_date !!}" },	
		@endforeach
		]
	}]
});
chart.render();
chart1.render();
chart2.render();
chart3.render();

}
</script>

@section('content')
@include('jsblade/jsreport')
<div id="page-wrapper">
			<div id="topbar">
				<nav class="navbar navbar-default">
					  <div class="container-fluid">						
						<ul class="nav navbar-nav">
							<li><a href="#" ><b>Tổng Quan</b></a></li>						
						  <li><a href="#"><b>Báo cáo theo ngày</b></a></li>
						  <li><a href="#"><b>Báo cáo theo tháng</b></a></li>					  
						</ul>
					  </div>
				</nav>
			</div>
	<div class="row"> 
		<div class="col-lg-12">
                    <div class="panel panel-default">
					<div class="panel-heading">
                           <b> Bảng Liệt Kê Báo cáo</b>						   
                     </div>
					<div class="panel-body">						
							@foreach ($errors->all() as $error)
							<p class="alert alert-danger">{{ $error }}</p>
							@endforeach
							@if (session('status'))
							<div class="alert alert-success">
							{{ session('status') }}
							</div>
							@endif	
					<fieldset>							
								<div class="container col-md-12">
								<legend><p style="color:red;">Báo cáo tháng</p></legend>
								</div>
					</fieldset>
	<div class="container col-md-6">
		<div id="chartContainer2" style="height: 350px; width: 100%;"></div>
		<div id="chartContainer1" style="height: 350px; width: 100%;"></div>
	</div>
	<div class="container col-md-6">		
		<div id="chartContainer" style="height: 350px; width: 100%;"></div>
		<div id="chartContainer3" style="height: 350px; width: 100%;"></div>
	</div>

	<div class="container col-md-4">
		<form class="form-horizontal" method="post">
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
			<legend>Chọn khoản thời gian</legend>
			<div class="form-group">
				<label for="name" class="col-lg-2 control-label">Từ:</label>
				<div class="col-lg-10">
				<input type="text" class="form-control" id="dateFrom" placeholder="Ngày bắt đầu" name="dateFrom" />
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-lg-2 control-label">Đến:</label>
				<div class="col-lg-10">
				<input type="text" class="form-control" id="dateTo" placeholder="Ngày cuối" name="dateTo" />
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-lg-2 control-label"></label>
				<div class="col-lg-10">
				<input type="text" class="form-control" id="customer" placeholder="Chọn khách hàng" name="customer" />
				</div>
			</div>	
			<div class="form-group">
				<div class="col-lg-10">
					<button class="btn btn-default">Bỏ chọn</button>
					<button type="submit" class="btn btn-primary">Lựu chọn</button>
				</div>
			</div>		
		</fieldset>
	</form>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
@endsection
@extends('master')
@section('title', 'quotation report')
@section('headerscript')
<script src="{!! asset('js/jquery.canvasjs.min.js') !!}"></script>
<script src="{!! asset('js/report.js') !!}"></script>
@endsection	
@section('topbar')
<nav class="navbar navbar-default">
  <div class="container-fluid">    
    <ul class="nav navbar-nav">
	  <li><a href="" class="active">Home</a></li>
	  <li><a href="{!!url('admin/quotation/report')!!}">Quotation recently</a></li>
      <li><a href="{!!url('admin/quotation/report')!!}">PO Recently</a></li>      
    </ul>
  </div>
</nav>
@endsection		
@section('content')
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Overview Percentage Sales recently"
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
		text: "Sales Recently"
	},
	axisY: {
		title: "Amount in USD"
	},
	data: [{        
		type: "line",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "MD = one million Dollars",
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
		text: "Sales Recently",
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
		text: "Sales Recently"
	},
	axisY: {
		title: "Amount in USD"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "MD = one million Dollars",
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

	<div class="container col-md-4 col-md-offset-0 fl">
		<div id="chartContainer" style="height: 350px; width: 100%;"></div>
		<div id="chartContainer1" style="height: 350px; width: 100%;"></div>
	</div>
	<div class="container col-md-4 col-md-offset-0 fl">
		<div id="chartContainer2" style="height: 350px; width: 100%;"></div>
		<div id="chartContainer3" style="height: 350px; width: 100%;"></div>
	</div>

<div class="container col-md-2 col-md-offset-0 fl">
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
		<legend>Select Date</legend>
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Fr:</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="dateFrom" placeholder="From" name="dateFrom" />
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">To:</label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="dateTo" placeholder="To" name="dateTo" />
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label"></label>
			<div class="col-lg-10">
			<input type="text" class="form-control" id="customer" placeholder="Select Customer" name="customer" />
			</div>
		</div>	
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary">Select</button>
			</div>
		</div>		
	</fieldset>
</form>
</div>

@endsection
@extends('master2')
@section('title', 'All users')
@section('headscript')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
@include(('jsblade/jsuser'))
<div id="page-wrapper">
<div class = "row">
	<div class="container col-md-12 col-md-offset-0">
	<div class="panel panel-default">
	<div class="panel-heading">
	<h2> Tất cả người dùng </h2>
	</div>
	@if (session('status'))
	<div class="alert alert-success">
	{{ session('status') }}
	</div>
	@endif
	@if ($users->isEmpty())
	<p> There is no user.</p>
	@else
		<table class="table table-bordered table-responsive">
		<thead>
		<tr>
		<th>STT</th>
		<th>Tên</th>
		<th>Email</th>
		<th>Ngày tham gia</th>
		<th>Edit</th>
		</tr>
		</thead>
		<tbody>
		<?php $item=0 ?>
		@foreach($users as $user)
			<?php $item+=1 ?>
		<tr>
		<td><p name="item[]">{!! $item !!}</p></td>			
		<td>
		<a href="">{!! $user->name !!} </a>
		</td>
		<td>{!! $user->email !!}</td>
		<td>{!! $user->created_at !!}</td>		
		<td> <div class="dropdown">
											<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-eye-open"></span>
											<span class="caret"></span></button>
											<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
											  <li role="presentation"><a role="menuitem" class= "btn btn-primary" tabindex="-1" target="_blank" href="{!! action('UserController@show', $user->id) !!}">Cập nhật</a></li>								  
											  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id= "but{{$user->id}}" class = "btn btn-danger"  role="menuitem" tabindex="-1" onclick ="deleteuser('{{$user->id}}');">Xóa</a></li>
											  <!-- 
											  <li role="presentation"><input type="button" id= "but{{$user->id}}"
											  value="Xóa" class="btn btn-danger" role="menuitem" tabindex="-1" onclick ="deleteuser('{{$user->id}}');" /></li>
											  <li role="presentation"><a role="menuitem" tabindex="-1" href="{!! action('QuotationController@delete', $user->id) !!}" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a></li>
											  -->
											  <li role="presentation"><a role="menuitem" class= "btn btn-success" tabindex="-1" href="#">Chọn thêm</a></li>										  
											</ul>
										  </div></td>
		 </tr>
		@endforeach
		<input type="hidden" id="hiddenItem" value = '{{$item}}'>
		</tbody>
		</table>
	@endif
	</div>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Đăng ký User mới (Boostrap Modal)</button>
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h3 class="modal-title" id="exampleModalLabel">Thêm User mới</h3>
										<div id="adduser">
										<form class="form-horizontal" method="post" action="{!!url('manager/newuser')!!}" enctype="multipart/form-data">	
											<input type="hidden" name="_token" value="{!! csrf_token() !!}">
											<fieldset>
												<legend></legend>
												<div class="form-group">
												<label for="name" class="col-lg-2 control-label">Tên</label>
												<div class="col-lg-10">
												<input type="text" class="form-control" id="name" placeholder="Name" name="name"
												value="">
												</div>
												</div>
												<div class="form-group">
												<label for="email" class="col-lg-2 control-label">Email</label>
												<div class="col-lg-10">
												<input type="email" class="form-control" id="email" placeholder="Email" name="email"
												value="">
												</div>
												</div>
												<div class="form-group">
												<label for="select" class="col-lg-2 control-label">Vai trò</label>
												<div class="col-lg-10">
												<select class="form-control" id="role" name="role">
												@foreach($roles as $role)
												<option value="{!! $role->name !!}">{!! $role->name !!}</option>
												@endforeach
												</select>
												</div>
												</div>
												<div class="form-group">
												<label for="password" class="col-lg-2 control-label">Mật khẩu</label>
												<div class="col-lg-10">
												<input type="password" class="form-control" name="password">
												</div>
												</div>
												<div class="form-group">
												<label for="password" class="col-lg-2 control-label">Xác nhận mật khẩu</label>
												<div class="col-lg-10">
												<input type="password" class="form-control" name="password_confirmation">
												</div>
												</div>
												<div class="form-group">
												<div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default">Reset</button>
												<button type="submit" class="btn btn-primary">Đăng ký</button>
												</div>
												
											</fieldset>
										</form>
									</div>
							</div>									  									  
					</div>
			 </div>
		</div>
	
	</div>
	</div>
</div>
</div>
@endsection
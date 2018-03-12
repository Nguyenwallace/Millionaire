@extends('masterlogin')
@section('title', 'Thêm khách hàng mới')
@section('content')

<div id="addcustomer">
<form class="form-horizontal" method="post" action="{!!url('admin/customer/quickadd')!!}" enctype="multipart/form-data">	
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<fieldset>
		<legend>Đăng ký nhanh</legend>
		
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Tên:</label>
			<div class="col-lg-5">
			<input type="text" class="form-control" id="name" placeholder="Ví dụ: Nguyễn Văn A" name="name" size="35"/>			
			</div>			
		</div>
		
		<div class="form-group">
		  <label for="name" class="col-lg-2 control-label">Chọn Loại</label>
		 <div class="col-lg-5">
		 <select name="sel1" class="form-control">
			<option class="form-control">Khách tiềm năng</option>
			<option class="form-control">Khách từ đối thủ</option>
			<option class="form-control">3</option>
			<option class="form-control">4</option>
		  </select>
		  </div>
		</div>
		
		<div class="form-group">
			<label for="name" class="col-lg-2 control-label">Địa chỉ:</label>
			<div class="col-lg-5">
			<input type="text" class="form-control" id="address" placeholder="Ví dụ: 72 Nguyễn Thị Minh Khai, HCMC" name="address"/>
			</div>
		</div>
		
		<div class="form-group">
			<label for="price" class="col-lg-2 control-label">Điện Thoại:</label>
			<div class="col-lg-5">
			<input type="text" class="form-control" id="telephone" placeholder="ví dụ: 0909362806" name="telephone" onkeypress="return numbersonly(event)"/>
			</div>
			
		</div>
		
		<div class="form-group">
			
			<label for="name" class="col-lg-2 control-label">Email:</label>
			<div class="col-lg-5">
			<input type="text" class="form-control" id="email" placeholder="NguyenvanA@gmail.com" name="email"/>
			</div>
		</div>
				
		<div class="form-group">
			<label for="price" class="col-lg-2 control-label">Ngày tạo</label>
			<div class="col-lg-5">
			<input type="text" class="form-control" id="created_date" placeholder="10/12/2017" name="created_date"/>
			</div>
			
		</div>
		
		<div class="form-group">
			
			<label for="image" class="col-lg-2 control-label">Ảnh</label>
			<div class="col-lg-5">
				<input type="file" id="photo" name="photo" />	
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-5 col-lg-offset-2">				
				<button type="submit" class="btn btn-primary">Đăng ký</button>
			</div>
		</div>
	</fieldset>
</form>
</div>
@endsection

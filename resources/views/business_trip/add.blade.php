@extends('layouts.app')
@section('title','Thêm Công Tác')
@section('script')

<link rel="stylesheet" href="assets/css/jquery-ui.css">
<script src="assets/js/jquery-1.9.1.js"></script>
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
@endsection
@section('content')

<div class="create_leave">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Tạo Công Tác</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Công Tác</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Tạo Công Tác</li>
    </ol>
</div>

 <div class="page-content">
    <div id="form-layouts" class="row">
		<div class="col-lg-12">
		    <div style="background: transparent; border: 0; box-shadow: none !important"
		         class="tab-content pan mtl mbn responsive">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-blue">
	                    	<div class="panel-heading">Tạo Công Tác</div>
	                    	@if(session('thongbao'))
							    <div class="alert alert-success">
							        {{session('thongbao')}}
							    </div>
							@endif

							@if ( $errors->any() )
							    <div class="alert alert-danger">
							        @foreach($errors->all() as $err)
							            {{$err}}<br>
							        @endforeach
							    </div>
							@endif
	                        <div class="panel-body pan">
	                            <form action="business-trip/add" method="POST" class="form-horizontal form-seperated">
	                            	 <input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-body">
	                                	<div class="row">
	                                		<div class="col-md-6">
			                                    <div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Mã Nhân Viên </label>

			                                        <div class="col-md-9"><input id="username" type="text" name="username" placeholder="Nhập Mã Nhân Viên" class="form-control" autocomplete/></div>
			                                        <div id="user_preview"></div>
			                                    </div>
	                                    	</div>
	                                    	<div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Họ và Tên </label>

			                                        <div class="col-md-9"><input type="text" id="name" placeholder="Nhập Họ Tên" class="form-control" readonly/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Phòng Ban </label>

			                                        <div class="col-md-9"><input type="text" placeholder="Nhập Phòng Ban" id="department" class="form-control" readonly/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Chức Vụ </label>

			                                        <div class="col-md-9"><input type="text" placeholder="Nhập Chức Vụ" id="position" class="form-control" readonly /></div>
			                                    </div>
		                                    </div>
		                                    <hr/>
		                                    <div class="col-md-12">
		                                    	<div class="form-group">
			                                    	<label for="inputLastName" class="col-md-1 control-label">Lý Do <span class='require'>*</span>
			                                    	</label>

			                                        <div class="col-md-11">
			                                            <textarea class="form-control" rows="3" name="reason">{{old('reason')}}</textarea>
			                                        </div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Địa Điểm <span class='require'>*</span></label>

			                                        <div class="col-md-9"><input type="text" placeholder="Nhập Địa Điểm" name="place" class="form-control" value="{{old('place')}}" /></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Trợ Cấp <span class='require'>*</span> </label>

			                                        <div class="col-md-9"><input type="text" placeholder="Nhập Trợ Cấp" name="allowance" class="form-control" value="{{old('allowance')}}"/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Từ Ngày <span class='require'>*</span></label>

			                                        <div class="col-md-9">
			                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text" readonly="" class="form-control" name="from" value="{{old('from')}}"/><span
                                                    	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                            			</div>
			                                        </div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Đến Ngày <span class='require'>*</span></label>

			                                        <div class="col-md-9">
			                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text" readonly="" class="form-control" name="to" value="{{old('to')}}"/><span
                                                    	class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            			</div>
			                                        </div>
			                                    </div>
		                                    </div>
	                                    </div>
	                                </div>
	                                <div class="form-actions text-right pal">
	                                    <button type="submit" class="btn btn-info" id="btn_confirm">Thêm</button>
	                                    &nbsp;
	                                    <a href="business-trip" class="btn btn-green">Quay Lại</a>
	                                </div>
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
<script type="text/javascript">
	$('#username').autocomplete({
		source : '{!!URL::route('autocomplete')!!}',
		minlength: 1,
		autoFocus: true,
	});
	/*$(document).ready(function() {
		  $('#tablesorterX').DataTable();
		});*/
$(document).ready(function(){
	$('#username').blur(function(){
		var username = $('#username').val();
		if(username != '')
		{
			$.ajaxSetup(
			{
			    headers:
			    {
			        'X-CSRF-Token': $('input[name="_token"]').val()
			    }
			});

			$.ajax({
				url : "business-trip/ajax",
      			type: "POST",
      			data: {username:username},
      			success: function(data){
      				$('#name').val(data.name);
      				$('#department').val(data.department);
      				$('#position').val(data.position);
      			}
			});
		}
	});
	
});
</script>
@endsection
@extends('layouts.app')
@section('title','Thêm Nhân Viên')
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Thêm Nhân Viên</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Thêm Nhân Viên</li>
    </ol>
    <div class="clearfix"></div>
</div>
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
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<form action="employee/add" method="post" class="form-horizontal form-seperated">
 <input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="page-content">
<div id="form-layouts" class="row">
    <div class="col-lg-12">
    	<div style="background: transparent; border: 0; box-shadow: none !important"
		         class="tab-content pan mtl mbn responsive">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                    	<div class="panel-heading">Thông Tin Nhân Viên
							<button class="btn btn-info btn_access_save btn-sm" type="submit"><i class="fa fa-plus">&nbsp;Thêm</i></button>
							<a class="btn btn-info btn_access_save btn-sm" href="employee"><i class="fa fa-arrow-left">&nbsp;Quay Lại</i></a>
                    	</div>
                        <div class="panel-body pan">
                            <div  class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Họ và Tên <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Họ và Tên" name="name" class="form-control" value="{{old('name')}}" /></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Giới Tính </label>

		                                        <div class="col-md-9">
		                                        	<div class="col-md-2">
		                                        	<div class="radio">
														  <label><input type="radio" name="gender" checked value="1">Nam</label>
													</div>
													</div>
													<div class="col-md-2">
													<div class="radio">
														  <label><input type="radio" name="gender" value="0">Nữ</label>
													</div>
													</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Username <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Username" class="form-control" name="username" value="{{old('username')}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Ngày Sinh </label>

		                                        <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text" readonly="" class="form-control" name="birthday" value="{{old('birthday')}}"/><span
                                                    	class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Email <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Email" class="form-control" name="email" value="{{old('email')}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Ngày Vào Làm </label>

		                                       <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text" readonly="" class="form-control" name="joining_date" value="{{old('joining_date')}}"/><span
                                                    	class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Tên TK Ngân Hàng </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Tên TK Ngân Hàng" class="form-control" name="bank_name" value="{{old('bank_name')}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Số TK Ngân Hàng </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Số TK Ngân Hàng" class="form-control" name="bank_account_name" value="{{old('bank_account_name')}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Quốc Tịch </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Quốc Tịch" class="form-control" name="nationality" value="{{old('nationality')}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Dân Tộc </label>

		                                       <div class="col-md-9">
		                                        	<input type="text" placeholder="Nhập Dân Tộc" class="form-control" name="ethnic" value="{{old('ethnic')}}"/>
		                                        </div>
		                                    </div>
	                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                    	<div class="panel-heading">Thông Tin Liên Hệ</div>
                        <div class="panel-body pan">
                            <div class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ Thường Trú </label>

		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ Thường Trú" class="form-control" name="permanent_address" value="{{old('permanent_address')}}"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ Hiện Tại</label>
	
		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ Hiện Tại" class="form-control" name="present_address" value="{{old('present_address')}}"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Số Điện Thoại </label>

		                                        <div class="col-md-8"><input type="text" placeholder="Nhập Số Điện Thoại" class="form-control" name="phone_number" value="{{old('phone_number')}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Số CMND </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Số CMND" class="form-control" name="CMND" value="{{old('CMND')}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Ngày Cấp CMND </label>

		                                        <div class="col-md-8">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text" readonly="" class="form-control" name="date_CMND" value="{{old('date_CMND')}}"/><span
                                                    	class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Nơi Cấp CMND </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Nơi Cấp CMND" class="form-control" name="address_CMND" value="{{old('address_CMND')}}"/></div>
		                                    </div>
	                                    </div>
	                                    

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
	        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                    	<div class="panel-heading">Công Việc</div>
                        <div class="panel-body pan">
                            <div action="#" class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Phòng Ban </label>

		                                        <div class="col-md-8"> 
		                                        	<select class="form-control" name="department">
		                                        	@foreach($department as $de)
													    <option value="{{$de['id']}}">{{$de['name']}}</option>
													@endforeach
												  	</select>
												</div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Chức Vụ</label>
	
		                                        <div class="col-md-10">
		                                        	<select class="form-control" name="position">
		                                        	@foreach($position as $po)
													    <option value="{{$po['id']}}">{{$po['name']}}</option>
													@endforeach
												  	</select>
		                                        </div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Chuyên Môn </label>

		                                        <div class="col-md-8">
		                                        	<select class="form-control" name="job_type">
		                                        	@foreach($jobtype as $jt)
													    <option value="{{$jt['id']}}">{{$jt['name']}}</option>
													@endforeach
												  	</select>
		                                        </div>
		                                    </div>
	                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
	         <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                    	<div class="panel-heading">Thông Tin Liên Hệ Người Thân	</div>
                        <div class="panel-body pan">
                            <div action="#" class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Họ và Tên </label>

		                                        <div class="col-md-8"><input type="text" placeholder="Nhập Họ và Tên" class="form-control" name="relative_name" value="{{old('relative_name')}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Số Điện Thoại </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Số Điện Thoại" class="form-control" name="relative_phone_number" value="{{old('relative_phone_number')}}"/></div>
		                                    </div>
	                                    </div>
                                    	<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ </label>
	
		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ " class="form-control" name="relative_address" value="{{old('relative_address')}}"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Mối Quan Hệ </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Mối Quan Hệ" class="form-control" name="relative_relation" value="{{old('relative_relation')}}"/></div>
		                                    </div>
	                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
        </div>
    </div>
</div>
</div>
</form>
@endsection
@extends('layouts.app')
@section('title','Sửa Nhân Viên')
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Sửa Nhân Viên</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Sửa Nhân Viên</li>
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
<form action="employee/edit/{{$user['id']}}" method="post" class="form-horizontal form-seperated">
 <input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="page-content">
<div id="form-layouts" class="row">
    <div class="col-lg-12">
    	<div style="background: transparent; border: 0; box-shadow: none !important"
		         class="tab-content pan mtl mbn responsive">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-blue">
                    	<div class="panel-heading">Thông Tin Nhân Viên
							<button class="btn btn-info btn_access_save btn-sm" type="submit"><i class="fa fa-floppy-o">&nbsp;Lưu</i></button>
							<a class="btn btn-info btn_access_save btn-sm" href="employee"><i class="fa fa-arrow-left">&nbsp;Quay Lại</i></a>
                    	</div>
                        <div class="panel-body pan">
                            <div class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Họ và Tên <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Họ và Tên" name="name" class="form-control" value="{{$user['name']}}" /></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Giới Tính </label>

		                                        <div class="col-md-9">
		                                        	<div class="col-md-2">
		                                        	<div class="radio">
														  <label><input type="radio" value="1" name="gender" 
														  	@if($user['gender'] == 1)
																checked
															@endif 
														  >Nam</label>
													</div>
													</div>
													<div class="col-md-2">
													<div class="radio">
														  <label><input type="radio" value="0" name="gender"
															@if($user['gender'] == 0)
																checked
															@endif 
														  >Nữ</label>
													</div>
													</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Username <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Username" class="form-control" name="username" value="{{$user['username']}}" /></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Ngày Sinh <span class='require'>*</span></label>

		                                        <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text" name="birthday" readonly="" class="form-control"  value=
																"{{ $user['date_of_birth'] == null ? '' : Carbon\Carbon::parse($user['date_of_birth'])->format('d/m/Y') }}"
 
															
                                                 		/><span
                                                    	class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Email <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Email" class="form-control" name="email" value="{{$user['email']}}" /></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Ngày Vào Làm </label>

		                                       <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text" readonly="" class="form-control" name="joining_date" 
															value=
																"{{ $user['joining_date'] == null ? '' : Carbon\Carbon::parse($user['joining_date'])->format('d/m/Y') }}"
 
                                                 		/><span
                                                    	class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Tên TK Ngân Hàng </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Tên TK Ngân Hàng" class="form-control" name="bank_name" value="{{$user['bank_name']}}" /></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Số TK Ngân Hàng </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Số TK Ngân Hàng" class="form-control" name="bank_account_name" value="{{$user['bank_account_name']}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Quốc Tịch </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Quốc Tịch" class="form-control" name="nationality" value="{{$user['nationality']}}" /></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Dân Tộc </label>

		                                       <div class="col-md-9">
		                                        	<input type="text" placeholder="Nhập Dân Tộc" class="form-control" name="ethnic" value="{{$user['ethnic']}}"/>
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
                    <div class="panel panel-blue">
                    	<div class="panel-heading">Thông Tin Liên Hệ</div>
                        <div class="panel-body pan">
                            <div class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ Thường Trú <span class='require'>*</span></label>

		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ Thường Trú" class="form-control" name="permanent_address" value="{{$user['permanent_address']}}"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ Hiện Tại<span class='require'>*</span></label>
	
		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ Hiện Tại" class="form-control" name="present_address" value="{{$user['present_address']}}"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Số Điện Thoại </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Số Điện Thoại" class="form-control" name="phone_number" value="{{$user['phone_number']}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Số CMND <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="Nhập Số CMND" class="form-control" name="CMND" value="{{$user['CMND']}}"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Ngày Cấp CMND <span class='require'>*</span></label>

		                                        <div class="col-md-8">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text" readonly="" class="form-control" name="date_CMND" value=
																"{{ $user['date_CMND'] == null ? '' : Carbon\Carbon::parse($user['date_CMND'])->format('d/m/Y') }}" 

                                                 		 /><span
                                                    	class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Nơi Cấp CMND <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="Nhập Nơi Cấp CMND" class="form-control" name="address_CMND" value="{{$user['address_CMND']}}"/></div>
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
                    <div class="panel panel-blue">
                    	<div class="panel-heading">Công Việc</div>
                        <div class="panel-body pan">
                            <div class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Phòng Ban </label>

		                                        <div class="col-md-8"> 
		                                        	<select class="form-control" name="department">
													@foreach($department as $de)
													    <option value="{{$de['id']}}"
															@if($de['id'] == $user->UserDepartment['department_id'])
																selected
															@endif 
													    >{{$de['name']}}</option>
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
													    <option value="{{$po['id']}}"
															@if($po['id'] == $user->UserPositionJobtype['position_id'])
																selected
															@endif 
													    >{{$po['name']}}</option>
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
													    <option value="{{$jt['id']}}"
															@if($jt['id'] == $user->UserPositionJobtype['jobtype_id'])
																selected
															@endif 
													    >{{$jt['name']}}</option>
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
                    <div class="panel panel-blue">
                    	<div class="panel-heading">Thông Tin Liên Hệ Người Thân	</div>
                        <div class="panel-body pan">
                            <div class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Họ và Tên </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Họ và Tên" class="form-control" name="relative_name" value="{{$user->EmployeeRelative['full_name']}}" /></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Số Điện Thoại </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Số Điện Thoại" class="form-control" name="relative_phone_number" value="{{$user->EmployeeRelative['phone_number']}}"/></div>
		                                    </div>
	                                    </div>
                                    	<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ </label>
	
		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ " class="form-control" name="relative_address" value="{{$user->EmployeeRelative['address']}}"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Quan Hệ </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Quan Hệ" class="form-control" name="relative_relation" value="{{$user->EmployeeRelative['relation']}}"/></div>
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
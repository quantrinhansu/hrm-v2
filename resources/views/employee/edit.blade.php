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
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
<div id="form-layouts" class="row">
    <div class="col-lg-12">
    	<div style="background: transparent; border: 0; box-shadow: none !important"
		         class="tab-content pan mtl mbn responsive">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                    	<div class="panel-heading">Thông Tin Nhân Viên</div>
                        <div class="panel-body pan">
                            <form action="#" class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Họ và Tên <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Họ và Tên" name="name" class="form-control"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Giới Tính </label>

		                                        <div class="col-md-9">
		                                        	<div class="col-md-2">
		                                        	<div class="radio">
														  <label><input type="radio" name="gender" checked>Nam</label>
													</div>
													</div>
													<div class="col-md-2">
													<div class="radio">
														  <label><input type="radio" name="gender">Nữ</label>
													</div>
													</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Username <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Username" class="form-control" name="username"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Ngày Sinh <span class='require'>*</span></label>

		                                        <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text"
                                                                                                       readonly=""
                                                                                                       class="form-control"/><span
                                                    	class="input-group-addon" name="birthday"><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Email <span class='require'>*</span></label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Email" class="form-control" name="email"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Ngày Vào Làm <span class='require'>*</span></label>

		                                       <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text"
                                                                                                       readonly=""
                                                                                                       class="form-control"/><span
                                                    	class="input-group-addon" name="joining_date"><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Tên TK Ngân Hàng </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Tên TK Ngân Hàng" class="form-control" name="bank_name"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Số TK Ngân Hàng </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Số TK Ngân Hàng" class="form-control" name="bank_account_name"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Quốc Tịch </label>

		                                        <div class="col-md-9"><input type="text" placeholder="Nhập Quốc Tịch" class="form-control" name="nationality"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Dân Tộc </label>

		                                       <div class="col-md-9">
		                                        	<input type="text" placeholder="Nhập Dân Tộc" class="form-control" name="ethnic"/>
		                                        </div>
		                                    </div>
	                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
	        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                    	<div class="panel-heading">Thông Tin Liên Hệ</div>
                        <div class="panel-body pan">
                            <form action="#" class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ Thường Trú </label>

		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ Thường Trú" class="form-control" name="permanent_address"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ Hiện Tại</label>
	
		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ Hiện Tại" class="form-control" name="present_address"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Số Điện Thoại </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Số Điện Thoại" class="form-control" name="phone_number"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Số CMND </label>

		                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="Nhập Số CMND" class="form-control" name="CMND"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Ngày Cấp CMND </label>

		                                        <div class="col-md-8">
		                                        	<div data-date-format="dd/mm/yyyy"
                                                 		class="input-group date datepicker-filter mbs">
                                                 		<input type="text"
                                                                                                       readonly=""
                                                                                                       class="form-control"/><span
                                                    	class="input-group-addon" name="date_CMND"><i class="fa fa-calendar"></i></span>
                                            		</div>
		                                        </div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-3 control-label"> Nơi Cấp CMND </label>

		                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="Nhập Nơi Cấp CMND" class="form-control" name="address_CMND"/></div>
		                                    </div>
	                                    </div>
	                                    

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
	        </div>
	        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                    	<div class="panel-heading">Công Việc</div>
                        <div class="panel-body pan">
                            <form action="#" class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Phòng Ban </label>

		                                        <div class="col-md-8"> 
		                                        	<select class="form-control" name="department">
													    <option>1</option>
													    <option>2</option>
												  	</select>
												</div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Chức Vụ</label>
	
		                                        <div class="col-md-10">
		                                        	<select class="form-control" name="position">
													    <option>1</option>
													    <option>2</option>
												  	</select>
		                                        </div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Chuyên Môn </label>

		                                        <div class="col-md-8">
		                                        	<select class="form-control" name="job_type">
													    <option>1</option>
													    <option>2</option>
												  	</select>
		                                        </div>
		                                    </div>
	                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
	        </div>
	         <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                    	<div class="panel-heading">Thông Tin Liên Hệ Người Thân	</div>
                        <div class="panel-body pan">
                            <form action="#" class="form-horizontal form-seperated">
                                <div class="form-body">
                                	<div class="row">
                                		<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Họ và Tên </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Họ và Tên" class="form-control" name="relative_name"/></div>
		                                    </div>
	                                    </div>
	                                    <div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Số Điện Thoại </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Số Điện Thoại" class="form-control" name="relative_phone_number"/></div>
		                                    </div>
	                                    </div>
                                    	<div class="col-md-12">
		                                    <div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-2 control-label"> Địa Chỉ </label>
	
		                                        <div class="col-md-10"><input type="text" placeholder="Nhập Địa Chỉ " class="form-control" name="relative_address"/></div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-6">
	                                    	<div class="form-group">
		                                    	<label for="inputFirstName" class="col-md-4 control-label"> Quan Hệ </label>

		                                        <div class="col-md-8"><input id="inputFirstName" type="text" placeholder="Nhập Quan Hệ" class="form-control" name="relative_relation"/></div>
		                                    </div>
	                                    </div>
                                    </div>
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

@endsection
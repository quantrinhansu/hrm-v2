@extends('layouts.app')
@section('title','Tạo Hợp Đồng')
@section('content')
 
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Tạo Hợp Đồng</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Tạo Hợp Đồng</li>
    </ol>
   
</div>
<form action="" method="get">
<div class="page-content">
    <div id="form-layouts" class="row">
        <div class="col-lg-12">
            <div style="background: transparent; border: 0; box-shadow: none !important"
                 class="tab-content pan mtl mbn responsive">
                <div id="tab-form-actions" class="tab-pane fade active in">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-blue">
                                <div class="panel-heading">Bên A</div>
                                <div class="panel-body pan">
                                    <div class="form-horizontal">
                                        <div class="form-body pal">
                                            <div class="form-group">
                                            	<label for="inputUsername" class="col-md-3 control-label">Đại Diện Công Ty Ký <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Nhập Họ Tên" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Ngày Sinh <span class='require'>*</span></label>

                                                <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                             		class="input-group date datepicker-filter mbs">
                                             		<input type="text" readonly="" class="form-control" name="from" value="{{old('from')}}"/><span
                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                        			</div>
			                                    </div>
                                            </div>
                                            <div class="form-group">
                                            	<label for="inputUsername" class="col-md-3 control-label">Số CMND <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Nhập Số CMND" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputAddress" class="col-md-3 control-label">Ngày Cấp
                                                <span class='require'>*</span></label>

                                                <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                             		class="input-group date datepicker-filter mbs">
                                             		<input type="text" readonly="" class="form-control" name="from" value="{{old('from')}}"/><span
                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                        			</div>
		                                        </div>
                                            </div>
                                            <div class="form-group"><label for="inputAddress" class="col-md-3 control-label">Nơi Cấp
                                                <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Nhập Nơi Cấp" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group mbn"><label for="inputContent" class="col-md-3 control-label">Chức Vụ <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Username" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Địa Chỉ Nơi Cư Trú <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                	<textarea rows="8" class="form-control" placeholder="Nhập Địa Chỉ Nơi Cư Trú"></textarea>
                                                </div>
                                            </div>
                                    
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="panel panel-blue">
                                <div class="panel-heading">Bên B</div>
                                <div class="panel-body pan">
                                    <div class="form-horizontal">
                                        <div class="form-body pal">
                                            <div class="form-group">
                                            	<label for="inputUsername" class="col-md-3 control-label">Họ Tên Nhân Viên <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" name="name" placeholder="Nhập Họ Tên" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Ngày Sinh <span class='require'>*</span></label>

                                                <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                             		class="input-group date datepicker-filter mbs">
                                             		<input type="text" readonly="" class="form-control" name="bỉthday" value=""/><span
                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                        			</div>
		                                        </div>	
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Giới Tính <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                	<select name="gender" class="form-control">
                                                    <option value="">Male</option>
                                                    <option value="">Female</option>
                                                	</select>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                            	<label for="inputUsername" class="col-md-3 control-label">Số CMND <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" name="CMND" placeholder="Nhập Số CMND" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputAddress" class="col-md-3 control-label">Ngày Cấp
                                                <span class='require'>*</span></label>

                                                 <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                             		class="input-group date datepicker-filter mbs">
                                             		<input type="text" readonly="" class="form-control" name="date_CMND" value=""/><span
                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                        			</div>
		                                        </div>	
                                            </div>
                                            <div class="form-group"><label for="inputAddress" class="col-md-3 control-label">Nơi Cấp
                                                <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" name="place_CMND" placeholder="Nhập Nơi Cấp" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Nơi Đăng Ký Hộ Khẩu Thường Trú <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                	<textarea rows="3" placeholder="Nhập Nơi Đăng Ký Hộ Khẩu Thường Trú" class="form-control" name="permanent_address"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Chỗ Ở Hiện Nay <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                	<textarea name="present_address" rows="3" placeholder="Nhập Chỗ Ở Hiện Nay" class="form-control"></textarea>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-blue">
                                <div class="panel-heading">Thông Tin Hợp Đồng</div>
                                <div class="panel-body pan">
                                    <div class="form-horizontal">
                                        <div class="form-body pal">
                                            <div class="row">
                                             <h3>Công việc</h3>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputFirstName" class="col-md-3 control-label">Mã Hợp Đồng <span class='require'>*</span></label>

                                                        <div class="col-md-9"><input type="text" placeholder="Nhập Mã Hợp Đồng" class="form-control" name="code"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputLastName" class="col-md-3 control-label">Tên Hợp Đồng <span class='require'>*</span></label>

                                                        <div class="col-md-9"><input type="text" placeholder="Nhập Tên Hợp Đồng" class="form-control" name="name_contract"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputEmail" class="col-md-3 control-label">Chức Vụ<span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                        	<select class="form-control" name="position">
                                                            <option value="">Male</option>
                                                            <option value="">Female</option>
                                                        	</select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="selGender" class="col-md-3 control-label">Chuyên Môn<span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                        	<select class="form-control" name="jobtype">
                                                            <option value="">Male</option>
                                                            <option value="">Female</option>
                                                        	</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <h3>Thời hạn của hợp đồng lao động</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputBirthday" class="col-md-3 control-label">Loại Hợp Đồng</label>

                                                        <div class="col-md-9">
                                                        	<select class="form-control" name="type_contract">
                                                            <option value="">Male</option>
                                                            <option value="">Female</option>
                                                        	</select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputPhone" class="col-md-3 control-label">Ngày Bắt Đầu <span class='require'>*</span></label>

                                                        <div class="col-md-9">
				                                        	<div data-date-format="dd/mm/yyyy"
		                                             		class="input-group date datepicker-filter mbs">
		                                             		<input type="text" readonly="" class="form-control" name="start_contract" value=""/><span
		                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
		                                        			</div>
				                                        </div>	
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputPhone" class="col-md-3 control-label">Ngày Kết Thúc <span class='require'>*</span></label>

                                                        <div class="col-md-9">
				                                        	<div data-date-format="dd/mm/yyyy"
		                                             		class="input-group date datepicker-filter mbs">
		                                             		<input type="text" readonly="" class="form-control" name="end_contract" value="{{old('from')}}"/><span
		                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
		                                        			</div>
				                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                            <h3>Nghĩa vụ và quyền lợi của người lao động</h3>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputAddress1" class="col-md-3 control-label">Mức Lương Chính <span class='require'>*</span></label>

                                                        <div class="col-md-9"><input type="number" placeholder="Nhập Mức Lương Chính" class="form-control" name="salary" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    
                                                </div>
                                            </div>
                                            <h4>Phụ cấp</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputStates" class="col-md-3 control-label">Ăn Trưa <span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                        	<input id="inputStates" type="text" placeholder="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputCity" class="col-md-3 control-label">Điện Thoại <span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                        	<input id="inputCity" type="text" placeholder="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputPostCode" class="col-md-3 control-label">Xăng Xe <span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                        	<input id="inputPostCode" type="text" placeholder="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="selCountry" class="col-md-3 control-label">Nhà Ở <span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                        	<input id="inputPostCode" type="text" placeholder="" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions text-right pal">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            &nbsp;
                                            <button type="button" class="btn btn-green">Cancel</button>
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
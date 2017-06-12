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
<form action="contract/add/{{$user['id']}}" method="post">
 <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                                                    <input type="text" placeholder="Nhập Họ Tên" class="form-control" value="{{Auth::User()->name}}" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Ngày Sinh <span class='require'>*</span></label>

                                                <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                             		class="input-group date datepicker-filter mbs">
                                             		<input type="text" readonly="" class="form-control" name="from" value="{{Carbon\Carbon::parse(Auth::User()->date_of_birth)->format('d/m/Y')}}"/><span
                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                        			</div>
			                                    </div>
                                            </div>
                                            <div class="form-group">
                                            	<label for="inputUsername" class="col-md-3 control-label">Số CMND <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Nhập Số CMND" class="form-control" value="{{Auth::User()->CMND}}" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputAddress" class="col-md-3 control-label">Ngày Cấp
                                                <span class='require'>*</span></label>

                                                <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                             		class="input-group date datepicker-filter mbs">
                                             		<input type="text" readonly="" class="form-control" name="from" value="{{Carbon\Carbon::parse(Auth::User()->date_CMND)->format('d/m/Y')}}"/><span
                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                        			</div>
		                                        </div>
                                            </div>
                                            <div class="form-group"><label for="inputAddress" class="col-md-3 control-label">Nơi Cấp
                                                <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Nhập Nơi Cấp" class="form-control" value="{{Auth::User()->address_CMND}}" readonly />
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputContent" class="col-md-3 control-label">Chức Vụ <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" readonly value="{{Auth::User()->UserDepartment['user_id'] == null ? '' :Auth::User()->UserDepartment->Department['name']}}" />
                                                </div>
                                            </div>

                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Địa Chỉ Nơi Cư Trú <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                	<textarea rows="8" class="form-control" placeholder="Nhập Địa Chỉ Nơi Cư Trú" readonly>{{Auth::User()->present_address}}</textarea>
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
                                                    <input type="text" name="name" placeholder="Nhập Họ Tên" readonly class="form-control" value="{{$user['name']}}" />
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Ngày Sinh <span class='require'>*</span></label>

                                                <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                             		class="input-group date datepicker-filter mbs">
                                             		<input type="text" readonly="" class="form-control" name="birthday" value="{{Carbon\Carbon::parse($user['date_of_birth'])->format('d/m/Y')}}"/><span
                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                        			</div>
		                                        </div>	
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Giới Tính <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                	<select name="gender" class="form-control">
                                                    <option value="1"
                                                        @if($user['gender'] == 1)
                                                            selected
                                                        @endif 
                                                    >Nam</option>
                                                    <option value="0"
                                                        @if($user['gender'] == 0)
                                                            selected
                                                        @endif
                                                    >Nữ</option>
                                                	</select>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                            	<label for="inputUsername" class="col-md-3 control-label">Số CMND <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="number" name="CMND" placeholder="Nhập Số CMND" readonly class="form-control" value="{{$user['CMND']}}"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputAddress" class="col-md-3 control-label">Ngày Cấp
                                                <span class='require'>*</span></label>

                                                 <div class="col-md-9">
		                                        	<div data-date-format="dd/mm/yyyy"
                                             		class="input-group date datepicker-filter mbs">
                                             		<input type="text" readonly="" class="form-control" name="date_CMND" value="{{Carbon\Carbon::parse($user['date_CMND'])->format('d/m/Y')}}"/><span
                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                        			</div>
		                                        </div>	
                                            </div>
                                            <div class="form-group"><label for="inputAddress" class="col-md-3 control-label">Nơi Cấp
                                                <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                    <input type="text" name="address_CMND" placeholder="Nhập Nơi Cấp" readonly class="form-control" value="{{$user['address_CMND']}}"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Nơi Đăng Ký Hộ Khẩu Thường Trú <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                	<textarea rows="3" placeholder="Nhập Nơi Đăng Ký Hộ Khẩu Thường Trú" readonly class="form-control" name="permanent_address">{{$user['permanent_address']}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group"><label for="inputEmail" class="col-md-3 control-label">Chỗ Ở Hiện Nay <span class='require'>*</span></label>

                                                <div class="col-md-9">
                                                	<textarea name="present_address" rows="3" readonly placeholder="Nhập Chỗ Ở Hiện Nay" class="form-control">{{$user['present_address']}}</textarea>
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
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputFirstName" class="col-md-3 control-label">Mã Hợp Đồng <span class='require'>*</span></label>

                                                        <div class="col-md-9"><input type="text" placeholder="Nhập Mã Hợp Đồng" class="form-control" name="code" value="{{old('code')}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputLastName" class="col-md-3 control-label">Tên Hợp Đồng <span class='require'>*</span></label>

                                                        <div class="col-md-9"><input type="text" placeholder="Nhập Tên Hợp Đồng" class="form-control" name="name_contract" value="{{old('name_contract')}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <h3>Công việc</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="col-md-3 control-label">Phòng Ban<span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                            <select class="form-control" name="department">
                                                            @foreach($department as $de)
                                                                <option value="{{$de['id']}}"
                                                                    @if($user->UserDepartment['department_id'] == $de['id'])
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
                                                    	<label for="inputEmail" class="col-md-3 control-label">Chức Vụ<span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                        	<select class="form-control" name="position">
                                                             @foreach($position as $po)
                                                                <option value="{{$po['id']}}"
                                                                    @if($user->UserPositionJobtype['position_id'] == $po['id'])
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
                                                    	<label for="selGender" class="col-md-3 control-label">Chuyên Môn<span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                        	<select class="form-control" name="jobtype">
                                                            @foreach($jobtype as $jt)
                                                                <option value="{{$jt['id']}}"
                                                                 @if($user->UserPositionJobtype['jobtype_id'] == $jt['id'])
                                                                        selected
                                                                    @endif 
                                                                >{{$jt['name']}}</option>
                                                            @endforeach
                                                        	</select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="selGender" class="col-md-2 control-label">Công Việc Phải Làm<span class='require'>*</span></label>

                                                         <div class="col-md-10">
                                                            <textarea name="work_description" rows="5" placeholder="Nhập Công Việc Phải Làm" class="form-control">{{old('work_description')}}</textarea>
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
                                                        	<select class="form-control" name="type_contract" onchange="if (this.value=='other'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};">
                                                                <option value="12">12 Tháng</option>
                                                                <option value="24">24 Tháng</option>
                                                                <option value="0">Không Thời Hạn</option>
                                                                <option value="other">Other</option>
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
		                                             		<input type="text" readonly="" class="form-control" name="start_contract" value="{{old('start_contract')}}"/><span
		                                                	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
		                                        			</div>
				                                        </div>	
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-md-9 col-md-push-3">
                                                        <input type="number" name="other" style="visibility:hidden;" class="form-control" placeholder="Nhập Số Tháng" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<label for="inputPhone" class="col-md-3 control-label">Ngày Kết Thúc <span class='require'>*</span></label>

                                                        <div class="col-md-9">
				                                        	<div data-date-format="dd/mm/yyyy"
		                                             		class="input-group date datepicker-filter mbs">
		                                             		<input type="text" readonly="" class="form-control" name="end_contract" value="{{old('end_contract')}}"/><span
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

                                                        <div class="col-md-9"><input type="number" placeholder="Nhập Mức Lương Chính" class="form-control" name="salary" id="salary" value="{{old('salary')}}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    
                                                </div>
                                            </div>
                                            <h4>Phụ cấp</h4>
                                            
                                            <div class="row">
                                                @foreach($allowance as $al)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputStates" class="col-md-3 control-label">{{$al['name']}} <span class='require'>*</span></label>

                                                        <div class="col-md-9">
                                                            <input type="number" placeholder="" name="allowance[]" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                        <div class="form-actions text-right pal">
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                            &nbsp;
                                            <a href="contract" class="btn btn-green">Trở Lại</a>
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
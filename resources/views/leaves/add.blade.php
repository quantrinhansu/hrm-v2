@extends('layouts.app')
@section('title','Xin Nghỉ')
@section('content')

<div class="create_leave">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Xin nghỉ</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Xin Nghỉ</li>
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
	                    	<div class="panel-heading">Xin Nghỉ</div>
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
	                            <form action="leave/add" method="POST" class="form-horizontal form-seperated">
	                             <input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-body">
	                                	<div class="row">
	                                		<div class="col-md-6">
			                                    <div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Tên Nhân viên </label>

			                                        <div class="col-md-9"><input type="text" readonly class="form-control" value="{{Auth::User()->name}}" /></div>
			                                        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
			                                    </div>
	                                    	</div>
	                                    	<div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Mã Nhân Viên </label>

			                                        <div class="col-md-9"><input type="text" readonly class="form-control" value="{{Auth::User()->username}}"/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Phòng Ban </label>

			                                        <div class="col-md-9"><input type="text" readonly class="form-control" value="{{Auth::User()->UserDepartment['user_id'] == null ? '' : Auth::User()->UserDepartment->Department['name']}}"/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Chức Vụ </label>

			                                        <div class="col-md-9"><input type="text" readonly class="form-control" value="{{Auth::User()->UserPositionJobtype['user_id'] == null ? '' : Auth::User()->UserPositionJobtype->Position['name']}}"/></div>
			                                    </div>
		                                    </div>
		                                    <hr/>
		                                    <div class="col-md-12">
		                                    	<div class="form-group">
			                                    	<label for="inputLastName" class="col-md-2 control-label">Lý Do <span class='require'>*</span>
			                                    	</label>

			                                        <div class="col-md-10">
			                                            <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
			                                        </div>
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
                                                    	class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                            			</div>
			                                        </div>
			                                    </div>
		                                    </div>
	                                    </div>
	                                </div>
	                                <div class="form-actions text-right pal">
	                                    <button type="submit" class="btn btn-primary">Xác Nhận</button>
	                                    &nbsp;
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
@endsection
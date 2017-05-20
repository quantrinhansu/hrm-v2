@extends('layouts.app')
@section('title','Thông Tin Phòng Ban')
@section('content')
<div class="create_leave">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Thông Tin Chi Tiết Phòng {{$department['name']}}</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Forms</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Form Layouts</li>
    </ol>
    
    <div class="clearfix"></div>
</div>

 <div class="page-content">
    <div id="form-layouts" class="row">
		<div class="col-lg-12">
		    <div style="background: transparent; border: 0; box-shadow: none !important"
		         class="tab-content pan mtl mbn responsive">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-blue">
	                    	<div class="panel-heading">Thông Tin Phòng
	                    		<button class="btn btn-info btn_access_save" data-title="Add" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp;Sửa Nhân Viên</i></button>
	                    		<a class="btn btn-info btn_access_save" href=""><i class="fa fa-plus">&nbsp;Thêm Nhân Viên</i></a>
	                    	</div>

	                        <div class="panel-body pan">
	                            <form action="#" class="form-horizontal form-seperated">
	                                <div class="form-body">
	                                	<div class="row">
	                                		<div class="col-md-6">
			                                    <div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Mã Phòng </label>

			                                        <div class="col-md-9"><input type="text" class="form-control" value="{{$department['code']}}" readonly /></div>
			                                    </div>
	                                    	</div>
	                                    	<div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Tên Phòng </label>

			                                        <div class="col-md-9"><input type="text" class="form-control" value="{{$department['name']}}" readonly /></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Trưởng Phòng </label>

			                                        <div class="col-md-9"><input type="text" class="form-control" value="{{$department->User['username']}}" readonly/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Số Lượng </label>

			                                        <div class="col-md-9"><input type="text" class="form-control" value="{{$count_employee}}"readonly/></div>
			                                    </div>
		                                    </div>
		                                    <hr/>
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

	 <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-blue">
            	<div class="panel-heading">
            		<span>Danh Sách Nhân Viên</span>
            	</div>
               <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
	                                <thead>
			                            <tr>
							                <th>Tên Nhân Viên</th>
								            <th>Username</th>
								             <th>Giới Tính</th>
			                            </tr>
		                            </thead>
		                            <tbody>
		                            @foreach($user_department as $ud)
			                            <tr>
							                <td>{{$ud->User['first_name']}} {{$ud->User['last_name']}}</td>
							                <td>{{$ud->User['username']}}</td>
							                <td>
							            		@if($ud->User['gender'] == 1)
							            			Nam
							            		@else
							            			Nữ
							            		@endif
							                </td>

			                            </tr>
			                        @endforeach
		                            </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
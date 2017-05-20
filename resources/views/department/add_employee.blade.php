@extends('layouts.app')
@section('title','Danh Sách Chức Vụ')
@section('content')

<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Nhân Viên</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Danh Sách Nhân Viên</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="table_list_notification">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	        <form action="department/detail/add-employee/{{$department['id']}}" method="POST">
	        	<input type="hidden" name="_token" value="{{csrf_token()}}">
	            <div class="panel panel-blue">
	            	<div class="panel-heading">
	            		<span>Chọn Nhân Viên Thêm Vào Phòng</span>
	            		<button class="btn btn-info btn_access_save" type="submit"><i class="fa fa-plus">&nbsp;Thêm</i></button>
	            	</div>
	               <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
		                                <thead>
				                            <tr>
				                            	<th><input type="checkbox" class="checkall"></th>
								                <th>Tên Nhân Viên {{$department['id']}}</th>
								                <th>Username</th>
								                <th>Giới Tính</th>
				                            </tr>
			                            </thead>
			                            <tbody>
			                            @foreach($user as $us)
				                            <tr>
				                            	<td>
													  <input type="checkbox" value="{{$us['id']}}" name="employee[]">
				                            	</td>

								                <td>{{$us['first_name']}} {{$us['last_name']}}</td>
								                <td>{{$us['username']}}</td>
								                <td>
								                	@if($us['gender'] == 1)
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
	        </form>
	        </div>
	    </div>
	</div>
</div>	
</div>

@endsection
@extends('layouts.app')
@section('title','Danh Sách Nhân Viên')
@section('content')

<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Nhân Viên</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Danh Sách Nhân Viên</a></li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="table_list_notification">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-blue">
	            	<div class="panel-heading">
	            		<span>Danh Sách</span>
	            		<a href="employee/add" class="btn btn-info btn_access_save btn-sm"><i class="fa fa-plus">&nbsp;Thêm</i></a>
	            	</div>
	               <div class="panel-body">
	               		<div class="alert alert-success" id="report_delete" style="display: none">Đã xoá chuyên môn thành công</div>
	               		<div class="alert alert-success" id="report_add" style="display: none">Bạn đã thêm chuyên môn thành công</div>
	               		<div class="alert alert-success" id="report_edit" style="display: none">Bạn đã sửa chuyên môn thành công</div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
		                                <thead>
				                            <tr>
								                <th>Mã Nhân Viên</th>
								                <th>Tên Nhân Viên</th>
								                <th>Email</th>
								                <th>Giới Tính</th>
								                <th>Ngày Sinh</th>
								                <th>Địa Chỉ Hiện Tại</th>
								                <th>TT Hôn Nhân</th>
								                <th>Số Điện Thoại</th>
								                <th>Sửa</th>
								                <th>Xóa</th>
				                            </tr>
			                            </thead>
			                            <tbody id="add_row">
			                            @foreach($user as $us)
				                            <tr class="tr">
								                <td>{{$us['username']}}</td>
								                <td>{{$us['name']}}</td>
								                <td>{{$us['email']}}</td>
								                <td>
													@if($us['gender'] == 1)
														Nam
													@else
														Nữ
													@endif
								                </td>
								                <th>{{$us['birthday']}}</th>
								                <td>{{$us['present_address']}}</td>
								                <td>{{$us['maritial_status']}}</td>
								                <td>{{$us['phone_number']}}</td>
								                <td>
								                	 <a class="btn btn-primary btn-xs btn_update" ><span class="fa fa-edit"></span>&nbsp;Sửa</span></a>                                         
			                                    </td>
								                <td>
			                                         <button type="button" data-target="#modal-default" data-id="" data-toggle="modal" class="btn btn-primary btn-xs btn_delete"><i
			                                            class="fa fa-trash-o"></i>&nbsp;Xóa</button>
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

<!--Modal Default-->
<div id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default-label"
     aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
               <h4 id="modal-default-label" class="modal-title">Delete</h4></div>
           <div class="modal-body">Bạn có chắc chắn muốn xóa không?</div>
           <div class="modal-footer">
               <button type="button" data-dismiss="modal" class="btn btn-default">Không</button>
               <button type="button" data-dismiss="modal" class="btn btn-primary btn_confirm">Có</button>
           </div>
       </div>
   </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	
	<!-- /.modal-dialog --> 
</div>

</div>

@endsection

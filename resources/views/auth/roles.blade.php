<?php 
use App\Http\Controllers\RolesController;
	$per_name = array();
	$per_display_name = array();
	foreach ($permission as $value) {
		array_push($per_name, $value['name']);
		array_push($per_display_name, $value['display_name']);
	}
	$role_name_now = '';
?>
@extends('layouts.app')
@section('title','Danh Sách Quyền')
@section('script')
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection

@section('content')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Quyền</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Danh Sách Quyền</li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="page-content">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-blue">
	            <div class="panel-heading">
	                <div class="caption">Bảng nhóm người dùng <a href="roles/viewadd" class="btn btn-info pull-right btn-sm" >Thêm</a></div>
	            </div>

	            <div class="panel-body">
	                <div class="row mbm">
	                    <div class="col-lg-12">
	                    	    @if(Session::has('msg'))
						        <div class="alert alert-info">
						            <a class="close" data-dismiss="alert">×</a>
						            <strong>Chú ý! : </strong> {!!Session::get('msg')!!}
						        </div>
						    	@endif
	                        <div class="table-responsive">
	                     		<table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
	                                <thead>
	                                	
	                                <tr>
	                                    <th style="width: 1%; padding: 10px; background: #efefef"><input
	                                            type="checkbox" class="checkall"/></th>
	                                    <th width="auto">STT #</th>
	                                    <th width="auto">Tên</th>
	                                    <th width="auto">Tên hiển thị</th>
	                                    <th width="auto">Mô tả</th>
	                                    <th width="auto">Ngày tạo/Ngày sửa</th>
	                                    <th width="auto">Hành động</th>
	                                </tr>
	                                <tbody>
	                                 <?php foreach ($roles as $key => $value) {  ?> 	

		                                <tr>
		                                	<td><input type="checkbox"/></td>
		                                    	<td>{{ $key }}</td>
			        							<td>{{ $value['name'] }}</td>
			        							<td>{{ $value['display_name'] }}</td>
			        							<td>{{ $value['description'] }}</td>
			        							<td>{{ $value['created_at'] }} / {{ $value['updated_at'] }}</td>
		                                    <td><a href="roles/viewedit/{{$value['id']}}" class="btn btn-warning edit_role" style="padding-left: 10px" >Chỉnh sửa</a>
		                                    <a id="delete_{{$value['id']}}" class="btn btn-danger delete_role" style="padding-left: 10px" data-toggle="modal" href='#modal-delete' data-rolekey="{{ $value['id'] }}" >Xóa</a>
		                                </tr>                                	     
	                                <?php } ?>                           
	                                </tbody>
	                                </thead>
	                            	</table>
	                        </div>
	                    </div>
	                </div>
	            </div>

				<div class="modal fade" id="modal-delete">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Xác Nhận Xóa</h4>
							</div>
							<form action="/roles/delete" method="POST">
							<div class="modal-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="role_id" value="" id="delete_role">
								<H3>Bạn thực sự muốn xóa nhóm người dùng này ?</H3>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
								<button type="submit" class="btn btn-primary">Đồng Ý</button>
								
							</div>
							</form>
						</div>
					</div>
				</div>
	        </div>
	    </div>
	</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    $('.edit_role').click(function(){
    	$('.update_name').val($(this).data("rolename"));
    	$('.update_displayname').val($(this).data("displayname"));
    });
    $('.delete_role').click(function(){
    	$('#delete_role').val($(this).data("rolekey"));
    });
});
</script>
@stop
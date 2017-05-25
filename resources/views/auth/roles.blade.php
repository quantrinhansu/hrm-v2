<?php 
	$per_name = array();
	$per_display_name = array();
	foreach ($permission as $value) {
		array_push($per_name, $value['name']);
		array_push($per_display_name, $value['display_name']);
	}
?>
@extends('layouts.app')
@section('script')
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="page-content">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="note note-success"><h4 class="box-heading">Role</h4>

	            <p>Cấu hình permission cho các Role</p>

	            <p>"Thêm cột" để thêm các permission
	            </p>

	            <p>Check để đồng ý cho phép role đó được phép xem, thêm, xóa, Sửa
	            </p></div>
	    </div>

	    <div class="col-lg-12">
	        <div class="portlet box">
	            <div class="portlet-header">
	                <div class="caption">Role Table</div>
	            </div>
	            <div class="portlet-body">
	                <div class="row mbm">
	                    <div class="col-lg-12">
	                    	    @if(Session::has('msg'))
						        <div class="alert alert-danger">
						            <a class="close" data-dismiss="alert">×</a>
						            <strong>Chú ý!</strong> {!!Session::get('msg')!!}
						        </div>
						    	@endif
	                        <div class="table-responsive">
	                     		<table class="table table-hover table-striped table-bordered table-advanced tablesorter display">
	                                <thead>
	                                <a class="btn btn-info pull-right" style="margin-bottom: 10px" data-toggle="modal" href='#modal-id'>Thêm Role</a>	
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
		                                    <td><a id="edit_{{$value['id']}}" class="btn btn-warning edit_role" style="padding-left: 10px" data-toggle="modal" href='#modal-update' data-id="{{ $value['id'] }}" data-rolename="{{ $value['name'] }}" data-displayname="{{ $value['display_name'] }}" data-description="{{ $value['description'] }}" >Chỉnh sửa</a>
		                                    <a id="delete_{{$value['id']}}" class="btn btn-danger" style="padding-left: 10px" data-toggle="modal" href='#modal-delete' data-rolekey="{{ $value['id'] }}" >Xóa</a>
		                                </tr>                                	     
	                                <?php } ?>                           
	                                </tbody>
	                                </thead>
	                            	</table>
	                        </div>
	                    </div>
	                </div>
	            </div>
{{-- modal create --}}
	            <div class="modal fade" id="modal-id">
	            	<div class="modal-dialog">
	            		<div class="modal-content">
	            			<div class="modal-header">
	            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            				<h4 class="modal-title">Thêm role</h4>
	            			</div>
	            			<form action="/roles/add" method="GET" role="form">
	            			<div class="modal-body">
	        					<div class="form-group">
	        						<span class="Label">Tên Role </span><span class='require'>*</span>
	        						<input type="text" name="name" class="form-control" required>
	        					</div>
	        					<div class="form-group">
	        						<span class="Label">Tên Hiển thị </span><span class='require'>*</span>
	        						<input type="text" name="display_name" class="form-control" required>
	        					</div>	        					
	        					<div class="form-group">
	        						<span class="Label"  data-toggle="tooltip" data-placement="top" title="Cho phép truy cập để xem, thêm, xóa, sửa..."  >Quyền truy cập </span><span class='require'>*</span>
	        						<div class="panel panel-default">
	        							<div class="panel-body">
		        							<?php foreach ($per_name as $key => $value) { ?> 
		        							<span class="permission" style="margin-left: 50px!important;">
		        								<input  type="checkbox" name="permission[]" value="<?php echo $value; ?> " class="form-control">&#09; <?php echo $per_display_name[$key]; ?> 
		        							</span>
		        							<?php } ?> 

		        						</div>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<span class="Label">Mô tả</span>
	        						<input type="text" name="description" class="form-control">
	        					</div>
	            			</div>
	            			<div class="modal-footer">
	            				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	            				<button type="submit" class="btn btn-primary">Đồng Ý</button>
	            				</form>
	            			</div>
	            		</div>
	            	</div>
	            </div>
{{-- modal update --}}
				<div class="modal fade" id="modal-update">
	            	<div class="modal-dialog">
	            		<div class="modal-content">
	            			<div class="modal-header">
	            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            				<h4 class="modal-title">Chỉnh sửa role</h4>
	            			</div>
	            			<form action="/roles/update" method="GET" role="form">
	            			<div class="modal-body">
	        					<div class="form-group">
	        						<span class="Label">Tên Role </span><span class='require'>*</span>
	        						<input type="text" name="name" class="form-control update_name" required>
	        					</div>
	        					<div class="form-group">
	        						<span class="Label">Tên Hiển thị </span><span class='require'>*</span>
	        						<input type="text" name="display_name" class="form-control update_displayname" required>
	        					</div>	        					
	        					<div class="form-group">
	        						<span class="Label"  data-toggle="tooltip" data-placement="top" title="Cho phép truy cập để xem, thêm, xóa, sửa..."  >Quyền truy cập </span><span class='require'>*</span>
	        						<div class="panel panel-default">
	        							<div class="panel-body">
		        							<?php foreach ($per_name as $key => $value) { ?> 
		        							<span class="permission" style="margin-left: 50px!important;">
		        								<input  type="checkbox" name="permission[]" value="<?php echo $value; ?> " class="form-control">&#09; <?php echo $per_display_name[$key]; ?> 
		        							</span>
		        							<?php } ?> 

		        						</div>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<span class="Label">Mô tả</span>
	        						<input type="text" name="description" class="form-control">
	        					</div>
	            			</div>
	            			<div class="modal-footer">
	            				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	            				<button type="submit" class="btn btn-primary">Đồng Ý</button>
	            				</form>
	            			</div>
	            		</div>
	            	</div>
	            </div>
{{-- modal delete --}}
				<div class="modal fade" id="modal-delete">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Xóa Role</h4>
							</div>
							<div class="modal-body">
								<H3>Bạn thực sự muốn xóa role này ?</H3>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
								<button type="button" class="btn btn-primary">Đồng Ý</button>
							</div>
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
});
</script>
@stop
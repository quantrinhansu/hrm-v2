@extends('layouts.app')
@section('title','Quyền truy cập')
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Quyền Truy Cập</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Danh Sách Quyền Truy Cập</li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="page-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-blue">
				<div class="panel-heading">
					<div class="caption">Bảng các quyền truy cập <a class="btn btn-info pull-right btn-sm" data-toggle="modal" href='#modal-id'>Thêm</a></div>

				</div>
			    <div class="panel-body">
		            <div class="row mbm">
		                <div class="col-lg-12">
		                	    @if(Session::has('msg'))
						        <div class="alert alert-info">
						            <a class="close" data-dismiss="alert">×</a>
						            <strong>Chú ý! </strong> {!!Session::get('msg')!!}
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
	                                 <?php foreach ($per as $key => $value) {  ?>
		                                <tr>
		                                	<td><input type="checkbox"/></td>
		                                    	<td>{{ $key }}</td>
			        							<td>{{ $value['name'] }}</td>
			        							<td>{{ $value['display_name'] }}</td>
			        							<td>{{ $value['description'] }}</td>
			        							<td>{{ $value['created_at'] }} / {{ $value['updated_at'] }}</td>
		                                    <td><a id="edit_{{$value['id']}}" class="btn btn-warning edit_permission" style="padding-left: 10px" data-toggle="modal" href='#modal-update' data-id="{{ $value['id'] }}" data-name="{{ $value['name'] }}" data-displayname="{{ $value['display_name'] }}" data-description="{{ $value['description'] }}" >Chỉnh sửa</a>
		                                    <a id="delete_{{$value['id']}}" class="btn btn-danger delete_role" style="padding-left: 10px" data-toggle="modal" href='#modal-delete' data-perkey="{{ $value['id'] }}" >Xóa</a>
		                                </tr>                                	     
	                                <?php } ?>                           
	                                </tbody>
	                                </thead>
	                            	</table>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="modal fade" id="modal-id">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Thêm mới</h4>
					</div>
					<form action="permission/create" method="POST">
					<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id">
						<div class="form-group">
							<span class="Label">Tên </span><span class='require'>*</span>
							<input type="text" name="name" class="form-control update_name" required>
						</div>
						<div class="form-group">
							<span class="Label">Tên hiển thị </span><span class='require'>*</span>
							<input type="text" name="display_name" class="form-control update_displayname" required>
						</div>
						<div class="form-group">
							<span class="Label">Mô tả</span>
							<input type="text" name="description" class="form-control update_description" required>
						</div>						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Đồng ý</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-update">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Chỉnh sửa</h4>
					</div>
					<form action="/permission/update" method="POST">
					<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="" class="update_id">
						<div class="form-group">
							<span class="Label">Tên </span><span class='require'>*</span>
							<input type="text" name="name" class="form-control update_name" required>
						</div>
						<div class="form-group">
							<span class="Label">Tên hiển thị </span><span class='require'>*</span>
							<input type="text" name="display_name" class="form-control update_displayname" required>
						</div>
						<div class="form-group">
							<span class="Label">Mô tả</span>
							<input type="text" name="description" class="form-control update_description" required>
						</div>						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Đồng ý</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-delete">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Xác nhận xóa</h4>
					</div>
					<form action="/permission/delete" method="POST">
						<div class="modal-body">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id" id="per_id">
							<h3>Bạn có chắc chắn muốn xóa quyền này ?</h3>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
							<button type="submit" class="btn btn-primary">Đồng ý</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.edit_permission').click(function(){
		$('.update_id').val($(this).data("id"));
    	$('.update_name').val($(this).data("name"));
    	$('.update_displayname').val($(this).data("displayname"));
    	$('.update_description').val($(this).data("description"));
    });
    $('.delete_role').click(function(){
    	$('#per_id').val($(this).data("perkey"));
    });
</script>
@stop
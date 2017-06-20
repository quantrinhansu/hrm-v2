<?php 
use App\Http\Controllers\SalaryController;



?> 
@extends('layouts.app')
@section('title','Bảng Tính Lương')
@section('script')

<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<script src="assets/js/jquery-1.9.1.js"></script>
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Phụ Cấp</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Danh Sách Phụ Cấp</a>
    </ol>
</div>

<div class="page-content">
	<div class="row">
	    <div class="col-lg-12">
	    	<div class="panel panel-blue">
				<div class="panel-heading">
					<div class="caption">Danh Sách Phụ Cấp <a class="btn btn-info pull-right btn-sm" href='#modal-add' data-toggle="modal">Thêm</a>
					</div>
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
	                                    <th>STT #</th>
	                                    <th>Tên Phụ Cấp</th>
	                                    <th>Loại Phụ Cấp</th>
	                                    <!-- <th>Hành Động</th> -->
	                                </tr>
	                                <tbody>
	                                 <?php foreach ($allowances as $key => $allowance) {  ?>
		                                <tr>

	                                		<td>{{ $key }}</td>
	                                		<td>{{ $allowance['name'] }}</td>
	                                		<td><?php if($allowance['type'] == 0){
	                                			echo 'Phụ cấp không tính thuế'; 
	                                		}else {
	                                			echo 'Phụ cấp tính thuế';
	                                			}
	                                		?></td>

	                                		<!-- <td><a href="salary/allowance-edit/" class="btn btn-warning edit_role"  >Chỉnh sửa</a><a class="btn btn-primary" data-toggle="modal" style="margin-left: 10px" href='#modal-delete'>Xóa</a></td> -->

	               
		                                </tr>                                	     
	                                <?php } ?>                           
	                                </tbody>
	                                </thead>
	                            	</table>
	                            	<div class="modal fade" id="modal-add">
	                            		<div class="modal-dialog">
	                            			<div class="modal-content">
	                            				<div class="modal-header">
	                            					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                            					<h4 class="modal-title">Thêm Phụ Cấp</h4>
	                            				</div>
	                            				<form action="allowance/add" method="POST">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												
	                            				<div class="modal-body">
	                            					<div class="form-group">
	                            						<label>Tên Phụ Cấp</label>
	                            						<input type="text" name="name" class="form-control">

	                            					</div>
	                            					<div class="form-group">
	                            						<label>Loại Phụ cấp</label>
	                            						<select name="type" id="inputType" class="form-control" required="required">
	                            							<option value="0">Phụ cấp không tính thuế</option>
	                            							<option value="1">Phụ cấp tính thuế</option>
	                            						</select>
	                            					</div>
	                            				</div>
	                            				<div class="modal-footer">
	                            					<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
	                            					<button type="submit" class="btn btn-primary">Đồng Ý</button>
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
	                            					<h4 class="modal-title">Thêm Phụ Cấp</h4>
	                            				</div>
	                            				<form action="allowance/update" method="POST">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="id" id="id_update">
	                            				<div class="modal-body">
	                            					<div class="form-group">
	                            						<label>Tên Phụ Cấp</label>
	                            						<input type="text" id="name_update" name="name" class="form-control">

	                            					</div>
	                            					<div class="form-group">
	                            						<label>Loại Phụ cấp</label>
	                            						<select name="type" id="type_update" class="form-control" required="required">
	                            							<option value="0">Phụ cấp không tính thuế</option>
	                            							<option value="1">Phụ cấp tính thuế</option>
	                            						</select>
	                            					</div>
	                            				</div>
	                            				<div class="modal-footer">
	                            					<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
	                            					<button type="submit" class="btn btn-primary">Đồng Ý</button>
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
                            						<h4 class="modal-title">Xác Nhận</h4>
                            					</div>
                            					<form action="allowance/delete" method="POST">
                            					<div class="modal-body">
                            						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            						<h3>Bạn có muốn xóa phụ cấp này ?</h3>
                            					</div>
                            					<input type="hidden" name="id" id="id_delete">
                            					<div class="modal-footer">
                            						<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
                            						<button type="submit"  class="btn btn-primary">Đồng Ý</button>
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
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.allowance_update').click(function(){
			$('#name_update').val($(this).data('name'));
			$('#type_update').val($(this).data('type'));
			$('#id_update').val($(this).data('id'));
		});		
		$('.allowance_delete').click(function(){
			$('#id_delete').val($(this).data('id'));
		});

	});
</script>
@endsection
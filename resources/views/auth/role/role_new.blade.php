<?php 
use App\Http\Controllers\PermissionController;
?>
@extends('layouts.app')
@section('title','Thêm Phân Quyền')
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
	        <div class="note note-success"><h4 class="box-heading">Thêm Phân quyền</h4>
	        </div>
	    </div>
	    <form action="roles/create" method="POST" role="form">
	    <div class="col-lg-12">
	        <div class="panel panel-blue">
	            <div class="panel-heading">
	                <div class="caption">Thêm Phân Quyền <button href="" class="btn btn-info pull-right btn-sm" style="margin-bottom: 10px" type="submit">Lưu</button></div>
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
						    	<div class="role-edit-form">
						    		<div class="row mbm">
						    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
							    		<div class="form-group">
	                    					<div class="col-lg-6">
								    			<label for="name" class="strong">Tên</label>
								    			<input type="text" name="name" class="form-control" id="name" placeholder="Tên phân quyền" >
								    		</div>	                    					
								    		<div class="col-lg-6">
								    			<label for="display_name" class="strong">Tên Hiển Thị</label>
								    			<input type="text" name="display_name" class="form-control" id="display_name" placeholder="Tên hiển thị">
								    		</div>
								    		<div class="col-lg-6" style="margin: 40px">
								    		<h4 class="strong">Quyền cho Role này</h4>
								    		<?php foreach ($per as $key => $value) {  ?> 

								    			<div class="permission" style="margin: 10px!important;">
		        									<input type="checkbox" name="permission[]" value="<?php echo $value['name']; ?> " class="form-control">&#09; <?php echo $value['display_name'].'.('.$value['name'].')';
		        									 ?> 
		        								</div>
		        							<?php } ?>
								    		</div>
								    		<div class="col-lg-12">
								    			<label for="display_name" class="strong">Mô tả</label>
								    			<input type="text" name="description" class="form-control" id="display_name" placeholder="Tên hiển thị">
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
	</div>
	</div>
@endsection

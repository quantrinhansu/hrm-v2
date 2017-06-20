@extends('layouts.app')
@section('title','Phân Quyền')
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Phân Quyền</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Phân Quyền</li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="page-content">
	<div class="row">
	    <form action="roles/users_role_update" method="POST">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-lg-12">
			<div class="panel panel-blue">
				<div class="panel-heading">
					<div class="caption">Phân Quyền <button type="submit" class="btn btn-info pull-right btn-sm" >Lưu lại</button></div>

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
	                                    <th width="auto">Mã Nhân viên</th>
	                                    <th width="auto">Họ Tên</th>
	                                    <th width="auto">Phòng Ban</th>
	                                    <th width="auto">Chức vụ</th>
	                                    <th width="auto">Loại tài khoản</th>
	                                    <th width="auto">Hành động</th>

	                                </tr>
	                                <tbody>
	                                 <?php foreach ($users as $key => $value) {  ?>
		                                <tr>
		                                	<td><input type="checkbox"/></td>
	                                		<td>{{ $key }}</td>
							                <td>{{$value['username']}}</td>
							                <td>{{$value['name']}}</td>
		        							<td>{{$value->UserPositionJobtype['user_id'] == null ? '' : $value->UserPositionJobtype->Position['name']}}</td>
		        							<td>{{$value->UserPositionJobtype['user_id'] == null ? '' : $value->UserPositionJobtype->Jobtype['name']}}</td>
		        							<td><?php 
		        								$user = App\User::find( $value['id'] );
												foreach( $user->roles as $role )
												{
												    echo $role->display_name.' / '.$role->name;
												}
		        							 ?> </td>
		        							 <td><select name="user[]" id="inputRole" class="form-control">
												<?php 
												 	$has_a_role = false; 
												 	foreach ($roles as $key => $role) { ?>
												 		<option value="item_{{$value['id']}}_{{ $role['id'] }}" <?php 
												 			if ($value->hasRole($role['name'])) {
												 				?>
												 				 selected
												 				<?php
												 				$has_a_role = true;
												 			}
												 		 ?> >{{ $role['display_name'] }}</option>
												 	<?php }
												 	if ($has_a_role == false) { ?>
												 		<option value="" selected>--Chọn Role--</option>
												<?php } ?>
													</select></td>
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
		</form>
	</div>
</div>

@stop
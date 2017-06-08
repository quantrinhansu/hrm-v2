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
<div class="page-content">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="note note-success">
	        	<h4 class="box-heading">Quản lý người dùng</h4>
	            <p>Quản lí người dùng đối với các nhóm người dùng.</p>
	        </div>
	    </div>
	    <div class="col-lg-12">
	    	<div class="panel panel-blue">
				<div class="panel-heading">
					<div class="caption">Bảng các quyền truy cập <a class="btn btn-info pull-right btn-sm" href='#modal-id'>Lưu lại</a></div>
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
	                                    <th>Mã Nhân viên</th>
	                                    <th>Họ Tên</th>
	                                    <th>Lương cơ bản</th>
	                                    <th class="phucap">Phụ Cấp ăn trưa</th>
	                                    <th class="phucap">Phụ Cấp điện thoại</th>
	                                    <th class="phucap">Phụ Cấp xăng xe</th>
	                                    <th class="phucap">Phụ Cấp nuôi con nhỏ</th>
	                                    <th>Phụ Cấp trách nhiệm</th>
	                                    <th>Tổng lương</th>
	                                    <th>Ngày công</th>
	                                    <th>Tổng thu nhập thực tế</th>
	                                    <th>Thu nhập chịu thuế TNCN</th>
	                                    <th>Lương đóng BHXH</th>
	                                    <th class="CPDN">BHXH(18%)</th>
	                                    <th class="CPDN">BHYT(3%)</th>
	                                    <th class="CPDN">BHTN(1%)</th>
	                                    <th class="CPDN">KPCĐ(2%)</th>
	                                    <th class="CPDN">Cộng</th>
	                                    <th class="CPCN">BHXH(8%)</th>
	                                    <th class="CPCN">BHYT(1,5%)</th>
	                                    <th class="CPCN">BHTN(1%)</th>
	                                    <th class="CPCN">Cộng</th>	
	                                    <th class="Giamtru">Bản thân</th>        
	                                    <th class="Giamtru">Người Phụ thuộc</th>
	                                    <th>Thu nhập tính thuế TNCN</th>       
	                                    <th>Thuế TNCN phải nộp</th>                     
	                                    <th>Tạm ứng</th>                                    
	                                    <th>Thực lĩnh</th>                                    
	                                </tr>
	                                <tbody>
	                                 <?php foreach ($users as $key => $value) {  ?>
		                                <tr>
	                                		<td>{{ $key }}</td>
	                                		<td>{{ $value['id'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ SalaryController::getBaseSalaryOfUser($value['id']) }} </td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
	                                		<td>{{ $value['name'] }}</td>
							               	
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
	</div>
</div>
@endsection
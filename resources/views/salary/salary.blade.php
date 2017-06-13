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
		                 		<table id="table_id" class="table table-fixed table-hover table-striped table-bordered table-advanced tablesorter display" style="overflow-y: scroll;">
	                                <thead>
                                	<tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th colspan="{{count($allowances)}}">Phụ Cấp</th>
										<th colspan="1">Tổng Lương</th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>	
										<th colspan="5">Các khoản trích vào Chi phí của Doanh Nghiệp</th>
										<th colspan="4">Các khoản trích trừ vào lương của Nhân Viên</th>
										<th colspan="2">Giảm trừ</th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
	                                <tr>
	                                    <th>STT #</th>
	                                    <th>Mã Nhân viên</th>
	                                    <th>Họ Tên</th>
	                                    <th>Lương cơ bản</th>
										{{-- Phụ cấp --}}
										@foreach ($allowances as $allowance)
											<th class="allowance">{{ $allowance['name'] }}</th>
										@endforeach
										{{-- End Phụ cấp --}}
	                                    <th></th>
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
	                                		<td>{{ number_format(SalaryController::getBaseSalaryOfUser($value['id'])) }} </td>
	                                	{{-- Phụ cấp --}}
										@foreach (SalaryController::getAllowances($value['id']) as $key => $user_allowance)
											<td>{{ number_format($user_allowance['value']) }}</td>
										@endforeach
										@for ($i = 0; $i < count($allowances) - count(SalaryController::getAllowances($value['id'])); $i++)
											<td>0</td>
										@endfor
										{{-- End Phụ cấp --}}
	                                		<td>{{ number_format(SalaryController::getTotalSalary($value['id'])) }}</td>
	                                		<td> Lay tu bang ngay cong</td>
	                                		<td>{{ number_format(SalaryController::getRealSalary($value['id'])) }}</td>
	                                		<td>{{ number_format(SalaryController::getPersonalIncomeWithInsurrance($value['id'])) }}</td>
	                                		<td>{{ number_format(SalaryController::getSalaryForInsurrance($value['id'])) }}</td>
	                                		<td>{{ number_format(0.18*SalaryController::getSalaryForInsurrance($value['id'])) }}</td>
	                                		<td>{{ number_format(0.03*SalaryController::getSalaryForInsurrance($value['id'])) }}</td>
	                                		<td>{{ number_format(0.01*SalaryController::getSalaryForInsurrance($value['id'])) }}</td>
	                                		<td>{{ number_format(0.02*SalaryController::getSalaryForInsurrance($value['id'])) }} </td>
											<td>{{ number_format(0.24*SalaryController::getSalaryForInsurrance($value['id'])) }} </td>
	                                		<td>{{ number_format(0.08*SalaryController::getSalaryForInsurrance($value['id'])) }} </td>
	                                		<td>{{ number_format(0.015*SalaryController::getSalaryForInsurrance($value['id'])) }} </td>
	                                		<td>{{ number_format(0.01*SalaryController::getSalaryForInsurrance($value['id'])) }} </td>
	                                		<td>{{ number_format(0.105*SalaryController::getSalaryForInsurrance($value['id'])) }} </td>
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
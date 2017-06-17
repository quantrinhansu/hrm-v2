<?php 
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TimekeepingController;

$my = '';
if (isset($_GET['monthSelect'])) {
	$my = $_GET['monthSelect'];
}else{
	$my = date('m').date('Y');
}
$month = mb_substr($my, 0,2);
$year = mb_substr($my, 2);
?> 
@extends('layouts.app')
@section('title','Bảng Tính Lương')
@section('script')
<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<script src="assets/js/jquery-1.9.1.js"></script>
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection
@section('styles')
<style type="text/css">
	td {
	border-right: 1px solid rgba(0, 0, 0, 0.08);
	}
</style>
@stop
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
				<form action="salary" method="GET">
					<div class="caption">Bảng các quyền truy cập <button class="btn btn-info pull-right btn-sm" type="submit">Truy cập</button>					
					<select style="width: 14%; height: 29px; padding-top: 0px; margin-right: 5px;" name="monthSelect" id="inputMonth" class="pull-right form-control inline" required="required">
						@for ($i = 1; $i <= 12; $i++)
							@if ($i < 10)
								<?php $i = '0'.$i; ?>
							@endif
							<option value="{{$i.$year}}" @if ($month == $i)
								 selected 
							@endif>{{$i}} / {{date("Y")}}</option>
						@endfor
					</select>
					</div>
				</form>
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
		                    <div class="table-responsive" style="overflow-x: hidden; ">
		                 		<table id="salary_table" class="table table-hover table-striped  table-advanced tablesorter display nowrap" style="overflow-y: scroll;">
	                                <thead>
                                	<tr>
										<th></th>
										<th></th>
										<th></th>
										<th style="border-right: 1px solid rgba(0, 0, 0, 0.08);"></th>
										<th colspan="{{count($allowances)}}" style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Phụ Cấp</th>
										<th colspan="1" ></th>
										<th colspan="1" ></th>
										<th></th>
										<th></th>
										<th style="border-right: 1px solid rgba(0, 0, 0, 0.08);"></th>	
										<th colspan="5" style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Các khoản trích vào Chi phí của Doanh Nghiệp</th>
										<th colspan="4" style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Các khoản trích trừ vào lương của Nhân Viên</th>
										<th colspan="2" style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Giảm trừ</th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
	                                <tr>
	                                    <th>STT #</th>
	                                    <th>Mã Nhân viên</th>
	                                    <th style="border-right: 3px solid rgba(0, 0, 0, 0.08);">Họ Tên</th>
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);border-left: 1px solid rgba(0, 0, 0, 0.08);" >Lương cơ bản</th>
										{{-- Phụ cấp --}}
										@foreach ($allowances as $allowance)
											<th class="allowance">{{ $allowance['name'] }}</th>
										@endforeach
										{{-- End Phụ cấp --}}
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);border-left: 1px solid rgba(0, 0, 0, 0.08);">Tổng Lương</th>
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Ngày Công</th>
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Tổng thu nhập thực tế</th>
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Thu nhập chịu thuế TNCN</th>
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Lương đóng BHXH</th>
	                                    <th class="CPDN">BHXH(18%)</th>
	                                    <th class="CPDN">BHYT(3%)</th>
	                                    <th class="CPDN">BHTN(1%)</th>
	                                    <th class="CPDN">KPCĐ(2%)</th>
	                                    <th class="CPDN">Cộng</th>
	                                    <th class="CPCN">BHXH(8%)</th>
	                                    <th class="CPCN">BHYT(1,5%)</th>
	                                    <th class="CPCN">BHTN(1%)</th>
	                                    <th class="CPCN" style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Cộng</th>	
	                                    <th class="Giamtru">Bản thân</th>        
	                                    <th class="Giamtru" style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Người Phụ thuộc</th>
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Thu nhập tính thuế TNCN</th>       
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Thuế TNCN phải nộp</th>                     
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Tạm ứng</th>                                    
	                                    <th style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Thực lĩnh</th>                                    
	                                </tr>
	                                <tbody>
	                                 <?php foreach ($users as $key => $value) {  ?>
		                                <tr>
	                                		<td>{{ $key }}</td>
	                                		<td>{{ $value['id'] }}</td>
	                                		<td style="border-right: 1px solid rgba(0, 0, 0, 0.08);">{{ $value['name'] }}</td>
	                                		<td style="border-right: 1px solid rgba(0, 0, 0, 0.08);">{{ number_format(SalaryController::getBaseSalaryOfUser($value['id'])) }} </td>
	                                	{{-- Phụ cấp --}}
										@foreach (SalaryController::getAllowances($value['id']) as $key => $user_allowance)
											<td style="border-right: 1px solid rgba(0, 0, 0, 0.08);">{{ number_format($user_allowance['value']) }}</td>
										@endforeach
										@for ($i = 0; $i < count($allowances) - count(SalaryController::getAllowances($value['id'])); $i++)
											<td style="border-right: 1px solid rgba(0, 0, 0, 0.08);">0</td>
										@endfor
										{{-- End Phụ cấp --}}
	                                		<td >{{ number_format(SalaryController::getTotalSalary($value['id'])) }}</td>
	                                		<td>{{TimekeepingController::getDW($value['id'], $my)}}</td>
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
<script type="text/javascript">
	$(document).ready(function() {

   var table = $('#salary_table').DataTable( {
        "scrollY": 450,
        "scrollX": true,
        "bLengthChange": false,
        "bPaginate": false,
        "bScrollCollapse": true,
        "fixedColumns":   {
            "leftColumns": 3,
            "rightColumns": 0
        }	
    } );
   $('#salary_table tbody').on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );
	});
</script>
@endsection
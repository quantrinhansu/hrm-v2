<?php
use App\Http\Controllers\SalaryController;

if (isset($_GET['month'])){
	$month = $_GET['month'];
}else{
	$month = date('m');
}

if (isset($_GET['year'])){
	$year = $_GET['year'];
}else{
	$year = date('Y');
}

if (isset($tk_content) && isset($tk_date) && isset($tk_user_ids)) {
	$tk_content  = json_decode($tk_content);
	$tk_date     = json_decode($tk_date);
	$tk_user_ids = json_decode($tk_user_ids);
}else{
	$tk_content  = '';
	$tk_date     = '';
	$tk_user_ids = '';
}
$all_date = cal_days_in_month(CAL_GREGORIAN,$month,$year);
// dd($tk_content);
?>
@extends('layouts.app')
@section('title','Bảng Chấm Công')
@section('script')
<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.bootstrap.min.css">
<script src="assets/js/jquery-1.9.1.js"></script>
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection
@section('styles')
<style type="text/css">
	.dataTables_scroll{
    	border: 1px solid navajowhite;
    	padding-top: 0px;
    }
    table.dataTable {
    	clear: both;
    	margin-top: 0px!important;
    }
    td.highlight {
    	background-color: whitesmoke !important;
	}
}
</style>
@endsection
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Bảng Chấm Công</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Bảng Chấm Công</a>
    </ol>

<div class="page-content">
	<div class="row">
	    <div class="col-lg-12">
	    	<div class="panel panel-blue">
				<div class="panel-heading">
				<form action="timekeeping" method="GET">
					<div class="caption">Bảng Chấm công <button type="submit" class="btn btn-info pull-right btn-sm" >Truy Cập</button>
					<select style="width: 14%; height: 29px; padding-top: 0px; margin-right: 5px;" name="month" id="inputMonth" class="pull-right form-control inline" required="required">
						@for ($i = 1; $i <= 12; $i++)
							@if ($i < 10)
								<?php $i = '0'.$i; ?>
							@endif
							<option value="{{$i}}" @if ($month == $i)
								 selected 
							@endif>{{$i}} / {{date("Y")}}</option>
						@endfor
					</select>
					<input type="hidden" name="year" value="{{date("Y")}}">
					</div>
				</form>
				</div>
			    <div class="panel-body">
	                <form action="timekeeping/store" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="name" value="{{$month}}{{$year}}">
		            <div class="row mbm">
		                <div class="col-lg-12">
		                	    @if(Session::has('msg'))
						        <div class="alert alert-info">
						            <a class="close" data-dismiss="alert">×</a>
						            <strong>Chú ý! </strong> {!!Session::get('msg')!!}
						        </div>
						    	@endif
						    	<div class="table-responsive" style="overflow-x: hidden; ">
		                 		<table id="timekeeping_table" class="table table-hover table-striped  table-advanced tablesorter display nowrap" cellspacing="0" style="overflow-y: scroll;">
	                                <thead>
	                                	                                <tr>
	                                	<th colspan="3" style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Thông tin Nhân viên</th>
	                                	<th colspan="{{$all_date}}">NGÀY TRONG THÁNG/ THỨ TRONG TUẦN</th>
	                                	<th colspan="4" style="border-left: 1px solid rgba(0, 0, 0, 0.08);">Tổng</th>
	                                </tr>
	                                <tr>
	                                	<th width="10px" valign="top">STT</th>
	                                    <th width="100px" valign="top">Mã Nhân viên</th>
	                                    <th width="100px"  valign="top" style="border-right: 1px solid rgba(0, 0, 0, 0.08);">Họ Tên</th>
	                                    @for ($i = 1; $i <= $all_date; $i++)
	                                    	<th width="30px"  valign="top" <?php 
	                                    		if ($year == date('Y') && $month == date('n') && $i == date('j')) {
	                                    			?>
	                                    			style="
	                                    			background-color: rgba(3, 81, 255, 0.64);
    												color: #fff;" 
	                                    			<?php
	                                    		}
	                                    	 ?> >{{$i}} <br>({{SalaryController::getWeekday($i.'-'.$month.'-'.$year)}})</th>
	                                    @endfor
	                                    <th width="10px"  valign="top" style="border-left: 1px solid rgba(0, 0, 0, 0.08);">Nghỉ Có Lương</th>
	                                    <th width="10px"  valign="top" style="border-left: 1px solid rgba(0, 0, 0, 0.08);">Nghỉ Không Lương</th>
	                                    <th width="10px"  valign="top" style="border-left: 1px solid rgba(0, 0, 0, 0.08);">Ngày Công</th>
	                                </tr>
	                                <tbody>
	                                @foreach ($users as $key => $user)
		                                <tr>
		                                	<td align="center">{{$key}}</td>
	                                		<td>{{$user['username']}}</td>
	                                		<td style="border-right: 1px solid rgba(0, 0, 0, 0.08);">{{$user['name']}}</td>
	                                    @for ($i = 1; $i <= $all_date; $i++)
	                                    <?php if ($i < 10) {
	                                    	$i = '0'.$i;
	                                    } ?> 
	                                    	<th width="5px" class="bg-cl" style="<?php 

	                                    	if (!empty($tk_content)) {
	                                    		switch ($tk_content[$all_date*$key + ($i - 1)]) {
	                                    		case 'cn':
	                                    			?>
	                                    			    background-color: rgb(92, 184, 92);
	                                    			<?php
	                                    			break;
	                                    		case 's':
	                                    			?>
	                                    			    background-color: rgba(83, 154, 187, 0.88);
	                                    			<?php
	                                    			break;
	                                    		case 'c':
	                                    			?>
	                                    			    background-color: rgba(202, 115, 218, 0.65);
	                                    			<?php
	                                    			break;
	                                    		case 'nkl':
	                                    			?>
	                                    			    background-color: rgba(202, 192, 72, 0.65);
	                                    			<?php
	                                    			break;
	                                    		case 'ncl':
	                                    			?>
	                                    			    background-color: rgba(202, 102, 72, 0.65);
	                                    			<?php
	                                    			break;
	                                    		case 'nb':
	                                    			?>
	                                    			    background-color: rgba(157, 152, 154, 0.65);
	                                    			<?php
	                                    			break;
	                                    		case 'vc':
	                                    			?>
	                                    			    background-color: rgba(220, 231, 57, 0.75);
	                                    			<?php
	                                    			break;
	                                    		case 'ot':
	                                    			?>
	                                    			    background-color: rgba(23, 27, 142, 0.83);
	                                    			<?php
	                                    			break;		
	                                    		default:
	                                    			break;
	                                    	}
	                                    	}

	                                    	?>">

	                                    		<input type="hidden" name="date[]" value="{{$i}}-{{$month}}-{{$year}}">
	                                    		<input type="hidden" name="user_ids[]" value="{{$user['id']}}">
	                                    		<select name="tk[]" id="input" style="width: 80px;padding-right: 0px;border-right-width: 0px;padding-left: 0px;" class="form-control bg-sl" required="required">
                                			<option value="k" 
													<?php $i = (int)$i;
													 ?> 
	                                    			@if (!empty($tk_content) && ($tk_content[$all_date*$key + ($i - 1)] == 'k'))
	                                    				 selected 
	                                    			@endif 
	                                    			>--trống--</option>
	                                    			<option value="cn" 
	                                    			@if (!empty($tk_content) && ($tk_content[$all_date*$key + ($i - 1)] == 'cn'))
	                                    				 selected 
	                                    			@endif 
	                                    			>Cả ngày</option>
	                                    			<option value="s" 
	                                    			@if (!empty($tk_content) && $tk_content[$all_date*$key + ($i - 1)] == 's')
	                                    				 selected 
	                                    			@endif 	                                    			
	                                    			>Sáng</option>
	                                    			<option value="c"
	                                    			@if (!empty($tk_content) && $tk_content[$all_date*$key + ($i - 1)] == 'c')
	                                    				 selected 
	                                    			@endif 
	                                    			>Chiều</option>
	                                    			<option value="ncl"
	                                    			@if (!empty($tk_content) && $tk_content[$all_date*$key + ($i - 1)] == 'ncl')
	                                    				 selected 
	                                    			@endif 
	                                    			>Nghỉ có Lương</option>
	                                    			<option value="nkl"
	                                    			@if (!empty($tk_content) && $tk_content[$all_date*$key + ($i - 1)] == 'nkl')
	                                    				 selected 
	                                    			@endif 
	                                    			>Nghỉ Không Lương</option>
	                                    			<option value="nb"
	                                    			@if (!empty($tk_content) && $tk_content[$all_date*$key + ($i - 1)] == 'nb')
	                                    				 selected 
	                                    			@endif 
	                                    			>Nghỉ Bù</option>
	                                    			<option value="vc"
	                                    			@if (!empty($tk_content) && $tk_content[$all_date*$key + ($i - 1)] == 'vc')
	                                    				 selected 
	                                    			@endif 
	                                    			>Việc Công</option>
	                                    			<option value="ot"
	                                    			@if (!empty($tk_content) && $tk_content[$all_date*$key + ($i - 1)] == 'ot')
	                                    				 selected 
	                                    			@endif 
	                                    			>Tăng Ca</option>
	                                    		</select>
	                                    	</th>
	                                    @endfor
	                                    <?php 
	                                    	$nkl = 0;
	                                    	$ncl = 0;
	                                    	$ngayCong = 0;
	                                    if (!empty($tk_content)) {
	                                    	for ($i=0; $i < $all_date; $i++) { 
	                                    		if ($tk_content[$all_date*$key + ($i)] == 'nkl') {
	                                    			$nkl++;
	                                    		}
	                                    		if ($tk_content[$all_date*$key + ($i)] == 'ncl') {
	                                    			$ncl++;
	                                    			$ngayCong++;
	                                    		}
	                                    		if ($tk_content[$all_date*$key + ($i)] == 'cn') {
	                                    			$ngayCong++;
	                                    		}
	                                    		if ($tk_content[$all_date*$key + ($i)] == 's' || $tk_content[$all_date*$key + ($i)] == 'c') {
	                                    			$ngayCong += 0.5;
	                                    		}
	                                    		if ($tk_content[$all_date*$key + ($i)] == 'ot') {
	                                    			$ngayCong += 2;
	                                    		}	                                    		
	                                    	}
	                                    }
	                                     ?> 
	                                     <input type="hidden" name="dw[]" value="{{$user['id']}}_{{$ngayCong}}">
	                                    	<td style="border-left: 1px solid rgba(0, 0, 0, 0.08);">{{$ncl}}</td>
	                                    	
	                                    	<td style="border-left: 1px solid rgba(0, 0, 0, 0.08);">{{$nkl}}</td>
	                                    	<td style="border-left: 1px solid rgba(0, 0, 0, 0.08);">{{$ngayCong}}</td>
		                                </tr> 

	                                @endforeach
	                                </form>
	                                </tbody>

	                                </thead>
	                            	</table>
		                    	</div>
						</div>
					</div>
					<button type="submit" class="btn btn-info pull-right btn-sm">Lưu Lại</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.bg-sl').change(function(){
		  if($(this).val() == 'cn'){ 
		    $(this).parent().css('background-color', 'rgb(92, 184, 92)');
		  }
		    if($(this).val() == 's'){
		   $(this).parent().css('background-color', 'rgba(83, 154, 187, 0.88)');
		  }
		    if($(this).val() == 'c'){
		    $(this).parent().css('background-color', 'rgba(202, 115, 218, 0.65)');
		  }
		    if($(this).val() == 'ncl'){
		    $(this).parent().css('background-color', 'rgba(202, 192, 72, 0.65)');
		  }		    
		  	if($(this).val() == 'nkl'){
		    $(this).parent().css('background-color', 'rgba(202, 102, 72, 0.65)');
		  }		    
		  	if($(this).val() == 'nb'){
		    $(this).parent().css('background-color', 'rgba(157, 152, 154, 0.65)');
		  }		  	
		  	if($(this).val() == 'vc'){
		    $(this).parent().css('background-color', 'rgba(220, 231, 57, 0.75)');
		  }		  	
		  	if($(this).val() == 'ot'){
		    $(this).parent().css('background-color', 'rgba(23, 27, 142, 0.83)');
		  }
		});

   var table = $('#timekeeping_table').DataTable( {
        "scrollY": 450,
        "scrollX": true,
        "bLengthChange": false,
        "bPaginate": false,
        "bScrollCollapse": true,
        "fixedColumns":   {
            "leftColumns": 3,
            "rightColumns": 1
        }	
    } );
   $('#timekeeping_table tbody').on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );
	});
</script>
@endsection
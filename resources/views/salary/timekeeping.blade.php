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
$all_date = cal_days_in_month(CAL_GREGORIAN,$month,$year);

?>
@extends('layouts.app')
@section('title','Bảng Tính Lương')
@section('script')
<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.bootstrap.min.css">
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
				<form action="/timekeeping" method="GET">
					<div class="caption">Bảng các quyền truy cập <button type="submit" class="btn btn-info pull-right btn-sm" >Truy Cập</button>
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
	                <form action="/timekeeping/store" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="row mbm">
		                <div class="col-lg-12">
		                	    @if(Session::has('msg'))
						        <div class="alert alert-info">
						            <a class="close" data-dismiss="alert">×</a>
						            <strong>Chú ý! </strong> {!!Session::get('msg')!!}
						        </div>
						    	@endif
						    			                    <div class="table-responsive">
		                 		<table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display nowrap" cellspacing="0" style="overflow-y: scroll; min-width: 4000px;">
	                                <thead>
	                                <tr>
	                                	<th></th>
	                                	<th></th>
	                                	<th></th>
	                                	<th colspan="{{$all_date}}">NGÀY TRONG THÁNG/ THỨ TRONG TUẦN</th>
	                                </tr>
	                                <tr>
	                                	<th width="10px">STT</th>
	                                    <th width="100px">Mã Nhân viên</th>
	                                    <th width="100px">Họ Tên</th>
	                                    @for ($i = 1; $i <= $all_date; $i++)
	                                    	<th width="10px">{{$i}} <br>({{SalaryController::getWeekday($i.'-'.$month.'-'.$year)}})</th>
	                                    @endfor
	                                </tr>
	                                <tbody>
	                                @foreach ($users as $key => $user)
		                                <tr>
		                                	<td align="center">{{$key}}</td>
	                                		<td>{{$user['username']}}</td>
	                                		<td>{{$user['name']}}</td>
	                                    @for ($i = 1; $i <= $all_date; $i++)
	                                    <?php if ($i < 10) {
	                                    	$i = '0'.$i;
	                                    } ?> 
	                                    	<th width="5px" class="bg-cl">
	                                    		<input type="hidden" name="date[]" value="{{$i}}-{{$month}}-{{$year}}">
	                                    		<input type="hidden" name="user_ids[]" value="{{$user['id']}}">
	                                    		<select name="tk[]" id="input" style="width: 80px;padding-right: 0px;border-right-width: 0px;padding-left: 0px;" class="form-control bg-sl" required="required">
	                                    			<option value="k">--trống--</option>
	                                    			<option value="cn">Cả ngày</option>
	                                    			<option value="s">Sáng</option>
	                                    			<option value="c">Chiều</option>
	                                    			<option value="ncp">Nghỉ Không Phép</option>
	                                    			<option value="nkp">Nghỉ Có Phép</option>
	                                    			<option value="nb">Nghỉ Bù</option>
	                                    			<option value="vc">Việc Công</option>
	                                    			<option value="ot">Tăng Ca</option>
	                                    		</select>
	                                    	</th>
	                                    @endfor
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
		    if($(this).val() == 'ncp'){
		    $(this).parent().css('background-color', 'rgba(202, 192, 72, 0.65)');
		  }		    
		  	if($(this).val() == 'nkp'){
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

	});
</script>
<script type="text/javascript">
	var table = $('#table_id');

$('form').on('submit', function(e){
   var $form = $(this);

   // Iterate over all checkboxes in the table
   table.$('input[type="checkbox"]').each(function(){
      // If checkbox doesn't exist in DOM
      if(!$.contains(document, this)){
         // If checkbox is checked
         if(this.checked){
            // Create a hidden element 
            $form.append(
               $('<input>')
                  .attr('type', 'hidden')
                  .attr('name', this.name)
                  .val(this.value)
            );
         }
      } 
   });          
});
</script>
@endsection
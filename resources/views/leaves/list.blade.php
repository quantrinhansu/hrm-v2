@extends('layouts.app')
@section('title','Danh Sách Xin Nghỉ')
@section('content')
<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Xin Nghỉ</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Xin Nghỉ</li>
    </ol>
</div>

<div class="table_list_notification">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-blue">
	            	<div class="panel-heading">
	            		<span>Danh Sách</span>
	            	</div>
	                <div class="panel-body">
	                    <div class="row mbm">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="table_id"
                                           class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                        <thead>
                                        <tr>
				                            <th>STT</th>
							                <th>Mã Nhân Viên</th>
							                <th>Tên</th>
							                <th>Chức Vụ</th>
							                <th>Phòng Ban</th>
							                <th>Lý Do</th>
							                <th>Từ Ngày</th>
							                <th>Đến Ngày</th>
							                <th>Xác nhận</th>
			                            </tr>
                                        <tbody>
                                        <?php  $i = 1; ?>
                                        @foreach($leave as $le)
                                         <tr>
			                                <td><?php echo $i++; ?>
			                                </td>
							                <td>{{$le->User['username']}}</td>
							                <td>{{$le->User['name']}}</td>
							                <td>{{$le->User->UserPositionJobtype['user_id'] == null ? '' : $le->User->UserPositionJobtype->Position['name']}}</td>
							                <td>
												{{$le->User->UserDepartment['user_id'] == null ? '' : $le->User->UserDepartment->Department['name']}}
							                </td>
							                <td>{{$le['description']}}</td>
							                <td>{{ Carbon\Carbon::parse($le['from'])->format('d-m-Y') }}</td>
							                <td>{{ Carbon\Carbon::parse($le['to'])->format('d-m-Y') }}</td>
							                <td>
							                @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
							                @if($le['type'] == null)
							                	<button class="btn btn-primary btn-xs btn_yes btn_co_{{$le['id']}}" id="{{$le['id']}}"><i class="fa fa-check" >&nbsp;Có</i></button>                                            
							                	<button class="btn btn-primary btn-xs btn_no btn_khong_{{$le['id']}}" id="{{$le['id']}}"><b>X</b>&nbsp;Không</button>
											@endif
											@endif
											@if($le['type'] == 'chapnhan')
							                	<button class="btn btn-primary btn-xs"><i class="fa fa-check">&nbsp;Đồng Ý</i></button>                
							                @endif    

							                @if($le['type'] == 'khongchapnhan')     
							                	<button class="btn btn-primary btn-xs"><b>X</b>&nbsp;Không Đồng Ý</button>     
							                @endif   

							                <button class="btn btn-primary btn-xs btn_confirm_{{$le['id']}} btn_dongy"><i class="fa fa-check">&nbsp;Đồng Ý</i></button> <button class="btn btn-primary btn-xs btn_cancel_{{$le['id']}} btn_khongdongy"><b>X</b>&nbsp;Không Đồng Ý</button>                                      
		                                    </td>
			                            </tr>
			                            @endforeach
                                        </tbody>
                                        </thead></table>
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
$(document).ready(function(){
	$('.btn_dongy').hide();
	$('.btn_khongdongy').hide();

	$('.btn_yes').click(function(){
		var id = $(this).attr('id');
		$('.btn_co_' + id).hide();
		$('.btn_khong_' + id).hide();
		

		$.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });

        $.ajax({
            type: 'POST',
            url: 'leave/confirm',
            dataType: 'text',
            data: {type : 'chapnhan', id : id },
            success: function(data){
                $('.btn_confirm_' + id).show();
            }
        });
	});

	$('.btn_no').click(function(){
		var id = $(this).attr('id');

		$('.btn_co_' + id).hide();
		$('.btn_khong_' + id).hide();
		

		$.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });

        $.ajax({
            type: 'POST',
            url: 'leave/cancel',
            dataType: 'text',
            data: {type : 'khongchapnhan', id : id },
            success: function(data){
                $('.btn_cancel_' + id).show();
            }
        });
	});
});
</script>        
@endsection

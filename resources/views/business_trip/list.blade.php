@extends('layouts.app')

@section('content')
<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Công Tác</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Danh Sách Công Tác</li>
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
                        @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
	            		<a class="btn btn-info btn-sm btn_access_save btn-sm" href="business-trip/add" style="color: #fff;"><i class="fa fa-plus">&nbsp;Thêm</i></a>
                        @endif
	            	</div>
                   <div class="alert alert-success" id="report_delete" style="display: none">Đã xoá công tác thành công</div>
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
							                <th>Phòng Ban</th>
							                <th>Chức Vụ</th>
							                <th>Lý Do</th>
							                <th>Địa Điểm</th>
							                <th>Phụ Cấp</th>
							                <th>Từ Ngày</th>
							                <th>Đến Ngày</th>
                                            @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
							                <th>Sửa</th>
							                <th>Xóa</th>
                                            @endif
                                        </tr>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($business_trip as $bt)
                                        <tr id="business_trip_{{$bt['id']}}">
			                                <td><?php echo $i++;?></td>
							                <td>{{$bt->User['username']}}</td>
							                <td>{{$bt->User['name']}}</td>
							                <td>{{$bt->User->UserDepartment['user_id'] == null ? '' : $bt->User->UserDepartment->Department['name']}}</td>
							                <td>{{$bt->User->UserPositionJobtype['user_id'] == null ? '' : $bt->User->UserPositionJobtype->Position['name']}}</td>
							                <td>{{$bt['reason']}}</td>
							                <td>{{$bt['place']}}</td>
							                <td>{{number_format($bt['allowance'])}} VND</td>
							                <td>{{Carbon\Carbon::parse($bt['from'])->format('d-m-Y')}}</td>
							                <td>{{Carbon\Carbon::parse($bt['to'])->format('d-m-Y')}}</td>
                                            @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
							                <td>
							                	 <a class="btn btn-primary btn-xs" href="business-trip/edit/{{$bt['id']}}"><span class="fa fa-edit"></span>&nbsp;Sửa</span></a>                                            
		                                    </td>
							                <td>
		                                         <button type="button" data-target="#modal-default" data-toggle="modal" class="btn btn-primary btn-xs btn_delete" data-id="{{$bt['id']}}"><i
		                                            class="fa fa-trash-o"></i>&nbsp;Xoá</button>
		                                    </td>
                                            @endif
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

<!--Modal Default-->
<div id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default-label"
     aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-default-label" class="modal-title">Xoá Công Tác</h4></div>
            <div class="modal-body">Bạn có chắc chắn xuốn xóa công tác?</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Không</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary btn_confirm">Có</button>
            </div>
        </div>
    </div>
</div>

</div>

 <script type="text/javascript">
 	$('.btn_delete').click(function(){
        var id= $(this).data('id');
        $('.btn_confirm').click(function(){
             $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: 'POST',
                url: 'business-trip/delete',
                dataType: 'text',
                data: {id : id },
                success: function(data){
                    $('#business_trip_' + id).remove();
                    $("#report_delete").show();
                    setTimeout(function()
                    {
                        $('#report_delete').fadeOut();
                    },4000);
                }
            });
        });
    });
 </script>       
@endsection

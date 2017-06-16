@extends('layouts.app')
@section('title','Danh Sách Thông Báo')
@section('content')
<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Thông Báo</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Thông Báo</li>
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
	            		<a href="notification/add" class="btn btn-info btn-sm btn_access_save"><i class="fa fa-plus">&nbsp;Thêm</i></a>
	            	</div>
	            	<div class="alert alert-success" id="report_delete" style="display: none">Đã xoá thông báo thành công</div>
	                <div class="panel-body">
	                    <div class="row mbm">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="table_id"
                                           class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                        <thead>
                                        <tr>
				                            <th>STT</th>
							                <th>Tiêu Đề</th>
							                <th>Nội Dung</th>
							                <th>Ngày Tạo</th>
							                <th>Nhân Viên Tạo</th>
                                            <th>Chi Tiết</th>
							                <th>Sửa</th>
							                <th>Xóa</th>
			                            </tr>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($notification as $nc)
                                        <tr id="notification_{{$nc['id']}}">
			                                <td><?php echo $i++; ?></td>
							                <td>{{$nc['title']}}</td>
							                <td>{!! $nc['content'] !!}</td>
							                <td>{{Carbon\Carbon::parse($nc['created_at'])->format('d-m-Y H:m:s')}}</td>
							                <td>{{$nc->User['name']}}</td>
                                            <td>
                                                <a href="notification/detail/{{$nc['id']}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-check"></i>&nbsp;Chi Tiết</a>
                                            </td>
							                <td>
							                	<a href="notification/edit/{{$nc['id']}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>&nbsp;Sửa</a>
		                                    </td>
							                <td>
		                                         <button type="button" data-target="#modal-default" data-toggle="modal" class="btn btn-primary btn-xs btn_delete" data-id="{{$nc['id']}}"><i
		                                            class="fa fa-trash-o"></i>&nbsp;Xoá</button>
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

<!--Modal Default-->
<div id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default-label"
     aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-default-label" class="modal-title">Xoá Thông Báo</h4></div>
            <div class="modal-body">Bạn có chắc chắn muốn xóa?</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Không</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary btn_confirm">Có</button>
            </div>
        </div>
    </div>
</div>


</div>

<script type="text/javascript">
$(document).ready(function(){
	$('.btn_delete').click(function(){
		var id = $(this).data('id');
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
                url: 'notification/delete',
                dataType: 'text',
                data: {id : id },
                success: function(data){
                   // $('#notification_' + id).fadeOut();
                    $('#notification_' + id).remove();
                    $("#report_delete").show();
                    setTimeout(function()
                    {
                        $('#report_delete').fadeOut();
                    },4000);
                }
            });
        }); 
	});
});
</script>        
@endsection

@extends('layouts.app')
@section('title','Danh Sách Hợp Đồng')
@section('content')

<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Hợp Đồng</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Danh Sách Hợp Đồng</li>
    </ol>

    <div class="clearfix"></div>
</div>
<div class="alert alert-success" id="report_delete" style="display: none">Đã xoá hợp đồng thành công</div>
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
			                            	<th>Tên Nhân Viên</th>
			                            	<th>Phòng Ban</th>
							                <th>Chức Vụ</th>
							                <th>Chuyên Môn</th>
							                <th>Mã Hợp Đồng</th>
							                <th>Tên Hợp Đồng</th>
							                <th>Loại Hợp Đồng</th>
							                <th>Ngày Bắt Đầu</th>
							                <th>Ngày Kết Thúc</th>
							                <th>Xuất</th>
							                @if(Auth::User()->hasRole('supper_admin'))
							                <th>Sửa</th>
							                <th>Xóa</th>
							                @endif
                                        </tr>
                                        <tbody>
                                       <?php $i = 1; ?>
			                            @foreach($contract as $co)
				                            <tr id="tr_{{$co['id']}}">
				                            	<td><?php echo $i++;?></td>
								                <td>{{$co->User['name']}}</td>
								                 <td>{{$co->User->UserDepartment['user_id'] == null ? '' : $co->User->UserDepartment->Department['name']}}</td>
								                <td>{{$co->User->UserPositionJobtype['user_id'] == null ? '' : $co->User->UserPositionJobtype->Position['name']}}</td>
								                <td>{{$co->User->UserPositionJobtype['user_id'] == null ? '' : $co->User->UserPositionJobtype->Jobtype['name']}}</td>
								                <td>{{$co['code']}}</td>
								                <td>{{$co['name']}}</td>
								                <td>
													{{$co['type']}} tháng
								                </td>
								                <td>{{Carbon\Carbon::parse($co['from'])->format('d-m-Y')}}</td>
								                <td>{{Carbon\Carbon::parse($co['from'])->format('d-m-Y')}}</td>
								              	<td>
													<a href="contract/export/{{$co['id']}}"> <img src="images/pdf.png" width="24px" class="mrx"/></a>
								              	</td>
								              	@if(Auth::User()->hasRole('supper_admin'))
								                <td>
								               
								                	 <a href="contract/edit/{{$co['id']}}" class="btn btn-primary btn-xs" ><span class="fa fa-edit"></span>&nbsp;Sửa</span></a>
								           
			                                    </td>
								                <td>
			                                         <button type="button" data-target="#modal-default" data-id="{{$co['id']}}" data-toggle="modal" class="btn btn-primary btn-xs btn_delete"><i
			                                            class="fa fa-trash-o"></i>&nbsp;Xóa</button>
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
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
               <h4 id="modal-default-label" class="modal-title">Xóa</h4></div>
           <div class="modal-body">Bạn có chắc chắn muốn xóa không?</div>
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
                url: 'contract/delete',
                dataType: 'text',
                data: {id : id },
                success: function(data){
                    $('#tr_' + id).fadeOut();
                    $('#tr_' + id).remove();
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

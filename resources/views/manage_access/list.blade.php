@extends('layouts.app')

@section('content')
<div class="manage_access">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Quản Lý Truy Cập</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Quản Lý Truy Cập</li>
    </ol>
</div>

<div class="table_manage_access">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-blue">
	            	<div class="panel-heading head_manage_access">
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
							                <th>Mã Nhân viên</th>
							                <th>Tên</th>
							                <th>Email</th>
							                <th>Chức vụ</th>
							                <th>Phòng Ban</th>
							                <th>Trạng Thái</th>
                                        </tr>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($user as $us)
                                         	<tr>
				                                <td><?php echo $i++; ?></td>
								                <td>{{$us['username']}}</td>
								                <td>{{$us['name']}}</td>
								                <td>{{$us['email']}}</td>
								                <td>{{$us->UserPositionJobtype['user_id'] == null ? '' : $us->UserPositionJobtype->Position['name']}}</td>
								                <td>{{$us->UserDepartment['user_id'] == null ? '' : $us->UserDepartment->Department['name']}}</td>
								                <td>
					                                <!-- <div id="enable" data-on="success" data-off="danger"
					                                    class="make-switch switch-small"><input type="checkbox" checked="checked" class="switch" name="test"/>
					                                </div> -->

					                                 <div class="form-group">
			                                            <select class="form-control click_status" id="{{$us->id}}" name="active">
			                                                <option value="1"
			                                                    @if($us->active == 1)
			                                                        selected
			                                                    @endif 
			                                                >Hoạt Động</option>
			                                                <option value="0"
			                                                    @if($us->active == 0)
			                                                        selected
			                                                    @endif 
			                                                >Ngưng Hoạt Động</option>
			                                            </select>
			                                        </div>
					                            </td>
				                            </tr>
                                       	@endforeach
                                        </tbody>
                                        </thead></table>
                                </div>
                                </form>
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
	$('.click_status').on('change', function(){
	    var status = $(this).val();
	    var id_user = $(this).attr('id');
	        
	    $.ajaxSetup(
		{
		    headers:
		    {
		        'X-CSRF-Token': $('input[name="_token"]').val()
		    }
		});

	    $.ajax({
	        type: 'POST',
	        url: 'manage-access/update',
	        dataType: 'text',
	        data: {status: status, id: id_user},
	        success: function(data){
	        }
	    });
	});
});
</script>
@endsection
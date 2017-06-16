@extends('layouts.app')
@section('title','Danh Sách Nhân Viên')
@section('content')
    <style>
        .dropdown.dropdown-lg .dropdown-menu {
            margin-top: -1px;
            padding: 6px 20px;
        }
        .input-group-btn .btn-group {
            display: flex !important;
        }
        .btn-group .btn {
            border-radius: 0;
            margin-left: -1px;
        }
        .btn-group .btn:last-child {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .btn-group .form-horizontal .btn[type="submit"] {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .form-horizontal .form-group {
            margin-left: 0;
            margin-right: 0;
        }
        .form-group .form-control:last-child {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
		
        @media screen and (min-width: 768px) {
            #adv-search {
                width: 500px;
                margin: 0 auto;
            }
            .dropdown.dropdown-lg {
                position: static !important;
            }
            .dropdown.dropdown-lg .dropdown-menu {
                min-width: 500px;
            }
        }
    </style>
<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Nhân Viên</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Danh Sách Nhân Viên</li>
    </ol>

    <div class="clearfix"></div>
</div>



<div class="table_list_notification">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-blue">
	            	<div class="panel-heading">
	            		<span>Danh Sách</span>
	            		<a href="employee/add" class="btn btn-info btn_access_save btn-sm"><i class="fa fa-plus">&nbsp;Thêm</i></a>
	            		<a href="employee/import" class="btn btn-info btn_access_save btn-sm"><img src="images/xls.png" width="17px" class="mrx"/>&nbsp;Nhập Excel</i></a>
	            		<div class="btn-group" style="float: right;"><span  data-toggle="dropdown" class="btn btn-warning btn-sm dropdown-toggle"><i  class="fa fa-wrench"></i>&nbsp; Xuất File</span>
                                    <ul class="dropdown-menu">
                                        <li><a href="employee/export"> <img src="images/xls.png" width="24px" class="mrx"/>Xuất Excel</a></li>
                                        <li><a href="employee/export/pdf"> <img src="images/pdf.png" width="24px" class="mrx"/>Xuất Pdf</a></li>
                                    </ul>
                        </div>
				
	            		 <!-- SEARCH -->
						<div class="btn-group pull-right page-toolbar search-employee" role="group" style="margin-right: 20px">
						    <div class="dropdown dropdown-lg">
						        <button type="button" class="btn btn-info btn-sm btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						            <i class="fa fa-angle-down"></i>
						            Tìm kiếm
						        </button>
						        <div class="dropdown-menu dropdown-menu-right pull-right" role="menu">
						            <form class="form-horizontal" role="form">
						                <div class="form-group">
						                    <label class="color_search">Mã Nhân Viên</label>
						                    <input class="form-control reset-value" type="text" name="code"  value="{{$username}}" />
						                </div>
						                <div class="form-group">
						                    <label class="color_search">Tên Nhân Viên</label>
						                    <input class="form-control reset-value" type="text" name="name"  value="{{$name}}" />
						                </div>
						                <div class="form-group">
						                    <label class="color_search">Email</label>
						                    <input class="form-control reset-value" type="text" name="email"  value="{{$email}}" />
						                </div>
						                <div class="form-group">
						                    <label class="color_search">Giới Tính</label>
						                 	<div class="form-group">
												  <select class="form-control " name="gender">
												    <option value=""
														@if($gender == 2)
															selected
														@endif 
												    >Tất Cả</option>
												    <option value="1" class="select-remove" 
														@if($gender == 1)
															selected
														@endif 
												    >Nam</option>
												    <option value="0" class="select-remove" 
														@if($gender == 0)
															selected
														@endif 
												    >Nữ</option>
												  </select>
											</div>
						                </div>
						                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						                <button type="reset" class="btn btn-info" id="reset">Đặt lại</button>
						            </form>
						        </div>
						    </div>
						</div>
						<!-- END SEARCH -->

	            	</div>
	               <div class="panel-body">
	               		<div class="alert alert-success" id="report_delete" style="display: none">Đã xoá nhân viên thành công</div>
	            
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
		                                <thead>
				                            <tr>
								                <th>Mã Nhân Viên</th>
								                <th>Tên Nhân Viên</th>
								                <th>Email</th>
								                <th>Giới Tính</th>
								                <th>Số Điện Thoại</th>
								                <th>Phòng Ban</th>
								                <th>Chức Vụ</th>
								                <th>Chuyên Môn</th>
								                <th>Hợp Đồng</th>
								                <th>Hồ Sơ</th>
								                <th>Sửa</th>
								                <th>Xóa</th>
				                            </tr>
			                            </thead>
			                            <tbody id="add_row">
			                            @foreach($user as $us)
				                            <tr class="tr{{$us['id']}}">
								                <td>{{$us['username']}}</td>
								                <td>{{$us['name']}}</td>
								                <td>{{$us['email']}}</td>
								                <td>
													@if($us['gender'] == 1)
														Nam
													@else
														Nữ
													@endif
								                </td>
								                <td>{{$us['phone_number']}}</td>
								                <td>{{$us->UserDepartment['user_id'] == null ? '' : $us->UserDepartment->Department['name']}}</td>
								                <td>{{$us->UserPositionJobtype['user_id'] == null ? '' : $us->UserPositionJobtype->Position['name']}}</td>
								                <td>{{$us->UserPositionJobtype['user_id'] == null ? '' : $us->UserPositionJobtype->Jobtype['name']}}</td>
								                <td>
								                	@if($us->Contract['employee'])
								                	 <a href="contract/edit/{{$us->Contract['id']}}" class="btn btn-primary btn-xs" ><span class="fa fa-edit"></span>&nbsp;Sửa</span></a>
								                	@else
								                	<a href="contract/add/{{$us['id']}}" class="btn btn-info btn-xs" ><span class="fa fa-plus"></span>&nbsp;Tạo</span></a>
								                	 @endif
								                </td>
								                <td><a href="profile/{{$us['id']}}" class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-hand-up"></span>&nbsp;Xem</span></a>
													
								                </td>
								                <td>
								             
								                	 <a href="employee/edit/{{$us['id']}}" class="btn btn-primary btn-xs" ><span class="fa fa-edit"></span>&nbsp;Sửa</span></a>
								         
			                                    </td>
								                <td>
			                                         <button type="button" data-target="#modal-default" data-id="{{$us['id']}}" data-toggle="modal" class="btn btn-primary btn-xs btn_delete"><i
			                                            class="fa fa-trash-o"></i>&nbsp;Xóa</button>
			                                    </td>
				                            </tr>
				                        @endforeach
			                            </tbody>
                                    </table>
                                      <!-- Phân trang -->
                         			<div class="paginate" align="center">
												{!!$user->render()!!}
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
               <h4 id="modal-default-label" class="modal-title">Xóa Nhân Viên</h4></div>
           <div class="modal-body">Bạn có chắc chắn muốn xóa không?</div>
           <div class="modal-footer">
               <button type="button" data-dismiss="modal" class="btn btn-default">Không</button>
               <button type="button" data-dismiss="modal" class="btn btn-primary btn_confirm">Có</button>
           </div>
       </div>
   </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	
	<!-- /.modal-dialog --> 
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
                url: 'employee/delete',
                dataType: 'text',
                data: {id : id },
                success: function(data){
                    $('.tr' + id).fadeOut();
                    $('.tr' + id).remove();
                    $("#report_delete").show();
                    setTimeout(function()
                    {
                        $('#report_delete').fadeOut();
                    },4000);
                }
            });
        }); 
	});

	//Reset search form
    $('#reset').on('click',function() {
        $('.reset-value').removeAttr('value');
        $('.select-search').attr('selected','selected');
        $('.select-remove').removeAttr('selected');
        $('.dropdown-menu').click(function(e) {  //Ngừng đóng dropdown-menu
            e.stopPropagation();
        });
    });
</script>

@endsection

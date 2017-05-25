@extends('layouts.app')
@section('script')

<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
@endsection
@section('content')

<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">List Khen Thưởng</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Tables</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Responsive Tables</li>
    </ol>
    <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden" name="endstart"/>
    </div>
    <div class="clearfix"></div>
</div>

<div class="table_list_notification">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-blue">
	            	<div class="panel-heading">
	            		<span>List</span>
	            		<button class="btn btn-info btn-sm btn_access_save" data-title="Add" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp;Add</i></button>
	            	</div>
	            	<div class="employee" style="margin: 10px;">
	            		<div class="container">
	            		<form class="form-inline">
						  <div class="form-group ui-widget">
						    <label for="searchname">Tên Nhân Viên:</label>
						    <input type="text" class="form-control" id="searchname"	name="searchname" autocomplete>
						  </div>
							<div class="form-group">
							    <label for="pwd">Loại Quyết Định:</label>
							    <div class="form-group">
								  <select class="form-control" id="sel1">
								    <option>Khen Thưởng</option>
								    <option>Kỷ Luật</option>
								  </select>
								</div>
						  	</div>
						  <button type="submit" class="btn btn-info"><i class="fa fa-search">&nbsp;Search</i></button>
						  <div id="user_preview">
						  	
						  </div>	
						</form>
						</div>
	            	</div>
	                <div class="panel-body">
	                    <div id="flip-scroll">
	                        <table class="table table-hover table-striped table-bordered tablesorter display dataTable no-footer" id="table_id">
	                            <thead class="cf">
	                            <tr>
		                            <th>STT</th>
		                            <th>Mã Nhân Viên</th>
		                            <th>Tên Nhân Viên</th>
					                <th>Số Hiệu</th>
					                <th>Loại Quyết Định</th>
					                <th>Lý Do</th>
					                <th>Hình Thức thi hành</th>
					                <th>Ngày ra quyết định</th>
					                <th>Edit</th>
					                <th>Delete</th>
	                            </tr>
	                            </thead>
	                            <tbody>
	                            <tr>
	                                <td>1</td>
	                                <td>NV001</td>
	                                <td>Công Binh</td>
					                <td>QDKT2017</td>
					                <td>Khen Thưởng</td>
					                <td>Làm việc tốt</td>
					                <td>Tăng lương thêm 500k</td>
					                <td>20/4/2017</td>
					                <td>
					                	<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span>&nbsp;Edit</button></p>                                            
                                    </td>
					                <td>
                                         <button type="button" data-target="#modal-default" data-toggle="modal" class="btn btn-primary btn-xs"><i
                                            class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                    </td>
	                            </tr>
	                            </tbody>
	                        </table>
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
                <h4 id="modal-default-label" class="modal-title">Delete</h4></div>
            <div class="modal-body">Are you sure you want to delete?</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	      <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
	    </div>
	    <div class="modal-body">
	      	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Tên Nhân Viên <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input class="form-control " type="text" placeholder="Xin Hãy nhập vào tên chức danh">
	      	</div>
	      	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Mã Nhân viên <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input class="form-control " type="text" placeholder="Xin Hãy nhập vào mã chức danh">
	      	</div>
	      	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Số Hiệu <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input class="form-control " type="text" placeholder="Xin Hãy nhập vào mã chức danh">
	      	</div>
	      	<div class="form-group">
			    <label for="pwd">Loại Quyết Định:</label>
			    <span class='require'>*</span>
			    <div class="form-group">
				  <select class="form-control" id="sel1">
				  	<option>Tất cả</option>
				    <option>Khen Thưởng</option>
				    <option>Kỷ Luật</option>
				  </select>
				</div>
		  	</div>
		  	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Lý Do <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input class="form-control " type="text" placeholder="Xin Hãy nhập vào mã chức danh">
	      	</div>
	      	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Hình Thức Thi Hành <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input class="form-control " type="text" placeholder="Xin Hãy nhập vào mã chức danh">
	      	</div>
	      	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Ngày Ra Quyết Định <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input type="text" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" class="datepicker-default form-control"/>
	        </div>
	    </div>
	    <div class="modal-footer ">
	      <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
	    </div>
	  </div>
	  <!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>

<!-- MODAL ADD -->
<form action="{{route('retribution')}}" method="POST">
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	      <h4 class="modal-title custom_align" id="Heading">Ra Quyết Định</h4>
	    </div>

	    <div class="modal-body">
	    
	      	<div class="form-group ui-widget">
	    		<label for="inputFirstName" class="control-label ">Tên Nhân Viên <span class='require'>*</span></label>
	    		 <input type="text" class="form-control" id="add_staff"	name="staff" autocomplete>
	    	</div>
	      	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Quyết Định Số <span class='require'>*</span></label>
	    		<input name="so_qd" class="form-control" type="text" placeholder="VD: QDKT2017">
	    	</div>
	      	<div class="form-group">
			    <label for="pwd">Loại Quyết Định</label>
			    <span class='require'>*</span>
			    <div class="form-group">
				  <select name="loai_qd" class="form-control" id="sel1">
				    <option value="khenthuong">Khen Thưởng</option>
				    <option value="kyluat">Kỷ Luật</option>
				  </select>
				</div>
		  	</div>
		  	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Lý Do <span class='require'>*</span></label>
	    		<textarea name="lydo_qd" rows="5" cols="78" style="resize: none;"></textarea>
	    	</div>
	      	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Hình Thức <span class='require'>*</span></label>
	    		<input name="hinhthuc_qd" class="form-control " type="text" placeholder="">
	    	</div>
	      	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Ngày Ra Quyết Định <span class='require'>*</span></label>
	    		<div data-date-format="dd/mm/yyyy" class="input-group date datepicker-filter mbs">
	    			<input name="ngay_qd" type="text" readonly="" class="form-control" value="{{Carbon\Carbon::today()->format('d/m/Y')}}" />
	    			<span class="input-group-addon" id="date_QD"><i class="fa fa-calendar"></i></span>
	    		</div>
	    	</div>
	    	
	    </div>
	    <div class="modal-footer ">
	      <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Add</button>
	    </div>
	  </div>
	  <!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>
</form>
</div>
<script type="text/javascript">
		$('#searchname').autocomplete({
			source : '{!!URL::route('autocomplete')!!}',
			minlength: 1,
			autoFocus: true,
			select:function(e,ui){
				$('#user_preview').text(ui.item.name)
			}
		});
		$('#add_staff').autocomplete({
			source : '{!!URL::route('autocomplete')!!}',
			minlength: 1,
			autoFocus: true
		});		
		$(document).ready(function() {
		  $('#tablesorterX').DataTable();
		});
</script>

@endsection

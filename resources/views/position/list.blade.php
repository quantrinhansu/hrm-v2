@extends('layouts.app')
@section('title','Danh Sách Chức Vụ')
@section('content')

<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Chức Vụ</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Danh Sách Chức Vụ</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
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
	            		<button class="btn btn-info btn_access_save btn-sm btn_test" data-title="Add" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp;Thêm</i></button>
	            	</div>
	               <div class="panel-body">
	               		<div class="alert alert-success" id="report_delete" style="display: none">Đã xoá chức vụ thành công</div>
	               		<div class="alert alert-success" id="report_add" style="display: none">Bạn đã thêm chức vụ thành công</div>
	               		<div class="alert alert-success" id="report_edit" style="display: none">Bạn đã sửa chức vụ thành công</div>
                        
                        <div class="row mbm">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="table_id"
                                           class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                        <thead>
                                        <tr>
                                        	<th>STT</th>
                                            <th>Tên Chức Vụ</th>
							                <th>Mã Chức Vụ</th>
							                <th>Ngày Tạo</th>
							                <th>Ngày Sửa</th>
							                <th>Sửa</th>
							                <th>Xóa</th>
                                        </tr>
                                        <tbody>
                                        <?php $i = 1; ?>
                                         @foreach($position as $po)
				                            <tr class="tr{{$po['id']}}">
				                            	<td><?php echo $i++; ?></td>
								                <td id="name_{{$po->id}}">{{$po['name']}}</td>
								                <td id="description_{{$po->id}}">{{$po['code']}}</td>
								                <td id="created_date_{{$po->id}}">{{ Carbon\Carbon::parse($po['created_at'])->format('d-m-Y') }}</td>
								                <td id="created_update_{{$po->id}}">{{ Carbon\Carbon::parse($po['updated_at'])->format('d-m-Y') }}</td>
								                <td>
								                    <a class="btn btn-primary btn-xs btn_update" id="{{$po['id']}}"><span class="fa fa-edit"></span>&nbsp;Sửa</span></a>          
			                                    </td>
								                <td>
			                                         <button type="button" data-target="#modal-default" data-id="{{$po['id']}}" data-toggle="modal" class="btn btn-primary btn-xs btn_delete"><i
			                                            class="fa fa-trash-o"></i>&nbsp;Xóa</button>
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

<!-- MODAL EDIT -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	      <h4 class="modal-title custom_align" id="Heading">Thêm Chức Vụ</h4>
	    </div>

	    <div class="alert alert-danger someDivToDisplayErrors_add" hidden>
              <p class="errorMsg_add"></p>
              <p class="errorMsg1_add"></p>
      	</div>
	    <form id="myform">
	    	<input type="hidden" name="_token" value="{{csrf_token()}}">
	    <div class="modal-body">
	    	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Mã Chức Vụ <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input class="form-control input" name="description" type="text" placeholder="Xin Hãy nhập mã chức vụ" value="">
	      	</div>
	    	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Tên Chức Vụ <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input class="form-control input" name="name" type="text" placeholder="Xin Hãy nhập tên chức vụ" value="">
	      	</div>
	    </div>
	    </form>
	    <div class="modal-footer ">
  			<button type="button" class="btn btn-warning btn-lg" id="btn_add" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" ></span>&nbsp;Thêm</button>
	    </div>
	  </div>
	  <!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>

</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#report").hide();
	function formatDate (input) {
	  var datePart = input.match(/\d+/g),
	  year = datePart[0], // get only two digits
	  month = datePart[1], day = datePart[2];

	  return day+'-'+month+'-'+year;
	}

	$('.btn_test').click(function(){
		$('.someDivToDisplayErrors_add').attr("hidden","true");
	});
	
	$('#btn_add').click(function(){
		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
          url : "position/add",
          type: "POST",
          dataType: 'json',
          data: new FormData($('#myform')[0]),
          processData: false,
          contentType: false,
          success:function(data){
          	  //Nếu có valdate
            if (typeof data.errors != 'undefined') {
              $('.someDivToDisplayErrors_add').removeAttr('hidden');

              if(data.errors.name){
                $('.errorMsg_add').css('display', 'block');
                $('.errorMsg_add').text(data.errors.name);
               }else{
                  $('.errorMsg_add').hide();
               }

               	if(data.errors.description){
	                $('.errorMsg1_add').css('display', 'block');
		            $('.errorMsg1_add').text(data.errors.description);
	            }else{
	                  $('.errorMsg1_add').hide();
	            }
            }else{
            	$('.input').val("");
            	$('.someDivToDisplayErrors_add').attr("hidden","true");
            	$('#add').modal('toggle'); 
            	location.reload();
            	$("#report_add").show();
                setTimeout(function()
                {
                    $('#report_add').fadeOut();
                },4000);
            }             
          }
      	});
	});

	$('.btn_update').click(function(){
		$('.someDivToDisplayErrors').removeAttr('hidden');
		var id= $(this).attr('id');;
		$modal = $('#edit');
        $modal.load("position/edit/" + id);
        $modal.modal('show');
	});

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
                url: 'position/delete',
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
});
</script>
@endsection

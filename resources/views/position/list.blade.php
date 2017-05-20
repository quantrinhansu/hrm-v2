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
	            		<button class="btn btn-info btn_access_save" data-title="Add" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp;Thêm</i></button>
	            	</div>
	               <div class="panel-body">
	               		<div class="alert alert-success" id="report" style="display: none">Đã xoá chức vụ thành công</div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
		                                <thead>
				                            <tr>
								                <th>Tên Chức Vụ</th>
								                <th>Mã Chức Vụ</th>
								                <th>Ngày Tạo</th>
								                <th>Sửa</th>
								                <th>Xóa</th>
				                            </tr>
			                            </thead>
			                            <tbody id="add_row">
			                            @foreach($position as $po)
				                            <tr class="tr{{$po['id']}}">
								                <td id="name_{{$po->id}}">{{$po['name']}}</td>
								                <td id="description_{{$po->id}}">{{$po['code']}}</td>
								                <td id="created_date_{{$po->id}}">{{ Carbon\Carbon::parse($po['created_date'])->format('d-m-Y') }}</td>
								                <td>
								                	<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs btn_update" data-promotion_id="{{$po['id']}}" data-name="{{$po['name']}}" data-description="{{$po['code']}}" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span>&nbsp;Sửa</button></p>                                            
			                                    </td>
								                <td>
			                                         <button type="button" data-target="#modal-default" data-id="{{$po['id']}}" data-toggle="modal" class="btn btn-primary btn-xs btn_delete"><i
			                                            class="fa fa-trash-o"></i>&nbsp;Xóa</button>
			                                    </td>
				                            </tr>
				                        @endforeach
			                            </tbody>
                                    </table>
                                </div>
                                <div class="paginate" style="text-align: center;">
				                 <!-- Phân trang -->
				                    {!!$position->appends(request()->input())->links()!!}
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
               <h4 id="modal-default-label" class="modal-title">Delete</h4></div>
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
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	      <h4 class="modal-title custom_align" id="Heading">Sửa Chức Vụ</h4>
	    </div>
	
	    <div class="alert alert-danger someDivToDisplayErrors" hidden>
	              <p class="errorMsg"></p>
	              <p class="errorMsg1"></p>
	      	</div>
	    <form id="edit_form_position">
	    	<input type="hidden" name="_token" value="{{csrf_token()}}">
	    <div class="modal-body">
	    	<div class="form-group">
			  <label for="comment">Mã Chức Vụ <span class='require'>*</span></label>
			  <input class="form-control" id="description" name="code" type="text" placeholder="Xin Hãy nhập tên chức vụ">
			</div>
	    	<div class="form-group">
	    		<label for="inputFirstName" class="control-label">Tên Chức Vụ <span class='require'>*</span></label>
	    	</div>
	      	<div class="form-group">
	        	<input class="form-control" name="name" id="name" type="text" placeholder="Xin Hãy nhập tên chức vụ">
	        	<input class="form-control" name="id" id="id" type="hidden">
	      	</div>
	    </div>
	    </form>
	    <div class="modal-footer ">
	  			<button type="button" class="btn btn-warning btn-lg" id="btn_update_position" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" ></span>Sửa</button>
	    </div>
	  </div>
	  <!-- modal-content -->
	</div>
	<!-- modal-dialog  -->
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	      <h4 class="modal-title custom_align" id="Heading">Thêm Chức Vụ</h4>
	    </div>

	    <div class="alert alert-danger someDivToDisplayErrors" hidden>
              <p class="errorMsg"></p>
              <p class="errorMsg1"></p>
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
              $('.someDivToDisplayErrors').removeAttr('hidden');

              if(data.errors.name){
                $('.errorMsg').css('display', 'block');
                $('.errorMsg').text(data.errors.name);
               }else{
                  $('.errorMsg').hide();
               }

               	if(data.errors.description){
	                $('.errorMsg1').css('display', 'block');
		            $('.errorMsg1').text(data.errors.description);
	            }else{
	                  $('.errorMsg1').hide();
	            }
            }else{
            	var id = data.id;
            	var add_promotion = '<tr><td id="name_' + id + '"> '+ data.name +'</td>';
            		add_promotion += '<td id="description_' + id + '"> ' + (data.code == null ? '' : data.code) + '</td>';
            		add_promotion += '<td id="created_date_' + id + '"> ' + formatDate (data.created_at); + '</td>';
            		add_promotion += '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span>&nbsp;Sửa</button></p></td>';
            		add_promotion += '<td><button type="button" data-target="#modal-default" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button></td></tr>';
            	$('#add_row').prepend(add_promotion);
            	$('.input').val("");
            	$('.someDivToDisplayErrors').attr("hidden","true");
            	$('#add').modal('toggle'); 
            }             
          }
      	});
	});

	$('.btn_update').click(function(){
		$('#name').val($(this).data('name'));
		$('#description').val($(this).data('description'));
		$('#id').val($(this).data('promotion_id'));
		$('.someDivToDisplayErrors').attr("hidden","true");
	});

	$('#btn_update_position').click(function(){

		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var id = $('#id').val();
		$.ajax({
			url : "position/edit",
	        type: "POST",
	        dataType: 'json',
	        data: new FormData($('#edit_form_position')[0]),
	        processData: false,
	        contentType: false,
			success:function(data){
					//Nếu có valdate
	            if (typeof data.errors != 'undefined') {
	              $('.someDivToDisplayErrors').removeAttr('hidden');

		            if(data.errors.name){
		                $('.errorMsg').css('display', 'block');
		                $('.errorMsg').text(data.errors.name);
		               }else{
		                  $('.errorMsg').hide();
		               }

	               	if(data.errors.code){
		                $('.errorMsg1').css('display', 'block');
			            $('.errorMsg1').text(data.errors.code);
		            }else{
		                  $('.errorMsg1').hide();
		            }
	            }else{
					$('#name_' + id).text(data.name);
					$('#description_' + id).text(data.code);

					// Update button data-attr .action-update
					// $('.btn_update').data('name', data.name);
					// $('.btn_update').data('description', data.code);

					 $('#edit').modal('toggle');
				}
			}
		});
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
                    $("#report").show();
                    setTimeout(function()
                    {
                        $('#report').fadeOut();
                    },4000);
                }
            });
        }); 
	});
});
</script>
@endsection

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      <h4 class="modal-title custom_align" id="Heading">Sửa Chuyên Môn</h4>
    </div>

    <div class="alert alert-danger someDivToDisplayErrors" hidden>
          <p class="errorMsg"></p>
          <p class="errorMsg1"></p>
  	</div>
    <form id="edit_form_position">
    	<input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="modal-body">
    	<div class="form-group">
		  <label for="comment">Mã Chuyên Môn <span class='require'>*</span></label>
		  <input class="form-control" id="description" name="code" type="text" placeholder="Xin Hãy nhập mã chuyên môn" value="{{$jobtype['code']}}">
		</div>

    	<div class="form-group">
    		<label for="inputFirstName" class="control-label">Tên Chuyên Môn <span class='require'>*</span></label>
    	</div>
      	<div class="form-group">
        	<input class="form-control" name="name" id="name" type="text" placeholder="Xin Hãy nhập tên chuyên môn" value="{{$jobtype['name']}}">
        	<input class="form-control" name="id" id="id" type="hidden" value="{{$jobtype['id']}}">
      	</div>
    </div>
    </form>
    <div class="modal-footer ">
			<button type="button" class="btn btn-warning btn-lg" id="btn_update_position" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Sửa</button>
    </div>
  </div>
  <!-- /.modal-content --> 
</div>

<script type="text/javascript">
	$('#btn_update_position').click(function(){
		$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var id = $('#id').val();
		$.ajax({
			url : "jobtype/edit",
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
					 $('.btn_update').data('name', data.name);
					 $('.btn_update').data('description', data.code);

					 $('#edit').modal('toggle');
					 $("#report_edit").show();
                    setTimeout(function()
                    {
                        $('#report_edit').fadeOut();
                    },4000);
				}
			}
		});
	});
</script>
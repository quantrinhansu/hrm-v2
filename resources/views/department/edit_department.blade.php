<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      <h4 class="modal-title custom_align" id="Heading">Sửa Phòng Ban</h4>
    </div>

    <div class="alert alert-danger someDivToDisplayErrors" hidden>
          <p class="errorMsg"></p>
          <p class="errorMsg1"></p>
    </div>
    <form id="edit_form_department">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="modal-body">
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Mã Phòng Ban <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control"  id="code" name="code" type="text" placeholder="Xin Hãy nhập mã phòng ban" value="{{$department['code']}}">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Tên Phòng Ban <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control" id="name" name="name" type="text" placeholder="Xin Hãy nhập tên phòng ban" value="{{$department['name']}}">
            <input class="form-control" id="department_id" name="department_id" value="{{$department['id']}}" type="hidden">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Trưởng Phòng <span class='require'>*</span></label>
        </div>
        
        <div class="form-group">
            <select class="form-control" name="manager">
                @foreach($user as $us)
                    <option 
                      @if($us['manager'] == 1)
                        selected
                      @endif 
                    value="{{$us->id}}">{{$us->username}}</option>
                @endforeach
            </select>
        </div>
   
    </div>
    </form>
    <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" id="btn_update_department" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" ></span>&nbsp;Sửa</button>
    </div>
  </div>
  <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 


<script type="text/javascript">
$(document).ready(function(){
  $('#btn_update_department').click(function(){
        var id= $('#department_id').val();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : "department/edit",
            type: "POST",
            dataType: 'json',
            data: new FormData($('#edit_form_department')[0]),
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
                    $('#manager_' + id).text(data.user_name);

                     $('#edit').modal('toggle');
                }
            }
        });

    });

});
</script>

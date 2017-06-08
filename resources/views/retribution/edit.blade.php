
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      <h4 class="modal-title custom_align" id="Heading">Quyết Định</h4>
    </div>
    <div class="alert alert-danger someDivToDisplayErrors_edit" hidden>
        <p class="error_code_edit"></p>
        <p class="error_staff_edit"></p>
        <p class="error_reason_edit"></p>
        <p class="error_description_edit"></p>
    </div>
    <div class="modal-body">
    <form id="form_retribution_edit">
        <div class="form-group ui-widget">
            <label for="inputFirstName" class="control-label ">Tên Nhân Viên <span class='require'>*</span></label>
             <input type="text" class="form-control input" id="edit_staff" name="staff" autocomplete value="{{$retribution->User['username']}} ({{$retribution->User['name']}})">
             <input type="hidden" name="id_retribution" id="id_retribution" value="{{$retribution['id']}}">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Quyết Định Số <span class='require'>*</span></label>
            <input name="code" class="form-control input" type="text" placeholder="VD: QDKT2017" value="{{$retribution['code']}}">
        </div>
        <div class="form-group">
            <label for="pwd">Loại Quyết Định</label>
            <span class='require'>*</span>
            <div class="form-group">
              <select name="decide" class="form-control">
                <option value="khenthuong"
                    @if($retribution['decide'] == 'khenthuong')
                        selected
                    @endif 
                >Khen Thưởng</option>
                <option value="kyluat"
                    @if($retribution['decide'] == 'kyluat')
                        selected
                    @endif 
                >Kỷ Luật</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Lý Do <span class='require'>*</span></label>
            <textarea name="reason" rows="5" style="width: 100%" placeholder="VD: Làm việc tốt">{{$retribution['reason']}}</textarea>
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Hình Thức <span class='require'>*</span></label>
            <input name="description" class="form-control input" type="text" placeholder="VD: Tăng lương thêm 500k" value="{{$retribution['description']}}">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Ngày Ra Quyết Định <span class='require'>*</span></label>
            <div data-date-format="dd/mm/yyyy" class="input-group date datepicker-filter mbs">
                <input name="create_date" type="text" readonly="" class="form-control" value="{{Carbon\Carbon::parse($retribution['create_date'])->format('d/m/Y') }}" />
                <span class="input-group-addon" id="date_QD"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
    </form>    
    </div>
    <div class="modal-footer ">
      <button type="button" class="btn btn-warning btn-lg" id="btn_update_retribution" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Sửa</button>
    </div>
  </div>
  <!-- /.modal-content --> 
</div>




<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

    $('#edit_staff').autocomplete({
        source : '{!!URL::route('autocomplete')!!}',
        minlength: 1,
        autoFocus: true
    });
$(document).ready(function(){
    $('#btn_update_retribution').click(function(){
        $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

        var id = $('#id_retribution').val();

        $.ajax({
            url : "retribution/edit",
            type: "POST",
            dataType: 'json',
            data: new FormData($('#form_retribution_edit')[0]),
            processData: false,
            contentType: false,
            success:function(data){
                    //Nếu có valdate
                if (typeof data.errors != 'undefined') {
                  $('.someDivToDisplayErrors_edit').removeAttr('hidden');

                    if(data.errors.staff){
                        $('.error_staff_edit').css('display', 'block');
                        $('.error_staff_edit').text(data.errors.staff);
                    }else{
                          $('.error_staff_add').hide();
                    }

                    if(data.errors.code){
                        $('.error_code_edit').css('display', 'block');
                        $('.error_code_edit').text(data.errors.code);
                    }else{
                          $('.error_code_edit').hide();
                    }

                    if(data.errors.description){
                        $('.error_description_edit').css('display', 'block');
                        $('.error_description_edit').text(data.errors.description);
                    }else{
                          $('.error_description_edit').hide();
                    }

                    if(data.errors.reason){
                        $('.error_reason_edit').css('display', 'block');
                        $('.error_reason_edit').text(data.errors.reason);
                    }else{
                          $('.error_reason_edit').hide();
                    }
                }else{
                    $('#username_' + id).text(data.username);
                    $('#name_' + id).text(data.name);
                    $('#code_' + id).text(data.code);
                    $('#decide_' + id).text(data.decide);
                    $('#reason_' + id).text(data.reason);
                    $('#description_' + id).text(data.description);
                    $('#create_date_' + id).text(data.create_date);

                    // Update button data-attr .action-update
                    // $('.btn_update').data('name', data.name);
                    // $('.btn_update').data('description', data.code);

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
});
    
</script>
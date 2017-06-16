<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      <h4 class="modal-title custom_align" id="Heading">Thêm Phòng Ban</h4>
    </div>

    <div class="alert alert-danger someDivToDisplayErrors" hidden>
          <p class="errorMsg"></p>
          <p class="errorMsg1"></p>
    </div>
    <form id="myform">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="modal-body">
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Mã Phòng Ban <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control"  id="code" name="code" type="text" placeholder="Xin Hãy nhập mã phòng ban">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Tên Phòng Ban <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control" id="name" name="name" type="text" placeholder="Xin Hãy nhập tên phòng ban">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Trưởng Phòng <span class='require'>*</span></label>
        </div>
        
        <div class="form-group">
             <input type="text" class="form-control input" id="add_staff" name="manager" autocomplete>
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

<script type="text/javascript">
$('#add_staff').autocomplete({
    source : '{!!URL::route('autocomplete-department')!!}',
    minlength: 1,
    autoFocus: true
});   

$(document).ready(function(){
    $('#btn_add').click(function(){
        $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

        $.ajax({
          url : "department/add",
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

                if(data.errors.code){
                    $('.errorMsg1').css('display', 'block');
                    $('.errorMsg1').text(data.errors.code);
                }else{
                      $('.errorMsg1').hide();
                }
            }//else{
                $('.input').val("");
              //  $('.someDivToDisplayErrors').attr("hidden","true");
                $('#add').modal('toggle'); 
                location.reload();
                $("#report_add").show();
                    setTimeout(function()
                    {
                        $('#report_add').fadeOut();
                    },4000);
            //}             
          }
        });
    });
});
</script>

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
            <select class="form-control" id="manager" name="manager">
                @foreach($user as $us)
                    <option 
                    value="{{$us->id}}">{{$us->username}}</option>
                @endforeach
            </select>
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
            }else{
                // var add_department = '<div class="col-sm-6 col-md-3" id="department_'+data.department_id+'">';
                // add_department += '<button type="button" data-target="#modal-default" data-id="'+data.department_id+'" data-toggle="modal" class="btn btn-primary btn-xs btn_delete" style="float:right; margin-left: 5px; margin-right: 5px;"><i class="fa fa-trash-o"></i></button>';
                // add_department += '<a class="btn_update" id="'+data.department_id+'" style="float:right; "><span class="glyphicon glyphicon-pencil"></span></a>';
                // add_department += '<div class="thumbnail"><img src="images/department.png" width="150px"/>';
                // add_department += '<div class="caption"><h3 style="text-align: center;">'+ data.name + '</h3>';
                // add_department += '<p style="text-align: center;">Trưởng Phòng: ' + data.first_name + ' ' + data.last_name;
                // add_department += '<p style="text-align: center;"><a href="department/detail/'+ data.department_id +'" role="button" class="btn btn-primary">Chi Tiết</a></p>';
                // add_department += '</div></div></div>';
                // $('.new_department').append(add_department);
                
                $('.input').val("");
              //  $('.someDivToDisplayErrors').attr("hidden","true");
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
});
</script>
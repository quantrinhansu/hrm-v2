 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      <h4 class="modal-title custom_align" id="Heading">Sửa Trang Chủ</h4>
    </div>

    <form id="myform" enctype= "multipart/form-data" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="modal-body">
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Tên Công Ty <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control input" name="name" type="text" placeholder="Xin Hãy nhập tên công ty" value="{{$home['name']}}">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Giám Đốc <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control input" name="director" type="text" placeholder="Xin Hãy nhập tên giám đốc" value="{{$home['director']}}">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Địa Chỉ <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control input" name="address" type="text" placeholder="Xin Hãy nhập địa chỉ" value="{{$home['address']}}">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Số Điện Thoại <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control input" name="phone_number" type="text" placeholder="Xin Hãy nhập tên chức vụ" value="{{$home['phone_number']}}">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Email <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control input" name="email" type="text" placeholder="Xin Hãy nhập email công ty" value="{{$home['email']}}">
        </div>
        <div class="form-group">
            <label for="inputFirstName" class="control-label">Logo <span class='require'>*</span></label>
        </div>
        <div class="form-group">
            <input class="form-control input" name="logo" type="file" value="{{$home['logo']}}">
        </div>
    </div>
    </form>
    <div class="modal-footer ">
        <button type="submit" class="btn btn-warning btn-lg" id="btn_edit" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" ></span>&nbsp;Sửa</button>
    </div>
  </div>
  <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 

<script type="text/javascript">
$(document).ready(function(){

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#btn_edit").click(function(event){
      event.preventDefault();
      $.ajax({
          url : "help/edit",
          type: "POST",
          dataType: 'json',
          data : new FormData($('#myform')[0]),
          processData: false,
          contentType: false,
          success:function(data){
            location.reload();
          }
      });

  });
});
</script>
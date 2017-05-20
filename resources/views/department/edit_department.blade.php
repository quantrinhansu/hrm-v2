<form id="upload_form" >
 <input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="modal-dialog" id="modal">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">Sửa Phòng Ban</h4>
        </div>
        <input type="hidden" name="department_id" value="{{$department['id']}}">
           <div class="alert alert-danger someDivToDisplayErrors" hidden>
              <p class="errorMsg"></p>
              <p class="errorMsg1"></p>
            </div>

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
                <input class="form-control" id="name" name="name" type="text" placeholder="Xin Hãy nhập tên phòng ban" value="{{$department['code']}}">
            </div>
            <div class="form-group">
                <label for="inputFirstName" class="control-label">Trưởng Phòng <span class='require'>*</span></label>
            </div>   
            <div class="form-group">
                <select class="form-control" id="manager" name="manager">
                    @foreach($user as $us)
                        <option value="{{$us->id}}">{{$us->username}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer ">
            <!-- xử lý ajax -->
        <!--     <button  id="update" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button> -->
            <button type="submit" class="btn btn-warning btn-lg btn_update_department"  style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" ></span>&nbsp;Sửa</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
</form>
<script type="text/javascript">
$(document).ready(function(){
    $('.btn_update_department').click(function(){
        alert('hi');
    });
});
</script>

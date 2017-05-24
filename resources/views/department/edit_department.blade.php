
    <div class="modal-dialog" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Sửa Phòng Ban</h4>
            </div>
            <form id="upload_form" action="#">
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
            </form>
            <div class="modal-footer ">
                <!-- xử lý ajax -->
            <!--     <button  id="update" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button> -->
                <a class="btn btn-warning btn-lg chobinh" id="chobinh" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" ></span>&nbsp;Sửa</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>

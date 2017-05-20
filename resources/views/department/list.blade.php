@extends('layouts.app')
@section('title','Danh Sách Phòng Ban')
@section('content')
<div class="list_department">

<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Phòng Ban</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Danh Sách Phòng Ban</a>
    </ol>
    <div class="clearfix"></div>
</div>
<!--END TITLE & BREADCRUMB PAGE-->
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div id="generalTabContent" class="tab-content responsive">
                    <button class="btn btn-info btn_access_save" data-title="Add" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp;Thêm</i></button>
                    <h3>Danh Sách Phòng Ban</h3>
                    <div class="row">
                    @foreach($department as $de)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail"><img src="images/department.png" width="150px"/>

                                <div class="caption"><h3 style="text-align: center;"><span id="name_{{$de['id']}}">{{$de['name']}}</span></h3>

                                    <p style="text-align: center;">Trưởng Phòng: <span id="manager_{{$de['id']}}">{{$de->User['first_name']}} {{$de->User['last_name']}}</span></p>

                                    <p style="text-align: center;"><a href="department/detail/{{$de['id']}}" role="button" class="btn btn-primary">Chi Tiết</a>
                                        <a class="btn_update" id="{{$de['id']}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="new_department"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <label for="inputFirstName" class="control-label">Mã Phòng Ban <span class='require'>*</span></label>
            </div>
            <div class="form-group">
                <input class="form-control" name="code" type="text" placeholder="Xin Hãy nhập mã phòng ban">
            </div>
            <div class="form-group">
                <label for="inputFirstName" class="control-label">Tên Phòng Ban <span class='require'>*</span></label>
            </div>
            <div class="form-group">
                <input class="form-control" name="name" type="text" placeholder="Xin Hãy nhập tên phòng ban">
            </div>
            <div class="form-group">
                <label for="inputFirstName" class="control-label">Trưởng Phòng <span class='require'>*</span></label>
            </div>
            <div class="form-group">
                <select class="form-control" name="manager">
                @foreach($user as $us)
                    <option value="{{$us->id}}">{{$us->username}}</option>
                @endforeach
                </select>
            </div>
        </div>
        </form>
        <div class="modal-footer ">
            <button type="button" class="btn btn-warning btn-lg" id="btn_add" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign" ></span>Thêm</button>
        </div>
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>

<!-- MODAL EDIT -->
<div class="modal fade"  id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

                              <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#btn_add').click(function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                var add_department = '<div class="col-sm-6 col-md-3">';
                add_department += '<div class="thumbnail"><img src="images/department.png" width="150px"/>';
                add_department += '<div class="caption"><h3 style="text-align: center;">'+ data.name + '</h3>';
                add_department += '<p style="text-align: center;">Trưởng Phòng: A';
                add_department += '<p style="text-align: center;"><a href="department/detail/'+ data.id +'" role="button" class="btn btn-primary">Chi Tiết</a></p>';
                add_department += '</div></div></div>';
                $('.new_department').append(add_department);
                $('#add').modal('toggle'); 
            }             
          }
        });
    });

    $('.btn_update').click(function(){
        var id =  $(this).attr('id');
        $modal = $('#edit');
        $modal.load("department/edit/" + id);
        $modal.modal('show');
    });

    /*$('#btn_update_department').click(function(){
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
                    $('#manager_' + id).text(data.first_name + ' ' + data.last_name);

                    // Update button data-attr .action-update
                     $('.btn_update').data('name', data.name);
                     $('.btn_update').data('code', data.code);

                     $('#edit').modal('toggle');
                }
            }
        });

    });*/
})
</script>
@endsection
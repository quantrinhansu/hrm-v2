@extends('layouts.app')
@section('title','Khen Thưởng - Kỷ Luật')
@section('script')

<link rel="stylesheet" href="assets/css/jquery-ui.css">
<script src="assets/js/jquery-1.9.1.js"></script>
<script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
@endsection

@section('content')
<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Khen Thưởng/Kỷ Luật</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Khen Thưởng/Kỷ Luật</a>
    </ol>
</div>

<div class="table_list_notification">
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <span>Danh Sách</span>
                        @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
                        <button class="btn btn-info btn-sm btn_access_save" data-title="Add" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp;Thêm</i></button>
                        @endif
                        <a href="retribution/export" class="btn btn-info btn_access_save btn-sm"><img src="images/xls.png" width="17px" class="mrx"/>&nbsp;Xuất Excel</i></a>
                    </div>
                   <div class="alert alert-success" id="report_delete" style="display: none">Đã xoá thành công</div>
                    <div class="panel-body">
                        <div class="row mbm">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="table_id"
                                           class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Nhân Viên</th>
                                            <th>Tên Nhân Viên</th>
                                            <th>Số Hiệu</th>
                                            <th>Loại Quyết Định</th>
                                            <th>Lý Do</th>
                                            <th>Hình Thức</th>
                                            <th>Ngày ra quyết định</th>
                                            @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                            @endif
                                        </tr>
                                        <tbody>
                                          <?php $i = 1; ?>
                                        @foreach($retribution as $re)
                                        <tr id="retribution_{{$re['id']}}">
                                            <td><?php echo $i++;?></td>
                                            <td id="username_{{$re['id']}}">{{$re->User['username']}}</td>
                                            <td id="name_{{$re['id']}}">{{$re->User['name']}}</td>
                                            <td id="code_{{$re['id']}}">{{$re['code']}}</td>
                                            <td id="decide_{{$re['id']}}">
                                                @if($re['decide'] == 'khenthuong')
                                                    Khen Thưởng
                                                @else
                                                    Kỷ Luật
                                                @endif
                                            </td>
                                            <td id="reason_{{$re['id']}}">{{$re['reason']}}</td>
                                            <td id="description_{{$re['id']}}">{{$re['description']}}</td>
                                            <td id="create_date_{{$re['id']}}">{{Carbon\Carbon::parse($re['create_date'])->format('d-m-Y')}}</td>
                                            @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
                                            <td>
                                                 <a class="btn btn-primary btn-xs btn_update" id="{{$re['id']}}"><span class="fa fa-edit"></span>&nbsp;Sửa</span></a>                                            
                                            </td>
                                            <td>
                                                 <button type="button" data-target="#modal-default" data-id="{{$re['id']}}" data-toggle="modal" class="btn btn-primary btn-xs btn_delete"><i
                                                        class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                       
                                        </tbody>
                                        </thead></table>
                                </div>
                            </div>
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
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-default-label" class="modal-title">Xoá Khen Thưởng/Kỷ Luật</h4></div>
            <div class="modal-body">Bạn có chắc chắn xuốn xóa?</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Không</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary btn_confirm">Có</button>
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
          <h4 class="modal-title custom_align" id="Heading">Quyết Định</h4>
        </div>
        <div class="alert alert-danger someDivToDisplayErrors_add" hidden>
            <p class="error_code_add"></p>
            <p class="error_staff_add"></p>
            <p class="error_reason_add"></p>
            <p class="error_description_add"></p>
        </div>
        <div class="modal-body">
        <form id="form_retribution_add">
            <div class="form-group ui-widget">
                <label for="inputFirstName" class="control-label ">Tên Nhân Viên <span class='require'>*</span></label>
                 <input type="text" class="form-control input" id="add_staff" name="staff" autocomplete>
            </div>
            <div class="form-group">
                <label for="inputFirstName" class="control-label">Quyết Định Số <span class='require'>*</span></label>
                <input name="code" class="form-control input" type="text" placeholder="VD: QDKT2017">
            </div>
            <div class="form-group">
                <label for="pwd">Loại Quyết Định</label>
                <span class='require'>*</span>
                <div class="form-group">
                  <select name="decide" class="form-control">
                    <option value="khenthuong">Khen Thưởng</option>
                    <option value="kyluat">Kỷ Luật</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFirstName" class="control-label">Lý Do <span class='require'>*</span></label>
                <textarea name="reason" rows="5" style="width: 100%" placeholder="VD: Làm việc tốt"></textarea>
            </div>
            <div class="form-group">
                <label for="inputFirstName" class="control-label">Hình Thức <span class='require'>*</span></label>
                <input name="description" class="form-control input" type="text" placeholder="VD: Tăng lương thêm 500k">
            </div>
            <div class="form-group">
                <label for="inputFirstName" class="control-label">Ngày Ra Quyết Định <span class='require'>*</span></label>
                <div data-date-format="dd/mm/yyyy" class="input-group date datepicker-filter mbs">
                    <input name="create_date" type="text" readonly="" class="form-control" value="{{Carbon\Carbon::today()->format('d/m/Y')}}" />
                    <span class="input-group-addon" id="date_QD"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </form>    
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-warning btn-lg" id="btn_add" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Thêm</button>
        </div>
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>


<!-- MODAL EDIT -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    
    <!-- /.modal-dialog --> 
</div>

</div>



<script type="text/javascript">
    $('#add_staff').autocomplete({
        source : '{!!URL::route('autocomplete')!!}',
        minlength: 1,
        autoFocus: true
    });     
    $(document).ready(function() {
        $('#btn_add').click(function(){
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });


            $.ajax({
              url : "retribution/add",
              type: "POST",
              dataType: 'json',
              data: new FormData($('#form_retribution_add')[0]),
              processData: false,
              contentType: false,
              success:function(data){
                  //Nếu có valdate
                if (typeof data.errors != 'undefined') {
                    $('.someDivToDisplayErrors_add').removeAttr('hidden');

                    if(data.errors.staff){
                        $('.error_staff_add').css('display', 'block');
                        $('.error_staff_add').text(data.errors.staff);
                    }else{
                          $('.error_staff_add').hide();
                    }

                    if(data.errors.code){
                        $('.error_code_add').css('display', 'block');
                        $('.error_code_add').text(data.errors.code);
                    }else{
                          $('.error_code_add').hide();
                    }

                    if(data.errors.description){
                        $('.error_description_add').css('display', 'block');
                        $('.error_description_add').text(data.errors.description);
                    }else{
                          $('.error_description_add').hide();
                    }

                    if(data.errors.reason){
                        $('.error_reason_add').css('display', 'block');
                        $('.error_reason_add').text(data.errors.reason);
                    }else{
                          $('.error_reason_add').hide();
                    }

                }else{
                    $('.input').val("");
                    $('.someDivToDisplayErrors_add').attr("hidden","true");
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

        $('.btn_update').click(function(){
            $('.someDivToDisplayErrors').removeAttr('hidden');
            var id= $(this).attr('id');
            $modal = $('#edit');
            $modal.load("retribution/edit/" + id);
            $modal.modal('show');
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
                    url: 'retribution/delete',
                    dataType: 'text',
                    data: {id : id },
                    success: function(data){
                        $('#retribution_' + id).fadeOut();
                        $('#retribution_' + id).remove();
                        $("#report_delete").show();
                        setTimeout(function()
                        {
                            $('#report_delete').fadeOut();
                        },4000);
                    }
                });
            }); 
        });
    });

    
</script>
     
@endsection

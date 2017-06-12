@extends('layouts.app')

@section('content')
<div class="profile">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Hồ Sơ</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Hồ Sơ</li>
    </ol>
</div>    
@if(session('thongbao'))
    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>
@endif

@if(session('loi'))
    <div class="alert alert-danger">
        {{session('loi')}}
    </div>
@endif

@if ( $errors->any() )
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif
<div class="page-content">
    <div id="page-user-profile" class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="text-center mbl">
                            <img src="upload/avatar/{{$user['avatar']}}" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);" class="img-circle" alt="avatar" width="150px" />

                            <!-- <input type="image" src="" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);" class="img-circle" alt="avatar"/>
                             <input type="file" id="my_file" style="display: none;" /> -->
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td width="50%"><i class="fa fa-user margin-r-5"></i> Mã Nhân Viên</td>
                            <td>{{ $user['username'] }}</td>
                        </tr>
                        <tr>
                            <td width="50%"><i class="fa fa-envelope margin-r-5"></i> Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td width="50%"><i class="fa fa-map-marker margin-r-5"></i> Địa Chỉ</td>
                            <td>{{ $user->present_address }}</td>
                        </tr>
                        <tr>
                            <td>
                            <button type="button" data-target="#modal-default" data-toggle="modal" class="btn btn-primary" data-id="{{$user['id']}}" id="btn_change">Đổi Mật Khẩu</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-9">
                    <div id="generalTabContent" class="tab-content">

                    <div class="row">
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div id="tab-profile-setting" class="tab-pane fade in active">
                                    <form action="profile/{{$user['id']}}" method="post" class="form-horizontal">
                                         {{ csrf_field() }}
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Họ Tên</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="Nhập Họ Tên" class="form-control" name="name" readonly value="{{$user['name']}}" />
                                            </div>
                                        </div>

                                        <div class="form-group"><label
                                                    class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9 controls">
                                                    <input type="email" name="email" placeholder="Nhập Email" class="form-control" value="{{$user['email']}}" />
                                                </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Mã Nhân Viên</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder="username"  readonly class="form-control" value="{{$user['username']}}" />
                                            </div>
                                        </div>

                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Giới Tính</label>

                                            <div class="col-sm-9 controls">
                                                <div class="radio-list"><label class="radio-inline"><input type="radio" value="1" name="gender"
                                                    @if($user['gender'] == 1)
                                                        checked
                                                    @endif 
                                                />&nbsp;
                                                    Nam</label><label class="radio-inline"><input type="radio" value="0" name="gender"
                                                        @if($user['gender'] == 0)
                                                            checked
                                                        @endif
                                                    />&nbsp;
                                                    Nữ</label></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Ngày Sinh</label>

                                            <div class="col-sm-9 controls">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div data-date-format="dd/mm/yyyy"
                                                        class="input-group date datepicker-filter mbs">
                                                        <input type="text" readonly="" class="form-control" name="birthday" value="{{Carbon\Carbon::parse($user['date_of_birth'])->format('d/m/Y')}}"/><span
                                                        class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Số Điện Thoại</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="Nhập Số Điện Thoại"  class="form-control" name="phone_number" value="{{$user['phone_number']}}" />
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Địa Chỉ Thường Trú</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" readonly placeholder="Nhập Địa Chỉ Thường Trú" class="form-control" name="permanent_address" value="{{$user['permanent_address']}}" />
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Địa Chỉ Hiện Tại</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="Nhập Địa Chỉ Hiện Tại"  class="form-control" name="present_address" value="{{$user['present_address']}}" />
                                            </div>
                                        </div>
                                        <div class="form-group mbn"><label
                                                class="col-sm-3 control-label"></label>

                                            <div class="col-sm-9 controls">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-save"></i>&nbsp;
                                                    Lưu
                                                </button>
                                                &nbsp; &nbsp;<a href="profile/{{$user['id']}}"
                                                                    class="btn btn-default">Hủy</a>
                                            </div>
                                        </div>
                                </div>
                                <div id="tab-contact-setting" class="tab-pane fade">
                                    <div class="form-horizontal">
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Tên Tài Khoản</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder="Nhập Tên Tài Khoản" class="form-control" name="bank_name" value="{{$user['bank_name']}}" />
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Số Tài Khoản</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder="Nhập Số Tài Khoản" class="form-control" name="bank_account_name" value="{{$user['bank_account_name']}}" />
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Insurance code</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder="" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Tax code</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder=""  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group mbn"><label
                                                class="col-sm-3 control-label"></label>

                                            <div class="col-sm-9 controls">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-save"></i>&nbsp;
                                                    Save
                                                </button>
                                               &nbsp; &nbsp;<a href="profile/{{$user['id']}}"
                                                                    class="btn btn-default">Hủy</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-emergency-setting" class="tab-pane fade">
                                    <div class="form-horizontal">
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Họ Tên</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder="Nhập Họ Tên" name="name_relative" class="form-control" value="{{$user->EmployeeRelative['full_name']}}" />
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Địa Chỉ</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder="Nhập Địa Chỉ" class="form-control" name="address_relative" value="{{$user->EmployeeRelative['address']}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Mối Quan Hệ</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder="Nhập Mối Quan Hệ" name="relationship_relative" class="form-control" value="{{$user->EmployeeRelative['relation']}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Số Điện Thoại</label>

                                            <div class="col-sm-9 controls">
                                                <input type="text" placeholder="Nhập Số Điện Thoại" class="form-control" name="phone_number_relative" value="{{$user->EmployeeRelative['phone_number']}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group mbn"><label
                                                class="col-sm-3 control-label"></label>

                                            <div class="col-sm-9 controls">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-save"></i>&nbsp;
                                                    Lưu
                                                </button>
                                                &nbsp; &nbsp;<a href="profile/{{$user['id']}}"
                                                                    class="btn btn-default">Hủy</a>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div id="tab-avatar-setting" class="tab-pane fade">
                                    <div class="form-horizontal">
                                        <div class="form-body">
                                            <form action="profile/change-avatar/{{$user['id']}}" method="post" enctype="multipart/form-data">
                                              {{ csrf_field() }}
                                            <div class="form-group"><label
                                                    class="col-sm-3 control-label">Lựa Chọn Ảnh</label>
                                              
                                                <div class="col-sm-9 controls">
                                                    <input type="file" name="hinh" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group mbn"><label
                                                    class="col-sm-3 control-label"></label>

                                                <div class="col-sm-9 controls">
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-save"></i>&nbsp;
                                                        Lưu
                                                    </button>
                                                    &nbsp; &nbsp;<a href="profile/{{$user['id']}}"
                                                                    class="btn btn-default">Hủy</a>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#tab-profile-setting" data-toggle="tab"><i
                                        class="fa fa-folder-open"></i>&nbsp;
                                    Thông Tin Chung</a></li>
                                <li><a href="#tab-contact-setting" data-toggle="tab"><i
                                        class="fa fa-envelope-o"></i>&nbsp;
                                    Tài Khoản Ngân Hàng</a></li>
                                <li><a href="#tab-emergency-setting" data-toggle="tab"><i
                                        class="fa fa-phone"></i>&nbsp;
                                    Thông Tin Người Thân</a></li>
                                 <li><a href="#tab-avatar-setting" data-toggle="tab"><i
                                        class="fa fa-picture-o"></i>&nbsp;
                                    Ảnh Đại Diện</a></li>
                            </ul>
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
                <h4 id="modal-default-label" class="modal-title">Đổi Mật Khẩu</h4></div>
                <div class="alert alert-danger someDivToDisplayErrors_add" hidden>
                      <p class="errorMsg_password"></p>
                       <p class="errorMsg_password_current"></p>
                      <p class="errorMsg_password_new"></p>
                      <p class="errorMsg_password_new_again"></p>
                </div>
            <div class="modal-body">
                <form class="form-horizontal" id="myform">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Nhập Mật Khẩu <span class='require'>*</span></label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control input" name="password_current" placeholder="Xin Hãy Nhập Mật Khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nhập Mật Khẩu Mới <span class='require'>*</span></label>
                        <div class="col-sm-10"> 
                          <input type="password" class="form-control input" name="password_new" placeholder="Xin Hãy Nhập Mật Khẩu Mới">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nhập Lại Mật Khẩu Mới <span class='require'>*</span></label>
                        <div class="col-sm-10"> 
                          <input type="password" class="form-control input" name="password_new_again" placeholder="Xin Hãy Nhập Lại Mật Khẩu Mới">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
                <button class="btn btn-primary" id="btn_save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#btn_change').click(function(){
        var id = $(this).data('id');
        $('.input').val("");
        $('.someDivToDisplayErrors_add').attr("hidden","true");
        $('#btn_save').click(function(){
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
              url : "profile/change-password/" + id,
              type: "POST",
              dataType: 'json',
              data: new FormData($('#myform')[0]),
              processData: false,
              contentType: false,
              success:function(data){
                  //Nếu có valdate
                if (typeof data.errors != 'undefined') {
                    $('.someDivToDisplayErrors_add').removeAttr('hidden');

                    if(data.errors.password_current){
                        $('.errorMsg_password').css('display', 'block');
                        $('.errorMsg_password').text(data.errors.password_current);
                    }else{
                        $('.errorMsg_password').hide();
                    }

                    if(data.errors.password_new){
                        $('.errorMsg_password_new').css('display', 'block');
                        $('.errorMsg_password_new').text(data.errors.password_new);
                    }else{
                        $('.errorMsg_password_new').hide();
                    }

                    if(data.errors.password_new_again){
                        $('.errorMsg_password_new_again').css('display', 'block');
                        $('.errorMsg_password_new_again').text(data.errors.password_new_again);
                    }else{
                        $('.errorMsg_password_new_again').hide();
                    }

                }else if(data.errors_password){
                    $('.someDivToDisplayErrors_add').removeAttr('hidden');
                    $('.errorMsg_password').hide();
                    $('.errorMsg_password_new').hide();
                    $('.errorMsg_password_new_again').hide();
                    $('.errorMsg_password_current').css('display', 'block');
                    $('.errorMsg_password_current').text(data.errors_password);
                }
                else{
                    $('#modal-default').modal('toggle'); 
                }             
              }
            });
        });
    });

    $("input[type='image']").click(function() {
        $("input[id='my_file']").click();
    });
})




</script>
@endsection
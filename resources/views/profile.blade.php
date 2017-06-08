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

<div class="page-content">
    <div id="page-user-profile" class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="text-center mbl"><img
                                src="{{ $user->avatar }}"
                                style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);"
                                class="img-circle" alt="avatar"/></div>
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
                        </tbody>
                    </table>
                </div>
                <div class="col-md-9">
                    <div id="generalTabContent" class="tab-content">

                    <div class="row">
                        <div class="col-md-9">
                            <div class="tab-content">
                                <div id="tab-profile-setting" class="tab-pane fade in active">
                                    <form action="#" class="form-horizontal">
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Họ Tên</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="last name" class="form-control" name="name"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Giới Tính</label>

                                            <div class="col-sm-9 controls">
                                                <div class="radio-list"><label class="radio-inline"><input
                                                        type="radio" value="1" name="gender"
                                                        checked="checked"/>&nbsp;
                                                    Nam</label><label class="radio-inline"><input
                                                        type="radio" value="0" name="gender"/>&nbsp;
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
                                                        <input type="text" readonly="" class="form-control" name="birthday" value="{{old('from')}}"/><span
                                                        class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Số Điện Thoại</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="0-123-456-789"  class="form-control" name="phone_number"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Địa Chỉ Thường Trú</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="Nhập Địa Chỉ Thường Trú" class="form-control" name="permanent_address"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Địa Chỉ Hiện Tại</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="Nhập Địa Chỉ Hiện Tại"  class="form-control" name="present_address" />
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Quốc Tịch</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="Nhập Quốc Tịch"  class="form-control" name="nationality" />
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Dân Tộc</label>

                                            <div class="col-sm-9 controls">
                                            <input type="text" placeholder="Nhập dân tộc"  class="form-control" name="ethnic"/>
                                            </div>
                                        </div>
                                        <div class="form-group mbn"><label
                                                class="col-sm-3 control-label"></label>

                                            <div class="col-sm-9 controls">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-save"></i>&nbsp;
                                                    Lưu
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab-account-setting" class="tab-pane fade">
                                    <form action="#" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group"><label
                                                    class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9 controls"><input type="email"
                                                                                      placeholder="email@yourcompany.com"
                                                                                      class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label
                                                    class="col-sm-3 control-label">Username</label>

                                                <div class="col-sm-9 controls"><input type="text"
                                                                                      placeholder="username"
                                                                                      class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group"><label
                                                    class="col-sm-3 control-label">Password</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-6"><input type="password"
                                                                                     placeholder=""
                                                                                     class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label
                                                    class="col-sm-3 control-label">Confirm
                                                Password</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-6"><input type="password"
                                                                                     placeholder=""
                                                                                     class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mbn"><label
                                                    class="col-sm-3 control-label"></label>

                                                <div class="col-sm-9 controls">
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-save"></i>&nbsp;
                                                        Save
                                                    </button>
                                                    &nbsp; &nbsp;<a href="#"
                                                                    class="btn btn-default">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab-contact-setting" class="tab-pane fade">
                                    <form action="#" class="form-horizontal">
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Bank name</label>

                                            <div class="col-sm-9 controls"><input type="text"
                                                                                  placeholder="0-123-456-789"
                                                                                  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Bank account name</label>

                                            <div class="col-sm-9 controls"><input type="text"
                                                                                  placeholder="http://website.com"
                                                                                  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Insurance code</label>

                                            <div class="col-sm-9 controls"><input type="text"
                                                                                  placeholder=""
                                                                                  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Tax code</label>

                                            <div class="col-sm-9 controls"><input type="text"
                                                                                  placeholder=""
                                                                                  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group mbn"><label
                                                class="col-sm-3 control-label"></label>

                                            <div class="col-sm-9 controls">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-save"></i>&nbsp;
                                                    Save
                                                </button>
                                                &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab-emergency-setting" class="tab-pane fade">
                                    <form action="#" class="form-horizontal">
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Name</label>

                                            <div class="col-sm-9 controls"><input type="text"
                                                                                  placeholder="binh"
                                                                                  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Address</label>

                                            <div class="col-sm-9 controls"><input type="text"
                                                                                  placeholder="http://website.com"
                                                                                  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Relationship</label>

                                            <div class="col-sm-9 controls"><input type="text"
                                                                                  placeholder=""
                                                                                  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group"><label
                                                class="col-sm-3 control-label">Phone Number</label>

                                            <div class="col-sm-9 controls"><input type="text"
                                                                                  placeholder=""
                                                                                  class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group mbn"><label
                                                class="col-sm-3 control-label"></label>

                                            <div class="col-sm-9 controls">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="fa fa-save"></i>&nbsp;
                                                    Save
                                                </button>
                                                &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#tab-profile-setting" data-toggle="tab"><i
                                        class="fa fa-folder-open"></i>&nbsp;
                                    Profile Setting</a></li>
                                <li><a href="#tab-account-setting" data-toggle="tab"><i
                                        class="fa fa-cogs"></i>&nbsp;
                                    Account Setting</a></li>
                                <li><a href="#tab-contact-setting" data-toggle="tab"><i
                                        class="fa fa-envelope-o"></i>&nbsp;
                                    Banking Setting</a></li>
                                <li><a href="#tab-emergency-setting" data-toggle="tab"><i
                                        class="fa fa-phone"></i>&nbsp;
                                    Emergency Setting</a></li>
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
@endsection
@extends('layouts.app')
@section('title','Trang Chủ')
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Phản Hồi</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Trợ Giúp</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Phản Hôi</li>
    </ol>
             
</div>
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
<div id="form-layouts" class="row">
<div class="col-lg-12">
    <div style="background: transparent; border: 0; box-shadow: none !important"
         class="tab-content pan mtl mbn responsive">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-blue">
                        <div class="panel-heading">Phản Hồi Hệ Thống</div>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif

                            @if ( $errors->any() )
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
                        <div class="panel-body pan">
                            <form action="help/feedback" class="horizontal-form" method="POST">
                                {{csrf_field()}}
                                <div class="form-body pal"><h4><b>Nếu có bất kỳ vấn đề nào cần trao đổi, góp ý hay giúp đỡ, hãy liên hệ với chúng tôi! Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất.</b></h4>

                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group has-success"><label
                                                    for="inputFirstName" class="control-label">Họ Tên <span class='require'>*</span></label>

                                                <div class="input-icon right">
                                                    <input type="text" placeholder="Nhập Họ Tên"
                                                        class="form-control" value="{{Auth::User()->name}}" readonly /></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="inputEmail"
                                                                           class="control-label">Email
                                                <span class='require'>*</span></label>

                                                <div class="input-icon right"><input
                                                        type="text" placeholder="Email Address"
                                                        class="form-control" value="{{Auth::User()->email}}" readonly/></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="inputEmail"
                                                                           class="control-label">Tiêu Đề
                                                <span class='require'>*</span></label>

                                                <div class="input-icon right"><input
                                                        type="text" placeholder="Nhập Tiêu Đề"
                                                        class="form-control" name="title"/></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><label for="inputEmail"
                                                                           class="control-label">Nội Dung
                                                <span class='require'>*</span></label>

                                                    <div class="form-group">
                                                      <textarea class="form-control" rows="5" name="description"></textarea>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <label style="text-align: center;"><b>ĐỊA CHỈ LIÊN HỆ</b></label>
                                            </div>
                                        </div>
                                        <label><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;cbinh951@gmail.com</label><br>
                                        <label><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;0123 456 789</label><br>
                                        <label><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7836.147743862289!2d106.782625!3d10.881986!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x54542761d4c22175!2sKTX+Khu+B%2C+%C4%90HQG!5e0!3m2!1svi!2sus!4v1497373096472" width="500" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></label>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-actions text-right pal">
                                    <button type="submit" class="btn btn-primary">Xác Nhận</button>
                                    &nbsp;
                                    <a href="help/feedback" class="btn btn-green">Hủy</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
</div>
@endsection
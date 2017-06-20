@extends('layouts.app')
@section('title','Trang Chủ')
@section('content')


<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Trang Chủ</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;</li>
    </ol>
</div>

 <div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div id="generalTabContent" class="tab-content responsive">
            @if(Auth::User()->hasRole('supper_admin') || Auth::User()->hasRole('admin'))
                <a class="btn btn-info btn_access_save btn-sm btn_test" id="btn_sua"><span class="fa fa-pencil"></span>&nbsp;Sửa</span></a> 
            @endif
               <h3 style="text-align: center;"><b>HỆ THỐNG QUẢN TRỊ NHÂN SỰ HRM</b></h3>
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="media">
                        <div class="pull-left"><img src="images/{{$home['logo']}}" alt="64x64"  width="180px" /></div>

                            <div class="media-body"><h4 class="media-heading">{{$home['name']}} </h4>
                            <p>Giám Đốc: {{$home['director']}}</p>
                            <p>Địa Chỉ: {{$home['address']}}</p>
                            <p>Số Điện Thoại: {{$home['phone_number']}} </p>
                            <p>Email: {{$home['email']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
   
</div>

<script type="text/javascript">
    $('#btn_sua').click(function(){
        $modal = $("#add");
        $modal.load("home/edit");
        $modal.modal('show');
    });
</script>
@endsection

@extends('layouts.app')
@section('title','Thông Báo')
@section('content')

<div class="edit_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Thông Báo</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Thông Báo</li>
    </ol>
</div>	

<div class="page-content">
	<div id="form-layouts" class="row">
		<div class="col-lg-12">
		    <div style="background: transparent; border: 0; box-shadow: none !important"
		         class="tab-content pan mtl mbn responsive">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-blue">
	                    	<div class="panel-heading">{{$notification['title']}}</div>
	                    	
	                        <div class="panel-body pan">
	                            <form action="notification/add" class="form-horizontal form-seperated" method="POST">
	                             <input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-body">
	                                	<p style="margin-left: 1%; font-style: italic;">{{Carbon\Carbon::parse($notification['created_at'])->format('d-m-Y H:m:s')}}</p>
	                                    <h5 style="margin-left: 1%;">{!!$notification['content']!!}</h5>
	                                    <p style="margin-left: 1%; margin-top: 4%;">Người Tạo: <b>{{Auth::User()->name}}</b></p>
	                                </div>
	                                <div class="form-actions text-right pal">
	                                    <a href="notification" class="btn btn-green">Trở Lại</a>
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

</div>
@endsection
@extends('layouts.app')
@section('title','Sửa Thông Báo')
@section('content')

<div class="edit_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Sửa Thông Báo</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Sửa Thông Báo</li>
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
	                    	<div class="panel-heading">Sửa Thông Báo</div>
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
	                            <form action="notification/edit/{{$notification['id']}}" class="form-horizontal form-seperated" method="POST">
	                             <input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-body">
	                                    <div class="form-group">
	                                    	<label for="inputFirstName" class="col-md-2 control-label"> Tiêu Đề <span class='require'>*</span>
	                                    	</label>

	                                        <div class="col-md-9">
	                                        	<input type="text" placeholder="Nhập Tiêu Đề" name="title" class="form-control" value="{{$notification['title']}}" />
	                                         </div>
	                                    </div>

	                                    <div class="form-group">
	                                    	<label for="inputLastName" class="col-md-2 control-label">Nội Dung <span class='require'>*</span>
	                                    	</label>

	                                        <div class="col-md-9">
	                                            <textarea class="form-control ckeditor" rows="3" name="content" placeholder="Nhập Nội Dung">{{$notification['content']}}</textarea>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="form-actions text-right pal">
	                                    <button type="submit" class="btn btn-primary">Lưu</button>
	                                    &nbsp;
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
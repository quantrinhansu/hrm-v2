@extends('layouts.app')
@section('title','Nhập File Nhân Viên')
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Nhập File Nhân Viên</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;Trang Chủ&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li>Nhập File Nhân Viên</li>
    </ol>
    <div class="clearfix"></div>
</div>
@if(session('loi'))
    <div class="alert alert-success">
        {{session('loi')}}
    </div>
@endif
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-push-3">
		<form action="employee/import" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
			<label class="sr-only" for="email">Nhập File:</label>
			</div>
			  <div class="form-group">
			    
			    <input type="file" name="import_file">
			  </div>
		  	<button type="submit" class="btn btn-default">Submit</button>
		  	<a class="btn btn-info btn-sm" href="employee"><i class="fa fa-arrow-left">&nbsp;Quay Lại</i></a>
		</form>
		</div>
	</div>
</div>
@endsection
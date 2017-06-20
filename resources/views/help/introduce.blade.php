@extends('layouts.app')
@section('title','Hướng Dẫn')
@section('content')

<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Hướng Dẫn</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Trợ Giúp</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Hướng Dẫn</li>
    </ol>
             
</div>

<div class="page-content">
<div id="form-layouts" class="row">
<div class="col-lg-12">
	<div style="text-align: center;">
   <h3>Xem hướng dẫn sử dụng</h3>	
   <iframe width="640" height="360" src="https://www.youtube.com/embed/-Pu5OkyMgSw" frameborder="0" allowfullscreen></iframe>
   </div>
</div>
</div>
</div>
@endsection
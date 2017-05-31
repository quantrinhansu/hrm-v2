@extends('layouts.app')
@section('title','Danh Sách Chức Vụ')
@section('content')

<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Danh Sách Nhân Viên</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Trang Chủ</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Danh Sách Nhân Viên</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="table_list_notification">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	        <form action="department/detail/add-employee/{{$department['id']}}" method="POST">
	        	<input type="hidden" name="_token" value="{{csrf_token()}}">
	            <div class="panel panel-blue">
	            	<div class="panel-heading">
	            		<span>Chọn Nhân Viên Thêm Vào Phòng {{$department['name']}}</span>
	            		<a class="btn btn-info btn_access_save btn-sm" href="department/detail/{{$department['id']}}"><i class="fa fa-arrow-left">&nbsp;Quay Lại</i></a>
	            		<button class="btn btn-info btn_access_save btn-sm" type="submit"><i class="fa fa-plus">&nbsp;Thêm</i></button>
	            	</div>
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

	               <div class="panel-body">
                        <div class="row mbm">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="table_id"
                                           class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                        <thead>
                                        <tr>
                                            <th style="width: 3%; padding: 10px; background: #efefef"><input
                                                    type="checkbox" class="checkall"/></th>
                                            <th>Tên Nhân Viên</th>
								            <th>Username</th>
								            <th>Giới Tính</th>
                                        </tr>
                                        <tbody>
                                         @foreach($user as $us)
				                            <tr>
				                            	<td>
													  <input type="checkbox" value="{{$us['id']}}" name="employee[]">
				                            	</td>

								                <td>{{$us['name']}}</td>
								                <td>{{$us['username']}}</td>
								                <td>
								                	@if($us['gender'] == 1)
														Nam
													@else
														Nữ
													@endif
								                </td>
				                            </tr>
				                        @endforeach
                                       
                                        </tbody>
                                        </thead></table>
                                </div>
                            </div>
                        </div>
           
                    </div>
	            </div>
	        </form>
	        </div>
	    </div>
	</div>
</div>	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		//Xử lý submit form khi có phân trang
		var table = $("#table_id").dataTable();

		$('form').on('submit', function(e){
	   var $form = $(this);

	   // Iterate over all checkboxes in the table
	   table.$('input[type="checkbox"]').each(function(){
		      // If checkbox doesn't exist in DOM
		      if(!$.contains(document, this)){
		         // If checkbox is checked
		         if(this.checked){
		            // Create a hidden element 
		            $form.append(
		               $('<input>')
		                  .attr('type', 'hidden')
		                  .attr('name', this.name)
		                  .val(this.value)
		            );
		         }
		      } 
		   });          
		});

		$("#table_id").dataTable().fnDestroy();
	});
	
</script>
@endsection

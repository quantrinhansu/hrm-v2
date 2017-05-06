@extends('layouts.app')

@section('content')
<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">List Công Tác</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Tables</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Responsive Tables</li>
    </ol>
    <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden" name="endstart"/>
    </div>
    <div class="clearfix"></div>
</div>

<div class="table_list_notification">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-blue">
	            	<div class="panel-heading">
	            		<span>List</span>
	            		<button class="btn btn-info btn_access_save"><a href="taocongtac"><i class="fa fa-plus">&nbsp;Add</i></a></button>
	            	</div>
	                <div class="panel-body">
	                    <div id="flip-scroll">
	                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
	                            <thead class="cf">
	                            <tr>
		                            <th>STT</th>
					                <th>Code</th>
					                <th>Name</th>
					                <th>Position</th>
					                <th>Department</th>
					                <th>Reason</th>
					                <th>Place</th>
					                <th>Allowance</th>
					                <th>From</th>
					                <th>To</th>
					                <th>Action</th>
					                <th>Delete</th>
	                            </tr>
	                            </thead>
	                            <tbody>
	                            <tr>
	                                <td>1</td>
					                <td>NV002</td>
					                <td>Binh</td>
					                <td>Trưởng phòng</td>
					                <td>It</td>
					                <td>Gặp đối tác</td>
					                <td>Bình Dương</td>
					                <td>1.000.000 VND</td>
					                <td>20/4/2017</td>
					                <td>21/4/2017</td>
					                <td>
					                	<button class="btn btn-primary btn-xs"><i class="fa fa-check">Yes</i></button>                                            
					                	<button class="btn btn-primary btn-xs"><b>X</b> No</button>                                            
                                    </td>
					                <td>
                                         <button type="button" data-target="#modal-default" data-toggle="modal" class="btn btn-primary btn-xs"><i
                                            class="fa fa-trash-o"></i>&nbsp;Delete</button>
                                    </td>
	                            </tr>
	                            </tbody>
	                        </table>
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
                <h4 id="modal-default-label" class="modal-title">Delete</h4></div>
            <div class="modal-body">Are you sure you want to delete?</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

</div>

        
@endsection

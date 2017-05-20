@extends('layouts.app')

@section('content')
<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">List Notification</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Tables</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Responsive Tables</li>
    </ol>
    <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
            class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                       name="endstart"/>
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
	            		<a href="addnotification" class="btn btn-info btn-sm btn_access_save"><i class="fa fa-plus">&nbsp;Add</i></a>
	            	</div>
	                <div class="panel-body">
	                    <div id="flip-scroll">
	                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
	                            <thead class="cf">
	                            <tr>
		                            <th>STT</th>
					                <th>Title</th>
					                <th>Description</th>
					                <th>Content</th>
					                <th>Create Date</th>
					                <th>Edit</th>
					                <th>Delete</th>
	                            </tr>
	                            </thead>
	                            <tbody>
	                            <tr>
	                                <td>1</td>
					                <td>Binh</td>
					                <td>NV001</td>
					                <td>cbinh@gmail.com</td>
					                <td>Member</td>
					                <td>
					                	<button type="button" class="btn btn-primary btn-xs"><a style="color: #fff;" href="editnotification"><i class="fa fa-edit"></i>&nbsp;Edit</a></button>
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

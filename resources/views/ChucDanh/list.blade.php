@extends('layouts.app')

@section('content')
<div class="list_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">List Chức Danh</div>
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
	            		<button class="btn btn-info btn_access_save" data-title="Add" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp;Add</i></button>
	            	</div>
	                <div class="panel-body">
	                    <div id="flip-scroll">
	                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
	                            <thead class="cf">
	                            <tr>
		                            <th>STT</th>
					                <th>Tên Chức Danh</th>
					                <th>Mã Chức Danh</th>
					                <th>Create Date</th>
					                <th>Update Date</th>
					                <th>Edit</th>
					                <th>Delete</th>
	                            </tr>
	                            </thead>
	                            <tbody>
	                            <tr>
	                                <td>1</td>
					                <td>CEO</td>
					                <td>CE001</td>
					                <td>12/2/2017</td>
					                <td>13/2/2017</td>
					                <td>
					                	<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span>&nbsp;Edit</button></p>                                            
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

<!-- MODAL EDIT -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	      <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
	    </div>
	    <div class="modal-body">
	      <div class="form-group">
	    		<label for="inputFirstName" class="control-label">Tên Chức Danh <span class='require'>*</span></label>
	    	</div>
	      <div class="form-group">
	        <input class="form-control " type="text" placeholder="Xin Hãy nhập vào tên chức danh">
	      </div>
	      <div class="form-group">
	    		<label for="inputFirstName" class="control-label">Mã Chức Danh <span class='require'>*</span></label>
	    	</div>
	      <div class="form-group">
	        <input class="form-control " type="text" placeholder="Xin Hãy nhập vào mã chức danh">
	      </div>
	    </div>
	    <div class="modal-footer ">
	      <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
	    </div>
	  </div>
	  <!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
	      <h4 class="modal-title custom_align" id="Heading">Add Your Detail</h4>
	    </div>
	    <div class="modal-body">
	      <div class="form-group">
	    		<label for="inputFirstName" class="control-label">Tên Chức Danh <span class='require'>*</span></label>
	    	</div>
	      <div class="form-group">
	        <input class="form-control " type="text" placeholder="Xin Hãy nhập vào tên chức danh">
	      </div>
	      <div class="form-group">
	    		<label for="inputFirstName" class="control-label">Mã Chức Danh <span class='require'>*</span></label>
	    	</div>
	      <div class="form-group">
	        <input class="form-control " type="text" placeholder="Xin Hãy nhập vào mã chức danh">
	      </div>
	    </div>
	    <div class="modal-footer ">
	      <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Add</button>
	    </div>
	  </div>
	  <!-- /.modal-content --> 
	</div>
	<!-- /.modal-dialog --> 
</div>

</div>

        
@endsection

@extends('layouts.app')

@section('content')
<div class="manage_access">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Manage Access</div>
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

<div class="table_manage_access">
	<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
	<div class="page-content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-blue">
	            	<div class="panel-heading head_manage_access">
	            		<span>List</span>
	            		<input type="submit" name="" class="btn btn-info btn-sm btn_access_save" value="Save">
	            		
	            	</div>
	                <div class="panel-body">
	                    <div id="flip-scroll">
	                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
	                            <thead class="cf">
	                            <tr>
		                            <th>STT</th>
					                <th>Name</th>
					                <th>Code</th>
					                <th>Email</th>
					                <th>Role</th>
					                <th>Action</th>
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
		                                <div id="enable" data-on="success" data-off="danger"
		                                    class="make-switch switch-small"><input type="checkbox" checked="checked" class="switch"/></div>
		                            </td>
	                            </tr>
	                            <tr>
	                                <td>1</td>
					                <td>Binh</td>
					                <td>NV001</td>
					                <td>cbinh@gmail.com</td>
					                <td>Member</td>
					                <td>
		                                <div id="enable" data-on="success" data-off="danger"
		                                    class="make-switch switch-small"><input type="checkbox" checked="checked" class="switch"/></div>
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
</div>
@endsection
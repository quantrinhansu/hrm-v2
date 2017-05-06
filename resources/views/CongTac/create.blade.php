@extends('layouts.app')

@section('content')

<div class="create_leave">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Tạo Công Tác</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Forms</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Form Layouts</li>
    </ol>
    <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
            class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                       name="endstart"/>
    </div>
    <div class="clearfix"></div>
</div>


 <div class="page-content">
    <div id="form-layouts" class="row">
		<div class="col-lg-12">
		    <div style="background: transparent; border: 0; box-shadow: none !important"
		         class="tab-content pan mtl mbn responsive">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-blue">
	                    	<div class="panel-heading">Tạo Công Tác</div>
	                        <div class="panel-body pan">
	                            <form action="#" class="form-horizontal form-seperated">
	                                <div class="form-body">
	                                	<div class="row">
	                                		<div class="col-md-6">
			                                    <div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Name </label>

			                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="First Name" class="form-control"/></div>
			                                    </div>
	                                    	</div>
	                                    	<div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Code </label>

			                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="First Name" class="form-control"/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Position </label>

			                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="First Name" class="form-control"/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Department </label>

			                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="First Name" class="form-control"/></div>
			                                    </div>
		                                    </div>
		                                    <hr/>
		                                    <div class="col-md-12">
		                                    	<div class="form-group">
			                                    	<label for="inputLastName" class="col-md-2 control-label">Reason <span class='require'>*</span>
			                                    	</label>

			                                        <div class="col-md-10">
			                                            <textarea class="form-control" rows="3" id="demo" name="NoiDung"></textarea>
			                                        </div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Place <span class='require'>*</span></label>

			                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="First Name" class="form-control"/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> Allowance <span class='require'>*</span> </label>

			                                        <div class="col-md-9"><input id="inputFirstName" type="text" placeholder="First Name" class="form-control"/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> From <span class='require'>*</span></label>

			                                        <div class="col-md-9">
			                                        	<input type="text" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" class="datepicker-default form-control"/></div>
			                                    </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                    	<div class="form-group">
			                                    	<label for="inputFirstName" class="col-md-3 control-label"> To <span class='require'>*</span></label>

			                                        <div class="col-md-9">
			                                        	<input type="text" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy" class="datepicker-default form-control"/></div>
			                                    </div>
		                                    </div>
	                                    </div>
	                                </div>
	                                <div class="form-actions text-right pal">
	                                    <button type="submit" class="btn btn-primary">Submit</button>
	                                    &nbsp;
	                                    <button type="button" class="btn btn-green">Cancel</button>
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
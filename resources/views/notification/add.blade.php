@extends('layouts.app')

@section('content')

<div class="edit_notification">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Edit Notification</div>
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

<div class="page-content">
	<div id="form-layouts" class="row">
		<div class="col-lg-12">
		    <div style="background: transparent; border: 0; box-shadow: none !important"
		         class="tab-content pan mtl mbn responsive">
	            <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-blue">
	                    	<div class="panel-heading">Edit name</div>
	                        <div class="panel-body pan">
	                            <form action="#" class="form-horizontal form-seperated">
	                                <div class="form-body">
	                                    <div class="form-group">
	                                    	<label for="inputFirstName" class="col-md-2 control-label">		Title <span class='require'>*</span>
	                                    	</label>

	                                        <div class="col-md-9"><input id="inputFirstName" type="text"
	                                                                     placeholder="First Name"
	                                                                     class="form-control"/></div>
	                                    </div>
	                                    <div class="form-group">
	                                    	<label for="inputLastName" class="col-md-2 control-label">Description <span class='require'>*</span>
	                                    	</label>

	                                        <div class="col-md-9">
	                                            <div class="input-icon right">
	                                            	<input id="inputLastName" type="text"
	                                                    placeholder="Last Name" class="form-control"/>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <div class="form-group">
	                                    	<label for="inputLastName" class="col-md-2 control-label">Content <span class='require'>*</span>
	                                    	</label>

	                                        <div class="col-md-9">
	                                            <textarea class="form-control ckeditor" rows="3" id="demo" name="NoiDung"></textarea>
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
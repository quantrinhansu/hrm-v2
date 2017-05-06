@extends('layouts.app')

@section('content')
<div class="list_department">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Gallery Page</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Pages</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Gallery Page</li>
    </ol>
    <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
            class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                       name="endstart"/>
    </div>
    <div class="clearfix"></div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet box portlet-green">
                <div class="portlet-header">
                    <div class="caption">Media Gallery</div>
                    <div class="tools"><i class="fa fa-chevron-up"></i><i data-toggle="modal"
                                                                          data-target="#modal-config"
                                                                          class="fa fa-cog"></i><i
                            class="fa fa-refresh"></i><i class="fa fa-times"></i></div>
                </div>
                <div class="portlet-body">
                    <div class="gallery-pages">
                        <ul style="float: left;" class="list-filter list-unstyled">
                            <li data-filter="all" class="filter active">All</li>
                            <li data-filter=".development" class="filter">Development</li>
                            <li data-filter=".design" class="filter">Design</li>
                            <li data-filter=".photography" class="filter">Photography</li>
                            <li data-filter=".wordpress" class="filter">Wordpress</li>
                            <li data-filter=".html" class="filter">Html</li>
                        </ul>
                        <div class="action-group btn-group pull-right">
                            <button class="btn btn-primary"><i class="fa fa-check-square-o mrs"></i>Check
                                All
                            </button>
                            <button class="btn btn-primary"><i class="fa fa-upload mrs"></i>Add new</button>
                            <button class="btn btn-primary"><i class="fa fa-edit mrs"></i>Edit</button>
                            <button class="btn btn-primary"><i class="fa fa-trash-o mrs"></i>Delete</button>
                            <button type="button" data-toogle="dropdown"
                                    class="btn btn-primary dropdown-toogle"><i
                                    class="fa fa-share-square-o mrs"></i>Share
                            </button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row mix-grid">
                            <div class="col-md-3 mix photography">
                                <div class="hover-effect">
                                    <div class="img">
                                    	<img src="http://swlabs.co/madmin/code/images/gallery/1.jpg" alt="" class="img-responsive"/>
                                    </div>
                                    <div class="info">
                                    	<h3>Pellentesque vehicula</h3><a href="#" class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/1.jpg"
                                            data-lightbox="image-1" data-title="Image 1" class="mix-zoom"><i class="glyphicon glyphicon-search"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mix html development">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/13.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/2.jpg"
                                            data-lightbox="image-2" data-title="Image 2" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix html design">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/3.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/3.jpg"
                                            data-lightbox="image-3" data-title="Image 3" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix development html">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/5.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/5.jpg"
                                            data-lightbox="image-5" data-title="Image 5" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix wordpress">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/16.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/4.jpg"
                                            data-lightbox="image-4" data-title="Image 4" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix design">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/6.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/6.jpg"
                                            data-lightbox="image-6" data-title="Image 6" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix photography design">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/14.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/7.jpg"
                                            data-lightbox="image-7" data-title="Image 7" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix wordpress html">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/8.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/8.jpg"
                                            data-lightbox="image-8" data-title="Image 8" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix wordpress html design">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/13.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/13.jpg"
                                            data-lightbox="image-8" data-title="Image 8" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix photography html">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/14.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/14.jpg"
                                            data-lightbox="image-8" data-title="Image 8" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix development">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/15.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/15.jpg"
                                            data-lightbox="image-8" data-title="Image 8" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 mix wordpress development">
                                <div class="hover-effect">
                                    <div class="img"><img
                                            src="http://swlabs.co/madmin/code/images/gallery/16.jpg" alt=""
                                            class="img-responsive"/></div>
                                    <div class="info"><h3>Pellentesque vehicula</h3><a href="#"
                                                                                       class="mix-link"><i
                                            class="glyphicon glyphicon-link"></i></a><a
                                            href="http://swlabs.co/madmin/code/images/gallery/16.jpg"
                                            data-lightbox="image-8" data-title="Image 8" class="mix-zoom"><i
                                            class="glyphicon glyphicon-search"></i></a></div>
                                </div>
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
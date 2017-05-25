<!DOCTYPE html>
<html lang="en">

<!-- Header -->
@include('layouts.head')
@yield('styles')
<body class=" ">
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;"
             class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span
                        class="logo-text">µAdmin</span><span style="display: none" class="logo-text-icon">µ</span></a>
            </div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <ul class="nav navbar-nav    ">
                    <li class="active"><a href="index.html">Dashboard</a></li>
                    <li><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle">Layouts
                        &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="layout-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="layout-right-sidebar.html">Right Sidebar</a></li>
                            <li><a href="layout-left-sidebar-collapsed.html">Left Sidebar Collasped</a></li>
                            <li><a href="layout-right-sidebar-collapsed.html">Right Sidebar Collasped</a></li>
                            <li class="dropdown-submenu"><a href="javascript:;" data-toggle="dropdown"
                                                            class="dropdown-toggle">More Options</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Second level link</a></li>
                                    <li class="dropdown-submenu"><a href="javascript:;" data-toggle="dropdown"
                                                                    class="dropdown-toggle">More Options</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Third level link</a></li>
                                            <li><a href="#">Third level link</a></li>
                                            <li><a href="#">Third level link</a></li>
                                            <li><a href="#">Third level link</a></li>
                                            <li><a href="#">Third level link</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Second level link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-menu-dropdown"><a href="javascript:;" data-toggle="dropdown"
                                                      class="dropdown-toggle">UI Elements
                        &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde
                                                omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et
                                                iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                facilis est</a></li>
                                        </ul>
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde
                                                omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et
                                                iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                facilis est</a></li>
                                        </ul>
                                        <ul class="col-md-4 mega-menu-submenu">
                                            <li><h3>Neque porro quisquam</h3></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit amet</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                elit</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis unde
                                                omnis</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et accusamus et
                                                iusto</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                soluta</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                facilis est</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-menu-dropdown mega-menu-full"><a href="javascript:;" data-toggle="dropdown"
                                                                     class="dropdown-toggle">Extras
                        &nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit
                                                    amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                    elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis
                                                    unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et
                                                    accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                    soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                    facilis est</a></li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit
                                                    amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                    elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis
                                                    unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et
                                                    accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                    soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                    facilis est</a></li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><h3>Neque porro quisquam</h3></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Lorem ipsum dolor sit
                                                    amet</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Consectetur adipisicing
                                                    elit</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Sed ut perspiciatis
                                                    unde omnis</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>At vero eos et
                                                    accusamus et iusto</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Nam libero tempore cum
                                                    soluta</a></li>
                                                <li><a href="#"><i class="fa fa-angle-right"></i>Et harum quidem rerum
                                                    facilis est</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-5 document-demo">
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i
                                                        class="fa fa-info-circle"></i><span>Introduction</span></a></li>
                                                <li><a href="#"><i class="fa fa-download"></i><span>Installation</span></a>
                                                </li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i class="fa fa-cog"></i><span>T3 Settings</span></a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-desktop"></i><span>Layout System</span></a>
                                                </li>
                                            </ul>
                                            <ul class="col-md-4 mega-menu-submenu">
                                                <li><a href="#"><i
                                                        class="fa fa-magic"></i><span>Customization</span></a></li>
                                                <li><a href="#"><i
                                                        class="fa fa-question-circle"></i><span>FAQs</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form id="topbar-search" action="#" method="GET" class="hidden-xs">
                    <div class="input-group"><input type="text" placeholder="Search..." class="form-control"/><span
                            class="input-group-btn"><a href="javascript:;" class="btn submit"><i
                            class="fa fa-search"></i></a></span></div>
                </form>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i
                            class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><p>You have 14 new notifications</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-blue"><i class="fa fa-comment"></i></span>New Comment<span
                                                class="pull-right text-muted small">4 mins ago</span></a></li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-violet"><i class="fa fa-twitter"></i></span>3 New
                                            Followers<span class="pull-right text-muted small">12 mins ago</span></a>
                                        </li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-pink"><i class="fa fa-envelope"></i></span>Message
                                            Sent<span class="pull-right text-muted small">15 mins ago</span></a></li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-green"><i class="fa fa-tasks"></i></span>New
                                            Task<span class="pull-right text-muted small">18 mins ago</span></a></li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-yellow"><i class="fa fa-upload"></i></span>Server
                                            Rebooted<span class="pull-right text-muted small">19 mins ago</span></a>
                                        </li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-green"><i class="fa fa-tasks"></i></span>New
                                            Task<span class="pull-right text-muted small">2 days ago</span></a></li>
                                        <li><a href="extra-user-list.html" target="_blank"><span
                                                class="label label-pink"><i class="fa fa-envelope"></i></span>Message
                                            Sent<span class="pull-right text-muted small">5 days ago</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="extra-user-list.html" class="text-right">See all alerts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i
                            class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li><p>You have 14 new messages</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="email-view-mail.html" target="_blank"><span class="avatar"><img
                                                src=""
                                                alt="" class="img-responsive img-circle"/></span><span
                                                class="info"><span class="name">Jessica Spencer</span><span
                                                class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="email-view-mail.html" target="_blank"><span class="avatar"><img
                                                src=""
                                                alt="" class="img-responsive img-circle"/></span><span
                                                class="info"><span class="name">John Smith<span
                                                class="label label-blue pull-right">New</span></span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a>
                                        </li>
                                        <li><a href="email-view-mail.html" target="_blank"><span class="avatar"><img
                                                src=""
                                                alt="" class="img-responsive img-circle"/></span><span
                                                class="info"><span class="name">John Doe<span
                                                class="label label-orange pull-right">10 min</span></span><span
                                                class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="email-view-mail.html" target="_blank"><span class="avatar"><img
                                                src=""
                                                alt="" class="img-responsive img-circle"/></span><span
                                                class="info"><span class="name">John Smith</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a>
                                        </li>
                                        <li><a href="email-view-mail.html" target="_blank"><span class="avatar"><img
                                                src=""
                                                alt="" class="img-responsive img-circle"/></span><span
                                                class="info"><span class="name">John Smith</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="email-view-mail.html" target="_blank">Read all messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i
                            class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>
                        <ul class="dropdown-menu dropdown-tasks">
                            <li><p>You have 14 pending tasks</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="page-blog-item.html" target="_blank"><span class="task-item">Fix the HTML code<small
                                                class="pull-right text-muted">40%
                                        </small></span>

                                            <div class="progress progress-sm">
                                                <div role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                     aria-valuemax="100" style="width: 40%;"
                                                     class="progress-bar progress-bar-orange"><span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </a></li>
                                        <li><a href="page-blog-item.html" target="_blank"> <span class="task-item">Make a wordpress theme<small
                                                class="pull-right text-muted">60%
                                        </small></span>

                                            <div class="progress progress-sm">
                                                <div role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                     aria-valuemax="100" style="width: 60%;"
                                                     class="progress-bar progress-bar-blue"><span class="sr-only">60% Complete (success)</span>
                                                </div>
                                            </div>
                                        </a></li>
                                        <li><a href="page-blog-item.html" target="_blank"> <span class="task-item">Convert PSD to HTML<small
                                                class="pull-right text-muted">55%
                                        </small></span>

                                            <div class="progress progress-sm">
                                                <div role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                                     aria-valuemax="100" style="width: 55%;"
                                                     class="progress-bar progress-bar-green"><span class="sr-only">55% Complete (success)</span>
                                                </div>
                                            </div>
                                        </a></li>
                                        <li><a href="page-blog-item.html" target="_blank"> <span class="task-item">Convert HTML to Wordpress<small
                                                class="pull-right text-muted">78%
                                        </small></span>

                                            <div class="progress progress-sm">
                                                <div role="progressbar" aria-valuenow="78" aria-valuemin="0"
                                                     aria-valuemax="100" style="width: 78%;"
                                                     class="progress-bar progress-bar-yellow"><span class="sr-only">78% Complete (success)</span>
                                                </div>
                                            </div>
                                        </a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="page-blog-item.html" target="_blank">See all tasks</a></li>
                        </ul>
                    </li>
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img
                            src="" alt=""
                            class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">John Doe</span>&nbsp;<span
                            class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="extra-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                            <li><a href="page-calendar.html"><i class="fa fa-calendar"></i>My Calendar</a></li>
                            <li><a href="email-inbox.html"><i class="fa fa-envelope"></i>My Inbox<span
                                    class="badge badge-danger">3</span></a></li>
                            <li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span
                                    class="badge badge-success">7</span></a></li>
                            <li class="divider"></li>
                            <li><a href="extra-lock-screen.html"><i class="fa fa-lock"></i>Lock Screen</a></li>
                            <li><a href="{{ route('logout') }}" style="color: #333" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat btn_info"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form></li>
                        </ul>
                    </li>
                    <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" class="btn-chat"><i
                            class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li>
                </ul>
            </div>
        </nav>
        <!--BEGIN MODAL CONFIG PORTLET-->
        <div id="modal-config" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 class="modal-title">Modal title</h4></div>
                    <div class="modal-body">
                        <a href="">aaaaaaaaaaaaaaaaaa</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL CONFIG PORTLET--></div>
    <!--END TOPBAR-->
    <div id="wrapper">


        <!--BEGIN SIDEBAR MENU-->
        @include('layouts.slidebar')
        <!--END SIDEBAR MENU-->


        
        <!--BEGIN CHAT FORM-->
        <div id="chat-form" class="fixed">
            <div class="chat-inner"><h2 class="chat-header"><a href="javascript:;" class="chat-form-close pull-right"><i
                    class="glyphicon glyphicon-remove"></i></a><i class="fa fa-user"></i>&nbsp;
                Chat
                &nbsp;<span class="badge badge-info">3</span></h2>

                <div id="group-1" class="chat-group"><strong>Favorites</strong><a href="#"><span
                        class="user-status is-online"></span>
                    <small>Verna Morton</small>
                    <span class="badge badge-info">2</span></a><a href="#"><span class="user-status is-online"></span>
                    <small>Delores Blake</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                        class="user-status is-busy"></span>
                    <small>Nathaniel Morris</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                        class="user-status is-idle"></span>
                    <small>Boyd Bridges</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                        class="user-status is-offline"></span>
                    <small>Meredith Houston</small>
                    <span class="badge badge-info is-hidden">0</span></a></div>
                <div id="group-2" class="chat-group"><strong>Office</strong><a href="#"><span
                        class="user-status is-busy"></span>
                    <small>Ann Scott</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                        class="user-status is-offline"></span>
                    <small>Sherman Stokes</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                        class="user-status is-offline"></span>
                    <small>Florence Pierce</small>
                    <span class="badge badge-info">1</span></a></div>
                <div id="group-3" class="chat-group"><strong>Friends</strong><a href="#"><span
                        class="user-status is-online"></span>
                    <small>Willard Mckenzie</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                        class="user-status is-busy"></span>
                    <small>Jenny Frazier</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                        class="user-status is-offline"></span>
                    <small>Chris Stewart</small>
                    <span class="badge badge-info is-hidden">0</span></a><a href="#"><span
                        class="user-status is-offline"></span>
                    <small>Olivia Green</small>
                    <span class="badge badge-info is-hidden">0</span></a></div>
            </div>
            <div id="chat-box" style="top:400px">
                <div class="chat-box-header"><a href="#" class="chat-box-close pull-right"><i
                        class="glyphicon glyphicon-remove"></i></a><span class="user-status is-online"></span><span
                        class="display-name">Willard Mckenzie</span>
                    <small>Online</small>
                </div>
                <div class="chat-content">
                    <ul class="chat-box-body">
                        <li><p><img src=""
                                    class="avt"/><span class="user">John Doe</span><span class="time">09:33</span></p>

                            <p>Hi Swlabs, we have some comments for you.</p></li>
                        <li class="odd"><p><img src=""
                                                class="avt"/><span class="user">Swlabs</span><span
                                class="time">09:33</span></p>

                            <p>Hi, we're listening you...</p></li>
                    </ul>
                </div>
                <div class="chat-textarea"><input placeholder="Type your message" class="form-control"/></div>
            </div>
        </div>
        <!--END CHAT FORM--><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <!-- <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-left">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div> -->
            <!--END TITLE & BREADCRUMB PAGE-->
            <!--BEGIN CONTENT-->
            @yield('script')
            <!-- BẮT ĐẦU Ở ĐÂY -->
            @yield('content')

            <!-- KẾT THÚC Ở ĐÂY -->

            <!--END CONTENT--></div>
        <!--BEGIN FOOTER-->
     <!--    <div id="footer">
            <div class="copyright">2014 © &mu;Admin - Responsive Multi-Style Admin Template</div>
        </div> -->
        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
    <!-- footer -->
    @include('layouts.footer')
</body>
</html>
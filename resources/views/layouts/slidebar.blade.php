<nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <li class="user-panel">
                <div class="thumb"><img src="upload/avatar/{{Auth::User()->avatar}}" alt="" class="img-circle"/></div>
                <div class="info"><p>{{Auth::User()->username}}</p>
                    <ul class="list-inline list-unstyled">
                        <li><a href="profile/{{Auth::User()->id}}" data-hover="tooltip" title="Profile"><i
                                class="fa fa-user"></i></a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  data-hover="tooltip" title="Logout"><i
                                class="fa fa-sign-out"></i></a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form></li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </li>
            <?php 
                
                $link = $_SERVER['REQUEST_URI'];
                $link_array = explode('/',$link);
                $match = '/' . end($link_array);
            ?>
            <li <?php if ($match == '/home') {
                       ?> class="active" <?php
                    } ?>><a href="home"><i class="fa fa-home">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Trang Chủ</span></a></li>
            <li><a href="#"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Frontend</span><span class="fa arrow"></span><span
                    class="label label-yellow">v3.0</span></a>
                <ul class="nav nav-second-level">
                    <li><a href="frontend-one-page.html"><i class="fa fa-rocket"></i><span
                            class="submenu-title">One Page</span></a></li>
                </ul>
            </li>
            <li <?php if ($match == '/roles' || $match == '/permission') {
                       ?> class="active" <?php
                    } ?> ><a href="#"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Quyền và truy cập </span><span class="fa arrow"></span></i></a>
                <ul  <?php if ($match == '/roles' || $match == '/permission') {
                       ?> class="nav nav-second-level collapse in" <?php
                    }else{
                        ?>
                        class="nav nav-second-level" 
                       <?php } ?>>
                    <li <?php 
                        if ($match == '/roles') {
                            
                        ?>
                        class="active"
                        <?php
                    }
                    ?> ><a href="roles"><i class="fa fa-rocket"></i><span
                            class="submenu-title">Phân quyền</span></a></li>
                    <li <?php 
                        if ($match == '/permission') {
                            
                        ?>
                        class="active"
                        <?php
                    }
                    ?> ><a href="permission"><i class="fa fa-rocket"></i><span
                            class="submenu-title">Quyền truy cập</span></a>
                    </li>
                    <li <?php 
                        if ($match == '/users') {
                            
                        ?>
                        class="active"
                        <?php
                    }
                    ?> ><a href="roles/users"><i class="fa fa-rocket"></i><span
                            class="submenu-title">Người dùng</span></a>
                    </li>                    
                </ul>
            </li>
            <li<?php if ($match == '/contract') {
                       ?> class="active" <?php
                    } ?>><a href="contract"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Danh Sách Hợp Đồng</span></a>
            </li>
            <li<?php if ($match == '/employee') {
                       ?> class="active" <?php
                    } ?>><a href="employee"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Danh Sách Nhân Viên</span></a>
            </li>
            <li<?php if ($match == '/profile/') {
                       ?> class="active" <?php
                    } ?>><a href="profile/{{Auth::user()->id}}"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Hồ Sơ</span></a>
            </li>
            <li<?php if ($match == '/manage-access') {
                       ?> class="active" <?php
                    } ?>><a href="manage-access"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Quản Lý Truy Cập</span></a>
            </li>
            <li<?php if ($match == '/department') {
                       ?> class="active" <?php
                    } ?>><a href="department"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Danh Sách Phòng Ban</span></a>
            </li>
            <li<?php if ($match == '/notification') {
                       ?> class="active" <?php
                    } ?>><a href="notification"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Thông Báo</span></a>
            </li>
            <li<?php if ($match == '/leave') {
                       ?> class="active" <?php
                    } ?>><a href="leave"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Xin Nghỉ</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="leave"><i class="fa fa-rocket"></i><spanclass="submenu-title">Quản Lý</span></a></li>
                     <li><a href="leave/add"><i class="fa fa-rocket"></i><spanclass="submenu-title">Tạo Mới</span></a></li>
                </ul>
            </li>
            <li<?php if ($match == '/position') {
                       ?> class="active" <?php
                    } ?>><a href="position"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Chức Vụ</span></a>
            </li>
            <li<?php if ($match == '/jobtype') {
                       ?> class="active" <?php
                    } ?>><a href="jobtype"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Chuyên Môn</span></a>
            </li>
            <li<?php if ($match == '/retribution') {
                       ?> class="active" <?php
                    } ?>><a href="retribution"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Khen Thưởng - Kỷ Luật</span></a>
            </li>
            <li<?php if ($match == '/business-trip') {
                       ?> class="active" <?php
                    } ?>><a href="business-trip"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Công Tác</span></a>
            </li>
            <li <?php if ($match == '/roles' || $match == '/permission') {
                       ?> class="active" <?php
                    } ?> ><a href="#"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Lương Bổng </span><span class="fa arrow"></span></i></a>
                <ul  <?php if ($match == '/salary' || $match == '/timekeeping') {
                       ?> class="nav nav-second-level collapse in" <?php
                    }else{
                        ?>
                        class="nav nav-second-level" 
                       <?php } ?>>
                    <li <?php 
                        if ($match == '/salary') {
                            
                        ?>
                        class="active"
                        <?php
                    }
                    ?> ><a href="salary"><i class="fa fa-rocket"></i><span
                            class="submenu-title">Lương</span></a></li>
                    <li <?php 
                        if ($match == '/allowance') {
                            
                        ?>
                        class="active"
                        <?php
                    }
                    ?> ><a href="salary"><i class="fa fa-rocket"></i><span
                            class="submenu-title">Phụ cấp</span></a></li>
                    <li <?php
                        $month = date("m");
                        $year = date("Y");
                        if ($match == '/timekeeping?month='.$month.'?year='.$year) {
                            
                        ?>
                        class="active"
                        <?php
                    }
                    ?> ><a href="/timekeeping{{'?month='.$month.'&year='.$year}}"><i class="fa fa-rocket"></i><span
                            class="submenu-title">Chấm Công</span></a>
                    </li>                    
                </ul>
            </li>       
        </ul>
    </div>
</nav>
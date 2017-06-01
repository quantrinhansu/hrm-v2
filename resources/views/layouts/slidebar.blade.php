<nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <li class="user-panel">
                <div class="thumb"><img src=""
                                        alt="" class="img-circle"/></div>
                <div class="info"><p>John Doe</p>
                    <ul class="list-inline list-unstyled">
                        <li><a href="extra-profile.html" data-hover="tooltip" title="Profile"><i
                                class="fa fa-user"></i></a></li>
                        <li><a href="email-inbox.html" data-hover="tooltip" title="Mail"><i
                                class="fa fa-envelope"></i></a></li>
                        <li><a href="#" data-hover="tooltip" title="Setting" data-toggle="modal"
                               data-target="#modal-config"><i class="fa fa-cog"></i></a></li>
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
                    } ?>><a href="index.html"><i class="fa fa-tachometer fa-fw">
                <div class="icon-bg bg-orange"></div>
            </i><span class="menu-title">Dashboard</span></a></li>
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
            <li<?php if ($match == '/employee') {
                       ?> class="active" <?php
                    } ?>><a href="employee"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Danh Sách Nhân Viên</span></a>
            </li>
            <li<?php if ($match == '/profile') {
                       ?> class="active" <?php
                    } ?>><a href="profile"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Profile</span></a>
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
        </ul>
    </div>
</nav>
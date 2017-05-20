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
                        <li><a href="extra-signin.html" data-hover="tooltip" title="Logout"><i
                                class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </li>
            <li <?php if ($_SERVER['REQUEST_URI'] == '/home') {
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
            <li<?php if ($_SERVER['REQUEST_URI'] == '/profile') {
                       ?> class="active" <?php
                    } ?>><a href="profile"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Profile</span></a>
            </li>
            <li<?php if ($_SERVER['REQUEST_URI'] == '/access') {
                       ?> class="active" <?php
                    } ?>><a href="access"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Quản Lý Truy Cập</span></a>
            </li>
            <li<?php if ($_SERVER['REQUEST_URI'] == '/notification') {
                       ?> class="active" <?php
                    } ?>><a href="notification"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Thông Báo</span></a>
            </li>
            <li<?php if ($_SERVER['REQUEST_URI'] == '/leave') {
                       ?> class="active" <?php
                    } ?>><a href="leave"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Xin Nghỉ</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="leave"><i class="fa fa-rocket"></i><spanclass="submenu-title">Quản Lý</span></a></li>
                     <li><a href="createleave"><i class="fa fa-rocket"></i><spanclass="submenu-title">Tạo Mới</span></a></li>
                </ul>
            </li>
            <li<?php if ($_SERVER['REQUEST_URI'] == '/position') {
                       ?> class="active" <?php
                    } ?>><a href="position"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Chức Vụ</span></a>
            </li>
            <li<?php if ($_SERVER['REQUEST_URI'] == '/jobtype') {
                       ?> class="active" <?php
                    } ?>><a href="jobtype"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Chuyên Môn</span></a>
            </li>
            <li<?php if ($_SERVER['REQUEST_URI'] == '/khenthuong') {
                       ?> class="active" <?php
                    } ?>><a href="khenthuong"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Khen Thưởng - Kỷ Luật</span></a>
            </li>
            <li<?php if ($_SERVER['REQUEST_URI'] == '/congtac') {
                       ?> class="active" <?php
                    } ?>><a href="congtac"><i class="fa fa-laptop fa-fw">
                <div class="icon-bg bg-pink"></div>
            </i><span class="menu-title">Công Tác</span></a>
            </li>
        </ul>
    </div>
</nav>
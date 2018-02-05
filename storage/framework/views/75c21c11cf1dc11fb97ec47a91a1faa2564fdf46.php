<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vision International</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bower includes -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bower_bundle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bundle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- Google Font -->
    <link rel="stylesheet"
          href="<?php echo e(asset('fonts/googlefonts.css')); ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <div href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">VI</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Vision International</span>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <!-- // get current route -->
    <?php $currentRoutePrefix = request()->route()->getPrefix(); ?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Main Navigation</li>
                <li class="treeview <?php echo e(($currentRoutePrefix === '/admin') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="">
                            <a href="<?php echo e(route('admin.home')); ?>">
                                <i class="fa fa-circle-o"></i>
                                Home
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?php echo e(($currentRoutePrefix === 'admin/news') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-thumb-tack"></i>
                        <span>News</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo e(route('news.list')); ?>">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('news.new')); ?>">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?php echo e(($currentRoutePrefix === 'admin/opportunities') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-briefcase"></i>
                        <span>Opportunities</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo e(route('opportunities.list')); ?>">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('opportunities.create')); ?>">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php echo e(($currentRoutePrefix === 'admin/programs') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-file"></i>
                        <span>Programs</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo e(route('programs.list')); ?>">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('programs.create')); ?>">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?php echo e(($currentRoutePrefix === 'admin/testimonials') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-comment"></i>
                        <span>Testimonials</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo e(route('testimonials.list')); ?>">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('testimonials.new')); ?>">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php echo e(($currentRoutePrefix === 'admin/application') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span>Application</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo e(route('application.list')); ?>">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php echo e(($currentRoutePrefix === 'admin/internshipcompany') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Internship Company</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo e(route('internshipcompany.list')); ?>">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('internshipcompany.new')); ?>">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php echo e(($currentRoutePrefix === 'admin/workcompany') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Work Company</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo e(route('workpcompany.list')); ?>">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('workpcompany.new')); ?>">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview <?php echo e(($currentRoutePrefix === 'admin/featuredimage') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="fa fa-bookmark"></i>
                        <span>Featured Images   </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo e(route('featuredimage.index')); ?>">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('logout')); ?>">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php echo $__env->yieldContent('content-header'); ?>

        <!-- Main content -->
        <?php echo $__env->yieldContent('content-main'); ?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<script src="<?php echo e(asset('js/bundle.js')); ?>"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>

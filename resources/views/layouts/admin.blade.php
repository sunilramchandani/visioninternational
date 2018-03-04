<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vision International</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bower includes -->
    <link rel="stylesheet" href="{{ asset('css/bower_bundle.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/bundle.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-multiselect.css') }}">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



    <!-- Google Font -->
    <link rel="stylesheet"
          href="{{ asset('fonts/googlefonts.css') }}">
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
                <li class="treeview {{ ($currentRoutePrefix === '/admin') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="">
                            <a href="{{ route('admin.home') }}">
                                <i class="fa fa-circle-o"></i>
                                Home
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ ($currentRoutePrefix === 'admin/blog') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-thumb-tack"></i>
                        <span>Blog</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('blog.index') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blog.create') }}">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{ ($currentRoutePrefix === 'admin/blog') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-thumb-tack"></i>
                        <span>Event</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('event.list') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                    </ul>
                </li>
              <li class="treeview {{ ($currentRoutePrefix === 'admin/news') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-thumb-tack"></i>
                        <span>News</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('news.index') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('news.create') }}">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li> 

                <li class="treeview {{ ($currentRoutePrefix === 'admin/media') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-thumb-tack"></i>
                        <span>Media</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('media.adminIndex') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('media.adminCreate') }}">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li> 

                <li class="treeview {{ ($currentRoutePrefix === 'admin/application') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-envelope"></i>
                        <span>Applications</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('application.list') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                    </ul>
                </li>

                

                <li class="treeview {{ ($currentRoutePrefix === 'admin/internshipcompany') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Internship Company</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('internshipcompany.list') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('internshipcompany.new') }}">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>

                            <li>
                        </li>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ ($currentRoutePrefix === 'admin/workcompany') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Work Company</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('workcompany.list') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('workcompany.new') }}">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ ($currentRoutePrefix === 'admin/featuredimage') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-bookmark"></i>
                        <span>  Featured Images   </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    
                    <ul class="treeview-menu">
                    @foreach ($featuredimage_table as $featuredimage)
                        <li>
                            <a href="{{ route('featuredimage.edit', $featuredimage->id) }}">
                                <i class="fa fa-list"></i>
                                <td>{{$featuredimage->page_name}}</td>
                            </a>
                            

                        </li>
                        @endforeach
                        <li>
                            <a href="{{ route('testimonials.list') }}">
                                <i class="fa fa-list"></i>
                                <td>Testimonials</td>
                            </a>

                        </li>

                        <li>
                            <a href="{{ route('programs.list') }}">
                                <i class="fa fa-list"></i>
                                <td>Promo</td>
                            </a>

                        </li>

                        <li>
                            <a href="{{ route('counter.adminEdit', 1) }}">
                                <i class="fa fa-list"></i>
                                <td>Counter</td>
                            </a>

                        </li>

                    </ul>
                   
                </li>

                <li class="treeview {{ ($currentRoutePrefix === 'admin/aboutus') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>About Us</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('aboutus.adminIndex') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('aboutus.adminCreate') }}">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>

                            <li>
                        </li>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ ($currentRoutePrefix === 'admin/faq') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>FAQ</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('faq.adminIndex') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faq.adminCreate') }}">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>

                            <li>
                        </li>
                        </li>
                    </ul>
                </li>

                <hr>
                

                <li class="treeview {{ ($currentRoutePrefix === 'admin/rate') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Rates</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('rate.adminIndex') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="treeview {{ ($currentRoutePrefix === 'admin/author') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Author</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('author.list') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('author.create') }}">
                                <i class="fa fa-plus-circle"></i>
                                New
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ ($currentRoutePrefix === 'admin/category') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('category.list') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="treeview {{ ($currentRoutePrefix === 'admin/opportunity') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Opportunity</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('opportunity.list') }}">
                                <i class="fa fa-list"></i>
                                List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{ ($currentRoutePrefix === 'admin/qualification') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-building"></i>
                        <span>Qualification</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('qualification.list') }}">
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
                    <a href="{{ route('logout') }}">
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
        @yield('content-header')

        <!-- Main content -->
        @yield('content-main')
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

<script src="{{ asset('js/bundle.js') }}"></script>
<script src="{{ asset('/js/bootstrap-multiselect.js') }}"></script> 
@yield('scripts')

</body>
</html>

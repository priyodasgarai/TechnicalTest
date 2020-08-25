<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        @yield('title')
        @yield('custom_css')
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('public/admin-asset/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/admin-asset/font-awesome/css/font-awesome.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('public/admin-asset/css/ionicons.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/admin-asset/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('public/admin-asset/css/_all-skins.min.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="{{url('admin/dashboard')}}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>T</b>TA</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Technical Test </b>Admin</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->

                    <div class="navbar-custom-menu">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <a href="{{url('admin/settings')}}" class="fa fa-empire btn-sm text-bold text-lime">Setting</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('admin/logout')}}"  class="fa fa-lock btn-sm text-bold text-red">Logout</a>
                            </div>
                        </div>
                    </div>
                </nav>

            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                 @yield('main-sidebar') 
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->

                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset('public/admin-asset/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{Auth::guard('web_admin')->user()->name}}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> {{trans('labels.22')}}</a>
                        </div>
                    </div> 
                    @yield('Sidebar-user-panel')  
                    <!-- search form -->
                    @yield('Sidebar-search-form')
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                                <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>Layout Options</span>
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right">4</span>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                                <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                                <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../widgets.html">
                                <i class="fa fa-th"></i> <span>Widgets</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green">Hot</small>
                                </span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Charts</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                                <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                                <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                                <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>UI Elements</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> General</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Icons</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Buttons</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Sliders</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Timeline</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Modals</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Forms</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                                <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                                <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Tables</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                                <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../calendar.html">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-red">3</small>
                                    <small class="label pull-right bg-blue">17</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="../mailbox/mailbox.html">
                                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-yellow">12</small>
                                    <small class="label pull-right bg-green">16</small>
                                    <small class="label pull-right bg-red">5</small>
                                </span>
                            </a>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Examples</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                                <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                                <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                                <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                                <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                                <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                                <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                                <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                                <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-share"></i> <span>Multilevel</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Level One
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                                <span class="pull-right-container">
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                            </ul>
                        </li>
                        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                        <li class="header">LABELS</li>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
                    </ul>               
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('Main-content-header')                    
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    @yield('Main-content') 
                    <!-- /.box -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> N/A
                </div>
                <strong>Copyright &copy; 2020-2025 <a href="#">Priyodas Garai</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            @yield('Control-Sidebar')     

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{{asset('public/admin-asset/js/jquery.min.js')}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset('public/admin-asset/js/bootstrap.min.js')}}"></script>
        <!-- SlimScroll -->
        <script src="{{asset('public/admin-asset/js/jquery.slimscroll.min.js')}}"></script>
        <!-- FastClick -->
        <script src="{{asset('public/admin-asset/js/fastclick.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('public/admin-asset/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('public/admin-asset/js/demo.js')}}"></script>
        <script>
$(document).ready(function () {
    $('.sidebar-menu').tree()
})
        </script>
    </body>
</html>

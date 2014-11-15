
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Data Tables</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo RESOURCES_PATH; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo RESOURCES_PATH; ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo RESOURCES_PATH; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo RESOURCES_PATH; ?>css/style.css" rel="stylesheet" />
        <link href="<?php echo RESOURCES_PATH; ?>css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo RESOURCES_PATH; ?>css/style_default.css" rel="stylesheet" id="style_color" />
 
        <link href="<?php echo RESOURCES_PATH; ?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo RESOURCES_PATH; ?>assets/uniform/css/uniform.default.css" />
        <!--<script src="<?php echo RESOURCES_PATH; ?>js/jquery-1.8.3.min.js"></script>-->

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="index.html">
                        <img src="<?php echo RESOURCES_PATH; ?>img/logo.png" alt="Admin Lab" />
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <div id="top_menu" class="nav notify-row">
                        <!-- BEGIN NOTIFICATION -->
                        <ul class="nav top-menu">
                            <!-- BEGIN SETTINGS -->
                            <li class="dropdown">
                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Settings">
                                    <i class="icon-cog"></i>
                                </a>
                            </li>
                            <!-- END SETTINGS -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown" id="header_inbox_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-envelope-alt"></i>
                                    <span class="badge badge-important">5</span>
                                </a>
                                <ul class="dropdown-menu extended inbox">
                                    <li>
                                        <p>You have 5 new messages</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Dulal Khan</span>
                                                <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hello, this is an example messages please check
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Rafiqul Islam</span>
                                                <span class="time">10 mins</span>
                                            </span>
                                            <span class="message">
                                                Hi, Mosaddek Bhai how are you ?
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Sumon Ahmed</span>
                                                <span class="time">3 hrs</span>
                                            </span>
                                            <span class="message">
                                                This is awesome dashboard templates
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Dulal Khan</span>
                                                <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hello, this is an example messages please check
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">See all messages</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <li class="dropdown" id="header_notification_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <i class="icon-bell-alt"></i>
                                    <span class="badge badge-warning">7</span>
                                </a>
                                <ul class="dropdown-menu extended notification">
                                    <li>
                                        <p>You have 7 new notificaciones</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            Server #3 overloaded.
                                            <span class="small italic">34 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-warning"><i class="icon-bell"></i></span>
                                            Server #10 not respoding.
                                            <span class="small italic">1 Hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            Database overloaded 24%.
                                            <span class="small italic">4 hrs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-success"><i class="icon-plus"></i></span>
                                            New user registered.
                                            <span class="small italic">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                            Application error.
                                            <span class="small italic">10 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">See all notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->

                        </ul>
                    </div>
                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN SUPPORT -->
                            <li class="dropdown mtop5">

                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                                    <i class="icon-comments-alt"></i>
                                </a>
                            </li>
                            <li class="dropdown mtop5">
                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                                    <i class="icon-headphones"></i>
                                </a>
                            </li>
                            <!-- END SUPPORT -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/avatar1_small.jpg" alt="">
                                    <span class="username">Mosaddek Hossain</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                                    <li><a href="#"><i class="icon-calendar"></i> Calendar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div id="sidebar" class="nav-collapse collapse">
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <div class="navbar-inverse">
                    <form class="navbar-search visible-phone">
                        <input type="text" class="search-query" placeholder="Search" />
                    </form>
                </div>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="sidebar-menu">
                    <li class="has-sub active">
                        <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-dashboard"></i></span> Registros
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="<?php echo base_url() . "admin/users_management"; ?>">Usuario</a></li>
                            <li><a class="" href="<?php echo base_url() . "admin/ubicacion_management"; ?>">ubicaciones</a></li>



                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-book"></i></span> UI Elements
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="ui_elements_general.html">General</a></li>
                            <li><a class="" href="ui_elements_buttons.html">Buttons</a></li>

                            <li><a class="" href="ui_elements_tabs_accordions.html">Tabs & Accordions</a></li>
                            <li><a class="" href="ui_elements_typography.html">Typography</a></li>
                            <li><a class="" href="tree_view.html">Tree View</a></li>
                            <li><a class="" href="nestable.html">Nestable List</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"><i class="icon-cogs"></i></span> Components
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="calendar.html">Calendar</a></li>
                            <li class="active"><a class="" href="data_table.html">Data Table</a></li>
                            <li><a class="" href="grids.html">Grids</a></li>
                            <li><a class="" href="charts.html">Visual Charts</a></li>
                            <li><a class="" href="messengers.html">Conversations</a></li>
                            <li><a class="" href="gallery.html"> Gallery</a></li>
                        </ul>
                    </li>

                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div id="main-content">
                <br><br>
                <?php echo $content_for_layout ?>
            </div>
            <!-- END PAGE -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div id="footer">
            2014 &copy; Proyecto EPSA
            <div class="span pull-right">
                <span class="go-top"><i class="icon-arrow-up"></i></span>
            </div>
        </div>


        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->

        <script src="<?php echo RESOURCES_PATH; ?>assets/bootstrap/js/bootstrap.min.js"></script>   
        <!--<script src="<?php echo RESOURCES_PATH; ?>js/jquery.blockui.js"></script>-->
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->   
        <script type="text/javascript" src="<?php echo RESOURCES_PATH; ?>assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo RESOURCES_PATH; ?>assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo RESOURCES_PATH; ?>assets/data-tables/DT_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo RESOURCES_PATH; ?>js/jquery.validate.min.js"></script>
        <script src="<?php echo RESOURCES_PATH; ?>js/scripts.js"></script>

        <script>
            jQuery(document).ready(function () {
                // initiate layout and plugins
                App.init();
            });
        </script>
    </body>
    <!-- END BODY -->
</html>

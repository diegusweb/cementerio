
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
        <script src="<?php echo RESOURCES_PATH; ?>js/jquery-1.8.3.min.js"></script>
        <script> var base_url = "<?php echo base_url();?>";</script>
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
                        <img src="<?php echo RESOURCES_PATH; ?>img/logo.png_" alt="Cementerio" />
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
                                  
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!--<li class="dropdown" id="header_notification_bar">
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
                            </li>-->
                            <!-- END NOTIFICATION DROPDOWN -->

                        </ul>
                    </div>
                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/avatar1_small.jpg" alt="">
                                    <span class="username">Diego Rueda</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
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
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-dashboard"></i></span>Admin Registros
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="<?php echo base_url() . "admin/users_management"; ?>">Usuario</a></li>

                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-dashboard"></i></span>Admin Bloques
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="<?php echo base_url() . "admin/bloque_nicho_management"; ?>">Bloque Nichos</a></li>
                            <li><a class="" href="<?php echo base_url() . "admin/bloque_mausoleo_management"; ?>">Bloque Mausoleos</a></li>
                            <li><a class="" href="<?php echo base_url() . "admin/bloque_cremados_management"; ?>">Bloque Cremados</a></li>
                            <li><a class="" href="<?php echo base_url() . "admin/bloque_tierra_management"; ?>">Bloque Bajo Tierra</a></li>

                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-dashboard"></i></span>Registros
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="formSolicitante" href="javascript:void(0)">Solicitantes</a></li>
                            <li><a class="" href="<?php echo base_url() . "home/showFormDifunto"; ?>">Difuntos</a></li>
                            <li><a class="" href="<?php echo base_url() . "home"; ?>">Interfaz bloque</a></li>
                            
                        </ul>
                    </li>

                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div id="main-content">
                <br>
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
        <script src="<?php echo RESOURCES_PATH; ?>js/cementerio.js"></script>

        <script>
            jQuery(document).ready(function () {
                // initiate layout and plugins
                App.init();
            });
        </script>
        <div id="myModalAddSolicitante" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Nuevo Solicitante</h3>
            </div>
            <div class="modal-body">
                <p id="contentDemoSol">One fine body…</p>
            </div>
        </div>
    </body>
    <!-- END BODY -->
</html>

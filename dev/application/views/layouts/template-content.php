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
		<link href="<?php echo RESOURCES_PATH; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" id="style_color" />
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
                    <a class="brand" href="javascript:void(0);">
                        Cementerio<!--<img src="<?php echo RESOURCES_PATH; ?>img/logo.png_" alt="Cementerio" />-->
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
                            <li class="dropdown" id="header_notification_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <i class="icon-bell-alt"></i>
                                    
                                    <span class="badge badge-warning"><?php echo count($alarma);?></span>
                                </a>
                                <ul class="dropdown-menu extended notification">
                                    <li>
                                        <p>Alertas</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                          
                                            <span class="small italic"> Hay <?php echo count($alarma);?> nichos para renovar</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo base_url()."admin/bloque_expiro_management"?>">Mostrar Nichos</a>
                                    </li>
                                </ul>
                            </li>
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
                                    <span class="username"><?php echo $this->session->userdata('username');?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">                                  
                        
                                    <li><a href="<?php echo base_url()."login/logout";?>"><i class="icon-key"></i> Salir</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                        <div style="padding-top: 10px; display: none;" class='loading'>
                            <img src="<?php echo RESOURCES_PATH; ?>img/loading.gif" alt="" width="40" height="40"/>
                        </div>
                        <button id="imprimirView" style="display: none;" type="button" onclick="imprimir();" class="btn btn-primary btn-lg">
                            Imprimir Comprobante
                        </button>
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
                    <?php
                    if($this->session->userdata('rol') == "Administrador"){
                    ?>
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
                           <!-- <li><a class="" href="<?php echo base_url() . "admin/bloque_historial_management"; ?>">Historial Nichos</a></li>-->
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="has-sub">
                        <a href="javascript:;" class="">
                            <span class="icon-box"> <i class="icon-dashboard"></i></span>Mapa y Reportes
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <!--<li><a class="formSolicitante" href="javascript:void(0)">Solicitantes</a></li>
                            <li><a class="" href="<?php echo base_url() . "home/showFormDifunto"; ?>">Difuntos</a></li>-->
                            <li><a class="" href="<?php echo base_url() . "home"; ?>">Mapa de Bloques</a></li>
			    <li><a class="" href="<?php echo base_url() . "reportes"; ?>">Reportes Registros</a></li>
                            <li><a class="" href="<?php echo base_url() . "reportes/reporteNicho"; ?>">Reportes Nichos</a></li>
                            <li><a id="servicio_cremacion" class="" href="javascript:void(0);" data-form="<?php echo "1";?>">Servicio Cremacion</a></li>
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
            2014 &copy; Proyecto Cementerio
            <div class="span pull-right">
                <span class="go-top"><i class="icon-arrow-up"></i></span>
            </div>
        </div>


        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->

        <script src="<?php echo RESOURCES_PATH; ?>assets/bootstrap/js/bootstrap.min.js"></script>   
       <script src="<?php echo RESOURCES_PATH; ?>js/bootstrap-datetimepicker.min.js"></script> 
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
        <!--<div id="myModalAddSolicitante" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Registro Solicitante</h3>
            </div>
            <div class="modal-body">
                <p id="contentDemoSol">One fine body…</p>
            </div>
        </div>-->
        
        <div id="myModalError" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Registro Difunto</h3>
            </div>
            <div class="modal-body">
                <p id="contentDemoM">One fine body…</p>
            </div>
        </div>
        
         <div id="myModalReport" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Registro Difunto</h3>
            </div>
            <div class="modal-body">
                <p id="contentDemoR">One fine body…</p>
            </div>
        </div>
        
        <div id="myModalAddForm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Nueva Nicho</h3>
            </div>
            <div class="modal-body">
                <p id="contentDemoadd">One fine body…</p>
            </div>
        </div>

        <div id="myModalComprobante" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Mostrar Comprobante</h3>
            </div>
            <div class="modal-body">
                <p id="contentIdComprobante"></p>
            </div>
        </div>

    </body>
    <!-- END BODY -->
</html>

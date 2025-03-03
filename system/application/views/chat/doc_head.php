<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Plataforma ATT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Admin Panel Template">
        <meta name="author" content="ATT">
        
        
        <!-- styles -->
        
        <!--<link href="<?php echo base_url(); ?>theme/themeAplicaciones/css/bootstrap.css" rel="stylesheet">-->
        <!--<link href="<?php echo base_url(); ?>theme/themeChat/css/bootstrap.css" rel="stylesheet">-->
        <link href="<?php echo base_url(); ?>theme/themeChat/css/bootstrap-chat.css" rel="stylesheet">
        <!-- <link href="<?php echo base_url(); ?>theme/themeAplicaciones/css/bootstrap-responsive.css" rel="stylesheet">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/themeAplicaciones/css/font-awesome.css">
        <!--[if IE 7]>
                    <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
                <![endif]-->
        
        <link href="<?php echo base_url(); ?>theme/themeAplicaciones/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>theme/themeAplicaciones/css/theme-fabrics.css" rel="stylesheet">

        <!--[if IE 7]>
                    <link rel="stylesheet" type="text/css" href="css/ie/ie7.css" />
                <![endif]-->
        <!--[if IE 8]>
                    <link rel="stylesheet" type="text/css" href="css/ie/ie8.css" />
                <![endif]-->
        <!--[if IE 9]>
                    <link rel="stylesheet" type="text/css" href="css/ie/ie9.css" />
                <![endif]-->
        
        <link href="<?php echo base_url(); ?>theme/themeAplicaciones/css/tablecloth.css" rel="stylesheet">
        <link href='<?php echo base_url(); ?>theme/assets/css/css.css?family=Dosis' rel='stylesheet' type='text/css'>
        <!--fav and touch icons -->
        
        <link rel="shortcut icon" href="ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>theme/themeAplicaciones/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>theme/themeAplicaciones/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>theme/themeAplicaciones/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>theme/themeAplicaciones/ico/apple-touch-icon-57-precomposed.png">

        <!-- Estilos para el chat-->
        <!--<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/bootstrap.min.chat.css">-->
        <!--<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/bootstrap.min.css">-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/bootstrap.min.chat.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/chat.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/panel.css">
        
        
        <!--============j avascript===========-->
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.popup.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>theme/js.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/contact.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/chat.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/bootstrap-filestyle.js"></script>
        
        <!-- scripts js para el chat -->
       <!-- <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/chat.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/ajaxfileupload.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/bootstrap-filestyle.js"></script>-->
        
        <script type="text/javascript">
            var baseURL = "<?php echo base_url(); ?>";
        </script>
        <script type="text/javascript">
            /*$( function () {
             // Set the classes that TableTools uses to something suitable for Bootstrap
             $.extend( true, $.fn.DataTable.TableTools.classes, {
             "container": "btn-group",
             "buttons": {
             "normal": "btn",
             "disabled": "btn disabled"
             },
             "collection": {
             "container": "DTTT_dropdown dropdown-menu",
             "buttons": {
             "normal": "",
             "disabled": "disabled"
             }
             }
             } );
             // Have the collection use a bootstrap compatible dropdown
             $.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
             "collection": {
             "container": "ul",
             "button": "li",
             "liner": "a"
             }
             } );
             });
             */
            $(function () {
                $('#data-table').dataTable({
                    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>", "paging": false, "ordering": false,
                    "info": false
                            /*"oTableTools": {
                             "aButtons": [
                             "copy",
                             "print",
                             {
                             "sExtends":    "collection",
                             "sButtonText": 'Save <span class="caret" />',
                             "aButtons":    [ "csv", "xls", "pdf" ]
                             }
                             ]
                             }*/
                });
            });
            $(function () {
                $('.tbl-simple').dataTable({
                    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"
                });
            });

            $(function () {
                $(".tbl-paper-theme").tablecloth({
                    theme: "paper"
                });
            });

            $(function () {
                $(".tbl-dark-theme").tablecloth({
                    theme: "dark"
                });
            });
            $(function () {
                $('.tbl-paper-theme,.tbl-dark-theme').dataTable({
                    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"
                });


            });
        </script>
    </head>
<body>
<div class="layout">
        <!-- Navbar================================================== -->
    <div class="navbar navbar-inverse top-nav" style="margin-top: -8px !important; margin-bottom: -8px !important; margin-left: -184px !important;">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="#"><img src="<?php echo base_url();?>theme/assets/img/att.png" width="103" height="50" alt="Falgun">Plataforma Virtual ATT</a>
                
                <div class="nav-collapse" style="font-size: 12px !important;">
                    <ul class="nav" style="margin-top:10px;">
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th-large"></i> Configuraci&oacute;n <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/person/listUsuario/1"><i class="icon-list-alt"></i> Usuarios </a></li>
                                <li><a href="<?php echo base_url();?>index.php/person/listUrl/1"><i class="icon-ok-circle"></i> Aplicaciones y Servicios</a></li>                                
                            </ul>
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/person/listOperadores/1"><i class="icon-list-alt"></i> Operadores </a></li>                                
                                <li><a href="<?php echo base_url();?>index.php/person/listOperadores_tmp/1"><i class="icon-ok-circle"></i> Solicitud de Modificaciones </a></li>                                
                            </ul>
                        </div>
                        </li> 
                   </ul>
                    <ul class="nav" style="margin-top:10px;">
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th-large"></i> Siscor <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/siscor/cor_entrante"><i class="icon-list-alt"></i> Reservar HR Externa </a></li>                                
                                <li><a href="<?php echo base_url();?>index.php/siscor/correo_saliente"><i class="icon-list-alt"></i> Bandeja de Salida </a></li>                                

                            </ul>
                        </div>
                        </li> 
                   </ul>
                    <ul class="nav" style="margin-top:10px;">
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th-large"></i> Chat <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/chat"><i class="icon-list-alt"></i> Chat </a></li>                                                            
                            </ul>
                        </div>
                        </li> 
                   </ul>

                        <!--
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-beaker"></i> Features <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="tables.html"><i class="icon-table"></i> Basic Tables</a></li>
                                <li><a href="table-cloth.html"><i class="icon-table"></i> Tables-Theme</a></li>
                                <li><a href="data-tables.html"><i class=" icon-th"></i> Data Tables</a></li>
                                <li><a href="grid.html"><i class=" icon-columns"></i> Grid</a></li>
                                <li><a href="typography.html"><i class=" icon-font"></i> Typography</a></li>
                                <li><a href="calendar.html"><i class=" icon-calendar"></i> Calendar</a></li>
                                <li><a href="file-manager.html"><i class=" icon-folder-open"></i> File Manager</a></li>
                            </ul>
                        </div>
                        </li>
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt"></i> UI elements <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="components-widgets.html"><i class=" icon-list-alt"></i> Components &amp; UI Elements</a></li>
                                <li><a href="buttons-icons.html"><i class=" icon-th-large"></i> Buttons &amp; Icons</a></li>
                            </ul>
                        </div>
                        </li>
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file-alt"></i> Pages <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li class="dropdown-submenu"><a href="#"><i class="icon-minus-sign"></i> Error Pages</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="page-403.html"><i class=" icon-file-alt"></i> 403 Error Page</a></li>
                                        <li><a href="page-404.html"><i class=" icon-file-alt"></i> 404 Error Page</a></li>
                                        <li><a href="page-405.html"><i class=" icon-file-alt"></i> 405 Error Page</a></li>
                                        <li><a href="page-500.html"><i class=" icon-file-alt"></i> 500 Error Page</a></li>
                                        <li><a href="page-503.html"><i class=" icon-file-alt"></i> 503 Error Page</a></li>
                                    </ul>
                                </div>
                                </li>
                                <li><a href="login.html"><i class=" icon-unlock"></i> Login Page</a></li>
                                <li><a href="gallery.html"><i class=" icon-picture"></i> Gallery</a></li>
                                <li><a href="pricing.html"><i class="icon-money"></i> Pricing Page</a></li>
                                <li><a href="chat.html"><i class="icon-comments"></i> Chat Page</a></li>
                            </ul>
                        </div>
                        </li>
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-bar-chart"></i> Charts <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="flot-chart.html"><i class="icon-bar-chart"></i> Flot Charts</a></li>
                                <li><a href="google-chart.html"><i class="icon-google-plus-sign"></i> Goolge Chart</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                -->
                </div>
                <!--<div class="btn-toolbar pull-right notification-nav">
                    <div class="btn-group">
                        <div class="dropdown">
                            <a class="btn btn-notification dropdown-toggle" data-toggle="dropdown"><i class="icon-globe"><span class="notify-tip">30</span></i></a>
                            <div class="dropdown-menu pull-right ">
                                <span class="notify-h"> You have 20 notifications</span><a class="msg-container clearfix"><span class="notification-thumb"><img src="images/notify-thumb.png" width="50" height="50" alt="user-thumb"></span><span class="notification-intro"> In hac habitasse platea dictumst. Aliquam posuere quam in nul<span class="notify-time"> 3 Hours Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><i class="icon-file"></i></span><span class="notification-intro"><strong>Files </strong>In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 8 Hours Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><img src="images/user-thumb.png" width="50" height="50" alt="user-thumb"></span><span class="notification-intro"> In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 3 Days Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><i class=" icon-envelope-alt"></i></span><span class="notification-intro"><strong>Message</strong> In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 2 Weeks Ago </span></span></a>
                                <button class="btn btn-primary btn-large btn-block"> View All</button>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="dropdown">
                            <a class="btn btn-notification"><i class="icon-lock"></i></a>
                        </div>
                    </div>
                </div>
            -->
            </div>
        </div>
    </div>
    <!--<div class="leftbar leftbar-close clearfix">
        <div class="admin-info clearfix">
            <div class="admin-thumb">
                <i class="icon-user"></i>
            </div>
            <div class="admin-meta">
                <ul>
                    <li class="admin-username">Kamrujam Shohel</li>
                    <li><a href="#">Edit Profile</a></li>
                    
                    <li><a href="#">View Profile </a><a href="#"><i class="icon-lock"></i> Logout</a></li>
                </ul>
            </div>
        </div>

    </div>
    -->
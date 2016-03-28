<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Admin - Plataforma ATT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Admin Panel Template">
        <meta name="author" content="ATT">
        <!-- styles -->
        <link href="<?php echo base_url(); ?>theme/themeAplicaciones/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>theme/themeAplicaciones/css/bootstrap-responsive.css" rel="stylesheet">
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
        <!--============j avascript===========-->
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/jquery-ui-1.10.1.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/accordion.nav.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/jquery.tablecloth.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/ZeroClipboard.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/TableTools.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/respond.min.js"></script>
        <script src="<?php echo base_url(); ?>theme/themeAplicaciones/js/ios-orientationchange-fix.js"></script>
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
    <div class="navbar navbar-inverse top-nav">
        <div class="navbar-inner">
            <div class="container">
                </span><a class="brand" href="#"><img src="<?php echo base_url();?>theme/assets/img/att.png" width="103" height="50" alt="">Admin - Plataforma Virtual ATT</a>
               
                <div class="nav-collapse">
                   <ul class="nav">
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
            </div>
                <div class="btn-toolbar pull-right notification-nav">                   
                    <div class="btn-group">
                       <div class="dropdown">
                            <a class="btn btn-notification dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i></a>
                            <div class="dropdown-menu pull-right ">
                                <div class="admin-info clearfix">
                                    <div class="admin-thumb">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="admin-meta">
                                        <ul>
                                            <li class="admin-username"><?php echo $usu;?></li>
                                            <li><a href="#">Editar Perfil</a></li>
                                            <li><a href="<?php echo base_url();?>index.php/internal/logout"><i class="icon-lock"></i> Salir</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
        </div>
    </div>

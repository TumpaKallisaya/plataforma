<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sistema Integrado de Registro de Operadores de Servicio Postal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Admin Panel Template">
<meta name="author" content="Westilian: Kamrujaman Shohel">
<!-- styles -->
<!--<link href="<?php echo base_url();?>theme/themeAplicaciones/css/bootstrap.css" rel="stylesheet">-->
<link href="<?php echo base_url(); ?>theme/themeChat/css/bootstrap-chat.css" rel="stylesheet">
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/jquery.gritter.css" rel="stylesheet">
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>theme/themeAplicaciones/css/font-awesome.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/bootstrap.min.chat.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/chat.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/panel.css">
<!--[if IE 7]>
<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
<![endif]-->
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/tablecloth.css" rel="stylesheet">
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/styles.css" rel="stylesheet">
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/theme-fabrics.css" rel="stylesheet">

<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="css/ie/ie8.css" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie/ie9.css" />
<![endif]-->
<link href='<?php echo base_url();?>theme/themeAplicaciones/css/cssgoogle.css' rel='stylesheet' type='text/css'>
<!--fav and touch icons -->
<link rel="shortcut icon" href="<?php echo base_url();?>theme/themeAplicaciones/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>theme/themeAplicaciones/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>theme/themeAplicaciones/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>theme/themeAplicaciones/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>theme/themeAplicaciones/ico/apple-touch-icon-57-precomposed.png">
<!--============ javascript ===========-->
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.sparkline.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/bootstrap-fileupload.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.metadata.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.tablesorter.min.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.tablecloth.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.flot.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.flot.selection.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/excanvas.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.flot.stack.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.flot.time.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.flot.tooltip.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.flot.resize.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.collapsible.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/accordion.nav.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.gritter.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/tiny_mce/jquery.tinymce.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/custom.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/respond.min.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/ios-orientationchange-fix.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/accordion.nav.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.tablecloth.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/ZeroClipboard.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/TableTools.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/accordion.nav.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/stepy.jquery.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/custom.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/respond.min.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/ios-orientationchange-fix.js"></script>

</head>
<body>
<div class="layout">
        <!-- Navbar================================================== -->
    <div class="navbar navbar-inverse top-nav" style="margin-top: -8px !important; margin-bottom: -8px !important; margin-left: -184px !important;">
       <div class="navbar-inner">
             <div class="container">
                </span><a class="brand" href="#"><img src="<?php echo base_url();?>theme/att2.png" width="103" height="50" alt="SIROP">SIROP</a>
                <div class="nav-collapse" style="font-size: 12px !important;">
                   <ul class="nav" style="margin-top:10px;">
                    <?php if($this->session->userdata('id_rol')==4){?>
                        <li><a href="<?php echo base_url();?>index.php/postal/form1"><i class="icon-ok-circle"></i> Fomulario 1</b></a> </li>                         
                        <li><a href="<?php echo base_url();?>index.php/postal/form2"><i class="icon-ok-circle"></i> Fomulario 2</b></a></li>                         
                        <li><a href="<?php echo base_url();?>index.php/postal/form3"><i class="icon-ok-circle"></i> Fomulario 3</b></a></li>                              
                        <li><a href="<?php echo base_url();?>index.php/postal/pdfddjj"><i class="icon-print"></i> Declaracion Jurada</b></a></li>                                                 
                        <li><a href="<?php echo base_url();?>index.php/chat"><i class="icon-comments"></i>Chat</b></a></li>   
                    <?php }?>
                    <?php if($this->session->userdata('id_rol')==2){?>
                        <li><a href="<?php echo base_url();?>index.php/postal/listarUsuarios"><i class="icon-list-alt"></i>Lista de Usuarios</b></a></li>                                                                         
                        <ul class="nav">
                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th-large"></i> Siscor <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="<?php echo base_url();?>index.php/siscor/cor_entrante"><i class="icon-list-alt"></i> Reservar HR Externa </a></li>                                
                                <li><a href="<?php echo base_url();?>index.php/siscor/correo_saliente"><i class="icon-list-alt"></i> Bandeja de Salida </a></li>                                

                            </ul>
                        </div>
                        </li>                     
                        <li><a href="<?php echo base_url();?>index.php/chat"><i class="icon-comments"></i>Chat</b></a></li>   
                   </ul>                                              
                    <?php }?>
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
                                            <li class="admin-username"><?php echo $this->session->userdata('usuario');?></li>
                                            <li><a href="#">Editar Perfil</a></li>
                                            <?php if($this->session->userdata('id_rol')==3||$this->session->userdata('id_rol')==4){ ?>
                                            <li><a href="<?php echo base_url();?>index.php/home/logout"><i class="icon-lock"></i> Salir</a></li>
                                            <?php } ?>
                                            <?php if($this->session->userdata('id_rol')==1||$this->session->userdata('id_rol')==2){ ?>
                                            <li><a href="<?php echo base_url();?>index.php/internal/logout"><i class="icon-lock"></i> Salir</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
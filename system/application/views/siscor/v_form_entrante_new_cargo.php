<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Plataforma ATT</title>
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
    </head>
    <body>
        <div class="main-wrapper">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="content-widgets gray">
                            <div class="widget-head bondi-blue">
                                <h3>Agregar nuevo cargo</h3>                    
                            </div>
                            <div class="widget-container">
                                <div class="form-container grid-form form-background">
                                    <form class="form-horizontal left-align cmxform" method="post" id="chooseDateForm" action="<?php echo $action; ?>" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label">Cargo (descripcion)</label>
                                            <div class="controls">
                                                <input id="nuevo_cargo" type="text" placeholder="Cargo" name="nuevo_cargo" onkeyup = "this.value = this.value.toUpperCase()" class="span2" required>
                                            </div>
                                        </div>
                                        <? if($bandera==1){ ?>
                                        <div class="error-container">
                                            <h4>Este cargo ya existe!!</h4>
                                        </div>
                                        <? } ?>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-extend" >Registrar</button>
                                            <button type="button" class="btn btn-danger cancel">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>




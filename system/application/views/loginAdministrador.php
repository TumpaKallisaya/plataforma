<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Plataforma Virtual ATT</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Admin Panel Template">
<meta name="author" content="juanlimber">
<!-- styles -->
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="<?php echo base_url();?>theme/themeAplicaciones/stylesheet" href="css/font-awesome.css">
<!--[if IE 7]>
            <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
        <![endif]-->
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
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/aristo-ui.css" rel="stylesheet">
<link href="<?php echo base_url();?>theme/themeAplicaciones/css/elfinder.css" rel="stylesheet">

<!--fav and touch icons -->
<link rel="shortcut icon" href="<?php echo base_url();?>theme/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>theme/themeAplicaciones/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>theme/themeAplicaciones/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>theme/themeAplicaciones/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>theme/themeAplicaciones/ico/apple-touch-icon-57-precomposed.png">
<!--============j avascript===========-->
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/bootstrap.js"></script>
</head>
<body>
<div class="layout">
	<!-- Navbar================================================== -->
	<div class="navbar navbar-inverse top-nav">
		<div class="navbar-inner">
			<div class="container">
				</span><a class="brand" href="#"><img src="<?php echo base_url();?>theme/att2.png" width="103" height="50" alt="Plataforma ATT">Plataforma Virtual ATT</a>
				<div class="btn-toolbar pull-right notification-nav">
					<div class="btn-group">
						<div class="dropdown">
							<a class="btn btn-notification"><i class="icon-reply"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<form class="form-signin" method="post" action="<?php echo $action;?>" role="login">
			<h3 class="form-signin-heading">Ingresar</h3>
			<div class="controls input-icon">
				<i class=" icon-user-md"></i>
				<input type="text" name="usuario" onkeyup="this.value=this.value.toLowerCase();" placeholder="Nombre de Usuario" required class="form-control" />
			</div>
			<div class="controls input-icon">
				<i class=" icon-key"></i><input type="password" name="password" required placeholder="Contraseña" value="<?php echo $usuario; ?>" class="form-control" />
			</div>
			<button class="btn btn-inverse btn-block" type="submit">Ingresar</button>
			<h4><font color="red"><?php echo $error; ?></font></h4>
		</form>
	</div>
</div>
</body>
</html>

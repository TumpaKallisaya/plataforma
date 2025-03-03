
<!doctype html>

<html lang="en" class="no-js">

<head>

    <!-- meta data -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <!-- title and favicon -->

    <title>Plataforma ATT</title>
    <link rel="icon" href="assets/img/icon/fav_icon.gif">
    

    <!--necessary stylesheets -->

    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/ionicons.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/popup.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/owl.carousel.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/owl.theme.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/assets/css/style.css">    
    
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/chat.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>theme/themeChat/css/panel.css">
    
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>


<body>
    
    <!-- Preloader -->
    
    <div id="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    
    <!-- home-page -->
    
    <div class="home-page">
        
        <!-- Introduction -->
        
        <div class="introduction">
            <!-- <div class="mask">
            </div> -->
            <div class="intro-content">
                <!-- <h1>HELLO<br>
                I'M <span>JOHN</span> DOE</h1> -->
                
                <h1>
                                
                
                Plataforma Virtual <span>ATT</span><span class="number"></span>
                </h1> 

                
                <p  class="slogan-text text-capitalize"></p>

                <div class="social-media hidden-xs">
                    <a href="http://www.facebook.com/AutoridadRegulacionFiscalizacion" class="fa fa-facebook" data-toggle="tooltip" title="Facebook"></a>
                    <a href="http://twitter.com/ATTBolivia" class="fa fa-twitter" data-toggle="tooltip" title="Twitter"></a>
                    <a href="http://plus.google.com/u/0/115506370604450211618/posts" class="fa fa-plus" data-toggle="tooltip" title="Google+"></a>
                    <a href="http://www.linkedin.com/company/y-fiscalizaci%C3%B3n-de-telecomunicaciones-y-transportes?trk=biz-companies-cyf" class="fa fa-linkedin" data-toggle="tooltip" title="Linkedin"></a>
                    <!--<a href="#" class="fa fa-behance" data-toggle="tooltip" title="Behance"></a>
                    <a href="#" class="fa fa-flickr" data-toggle="tooltip" title="Flicker"></a>-->
                                                        
                </div>
            </div>
            
            <!-- Social Media Icons [ END ] -->
        </div>
        
        <!-- Exit System -->
        <div class="exit-btn" onclick="window.location.href='../index.php/home/logout'"></div>

        <!-- Navigation Menu -->
        <div class="menu">
            <div class="profile-btn">
                <img alt="" src="<?php echo base_url();?>theme/assets/img/about.jpg" style="width:100%; height:100%;">
                <div class="mask">
                </div>
                <div class="heading">
                    <i class="ion-ios-people-outline hidden-xs"></i>
                    <h2>Configuración</h2>
                </div>
            </div>
            
            <!-- Single Navigation Menu Button -->
            
            <div class="portfolio-btn">
                <img alt="" src="<?php echo base_url();?>theme/assets/img/portfolio.jpg">
                <div class="mask">
                </div>
                <div class="heading">
                    <i class="ion-ios-briefcase-outline hidden-xs"></i>
                    <h2>Aplicaciones</h2>
                </div>
            </div>
            
            <!-- Single Navigation Menu Button [ END ]  -->
            
            <div class="service-btn">
                <img alt="" src="<?php echo base_url();?>theme/assets/img/service.jpg">
                <div class="mask">
                </div>
                <div class="heading">
                    <i class="ion-ios-lightbulb-outline hidden-xs"></i>
                    <h2>Servicios</h2>
                </div>
            </div>
            
            <!-- Single Navigation Menu Button [ END ]  -->
            
            <div class="contact-btn">
                <img alt="" src="<?php echo base_url();?>theme/assets/img/contact.jpg">
                <div class="mask">
                </div>
                <div class="heading">
                    <i class="ion-ios-chatboxes-outline hidden-xs"></i>
                    <h2>Contacto</h2>
                </div>
            </div>
            
            <!-- Single Navigation Menu Button [ END ]  -->
            
        </div>
    </div>
    
    <!--
    4 ) Close Button
    -->
    
    <div class="exit-btn" onclick="window.location.href='../index.php/home/logout'"></div>
   <div class="close-btn"></div>
    
    <!--
    5 ) Profile Page
    -->
    <div class="profile-page container-fluid page">
        <div class="row">
            <!--( a ) Profile Page Fixed Image Portion -->
            
            <div class="image-container col-md-3 col-sm-12">
                <div class="mask">
                </div>
                <div class="main-heading">
                    <h1>Configuración</h1>
                </div>
            </div>
            
            <!--( b ) Profile Page Content -->
            
            <div class="content-container col-md-9 col-sm-12">
                
                <!--( A ) Story of Glory -->
                
                <div class="clearfix">
                    <h2 class="small-heading">Configuración</h2>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="video embed-responsive embed-responsive-4by3">
                                    <h4>Datos del Operador</h4>
                                    <p>Nombre Empresa :"<?php echo $id_usuario;?>"</p>

                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="about-us-desc">
                                        <p>
                                            <a href="<?php echo base_url();?>index.php/person/updateOperador/<?php echo $cod_operador;?>/1">Mi perfil</a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                

            </div>
            <div class="clearfix full-height">

            </div>


                
                <div class="footer clearfix">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <p class="copyright">Copyright &copy; 2016 
                                        <a href="#">Autoridad de Regulación y Fiscalización de Telecomunicaciones y Transportes</a>
                                    </p>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    



    <div class="portfolio-page container-fluid page">

        <div class="row">

            <!--( a ) Portfolio Page Fixed Image Portion -->
            
            <div class="image-container col-md-3 col-sm-12">
                <div class="mask">
                </div>
                <div class="main-heading">
                    <h1>APLICACIONES</h1>
                </div>
            </div>

            <!--( b ) Portfolio Page Content -->
            
            <div class="content-container col-md-9 col-sm-12">
                
                <!--( A ) Portfolio -->
                
                <div class="portfolio clearfix full-height">
                    <h2 class="small-heading">APLICACIONES</h2>

                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="project-container">
                                <div class="row">
                                    <!--<div class="project-controls">
                                        <button class="filter" data-filter="all">All</button>
                                        <button class="filter" data-filter=".graphic-design">Graphic Design</button>
                                        <button class="filter" data-filter=".web-design">Web Designs</button>
                                        <button class="filter" data-filter=".app-development">App Development</button>
                                    </div>
                                    -->
                                    <!-- Portfolio Control Buttons [ END ] -->
                                    <div id="project" class="projet-items clearfix">  
                                    <?php                       
                                        $i=0;                 
                                        foreach ($Aplicaciones as $k) {
                                            $check='';//echo $k->Id_Url;
                                            //echo $UserAplicaciones;
                                            if($UserAplicaciones){
                                                foreach ($UserAplicaciones as $n) {                                                                                                    
                                                    if($k->Id_Url==$n->IdUrl){
                                                        $check='true';                                                        
                                                        ?>
                                                                                                                                                                              
                                                                <!-- Portfolio Image -->                                        
                                                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mix web-design">
                                                                    <div class="project">
                                                                        <img src="<?php echo base_url();?>uploads/admin/<?php echo $k->Imagen;?>" alt="">
                                                                        <div class="ovrly">
                                                                        </div>
                                                                        <div class="buttons">
                                                                            <a href="#" class="fa fa-link"></a>
                                                                            <a href="#<?php echo $k->Descripcion;?>" class="fa fa-search show-popup"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>                                        
                                                                <!-- Popup Content -->                                        
                                                                <div class="pop-up-box" id="<?php echo $k->Descripcion;?>">
                                                                    <img alt="" src="<?php echo base_url();?>uploads/admin/<?php echo $k->Imagen;?>" class=" hidden-xs">
                                                                    <div class="popup-content">
                                                                        <h3><?php echo $k->Descripcion;?></h3>
                                                                        <p>
                                                                            <?php echo $k->Referencia;?>
                                                                        </p>
                                                                        <a href="#">Ingresar</a>
                                                                    </div>
                                                                </div>                                    
                                                                <!-- Single Portfolio Item [ END ] -->                                                                                            
                                                        <?php
                                                        $i=$i+1;
                                                    }
                                                }   
                                            }                                                                                                                             
                                        }
                                    ?>
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                            
                </div>
                
               
                
                <div class="footer clearfix">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <p class="copyright">Copyright &copy; 2016 
                                        <a href="#">Autoridad de Regulación y Fiscalización de Telecomunicaciones y Transportes</a>
                                    </p>
                                </div>

                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <!--
    7 ) Service Page
    -->
    
    <div class="service-page container-fluid page">
        <div class="row">
            <!--( a ) Portfolio Page Fixed Image Portion -->
            
            <div class="image-container col-md-3 col-sm-12">
                <div class="mask">
                </div>
                <div class="main-heading">
                    <h1>Servicios</h1>
                </div>
            </div>
            
            <!--( b ) Portfolio Page Content -->
            
            <div class="content-container col-md-9 col-sm-12">
                
                <!--( A ) Portfolio -->
                
                <div class="clearfix">
                    <h2 class="small-heading">Servicios</h2>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="row">

                                    <?php                       
                                        $i=0;                 
                                        foreach ($Servicios as $k) {
                                            $check='';//echo $k->Id_Url;
                                            //echo $UserAplicaciones;
                                            if($UserServicios){
                                                foreach ($UserServicios as $n) {                                                                                                    
                                                    if($k->Id_Url==$n->IdUrl){
                                                        $check='true';                                                        
                                                        ?>
                                                                                                                                                                              
                                                            <!-- Portfolio Image -->                                        
                                                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mix web-design">
                                                                    <div class="project">
                                                                        <img src="<?php echo base_url();?>uploads/admin/<?php echo $k->Imagen;?>" alt="">
                                                                        <div class="ovrly">
                                                                        </div>
                                                                        <div class="buttons">
                                                                            <a href="#" class="fa fa-link"></a>
                                                                            <a href="#<?php echo $k->Descripcion;?>" class="fa fa-search show-popup"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>                                        
                                                                <!-- Popup Content -->                                        
                                                                <div class="pop-up-box" id="<?php echo $k->Descripcion;?>">
                                                                    <img alt="" src="<?php echo base_url();?>uploads/admin/<?php echo $k->Imagen;?>" class=" hidden-xs">
                                                                    <div class="popup-content">
                                                                        <h3><?php echo $k->Descripcion;?></h3>
                                                                        <p>
                                                                            <?php echo $k->Referencia;?>
                                                                        </p>
                                                                        <a href="#">Ingresar</a>
                                                                    </div>
                                                                </div>                                    
                                                                <!-- Single Portfolio Item [ END ] -->                              
                                                           
  
                                                        <?php
                                                        $i=$i+1;

                                                    }



                                                }   
                                            }                                                                                                                             
                                        }
                                    ?>


                            </div>
                        </div>
                    </div>
                </div>


                <div class="clearfix full-height">

                </div>

                <div class="footer clearfix">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <p class="copyright">Copyright &copy; 2016 
                                        <a href="#">Autoridad de Regulación y Fiscalización de Telecomunicaciones y Transportes</a>
                                    </p>
                                </div>

                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    
    <!--
    8 ) Contact Page
    -->
    
    <div class="contact-page container-fluid page">
        <div class="row">
            <!--( a ) Contact Page Fixed Image Portion -->
            
            <div class="image-container col-md-3 col-sm-12">
                <div class="mask">
                </div>
                <div class="main-heading">
                    <h1>Contacto</h1>
                </div>
            </div>
            
            <!--( b ) Contact Page Content -->
            
            <div class="content-container col-md-9 col-sm-12">
                
                <!--( A ) Contact Form -->
                
                <div class="clearfix full-height">
                    <h2 class="small-heading">Contacto</h2>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="contact-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="data">
                                            <i class="fa fa-map-marker"></i>
                                            <span>
                                               La Paz: Calle 13 de Calacoto, entre Av. Los Sauces y Av. Costanera, N° 8260.<br>
Cochabamba: Av. Ballivián y España (El Prado), N° 683. Primer piso<br>
Santa Cruz: Av. Beni (entre 4to y 5to anillo) Edif. Gardenia Condominio Club, Torre Sur. PB. Of. 2.<br>
Tarija: Alejandro del Carpio esquina O'connor, primer piso. <br>
                                            </span>
                                        </div>

                                        <div class="data">
                                            <i class="fa fa-envelope"></i>
                                            <span>
                                                info@att.gob.bo
                                            </span>
                                        </div>

                                        <div class="data">
                                            <i class="fa fa-phone"></i>
                                            <span>
                                                La Paz: Tel. 277-2266<br>
Cochabamba: Tel. 458-1182<br>
Santa Cruz: Tel. 312-0587<br>
Tarija: Tel. 664-4136 <br>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>
                                    
                            </div>

                            <!--<div class="row">
                                <form  id="contactForm" class="contact-form" method="post" action="php/contact-form.php">
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Nombre">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <textarea name="massage" type="text" class="form-control" id="message" rows="5" required="required" placeholder="  Mensaje"></textarea>
                                    </div>
                                    
                                    <div class="col-md-4 col-xs-12">
                                        <input type="submit" id="cfsubmit" class="btn btn-send" value="Di Hola">
                                    </div>
                                    <div id="contactFormResponse" class="col-md-8 col-xs-12"></div>
                                </form>
                            </div>-->
                            
                            <!-- El codigo para la vista del chat comienza aqui -->
                            
                            
    <div class="row chat-window col-xs-12 col-md-12" id="chat_window_1">
        <?php if(!$esAtt){ ?>
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="box">
                    <img class="img-circle" src="<?php echo base_url(); ?>theme/themeChat/images/logo2.png" />
                    <div class="info">
                        <h4 class="text-center">ATT</h4>
                         <input id="idOperador" type="text" hidden="true" value="<?php echo $operador->id;?>"/>
                        <p>La Autoridad de Regulación y Fiscalización de Telecomunicaciones y Transportes presenta la herramienta de Chat para solucionar las distintas dudas.</p>
                        <a href="" class="btn btn-primary center-block" data-toggle="modal" data-target="#myModal">Crear un nuevo tema de conversación</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-4 col-md-4">
                <!--<div class="panel panel-default">
                    <div class="panel-heading c-list">
                        <span class="title text-info">Contactos <a href="" data-toggle="modal" data-target="#myModal">[Crear Chat]</a></span>
                    </div>
                    <ul class="list-group">

                    <?php //$cont=1; foreach ($listaContactos as $contacto){ ?>
                        <li class="list-group-item" id="contacto" data-value="<?php// echo $cont; ?>">
                            <div class="col-xs-12 col-sm-12"><a href="#">
                                <input id="usulist<?php //echo $cont;?>" type="text" hidden="true" value="<?php //echo $contacto['id_usuario'];?>"/>
                                <span class="name"><span class="fa fa-user"></span> <?php //echo $contacto['descripcion_usuario']?></span><br/>
                                </a></div>
                            <div class="clearfix"></div>
                        </li>
                    <?php //$cont=$cont+1; }?>
                    </ul>

                </div> -->

                <ul class="mainmenu">
                    <input id="esAtt" type="text" hidden="true" value="<?php if($esAtt){ echo 'si';}else{echo 'no';};?>"/>
                    <input id="ultimoTema" type="text" hidden="true" />
                    <li><i class="fa fa-comments-o icon" id="lisTemasRec"></i><span>CONVERSACIONES</span></li>
                    <li><i class="fa fa-comment-o icon"></i><span>Temas Recientes</span><div class="messages">23</div></li>
                        <ul class="submenu" id="products">
                            <div id="temasRecientes"></div>
                        </ul>
                    <li><i class="fa fa-archive icon"></i><span>Temas Antiguos</span></li>
                        <ul class="submenu" id="service">
                            <div id="temasAntiguos"></div>
                        </ul>
                </ul>
                
<!--
                <div class="nav-side-menu">
                    <div class="brand"><span class="fa fa-comments"></span> Conversaciones</div>
                    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

                    <div class="menu-list">
                        <input id="esAtt" type="text" hidden="true" value="<?php //if($esAtt){ echo 'si';}else{echo 'no';};?>"/>
                        <input id="ultimoTema" type="text" hidden="true" />
                        <ul id="menu-content" class="menu-content collapse out">
                            <li  data-toggle="collapse" data-target="#products" class="collapsed active" id="lisTemasRec">
                              <a href=""><i class="fa fa-comment-o fa-lg"></i> Recientes <span class="arrow"></span></a>
                            </li>
                            <ul class="sub-menu collapse" id="products">
                                <div id="temasRecientes"></div>
                            </ul>
                            <li data-toggle="collapse" data-target="#service" class="collapsed">
                              <a href="#"><i class="fa fa-archive fa-lg"></i> Antiguos <span class="arrow"></span></a>
                            </li>  
                            <ul class="sub-menu collapse" id="service">
                                <div id="temasAntiguos"></div>
                            </ul>
                        </ul>
                    </div>
                </div>
                -->
            </div>
            <div class="col-xs-8 col-md-8">
                    <div class="panel panel-default">
                    <div class="panel-heading top-bar">
                        <div class="col-md-8 col-xs-8">
                            <input id="idTemaCargado" type="text" hidden="true" />
                            <!--<h3 class="panel-title" id="tituloTema"> Chat - ATT [Usuario - <?php //echo $usuario;?>]</h3>-->
                            <h3 class="panel-title" id="temaConversacion"> Bienvenidos al Chat de la ATT!</h3>
                            <div id="tittema"></div>
                        </div>
                    </div>

                    <div class="panel-body msg_container_base" id="scroll">
                        <input id="ultimoChatRec" type="text" hidden="true" />
                        <div id="recibido">
                        </div>
                    </div>

                    <div class="panel-footer" id="mensaje-block">
                        <div class="input-group">
                            <input id="id_usuario_de" type="text" hidden="true" value="<?php echo $id_usuario;?>"/>
                            <input id="id_usuario_para" type="text" hidden="true"/>
                            <input id="rol" type="text" hidden="true" value="<?php echo $id_rol;?>"/>
                            <span class="input-group-btn">
                                <a href="#" data-toggle="modal" data-target="#modalUpload"><img src="<?php echo base_url();?>theme/themeChat/images/cargar.png" class="img-circle-pk" /></a>
                            </span>
                            <input style="margin-top:10px;" id="mensaje" type="text" class="form-control input-sm chat_input" placeholder="Escribe tu mensaje aqui..." />
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-sm" id="submit">Enviar</button>
                            </span>
                        </div>
                        <?php if($esAtt){ ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-6">
                                <a href="" class="btn btn-warning center-block" data-toggle="modal" data-target="#modalDerivar">Derivar Conversación</a>
                            </div>
                            <div class="col-md-6">
                                <a href="" class="btn btn-danger center-block" data-toggle="modal" data-target="#modalFinalizar">Finalizar Conversación</a>
                            </div>
                            
                        </div>
                        <?php } ?>
                    </div>
                    </div>
            </div>
        </div>
        
    </div>
                            
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Crear nuevo Chat</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="procod" class="col-md-3 control-label">Tema: </label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control input-sm" name="temaChat" id="temaChat" placeholder="Escriba el tema de conversación">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="prodep" class="col-md-3 control-label">Seccion:</label>
                        </div>
                        <div class="col-md-9">
                            <select name="prodep" class="form-control input-sm" id="seccion">
                                <option value="">Escoja una opción</option>
                                <?php foreach ($listaSecciones as $seccion){ ?>
                                <option value="<?php echo $seccion['cod_seccion']; ?>"><?php echo $seccion['desc_seccion']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="creaTema">Crear</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para el archv adjunto -->
    <form method="post" action="" id="upload_file">
        <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="modalUploadLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Subir un archivo a la conversaciòn</h4>
                    </div>
                    <div class="modal-body">
                        <h5>Usted esta a punto de subir un archivo a la conversación.</h5>
                        <input id="idTemaCargadoAdj" name="idTemaCargadoAdj" type="text" hidden="true" />
                        <!--<input type="file" name="userfile" id="userfile" class="filestyle" data-buttonName="btn-primary" multiple>-->
                        <input type="file" name="userfile" id="userfile" data-buttonName="btn-primary" multiple>
                        <br>
                    </div>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" name="submit" class="btn btn-default" id="submit" />
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Modal para el derivado de conversación -->
    <div class="modal fade" id="modalDerivar" tabindex="-1" role="dialog" aria-labelledby="modalDerivarLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Derivar toda la conversaciòn</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row container">
                            <div class="col-md-12">
                                    <p>Si esta seguro de derivar toda la conversación, se pide seleccionar la sección a la cual será derivada:</p>
                            </div>
                        </div>
                        <div class="row container-fluid" style="margin-right:10px;">
                            <div class="col-md-3">
                                <label for="secDer" class="col-md-3 control-label">Seccion:</label>
                            </div>
                            <div class="col-md-9">
                                <select name="secDer" class="form-control input-sm" id="seccionDerivar">
                                    <option value="">Escoja una opción</option>
                                    <?php foreach ($listaSecciones as $seccion){ ?>
                                    <option value="<?php echo $seccion['cod_seccion']; ?>"><?php echo $seccion['desc_seccion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" onclick="derivarConvSec();" id="btnDerivar">Derivar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal para el fianlizado de conversación -->
    <div class="modal fade" id="modalFinalizar" tabindex="-1" role="dialog" aria-labelledby="modalUploadLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Finalizar conversación</h4>
                </div>
                <div class="modal-body">
                    <div class="row container">
                        <div class="col-md-12">
                                <p>Usted esta a punto de Finalizar esta conversación. Esta Seguro?</p>
                        </div>
                    </div>
                </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="finalizarConversacion();">Aceptar</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Finaliza codigo para el chat -->
    
    
    <div class="btn-group dropup">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-cog"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
        </ul>
    </div>
                            
                        </div>
                    </div>
                </div>
                
                <!-- ( D ) Footer -->
                
                <div class="footer clearfix">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <p class="copyright">Copyright &copy; 2016 
                                        <a href="#">Autoridad de Regulación y Fiscalización de Telecomunicaciones y Transportes</a>
                                    </p>
                                </div>

  
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--  
    9 ) Javascript
    - -->
    
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
    
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/chat.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/themeChat/js/bootstrap-filestyle.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
</body>
</html>
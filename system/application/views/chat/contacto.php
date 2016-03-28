<?php $this->load->view('chat/doc_head_postal'); ?>




<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="primary-head" style="font-family: Helvetica !important;">
                <h3 class="page-header">CHAT - ATT</h3>
            </div>
            <div class="content-widgets gray">
                
                
                <div class="widget-container">
                    
                    <div class="row">
                        <?php // echo $saludo; ?>
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
                                            <p>La Autoridad de Regulaci&oacute;n y Fiscalizaci&oacute;n de Telecomunicaciones y Transportes presenta la herramienta de Chat para solucionar las distintas dudas.</p>
                                            <a href="" class="btn btn-primary center-block" data-toggle="modal" data-target="#myModal">Crear un nuevo tema de conversaci&oacute;n</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-xs-4 col-md-4">
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
                                                <input id="rol" type="text" hidden="true" value="<?php echo $rol;?>"/>
                                                <span class="input-group-btn">
                                                    <a href="#" data-toggle="modal" data-target="#modalUpload"><img src="<?php echo base_url();?>theme/themeChat/images/cargar.png" class="img-circle-pk" /></a>
                                                </span>
                                                <input style="margin-top:10px;" id="mensaje" type="text" class="form-control input-sm" placeholder="Escribe tu mensaje aqui..." />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary btn-sm" id="submit">Enviar</button>
                                                </span>
                                            </div>
                                            <?php if($esAtt){ ?>
                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-md-6">
                                                    <a href="" class="btn btn-warning center-block" data-toggle="modal" data-target="#modalDerivar">Derivar Conversaci&oacute;n</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="" class="btn btn-danger center-block" data-toggle="modal" data-target="#modalFinalizar">Finalizar Conversaci&oacute;n</a>
                                                </div>

                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal para crar un nuevo tema-->
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
                                            <h4 class="modal-title" id="myModalLabel">Subir un archivo a la conversaci&oacute;n</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Usted esta a punto de subir un archivo a la conversaci&oacute;n.</h5>
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
                                        <h4 class="modal-title" id="myModalLabel">Derivar toda la conversaci&oacute;n</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="row container-fluid">
                                                <div class="col-md-12">
                                                        <p>Si esta seguro de derivar toda la conversaci&oacute;n, se pide seleccionar la secci&oacute;n a la cual ser&aacute; derivada:</p>
                                                </div>
                                            </div>
                                            <div class="row container-fluid" style="margin-right:10px;">
                                                <div class="col-md-3">
                                                    <label for="secDer" class="col-md-3 control-label">Secci&oacute;n:</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select name="secDer" class="form-control input-sm" id="seccionDerivar">
                                                        <option value="">Escoja una opci&oacute;n</option>
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
                                        <h4 class="modal-title" id="myModalLabel">Finalizar conversaci&oacute;n</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row container-fluid">
                                            <div class="col-md-12">
                                                    <p>Usted esta a punto de Finalizar esta conversaci&oacute;n. Esta Seguro?</p>
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
                            <!--El codigo de vista para el chat termina aqui -->
                    </div>
                </div>
            </div> 
        </div>
    </div>        
</div>

<?php $this->load->view('chat/doc_foot'); ?>

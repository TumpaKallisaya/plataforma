<?php   $this->load->view('doc_head');?>
<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="content-widgets gray">
                <div class="widget-head bondi-blue">
                    <h3><?php echo $title1;?></h3>                    
                </div>
                <div class="widget-container">
                    <form method="post" id="chooseDateForm" action="<?php  echo $action; ?>" enctype="multipart/form-data">
              <?php if($flag==1){?>
                            <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        Los cambios realizados, se notificarán por correo electrónico.
                                        </div>
              <?php }?>
                <table>
                <tr>
                                <td><b>Id:</b></td>
                                <td><input type="text" name="id" id="grumble" value="<?php  echo $id;?>" required/></td>  
                                <td><b></b></td>
                                <td></td>         
                </tr>
                
                <tr>
                                <td><b>Id Operador:</b></td>
                                <td><input type="text" name="id_operador" id="grumble" value="<?php  echo $id_operador;?>" required/></td>  
                                <td><b>Razón Social:</b></td>
                                <td><input type="text" name="razon_social" id="grumble" value="<?php  echo $razon_social;?>" required /></td>         
                </tr>
                <tr>
                                <td><b>Nombre Comercial de la Empresa:</b></td>
                                <td><input type="text" name="nombre_empresa" id="grumble" value="<?php  echo $nombre_empresa;?>" required /></td>
                                <td><b>Domicilio Legal:</b></td>
                                <td><input type="text" name="domicilio_legal" id="grumble" value="<?php  echo $domicilio_legal;?>" required /></td>
                </tr>
                <tr>
                                <td><b>Domicilio Actual:</b></td>
                                <td><input type="text" name="domicilio_actual" id="grumble" value="<?php  echo $domicilio_actual;?>" required /></td>
                                <td><b>Teléfonos:</b></td>
                                <td><input type="text" name="telefonos" id="grumble" value="<?php  echo $telefonos;?>" required /></td>
                </tr>
                <tr>
                                <td><b>Representante Legal:</b></td>
                                <td><input type="text" name="representante_legal" id="grumble" value="<?php  echo $representante_legal;?>" required /></td>
                                <td><b>Propietario:</b></td>
                                <td><input type="text" name="propietario" id="grumble" value="<?php  echo $propietario;?>" required /></td>
                </tr>
                <tr>
                                <td><b>Casilla:</b></td>
                                <td><input type="text" name="casilla" id="grumble" value="<?php  echo $casilla;?>" required /></td>
                                <td><b>Fax:</b></td>
                                <td><input type="text" name="fax" id="grumble" value="<?php  echo $fax;?>" required /></td>
                </tr>
                <tr>
                                <td><b>E-mail:</b></td>
                                <td><input type="text" name="email" id="grumble" value="<?php  echo $email;?>" required /></td>
                                <td><b>Nit</b></td>
                                <td><input type="text" name="nit" id="grumble" value="<?php  echo $nit;?>" required /></td>
                </tr>
                <tr>
                                <td><b>Usuario solicitud:</b></td>
                                <td><input type="text" name="usuario_solicitud" id="grumble" value="<?php  echo $usu;?>" disabled /></td>
                                <td><b>Comentarios de la solicitud: </b></td>
                                <td><input type="textarea" name="comentarios_solicitud" id="grumble" value="<?php echo $comentarios_solicitud;?>"/></td>
                </tr> 
                <tr>
                <td><b>Observaciones de la Modificacion</b></td>
                <td><input type="textarea" name="comentarios_notificacion" id="grumble" value=""/></td>
                <td><?php  echo form_dropdown('lista', $list_estado_solicitud,'','');?>
                </td>
                <td>
                <button type="submit" class="btn btn-success"><?php echo $boton1;?></button>
                          <!--<button class="btn" onClick="javascript:location.href='../../listUsuario/<?php echo $flag;?>'" type="button">Volver</button>-->
                </td>
                </tr>
              </table>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php   $this->load->view('doc_foot'); ?>

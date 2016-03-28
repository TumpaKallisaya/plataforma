<?php  $this->load->view('postal/doc_head');?>
<script type="text/javascript">

var xmlHttp
var url0="<?php echo base_url();?>"


   $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#agregar").on('click', function(){
            $("#tbIdenServ tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tbIdenServ tbody");
        });
 
        // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
       /*====DATE Time Picker====*/    
    $(function () {
        $('#datetimepicker1').datetimepicker({
            pickTime: false
        });
    });
    $(function () {
        $('#datetimepicker2').datetimepicker({
            pickTime: false
        });
    });    
      $(function () {
        $('#datetimepicker3').datetimepicker({
            pickTime: false
        });
    });            
      $(function () {
        $('#datetimepicker4').datetimepicker({
            pickTime: false
        });
    });  
</script>
<style type="text/css">
.fila-base{ display: none; }  /*fila base oculta */

 
</style>
<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid ">
                <div class="span12">
                    <div class="primary-head">
                        <h3 class="page-header">IDENTIFICACION DE LA EMPRESA</h3>
                        <ul class="top-right-toolbar">
                            FORMULARIO REQ-F001</li><li></li> <li></li></ul>
                    </div>
                </div>
            </div>
        <form class="form-horizontal" method="post" action="<?php echo $action;?>">
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>1. Datos Generales</h3><input type="hidden" name="IdForm" value="<?php echo $IdForm;?>">
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label class="control-label">Nombre de la Empresa o Razon Social</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="NombreEmpresa" placeholder="Nombre de la Empresa o Razon Social" value="<?php echo $Form1->NombreEmpresa;?>" class="span12" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Domicilio Principal</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="DomicilioPrincipal" placeholder="Domicilio Principal" value="<?php echo $Form1->DomicilioPrincipal;?>" class="span12" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Telefonos</label>
                                    <div class="controls">
                                        <input type="number" name="Telefono1" placeholder="Telefono 1" value="<?php echo $Form1->Telefono1;?>" class="span3" <?php echo $readonly; ?>>
                                        <input type="number" name="Telefono2" placeholder="Telefono 2"  value="<?php echo $Form1->Telefono2;?>" class="span3" <?php echo $readonly; ?>>
                                        <input type="number" name="Telefono3" placeholder="Telefono 3" value="<?php echo $Form1->Telefono3;?>" class="span3" <?php echo $readonly; ?>>
                                        <input type="number" name="Telefono4" placeholder="Telefono 4" value="<?php echo $Form1->Telefono4;?>" class="span3" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Correo Electronico</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="EmailEmpresa" placeholder="Correo Electronico" value="<?php echo $Form1->EmailEmpresa;?>" class="span12" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Pagina Web</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="PaginaWebEmpresa" placeholder="Pagina Web" value="<?php echo $Form1->PaginaWebEmpresa;?>" class="span12" <?php echo $readonly; ?>>
                                    </div>
                                </div>                                
                                <div class="controls-row">
                                    <label class="control-label">Numero de Identificacion Tributaria</label>
                                    <div class="controls">
                                        <input type="text" name="NIT" placeholder="Numero de Identificacion Tributaria" value="<?php echo $Form1->NIT;?>" class="span6" <?php echo $readonly; ?> >
                                    </div>
                                    <label class="control-label">Fecha de Emision </label>
                                    <div id="datetimepicker1" class="control-label input-append">
                                            <input class="span8" name="FechaEmisionNIT" data-format="yyyy-MM-dd" value="<?php echo $Form1->FechaEmisionNIT;?>" type="text" <?php echo $readonly; ?>><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                                        </div>
                                </div>
                                <div class="controls-row" >
                                    <label class="control-label">Matricula de Comercio de FUNDEMPRESA</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="FUNDEMPRESA" placeholder="Matricula de Comercio de FUNDEMPRESA" value="<?php echo $Form1->FUNDEMPRESA;?>" class="span6" <?php echo $readonly; ?>>
                                    </div>
                                    <label class="control-label">Fecha de Emision </label>                                   
                                        <div id="datetimepicker2" class="control-label input-append">
                                            <input class="span8" name="FechaEmisionFE" data-format="yyyy-MM-dd" value="<?php echo $Form1->FechaEmisionFE;?>" type="text" <?php echo $readonly; ?>><span class="add-on" ><i data-time-icon="icon-time" data-date-icon="icon-calendar" ></i></span>
                                        </div>                                                            
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Numero de Testimonio de Constitucion</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="NumeroTestimonio" placeholder="Numero de Testimonio de Constitucion" value="<?php echo $Form1->NumeroTestimonio;?>" class="span6" <?php echo $readonly; ?>>
                                    </div>
                                    <label class="control-label">Fecha de Emision </label>
                                    <div class="controls">
                                        <div id="datetimepicker3" class="control-label input-append">
                                            <input class="span8" name="FechaEmisionTestimonio" data-format="yyyy-MM-dd" value="<?php echo $Form1->FechaEmisionTestimonio;?>" type="text" <?php echo $readonly; ?>><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                                        </div> 
                                    </div>                                      
                                </div>                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>2. Datos Complementarios</h3>
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label class="control-label">Nombre del Representante Legal</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="RepresentanteLegal" placeholder="Nombre del Representante Legal" value="<?php echo $Form1->RepresentanteLegal;?>" class="span12" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Correo Electronico</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="EmailRepresentante" placeholder="Correo Electronico" value="<?php echo $Form1->EmailRepresentante;?>" class="span12" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <div class="controls-row" >
                                    <label class="control-label">Telefono Fijo</label>
                                    <div class="controls">
                                        <input type="text" name="TelefonoRepresentante" placeholder="Telefono Fijo" value="<?php echo $Form1->TelefonoRepresentante;?>" class="span4" <?php echo $readonly; ?> >
                                    </div>
                                    <label class="control-label">Celular</label>
                                    <div class="controls">
                                        <input type="number" name="CelularRepresentante" placeholder="Celular" value="<?php echo $Form1->CelularRepresentante;?>" class="span4" <?php echo $readonly; ?>>
                                    </div>                                    
                                </div>                                
                                <div class="controls-row">
                                    <label class="control-label">Cedula de Identidad</label>
                                    <div class="controls">
                                        <input type="text" name="CedulaIdentidad" placeholder="Cedula de Identidad" value="<?php echo $Form1->CedulaIdentidad;?>" class="span4" <?php echo $readonly; ?>>
                                    </div>
                                    <label class="control-label">Expedido en</label>
                                    <div class="controls">
                                        <?php echo form_dropdown('CedulaExpedido', $Departamentos, $Form1->CedulaExpedido,$readonly);?>
                                    </div> 
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Numero de Testimonio del Poder</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="NumeroPoder" placeholder="Numero de Testimonio del Poder" value="<?php echo $Form1->NumeroPoder;?>" class="span4" <?php echo $readonly; ?>>
                                    </div>
                                    <label class="control-label">Fecha de Emision</label>
                                    <div class="controls">
                                        <div id="datetimepicker4" class="control-label input-append">
                                            <input class="span8" name="FechaEmisionPoder" data-format="yyyy-MM-dd" value="<?php echo $Form1->FechaEmisionPoder;?>" type="text" <?php echo $readonly; ?>><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                                        </div> 
                                    </div>        
                                </div>                                                            
                        </div>
                    </div>
                </div>
            </div>            
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>3. Informacion para Notificaciones</h3>
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label ><b>Solicito que las notificaciones se realice en: </b></label>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Domicilio para Notificacion</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="DomicilioNotificaciones" value="<?php echo $Form1->DomicilioNotificaciones;?>" placeholder="Domicilio Principal" class="span12" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <div class="controls-row" >
                                    <label class="control-label">Telefono</label>
                                    <div class="controls">
                                        <input type="number" name="TelefonoNotificaciones" value="<?php echo $Form1->TelefonoNotificaciones;?>" placeholder="Telefono" class="span4" <?php echo $readonly; ?>>
                                    </div>
                                    <!--<label class="control-label">Correo Electronico</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="EmailNotificaciones" value="<?php echo $Form1->EmailNotificaciones;?>" placeholder="Correo Electronico" class="span4">
                                    </div>                                    -->
                                </div>                                                                                           
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">                        
                        <div class="widget-head blue">
                            <h3>4. Identificacion de Servicios</h3>
                        </div>                        
                        <div class="widget-container">      
                            <table id="tbIdenServ">
                                <tbody>
                                    <tr class="fila-base">
                                        <td><label class="control-label">Servicio</label></td>
                                        <td><input onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" name="Servicio[]" placeholder="" <?php echo $readonly; ?>></td>
                                        <td>Descripcion</td>
                                        <td><input onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" name="Descripcion[]" placeholder="" size="100"></td>
                                        <td class="eliminar"><button type="button" class="btn btn-warning">Eliminar</button></td>
                                    </tr>  
                                    <tr>
                                        <td><label class="control-label">Servicio</label></td>
                                        <td> <input onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" name="Servicio[]" placeholder="Servicio" value="<?php echo $Form1Servicios[0]->Servicio; ?>" <?php echo $readonly; ?>></td>
                                        <td>Descripcion</td>
                                        <td><input onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" name="Descripcion[]" placeholder="Descripcion" value="<?php echo $Form1Servicios[0]->Descripcion; ?>" size="500" <?php echo $readonly; ?>></td>
                                        <td><input type="button" class="btn btn-info" id="agregar" value="Agregar fila" /></td>

                                    </tr>      
                                    <?php for($i=1; $i<count($Form1Servicios); $i++){ ?>  
                                    <tr >
                                        <td><label class="control-label">Servicio</label></td>
                                        <td><input onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" name="Servicio[]" placeholder="Servicio" value="<?php echo $Form1Servicios[$i]->Servicio; ?>" <?php echo $readonly; ?>></td>
                                        <td>Descripcion</td>
                                        <td><input onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" name="Descripcion[]" placeholder="Descripcion" value="<?php echo $Form1Servicios[$i]->Descripcion; ?>" size="100" <?php echo $readonly; ?>></td>
                                        <td class="eliminar"><button type="button" class="btn btn-warning">Eliminar</button></td>
                                    </tr>  
                                    <?php }?>                             
                                </tbody>
                            </table>                      
                         </div>        
                    </div>
                </div>
            </div>  
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>5. Otros</h3>
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label class="control-label">Concesion de Derechos de la Empresa (Franquicia)</label>
                                    <div class="controls">
                                        <input onkeyup="javascript:this.value=this.value.toUpperCase();"  type="text" name="ConcesionDerechos" value="<?php echo $Form1->ConcesionDerechos;?>" placeholder="Nombre de la Franquicia" class="span12" <?php echo $readonly; ?>>
                                    </div>
                                </div>                                    
                                <div class="controls-row">

                                    <label class="control-label">No aplica</label>
                                    <div class="controls">
                                        <label class="checkbox">
                                        
                                        <input name="ConcesionCheck" type="checkbox" <?php if($Form1->ConcesionCheck==1){ echo "checked"; } ?> value="1" <?php echo $readonly; ?>>                                        
                                    </div>
                                </div>                                                                                                                          

                        </div>
                    </div>
                </div>
            </div>                        
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><?php echo $botonSgte;?></button>                                    
            </div>            
        </form>
                  
    </div>        
</div>
<?php  $this->load->view('postal/doc_foot');?>

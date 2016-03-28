<?php  $this->load->view('doc_head');?>
<script type="text/javascript">

var xmlHttp
var url0="<?php echo base_url();?>"


function mostrarSubcategoria (str) {
    //alert(str);
    if(!str){str=0;} 
    xmlHttp=new XMLHttpRequest();
    url=url0+"index.php/person/mostrarSubcategoria";
    url=url+"/"+str; 
    xmlHttp.onreadystatechange=function(){document.getElementById("Subcategoria").innerHTML=xmlHttp.responseText;}
    xmlHttp.open("POST",url,true);
    xmlHttp.send(null);
   }

    /*====DATE Time Picker====*/    
    $(function () {
        $('#datetimepicker1').datetimepicker({
            pickTime: false
        });
    });
</script>

<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets gray">
                        <div class="widget-head bondi-blue">
                            <h3><?php echo $title;?></h3>                                                    

                        </div>
                        <div class="widget-container">
                            <div class="form-container grid-form form-background">
                                <form  class="form-horizontal" action="<?php echo $action;?>"  method="post">
                                    <div class="control-group">
                                        <label class="control-label">Codigo</label>
                                        <div class="controls">
                                            <input id="name" type="text" placeholder="Correlativo" name="Codigo" value="<?php echo @$Certificado->IdCertificado;?>"  readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nombre del Operador</label>
                                        <div class="controls">
                                            <input <?php if($Guardar==TRUE) {?> readonly <?php }?>required onkeyup="this.value=this.value.toUpperCase();" id="name" type="text" placeholder="Nombre del Operador" name="Operador" value="<?php echo @$Certificado->Operador;?>" >
                                        </div>
                                    </div> 
                                    <div class="control-group">
                                        <label class="control-label">Representante Legal</label>
                                        <div class="controls">
                                            <input <?php if($Guardar==TRUE) {?> readonly <?php }?>required onkeyup="this.value=this.value.toUpperCase();" id="name" type="text" placeholder="Representante Legal" name="RepresentanteLegal" value="<?php echo @$Certificado->RepresentanteLegal;?>" >
                                        </div>
                                    </div> 
                                    <!--<div class="control-group">
                                        <label class="control-label">Oficina Central</label>
                                        <div class="controls">
                                            <input <?php if($Guardar==TRUE) {?> readonly <?php }?>required onkeyup="this.value=this.value.toUpperCase();" id="name" type="text" placeholder="Oficina Central" name="OficinaCentral" value="<?php echo @$Certificado->OficinaCentral;?>" >
                                        </div>
                                    </div> 
                                    <div class="control-group">
                                        <label class="control-label">Ciudad</label>
                                        <div class="controls">
                                            <input <?php if($Guardar==TRUE) {?> readonly <?php }?>required onkeyup="this.value=this.value.toUpperCase();" id="name" type="text" placeholder="Ciudad" name="Ciudad" value="<?php echo @$Certificado->Ciudad;?>" >
                                        </div>
                                    </div>    -->                                                                                                         
                                    <div class="control-group">
                                        <label class="control-label">Tipo Empresa</label>
                                        <div class="controls">
                                            <input <?php if($Guardar==TRUE) {?> readonly <?php }?>required onkeyup="this.value=this.value.toUpperCase();" id="name" type="text" placeholder="Tipo de Empresa" name="TipoEmpresa" value="<?php echo @$Certificado->TipoEmpresa;?>" >
                                        </div>
                                    </div>                                     
                                    <div class="control-group">
                                        <label class="control-label">Categoria</label>
                                        <div class="controls" >
                                            <?php if($Guardar==TRUE) {?> 
                                                <input readonly id="name" type="text" placeholder="Categoria" name="Categoria" value="<?php echo @$Certificado->Categoria;?>" >
                                            <?php } else {?>
                                            <?php echo form_dropdown('Categoria', $Categorias, $Certificado->Categoria,'required');?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Fecha de Otorgacion</label>
                                        <div class="controls">
                                            <div id="datetimepicker1" class="input-append date ">
                                                <input <?php if($Guardar==TRUE) {?> readonly <?php }?>required  data-format="yyyy-MM-dd" type="text" name="FechaOtorgacion" value="<?php echo @$Certificado->FechaOtorgacion;?>" ><span class="add-on "><i data-date-icon="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <?php if($Guardar==FALSE){ ?>
                                        <button type="submit" class="btn btn-extend">Guardar</button>
                                        <?php } ?>
                                        <?php if($Guardar==TRUE) {?>
                                        <button type="submit" class="btn btn-danger cancel">Imprimir</button>
                                        <?php } ?>
                                        <button type="Button" onClick="window.location='<?php echo base_url();?>'" class="btn btn-warning">Nuevo Certificado</button>
                                        <button type="Button" onClick="window.location='<?php echo base_url();?>index.php/person/listCertificado'" class="btn btn-primary">Lista de Certificados</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                  
    </div>        
</div>
<?php  $this->load->view('doc_foot');?>

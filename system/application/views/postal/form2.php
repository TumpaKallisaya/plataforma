<?php  $this->load->view('postal/doc_head');?>
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
 

</script>

<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid ">
                <div class="span12">
                    <div class="primary-head">
                        <h3 class="page-header">REQUISITOS PARA LA OTORGACION DE LA LICENCIA<br>Y EMISION DEL CERTIFICADO ANUAL DE OPERACIONES</h3>
                        <ul class="top-right-toolbar">
                            FORMULARIO REQ-F002A</li><li></li> <li></li></ul>
                    </div>
                </div>
            </div>
        <form class="form-horizontal" method="post" action="<?php echo $action;?>">
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head bondi-blue">
                            <h3>1. Datos Generales</h3><input type="hidden" name="IdForm" value="<?php echo $IdForm;?>">
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label class="control-label">Nombre de la Empresa o Razon Social</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" value="<?php echo @$Form1->NombreEmpresa;?>" class="span12" readonly>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Nombre del Representante Legal</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" value="<?php echo @$Form1->RepresentanteLegal;?>" class="span12" readonly>
                                    </div>
                                </div>  
                                <div class="controls-row">
                                    <label class="control-label">Cedula de Identidad</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" value="<?php echo @$Form1->CedulaIdentidad;?>" class="span6" readonly>
                                    </div>
                                    <label class="control-label">Expedido en</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" value="<?php echo @$Form1->CedulaExpedido;?>"class="span3" readonly>
                                    </div> 
                                </div>                             
                                <div class="controls-row">
                                    <label class="control-label">Categoria de Licencia a Solicitar</label>
                                    <table>
                                        <tr>
                                            <td>    <?php $jsA = 'onChange="mostrarSubcategoria(this.value)" id="Categoria" '.$readonly; ?>
                                                <div class="controls">
                                                <?php echo form_dropdown('Categoria1', $Categorias1, $Form2->Categoria1,$jsA);?>                                          
                                                </div>
                                            </td>
                                            <td>
                                                <div class="controls" id="Subcategoria">      
                                                <?php echo form_dropdown('Categoria2', $Categorias2, $Form2->Categoria2,$readonly);?>                                    
                                                </div>                                                   
                                            </td>                                                
                                                                                   
                                        </tr>
                                    </table>


                                 
                                </div>                                 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head bondi-blue">
                            <h3>2. Requisitos Legales</h3>
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label class="span10">1) Solicitud con nota dirigida a la Autoridad de Regulacion y Fiscalizacion de Telecomunicaciones y Transportes - ATT especificando la Categoria del servicio postal a prestar. </label>
                                    <div class="span2">                                        
                                        <input type="radio" <?php echo $readonly; ?> <?php echo $Form2->ReqLegal1;if($Form2->ReqLegal1=="1"){ echo "checked"; }?> value="1" name="ReqLegal1" >Si &nbsp; &nbsp;<input type="radio" <?php echo $readonly; ?> value="2" <?php if($Form2->ReqLegal1==1){ echo "checked"; }?> name="ReqLegal1">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="span10">2) Fotocopia Legalizada de Escritura Pública de Constitución de la Empresa, con su registro ó Matrícula de Comercio en el Fundempresa (si corresponde). </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->ReqLegal2==1){ echo "checked"; }?> value="1" name="ReqLegal2" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->ReqLegal2==2){ echo "checked"; }?> name="ReqLegal2">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                          
                                <div class="controls-row">
                                    <label class="span10">3) Poder notariado a favor del (la/los) representante(s) legal(s) con su registro ó Matrícula de Comercio en el Fundempresa (si corresponde). </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->ReqLegal3==1){ echo "checked"; }?> value="1" name="ReqLegal3" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php if($Form2->ReqLegal3==2){ echo "checked"; }?> name="ReqLegal3">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                          
                                <div class="controls-row">
                                    <label class="span10">4) Fotocopia de Certificado de Inscripción al Padrón Nacional de Contribuyentes, en el SIN.</label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->ReqLegal4==1){ echo "checked"; }?> value="1" name="ReqLegal4" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->ReqLegal4==2){ echo "checked"; }?> name="ReqLegal4">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                          
                                <div class="controls-row">
                                    <label class="span10">5) Matricula de Comercio vigente emitido por el Registro de Comercio de Bolivia, FUNDEMPRESA, sin deudas. </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->ReqLegal5==1){ echo "checked"; }?> value="1" name="ReqLegal5" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->ReqLegal5==2){ echo "checked"; }?> name="ReqLegal5">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                          
                                <div class="controls-row">
                                    <label class="span10">6) Solvencia Fiscal actualizada emitida por la Contraloria General del Estado Plurinacional.</label>
                                    <div class="span2">
                                        <input type="radio" <?php echo $readonly; ?> <?php if($Form2->ReqLegal6==1){ echo "checked"; }?> value="1" name="ReqLegal6" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->ReqLegal6==2){ echo "checked"; }?> name="ReqLegal6">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                          
                                <div class="controls-row">
                                    <label class="span10">7) Certificación actualizada del Registro Judicial de Antecedentes Penales del (los) representante (s) legal(s). </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->ReqLegal7==1){ echo "checked"; }?> value="1" name="ReqLegal7" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->ReqLegal7==2){ echo "checked"; }?> name="ReqLegal7">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                          
                                <div class="controls-row">
                                    <label class="span10">8) Declaración Jurada de las personas naturales o los representantes legales de la empresa, de no estar considerados en los alcances del Artículo 39 del Decreto Supremo N° 2617, Reglamento a la Ley N° 164 de 8 de agosto de 2011, General de Telecomunicaciones, Tecnologías de Información y Comunicación para el Sector Postal.  </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->ReqLegal8==1){ echo "checked"; }?> value="1" name="ReqLegal8" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->ReqLegal8==2){ echo "checked"; }?> name="ReqLegal8">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                          
                                <div class="controls-row">
                                    <label class="span10">9) Focotopia Legalizada u Original de los Contratos de representación y franquicia con empresas del exterior.   </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->ReqLegal9==1){ echo "checked"; }?> value="1" name="ReqLegal9" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->ReqLegal9==2){ echo "checked"; }?> name="ReqLegal9">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                          
                                
                        </div>
                    </div>
                </div>
            </div>            
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head bondi-blue">
                            <h3>3. Requisitos Financieros</h3>
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label class="span10">1) Estados Financieros de gestión ó Balance de apertura si es de reciente creación, refrendado con el sello del Servicio de Impuestos Nacionales.             </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero1==1){ echo "checked"; }?> value="1" name="RefFinanciero1" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero1==2){ echo "checked"; }?> name="RefFinanciero1">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>                                        
                                    </div>
                                </div>                                                                                              
                                
                                <div class="controls-row">
                                    <label class="span10">2) Declaración Jurada de Pago de Impuestos a las Utilidades de las Empresas, con el sello del Banco, excepto las empresas de reciente creación.               </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero2==1){ echo "checked"; }?> value="1" name="RefFinanciero2" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero2==2){ echo "checked"; }?> name="RefFinanciero2">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                                                                                              
                                <div class="controls-row">
                                    <label class="span10">3) Presentacion de modelo de guía o boleta de admisión de servicios postales.             </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero3==1){ echo "checked"; }?> value="1" name="RefFinanciero3" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero3==2){ echo "checked"; }?> name="RefFinanciero3">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                                                                                              
                                <div class="controls-row">
                                    <label class="span10">4) Depósito Bancario, con el monto de acuerdo con la categoría solicitada para la LICENCIA (original y 1 fotocopi).             </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero4==1){ echo "checked"; }?> value="1" name="RefFinanciero4" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero4==2){ echo "checked"; }?> name="RefFinanciero4">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="span10">5) Depósito Bancario, con el monto de acuerdo con la categoría solicitada para el CAO (original y 1 fotocopia).             </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero5==1){ echo "checked"; }?> value="1" name="RefFinanciero5" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero5==2){ echo "checked"; }?> name="RefFinanciero5">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="span10">6) Presentación de una Boleta de Garantía, por el siete por ciento (7%) del valor de los ingresos brutos anuales proyectados para el primer año del servicio postal, con validez de un año a partir del inicio de actividades señaladas en el cronograma de ejecución del proyecto.                </label>
                                    <div class="span2">
                                            <input type="radio" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero6==1){ echo "checked"; }?> value="1" name="RefFinanciero6" >Si &nbsp; &nbsp;<input type="radio" value="2" <?php echo $readonly; ?> <?php if($Form2->RefFinanciero6==2){ echo "checked"; }?> name="RefFinanciero6">No                                     
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $checklist; ?>
                                    </div>
                                </div>                                                                                                                              
                        </div>
                    </div>
                </div>
            </div> 
  
                        
            <div class="form-actions">
                <?php if($botonSgte!='Guardar Formulario'){ ?>
                <button type="button" class="btn btn btn-info" onClick="location.href='<?php echo base_url()."index.php/person/form1"; ?>';">Formulario Anterior</button>                                    
                <?php } ?>
                <button type="submit" class="btn btn-success"><?php echo $botonSgte; ?></button>                                    
            </div>            
        </form>
                  
    </div>        
</div>
<?php  $this->load->view('postal/doc_foot');?>

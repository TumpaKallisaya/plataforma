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


</script>
 <?php $jsA = 'onChange="mostrarSubcategoria(this.value)" id="Sucursal" required ';?>
                                     <?php echo form_dropdown('ProductoTerminado',$ProductoTerminado,'', $jsA);?> 

<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <h3 class="page-header">Producto Terminado</h3>
                    <div class="switch-board gray">
                        <ul class="clearfix switch-item">   
                            <?php foreach ($ProductoTerminado as $key) { ?>                     
                            <li><a href="#" onClick="mostrarSubcategoria('<?php echo $key; ?>')" class="green"><i class="icon-shopping-cart"></i><span><font size=1><?php echo $key; ?></font></span></a></li>
                            <?php } ?>
                        </ul>
                       
                        <ul class="clearfix switch-item">   
                             <div  id="Subcategoria">

                            </div>
                        </ul>

                        
                    </div>

                </div>
                <div class="span6">
                    <h3 class="page-header">Materia Prima</h3>
                    <div class="switch-board gray">                        
                        <ul class="clearfix switch-item">
                            <?php foreach ($MateriaPrima as $key) { ?>
                            <li><a href="#" class="orange"><i class="icon-beaker"></i><span><font size=1><?php echo $key; ?></span></font></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets">
                        <div>
                            <div class="widget-header-block">
                                <h4 class="widget-header"> Lista de Productos</h4>
                            </div>
                            <div>
                                <table class="table-striped table-bordered tbl-dark-theme">
                                <thead>
                                <tr>
                                    <th>
                                        Forma Farmaceutica
                                    </th>
                                    <th>
                                        Producto
                                    </th>
                                    <th>
                                        Concentracion
                                    </th>
                                    <th>
                                        Acción
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Mark
                                    </td>
                                    <td>
                                        Otto
                                    </td>
                                    <td>
                                        @mdo
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        Jacob
                                    </td>
                                    <td>
                                        Thornton
                                    </td>
                                    <td>
                                        @fat
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        Larry
                                    </td>
                                    <td>
                                        the Bird
                                    </td>
                                    <td>
                                        @twitter
                                    </td>
                                </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                  
    </div>        
</div>
<?php  $this->load->view('doc_foot');?>

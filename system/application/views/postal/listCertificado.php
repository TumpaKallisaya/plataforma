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
 $(function () {
                $('.tbl-paper-theme,.tbl-dark-theme').dataTable({
                    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"
                });
    

            });

</script>

<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets gray">
                        <div class="widget-head bondi-blue">
                            <h3>Lista de Certificados Emitidos</h3>                                                    

                        </div>
                        <div class="widget-container">
                            <div class="form-container grid-form form-background">
                                    <div class="form-actions" align="right">
                                        <button type="Button" onClick="window.location='<?php echo base_url();?>'" class="btn btn-warning">Nuevo Certificado</button>                                        
                                    </div>                                   
                                    <?php echo $table;?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

                  
    </div>        
</div>
<?php  $this->load->view('doc_foot');?>

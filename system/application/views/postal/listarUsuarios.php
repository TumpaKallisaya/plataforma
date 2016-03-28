<?php  $this->load->view('postal/doc_head');?>
<script type="text/javascript">
 $(function () {
                $('#data-table').dataTable({
                    "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"
                    /*"oTableTools": {
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": 'Save <span class="caret" />',
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ]
        }*/
                });
            });
  </script> 
<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid ">
                <div class="span12">
                    <div class="primary-head">
                        <h3 class="page-header">GENERACION DE USUARIOS (INTERESADOS)</h3>
                        <ul class="top-right-toolbar">
                            
                    </div>
                </div>
            </div>
        <form class="form-horizontal" method="post" action="<?php echo $action;?>">

            <table class="row-fluid">       
                <tr>
                    <td align="right">
                    <button type="submit" class="btn btn-success">Generar Usuario y Contraseña</button>                                    
                    </td>

                </tr>
            </table>       
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>Lista de Usuarios con acceso al Sistema</h3>
                        </div>
                        <div class="widget-container">  
                        <?php echo $table;?>
                        </div>
                    </div>
                </div>
            </div>
          
                      
          
        </form>
                  
    </div>        
</div>
<?php  $this->load->view('postal/doc_foot');?>

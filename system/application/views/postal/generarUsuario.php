<?php  $this->load->view('postal/doc_head');?>


<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid ">
                <div class="span12">
                    <div class="primary-head">
                        <h3 class="page-header">GENERACION DE USUARIOS</h3>
                        <ul class="top-right-toolbar">
                            
                    </div>
                </div>
            </div>
        <form class="form-horizontal" method="post" action="<?php echo $action;?>">

                    <div class="form-actions">
                <button type="submit" class="btn btn-success">Generar Usuario y Contrasena</button>                                    
            </div>  
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>Lista de Usuarios en el Sistema</h3>
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

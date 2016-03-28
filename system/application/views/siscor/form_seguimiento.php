<?php $this->load->view('postal/doc_head'); ?>
<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets gray">
                    <div class="widget-head bondi-blue">
                        <h3>Seguimiento a <?php echo $title; ?> - [ <?php echo $hoja_ruta; ?> ]</h3>                    
                    </div>
                    <!-- INICIO CUERPO -->
                    <div class="widget-container">
                        <div class="form-container grid-form form-background">
                            <!-- our error container -->
                            <form class="form-horizontal left-align cmxform" method="post" id="chooseDateForm" action="<?php echo $action; ?>" enctype="multipart/form-data">
                                <? if ($mensaje != ''){?>
                                <div class="panel-body" >
                                    <div class="alert alert-info">
                                        <strong><h3 style="text-align: center"><?echo $mensaje;?></h3></strong> 
                                    </div>
                                </div>
                                <?}?>
                                <div class="row">
                                    <?if($hoja_ruta){?>
                                    <div class="span12 control-group">
                                        <label class="control-label">Documentos: </label>
                                        <div class="controls">
                                            <?php echo $table; ?>
                                        </div>
                                    </div>
                                </div>
                                <h4><p class="text-info">Datos destinatario</p></h4>

                                <?for($j=$i;$j>=1;$j--){?>
                                
                                <fieldset class="default form-container">
                                    <div class="row">
                                <div class="span4">
                                    <label class="control-label">De:</label>
                                    <div class="controls"><?php echo $remitente[$j]; ?></div>
                                </div>
                                <div class="span4 control-group">
                                    <label class="control-label">Estado Documento:</label>
                                    <div class="controls"><?php
                                        echo $estado[$j] . '-' . $estado_documento[$j];
                                        if ($estado_aa[$j]) {
                                            echo '-' . $estado_aa[$j];
                                            if ($estado_aa[$j] == 'VINCULADO') {
                                                echo ' a ' . $vinculado_a_prin;
                                            }
                                            //if($estado_aa[$j]=='ANULADO'){ echo '';}
                                        }
                                        ?></div>
                                </div>
                                    </div>
                                    <div class="row">
                                <div class="span4 control-group">
                                    <label class="control-label">Fecha de Envio:</label>
                                    <div class="controls"><?php echo $fecha_envio[$j]; ?></div>
                                </div>
                                <div class="span4 control-group">
                                    <label class="control-label">Tarea:</label>
                                    <div class="controls"><?php echo $tarea[$j]; ?></div>
                                </div>
                                    </div>
                                    <div class="row">
                                <div class="span4 control-group">
                                    <label class="control-label">Para:</label>
                                    <div class="controls"><?php echo $destino[$j]; ?></div>
                                </div>
                                <div class="span4 control-group">
                                    <label class="control-label">Asunto:</label>
                                    <div class="controls"><?php echo $asunto[$j]; ?></div>
                                </div>
                                    </div>
                                </fieldset>
                        
                    <?}}?>                                    

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>



<script>
    function confirmar()
    {
        if (confirm('¿Estas seguro de desvincular esta Hoja de Ruta?'))
            document.getElementById("demo").innerHTML = "Hello World";
        else
            document.getElementById("demo").innerHTML = "Hi World";
    }
</script>

<?php $this->load->view('postal/doc_foot'); ?>
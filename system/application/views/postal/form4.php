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
                /*==JQUERY STEPY==*/
                $('#stepy').stepy({
                    backLabel: 'Back',
                    nextLabel: 'Next',
                    block: true,
                    description: true,
                    legend: false,
                    titleClick: true,
                    titleTarget: '#stepy_tabby'
                });
                $('#stepy1').stepy({
                    backLabel: 'Back',
                    nextLabel: 'Next',
                    block: true,
                    description: true,
                    legend: false,
                    titleClick: true,
                    titleTarget: '#stepy_tabby1'
                });
                $('#stepy_form11').stepy({
                    backLabel: 'Back',
                    nextLabel: 'Next',
                    //errorImage: true,
                    block: true,
                    description: true,
                    legend: false,
                    titleClick: true,
                    titleTarget: '#top_tabby',//,
                    validate: false
                });
                $('#stepy_form').validate({
                    rules: {
                        'name': 'required',
                        'email': 'required',
                    },
                    messages: {
                        'name': {
                            required: 'Name field is required!'
                        },
                        'email': {
                            required: 'Email field is requerid!'
                        },
                    }
                });
            });

</script>

<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid ">
                <div class="span12">
                    <div class="primary-head">
                        <h3 class="page-header">REQUISITOS TECNICOS</h3>
                        <ul class="top-right-toolbar">
                            <li>FORMULARIO REQ-F003</li><li></li> <li></li></ul>
                    </div>
                </div>
            </div>
        <form class="form-horizontal" method="post" action="<?php echo $action;?>">
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>3. Ubicacion Casa Matriz</h3>
                        </div>
                        <div class="widget-container">                                                        
                                <div class="controls-row" >
                                    <label class="control-label">Domicilio Principal</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Domicilio Principal" class="span6">
                                    </div>
                                    <label class="control-label">Ciudad Capital</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Ciudad Capital" class="span3">
                                    </div>                                    
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Departamento</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Departamento">
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
                            <h3>4. Ubicacion de Oficinas de Apoyo</h3>
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label class="control-label">Oficina</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Oficina" class="span12">
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Direccion</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Direccion" class="span12">
                                    </div>
                                </div>
                                <div class="controls-row" >
                                    <label class="control-label">Departamento</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Departamento" class="span12">
                                    </div>                                  
                                </div>                                
                                                                                         
                        </div>
                    </div>
                </div>
            </div>                                  
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Siguiente Formulario</button>                                    
            </div>            
        </form>
                  
    </div>        
</div>
<?php  $this->load->view('doc_foot');?>

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
                        <h3 class="page-header">IDENTIFICACION DE LA EMPRESA</h3>
                        <ul class="top-right-toolbar">
                            <li>FORMULARIO REQ-F001</li><li></li> <li></li></ul>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="stepy-widget">
                        <div class="widget-head clearfix orange">
                            <div id="top_tabby" class="pull-right">
                            </div>
                        </div>
                        <div class="widget-container gray ">
                            <div class="form-container">
                                <form id="stepy_form" class="form-horizontal" method="post" action="#">
                                    <fieldset title="Step 1">
                                        <legend>1 DATOS GENERALES</legend>
                                        <div class="control-group">
                                            <label class="control-label">Username</label>
                                            <div class="controls">
                                                <input name="name" type="text"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email Address</label>
                                            <div class="controls">
                                                <input name="email" type="email"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 2">
                                        <legend>2 DATOS COMPLEMENTARIOS</legend>
                                        <div class="control-group">
                                            <label class="control-label">First Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="First Name" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Last Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Last Name" class="input-large">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 3">
                                        <legend>3 INFORMACION PARA NOTIFICACIONES</legend>
                                        <div class="control-group">
                                            <label class="control-label">Text Input</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Text Input" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Checkbox</label>
                                            <div class="controls">
                                                <label class="checkbox">
                                                <input type="checkbox" value="">
                                                Option one is this and that—be sure to include why it's great </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Radio</label>
                                            <div class="controls">
                                                <label class="radio">
                                                <input type="radio" name="optionsRadios" value="option1" >
                                                Option one is this and that—be sure to include why it's great </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 4">
                                        <legend>2 DATOS COMPLEMENTARIOS</legend>
                                        <div class="control-group">
                                            <label class="control-label">First Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="First Name" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Last Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Last Name" class="input-large">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 5">
                                        <legend>2 DATOS COMPLEMENTARIOS</legend>
                                        <div class="control-group">
                                            <label class="control-label">First Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="First Name" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Last Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Last Name" class="input-large">
                                            </div>
                                        </div>
                                    </fieldset>                                    
                                    <button type="submit" class="finish btn btn-extend"> Finish!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid ">
                <div class="span12">
                    <div class="primary-head">
                        <h3 class="page-header">REQUISITOS PARA OTORGACION</h3>
                        <ul class="top-right-toolbar">
                            <li>FORMULARIO REQ-F002A</li><li></li> <li></li></ul>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="stepy-widget">
                        <div class="widget-head clearfix bondi-blue">
                            <div id="stepy_tabby" class="pull-right">
                            </div>
                        </div>
                        <div class="widget-container gray ">
                            <div class="form-container">
                                <form id="stepy" class=" form-horizontal left-align form-well">
                                    <fieldset title="Step 1">
                                        <legend>description one</legend>
                                        <div class="control-group">
                                            <label class="control-label">Username</label>
                                            <div class="controls">
                                                <input name="name" required type="text"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email Address</label>
                                            <div class="controls">
                                                <input name="email" required type="email"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 2">
                                        <legend>description two</legend>
                                        <div class="control-group">
                                            <label class="control-label">First Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="First Name" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Last Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Last Name" class="input-large">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 3">
                                        <legend>description three</legend>
                                        <div class="control-group">
                                            <label class="control-label">Text Input</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Text Input" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Checkbox</label>
                                            <div class="controls">
                                                <label class="checkbox">
                                                <input type="checkbox" value="">
                                                Option one is this and that—be sure to include why it's great </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Radio</label>
                                            <div class="controls">
                                                <label class="radio">
                                                <input type="radio" name="optionsRadios" value="option1" checked>
                                                Option one is this and that—be sure to include why it's great </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 4">
                                        <legend>description three</legend>
                                        <div class="control-group">
                                            <label class="control-label">Text Input</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Text Input" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Checkbox</label>
                                            <div class="controls">
                                                <label class="checkbox">
                                                <input type="checkbox" value="">
                                                Option one is this and that—be sure to include why it's great </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Radio</label>
                                            <div class="controls">
                                                <label class="radio">
                                                <input type="radio" name="optionsRadios" value="option1" checked>
                                                Option one is this and that—be sure to include why it's great </label>
                                            </div>
                                        </div>
                                    </fieldset>                                    
                                    <button type="submit" class="finish btn btn-extend"> Finish!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="stepy-widget">
                        <div class="widget-head clearfix blue-violate">
                            <div id="stepy_tabby1">
                            </div>
                        </div>
                        <div class="widget-container gray ">
                            <div class="form-container">
                                <form id="stepy1" class=" form-horizontal left-align form-well">
                                    <fieldset title="Step 1">
                                        <legend>description one</legend>
                                        <div class="control-group">
                                            <label class="control-label">Username</label>
                                            <div class="controls">
                                                <input name="name" type="text"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Email Address</label>
                                            <div class="controls">
                                                <input name="email" type="email"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 2">
                                        <legend>description two</legend>
                                        <div class="control-group">
                                            <label class="control-label">First Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="First Name" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Last Name</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Last Name" class="input-large">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="Step 3">
                                        <legend>description three</legend>
                                        <div class="control-group">
                                            <label class="control-label">Text Input</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Text Input" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Checkbox</label>
                                            <div class="controls">
                                                <label class="checkbox">
                                                <input type="checkbox" value="">
                                                Option one is this and that—be sure to include why it's great </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Radio</label>
                                            <div class="controls">
                                                <label class="radio">
                                                <input type="radio" name="optionsRadios" value="option1" checked>
                                                Option one is this and that—be sure to include why it's great </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="finish btn btn-extend"> Finish!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                  
    </div>        
</div>
<?php  $this->load->view('doc_foot');?>

<?php $this->load->view('postal/doc_head'); ?>
<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets gray">
                    <div class="widget-head bondi-blue">
                        <h3><?php echo $title1; ?></h3>                    
                    </div>
                    <!-- INICIO CUERPO -->
                    <div class="widget-container">
                        <div class="form-container grid-form form-background">
                            <!-- our error container -->
                            <div class="error-container">
                                <h4>There are serious errors in your form submission, please see below for details.</h4>
                                <ol>
                                    <li>
                                        <label for="txtinstitucion" class="error">Por favor ingrese dirección.</label>
                                    </li>
                                    <li>
                                        <label for="emailID" class="error">Please enter your <b>email</b>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="webUrl" class="error">Please enter your website address</label>
                                    </li>
                                    <li>
                                        <label for="txt-msg" class="error">Please enter your message</label>
                                    </li>
                                    <li>
                                        <label for="archivos[]" class="error">Please select a document (doc, docx, txt, pdf)</label>
                                    </li>
                                    <li>
                                        <label for="post-name" class="error">Please select your poistion</label>
                                    </li>
                                </ol>
                            </div>
                            <form class="form-horizontal left-align cmxform" method="post" id="chooseDateForm" action="<?php echo $action; ?>" enctype="multipart/form-data">
                                <h4><p class="text-info">Datos destinatario</p></h4>
                                <div class="row">
                                    <div class="span4 control-group">
                                        <label class="control-label">Direccion</label>
                                        <div class="controls">
                                            <?$js1 = 'onClick="MostrarUsuario(this.value)" class="" required';?>
                                            <?php echo form_dropdown('txtinstitucion', $direccion, '', $js1); ?>
                                        </div>
                                    </div>
                                    <div class="span4 control-group">
                                        <label class="control-label">Usuario</label>
                                        <div class="controls" id="txtHint2"></div>
                                    </div>
                                    <div class="span4 control-group">
                                        <label class="control-label">Cargo</label>
                                        <div class="controls" id="txtHint3"></div>
                                    </div>
                                    <div class="control-group">
                                        <?if($hoja_ruta){?>
                                        <label class="control-label">Hoja de Ruta</label>
                                        <div class="controls">
                                            <input type="text" name="hoja_ruta" id="grumble" value="<?php echo $hoja_ruta; ?>" disabled />
                                        </div>
                                        <?}else{?>
                                        <div class="controls"></div>
                                        <?}?>
                                    </div>
                                </div>
                                <h4><p class="text-info">Datos remitente entrante</p></h4>                                                                                                   
                                <div class="row">
                                    <div class="span4 control-group">
                                        <label class="control-label">Datos empresa</label>
                                        <div class="controls">
                                            <?$js1 = 'onChange="MostrarPersonaE(this.value)" class="" required';?>
                                            <?php echo form_dropdown('txtempresa', $txtempresa, '', $js1); ?>
                                        </div>
                                    </div>
                                    <div class="span4 control-group">
                                        <label class="control-label">Persona</label>
                                        <div class="controls" id="txtHintPE"></div>
                                    </div>
                                    <div class="span4 control-group">
                                        <label class="control-label">Cargo</label>
                                        <div class="controls" id="txtHintCE"></div>
                                    </div>
                                </div>
                                <h4><p class="text-info">Tema del Proceso</p></h4>
                                <div class="control-group">
                                    <label class="control-label">Asunto</label>
                                    <div class="controls">
                                        <input id="asunto_documento" type="text" placeholder="Asunto documento" name="asunto_docE" class="span12" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Tipo Plantilla</label>
                                    <div class="controls">
                                        <?$js1 = 'class="span12" required';?>
                                        <?php echo form_dropdown('tipo_documento', $tipo_documento, '', $js1); ?>	
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Confidencial</label>
                                    <div class="controls">
                                        <input class="span1" type="radio" name="confidencial" value="SI"/>Si
                                        <input class="span1" type="radio" name="confidencial" checked value="NO"/>No
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Prioridad</label>
                                    <div class="controls">
                                        <input class="span1" type="radio" name="prioridad" value="SI"/>Urgente
                                        <input class="span1" type="radio" name="prioridad" checked value="NO"/>Normal
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Cite</label>
                                    <div class="controls">
                                        <input id="asunto_documento" type="text" placeholder="N&uacute;mero de Cite" name="citeE" class="span2"   required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">N&uacute;mero de hojas</label>
                                    <div class="controls">
                                        <input id="asunto_documento" type="number" placeholder="N&uacute;mero de hojas" name="nro_hojas" class="span2" inputmode="numeric" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nro. de anexos y detalle</label>
                                    <div class="controls">
                                        <input id="asunto_documento" type="text" placeholder="Anexos" name="nro_anexos" class="span2" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Adjuntos</label>
                                    <div class="controls" id="adjuntos">
                                        <input name="archivos[]" type="file" class="file-uniform {validate:{required:true,accept:'docx?|txt|pdf'}} " required>
                                        <a href="#" onClick="addCampo()"><img src="<?php echo base_url(); ?>style/images/add.png" alt="Agregar adjunto" border="0"></a>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-extend" onClick='javascript:CompruebaCampos()'  >Crear</button>
                                    <button type="button" class="btn btn-danger cancel">Cancelar</button>
                                </div>

                                <div class="error-container">
                                    <h4>Favor de revisar los datos requeridos!</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var numero = 0;
    evento = function (evt) {
        return (!evt) ? event : evt;
    }
    addCampo = function () {
        nDiv = document.createElement('div');
        nDiv.className = 'archivo';
        nDiv.id = 'file' + (++numero);
        nCampo = document.createElement('input');
        nCampo.name = 'archivos[]';
        nCampo.type = 'file';
        a = document.createElement('a');
        a.name = nDiv.id;
        a.href = '#';
        a.onclick = elimCamp;
        a.innerHTML = 'Eliminar';
        nDiv.appendChild(nCampo);
        nDiv.appendChild(a);
        container = document.getElementById('adjuntos');
        container.appendChild(nDiv);
    }
    elimCamp = function (evt) {
        evt = evento(evt);
        nCampo = rObj(evt);
        div = document.getElementById(nCampo.name);
        div.parentNode.removeChild(div);
    }
    rObj = function (evt) {
        return evt.srcElement ? evt.srcElement : evt.target;
    }
    function CompruebaCampos() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/siscor/cor_entranteValida",
            cache: false,
            data: $('#chooseDateForm').serialize(),
            success: function (vari) {
                if (vari === 1)
                    alert("Completar los campos requeridos.");
                if (vari === 2)
                    alert("Elegir un Usuario Destinatario.");
                if (vari === 3)
                    alert("Elegir a la Persona Remitente.");
            }
        });
    }

    var xmlHttp;
    var url0 = "<?echo base_url();?>";
    function MostrarUsuario(str) {
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp === null) {
            alert("Browser does not support HTTP Request");
            return;
        }
        url = url0 + "index.php/siscor/form_interno2e";
        if (!str) {
            str = 0;
        }
        url = url + "/" + str;
        xmlHttp.onreadystatechange = stateChangedx;
        xmlHttp.open("POST", url, true);
        xmlHttp.send(null);
        document.getElementById("txtHint2").innerHTML = '';
        document.getElementById("txtHint3").innerHTML = '';
    }
    function stateChangedx() {
        if (xmlHttp.readyState === 4 || xmlHttp.readyState === "complete") {
            document.getElementById("txtHint2").innerHTML = xmlHttp.responseText;
        }
    }
    function MostrarUsuario2(str) {
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp === null) {
            alert("Browser does not support HTTP Request");
            return;
        }
        url = url0 + "index.php/siscor/form_interno3";
        if (!str) {
            str = 0;
        }
        url = url + "/" + str;
        xmlHttp.onreadystatechange = stateChangedx1;
        xmlHttp.open("POST", url, true);
        xmlHttp.send(null);
        document.getElementById("txtHint3").innerHTML = '';
    }
    function stateChangedx1() {
        if (xmlHttp.readyState === 4 || xmlHttp.readyState === "complete") {
            document.getElementById("txtHint3").innerHTML = xmlHttp.responseText;
        }
    }
    function MostrarPersonaE(str) {
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp === null) {
            alert("Browser does not support HTTP Request");
            return;
        }
        url = url0 + "index.php/siscor/v_form_entrante2";
        if (!str) {
            str = 0;
        }
        url = url + "/" + str;
        xmlHttp.onreadystatechange = stateChangedxPE;
        xmlHttp.open("POST", url, true);
        xmlHttp.send(null);
    }
    function stateChangedxPE() {
        if (xmlHttp.readyState === 4 || xmlHttp.readyState === "complete") {
            document.getElementById("txtHintPE").innerHTML = xmlHttp.responseText;
        }
    }
    function MostrarCargoE(str) {
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp === null) {
            alert("Browser does not support HTTP Request");
            return;
        }
        url = url0 + "index.php/siscor/v_form_entrante3";
        if (!str) {
            str = 0;
        }
        url = url + "/" + str;
        xmlHttp.onreadystatechange = stateChangedxCE;
        xmlHttp.open("POST", url, true);
        xmlHttp.send(null);
    }
    function stateChangedxCE() {
        if (xmlHttp.readyState === 4 || xmlHttp.readyState === "complete") {
            document.getElementById("txtHintCE").innerHTML = xmlHttp.responseText;
        }
    }


    function GetXmlHttpObject() {
        var xmlHttp = null;
        try {
            // Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
        } catch (e) {
            //Internet Explorer
            try {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlHttp;
    }
</script>
<?php $this->load->view('postal/doc_foot'); ?>
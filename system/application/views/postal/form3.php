<?php  $this->load->view('postal/doc_head');?>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/js-maps/jquery.min.js"></script>
<script src="<?php echo base_url();?>theme/themeAplicaciones/js/js-maps/map.class.js" type="text/javascript"></script> 


<script type="text/javascript">
  function envia(pag){  
    document.formul.action= pag  
    document.formul.submit()  
}       
 function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     }
    var xmlHttp
    var url0="<?php echo base_url();?>"


    function mostrarMaps (str) {
        //alert(str);
        if(!str){str=0;} 
        xmlHttp=new XMLHttpRequest();
        url=url0+"index.php/postal/mostrarMaps1";
        url=url+"/"+str; 
        xmlHttp.onreadystatechange=function(){document.getElementById("IdMaps").innerHTML=xmlHttp.responseText;}
        xmlHttp.open("POST",url,true);
        xmlHttp.send(null);
    }

    $(document).ready(function() {
        $("input[type=submit]").click(function() {
            var accion = $(this).attr('dir');
            $('form').attr('action', accion);
            $('form').submit();
        });
            var map = new Map(-16.495655697429967, -68.13356295195922, 17);
            map.init("map-canvas");
            map.changeLatLng("lat-id","lng-id");
            map.findAddress("La Paz");        
            $("#buscar-direccion").click(function() {
               map.findAddress(document.getElementById("direccion").value);
            });                         

            var map1 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map1.init("map-canvas1");
            map1.changeLatLng("lat-id1","lng-id1");
            map1.findAddress("La Paz");        
            $("#buscar-direccion1").click(function() {
               map1.findAddress(document.getElementById("direccion1").value);
            }); 
            var map2 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map2.init("map-canvas2");
            map2.changeLatLng("lat-id2","lng-id2");
            map2.findAddress("La Paz");        
            $("#buscar-direccion3").click(function() {
               map2.findAddress(document.getElementById("direccion2").value);
            });
            var map3 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map3.init("map-canvas3");
            map3.changeLatLng("lat-id3","lng-id3");
            map3.findAddress("La Paz");        
            $("#buscar-direccion3").click(function() {
               map3.findAddress(document.getElementById("direccion3").value);
            });
            var map4 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map4.init("map-canvas4");
            map4.changeLatLng("lat-id4","lng-id4");
            map4.findAddress("La Paz");        
            $("#buscar-direccion4").click(function() {
               map4.findAddress(document.getElementById("direccion4").value);
            });
            var map5 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map5.init("map-canvas5");
            map5.changeLatLng("lat-id5","lng-id5");
            map5.findAddress("La Paz");        
            $("#buscar-direccion5").click(function() {
               map5.findAddress(document.getElementById("direccion5").value);
            });
            var map6 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map6.init("map-canvas6");
            map6.changeLatLng("lat-id6","lng-id6");
            map6.findAddress("La Paz");        
            $("#buscar-direccion6").click(function() {
               map6.findAddress(document.getElementById("direccion6").value);
            });
            var map7 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map7.init("map-canvas7");
            map7.changeLatLng("lat-id7","lng-id7");
            map7.findAddress("La Paz");        
            $("#buscar-direccion8").click(function() {
               map7.findAddress(document.getElementById("direccion7").value);
            });
            var map8 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map8.init("map-canvas8");
            map8.changeLatLng("lat-id8","lng-id8");
            map8.findAddress("La Paz");        
            $("#buscar-direccion8").click(function() {
               map8.findAddress(document.getElementById("direccion8").value);
            });
            var map9 = new Map(-16.495655697429967, -68.13356295195922, 17);
            map9.init("map-canvas9");
            map9.changeLatLng("lat-id9","lng-id9");
            map9.findAddress("La Paz");        
            $("#buscar-direccion9").click(function() {
               map9.findAddress(document.getElementById("direccion9").value);
            });                                                                          
            $("selectMaps").val("0");  
            var time=3000;
            //var CantidadOA= 9; 
            var CantidadOA= "<?php echo count($Form3OA); ?>";   
            //alert (CantidadOA);
            if(CantidadOA==0){
                $('#maps1').hide(time);     
                $('#maps2').hide(time);     
                $('#maps3').hide(time);
                $('#maps4').hide(time);
                $('#maps5').hide(time);
                $('#maps6').hide(time);
                $('#maps7').hide(time);
                $('#maps8').hide(time);
                $('#maps9').hide(time);
            }
                      
            if(CantidadOA==1){
                 $('#maps2').hide(time);     
                $('#maps3').hide(time);
                $('#maps4').hide(time);
                $('#maps5').hide(time);
                $('#maps6').hide(time);
                $('#maps7').hide(time);
                $('#maps8').hide(time);
                $('#maps9').hide(time);
            }
            if(CantidadOA==2){     
                $('#maps3').hide(time);
                $('#maps4').hide(time);
                $('#maps5').hide(time);
                $('#maps6').hide(time);
                $('#maps7').hide(time);
                $('#maps8').hide(time);
                $('#maps9').hide(time);
            }
            if(CantidadOA==3){     
                $('#maps4').hide(time);
                $('#maps5').hide(time);
                $('#maps6').hide(time);
                $('#maps7').hide(time);
                $('#maps8').hide(time);
                $('#maps9').hide(time);
            }
            if(CantidadOA==4){     
                $('#maps5').hide(time);
                $('#maps6').hide(time);
                $('#maps7').hide(time);
                $('#maps8').hide(time);
                $('#maps9').hide(time);
            }  
            if(CantidadOA==5){     
                $('#maps6').hide(time);
                $('#maps7').hide(time);
                $('#maps8').hide(time);
                $('#maps9').hide(time);
            } 
             if(CantidadOA==6){     
                $('#maps7').hide(time);
                $('#maps8').hide(time);
                $('#maps9').hide(time);
            } 
             if(CantidadOA==7){     
                $('#maps8').hide(time);
                $('#maps9').hide(time);
            }    
              if(CantidadOA==8){     
                $('#maps9').hide(time);
            } 
              if(CantidadOA==9){     

            }             
    });

    $(function(){


        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#addDepPers").on('click', function(){
            $("#tbDepPers tbody tr:eq(0)").clone().removeClass('fila-tbDepPers').appendTo("#tbDepPers tbody");
        });        
        $("#addDepLog").on('click', function(){
            $("#tbDepLog tbody tr:eq(0)").clone().removeClass('fila-tbDepLog').appendTo("#tbDepLog tbody");
        });
        $("#addDepTec").on('click', function(){
            $("#tbDepTec tbody tr:eq(0)").clone().removeClass('fila-tbDepTec').appendTo("#tbDepTec tbody");
        });
        $("#addDepMob").on('click', function(){
            $("#tbDepMob tbody tr:eq(0)").clone().removeClass('fila-tbDepMob').appendTo("#tbDepMob tbody");
        });

        $("#addNacPers").on('click', function(){
            $("#tbNacPers tbody tr:eq(0)").clone().removeClass('fila-tbNacPers').appendTo("#tbNacPers tbody");
        });        
        $("#addNacLog").on('click', function(){
            $("#tbNacLog tbody tr:eq(0)").clone().removeClass('fila-tbNacLog').appendTo("#tbNacLog tbody");
        });
        $("#addNacTec").on('click', function(){
            $("#tbNacTec tbody tr:eq(0)").clone().removeClass('fila-tbNacTec').appendTo("#tbNacTec tbody");
        });
        $("#addNacMob").on('click', function(){
            $("#tbNacMob tbody tr:eq(0)").clone().removeClass('fila-tbNacMob').appendTo("#tbNacMob tbody");
        });

        $("#addIntPers").on('click', function(){
            $("#tbIntPers tbody tr:eq(0)").clone().removeClass('fila-tbIntPers').appendTo("#tbIntPers tbody");
        });        
        $("#addIntLog").on('click', function(){
            $("#tbIntLog tbody tr:eq(0)").clone().removeClass('fila-tbIntLog').appendTo("#tbIntLog tbody");
        });
        $("#addIntTec").on('click', function(){
            $("#tbIntTec tbody tr:eq(0)").clone().removeClass('fila-tbIntTec').appendTo("#tbIntTec tbody");
        });
        $("#addIntMob").on('click', function(){
            $("#tbIntMob tbody tr:eq(0)").clone().removeClass('fila-tbIntMob').appendTo("#tbIntMob tbody");
        });

        // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });


    });
function mapsOnChange(sel) {
    if (sel.value=="0"){
        console.log(3);
        div1 = document.getElementById("maps1");div1.style.display = "none";
        div2 = document.getElementById("maps2");div2.style.display = "none";
        div3 = document.getElementById("maps3");div3.style.display = "none";
        div4 = document.getElementById("maps4");div4.style.display = "none";
        div5 = document.getElementById("maps5");div5.style.display = "none";
        div6 = document.getElementById("maps6");div6.style.display = "none";
        div7 = document.getElementById("maps7");div7.style.display = "none";
        div8 = document.getElementById("maps8");div8.style.display = "none";
        div9 = document.getElementById("maps9");div9.style.display = "none";        

    }
    if(sel.value=="1"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "none";
        div3 = document.getElementById("maps3");div3.style.display = "none";
        div4 = document.getElementById("maps4");div4.style.display = "none";
        div5 = document.getElementById("maps5");div5.style.display = "none";
        div6 = document.getElementById("maps6");div6.style.display = "none";
        div7 = document.getElementById("maps7");div7.style.display = "none";
        div8 = document.getElementById("maps8");div8.style.display = "none";
        div9 = document.getElementById("maps9");div9.style.display = "none";
    }
    if(sel.value=="2"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "";
        div3 = document.getElementById("maps3");div3.style.display = "none";
        div4 = document.getElementById("maps4");div4.style.display = "none";
        div5 = document.getElementById("maps5");div5.style.display = "none";
        div6 = document.getElementById("maps6");div6.style.display = "none";
        div7 = document.getElementById("maps7");div7.style.display = "none";
        div8 = document.getElementById("maps8");div8.style.display = "none";
        div9 = document.getElementById("maps9");div9.style.display = "none";
    }    
    if(sel.value=="3"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "";
        div3 = document.getElementById("maps3");div3.style.display = "";
        div4 = document.getElementById("maps4");div4.style.display = "none";
        div5 = document.getElementById("maps5");div5.style.display = "none";
        div6 = document.getElementById("maps6");div6.style.display = "none";
        div7 = document.getElementById("maps7");div7.style.display = "none";
        div8 = document.getElementById("maps8");div8.style.display = "none";
        div9 = document.getElementById("maps9");div9.style.display = "none";
    }
    if(sel.value=="4"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "";
        div3 = document.getElementById("maps3");div3.style.display = "";
        div4 = document.getElementById("maps4");div4.style.display = "";
        div5 = document.getElementById("maps5");div5.style.display = "none";
        div6 = document.getElementById("maps6");div6.style.display = "none";
        div7 = document.getElementById("maps7");div7.style.display = "none";
        div8 = document.getElementById("maps8");div8.style.display = "none";
        div9 = document.getElementById("maps9");div9.style.display = "none";
    }
    if(sel.value=="5"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "";
        div3 = document.getElementById("maps3");div3.style.display = "";
        div4 = document.getElementById("maps4");div4.style.display = "";
        div5 = document.getElementById("maps5");div5.style.display = "";
        div6 = document.getElementById("maps6");div6.style.display = "none";
        div7 = document.getElementById("maps7");div7.style.display = "none";
        div8 = document.getElementById("maps8");div8.style.display = "none";
        div9 = document.getElementById("maps9");div9.style.display = "none";
    }
    if(sel.value=="6"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "";
        div3 = document.getElementById("maps3");div3.style.display = "";
        div4 = document.getElementById("maps4");div4.style.display = "";
        div5 = document.getElementById("maps5");div5.style.display = "";
        div6 = document.getElementById("maps6");div6.style.display = "";
        div7 = document.getElementById("maps7");div7.style.display = "none";
        div8 = document.getElementById("maps8");div8.style.display = "none";
        div9 = document.getElementById("maps9");div9.style.display = "none";
    }
    if(sel.value=="7"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "";
        div3 = document.getElementById("maps3");div3.style.display = "";
        div4 = document.getElementById("maps4");div4.style.display = "";
        div5 = document.getElementById("maps5");div5.style.display = "";
        div6 = document.getElementById("maps6");div6.style.display = "";
        div7 = document.getElementById("maps7");div7.style.display = "";
        div8 = document.getElementById("maps8");div8.style.display = "none";
        div9 = document.getElementById("maps9");div9.style.display = "none";
    }
    if(sel.value=="8"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "";
        div3 = document.getElementById("maps3");div3.style.display = "";
        div4 = document.getElementById("maps4");div4.style.display = "";
        div5 = document.getElementById("maps5");div5.style.display = "";
        div6 = document.getElementById("maps6");div6.style.display = "";
        div7 = document.getElementById("maps7");div7.style.display = "";
        div8 = document.getElementById("maps8");div8.style.display = "";
        div9 = document.getElementById("maps9");div9.style.display = "none";
    }
    if(sel.value=="9"){
        div1 = document.getElementById("maps1");div1.style.display = "";
        div2 = document.getElementById("maps2");div2.style.display = "";
        div3 = document.getElementById("maps3");div3.style.display = "";
        div4 = document.getElementById("maps4");div4.style.display = "";
        div5 = document.getElementById("maps5");div5.style.display = "";
        div6 = document.getElementById("maps6");div6.style.display = "";
        div7 = document.getElementById("maps7");div7.style.display = "";
        div8 = document.getElementById("maps8");div8.style.display = "";
        div9 = document.getElementById("maps9");div9.style.display = "";        
    }

}
</script>
<style type="text/css">
/*.fila-tbMaps{ display: none; }  /*fila base oculta */

.fila-tbDepPers{ display: none; }  /*fila base oculta */
.fila-tbDepLog{ display: none; }  /*fila base oculta */
.fila-tbDepTec{ display: none; }  /*fila base oculta */
.fila-tbDepMob{ display: none; }  /*fila base oculta */

.fila-tbNacPers{ display: none; }  /*fila base oculta */
.fila-tbNacLog{ display: none; }  /*fila base oculta */
.fila-tbNacTec{ display: none; }  /*fila base oculta */
.fila-tbNacMob{ display: none; }  /*fila base oculta */

.fila-tbIntPers{ display: none; }  /*fila base oculta */
.fila-tbIntLog{ display: none; }  /*fila base oculta */
.fila-tbIntTec{ display: none; }  /*fila base oculta */
.fila-tbIntMob{ display: none; }  /*fila base oculta */

.fila-base{ display: none; }  /*fila base oculta */

 
</style>
<div class="main-wrapper">
    <div class="container-fluid">
            <div class="row-fluid ">
                <div class="span12">
                    <div class="primary-head">
                        <h3 class="page-header">REQUISITOS TECNICOS</h3>
                        <ul class="top-right-toolbar">
                            FORMULARIO REQ-F003</li><li></li> <li></li></ul>
                    </div>
                </div>
            </div>
        <form class="form-horizontal" name="formul" method="post" action="<?php echo $action1;?>" onkeypress="return anular(event)" enctype="multipart/form-data">
            
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>1. Ubicacion Casa Matriz</h3><input type="hidden" name="IdForm" value="<?php echo $IdForm;?>">
                        </div>
                        <div class="widget-container">                                                        
                                <div class="controls-row" >
                                    <label class="control-label">Domicilio Principal</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="DomicilioPrincipal" placeholder="Domicilio Principal" value="<?php echo @$Form3->DomicilioPrincipal; ?>" class="span6" <?php echo $readonly; ?> >
                                    </div>
                                    <label class="control-label">Ciudad Capital</label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="CiudadCapital" placeholder="Ciudad Capital" value="<?php echo @$Form3->CiudadCapital; ?>" class="span3" <?php echo $readonly; ?> >
                                    </div>                                    
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Departamento</label>
                                    <div class="controls">
                                        <?php echo form_dropdown('Departamento', $Departamentos, $Form3->Departamento,$readonly);?>
                                    </div>                                    
                                </div> 
                           
                                <div class="controls-row">
                                    <label class="control-label">Ubicacion de Referencia</label>
                                    <div class="controls">                                                                                                                            
                                        <div class="form-group">                                                                                                       
                                            <input type="text" class="form-control" id="direccion" placeholder="Direccion para el Google Maps" <?php echo $readonly; ?> >
                                            <button type="button" id="buscar-direccion" class="btn btn-default">Buscar la direccion</button>                                                    
                                        </div>                                                                                                                                  
                                        <div id="map-canvas" style="width: 700px; height: 350px; border: 2px solid black;"></div>                                        
                                        <label class="control-label">Latitud</label>
                                        <div class="controls">
                                            <input readonly type="text" class="span3" name="Latitud" id="lat-id" placeholder="0.0000">
                                        </div>                                    
                                        <label class="control-label">Longitud</label>
                                        <div class="controls">
                                            <input readonly type="text" class="span3" name="Longitud" id="lng-id" placeholder="0.0000">
                                        </div>                                                                                                                               
                                    </div>                                    
                                </div>                            
                                <div class="controls-row">
                                    <label class="control-label">Fotografia (Frontis de la Instalacion Fisica)</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> 
                                                <img src="<?php echo base_url().'index.php/postal/verImagenForm3/'.$Form3->IdForm3; ?>" alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                            
                                            </div>
                                            <div>
                                                <span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar</span>
                                                <input type="file" name="FotografiaFrontis" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
                                            </div>
                                        </div>
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
                            <h3>2. Ubicacion de Oficinas de Apoyo</h3>
                        </div>
                        <div class="widget-container">                                                        
                                <div class="controls-row" >
                                    <label class="control-label">Numero de Oficinas</label>
                                    <div class="controls">
                                        <?php echo form_dropdown('selectMaps', $selectMaps, count($Form3OA),'id="selectMaps" onChange="mapsOnChange(this)"'.$readonly);?>
                                    </div>                                  
                                </div>
                        </div>                            
                        <?php for($i=1;$i<=9;$i++){?>
                        <div id="maps<?php echo $i;?>" style="display:;"><hr>                                                        
                                <div class="controls-row" >
                                    <label class="control-label">Oficina <?php echo $i;?></label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="OficinaOA[]" placeholder="Oficina <?php echo $i;?>" value="<?php echo @$Form3OA[$i-1]->OficinaOA; ?>" class="span3" <?php echo $readonly; ?> >
                                    </div>
                                    <label class="control-label">Direccion <?php echo $i;?></label>
                                    <div class="controls">
                                        <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="DireccionOA[]" placeholder="Direccion <?php echo $i;?>" value="<?php echo @$Form3OA[$i-1]->DireccionOA; ?>" class="span6" <?php echo $readonly; ?> >
                                    </div>                                    
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Departamento</label>
                                    <div class="controls">
                                        <?php echo form_dropdown('DepartamentoOA[]', $Departamentos, @$Form3OA[$i]->DepartamentoOA,$readonly);?>
                                    </div>                                    
                                </div> 
                                <div class="controls-row">
                                    <label class="control-label">Ubicacion de Referencia</label>
                                    <div class="controls">                                                                                                                            
                                        <div class="form-group">                                                                                                       
                                            <input type="text" class="form-control" id="direccion<?php echo $i;?>" placeholder="Direccion para el Google Maps" <?php echo $readonly; ?> >
                                            <button type="button" id="buscar-direccion<?php echo $i;?>" class="btn btn-default">Buscar la direccion</button>                                                    
                                        </div>                                                                                                                                  
                                        <div id="map-canvas<?php echo $i;?>" style="width: 700px; height: 350px; border: 2px solid black;"></div>                                        
                                        <label class="control-label">Latitud</label>
                                        <div class="controls">
                                            <input readonly type="text" class="span3" name="LatitudOA[]" id="lat-id<?php echo $i;?>" placeholder="0.0000">
                                        </div>                                    
                                        <label class="control-label">Longitud</label>
                                        <div class="controls">
                                            <input readonly type="text" class="span3" name="LongitudOA[]" id="lng-id<?php echo $i;?>" placeholder="0.0000">
                                        </div>                                                                                                                               
                                    </div>                                    
                                </div>          

                                <div class="controls-row">
                                    <label class="control-label">Fotografia (Frontis de la Instalacion Fisica)</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url().'index.php/postal/verImagenForm3OA/'.@$Form3OA[$i-1]->IdForm3."/".@$Form3OA[$i-1]->NombreFFOA; ?>" alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar</span>
                                                <input type="file" name="FotografiaFrontisOA[]" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
                                            </div>
                                        </div>
                                    </div>                                                        
                                </div>    
                        </div>   
                             
                        <?php } ?>
                    </div>
                </div>
            </div>  
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>3. Relacion de Equipamiento Logistico, Tecnologico, y Mobiliario</h3>
                        </div>
                        <div class="widget-container">                                                        
                            <table>
                                <tr>
                                    <td ><left><b>Departamental</b></left></td><td></td>
                                    <td><left><b>Nacional</b></left></td>
                                    <td></td>
                                    <td><left><b>Internacional</b></left></td>
                                </tr>
                                <tr>
                                    <td>

                                        <table id="tbDepPers">
                                            <thead>
                                                <th align="left"><label class="span6"><b>Personal</b></label>Cantidad</th>                                                                                                   
                                                
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbDepPers" >                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Personal" name="DepPersonal[]" class="span6" <?php echo $readonly; ?> ><input type="number"  name="DepCantidadP[]" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td> <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  placeholder="Personal" name="DepPersonal[]" value="<?php echo @$Form3PersonalD[0]->Personal; ?>" class="span6" <?php echo $readonly; ?> ><input type="number"   placeholder="" value="<?php echo @$Form3PersonalD[0]->Cantidad; ?>" name="DepCantidadP[]"  class="span3" <?php echo $readonly; ?> /></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addDepPers"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                <?php for($i=1; $i<count($Form3PersonalD); $i++){ ?>  
                                                <tr >                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();"  placeholder="Personal" name="DepPersonal[]" value="<?php echo @$Form3PersonalD[$i]->Personal; ?>" class="span6" <?php echo $readonly; ?> ><input type="number"    name="DepCantidadP[]" value="<?php echo @$Form3PersonalD[$i]->Cantidad; ?>" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php }?> 
                                            </tbody>
                                        </table>    
                                        <table id="tbDepLog">
                                            <thead>
                                                <th align="left"><label class="span6"><b>Eq. Logistico </b></label>Cantidad</th>
                                                
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbDepLog">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="DepLogistico[]" class="span6" <?php echo $readonly; ?> ><input type="number"  name="DepCantidadL[]" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="DepLogistico[]" value="<?php echo @$Form3LogisticoD[0]->Logistico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder=""  value="<?php echo @$Form3LogisticoD[0]->Cantidad; ?>" name="DepCantidadL[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addDepLog"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3LogisticoD); $i++){ ?>
                                                <tr >                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="DepLogistico[]" value="<?php echo @$Form3LogisticoD[$i]->Logistico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number"  name="DepCantidadL[]"  value="<?php echo @$Form3LogisticoD[$i]->Cantidad; ?>" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>  
                                                <?php }?>                                               
                                            </tbody>
                                        </table> 
                                        <table id="tbDepTec">
                                            <thead>
                                                <th align="left"><label class="span6"><b>Eq. Tecnologico</b></label>Cantidad</th>                                                                                        
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbDepTec">                                                    
                                                    <td> <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="DepTecnologico[]" class="span6" <?php echo $readonly; ?> ><input type="number" name="DepCantidadT[]" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="DepTecnologico[]" value="<?php echo @$Form3TecnologicoD[0]->Tecnologico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3TecnologicoD[0]->Cantidad; ?>" name="DepCantidadT[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addDepTec"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                <?php  for($i=1; $i<count($Form3TecnologicoD); $i++){ ?>
                                                <tr>                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="DepTecnologico[]" value="<?php echo @$Form3TecnologicoD[$i]->Tecnologico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" name="DepCantidadT[]" value="<?php echo @$Form3TecnologicoD[$i]->Cantidad; ?>" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>  
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table> 
                                        <table id="tbDepMob">
                                            <thead>
                                                <th align="left"> <label class="span6"><b> Mobiliario</b></label>Cantidad</th>                                                                                        
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbDepMob">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Mobiliario" name="DepMobiliario[]" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" name="DepCantidadM[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" placeholder="Mobiliario" name="DepMobiliario[]" value="<?php echo @$Form3MobiliarioD[0]->Mobiliario; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3MobiliarioD[0]->Cantidad; ?>" name="DepCantidadM[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addDepMob"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3MobiliarioD); $i++){ ?>
                                                 <tr>                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Mobiliario" name="DepMobiliario[]" value="<?php echo @$Form3MobiliarioD[$i]->Mobiliario; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3MobiliarioD[$i]->Cantidad; ?>" name="DepCantidadM[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php }?>       
                                            </tbody>
                                        </table>                                         
                                    </td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                 

                                    <td>
                                        <table id="tbNacPers">
                                            <thead>     
                                                <th align="left"><label class="span6"><b>Personal</b></label>Cantidad</th>                                                                                            
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbNacPers">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Personal" name="NacPersonal[]" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" name="NacCantidadP[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Personal" name="NacPersonal[]" value="<?php echo @$Form3PersonalN[0]->Personal; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3PersonalN[0]->Cantidad; ?>" name="NacCantidadP[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addNacPers"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3PersonalN); $i++){ ?>
                                                <tr>                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Personal" name="NacPersonal[]" value="<?php echo @$Form3PersonalN[$i]->Personal; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3PersonalN[$i]->Cantidad; ?>" name="NacCantidadP[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>                                                 
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table>    
                                        <table id="tbNacLog">
                                            <thead >          
                                                <th align="left"><label class="span6"><b>Eq. Logistico</b></label>Cantidad</th>                                      
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbNacLog">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="NacLogistico[]" class="span6" <?php echo $readonly; ?> ><input type="number" name="NacCantidadL[]" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="NacLogistico[]" value="<?php echo @$Form3LogisticoN[0]->Logistico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3LogisticoN[0]->Cantidad; ?>" name="NacCantidadL[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addNacLog"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3LogisticoN); $i++){ ?>
                                                <tr>                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="NacLogistico[]" value="<?php echo @$Form3LogisticoN[$i]->Logistico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" name="NacCantidadL[]" value="<?php echo @$Form3LogisticoN[$i]->Cantidad; ?>" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>                                               
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table> 
                                        <table id="tbNacTec">
                                            <thead>    
                                                <th align="left"><label class="span6"><b>Eq. Tecnologico</b></label>Cantidad</th>                                                
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbNacTec">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="NacTecnologico[]" class="span6" <?php echo $readonly; ?> ><input type="number" name="NacCantidadT[]" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="NacTecnologico[]" value="<?php echo @$Form3TecnologicoN[0]->Tecnologico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3TecnologicoN[0]->Cantidad; ?>" name="NacCantidadT[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addNacTec"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3TecnologicoN); $i++){ ?>
                                                <tr >                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="NacTecnologico[]" value="<?php echo @$Form3TecnologicoN[$i]->Tecnologico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" name="NacCantidadT[]" value="<?php echo @$Form3TecnologicoN[$i]->Cantidad; ?>" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>                                                 
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table> 
                                        <table id="tbNacMob">
                                            <thead>  
                                                 <th align="left"><label class="span6"><b>Mobiliario</b></label>Cantidad</th>                                                                                                                                             
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbNacMob">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Mobiliario" name="NacMobiliario[]" class="span6" <?php echo $readonly; ?> ><input type="number" name="NacCantidadM[]" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Mobiliario" name="NacMobiliario[]" value="<?php echo @$Form3MobiliarioN[0]->Mobiliario; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3MobiliarioN[0]->Cantidad; ?>" name="NacCantidadM[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addNacMob"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3MobiliarioN); $i++){ ?>
                                                <tr>                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Mobiliario" name="NacMobiliario[]" value="<?php echo @$Form3MobiliarioN[$i]->Mobiliario; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" name="NacCantidadM[]" value="<?php echo @$Form3MobiliarioN[$i]->Cantidad; ?>" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>                                            
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table>  
                                    </td>

                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td>
                                      <table id="tbIntPers">
                                            <thead>
                                                <th align="left"><label class="span6"><b>Personal</b></label>Cantidad</th>                                             
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbIntPers">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Personal" name="IntPersonal[]" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" name="IntCantidadP[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Personal" name="IntPersonal[]" value="<?php echo @$Form3PersonalI[0]->Personal; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3PersonalI[0]->Cantidad; ?>" name="IntCantidadP[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addIntPers"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3PersonalI); $i++){ ?>
                                                <tr >                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Personal" name="IntPersonal[]" value="<?php echo @$Form3PersonalI[$i]->Personal; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3PersonalI[$i]->Cantidad; ?>" name="IntCantidadP[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>                                                 
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table>    
                                        <table id="tbIntLog">
                                            <thead>   
                                                <th align="left"><label class="span6"><b>Eq. Logistico </b></label>Cantidad</th>                                                                                           
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbIntLog">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="IntLogistico[]" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" name="IntCantidadL[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="IntLogistico[]" value="<?php echo @$Form3LogisticoI[0]->Logistico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3LogisticoI[0]->Cantidad; ?>" name="IntCantidadL[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addIntLog"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3LogisticoI); $i++){ ?>
                                                <tr>                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Logistico" name="IntLogistico[]" value="<?php echo @$Form3LogisticoI[$i]->Logistico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3LogisticoI[$i]->Cantidad; ?>" name="IntCantidadL[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>                                                 
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table> 
                                        <table id="tbIntTec">
                                            <thead>
                                                <th align="left"><label class="span6"><b>Eq. Tecnologico </b></label>Cantidad</th>                                                 
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbIntTec">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="IntTecnologico[]" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" name="IntCantidadT[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="IntTecnologico[]" value="<?php echo @$Form3TecnologicoI[0]->Tecnologico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3TecnologicoI[0]->Cantidad; ?>" name="IntCantidadT[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addIntTec"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3TecnologicoI); $i++){ ?>
                                                <tr>                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Equipo Tecnologico" name="IntTecnologico[]" value="<?php echo @$Form3TecnologicoI[$i]->Tecnologico; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3TecnologicoI[$i]->Cantidad; ?>" name="IntCantidadT[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>                                                 
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table> 
                                        <table id="tbIntMob">
                                            <thead>    
                                                <th align="left"><label class="span6"><b>Mobiliario</b></label>Cantidad</th>                                                                                              
                                            </thead>
                                            <tbody>
                                                <tr class="fila-tbIntMob">                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Mobiliario" name="IntMobiliario[]" class="span6" <?php echo $readonly; ?> ><input type="number" name="IntCantidadM[]" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>
                                                <tr>                                                
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Mobiliario" name="IntMobiliario[]" value="<?php echo @$Form3MobiliarioI[0]->Mobiliario; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" placeholder="" value="<?php echo @$Form3MobiliarioI[0]->Cantidad; ?>" name="IntCantidadM[]" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td><button type="button" class="btn btn-round-min btn-success" id="addIntMob"/><span><i class="icon-plus-sign"></i></span></button></td>
                                                </tr>
                                                 <?php for($i=1; $i<count($Form3MobiliarioI); $i++){ ?>
                                                <tr >                                                    
                                                    <td><input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Mobiliario" name="IntMobiliario[]" value="<?php echo @$Form3MobiliarioI[$i]->Mobiliario; ?>" class="span6" <?php echo $readonly; ?> ><input type="number" name="IntCantidadM[]" value="<?php echo @$Form3MobiliarioI[$i]->Cantidad; ?>" placeholder="" class="span3" <?php echo $readonly; ?> ></td>                                                    
                                                    <td class="eliminar"><button type="button" class="btn btn-round-min btn-danger"><span><i class="icon-minus-sign"></i></span></button></td>
                                                </tr>                                                 
                                                 <?php }?>                                                 
                                            </tbody>
                                        </table>  
                                    </td>
                                <tr>
                            </table>
                                
                                                 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="content-widgets light-gray">
                        <div class="widget-head blue">
                            <h3>4. Estructura Organizacional</h3>
                        </div>
                        <div class="widget-container">                            
                                <div class="controls-row">
                                    <label class="control-label">Numero de Recursos Humanos</label>
                                    <div class="controls">
                                        <input type="text" name="NumeroRRHH" value="<?php echo @$Form3->NumeroRRHH; ?>" placeholder="Numero de Recursos Humanos" class="span12">
                                    </div>
                                </div>
                                <div class="controls-row">
                                    <label class="control-label">Estructura Organizacional</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo base_url().'index.php/postal/verImagenForm3a/'.$Form3->IdForm3; ?>" alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar</span>
                                                <input type="file" name="FotografiaOrganigrama" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
                                            </div>
                                        </div>
                                    </div>                                                        
                                </div>                             
                                                                                         
                        </div>
                    </div>
                </div>
            </div>                                 
            <div class="form-actions">
                <?php if($boton1!='Guardar'){ ?>
                <button type="button" class="btn btn btn-info" onClick="location.href='<?php echo base_url()."index.php/postal/form2"; ?>';">Formulario Anterior</button>    
                <?php } ?>
                <?php if(!$readonly){ ?>                                
                <?php if($boton1!='Guardar'){ ?>
                <button type="button" onclick="envia('saveForm3/0')" class="btn btn-success"><?php echo $boton1; ?></button>                                                   
                <button type="button"  onclick="envia('saveForm3/1')"class="btn btn-danger"><?php echo $boton2; ?></button>          
                <?php } else { ?>
                <button type="button" onclick="envia('../saveForm3a/1')" class="btn btn-success"><?php echo $boton1; ?></button>                                                   
                <?php } ?>
                <?php } ?>
            </div>  
        </form>
                  
    </div>        
</div>
<?php  $this->load->view('postal/doc_foot');?>

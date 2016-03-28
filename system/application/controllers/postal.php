<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Postal extends Controller {

    function __construct() {
        parent::__construct();
        // load library
        $this->load->library(array('cezpdf','fpdf','table','validation', 'My_PHPMailer','encrypt'));
        
        $this->db = $this->load->database('default', true);
        $this->load->model('postalModel');

        error_reporting(E_ALL);
    }
    function index(){
        //echo 1;fh
        $usu = $this->session->userdata('usuario');
        $cod_per = $this->postalModel->get_all_persona_usuario(2)->row();
        $cod_persona = $cod_per->usuario;     
        //echo $cod_persona;
        $data['tabla']='Saludos desde Postal - Codigo persona: '.$cod_persona ;
        $this->load->view('postal/lista', $data);
    }
function listarUsuarios(){
            $data['action'] = '';
            $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
            $data['mensaje'] = '';  

            $Usuarios = $this->postalModel->getTable0('tb_usuarios','id_rol','4')->result();
            // generate table data
            $this->table->clear();
            $this->load->library('table');
            $this->table->set_empty("&nbsp;");
            $this->table->set_heading('<p>Usuario</p>','<p>Contraseña Temporal</p>', '<p>Nombre Completo</p>', '<p>Estado Tramite</p>' ,'<p> E - Mail </p>','<p>Accion</p>');

            foreach ($Usuarios as $a){
                $Estado='Editable';
                $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$a->id_usuario)->row();
                if($Form1){
                $checklist='';
                $pdf1='';
                $pdf2='';
                if($Form1->Estado==1){
                    $Estado='Cerrado para Edicion';
                    $checklist=anchor('postal/form2c/'."$a->id_usuario",'<img src="../../theme/themeAplicaciones/images/tbl-img/check.png">'.' CheckList-Documentacion');
                }
                if($Form1->Estado==2){
                    $Estado='Proceso Finalizado';
                    $pdf1=anchor('postal/pdfnota/'."$a->id_usuario"."/0",'<img src="../../theme/themeAplicaciones/images/tbl-img/pdf.png">'.' Nota de Respuesta');
                    $pdf2=anchor('postal/pdfnota/'."$a->id_usuario"."/1",'<img src="../../theme/themeAplicaciones/images/tbl-img/pdf.png">'.' Nota de Respuesta');
                }
                    $this->table->add_row($a->usuario,$a->password, $a->descripcion_usuario,$Estado,  $a->email,                                    
                        anchor('postal/modUsuario/'."$a->id_usuario",'<img src="../../theme/themeAplicaciones/images/tbl-img/update.png">'.' Modificar').' '.
                        anchor('postal/form1a/'."$a->id_usuario",'<img src="../../theme/themeAplicaciones/images/tbl-img/view.png">'.' Formulario 1').' '.
                        anchor('postal/form2a/'."$a->id_usuario",'<img src="../../theme/themeAplicaciones/images/tbl-img/view.png">'.' Formulario 2').' '.
                        anchor('postal/form3a/'."$a->id_usuario",'<img src="../../theme/themeAplicaciones/images/tbl-img/view.png">'.' Formulario 3').' '.
                        anchor('postal/pdfddjja/'."$a->id_usuario",'<img src="../../theme/themeAplicaciones/images/tbl-img/print.png">'.' Declaracion Jurada').' '.
                        $checklist.' '.
                        $pdf1.' '.$pdf2
                    );
                }
            }
            $data['table'] = $this->table->generate();
            $data['action'] =  site_url('postal/generarUsuario');
            $data['title'] = "Usuarios";
            $data['usu'] = $usu;
            $xusu=$this->postalModel->get_usu($id_usu)->row();
            $rol=$this->postalModel->get_roles_by_id($id_rol)->row();
            $data['rol']=$xusu->descripcion_usuario.'-'.$rol->Rol;
            $data['id_rol'] = $id_rol;
            $this->load->view('postal/listarUsuarios', $data);
    }
    
    function generarCodigo($longitud) { $key = ''; $pattern = '1234567890abcdefghijklmnopqrstuvwxyz'; $max = strlen($pattern)-1; for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)}; return $key; } 
    function generarUsuario(){
        $datos = array(
                        'Usuario' => '',
                        'password' =>''                 
                    );
        $id=$this->postalModel->saveTable('tb_usuarios',$datos);
        $datos = array(
                        'Usuario' => 'operador'.$id,
                        'password' =>$this->generarCodigo(6),
                        'id_rol'=>3,
                        'estado'=>1         
                    );
        $this->postalModel->updateTable('tb_usuarios',$datos,'id_usuario',$id);
        
        $datos1 = array(    'IdForm1' => $id, 'Estado' => 0);
        $this->postalModel->saveTable('tb_postal_form1',$datos1);   

        $datos2 = array(    'IdForm2' => $id, 'Estado' => 0);
        $this->postalModel->saveTable('tb_postal_form2',$datos2);

        $datos3 = array(    'IdForm3' => $id, 'Estado' => 0);
        $this->postalModel->saveTable('tb_postal_form3',$datos3);

        redirect('postal/listarUsuarios', 'refresh');
    }
    function form1(){
            $usu = $this->session->userdata('usuario');if($usu==false){redirect('/home');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');   

            $data['action'] =  site_url('postal/saveForm1');
            $IdForm=$id_usu;
            $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();
            $data['Form1'] =  $Form1;
            $data['readonly'] ='';
            if($Form1->Estado==1){$data['readonly'] ='readonly';}
            $Form1Servicios = $this->postalModel->getTable0('tb_postal_form1_servicios','IdForm1',$IdForm)->result();
            $data['Form1Servicios'] =  $Form1Servicios;         
            $data['IdForm'] =$IdForm;
            $Departamentos = $this->postalModel->InputSelect('tb_postal_deptos','Nombre_Dep','Sigla_Dep');
            $data['Departamentos'] =$Departamentos;
                        $data['usu'] = $usu;
            $xusu=$this->postalModel->get_usu($id_usu)->row();
            $rol=$this->postalModel->get_roles_by_id($id_rol)->row(); echo $xusu->descripcion_usuario;
            $data['rol']=$xusu->descripcion_usuario.'-'.$rol->Rol;
            $data['id_rol'] = $id_rol;
            $data['botonSgte'] = 'Siguiente Formulario';
            $this->load->view('postal/form1', $data);
    }
    function saveForm1(){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('/home');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
        $IdForm=$this->input->post('IdForm');
        $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();
        if($Form1->Estado==1){redirect('postal/form2', 'refresh');}
        $Servicio=$this->input->post('Servicio');
        $Descripcion=$this->input->post('Descripcion');

        $Servicios = $this->postalModel->getTable0('tb_postal_form1_servicios','IdForm1',$IdForm)->result();
        foreach ($Servicios as $k) {
            $this->postalModel->deleteTable('tb_postal_form1_servicios','IdForm1',$k->IdForm1);
        }
        for($i=1;$i<count($Servicio); $i++){
            $datos = array(
                        'IdForm1'=>$IdForm,
                        'Servicio' =>$Servicio[$i],
                        'Descripcion' =>$Descripcion[$i]
                    );
            $this->postalModel->saveTable('tb_postal_form1_servicios',$datos);
        }
        $datos = array(
                        'NombreEmpresa' => $this->input->post('NombreEmpresa'),
                        'DomicilioPrincipal' => $this->input->post('DomicilioPrincipal'),
                        'Telefono1' => $this->input->post('Telefono1'),
                        'Telefono2' => $this->input->post('Telefono2'),
                        'Telefono3' => $this->input->post('Telefono3'),
                        'Telefono4' => $this->input->post('Telefono4'),
                        'EmailEmpresa' => $this->input->post('EmailEmpresa'),
                        'PaginaWebEmpresa' => $this->input->post('PaginaWebEmpresa'),
                        'NIT' => $this->input->post('NIT'),
                        'FechaEmisionNIT' => $this->input->post('FechaEmisionNIT'),
                        'FUNDEMPRESA' => $this->input->post('FUNDEMPRESA'),
                        'FechaEmisionFE' => $this->input->post('FechaEmisionFE'),
                        'NumeroTestimonio' => $this->input->post('NumeroTestimonio'),
                        'FechaEmisionTestimonio' => $this->input->post('FechaEmisionTestimonio'),
                        'RepresentanteLegal' => $this->input->post('RepresentanteLegal'),
                        'EmailRepresentante' => $this->input->post('EmailRepresentante'),
                        'TelefonoRepresentante' => $this->input->post('TelefonoRepresentante'),
                        'CelularRepresentante' => $this->input->post('CelularRepresentante'),
                        'CedulaIdentidad' => $this->input->post('CedulaIdentidad'),
                        'CedulaExpedido' => $this->input->post('CedulaExpedido'),
                        'NumeroPoder' => $this->input->post('NumeroPoder'),
                        'FechaEmisionPoder' => $this->input->post('FechaEmisionPoder'),
                        'DomicilioNotificaciones' => $this->input->post('DomicilioNotificaciones'),
                        'TelefonoNotificaciones' => $this->input->post('TelefonoNotificaciones'),
                        'EmailNotificaciones' => $this->input->post('EmailNotificaciones'),
                        'ConcesionDerechos' => $this->input->post('ConcesionDerechos'),
                        'ConcesionCheck' => $this->input->post('ConcesionCheck'),                       
                        'FechaRegistro' => date('Y-m-d')                        
                    );
        $this->postalModel->updateTable('tb_postal_form1',$datos,'IdForm1',$IdForm);
        redirect('postal/form2', 'refresh');
    }
    function form2(){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('/home');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
        $IdForm=$id_usu;
        $data['IdForm'] =$IdForm;
        $data['action'] =  site_url('postal/saveForm2');
        $data['Categorias1']=array('Internacional'=>'Internacional',
                                'Nacional'=>'Nacional',
                                'Departamental'=>'Departamental',
                                'Transporte'=>'Transporte');

        $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();

    
            
        $data['Form1'] =  $Form1;
        $Form2 = $this->postalModel->getTable0('tb_postal_form2','IdForm2',$IdForm)->row();
        $data['readonly'] ='';
        if($Form2->Estado==1){$data['readonly'] ='readonly';}

        $data['Form2'] =  $Form2;
        if($Form2->Categoria1=='Internacional'||$Form2->Categoria1=='Nacional'||$Form2->Categoria1=='Departamental'){
            $data['Categorias2']=array('Primera'=>'Primera',
                                'Segunda'=>'Segunda');      
        }
        else {
            $data['Categorias2']=array('Aereo'=>'Aereo',
                                'Terrestre'=>'Terrestre',
                                'Fluvial'=>'Fluvial');  
        }

                    $data['usu'] = $usu;
            $xusu=$this->postalModel->get_usu($id_usu)->row();
            $rol=$this->postalModel->get_roles_by_id($id_rol)->row();
            $data['rol']=$xusu->descripcion_usuario.'-'.$rol->Rol;
            $data['id_rol'] = $id_rol;
            $data['botonSgte'] = 'Siguiente Formulario';
            $data['checklist'] = '';
        $this->load->view('postal/form2', $data);
    }
    function saveForm2(){   
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('/home');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
        $IdForm=$this->input->post('IdForm');
        $Form2 = $this->postalModel->getTable0('tb_postal_form2','IdForm2',$IdForm)->row();
        if($Form2->Estado==1){redirect('postal/form3', 'refresh');}
        $datos = array(
                        'Categoria1' => $this->input->post('Categoria1'),
                        'Categoria2' => $this->input->post('Categoria2'),
                        'Tipo' => $this->input->post('Tipo'),
                        'ReqLegal1' => $this->input->post('ReqLegal1'),
                        'ReqLegal2' => $this->input->post('ReqLegal2'),
                        'ReqLegal3' => $this->input->post('ReqLegal3'),
                        'ReqLegal4' => $this->input->post('ReqLegal4'),
                        'ReqLegal5' => $this->input->post('ReqLegal5'),
                        'ReqLegal6' => $this->input->post('ReqLegal6'),
                        'ReqLegal7' => $this->input->post('ReqLegal7'),
                        'ReqLegal8' => $this->input->post('ReqLegal8'),
                        'ReqLegal9' => $this->input->post('ReqLegal9'),
                        'RefFinanciero1' => $this->input->post('RefFinanciero1'),
                        'RefFinanciero2' => $this->input->post('RefFinanciero2'),
                        'RefFinanciero3' => $this->input->post('RefFinanciero3'),
                        'RefFinanciero4' => $this->input->post('RefFinanciero4'),
                        'RefFinanciero5' => $this->input->post('RefFinanciero5'),
                        'RefFinanciero6' => $this->input->post('RefFinanciero6')                    
                    );
        $this->postalModel->updateTable('tb_postal_form2',$datos,'IdForm2',$IdForm);
        redirect('postal/form3', 'refresh');
    }   
    function form3(){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('/home');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
        $IdForm=$id_usu;
        $Form3 = $this->postalModel->getTable0('tb_postal_form3','IdForm3',$IdForm)->row();
        $data['readonly'] ='';
        if($Form3->Estado==1){$data['readonly'] ='readonly';}
        $Form3OA = $this->postalModel->getTable0('tb_postal_form3_ofap','IdForm3',$IdForm)->result();
        //echo count($Form3OA);
        //echo var_dump($Form3OA[0]->NombreFFOA); //echo 1;
        //echo var_dump($Form3OA[1]->NombreFFOA); //echo 1;
        $data['Form3'] =  $Form3;
        $data['Form3OA'] =  $Form3OA;
        $data['IdForm'] =$IdForm; 
        $data['selectMaps']=array('0'=>'0',
                                '1'=>'1',
                                '2'=>'2',
                                '3'=>'3',
                                '4'=>'4',
                                '5'=>'5',
                                '6'=>'6',
                                '7'=>'7',
                                '8'=>'8',
                                '9'=>'9');
        $data['action1'] =  site_url('postal/saveForm3');
        $data['action2'] =  site_url('postal/saveForm32222');
        $Departamentos = $this->postalModel->InputSelect('tb_postal_deptos','Nombre_Dep','Nombre_Dep');
        $data['Departamentos'] =$Departamentos;

        $Form3PersonalD = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Departamental')->result();
        $data['Form3PersonalD'] =  $Form3PersonalD;
        $Form3LogisticoD = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Departamental')->result();
        $data['Form3LogisticoD'] =  $Form3LogisticoD;
        $Form3TecnologicoD = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Departamental')->result();
        $data['Form3TecnologicoD'] =  $Form3TecnologicoD;
        $Form3MobiliarioD = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Departamental')->result();
        $data['Form3MobiliarioD'] =  $Form3MobiliarioD;     

        $Form3PersonalN = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Nacional')->result();
        $data['Form3PersonalN'] =  $Form3PersonalN;
        $Form3LogisticoN = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Nacional')->result();
        $data['Form3LogisticoN'] =  $Form3LogisticoN;
        $Form3TecnologicoN = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Nacional')->result();
        $data['Form3TecnologicoN'] =  $Form3TecnologicoN;
        $Form3MobiliarioN = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Nacional')->result();
        $data['Form3MobiliarioN'] =  $Form3MobiliarioN;

        $Form3PersonalI = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Internacional')->result();
        $data['Form3PersonalI'] =  $Form3PersonalI;
        $Form3LogisticoI = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Internacional')->result();
        $data['Form3LogisticoI'] =  $Form3LogisticoI;
        $Form3TecnologicoI = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Internacional')->result();
        $data['Form3TecnologicoI'] =  $Form3TecnologicoI;
        $Form3MobiliarioI = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Internacional')->result();
        $data['Form3MobiliarioI'] =  $Form3MobiliarioI;


            $data['usu'] = $usu;
            $xusu=$this->postalModel->get_usu($id_usu)->row();
            $rol=$this->postalModel->get_roles_by_id($id_rol)->row();
            $data['rol']=$xusu->descripcion_usuario.'-'.$rol->Rol;
            $data['id_rol'] = $id_rol;
                        $data['boton1'] = 'Guardar y Seguir Editanto (Ver DECLARACION JURADA)';
            $data['boton2'] = 'Guardar y Cerrar Formularios (Ver DECLARACION JURADA)';
        $this->load->view('postal/form3', $data);
    }
    function saveForm3($Estado){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('/home');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
        $IdForm=$this->input->post('IdForm');
        $Form3 = $this->postalModel->getTable0('tb_postal_form3','IdForm3',$IdForm)->row();
        //PARA LAS OFICINAS DE APOYO
        $OficinaApoyo = $this->postalModel->getTable0('tb_postal_form3_ofap','IdForm3',$IdForm)->result();
        foreach ($OficinaApoyo as $k) { //vacio los campos
            //$this->postalModel->deleteTable('tb_postal_form3_ofap','IdForm3',$IdForm);
        }
        $OficinaOA=$this->input->post('OficinaOA');
        $DireccionOA=$this->input->post('DireccionOA');
        $DepartamentoOA=$this->input->post('DepartamentoOA');
        $LatitudOA=$this->input->post('LatitudOA');
        $LongitudOA=$this->input->post('LongitudOA');
        //$FotografiaFrontisOA=$this->input->post('FotografiaFrontisOA');
            //Fotografia Secundarios
                $nombre = $_FILES['FotografiaFrontisOA']['name'];
                $imagen='';
                //if($nombre){
                    $imagen_temporal = $_FILES['FotografiaFrontisOA']['tmp_name'];
                    $type = $_FILES['FotografiaFrontisOA']['type'];                                 
                //}
                //$itmp=array();
                $imagen=array();
        if($this->input->post('selectMaps')!=0){
            for($i=0;$i<$this->input->post('selectMaps'); $i++){    //agrego los nuevos campos
                $OficinaApoyo = $this->postalModel->getTable0('tb_postal_form3_ofap','IdForm3',$IdForm)->result();              
                //echo var_dump($OficinaApoyo);
                if($OficinaApoyo[$i]->Id){
                    if($nombre[$i]!=''){
                        $itmp[$i] = fopen($imagen_temporal[$i], 'r+b');
                        $imagen[$i] = fread($itmp[$i], filesize($imagen_temporal[$i]));
                        fclose($itmp[$i]);
                        $datosA = array('FotografiaFrontisOA' =>$imagen[$i],
                                        'TipoFFOA' => $type[$i],
                                        'NombreFFOA' => $nombre[$i]);
                    }
                    else {
                        $datosA = array( );
                    }
                
                    $datosB = array(
                                'IdForm3'=>$IdForm,
                                'OficinaOA' =>$OficinaOA[$i],
                                'DireccionOA' =>$DireccionOA[$i],
                                'DepartamentoOA' =>$DepartamentoOA[$i],
                                'LatitudOA' =>$LatitudOA[$i],
                                'LongitudOA' =>$LongitudOA[$i]                          
                            );
                    $datos =array_merge($datosA,$datosB);
                    $this->postalModel->updateTable('tb_postal_form3_ofap',$datos,'Id',$OficinaApoyo[$i]->Id);          
                }
                else{
                    if($nombre[$i]!=''){
                        $itmp[$i] = fopen($imagen_temporal[$i], 'r+b');
                        $imagen[$i] = fread($itmp[$i], filesize($imagen_temporal[$i]));
                        fclose($itmp[$i]);
                        $datosA = array('FotografiaFrontisOA' =>$imagen[$i],
                                        'TipoFFOA' => $type[$i],
                                        'NombreFFOA' => $nombre[$i]);
                    }
                    else {
                        $datosA = array( );
                    }
                
                    $datosB = array(
                                'IdForm3'=>$IdForm,
                                'OficinaOA' =>$OficinaOA[$i],
                                'DireccionOA' =>$DireccionOA[$i],
                                'DepartamentoOA' =>$DepartamentoOA[$i],
                                'LatitudOA' =>$LatitudOA[$i],
                                'LongitudOA' =>$LongitudOA[$i]                          
                            );
                    $datos =array_merge($datosA,$datosB);
                    $this->postalModel->saveTable('tb_postal_form3_ofap',$datos);                           
                }
                
            }
        }
        //PARA DEPARTAMENTAL-PERSONAL
        $Personal = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Departamental')->result();
        foreach ($Personal as $k) { //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_pers','IdForm3',$IdForm);
        }
        $DepPersonal=$this->input->post('DepPersonal');
        $DepCantidadP=$this->input->post('DepCantidadP');
        for($i=1;$i<count($DepPersonal); $i++){ //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Personal' =>$DepPersonal[$i],
                        'Cantidad' =>$DepCantidadP[$i],
                        'Tipo' =>'Departamental'
                    );
            $this->postalModel->saveTable('tb_postal_form3_pers',$datos);
        }
        //PARA DEPARTAMENTAL-LOGISTICO
        $Logistico = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Departamental')->result();
        foreach ($Logistico as $k) {    //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_log','IdForm3',$IdForm);
        }
        $DepLogistico=$this->input->post('DepLogistico');
        $DepCantidadL=$this->input->post('DepCantidadL');
        for($i=1;$i<count($DepCantidadL); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Logistico' =>$DepLogistico[$i],
                        'Cantidad' =>$DepCantidadL[$i],
                        'Tipo' =>'Departamental'
                    );
            $this->postalModel->saveTable('tb_postal_form3_log',$datos);
        }
        //PARA DEPARTAMENTAL-TECNOLOGICO
        $Tecnologico = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Departamental')->result();
        foreach ($Tecnologico as $k) {  //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_tec','IdForm3',$IdForm);
        }
        $DepTecnologico=$this->input->post('DepTecnologico');
        $DepCantidadT=$this->input->post('DepCantidadT');
        for($i=1;$i<count($DepCantidadT); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Tecnologico' =>$DepTecnologico[$i],
                        'Cantidad' =>$DepCantidadT[$i],
                        'Tipo' =>'Departamental'
                    );
            $this->postalModel->saveTable('tb_postal_form3_tec',$datos);
        }   
        //PARA DEPARTAMENTAL-MOBILIARIO
        $Mobiliario = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Departamental')->result();
        foreach ($Mobiliario as $k) {   //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_mob','IdForm3',$IdForm);
        }
        $DepMobiliario=$this->input->post('DepMobiliario');
        $DepCantidadM=$this->input->post('DepCantidadM');
        for($i=1;$i<count($DepCantidadM); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Mobiliario' =>$DepMobiliario[$i],
                        'Cantidad' =>$DepCantidadM[$i],
                        'Tipo' =>'Departamental'
                    );
            $this->postalModel->saveTable('tb_postal_form3_mob',$datos);
        }
        //PARA NACIONAL-PERSONAL
        $Personal = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Nacional')->result();
        foreach ($Personal as $k) { //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_pers','IdForm3',$IdForm);
        }
        $NacPersonal=$this->input->post('NacPersonal');
        $NacCantidadP=$this->input->post('NacCantidadP');
        for($i=1;$i<count($NacPersonal); $i++){ //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Personal' =>$NacPersonal[$i],
                        'Cantidad' =>$NacCantidadP[$i],
                        'Tipo' =>'Nacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_pers',$datos);
        }
        //PARA NACIONAL-LOGISTICO
        $Logistico = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Nacional')->result();
        foreach ($Logistico as $k) {    //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_log','IdForm3',$IdForm);
        }
        $NacLogistico=$this->input->post('NacLogistico');
        $NacCantidadL=$this->input->post('NacCantidadL');
        for($i=1;$i<count($NacLogistico); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Logistico' =>$NacLogistico[$i],
                        'Cantidad' =>$NacCantidadL[$i],
                        'Tipo' =>'Nacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_log',$datos);
        }
        //PARA NACIONAL-TECNOLOGICO
        $Tecnologico = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Nacional')->result();
        foreach ($Tecnologico as $k) {  //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_tec','IdForm3',$IdForm);
        }
        $NacTecnologico=$this->input->post('NacTecnologico');
        $NacCantidadT=$this->input->post('NacCantidadT');
        for($i=1;$i<count($NacTecnologico); $i++){  //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Tecnologico' =>$NacTecnologico[$i],
                        'Cantidad' =>$NacCantidadT[$i],
                        'Tipo' =>'Nacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_tec',$datos);
        }   
        //PARA NACIONAL-MOBILIARIO
        $Mobiliario = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Nacional')->result();
        foreach ($Mobiliario as $k) {   //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_mob','IdForm3',$IdForm);
        }
        $NacMobiliario=$this->input->post('NacMobiliario');
        $NacCantidadM=$this->input->post('NacCantidadM');
        for($i=1;$i<count($NacMobiliario); $i++){   //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Mobiliario' =>$NacMobiliario[$i],
                        'Cantidad' =>$NacCantidadM[$i],
                        'Tipo' =>'Nacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_mob',$datos);
        }   
        //PARA INTERNACIONAL-PERSONAL
        $Personal = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Internacional')->result();
        foreach ($Personal as $k) { //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_pers','IdForm3',$IdForm);
        }
        $IntPersonal=$this->input->post('IntPersonal');
        $IntCantidadP=$this->input->post('IntCantidadP');
        for($i=1;$i<count($IntPersonal); $i++){ //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Personal' =>$IntPersonal[$i],
                        'Cantidad' =>$IntCantidadP[$i],
                        'Tipo' =>'Internacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_pers',$datos);
        }
        //PARA INTERNACIONAL-LOGISTICO
        $Logistico = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Internacional')->result();
        foreach ($Logistico as $k) {    //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_log','IdForm3',$IdForm);
        }
        $IntLogistico=$this->input->post('IntLogistico');
        $IntCantidadL=$this->input->post('IntCantidadL');
        for($i=1;$i<count($IntCantidadL); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Logistico' =>$IntLogistico[$i],
                        'Cantidad' =>$IntCantidadL[$i],
                        'Tipo' =>'Internacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_log',$datos);
        }
        //PARA INTERNACIONAL-TECNOLOGICO
        $Tecnologico = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Internacional')->result();
        foreach ($Tecnologico as $k) {  //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_tec','IdForm3',$IdForm);
        }
        $IntTecnologico=$this->input->post('IntTecnologico');
        $IntCantidadT=$this->input->post('IntCantidadT');
        for($i=1;$i<count($IntTecnologico); $i++){  //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Tecnologico' =>$IntTecnologico[$i],
                        'Cantidad' =>$IntCantidadT[$i],
                        'Tipo' =>'Internacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_tec',$datos);
        }   
        //PARA INTERNACIONAL-MOBILIARIO
        $Mobiliario = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Internacional')->result();
        foreach ($Mobiliario as $k) {   //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_mob','IdForm3',$IdForm);
        }
        $IntMobiliario=$this->input->post('IntMobiliario');
        $IntCantidadM=$this->input->post('IntCantidadM');
        for($i=1;$i<count($IntCantidadM); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Mobiliario' =>$IntMobiliario[$i],
                        'Cantidad' =>$IntCantidadM[$i],
                        'Tipo' =>'Internacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_mob',$datos);
        }       
        // LO DEMAS     
        //Fotografia FRONTIS principal
        $nombre = $_FILES['FotografiaFrontis']['name'];
        echo $nombre;
        $imagen='';
        if($nombre){
            $imagen_temporal = $_FILES['FotografiaFrontis']['tmp_name'];
            $type1 = $_FILES['FotografiaFrontis']['type'];
            $itmp = fopen($imagen_temporal, 'r+b');
            $imagen = fread($itmp, filesize($imagen_temporal));
            fclose($itmp);  
            $datosA = array(
                        'FotografiaFrontis' => $imagen,
                        'TipoFF' => $type1);            
        }
        else {
            $datosA = array( );
        }
        //Fotografia ORGANIGRAMA 
        $nombreFO = $_FILES['FotografiaOrganigrama']['name'];
        $imagenFO='';
        if($nombreFO){
            $imagen_temporalFO = $_FILES['FotografiaOrganigrama']['tmp_name'];
            $typeFO = $_FILES['FotografiaOrganigrama']['type'];
            $itmpFO = fopen($imagen_temporalFO, 'r+b');
            $imagenFO = fread($itmpFO, filesize($imagen_temporalFO));
            fclose($itmpFO);    
            $datosB = array(
                        'FotografiaOrganigrama' => $imagenFO,
                        'TipoFO' => $typeFO);   
        }
        else {
            $datosB = array( );
        }

        $datosC = array(
                        'DomicilioPrincipal' => $this->input->post('DomicilioPrincipal'),
                        'CiudadCapital' => $this->input->post('CiudadCapital'),
                        'Departamento' => $this->input->post('Departamento'),
                        'Latitud' => $this->input->post('Latitud'),
                        'Longitud' => $this->input->post('Longitud'),                       
                        'NumeroRRHH' => $this->input->post('NumeroRRHH')            
                    );  
        $datos =array_merge($datosA,$datosB,$datosC);
        $this->postalModel->updateTable('tb_postal_form3',$datos,'IdForm3',$IdForm);

        if($Estado==1){
            $datos = array('Estado' => $Estado);    
            $this->postalModel->updateTable('tb_postal_form3',$datos,'IdForm3',$IdForm);
            $this->postalModel->updateTable('tb_postal_form2',$datos,'IdForm2',$IdForm);
            $this->postalModel->updateTable('tb_postal_form1',$datos,'IdForm1',$IdForm);
        }
        //echo $this->input->post('boton1');
        redirect('postal/form3', 'refresh');
    }
    function pdfddjj(){
            //$IdForm1=68;
            $usu = $this->session->userdata('usuario');if($usu==false){redirect('/home');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
            $IdForm=$id_usu;
            $data['action'] =  site_url('postal/save_usuarios1/');
            $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();
            $Form2 = $this->postalModel->getTable0('tb_postal_form2','IdForm2',$IdForm)->row();
            $Form3OA = $this->postalModel->getTable0('tb_postal_form3_ofap','IdForm3',$IdForm)->result();
            $Form1S = $this->postalModel->getTable0('tb_postal_form1_servicios','IdForm1',$IdForm)->result();
            $data['mensaje'] = '';
            //echo realpath("");
            //$file_pdf=realpath("")."\modelo.pdf";
            $file_pdf="files/ddjj1.pdf";
            require_once('pdf/fpdi.php');
            $pdf = new FPDI('P','mm','letter');// initiate FPDI
            $num_pag=$pdf->setSourceFile($file_pdf);    // set the sourcefile //devuelve el numero de paginas
            $pdf->AddPage();// add a page
            $tplIdx = $pdf->importPage(1);// import page 1
            $pdf->useTemplate($tplIdx, 0, 0);// use the imported page and place it at point 10,10 with a width of 100 mm
            // now write some text above the imported page          
            $pdf->SetTextColor(0,0,0);
            


            $pdf->SetFont('Arial','B',12);
            $pdf->SetXY(151,60);
            $pdf->Cell(10,10,date('d-m-Y'),0,0,'C');
            

    

            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(29,89);         
            $pdf->Cell(10,15,$Form1->RepresentanteLegal,0,0,'L');

            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(160,89);            
            $pdf->Cell(10,15,$Form1->CedulaIdentidad,0,0,'L');

            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(45,96);         
            $pdf->Cell(10,15,$Form1->CedulaExpedido,0,0,'L');



            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(112,96);            
            $pdf->Cell(10,15,'Representante Legal',0,0,'L');


            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(19,135);            
            $pdf->Cell(10,15,'Resumen:',0,0,'L');

            $pdf->SetFont('Arial','',9);

            $pdf->SetXY(19,140);            
            $pdf->Cell(10,15,'Razon Social',0,0,'L');
            $pdf->SetXY(75,140);            
            $pdf->Cell(10,15,': '.$Form1->NombreEmpresa,0,0,'L');

            $pdf->SetXY(19,145);            
            $pdf->Cell(10,15,'Domicilio Principal',0,0,'L');
            $pdf->SetXY(75,145);            
            $pdf->Cell(10,15,': '.$Form1->DomicilioPrincipal,0,0,'L');

            $pdf->SetXY(19,150);            
            $pdf->Cell(10,15,'Identificacion de Servicios',0,0,'L');
            $pdf->SetXY(75,150);            
            $pdf->Cell(10,15,': '.count($Form1S),0,0,'L');


            $pdf->SetXY(19,155);            
            $pdf->Cell(10,15,'Nombre del Representante Legal',0,0,'L');
            $pdf->SetXY(75,155);            
            $pdf->Cell(10,15,': '.$Form1->RepresentanteLegal,0,0,'L');
            

            $pdf->SetXY(19,160);            
            $pdf->Cell(10,15,'Categoria de Licencia a Solicitar',0,0,'L');
            $pdf->SetXY(75,160);            
            $pdf->Cell(10,15,': '.$Form2->Categoria1.' - '.$Form2->Categoria2.' - '.$Form2->Tipo,0,0,'L');

            $pdf->SetXY(19,165);            
            $pdf->Cell(10,15,'Requistos Legales',0,0,'L');
            $pdf->SetXY(75,165);            
            $pdf->Cell(10,15,': Llenado',0,0,'L');

            $pdf->SetXY(19,170);            
            $pdf->Cell(10,15,'Requistos Financieros',0,0,'L');          
            $pdf->SetXY(75,170);            
            $pdf->Cell(10,15,': Llenado',0,0,'L');
            
            $pdf->SetXY(19,175);            
            $pdf->Cell(10,15,'Ubicacion Casa Matriz',0,0,'L');
            $pdf->SetXY(75,175);            
            $pdf->Cell(10,15,': Llenado',0,0,'L');          

            $pdf->SetXY(19,180);            
            $pdf->Cell(10,15,'Oficinas de Apoyo',0,0,'L');
            $pdf->SetXY(75,180);            
            $pdf->Cell(10,15,': '.count($Form3OA),0,0,'L');



        

            $pdf->Output("Declaracion Jurada.pdf", 'D');    
            //redirect('postal/form3', 'refresh');
            //echo "<script languaje='javascript' type='text/javascript'>window.opener.location.reload();window.close();</script>";
    }       
    function form1a($id_usu){
            $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            //$id_usu = $this->session->userdata('id_usuario'); 

            $data['action'] =  site_url('postal/saveForm1a');
            $IdForm=$id_usu;
            $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();
            $data['Form1'] =  $Form1;
            $data['readonly'] ='';
            if($Form1->Estado==2){
                $data['readonly'] ='readonly';
            }
            $Form1Servicios = $this->postalModel->getTable0('tb_postal_form1_servicios','IdForm1',$IdForm)->result();
            $data['Form1Servicios'] =  $Form1Servicios;         
            $data['IdForm'] =$IdForm;
            $Departamentos = $this->postalModel->InputSelect('tb_postal_deptos','Nombre_Dep','Sigla_Dep');
            $data['Departamentos'] =$Departamentos;
                        $data['usu'] = $usu;
            $xusu=$this->postalModel->get_usu($id_usu)->row();
            $rol=$this->postalModel->get_roles_by_id($id_rol)->row();
            $data['rol']=$xusu->descripcion_usuario.'-'.$rol->Rol;
            $data['id_rol'] = $id_rol;
            $data['botonSgte'] = 'Guardar Formulario';
            $this->load->view('postal/form1', $data);
    }
    function saveForm1a(){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
        $IdForm=$this->input->post('IdForm');
        $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();

        $Servicio=$this->input->post('Servicio');
        $Descripcion=$this->input->post('Descripcion');

        $Servicios = $this->postalModel->getTable0('tb_postal_form1_servicios','IdForm1',$IdForm)->result();
        foreach ($Servicios as $k) {
            $this->postalModel->deleteTable('tb_postal_form1_servicios','IdForm1',$k->IdForm1);
        }
        for($i=1;$i<count($Servicio); $i++){
            $datos = array(
                        'IdForm1'=>$IdForm,
                        'Servicio' =>$Servicio[$i],
                        'Descripcion' =>$Descripcion[$i]
                    );
            $this->postalModel->saveTable('tb_postal_form1_servicios',$datos);
        }
        $datos = array(
                        'NombreEmpresa' => $this->input->post('NombreEmpresa'),
                        'DomicilioPrincipal' => $this->input->post('DomicilioPrincipal'),
                        'Telefono1' => $this->input->post('Telefono1'),
                        'Telefono2' => $this->input->post('Telefono2'),
                        'Telefono3' => $this->input->post('Telefono3'),
                        'Telefono4' => $this->input->post('Telefono4'),
                        'EmailEmpresa' => $this->input->post('EmailEmpresa'),
                        'PaginaWebEmpresa' => $this->input->post('PaginaWebEmpresa'),
                        'NIT' => $this->input->post('NIT'),
                        'FechaEmisionNIT' => $this->input->post('FechaEmisionNIT'),
                        'FUNDEMPRESA' => $this->input->post('FUNDEMPRESA'),
                        'FechaEmisionFE' => $this->input->post('FechaEmisionFE'),
                        'NumeroTestimonio' => $this->input->post('NumeroTestimonio'),
                        'FechaEmisionTestimonio' => $this->input->post('FechaEmisionTestimonio'),
                        'RepresentanteLegal' => $this->input->post('RepresentanteLegal'),
                        'EmailRepresentante' => $this->input->post('EmailRepresentante'),
                        'TelefonoRepresentante' => $this->input->post('TelefonoRepresentante'),
                        'CelularRepresentante' => $this->input->post('CelularRepresentante'),
                        'CedulaIdentidad' => $this->input->post('CedulaIdentidad'),
                        'CedulaExpedido' => $this->input->post('CedulaExpedido'),
                        'NumeroPoder' => $this->input->post('NumeroPoder'),
                        'FechaEmisionPoder' => $this->input->post('FechaEmisionPoder'),
                        'DomicilioNotificaciones' => $this->input->post('DomicilioNotificaciones'),
                        'TelefonoNotificaciones' => $this->input->post('TelefonoNotificaciones'),
                        'EmailNotificaciones' => $this->input->post('EmailNotificaciones'),
                        'ConcesionDerechos' => $this->input->post('ConcesionDerechos'),
                        'ConcesionCheck' => $this->input->post('ConcesionCheck'),                       
                        'FechaRegistro' => date('Y-m-d')                        
                    );
        $this->postalModel->updateTable('tb_postal_form1',$datos,'IdForm1',$IdForm);
        redirect('postal/listarUsuarios', 'refresh');
    }
    function form2a($id_usu){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            //$id_usu = $this->session->userdata('id_usuario');
        $IdForm=$id_usu;
        $data['IdForm'] =$IdForm;
        $data['action'] =  site_url('postal/saveForm2a');
        $data['Categorias1']=array('Internacional'=>'Internacional',
                                'Nacional'=>'Nacional',
                                'Departamental'=>'Departamental',
                                'Transporte'=>'Transporte');

        $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();

    
            
        $data['Form1'] =  $Form1;
        $Form2 = $this->postalModel->getTable0('tb_postal_form2','IdForm2',$IdForm)->row();
        $data['readonly'] ='';
            if($Form2->Estado==2){
                $data['readonly'] ='readonly';
            }

        $data['Form2'] =  $Form2;
        if($Form2->Categoria1=='Internacional'||$Form2->Categoria1=='Nacional'||$Form2->Categoria1=='Departamental'){
            $data['Categorias2']=array('Primera'=>'Primera',
                                'Segunda'=>'Segunda');      
        }
        else {
            $data['Categorias2']=array('Aereo'=>'Aereo',
                                'Terrestre'=>'Terrestre',
                                'Fluvial'=>'Fluvial');  
        }

                    $data['usu'] = $usu;
            $xusu=$this->postalModel->get_usu($id_usu)->row();
            $rol=$this->postalModel->get_roles_by_id($id_rol)->row();
            $data['rol']=$xusu->descripcion_usuario.'-'.$rol->Rol;
            $data['id_rol'] = $id_rol;
            $data['botonSgte'] = 'Guardar Formulario';
            $data['checklist'] = '';
        $this->load->view('postal/form2', $data);
    }
    function saveForm2a(){  
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
        $IdForm=$this->input->post('IdForm');
        $Form2 = $this->postalModel->getTable0('tb_postal_form2','IdForm2',$IdForm)->row();
        $datos = array(
                        'Categoria1' => $this->input->post('Categoria1'),
                        'Categoria2' => $this->input->post('Categoria2'),
                        'Tipo' => $this->input->post('Tipo'),
                        'ReqLegal1' => $this->input->post('ReqLegal1'),
                        'ReqLegal2' => $this->input->post('ReqLegal2'),
                        'ReqLegal3' => $this->input->post('ReqLegal3'),
                        'ReqLegal4' => $this->input->post('ReqLegal4'),
                        'ReqLegal5' => $this->input->post('ReqLegal5'),
                        'ReqLegal6' => $this->input->post('ReqLegal6'),
                        'ReqLegal7' => $this->input->post('ReqLegal7'),
                        'ReqLegal8' => $this->input->post('ReqLegal8'),
                        'ReqLegal9' => $this->input->post('ReqLegal9'),
                        'RefFinanciero1' => $this->input->post('RefFinanciero1'),
                        'RefFinanciero2' => $this->input->post('RefFinanciero2'),
                        'RefFinanciero3' => $this->input->post('RefFinanciero3'),
                        'RefFinanciero4' => $this->input->post('RefFinanciero4'),
                        'RefFinanciero5' => $this->input->post('RefFinanciero5'),
                        'RefFinanciero6' => $this->input->post('RefFinanciero6')                    
                    );
        $this->postalModel->updateTable('tb_postal_form2',$datos,'IdForm2',$IdForm);
        redirect('postal/listarUsuarios', 'refresh');
    }   
    function form3a($id_usu){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            //$id_usu = $this->session->userdata('id_usuario');
        $IdForm=$id_usu;
        $Form3 = $this->postalModel->getTable0('tb_postal_form3','IdForm3',$IdForm)->row();
        $data['readonly'] ='';
                    if($Form3->Estado==2){
                $data['readonly'] ='readonly';
            }
        $Form3OA = $this->postalModel->getTable0('tb_postal_form3_ofap','IdForm3',$IdForm)->result();
        //echo count($Form3OA);
        //echo var_dump($Form3OA[0]->NombreFFOA); //echo 1;
        //echo var_dump($Form3OA[1]->NombreFFOA); //echo 1;
        $data['Form3'] =  $Form3;
        $data['Form3OA'] =  $Form3OA;
        $data['IdForm'] =$IdForm; 
        $data['selectMaps']=array('0'=>'0',
                                '1'=>'1',
                                '2'=>'2',
                                '3'=>'3',
                                '4'=>'4',
                                '5'=>'5',
                                '6'=>'6',
                                '7'=>'7',
                                '8'=>'8',
                                '9'=>'9');
        $data['action1'] =  site_url('postal/saveForm3a');
        $data['action2'] =  site_url('postal/saveForm32222');
        $Departamentos = $this->postalModel->InputSelect('tb_postal_deptos','Nombre_Dep','Nombre_Dep');
   
        $data['Departamentos'] =$Departamentos;

        $Form3PersonalD = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Departamental')->result();
        $data['Form3PersonalD'] =  $Form3PersonalD;
        $Form3LogisticoD = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Departamental')->result();
        $data['Form3LogisticoD'] =  $Form3LogisticoD;
        $Form3TecnologicoD = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Departamental')->result();
        $data['Form3TecnologicoD'] =  $Form3TecnologicoD;
        $Form3MobiliarioD = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Departamental')->result();
        $data['Form3MobiliarioD'] =  $Form3MobiliarioD;     

        $Form3PersonalN = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Nacional')->result();
        $data['Form3PersonalN'] =  $Form3PersonalN;
        $Form3LogisticoN = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Nacional')->result();
        $data['Form3LogisticoN'] =  $Form3LogisticoN;
        $Form3TecnologicoN = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Nacional')->result();
        $data['Form3TecnologicoN'] =  $Form3TecnologicoN;
        $Form3MobiliarioN = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Nacional')->result();
        $data['Form3MobiliarioN'] =  $Form3MobiliarioN;

        $Form3PersonalI = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Internacional')->result();
        $data['Form3PersonalI'] =  $Form3PersonalI;
        $Form3LogisticoI = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Internacional')->result();
        $data['Form3LogisticoI'] =  $Form3LogisticoI;
        $Form3TecnologicoI = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Internacional')->result();
        $data['Form3TecnologicoI'] =  $Form3TecnologicoI;
        $Form3MobiliarioI = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Internacional')->result();
        $data['Form3MobiliarioI'] =  $Form3MobiliarioI;


            $data['usu'] = $usu;
            $xusu=$this->postalModel->get_usu($id_usu)->row();
            $rol=$this->postalModel->get_roles_by_id($id_rol)->row();
            $data['rol']=$xusu->descripcion_usuario.'-'.$rol->Rol;
            $data['id_rol'] = $id_rol;
            $data['boton1'] = 'Guardar';
            $data['boton2'] = '';
        $this->load->view('postal/form3', $data);
    }
    function saveForm3a($Estado){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            $id_usu = $this->session->userdata('id_usuario');
        $IdForm=$this->input->post('IdForm');
        $Form3 = $this->postalModel->getTable0('tb_postal_form3','IdForm3',$IdForm)->row();
        //PARA LAS OFICINAS DE APOYO
        $OficinaApoyo = $this->postalModel->getTable0('tb_postal_form3_ofap','IdForm3',$IdForm)->result();
        foreach ($OficinaApoyo as $k) { //vacio los campos
            //$this->postalModel->deleteTable('tb_postal_form3_ofap','IdForm3',$IdForm);
        }
        $OficinaOA=$this->input->post('OficinaOA');
        $DireccionOA=$this->input->post('DireccionOA');
        $DepartamentoOA=$this->input->post('DepartamentoOA');
        $LatitudOA=$this->input->post('LatitudOA');
        $LongitudOA=$this->input->post('LongitudOA');
        //$FotografiaFrontisOA=$this->input->post('FotografiaFrontisOA');
            //Fotografia Secundarios
                $nombre = $_FILES['FotografiaFrontisOA']['name'];
                $imagen='';
                //if($nombre){
                    $imagen_temporal = $_FILES['FotografiaFrontisOA']['tmp_name'];
                    $type = $_FILES['FotografiaFrontisOA']['type'];                                 
                //}
                //$itmp=array();
                $imagen=array();
        if($this->input->post('selectMaps')!=0){
            for($i=0;$i<$this->input->post('selectMaps'); $i++){    //agrego los nuevos campos
                $OficinaApoyo = $this->postalModel->getTable0('tb_postal_form3_ofap','IdForm3',$IdForm)->result();              
                //echo var_dump($OficinaApoyo);
                if($OficinaApoyo[$i]->Id){
                    if($nombre[$i]!=''){
                        $itmp[$i] = fopen($imagen_temporal[$i], 'r+b');
                        $imagen[$i] = fread($itmp[$i], filesize($imagen_temporal[$i]));
                        fclose($itmp[$i]);
                        $datosA = array('FotografiaFrontisOA' =>$imagen[$i],
                                        'TipoFFOA' => $type[$i],
                                        'NombreFFOA' => $nombre[$i]);
                    }
                    else {
                        $datosA = array( );
                    }
                
                    $datosB = array(
                                'IdForm3'=>$IdForm,
                                'OficinaOA' =>$OficinaOA[$i],
                                'DireccionOA' =>$DireccionOA[$i],
                                'DepartamentoOA' =>$DepartamentoOA[$i],
                                'LatitudOA' =>$LatitudOA[$i],
                                'LongitudOA' =>$LongitudOA[$i]                          
                            );
                    $datos =array_merge($datosA,$datosB);
                    $this->postalModel->updateTable('tb_postal_form3_ofap',$datos,'Id',$OficinaApoyo[$i]->Id);          
                }
                else{
                    if($nombre[$i]!=''){
                        $itmp[$i] = fopen($imagen_temporal[$i], 'r+b');
                        $imagen[$i] = fread($itmp[$i], filesize($imagen_temporal[$i]));
                        fclose($itmp[$i]);
                        $datosA = array('FotografiaFrontisOA' =>$imagen[$i],
                                        'TipoFFOA' => $type[$i],
                                        'NombreFFOA' => $nombre[$i]);
                    }
                    else {
                        $datosA = array( );
                    }
                
                    $datosB = array(
                                'IdForm3'=>$IdForm,
                                'OficinaOA' =>$OficinaOA[$i],
                                'DireccionOA' =>$DireccionOA[$i],
                                'DepartamentoOA' =>$DepartamentoOA[$i],
                                'LatitudOA' =>$LatitudOA[$i],
                                'LongitudOA' =>$LongitudOA[$i]                          
                            );
                    $datos =array_merge($datosA,$datosB);
                    $this->postalModel->saveTable('tb_postal_form3_ofap',$datos);                           
                }
                
            }
        }
        //PARA DEPARTAMENTAL-PERSONAL
        $Personal = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Departamental')->result();
        foreach ($Personal as $k) { //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_pers','IdForm3',$IdForm);
        }
        $DepPersonal=$this->input->post('DepPersonal');
        $DepCantidadP=$this->input->post('DepCantidadP');
        for($i=1;$i<count($DepPersonal); $i++){ //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Personal' =>$DepPersonal[$i],
                        'Cantidad' =>$DepCantidadP[$i],
                        'Tipo' =>'Departamental'
                    );
            $this->postalModel->saveTable('tb_postal_form3_pers',$datos);
        }
        //PARA DEPARTAMENTAL-LOGISTICO
        $Logistico = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Departamental')->result();
        foreach ($Logistico as $k) {    //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_log','IdForm3',$IdForm);
        }
        $DepLogistico=$this->input->post('DepLogistico');
        $DepCantidadL=$this->input->post('DepCantidadL');
        for($i=1;$i<count($DepCantidadL); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Logistico' =>$DepLogistico[$i],
                        'Cantidad' =>$DepCantidadL[$i],
                        'Tipo' =>'Departamental'
                    );
            $this->postalModel->saveTable('tb_postal_form3_log',$datos);
        }
        //PARA DEPARTAMENTAL-TECNOLOGICO
        $Tecnologico = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Departamental')->result();
        foreach ($Tecnologico as $k) {  //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_tec','IdForm3',$IdForm);
        }
        $DepTecnologico=$this->input->post('DepTecnologico');
        $DepCantidadT=$this->input->post('DepCantidadT');
        for($i=1;$i<count($DepCantidadT); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Tecnologico' =>$DepTecnologico[$i],
                        'Cantidad' =>$DepCantidadT[$i],
                        'Tipo' =>'Departamental'
                    );
            $this->postalModel->saveTable('tb_postal_form3_tec',$datos);
        }   
        //PARA DEPARTAMENTAL-MOBILIARIO
        $Mobiliario = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Departamental')->result();
        foreach ($Mobiliario as $k) {   //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_mob','IdForm3',$IdForm);
        }
        $DepMobiliario=$this->input->post('DepMobiliario');
        $DepCantidadM=$this->input->post('DepCantidadM');
        for($i=1;$i<count($DepCantidadM); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Mobiliario' =>$DepMobiliario[$i],
                        'Cantidad' =>$DepCantidadM[$i],
                        'Tipo' =>'Departamental'
                    );
            $this->postalModel->saveTable('tb_postal_form3_mob',$datos);
        }
        //PARA NACIONAL-PERSONAL
        $Personal = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Nacional')->result();
        foreach ($Personal as $k) { //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_pers','IdForm3',$IdForm);
        }
        $NacPersonal=$this->input->post('NacPersonal');
        $NacCantidadP=$this->input->post('NacCantidadP');
        for($i=1;$i<count($NacPersonal); $i++){ //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Personal' =>$NacPersonal[$i],
                        'Cantidad' =>$NacCantidadP[$i],
                        'Tipo' =>'Nacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_pers',$datos);
        }
        //PARA NACIONAL-LOGISTICO
        $Logistico = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Nacional')->result();
        foreach ($Logistico as $k) {    //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_log','IdForm3',$IdForm);
        }
        $NacLogistico=$this->input->post('NacLogistico');
        $NacCantidadL=$this->input->post('NacCantidadL');
        for($i=1;$i<count($NacLogistico); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Logistico' =>$NacLogistico[$i],
                        'Cantidad' =>$NacCantidadL[$i],
                        'Tipo' =>'Nacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_log',$datos);
        }
        //PARA NACIONAL-TECNOLOGICO
        $Tecnologico = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Nacional')->result();
        foreach ($Tecnologico as $k) {  //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_tec','IdForm3',$IdForm);
        }
        $NacTecnologico=$this->input->post('NacTecnologico');
        $NacCantidadT=$this->input->post('NacCantidadT');
        for($i=1;$i<count($NacTecnologico); $i++){  //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Tecnologico' =>$NacTecnologico[$i],
                        'Cantidad' =>$NacCantidadT[$i],
                        'Tipo' =>'Nacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_tec',$datos);
        }   
        //PARA NACIONAL-MOBILIARIO
        $Mobiliario = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Nacional')->result();
        foreach ($Mobiliario as $k) {   //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_mob','IdForm3',$IdForm);
        }
        $NacMobiliario=$this->input->post('NacMobiliario');
        $NacCantidadM=$this->input->post('NacCantidadM');
        for($i=1;$i<count($NacMobiliario); $i++){   //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Mobiliario' =>$NacMobiliario[$i],
                        'Cantidad' =>$NacCantidadM[$i],
                        'Tipo' =>'Nacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_mob',$datos);
        }   
        //PARA INTERNACIONAL-PERSONAL
        $Personal = $this->postalModel->getTable1('tb_postal_form3_pers','IdForm3',$IdForm,'Tipo','Internacional')->result();
        foreach ($Personal as $k) { //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_pers','IdForm3',$IdForm);
        }
        $IntPersonal=$this->input->post('IntPersonal');
        $IntCantidadP=$this->input->post('IntCantidadP');
        for($i=1;$i<count($IntPersonal); $i++){ //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Personal' =>$IntPersonal[$i],
                        'Cantidad' =>$IntCantidadP[$i],
                        'Tipo' =>'Internacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_pers',$datos);
        }
        //PARA INTERNACIONAL-LOGISTICO
        $Logistico = $this->postalModel->getTable1('tb_postal_form3_log','IdForm3',$IdForm,'Tipo','Internacional')->result();
        foreach ($Logistico as $k) {    //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_log','IdForm3',$IdForm);
        }
        $IntLogistico=$this->input->post('IntLogistico');
        $IntCantidadL=$this->input->post('IntCantidadL');
        for($i=1;$i<count($IntCantidadL); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Logistico' =>$IntLogistico[$i],
                        'Cantidad' =>$IntCantidadL[$i],
                        'Tipo' =>'Internacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_log',$datos);
        }
        //PARA INTERNACIONAL-TECNOLOGICO
        $Tecnologico = $this->postalModel->getTable1('tb_postal_form3_tec','IdForm3',$IdForm,'Tipo','Internacional')->result();
        foreach ($Tecnologico as $k) {  //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_tec','IdForm3',$IdForm);
        }
        $IntTecnologico=$this->input->post('IntTecnologico');
        $IntCantidadT=$this->input->post('IntCantidadT');
        for($i=1;$i<count($IntTecnologico); $i++){  //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Tecnologico' =>$IntTecnologico[$i],
                        'Cantidad' =>$IntCantidadT[$i],
                        'Tipo' =>'Internacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_tec',$datos);
        }   
        //PARA INTERNACIONAL-MOBILIARIO
        $Mobiliario = $this->postalModel->getTable1('tb_postal_form3_mob','IdForm3',$IdForm,'Tipo','Internacional')->result();
        foreach ($Mobiliario as $k) {   //vacio los campos
            $this->postalModel->deleteTable('tb_postal_form3_mob','IdForm3',$IdForm);
        }
        $IntMobiliario=$this->input->post('IntMobiliario');
        $IntCantidadM=$this->input->post('IntCantidadM');
        for($i=1;$i<count($IntCantidadM); $i++){    //agrego los nuevos campos
            $datos = array(
                        'IdForm3'=>$IdForm, 
                        'Mobiliario' =>$IntMobiliario[$i],
                        'Cantidad' =>$IntCantidadM[$i],
                        'Tipo' =>'Internacional'
                    );
            $this->postalModel->saveTable('tb_postal_form3_mob',$datos);
        }       
        // LO DEMAS     
        //Fotografia FRONTIS principal
        $nombre = $_FILES['FotografiaFrontis']['name'];
        echo $nombre;
        $imagen='';
        if($nombre){
            $imagen_temporal = $_FILES['FotografiaFrontis']['tmp_name'];
            $type1 = $_FILES['FotografiaFrontis']['type'];
            $itmp = fopen($imagen_temporal, 'r+b');
            $imagen = fread($itmp, filesize($imagen_temporal));
            fclose($itmp);  
            $datosA = array(
                        'FotografiaFrontis' => $imagen,
                        'TipoFF' => $type1);            
        }
        else {
            $datosA = array( );
        }
        //Fotografia ORGANIGRAMA 
        $nombreFO = $_FILES['FotografiaOrganigrama']['name'];
        $imagenFO='';
        if($nombreFO){
            $imagen_temporalFO = $_FILES['FotografiaOrganigrama']['tmp_name'];
            $typeFO = $_FILES['FotografiaOrganigrama']['type'];
            $itmpFO = fopen($imagen_temporalFO, 'r+b');
            $imagenFO = fread($itmpFO, filesize($imagen_temporalFO));
            fclose($itmpFO);    
            $datosB = array(
                        'FotografiaOrganigrama' => $imagenFO,
                        'TipoFO' => $typeFO);   
        }
        else {
            $datosB = array( );
        }

        $datosC = array(
                        'DomicilioPrincipal' => $this->input->post('DomicilioPrincipal'),
                        'CiudadCapital' => $this->input->post('CiudadCapital'),
                        'Departamento' => $this->input->post('Departamento'),
                        'Latitud' => $this->input->post('Latitud'),
                        'Longitud' => $this->input->post('Longitud'),                       
                        'NumeroRRHH' => $this->input->post('NumeroRRHH')            
                    );  
        $datos =array_merge($datosA,$datosB,$datosC);
        $this->postalModel->updateTable('tb_postal_form3',$datos,'IdForm3',$IdForm);

        if($Estado==1){
            $datos = array('Estado' => $Estado);    
            $this->postalModel->updateTable('tb_postal_form3',$datos,'IdForm3',$IdForm);
            $this->postalModel->updateTable('tb_postal_form2',$datos,'IdForm2',$IdForm);
            $this->postalModel->updateTable('tb_postal_form1',$datos,'IdForm1',$IdForm);
        }
        //echo $this->input->post('boton1');
        redirect('postal/listarUsuarios', 'refresh');
    }
    function pdfddjja($id_usu){
            //$IdForm1=68;
            $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            //$id_usu = $this->session->userdata('id_usuario');
            $IdForm=$id_usu;
            $data['action'] =  site_url('postal/save_usuarios1/');
            $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();
            $Form2 = $this->postalModel->getTable0('tb_postal_form2','IdForm2',$IdForm)->row();
            $Form3OA = $this->postalModel->getTable0('tb_postal_form3_ofap','IdForm3',$IdForm)->result();
            $Form1S = $this->postalModel->getTable0('tb_postal_form1_servicios','IdForm1',$IdForm)->result();
            $data['mensaje'] = '';
            //echo realpath("");
            //$file_pdf=realpath("")."\modelo.pdf";
            $file_pdf="files/ddjj1.pdf";
            require_once('pdf/fpdi.php');
            $pdf = new FPDI('P','mm','letter');// initiate FPDI
            $num_pag=$pdf->setSourceFile($file_pdf);    // set the sourcefile //devuelve el numero de paginas
            $pdf->AddPage();// add a page
            $tplIdx = $pdf->importPage(1);// import page 1
            $pdf->useTemplate($tplIdx, 0, 0);// use the imported page and place it at point 10,10 with a width of 100 mm
            // now write some text above the imported page          
            $pdf->SetTextColor(0,0,0);  

            $pdf->SetFont('Arial','B',12);
            $pdf->SetXY(151,60);
            $pdf->Cell(10,10,date('d-m-Y'),0,0,'C');
    
            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(29,89);         
            $pdf->Cell(10,15,$Form1->RepresentanteLegal,0,0,'L');

            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(160,89);            
            $pdf->Cell(10,15,$Form1->CedulaIdentidad,0,0,'L');

            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(45,96);         
            $pdf->Cell(10,15,$Form1->CedulaExpedido,0,0,'L');


            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(112,96);            
            $pdf->Cell(10,15,'Representante Legal',0,0,'L');


            $pdf->SetFont('Arial','B',11);
            $pdf->SetXY(19,135);            
            $pdf->Cell(10,15,'Resumen:',0,0,'L');

            $pdf->SetFont('Arial','',9);

            $pdf->SetXY(19,140);            
            $pdf->Cell(10,15,'Razon Social',0,0,'L');
            $pdf->SetXY(75,140);            
            $pdf->Cell(10,15,': '.$Form1->NombreEmpresa,0,0,'L');

            $pdf->SetXY(19,145);            
            $pdf->Cell(10,15,'Domicilio Principal',0,0,'L');
            $pdf->SetXY(75,145);            
            $pdf->Cell(10,15,': '.$Form1->DomicilioPrincipal,0,0,'L');

            $pdf->SetXY(19,150);            
            $pdf->Cell(10,15,'Identificacion de Servicios',0,0,'L');
            $pdf->SetXY(75,150);            
            $pdf->Cell(10,15,': '.count($Form1S),0,0,'L');


            $pdf->SetXY(19,155);            
            $pdf->Cell(10,15,'Nombre del Representante Legal',0,0,'L');
            $pdf->SetXY(75,155);            
            $pdf->Cell(10,15,': '.$Form1->RepresentanteLegal,0,0,'L');
            

            $pdf->SetXY(19,160);            
            $pdf->Cell(10,15,'Categoria de Licencia a Solicitar',0,0,'L');
            $pdf->SetXY(75,160);            
            $pdf->Cell(10,15,': '.$Form2->Categoria1.' - '.$Form2->Categoria2.' - '.$Form2->Tipo,0,0,'L');

            $pdf->SetXY(19,165);            
            $pdf->Cell(10,15,'Requistos Legales',0,0,'L');
            $pdf->SetXY(75,165);            
            $pdf->Cell(10,15,': Llenado',0,0,'L');

            $pdf->SetXY(19,170);            
            $pdf->Cell(10,15,'Requistos Financieros',0,0,'L');          
            $pdf->SetXY(75,170);            
            $pdf->Cell(10,15,': Llenado',0,0,'L');
            
            $pdf->SetXY(19,175);            
            $pdf->Cell(10,15,'Ubicacion Casa Matriz',0,0,'L');
            $pdf->SetXY(75,175);            
            $pdf->Cell(10,15,': Llenado',0,0,'L');          

            $pdf->SetXY(19,180);            
            $pdf->Cell(10,15,'Oficinas de Apoyo',0,0,'L');
            $pdf->SetXY(75,180);            
            $pdf->Cell(10,15,': '.count($Form3OA),0,0,'L');



        

            $pdf->Output("Declaracion Jurada.pdf", 'I');    
            //redirect('postal/form3', 'refresh');
            //echo "<script languaje='javascript' type='text/javascript'>window.opener.location.reload();window.close();</script>";
    }   
    function form2c($id_usu){
        $usu = $this->session->userdata('usuario');if($usu==false){redirect('internal');}
            $id_rol = $this->session->userdata('id_rol');
            //$id_usu = $this->session->userdata('id_usuario');
        $IdForm=$id_usu;
        $data['IdForm'] =$IdForm;
        $data['action'] =  site_url('postal/saveForm2C');
        $data['Categorias1']=array('Internacional'=>'Internacional',
                                'Nacional'=>'Nacional',
                                'Departamental'=>'Departamental',
                                'Transporte'=>'Transporte');

        $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();

    
            
        $data['Form1'] =  $Form1;
        $Form2 = $this->postalModel->getTable0('tb_postal_form2','IdForm2',$IdForm)->row();
        $data['readonly'] ='readonly';
        

        $data['Form2'] =  $Form2;
        if($Form2->Categoria1=='Internacional'||$Form2->Categoria1=='Nacional'||$Form2->Categoria1=='Departamental'){
            $data['Categorias2']=array('Primera'=>'Primera',
                                'Segunda'=>'Segunda');      
        }
        else {
            $data['Categorias2']=array('Aereo'=>'Aereo',
                                'Terrestre'=>'Terrestre',
                                'Fluvial'=>'Fluvial');  
        }

                    $data['usu'] = $usu;
            $xusu=$this->postalModel->get_usu($id_usu)->row();
            $rol=$this->postalModel->get_roles_by_id($id_rol)->row();
            $data['rol']=$xusu->descripcion_usuario.'-'.$rol->Rol;
            $data['id_rol'] = $id_rol;
            $data['botonSgte'] = 'Guardar Formulario';
            $data['checklist'] = '<input type="checkbox" name="checklist[]" value="1"> ';
        $this->load->view('postal/form2', $data);
    }
    function saveForm2C(){
        $checklist= $this->input->post('checklist');
        // Existen un total de 15 documentos, hay q comparar con esa cantidad
        $IdForm=$this->input->post('IdForm');
        if(count($checklist)!=15){  //rechaza los formularios y los vuelve editables    listarUsuarios                  
            $datos = array('Estado' => 0);
            $this->postalModel->updateTable('tb_postal_form2',$datos,'IdForm2',$IdForm);            
            $this->postalModel->updateTable('tb_postal_form3',$datos,'IdForm3',$IdForm);            
            $this->postalModel->updateTable('tb_postal_form1',$datos,'IdForm1',$IdForm);
           redirect('postal/listarUsuarios', 'refresh');
        }
        else {
            $datos = array('Estado' => 2);
            $this->postalModel->updateTable('tb_postal_form2',$datos,'IdForm2',$IdForm);            
            $this->postalModel->updateTable('tb_postal_form3',$datos,'IdForm3',$IdForm);            
            $this->postalModel->updateTable('tb_postal_form1',$datos,'IdForm1',$IdForm);
            redirect('postal/listarUsuarios', 'refresh');
        }
    }   
    function pdfnota($id_usu,$bandera){
            //$IdForm1=68;
            $usu = $this->session->userdata('usuario');if($usu==false){redirect('/home');}
            $id_rol = $this->session->userdata('id_rol');
            //$id_usu = $this->session->userdata('id_usuario');
            $IdForm=$id_usu;

            $data['action'] =  site_url('postal/save_usuarios1/');
            $Form1 = $this->postalModel->getTable0('tb_postal_form1','IdForm1',$IdForm)->row();
            $Form2 = $this->postalModel->getTable0('tb_postal_form2','IdForm2',$IdForm)->row();
            $Form3 = $this->postalModel->getTable0('tb_postal_form3','IdForm3',$IdForm)->result();
            
            $data['mensaje'] = '';
            //echo realpath("");
            //$file_pdf=realpath("")."\modelo.pdf";
            //$file_pdf="files/ddjj1.pdf";
            require_once('pdf/fpdi.php');
            $pdf = new FPDI('P','mm','letter');// initiate FPDI
            //$num_pag=$pdf->setSourceFile($file_pdf);  // set the sourcefile //devuelve el numero de paginas
            $pdf->AddPage();// add a page
            //$tplIdx = $pdf->importPage(1);// import page 1
            //$pdf->useTemplate($tplIdx, 0, 0);// use the imported page and place it at point 10,10 with a width of 100 mm
            // now write some text above the imported page          
            $pdf->SetTextColor(0,0,0);  

            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(10,25);
            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $pdf->Cell(180,10,'La Paz, '.date('d')." de ".$meses[date('n')-1]. " del ".date('Y'),0,0,'R');
    


            $pdf->SetFont('Arial','',10);

            $pdf->SetXY(19,40);         
            $pdf->Cell(10,15,utf8_decode("Señor"),0,0,'L');         

            $pdf->SetXY(19,45);         
            $pdf->Cell(10,15,'Ing. Cesar Bohrt Urquizo',0,0,'L');           

            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(19,50);         
            $pdf->Cell(10,15,'DIRECTOR EJECUTIVO',0,0,'L');         


            $pdf->SetXY(19,55);         
            $pdf->Cell(10,15,'AUTORIDAD DE REGULACION Y FISCALIZACION DE',0,0,'L');
            

            $pdf->SetXY(19,60);         
            $pdf->Cell(10,15,'TELECOMUNICACIONES Y TRANSPORTES',0,0,'L');
            
            $pdf->SetFont('Arial','U',10);
            $pdf->SetXY(19,65);         
            $pdf->Cell(10,15,'Presente.-',0,0,'L');


            $pdf->SetFont('Arial','BU',10);
            $pdf->SetXY(55,85);         
            $pdf->Cell(180,15,'Ref. Solicitud de Licencia y Certificado Anual de Operaciones - '.$Form1->NombreEmpresa,0,0,'L');            
            
            $pdf->SetFont('Arial','',10);
            $pdf->SetX(19,120); 
            $pdf->Cell(10,35,utf8_decode('Señor Director'),0,0,'L');
            $Fecha=explode("-", $Form1->FechaRegistro);

            $txt=utf8_decode("Por la presente, me dirijo a usted para solicitar la otorgación de la Licencia y Certificado Anual de Operaciones, para prestar Servicios Postales como Operador ". $Form1->NombreEmpresa."  Básico en la categoría ".$Form2->Categoria1."-".$Form2->Categoria2.", para el presente periodo ".$Fecha[0].".");                     
            $pdf->SetXY(19,110);    
            $pdf->MultiCell(175,5,$txt);

            if($bandera==1){
                $txt=utf8_decode("De acuerdo con los requisitos legales, financieros y técnicos contenidos en formularios con carácter de declaración jurada y norma vigente, adjunto la información contenida en una carpeta.");                       
                $pdf->SetXY(19,130);    
                $pdf->MultiCell(175,5,$txt);        

                $txt=utf8_decode("Así también, indicarle que me sujetaré a las disposiciones establecidas por la ATT, en el plazo que se estipule para establecer la cobertura de la red postal, con las condiciones que exige mi categoría.");                     
                $pdf->SetXY(19,145);    
                $pdf->MultiCell(175,5,$txt);            
            }
            

            $txt=utf8_decode("Con este particular reciban los más cordiales saludos.
            Atentamente,");
            $pdf->Ln(); 
            $pdf->SetX(19); 
            $pdf->MultiCell(175,5,$txt);

            $pdf->SetXY(19,185);    
            $pdf->SetFont('Arial','',10);       
            $pdf->Cell(0,15,'Juan Perez',0,0,'C');

            $pdf->SetXY(19,190);    
            $pdf->SetFont('Arial','B',10);      
            $pdf->Cell(0,15,'REPRESENTANTE LEGAL',0,0,'C');
        
            $pdf->SetXY(19,195);    
            $pdf->SetFont('Arial','B',10);      
            $pdf->Cell(0,15,'TNT S.R.L.',0,0,'C');

            $pdf->Output("Nota.pdf", 'D');  
            //redirect('postal/form3', 'refresh');
            //echo "<script languaje='javascript' type='text/javascript'>window.opener.location.reload();window.close();</script>";
    }   
    function verImagenForm3($IdForm){
        $Form3 = $this->postalModel->getTable0('tb_postal_form3','IdForm3',$IdForm)->row();
        header("Content-Type: ".$Form3->TipoFF); echo $Form3->FotografiaFrontis;
    }
    function verImagenForm3a($IdForm){
        $Form3 = $this->postalModel->getTable0('tb_postal_form3','IdForm3',$IdForm)->row();
        header("Content-Type: ".$Form3->TipoFO); echo $Form3->FotografiaOrganigrama;
    }   
    function verImagenForm3OA($IdForm,$NombreFFOA){
        $Form3 = $this->postalModel->getTable1('tb_postal_form3_ofap','IdForm3',$IdForm,'NombreFFOA',$NombreFFOA)->row();
        header("Content-Type: ".$Form3->TipoFFOA); echo $Form3->FotografiaFrontisOA;
    }   
    function mostrarSubcategoria($p){
        if($p=='Internacional'||$p=='Nacional'||$p=='Departamental'){
            $Categoria2=array('Primera'=>'Primera',
                                'Segunda'=>'Segunda');  
        
        }
        else{
            $Categoria2=array('Aereo'=>'Aereo',
                                'Terrestre'=>'Terrestre',
                                'Fluvial'=>'Fluvial');

        }       
        echo form_dropdown('Categoria2', $Categoria2, '','');;
        
    }







    
}
    ?>


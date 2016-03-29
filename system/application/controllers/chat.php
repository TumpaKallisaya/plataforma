<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Chat extends Controller {

        function __construct() {
        parent::__construct();
        $this->db_siscor = $this->load->database('siscor', true);
        $this->load->model('siscormodel');
        $this->load->helper('url');
        $this->load->model('chatmodel');
    }

   public function chat(){
        $this->load->library(array('table', 'My_PHPMailer'));
        //$this->load->library(array('cezpdf','fpdf','table','validation', 'My_PHPMailer'));
        // load helper
        $this->load->helper(array('form', 'url', 'download'));
        // load model
        $this->db_siscor = $this->load->database('default', true);
        $this->load->model('siscormodel', '', TRUE);
        error_reporting(E_ALL);
        // load helper
        $this->load->helper(array('form', 'url', 'download', 'file'));
    }

    public function index() {
             $id_rol = $this->session->userdata('id_rol');

        $usu = $this->session->userdata('usuario');

        // load library
       
        $data['saludo']='saludos Veronica Chat';
                            $data['usu'] = $usu;            
            $data['id_rol'] = $id_rol;

        // para el chat
        $id_usu = $this->session->userdata('id_usuario');
        $operador = $this->chatmodel->getOperador($id_usu);
        $data['id_usuario'] = $id_usu;
        $data['listaSecciones'] = $this->chatmodel->getListaSecciones();
        $data['operador'] = $operador;
                
        if($this->chatmodel->esAtt($id_usu)){
            $data['esAtt'] = true;
        }else{
            $data['esAtt'] = false;
        }

        $this->load->view('chat/contacto', $data);
    }

    // esta parte es para el pdf y adjuntar
    public function downloadAdjChat(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id = $_GET['id_chat'];
        $this->load->helper('download');
        $datosDownload = $this->chatmodel->getAdjChat($id);
        $data = file_get_contents("theme/themeChat/archivosChat/".$datosDownload->archivo); // Read the file's contents
        $name = $datosDownload->archivo;

        force_download($name, $data);
        //_push_file($data, $name);
        
        //force_download($datosDownload->archivo, $datosDownload->path);
        $this->_setOutput($datosDownload);
    }
    
    public function printChatPdf(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_tema = $_GET['id_tema'];
        $chats_tema = $this->chatmodel->chatPdf($id_tema);
        $tema_datos = $this->chatmodel->temaPdf($id_tema);
        
        $this->load->library('table_pdf');
        $this->pdf = new Table_pdf();
        
        // Agregamos una página
        $this->pdf->AddPage();
        // Define el alias para el número de página que se imprimirá en el pie
        $this->pdf->AliasNbPages();

        /* Se define el titulo, márgenes izquierdo, derecho y
         * el color de relleno predeterminado
         */
        $this->pdf->SetTitle("Reporte de conversaciones");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(200,200,200);

        // Se define el formato de fuente: Arial, negritas, tamaño 9
        $this->pdf->SetFont('Arial', 'B', 9);
        /*
         * TITULOS DE COLUMNAS
         *
         * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
         */
        
        
        $this->pdf->Image('images/logo1.png',10,8,22);
            $this->pdf->SetFont('Arial','B',13);
            $this->pdf->Cell(40);
            $this->pdf->Cell(120,10,'AUTORIDAD DE REGULACION Y FISCALIZACION DE',0,0,'C');
            $this->pdf->Ln('5');
            $this->pdf->Cell(40);
            $this->pdf->Cell(120,10,'TELECOMUNICACIONES Y TRANSPORTES',0,0,'C');
            $this->pdf->Ln('8');
            $this->pdf->SetFont('Arial','B',8);
            $this->pdf->Cell(38);
            $this->pdf->Cell(120,10,'REPORTE DE CHAT',0,0,'C');
            $this->pdf->Ln(20);
            $this->pdf->Cell(100,7,'Tema: '.$tema_datos->tema,'N',0,'L','0');
        $this->pdf->Ln(5);
        $this->pdf->Cell(100,7,'Seccion: '.$tema_datos->desc_seccion,'N',0,'L','0');
        
        $this->pdf->Ln(8);
        $this->pdf->Cell(35,7,'USUARIO','TBL',0,'C','0');
        $this->pdf->Cell(115,7,'MENSAJE','TB',0,'C','0');
        $this->pdf->Cell(30,7,'FECHA ENVIO','TBR',0,'C','0');
        
        $this->pdf->Ln(7);
        
        
        // La variable $x se utiliza para mostrar un número consecutivo
        $x = 1;
        foreach ($chats_tema as $chat) {
          // se imprime el numero actual y despues se incrementa el valor de $x en uno
          // Se imprimen los datos de cada alumno
          $this->pdf->Cell(35,7,$chat['descripcion_usuario'],'N',0,'L',0);
          $this->pdf->Cell(115,7,$chat['mensaje'],'N',0,'L',0);
          $this->pdf->Cell(30,7,$chat['fecha_envio'],'N',0,'L',0);
          //Se agrega un salto de linea
          $this->pdf->Ln(7);
        }
        //$this->pdf->SetY(-10);
          // $this->pdf->SetFont('Arial','I',8);
           //$this->pdf->Cell(0,10,'Página '.$this->pdf->PageNo().'/{nb}',0,0,'C');
        /*
         * Se manda el pdf al navegador
         *
         * $this->pdf->Output(nombredelarchivo, destino);
         *
         * I = Muestra el pdf en el navegador
         * D = Envia el pdf para descarga
         *
         */
        $this->pdf->Output("Chats.pdf", 'I');
    }

    // Se agrega desde aquí el controller del chat
    public function enviar_chat(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $mensaje = $_GET['mensaje'];
        $id_usuario_de = $this->input->get('id_usuario_de', '');
        $id_tema = $this->input->get('id_tema', '');
        $timestamp = time();
        
        $chatGuardado = $this->chatmodel->guardarChat($id_usuario_de, $id_tema, $mensaje, $timestamp);
        $this->_setOutput($chatGuardado);
    }
    
    public function get_chats_constantes(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario_de'];
        $id_tema = $_GET['id_tema'];
        $timestamp = $this->input->get('timestamp', null);
        
        $mensajes = $this->chatmodel->getChatsConstantes($id_usuario, $id_tema, $timestamp);
        $this->_setOutput($mensajes);
    }
    
    public function get_chats_recientes(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario_de']; //Ya no es necesario
        $id_tema = $_GET['id_tema'];
        $es_att = $this->input->get('es_att', ''); //Ya no es necesario
        
        $mensajes = $this->chatmodel->getChatsRecientesAttOpe($id_usuario, $id_tema);
        $this->_setOutput($mensajes);
    }
    
    private function _setOutput($data){
        header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
        
    echo json_encode($data);
    }
    
    public function crearTemaChat(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario_de'];
        $tema = $this->input->get('tema_chat', '');
        $cod_seccion = $this->input->get('cod_seccion', '');
        $id_operador = $this->input->get('id_operador', '');
        
        $tema = $this->chatmodel->crearTema($id_usuario, $tema, $cod_seccion, $id_operador);
        
        //$usuarioAtt = $this->chatmodel->recuperaAttSeccion($cod_seccion);
        //$temaRecuperado = $this->chatmodel->ultimoTemaCreado($id_usuario_de);
        //$chatDef = $this->chatmodel->crearChatDefecto($temaRecuperado->id, $id_usuario_de, $usuarioAtt->id_usuario);
        $this->_setOutput($tema);
    }
    
    public function get_lista_abiertos_manual(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario'];
        
        $listaTemas = $this->chatmodel->listaTemasAbiertos($id_usuario);
        $this->_setOutput($listaTemas);
    }
    
    public function get_temasAttAbiertos(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario'];
        $ultimo_tema = $this->input->get('ultimo_tema', '');
        
        $listaTemasAtt = $this->chatmodel->getLisTemAbiAtt($id_usuario, $ultimo_tema)->result_array();
        $this->_setOutput($listaTemasAtt);
    }
    
    public function get_temasOpeAbiertos(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario'];
        $ultimo_tema = $this->input->get('ultimo_tema', '');
        $id_rol = $this->input->get('id_rol', '');
        
        if($id_rol == 4){
            $listaTemasOpe = $this->chatmodel->getLisTemAbiOpeRolCuatro($id_usuario, $ultimo_tema)->result_array();
        }else{
            $listaTemasOpe = $this->chatmodel->getLisTemAbiOpe($id_usuario, $ultimo_tema)->result_array();
        }
        $this->_setOutput($listaTemasOpe);
    }
    
    public function get_tema_sel(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario_de']; //Ya no es necesario
        $id_tema = $_GET['id_tema'];
        
        $tema = $this->chatmodel->getTemaSel($id_tema);
        $this->_setOutput($tema);
    }
    
    public function subirArchivoChat(){
        
        $status = "";
        $msg = "";
        $file_element_name = 'userfile';
        
        if ($status != "error"){
            $config['upload_path'] = './theme/themeChat/archivosChat/';
            $config['allowed_types'] = 'jpg|png|doc|pdf|txt';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)){
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }else{
                $data = $this->upload->data();
                $file_path = $data['full_path'];
                
                if(file_exists($file_path)){
                    $status = "success";
                    $path = $file_path;
                    $name = $data['file_name'];
                    $size = $data['file_size'];
                }else{
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'path' => $path, 'name' => $name, 'size' => $size));
    }
    
    public function guardarArchAdj(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario_de = $this->input->get('id_usuario_de', '');
        $id_tema = $this->input->get('id_tema', '');
        $path = $this->input->get('path', '');
        $archivo = $this->input->get('archivo', '');
        $tamano = $this->input->get('size', '');
        $timestamp = time();
        
        $chatAdjGuardado = $this->chatmodel->guardarAdjChat($id_usuario_de, $id_tema, $path, $archivo, $tamano, $timestamp);
        $this->_setOutput($chatAdjGuardado);
    }
    
    public function derivarChat(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_tema = $_GET['id_tema_actual'];
        $seccion = $_GET['nueva_seccion'];
        
        $temaAntiguo = $this->chatmodel->getTemaSel($id_tema);
        $dataFinTema = array(
            'estado' => 'CERRADO'
        );
        $temaFinalizado = $this->chatmodel->finalizarTema($id_tema, $dataFinTema);
        
        $nuevoTema = $this->chatmodel->crearTema($temaAntiguo->id_usuario, $temaAntiguo->tema, $seccion, $temaAntiguo->id_operador);
        $temaNuevo = $this->chatmodel->buscarTemaCompleto($temaAntiguo->id_usuario, $temaAntiguo->tema, $seccion, $temaAntiguo->id_operador, $estado = 'ABIERTO');
        
        $dataChatDerivado = array(
            'id_tema' => $temaNuevo->id
        );
        $chatDerivado = $this->chatmodel->derivarChatNuevoTema($id_tema, $dataChatDerivado);
        $this->_setOutput($temaNuevo);
    }
    
    public function finalizarChat(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_tema = $_GET['id_tema'];
        
        $dataFinTema = array(
            'estado' => 'CERRADO'
        );
        $temaFinalizado = $this->chatmodel->finalizarTema($id_tema, $dataFinTema);
        $this->_setOutput($temaFinalizado);
    }
    
    public function getNroTemasActualesAtt(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario'];
        
        $nroTemasActuales = $this->chatmodel->getNroTemasAtt($id_usuario);
        $this->_setOutput(array('nroTemasAct' => $nroTemasActuales));
    }
    
    public function getNroTemasActualesOpe(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario'];
        $id_rol = $_GET['id_rol'];
        
        if($id_rol == 4){
            $nroTemasActuales = $this->chatmodel->getNroTemasOpeRolCuatro($id_usuario);
        }else{
            $nroTemasActuales = $this->chatmodel->getNroTemasOpe($id_usuario);
        }
        $this->_setOutput(array('nroTemasAct' => $nroTemasActuales));
    }
    
    public function getNroTemasAntiguos(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario'];
        $es_att = $_GET['es_att'];
        
        
        if($es_att == 'si'){
            $nroTemasAntiguos = $this->chatmodel->getNroTemasAntiguosAtt($id_usuario)->num_rows();
        }else{
            $nroTemasAntiguos = $this->chatmodel->getNroTemasAntiguosOpe($id_usuario)->num_rows();
        }
        $this->_setOutput(array('nroTemasAnt' => $nroTemasAntiguos));
    }
    
    public function get_temasAntiguos(){
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        $id_usuario = $_GET['id_usuario'];
        $es_att = $_GET['es_att'];
        
        if($es_att == 'si'){
            $temasAntiguos = $this->chatmodel->getNroTemasAntiguosAtt($id_usuario)->result_array();
        }else{
            $temasAntiguos = $this->chatmodel->getNroTemasAntiguosOpe($id_usuario)->result_array();
        }
        $this->_setOutput($temasAntiguos);
    }   
}

?>
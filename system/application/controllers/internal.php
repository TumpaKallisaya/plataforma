<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Internal extends Controller {		

	//Controlador Internal - Administrador - Plataforma
	function __construct() {
		parent::Controller();
		$this->load->library(array('table','validation','form_validation','basicauth'));
		$this->load->helper(array('url','form'));
		// load model
		//$this->load->model('personModel','',TRUE);
		error_reporting(E_ALL);
	}
	
 	function index(){ 		
 		$data['usuario']='';
		$data['password']='';
		$data['error']='';
 		$data['action'] = site_url('internal/login');
		$this->load->view('loginAdministrador',$data);
		//redirect('person/formCertificado','refresh');
 	}

	function login(){ 			
		$data = array();
		$respuesta = $this->basicauth->login($this->input->post('usuario'), $this->input->post('password'));		
		//echo var_dump($respuesta);
		if(isset($respuesta['error'])){
			$data['usuario'] = $this->input->post('usuario');
			$data['password'] = '';
			$data['error'] = '* '.$respuesta['error'];
			$data['action'] = site_url('internal/login');
			$this->load->view('loginAdministrador',$data);
		}
		else{
			if($respuesta['estado']=='0'){
				$data['error'] = 'Usuario Deshabilitado';
				$data['usuario'] = $this->input->post('usuario');
				$data['action'] = site_url('internal/login');
				$this->load->view('loginAdministrador', $data);
			}
			else{ 
				if($respuesta['id_rol']=='1'){ 
					redirect('person/listUsuario/0','refresh');						
				}	
				if($respuesta['id_rol']=='2'){
						redirect('postal/listarUsuarios','refresh');	
				}
				redirect('internal/index','refresh');
					
			}			
		}
 	}
 	function loginError(){
 		$data['usuario']='';
		$data['password']='';
		$data['error']='Error al Introducir las Coordenadas';
 		$data['action'] = site_url('internal/login');
		$this->load->view('loginAdministrador',$data);
 	} 	
	function logout(){
		$this->basicauth->logout();
		redirect('internal/index');
	} 	
 }
  	


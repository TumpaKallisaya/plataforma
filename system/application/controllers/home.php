<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Home extends Controller {

	//php 5 constructor
	function __construct() {
		parent::Controller();
		$this->load->library(array('table','validation','form_validation','basicauth'));
		$this->load->helper(array('url','form'));
		// load model
		$this->load->model('personModel','',TRUE);
	}
	
 	function index(){
 		$data['usuario']='';
		$data['password']='';
		$data['error']='';
 		$data['action'] = site_url('home/login');
		$this->load->view('loginPlataforma',$data);
 	}

	function login(){ 			
		$data = array();
		$respuesta = $this->basicauth->login($this->input->post('usuario'), $this->input->post('password'));		
		//echo var_dump($respuesta);
		if(isset($respuesta['error'])){
			$data['usuario'] = $this->input->post('usuario');
			$data['password'] = '';
			$data['error'] = $respuesta['error'];
			$data['action'] = site_url('home/login');
			$this->load->view('loginPlataforma', $data);
		}
		else{
			if($respuesta['estado']=='0'){
				redirect('home/loginDeshabilitado','refresh');	
			}
			else{
				if($respuesta['id_rol']=='4'){ //si es administrador					
					redirect('postal/form1','refresh');									
				}	
				if($respuesta['id_rol']=='3'){
					redirect('person/index','refresh');		
				}				
				redirect('home/index','refresh');
			}			
		} 		
 	}
 	function loginError(){
 		$data['usuario']='';
		$data['password']='';
		$data['error']='Error al Introducir las Coordenadas';
 		$data['action'] = site_url('home/login');
		$this->load->view('loginPlataforma',$data);
 	} 	
 	function loginDeshabilitado(){
 		$data['usuario']='';
		$data['password']='';
		$data['error']='Usuario Deshabilitado<br>';
 		$data['action'] = site_url('home/login');
		$this->load->view('loginPlataforma',$data);
 	} 	 	
 	function logout(){
		$this->basicauth->logout();
		redirect('home/index');
	}
 }
  	


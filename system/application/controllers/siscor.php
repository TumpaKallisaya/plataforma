<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Siscor extends Controller {

    protected $db_siscor;

    function __construct() {
        parent::__construct();
        $this->db_siscor = $this->load->database('siscor', true);
        $this->load->model('siscormodel');
    }

    
    public function siscor() {
        // load library
        $this->load->library(array('table', 'My_PHPMailer'));
        //$this->load->library(array('cezpdf','fpdf','table','validation', 'My_PHPMailer'));
        // load helper
        $this->load->helper(array('form', 'url', 'download'));
        // load model
        $this->db_siscor = $this->load->database('siscor', true);
        $this->load->model('siscormodel', '', TRUE);
        error_reporting(E_ALL);
        // load helper
        $this->load->helper(array('form', 'url', 'download', 'file'));
    }

    public function cor_entrante() {
         $id_rol = $this->session->userdata('id_rol');
        $data['action'] = '';
        $fecha_actual = date('Y-m-d H:i:s');
        $fecha = date('d-m-Y');
        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $data['link_new_hr'] = anchor('siscor/reservar_hre', 'Reservar Hoja de Ruta Entrante', array('class' => 'add'));
        $sec_matriz = $reg_persona->seccion_matriz;
        $hr_reservados = $this->siscormodel->get_hr_reservados($sec_matriz)->result();
        $this->load->library('table');
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('<p>No', '<p>Hoja de Ruta', '<p>Fecha', '<p>Accion');
        $i = 0;
        foreach ($hr_reservados as $a) {
            $i++;
            $this->table->add_row($i, $a->hoja_ruta, $a->fecha, anchor('siscor/cor_entrante1/' . base64_encode($a->hoja_ruta), 'Editar', array('class' => 'view')));
        }
        $data['table'] = $this->table->generate();


        //--- cantidad de entrantes ($k) y no leidos ($j)-----
        $reg_document1 = $this->siscormodel->get_document_in1($cod_persona)->result();
        $j = 0;
        $k = 0;
        foreach ($reg_document1 as $a) {
            if ($a->estado_aa != 'ARCHIVADO') {
                if ($a->estado != 'LEIDO') {
                    ++$j;
                } ++$k;
            }
        }
        $data['cant_in_noleidos'] = $j;
        $data['cant_in_total'] = $k;
        //------------------------------------------
        $data['title'] = 'Correspondencia Entrante';
        $data['fecha'] = $fecha;
        $data['asunto_documento'] = '';
        $data['required'] = ':required';
        $data['checked'] = 'checked';
        $data['usu'] = $usu;
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $id_rol_persona = $reg_persona->id_rol;
        $data['flag_representante'] = '';
        $representante = $this->siscormodel->get_representante($cod_persona)->result();
        if ($representante) {
            $data['flag_representante'] = $representante;
        }
        $menu = explode("-", $id_rol_persona);
        $data['menu'] = $menu;
                    $data['usu'] = $usu;            
            $data['id_rol'] = $id_rol;
        $this->load->view('siscor/form_hr_reservados', $data);
    }

    function reservar_hre() {
        //$fecha_actual = date('Y-m-d h:i:s');
        $fecha_actual = date('Y-m-d H:i:s');
        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        //$cod_persona = $this->session->userdata('cod_persona');
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        //calculo de la ultima hoja de ruta Entrante
        $correlativos = $this->siscormodel->get_correlativosHR_smatriz($reg_persona->seccion_matriz)->result();
        foreach ($correlativos as $c) {
            if ($c->alfanumerico === 'E') {
                $nhoja_ruta = $c->num_max;
                $nhoja_ruta = $nhoja_ruta + 1;
                $cod_correlativos = $c->cod_correlativos;
            }
        }
        $hoja_ruta = 'E-' . $reg_persona->seccion_matriz . '-' . $nhoja_ruta;
        $datos1 = array('num_max' => $nhoja_ruta);
        $this->siscormodel->update_correlativosHR($cod_correlativos, $datos1);
        $datos = array('hoja_ruta' => $hoja_ruta, 'fecha' => $fecha_actual);
        $this->siscormodel->guardar_reserva($datos);
        redirect('siscor/cor_entrante', 'refresh');
    }

    function cor_entrante1($kkk) {
        $hoja_ruta = base64_decode($kkk);
        $data['action'] = site_url('siscor/cor_entrante2/' . base64_encode($hoja_ruta));
        //$fecha_actual = date('Y-m-d h:i:s');
        $fecha_actual = date('Y-m-d H:i:s');
        $fecha = date('d-m-Y');
        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        //$cod_persona = $this->session->userdata('cod_persona');
        $data['mensaje'] = '';
        $data['table2'] = '';
        $data['flag_representante'] = '';
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $data['usuario_remitente'] = $usu;
        $data['cargo_remitente'] = $reg_persona->desc_cargo;
        $data['direccion_remitente'] = $reg_persona->desc_seccion;
        $data['direccion'] = $this->siscormodel->get_seccionB();
        $data['destinatario'] = $this->siscormodel->get_persona();
        //$correlativo_tipo_documento=$this->siscormodel->get_correlativoDOC_seccion($reg_persona->cod_seccion)->result();
        $data['tipo_documento'] = $this->siscormodel->get_tipo_doc1E();
        $data['cod_flujo'] = '';

        $data['txtempresa'] = $this->siscormodel->get_empresaA();
        $data['link_new_hj'] = '';
        $data['hoja_ruta'] = '';

        //--- cantidad de entrantes ($k) y no leidos ($j)-----
        $reg_document1 = $this->siscormodel->get_document_in1($cod_persona)->result();
        $j = 0;
        $k = 0;
        foreach ($reg_document1 as $a) {
            if ($a->estado_aa != 'ARCHIVADO') {
                if ($a->estado != 'LEIDO') {
                    ++$j;
                } ++$k;
            }
        }
        $data['cant_in_noleidos'] = $j;
        $data['cant_in_total'] = $k;
        //------------------------------------------
        $data['title1'] = 'Correspondencia Entrante';
        $data['fecha'] = $fecha;
        $data['asunto_documento'] = '';
        $data['required'] = ':required';
        $data['checked'] = 'checked';
        $data['usu'] = $usu;
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $id_rol_persona = $reg_persona->id_rol;
        $menu = explode("-", $id_rol_persona);
        $data['menu'] = $menu;
        $this->load->view('siscor/form_envio_entrante', $data);
    }

    function cor_entrante2($kkk) {
        /* if(!$this->input->post('txtinstitucion')||!$this->input->post('cargo_destinartario'||$this->input->post('txtempresa')||$this->input->post('txtpersona'))){
          ?><script language="javascript">alert('Datos Requeridos "Usuario Destinario" !!!');</script><?php
          redirect('/person/cor_entrante1/'.$kkk, 'refresh');
          } */
        $hoja_ruta = base64_decode($kkk);
        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        //$cod_persona = $this->session->userdata('cod_persona');
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        //$fecha_actual = date('Y-m-d h:i:s');
        $fecha_actual = date('Y-m-d H:i:s');
        $fecha = date('d-m-Y');
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        //--
        $ctrl_ud = $this->input->post('txtusuario');
        if ($ctrl_ud == "" || $ctrl_ud == 0 || $ctrl_ud == null || $ctrl_ud == '0') {
            //$datos = array( 'estado_documento' => 'C');
            //$this->siscormodel->update_document($cod_documento,$datos);
            echo "<script language='javascript'> alert('NO DERIVADO! Llene lo que es Requerido y Usuario!'); </script>";
            redirect('/siscor/cor_entrante1/' . $kkk, 'refresh'); //-- cor_interna
        } else {
            //--
            $datos = array('cod_tipo_documento' => $this->input->post('tipo_documento'),
                'fecha_documento' => $fecha,
                'asunto_documento' => $this->input->post('asunto_docE'),
                'hoja_ruta' => $hoja_ruta,
                'remitente' => $cod_persona,
                'cod_cargo' => $reg_persona->cod_cargo,
                'cod_seccion' => $reg_persona->cod_seccion,
                'cod_tipo_flujo' => '',
                'usuario_registro' => $usu,
                'fecha_registro' => $fecha_actual,
                'usuario_modificacion' => $usu,
                'fecha_modificacion' => $fecha_actual,
                'usuario_destino' => $this->input->post('txtusuario'), //codigo de persona
                'direccion_destino' => $this->input->post('txtinstitucion'), //codigo de seccion
                'cargo_destino' => $this->input->post('cargo_destinartario'), //codigo cargo destino
                'fecha_limite' => $fecha,
                'instruccion_tarea' => "Para su atencion", //proveido
                'estado' => 'NO LEIDO',
                'estado_documento' => 'C', //en camino
                'cod_flujo' => '',
                'tic_cor' => 'C',
                'cod_empresa' => $this->input->post('txtempresa'),
                'cod_per_emp' => $this->input->post('txtpersona'),
                'cod_carg_emp' => $this->input->post('cargo_e'),
                'citeE' => $this->input->post('citeE'),
                'nro_hojas' => $this->input->post('nro_hojas'),
                'confidencial' => $this->input->post('confidencial'),
                'gestion' => date('Y'),
                'prioridad' => $this->input->post('prioridad'),
                'nro_anexos' => $this->input->post('nro_anexos')
            );
            $Id_Documento = $this->siscormodel->guardar_corinterna($datos);
            if (!file_exists("uploads/siscor/$usu")) {
                mkdir("uploads/siscor/$usu");
            }
            if (!file_exists("/var/www/html/siscorv/uploads/$usu")) {
                mkdir("/var/www/html/siscorv/uploads/$usu");
            }

            if ($_FILES["archivos"]["name"]) {
                //guadar adjuntos
                $i = 0;
                $persons = $_FILES["archivos"]["name"];
                foreach ($persons as $a) {
                    $datos_adj = array('Id_Documento' => $Id_Documento,
                        'Fecha_Registro' => $fecha_actual,
                        'Usuario_Registro' => $usu,
                        'Nombre_Archivo' => $_FILES["archivos"]["name"][$i]);
                    $Id_Adjunto = $this->siscormodel->guardar_adjuntos($datos_adj);
                    move_uploaded_file($_FILES["archivos"]["tmp_name"][$i], "/var/www/html/siscorv/uploads/$usu/" . $_FILES["archivos"]["name"][$i]);
                    $i++;
                }
            }
            //die();
            //actualizar la tabla reservas
            $this->siscormodel->delete_reserva($hoja_ruta);
            redirect('siscor/cor_entrante/', 'refresh');
            //--
        }
    }

    function cor_entranteValida() {
        if (!$this->input->post('txtusuario') && !$this->input->post('txtpersona'))
            echo "1";
        if (!$this->input->post('txtusuario') && $this->input->post('txtpersona'))
            echo "2";
        if ($this->input->post('txtusuario') && !$this->input->post('txtpersona'))
            echo "3";
    }

    function form_interno2e($p) {
        $js = 'onChange="MostrarUsuario2(this.value);" class=":required"';
        if ($p) {
            $txtusuario = $this->siscormodel->get_usuarios_seccione($p);
            if (!$txtusuario) {
                $txtusuario = array('0' => 'Seleccione un elemento...');
            }
        } else {
            $txtusuario = array('0' => 'Seleccione un elemento');
        }
        echo form_dropdown('txtusuario', $txtusuario, '', $js);
    }

    function form_interno3($p) {
        $js = 'class="form-control" required';
        if ($p) {
            $persona1 = $this->siscormodel->get_usu($p)->row();
            if ($persona1) {
                $p1 = $persona1->cod_cargo;
                $cargo_destinartario = $this->siscormodel->get_cargo11($p1);
            } else
                $cargo_destinartario = array('0' => 'Seleccione un elemento');
        }
        else {
            $cargo_destinartario = array('0' => 'Seleccione un elemento...');
        }
        echo form_dropdown('cargo_destinartario', $cargo_destinartario, 'readonly', $js);
    }

    function v_form_entrante2($p) {
        $js = 'onChange="MostrarCargoE(this.value);" class=":required"';
        if ($p) {
            $txtpersona = $this->siscormodel->get_persona_empresa($p);
            if (!$txtpersona) {
                $txtpersona = array('0' => 'Seleccione un elemento...');
            }
        } else {
            $txtpersona = array('0' => 'Seleccione un elemento');
        }

        echo form_dropdown('txtpersona', ($txtpersona), '', $js);
        $atts = array(
            'width' => '400',
            'height' => '460',
            'scrollbars' => 'yes',
            'status' => 'yes',
            'resizable' => 'yes',
            'screenx' => '300',
            'screeny' => '150'
        );
        echo anchor_popup('siscor/form_new_persona/' . base64_encode($p), '<font color="blue">*Agregar Persona</font>', $atts);
    }

    function v_form_entrante3($p) {
        $js = 'class=":required"';
        if ($p) {
            $persona1 = $this->siscormodel->get_persona1($p)->row();
            if ($persona1) {
                $p1 = $persona1->cod_cargo;
                $cargo_e = $this->siscormodel->get_cargo11($p1);
                if (!$cargo_e)
                    $cargo_e = array('0' => 'Seleccione un elemento...');
            } else
                $cargo_e = array('0' => 'Seleccione un elemento...');
        }
        else {
            $cargo_e = array('0' => 'Seleccione un elemento...');
        }
        echo form_dropdown('cargo_e', $cargo_e, '', $js);
    }

    /* INICIO SECCION PERSONA */

    function form_new_persona($kkk) {
        $id_empresa = base64_decode($kkk);
        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        $hora = date("H:i:s");
        $data['hora'] = $hora;
        $fecha = date("d-m-Y");
        $data['fecha'] = $fecha;
        $date = date('Y-m-d H:i:s');
        $data['usuario'] = $usu;
        $data['action'] = site_url('siscor/reg_form_new_persona/' . base64_encode($id_empresa));
        $data['flag'] = "0";
        $data['cargo'] = $this->siscormodel->get_cargoA();
        $data['usu'] = $usu;
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $id_rol_persona = $reg_persona->id_rol;
        $data['flag_representante'] = '';
        $representante = $this->siscormodel->get_representante($cod_persona)->result();
        if ($representante) {
            $data['flag_representante'] = $representante;
        }
        $menu = explode("-", $id_rol_persona);
        $data['menu'] = $menu;
        $this->load->view('siscor/v_form_entrante_new', $data);
    }

    function reg_form_new_persona($kkk) {
        $id_empresa = base64_decode($kkk);
        $fecha = date("d-m-Y");
        $data['fecha'] = $fecha;
        $date = date('Y-m-d H:i:s');
        $usu = $this->session->userdata('usuario');
        $data['usuario'] = $usu;
        $config['base_url'] = site_url('siscor/form_entrante/');
        $data['action'] = site_url('siscor/reg_form_new_empresa');
        $data['flag'] = "0";
        $datos_pers = array('apellidos_persona' => $this->input->post('persona_ap_new'),
            'nombres_persona' => $this->input->post('persona_nom_new'),
            'cod_empresa' => $id_empresa,
            'cod_cargo' => $this->input->post('cargo_new'),
            'usuario_reg' => $usu,
            'usuario_mod' => $usu,
            'fecha_reg' => $date,
            'fecha_mod' => $date,
            'activo' => 'True'
        );
        $this->siscormodel->guardar_pers($datos_pers);

        echo "<script languaje='javascript' type='text/javascript'>opener.location.reload(); window.close();</script>";
    }

    function form_new_cargo($bandera) {
        $hora = date("h:i:s");
        $data['hora'] = $hora;
        $fecha = date("d-m-Y");
        $data['fecha'] = $fecha;
        $date = date('Y-m-d H:i:s', strtotime('-1 hour'));
        $usu = $this->session->userdata('usuario');
        $data['usuario'] = $usu;
        $data['action'] = site_url('siscor/reg_cargo');
        $data['bandera'] = $bandera;

        $this->load->view('siscor/v_form_entrante_new_cargo', $data);
    }

    function reg_cargo() {
        $data['title'] = 'S S.I.E.T.';
        $hora = date("h:i:s");
        $data['hora'] = $hora;
        $fecha = date("d-m-Y");
        $data['fecha'] = $fecha;
        $date = date('Y-m-d H:i:s', strtotime('-1 hour'));
        $usu = $this->session->userdata('usuario');
        $data['usuario'] = $usu;
        $fecha_reg = date('Y-m-d', strtotime($fecha));
        $data['action'] = site_url('siscor/reg_cargo');

        $id = $this->siscormodel->verifica_cargo(mysql_real_escape_string($this->input->post('nuevo_cargo')))->row();
        if ($id) {
            redirect('siscor/form_new_cargo/1');
        }
        $obt_max_cod_profes = $this->siscormodel->obt_max_cod_prof();
        $max_cod_prof = $obt_max_cod_profes->cod_cargo + 1;
        $datos = array('cod_cargo' => $max_cod_prof,
            'desc_cargo' => mysql_real_escape_string($this->input->post('nuevo_cargo')));
        $this->siscormodel->insertar_cargo($datos);
        echo "<script languaje='javascript' type='text/javascript'>opener.location.reload(); window.close();</script>";
    }

    function correo_saliente($offset = 0) {
        $data['action'] = site_url('person/correo_saliente');
        //$fecha_actual = date('Y-m-d h:i:s');
        $fecha_actual = date('Y-m-d H:i:s');
        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        $data['mensaje'] = '';
        $data['table2'] = '';
        //load data     
        //$reg_document = $this->siscormodel->get_document_out($this->limit, $offset, $cod_persona)->result();
        $reg_document = $this->siscormodel->get_document_out1($cod_persona)->result();
        //--- cantidad de entrantes ($k) y no leidos ($j)-----
        $reg_document1 = $this->siscormodel->get_document_in1($cod_persona)->result();
        $j = 0;
        $k = 0;
        foreach ($reg_document1 as $a) {
            if ($a->estado_documento == 'C' && $a->estado_aa != 'ARCHIVADO') {
                if ($a->estado != 'LEIDO') {
                    ++$j;
                }
                ++$k;
            }
        }
        $data['cant_in_noleidos'] = $j;
        $data['cant_in_total'] = $k;
        //-----------------------------
        //--- cantidad de salientes ($kk) ----
        $reg_document11 = $this->siscormodel->get_document_out1($cod_persona)->result();
        $kk = 0;
        foreach ($reg_document11 as $a) {
            ++$kk;
        }
        $kk = $kk - 1;
        if ($kk <= 0) {
            $kk = 0;
        }

        $atts = array(
            'width' => '300',
            'height' => '200',
            'scrollbars' => 'yes',
            'status' => 'yes',
            'resizable' => 'yes',
            'screenx' => '0',
            'screeny' => '0'
        );

        // generate table data
        $this->load->library('table');
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('<p>Ver', '<p>HR (Imprimir)', '<p>F. Limite', '<p>Destinatario', '<p>Asunto', '<p>Fecha Registro');
        $i = 0 + $offset;
        $bot_ipmr = '<i class="icon-">&#xf02f;</i>&nbsp;&nbsp;';
        foreach ($reg_document as $a) {
            $usu_destino = $this->siscormodel->get_usu($a->usuario_destino)->row();
            $foto_usu = '';
            if ($usu_destino->cod_usuario) {
                $foto_usu = //'<a href="'.base_url().'fotos/'.$usu_destino->cod_usuario.'.jpg" rel="'.'prettyPhoto" title="'.$usu_destino->cod_usuario.'">'.
                        '<img src="' . base_url() . 'fotos/' . $usu_destino->cod_usuario . '.jpg" alt="" width="20" height="20"></a>';
            }
            /* $color_semaforo=$this->dias_semaforo($a->fecha_limite);
              $semaforo='<img src="../../style/style/images/'.$color_semaforo.'.png" width="18" height="18"/>'; */
            if ($a->estado_documento == 'C' && $a->estado_aa != 'ARCHIVADO') {
                $this->table->add_row(anchor('siscor/ver_detalle_hr/' . base64_encode('0') . '/' . base64_encode($a->hoja_ruta), '<i class="icon-">&#xf002;</i>'), $bot_ipmr.anchor_popup('siscor/imp_hr1/'.base64_encode($a->hoja_ruta),$a->hoja_ruta,array('class'=>'imprimir')), $a->fecha_limite, $usu_destino->descripcion_usuario, $a->asunto_documento, $a->fecha_registro);
                //$var_tc,anchor_popup('person/imp_hr/'.base64_encode($a->hoja_ruta),$a->hoja_ruta,array('class'=>'imprimir')).$bot_ipmr, $a->fecha_limite, $foto_usu.' '.$usu_remitente->descripcion_usuario, $a->asunto_documento, $a->fecha_registro , $semaforo.$a->estado);
            }
        }

        $data['table'] = $this->table->generate();
        $data['usuario'] = $usu;
        $data['title'] = 'Bandeja de Salida';
        $data['usu'] = $usu;
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $id_rol_persona = $reg_persona->id_rol;
        $data['flag_representante'] = '';
        $representante = $this->siscormodel->get_representante($cod_persona)->result();
        if ($representante) {
            $data['flag_representante'] = $representante;
        }
        $menu = explode("-", $id_rol_persona);
        $data['menu'] = $menu;
        $this->load->view('siscor/form_correo_io', $data);
    }

    function imp_hr($kkk) {
        //error_reporting(E_ALL);
        $hoja_ruta = base64_decode($kkk);
        $num_paginas = '';
        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $hojas_ruta = $this->siscormodel->get_hoja_ruta($hoja_ruta)->result();
        if ($hojas_ruta) {
            $i = 0;
            foreach ($hojas_ruta as $a) {
                $usu_destino = $this->siscormodel->get_usu($a->usuario_destino)->row();
                ++$i;
                //var_dump($a->remitente);
                $remitente1 = $this->siscormodel->get_usu($a->remitente)->row();
                //var_dump($remitente1->descripcion_usuario);
                $remitente[$i] = $remitente1->descripcion_usuario;
                if ($hoja_ruta[0] === 'E') {
                    if ($i === '1') {
                        $remitente1 = $this->siscormodel->get_persona1($a->cod_per_emp)->row();
                        $remitente[0] = $remitente1->nombres_persona . ' ' . $remitente1->apellidos_persona;
                        $seccion_remitente1 = $this->siscormodel->get_empresa1($a->cod_empresa)->row();
                        $seccion_remitente[0] = $seccion_remitente1->desc_empresa;
                    }
                }
                $seccion_remitente1 = $this->siscormodel->get_secciones($a->cod_seccion)->row();
                $seccion_remitente[$i] = $seccion_remitente1->desc_seccion;
                $destino1 = $this->siscormodel->get_usu($a->usuario_destino)->row();
                $destino[$i] = $destino1->descripcion_usuario;
                $seccion_destino1 = $this->siscormodel->get_secciones($a->direccion_destino)->row();
                $seccion_destino[$i] = $seccion_destino1->desc_seccion;
                $tipo_documento1 = $this->siscormodel->get_tipo_documento($a->cod_tipo_documento)->row();
                if ($tipo_documento1) {
                    $tipo_documento[$i] = $tipo_documento1->desc_tipo_documento;
                }
                $cite[$i] = $a->correlativo;
                if ($hoja_ruta[0] === 'E') {
                    if ($i === '1') {
                        $cite[1] = $a->citeE;
                    }
                }
                if ($a->estado_documento == 'C') {
                    $estado_documento[$i] = 'EN CAMINO';
                }
                if ($a->estado_documento == 'D') {
                    $estado_documento[$i] = 'DERIVADO';
                }
                $estado[$i] = $a->estado;
                $fecha_envio[$i] = $a->fecha_registro;
                $tarea[$i] = $a->instruccion_tarea;
                $asunto[$i] = $a->asunto_documento;
                $adjuntos = $this->siscormodel->get_adjuntos($a->cod_documento)->result();
                /* foreach ($adjuntos as $s) {
                  if ($s->Nombre_Archivo) {
                  $this->table->add_row(anchor('siscor/descargar_adjunto/' . base64_encode($s->Id_Adjunto), $s->Nombre_Archivo));
                  }
                  } */
                //--
                $num_hojas[$i] = $a->nro_hojas;
                $anexos[$i] = $a->nro_anexos;
            }
        }
        if ($i >= 6) {
            $num_paginas = 2;
        }
        if ($i >= 12) {
            $num_paginas = 3;
        }
        if ($i >= 18) {
            $num_paginas = 4;
        }
        if ($i >= 24) {
            $num_paginas = 5;
        }
        if ($i >= 30) {
            $num_paginas = 6;
        }
        if ($i >= 32) {
            $num_paginas = 7;
        }
        if ($i >= 48) {
            $num_paginas = 8;
        }
        if ($i >= 54) {
            $num_paginas = 9;
        }
        if ($i >= 60) {
            $num_paginas = 10;
        }
        //--
        if ($i >= 66) {
            $num_paginas = 11;
        }
        $data['num_paginas'] = $num_paginas;
        if ($hoja_ruta[0] == 'I') {
            $tipo_hr = 'INTERNA';
        }
        if ($hoja_ruta[0] == 'E') {
            $tipo_hr = 'EXTERNA';
        }
        $data['i'] = $i;
        $data['remitente'] = $remitente;
        $data['seccion_remitente'] = $seccion_remitente;
        $data['destino'] = $destino;
        $data['cite'] = $cite;
        $data['tipo_documento'] = $tipo_documento;
        $data['seccion_destino'] = $seccion_destino;
        $data['estado'] = $estado;
        $data['estado_documento'] = $estado_documento;
        $data['fecha_envio'] = $fecha_envio;
        $data['tarea'] = $tarea;
        $data['asunto'] = $asunto;
        $data['hoja_ruta'] = $hoja_ruta;
        $data['tipo_hr'] = $tipo_hr;
        $data['usuario_remitente'] = $usu;
        $data['num_hojas'] = $num_hojas;
        $data['anexos'] = $anexos;
        $id_rol_persona = $reg_persona->id_rol;
        $data['flag_representante'] = '';
        $representante = $this->siscormodel->get_representante($cod_persona)->result();
        if ($representante) {
            $data['flag_representante'] = $representante;
        }
        $menu = explode("-", $id_rol_persona);
        $data['menu'] = $menu;
        if (!file_exists("uploads/$usu")) {
            mkdir("uploads/$usu");
        }
        include 'codigoqr/qrlib.php';
        QRcode::png($cite[1] . '--' . $remitente[1] . '--' . $destino[1] . '--' . $asunto[1] . '--' . $fecha_envio[1], "siscorv/uploads/$usu/" . 'archivo.png'); // creates file 
        //var_dump($data);
        $this->load->view('siscor/form_hoja_ruta', $data);
    }

    function imp_hr1($kkk) {
        //error_reporting(E_ALL);
        $hoja_ruta = base64_decode($kkk);
        $num_paginas = '';

        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        //$cod_persona = $this->session->userdata('cod_persona');	
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $hojas_ruta = $this->siscormodel->get_hoja_ruta($hoja_ruta)->result();
        if ($hojas_ruta) {
            $i = 0;
            foreach ($hojas_ruta as $a) {
                $usu_destino = $this->siscormodel->get_usu($a->usuario_destino)->row();
                ++$i;
                $remitente1 = $this->siscormodel->get_usu($a->remitente)->row();
                $remitente[$i] = $remitente1->descripcion_usuario;
                if ($hoja_ruta[0] == 'E') {
                    if ($i == '1') {
                        $remitente1 = $this->siscormodel->get_persona1($a->cod_per_emp)->row();
                        $remitente[0] = $remitente1->nombres_persona . ' ' . $remitente1->apellidos_persona;
                        $seccion_remitente1 = $this->siscormodel->get_empresa1($a->cod_empresa)->row();
                        $seccion_remitente[0] = $seccion_remitente1->desc_empresa;
                    }
                }
                $seccion_remitente1 = $this->siscormodel->get_secciones($a->cod_seccion)->row();
                $seccion_remitente[$i] = $seccion_remitente1->desc_seccion;

                $destino1 = $this->siscormodel->get_usu($a->usuario_destino)->row();
                $destino[$i] = $destino1->descripcion_usuario;
                $seccion_destino1 = $this->siscormodel->get_secciones($a->direccion_destino)->row();
                $seccion_destino[$i] = $seccion_destino1->desc_seccion;

                $tipo_documento1 = $this->siscormodel->get_tipo_documento($a->cod_tipo_documento)->row();
                if ($tipo_documento1) {
                    $tipo_documento[$i] = $tipo_documento1->desc_tipo_documento;
                }
                $cite[$i] = $a->correlativo;
                /* if($hoja_ruta[0]=='E') {
                  if($i=='1'){
                  $cite[1]="S/C";
                  }
                  } */
                if ($hoja_ruta[0] == 'E') {
                    if ($i == '1') {
                        $cite[1] = $a->citeE;
                    }
                }

                if ($a->estado_documento == 'C') {
                    $estado_documento[$i] = 'EN CAMINO';
                }
                if ($a->estado_documento == 'D') {
                    $estado_documento[$i] = 'DERIVADO';
                }
                $estado[$i] = $a->estado;
                $fecha_envio[$i] = $a->fecha_registro;
                $tarea[$i] = $a->instruccion_tarea;
                $asunto[$i] = $a->asunto_documento;
                $adjuntos = $this->siscormodel->get_adjuntos($a->cod_documento)->result();
                foreach ($adjuntos as $s) {
                    if ($s->Nombre_Archivo) {
                        //$this->table->add_row(anchor('siscor/descargar_adjunto/'.base64_encode($s->Id_Adjunto),$s->Nombre_Archivo,array('class'=>'descargar')));
                    }
                }
                //--
                $num_hojas[$i] = $a->nro_hojas;
                $anexos[$i] = $a->nro_anexos;
            }
        }


        if ($i >= 6) {
            $num_paginas = 2;
        }
        if ($i >= 12) {
            $num_paginas = 3;
        }
        if ($i >= 18) {
            $num_paginas = 4;
        }
        if ($i >= 24) {
            $num_paginas = 5;
        }
        if ($i >= 30) {
            $num_paginas = 6;
        }
        if ($i >= 32) {
            $num_paginas = 7;
        }
        if ($i >= 48) {
            $num_paginas = 8;
        }
        if ($i >= 54) {
            $num_paginas = 9;
        }
        if ($i >= 60) {
            $num_paginas = 10;
        }
        $data['num_paginas'] = $num_paginas;
        if ($hoja_ruta[0] == 'I') {
            $tipo_hr = 'INTERNA';
        }
        if ($hoja_ruta[0] == 'E') {
            $tipo_hr = 'EXTERNA';
        }
        $data['i'] = $i;
        $data['remitente'] = $remitente;
        $data['seccion_remitente'] = $seccion_remitente;
        $data['destino'] = $destino;
        $data['cite'] = $cite;
        $data['tipo_documento'] = $tipo_documento;
        $data['seccion_destino'] = $seccion_destino;
        $data['estado'] = $estado;
        $data['estado_documento'] = $estado_documento;
        $data['fecha_envio'] = $fecha_envio;
        $data['tarea'] = $tarea;
        $data['asunto'] = $asunto;
        $data['hoja_ruta'] = $hoja_ruta;
        $data['tipo_hr'] = $tipo_hr;
        $data['usuario_remitente'] = $usu;
        //--
        $data['num_hojas'] = $num_hojas;
        $data['anexos'] = $anexos;

        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $id_rol_persona = $reg_persona->id_rol;
        $data['flag_representante'] = '';
        $representante = $this->siscormodel->get_representante($cod_persona)->result();
        if ($representante) {
            $data['flag_representante'] = $representante;
        }
        $menu = explode("-", $id_rol_persona);
        $data['menu'] = $menu;


        if (!file_exists("/var/www/html/siscorv/uploads/$usu")) {
            mkdir("/var/www/html/siscorv/uploads/$usu");
        }
        include 'codigoqr/qrlib.php';
        QRcode::png($cite[1] . '--' . $remitente[1] . '--' . $destino[1] . '--' . $asunto[1] . '--' . $fecha_envio[1], "uploads/$usu/" . 'archivo.png'); // creates file

        $this->load->view('siscor/form_hoja_ruta', $data);
    }

    function descargar_adjunto($kkk) {
        $usu = $this->session->userdata('usuario');
        if ($usu === false) {
            redirect('/home');
        }
        $Id_Adjunto = base64_decode($kkk);
        $adjunto = $this->siscormodel->get_adjunto($Id_Adjunto)->row();
        $name = $adjunto->Nombre_Archivo;
        $usu1 = $adjunto->Usuario_Registro;
        //var_dump($name);
        $data = file_get_contents("/var/www/html/siscorv/uploads/$usu1/$name"); // Lee el contenido del archivo
        //var_dump($data);
        force_download($name, $data);
    }

    function ver_detalle_hr($kkk1, $kkk2) {
        $flagR = base64_decode($kkk1);
        $hoja_ruta = base64_decode($kkk2);
        $data['hoja_ruta_desarch'] = '';
        $data['hoja_ruta_desarch'] = $hoja_ruta;
        //--
        $hoja_maestra0 = base64_decode($kkk2);
        $ver_hr_maestra = $this->siscormodel->verif_hmaestra($hoja_maestra0)->result();
        //echo $hoja_ruta;
        $data['action'] = site_url('siscor/seguimiento_mostrar/');
        //$fecha_actual = date('Y-m-d h:i:s');
        $fecha_actual = date('Y-m-d H:i:s');
        $usu = $this->session->userdata('usuario');
        if ($usu == false) {
            redirect('/home');
        }
        $cod_per = $this->siscormodel->get_all_persona_usuario($usu)->row();
        $cod_persona = $cod_per->cod_persona;
        $cod_persona = $this->session->userdata('cod_persona');
        //------------------------------------------------------------------
        $data['link_derivar'] = '';
        $data['link_devolver'] = '';
        $data['link_archivar'] = '';
        $data['link_vincular'] = '';
        $data['link_anular'] = '';
        $documemto10 = $this->siscormodel->get_hoja_ruta1($hoja_ruta)->row();
        $cod_documento = $documemto10->cod_documento;
        $document = $this->siscormodel->get_document($cod_documento)->row();
        $data['link_reactivar'] = '';
        if ($document->estado_aa == 'ARCHIVADO') {
            $data['link_reactivar'] = anchor('person/cor_interna_reactivar/' . base64_encode($cod_documento), 'Reactivar', array('class' => 'adelante'));
        }

        $usu_dest = $this->siscormodel->get_usu($document->usuario_destino)->row();
        $usuario_destino = $usu_dest->cod_usuario;
        if ($usu == $usu_dest->cod_usuario) {
            $datos = array('estado' => 'LEIDO');
            $this->siscormodel->update_document($cod_documento, $datos);
            $usuarios = $this->siscormodel->get_usu($document->remitente)->row();
            $usuario_destino = $usuarios->descripcion_usuario;
            // con hoja de ruta
            $hoja_ruta = $document->hoja_ruta;
            if ($hoja_ruta) {

                $data['link_derivar'] = anchor('person/cor_interna2/' . base64_encode($cod_documento), 'Derivar', array('class' => 'adelante'));
                //if($document->estado_aa!='V'){		
                if (!$ver_hr_maestra) {
                    $data['link_vincular'] = anchor('person/cor_vincular/' . base64_encode($cod_documento), 'Vincular', array('class' => 'vincular'));
                }
                $data['link_archivar'] = anchor('person/cor_archivar1/' . base64_encode($cod_documento), 'Archivar', array('class' => 'folder'));
                $data['link_anular'] = anchor('person/cor_anular/' . base64_encode($cod_documento), 'Anular', array('class' => 'anular'));
            }
            //para el flujo
            $cod_flujo = $document->cod_tipo_flujo;
            if ($cod_flujo) {
                $data['link_derivar'] = anchor('person/cor_interna_flujo/' . base64_encode($cod_documento) . '/' . base64_encode('derivar'), 'Derivar', array('class' => 'adelante'));
                $data['link_devolver'] = anchor('person/cor_interna_flujo/' . base64_encode($cod_documento) . '/' . base64_encode('devolver'), 'Devolver', array('class' => 'atras'));
                $documento = $this->siscormodel->get_document($cod_documento)->row();
                $flujo = $this->siscormodel->get_nomf($documento->cod_tipo_flujo)->row();
                $estado_flujo = $this->siscormodel->get_paso_flujoestado($documento->cod_documento, $flujo->id_flujo)->row();
                if ($estado_flujo->estado == 'CERRADO' || $estado_flujo == FALSE) {
                    $data['link_derivar'] = '';
                    $data['link_devolver'] = '';
                }
                if ($estado_flujo->paso == '1' || $estado_flujo == FALSE) {
                    $data['link_devolver'] = '';
                }
            }
        }
        if ($flagR == '1') {
            $datos = array('estado' => 'LEIDO');
            $this->siscormodel->update_document($cod_documento, $datos);
        }
        $data['hoja_ruta'] = $document->hoja_ruta;
        $data['archivado'] = $document->estado_aa;
        //------------------------------------------------------------------
        // generate table adjuntos
        $this->load->library('table');
        $this->table->set_empty("&nbsp;");
        $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
        $data['mensaje'] = '';
        $hojas_ruta = $this->siscormodel->get_hoja_ruta($hoja_ruta)->result();
        if ($hojas_ruta) {
            $i = 0;
            foreach ($hojas_ruta as $a) {
                ++$i;
                $remitente1 = $this->siscormodel->get_usu($a->remitente)->row();
                $remitente[$i] = $remitente1->descripcion_usuario;
                $destino1 = $this->siscormodel->get_usu($a->usuario_destino)->row();
                $destino[$i] = $destino1->descripcion_usuario;
                $cod_destino[$i] = $destino1->cod_persona;
                if ($a->estado_documento == 'C') {
                    $estado_documento[$i] = 'EN CAMINO';
                }
                if ($a->estado_documento == 'D') {
                    $estado_documento[$i] = 'DERIVADO';
                }
                $estado[$i] = $a->estado;
                $estado_aa[$i] = $a->estado_aa;
                $fecha_envio[$i] = $a->fecha_registro;
                $tarea[$i] = $a->instruccion_tarea;
                $asunto[$i] = $a->asunto_documento;
                $adjuntos = $this->siscormodel->get_adjuntos($a->cod_documento)->result();
                foreach ($adjuntos as $s) {
                    if ($s->Nombre_Archivo) {
                        if ($s->Usuario_Registro == $usu) {
                            $this->table->add_row(anchor('person/descargar_adjunto/' . base64_encode($s->Id_Adjunto), $s->Nombre_Archivo, array('class' => 'descargar')), anchor('person/subir_doc_interno/' . base64_encode('M') . '/' . base64_encode($s->Id_Documento), 'Modificar', array('class' => 'editar'))); //MODIFICACION
                            //);
                        } else {

                            $this->table->add_row(anchor('person/descargar_adjunto/' . base64_encode($s->Id_Adjunto), $s->Nombre_Archivo, array('class' => 'descargar'))); //MODIFICACION
                        }
                    }

                    //);
                }
            }
            $data['table'] = '';
            //------para confidencial-----------
            if ($a->confidencial != 'SI') {
                $data['table'] = $this->table->generate();
            } else {
                for ($j = 1; $j <= $i; $j++) {
                    if ($remitente[$j] == $reg_persona->descripcion_usuario || $destino[$j] == $reg_persona->descripcion_usuario) {
                        $data['table'] = $this->table->generate();
                    }
                }
            }
            if ($flagR == '1') {
                $cod_personaR = $cod_destino[$i];
                $data['link_derivar'] = anchor('person/cor_internaR/' . base64_encode($cod_documento) . '/' . base64_encode($cod_personaR), 'Derivar', array('class' => 'adelante'));
            }
            $data['i'] = $i;
            $data['remitente'] = $remitente;
            $data['destino'] = $destino;
            $data['estado'] = $estado;
            $data['estado_aa'] = $estado_aa;
            $data['estado_documento'] = $estado_documento;
            $data['fecha_envio'] = $fecha_envio;
            $data['tarea'] = $tarea;
            $data['asunto'] = $asunto;
            $data['title'] = 'Hoja de Ruta';
            $data['hoja_ruta'] = $hoja_ruta;
            //--- cantidad de entrantes ($k) y no leidos ($j)-----
            $reg_document1 = $this->siscormodel->get_document_in1($cod_persona)->result();
            $j = 0;
            $k = 0;
            foreach ($reg_document1 as $a) {
                if ($a->estado_aa != 'ARCHIVADO') {
                    if ($a->estado_aa != 'ARCHIVADO') {
                        if ($a->estado != 'LEIDO') {
                            ++$j;
                        } ++$k;
                    }
                }
            }
            $data['cant_in_noleidos'] = $j;
            $data['cant_in_total'] = $k;
            //-----------------------------
            $data['mostrar_boton'] = '0';
            $data['usuario_remitente'] = $usu;
            $data['usu'] = $usu;
            $reg_persona = $this->siscormodel->get_all_person($cod_persona)->row();
            $id_rol_persona = $reg_persona->id_rol;
            $data['flag_representante'] = '';
            $representante = $this->siscormodel->get_representante($cod_persona)->result();
            if ($representante) {
                $data['flag_representante'] = $representante;
            }
            $menu = explode("-", $id_rol_persona);
            $data['menu'] = $menu;

            //-- vinculado a principal
            $data['vinculado_a_prin'] = '';
            //echo $hoja_ruta;
            $vinc_a_prin = $this->siscormodel->get_hr_p($hoja_ruta)->row();
            $vap = $vinc_a_prin->hr_maestra;
            $data['vinculado_a_prin'] = $vap;
            //-- vinculados
            $hoja_maestra = base64_decode($kkk2);
            $vinculados = $this->siscormodel->get_hr_vinculados($hoja_maestra)->result();
            $k = 0;
            if ($vinculados) {
                foreach ($vinculados as $vinc) {
                    ++$k;
                    $vinculadohv[$k] = $vinc->hr_actual;
                }
            }
            $data['vinculadohv'] = $vinculadohv;
            $data['k'] = $k;
            //--Desvincular
            $data['desvincular'] = '';
            if ($kkk1 == 'NV') {
                $desvincular = $kkk1;
                $data['desvincular'] = $desvincular;
            }
            //--Desarchivar
            $archivados = $this->siscormodel->get_hr_archivados($hoja_maestra)->result();
            $data['desarchivar'] = '';
            if ($archivados) {
                if ($kkk1 == 'NA') {
                    $desarchivar = $kkk1;
                    $data['desarchivar'] = $desarchivar;
                }
            }
            $data['link_hojaruta_2015'] = $this->siscormodel->get_hoja_ruta3($hoja_ruta, 'Viene de la')->row();
            $this->load->view('siscor/form_seguimiento', $data);
        }
    }

    function modificar_doc($kkk1, $kkk2) {
        $Id_Adjunto = base64_decode($kkk1);
        $Id_Documento = base64_decode($kkk2);

        redirect('person/subir_doc_interno/' . base64_encode('R') . '/' . base64_encode($Id_Documento));
    }

    /* FIN SECCION PERSONA */
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
}

?>
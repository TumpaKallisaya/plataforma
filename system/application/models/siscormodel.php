<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class siscormodel extends Model {

    private $documento = 'documento';
    private $notificacion = 'notificacion';
    private $tb_personas = 'tb_personas';
    private $tb_usuarios = 'tb_usuarios';
    private $tb_roles = 'tb_roles';
    private $tb_asignacion_roles = 'tb_asignacion_roles';
    private $tb_seccion = 'tb_seccion';
    private $estado = 'estado';
    private $flujos = 'flujos';
    private $estado_flujo = 'estado_flujo';
    private $pasos = 'pasos';
    private $tipo_documento = 'tipo_documento';
    private $tb_documento_aux = 'tb_documento_aux';
    private $tb_derivaciones = 'tb_derivaciones';
    private $tb_documento = 'tb_documento';
    private $tb_ticket = 'tb_ticket';
    private $cargo = 'cargo';
    private $tb_adjuntos = 'tb_adjuntos';
    private $empresa = 'empresa';
    private $correlativos_hr = 'correlativos_hr';
    private $correlativos_doc = 'correlativos_doc';
    private $plantilla = 'plantilla';
    private $ciudad = 'ciudad';
    private $pais = 'pais';
    private $tb_hr_reservados = 'tb_hr_reservados';
    private $feriados = 'feriados';
    private $tb_vinculados = 'tb_vinculados';
    private $tb_anulados = 'tb_anulados';
    private $tb_archivados = 'tb_archivados';
    private $tb_categorias = 'tb_categorias';
    private $tb_carpetas = 'tb_carpetas';

    const TABLA_CARGO = 'cargo';
    const CODIGO_CARGO = 'cod_cargo';
    const DESC_CARGO = 'desc_cargo';
    const TABLA_SECCION = 'tb_seccion';
    const DESC_SECCION = 'desc_seccion';
    const TABLA_PERSONA = 'tb_personas';
    const APELLIDOS = 'apellidos_persona';
    const NOMBRES = 'nombres_persona';
    const TABLA_DOCUMENTO = 'tipo_documento';
    const DESC_DOCUMENTO = 'desc_tipo_documento';
    const TABLA_FLUJO = 'flujos';
    const NOM_FLUJO = 'nom_flujo';
    const TABLA_TIPO_DOCUMENTO = 'tipo_documento';
    const COD_TIPO_DOCUMENTO = 'cod_tipo_documento';
    const DESC_TIPO_DOCUMENTO = 'desc_tipo_documento';
    const TABLA_EMPRESA = 'empresa';
    const COD_EMPRESA = 'cod_empresa';
    const DESC_EMPRESA = 'desc_empresa';
    const TABLA_PERSONAS = 'tb_personas';
    const COD_PERSONA = 'cod_persona';
    const NOM_PERSONA = 'nombres_persona';
    const APE_PERSONA = 'apellidos_persona';
    const TB_SECCION = 'tb_seccion';
    const COD_SECCION = 'cod_seccion';
    const EMPRESA = 'empresa';
    const TB_USUARIOS = 'tb_usuarios';
    const COD_USUARIO = 'cod_usuario';
    const DESC_USUARIO = 'descripcion_usuario';
    const TB_ROLES = 'tb_roles';
    const ROL = 'rol';
    const TB_AREAS = 'tb_areas';
    const AREA = 'area';
    const TABLA_CATEGORIAS = 'tb_categorias';
    const DESC_CATEGORIA = 'desc_categoria';
    const TB_CARPETAS = 'tb_carpetas';
    const DESC_CARPETA = 'desc_carpeta';
    const TB_SUBCARPETAS = 'tb_subcarpetas';
    const DESC_SUBCARPETA = 'desc_subcarpeta';

    function get_all_persona_usuario($cod_usuario) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->select('cod_persona');
        $this->db_siscor->from('tb_usuarios');
        $this->db_siscor->where('cod_usuario', $cod_usuario);
        return $this->db_siscor->get();
    }

    function get_all_person($cod_persona) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->select('*');
        $this->db_siscor->from('tb_usuarios');
        $this->db_siscor->join('cargo', 'cargo.cod_cargo = tb_usuarios.cod_cargo', 'left');
        $this->db_siscor->join('tb_seccion', 'tb_seccion.cod_seccion = tb_usuarios.cod_seccion', 'left');
        $this->db_siscor->where('cod_persona', $cod_persona);
        return $this->db_siscor->get();
    }

    function get_hr_reservados($sec_matriz) {//function get_hr_reservados()
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->order_by('id_hr_reservados', 'DESC');
        $this->db_siscor->like('hoja_ruta', $sec_matriz);
        return $this->db_siscor->get($this->tb_hr_reservados);
    }

    function get_document_in1($cod_persona) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->order_by('fecha_registro', 'DESC');
        $this->db_siscor->where('usuario_destino', $cod_persona);
        return $this->db_siscor->get($this->tb_documento);
    }

    function get_representante($cod_representante) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('representante', $cod_representante);
        return $this->db_siscor->get($this->tb_usuarios);
    }

    function get_seccionB() {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_seccion!=', '1');
        $this->db_siscor->where('activo', 'TRUE');
        $this->db_siscor->order_by('cod_seccion', 'asc');
        $query = $this->db_siscor->get(self::TB_SECCION);
        $data = array();
        $data[] = 'Seleccione un elemento ....';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['cod_seccion']] = $row[self::DESC_SECCION];
            }
            return $data;
        }
    }

    function get_persona() {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->order_by('apellidos_persona', 'asc');
        $query = $this->db_siscor->get(self::TABLA_PERSONA);
        $data = array();
        $data[] = 'Seleccione un elemento...';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['cod_persona']] = $row[self::APELLIDOS] . '  ' . $row[self::NOMBRES];
            }
            return $data;
        }
    }

    function get_tipo_doc1E() {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('entrante', '1');
        $this->db_siscor->order_by('desc_tipo_documento', 'asc');
        $query = $this->db_siscor->get(self::TABLA_DOCUMENTO);
        $data = array();
        $data[] = 'Seleccione un elemento...';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['cod_tipo_documento']] = $row[self::DESC_DOCUMENTO];
            }
            return $data;
        }
    }

    function get_empresaA() {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('activo', 'True');
        $this->db_siscor->order_by('desc_empresa', 'asc');
        $query = $this->db_siscor->get(self::EMPRESA);
        $data = array();
        $data[] = 'Seleccione un elemento...';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['cod_empresa']] = $row[self::DESC_EMPRESA];
            }
            return $data;
        }
    }

    function get_correlativosHR_smatriz($seccion_matriz) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('seccion_matriz', $seccion_matriz);
        return $this->db_siscor->get($this->correlativos_hr);
    }

    function update_correlativosHR($cod_correlativos, $data) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_correlativos', $cod_correlativos);
        $this->db_siscor->update($this->correlativos_hr, $data);
    }

    function guardar_reserva($person) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->insert($this->tb_hr_reservados, $person);
        return $this->db_siscor->insert_id();
    }

    function guardar_corinterna($dato) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->insert($this->tb_documento, $dato);
        return $this->db_siscor->insert_id();
    }

    function get_usuarios_seccione($cod_seccion) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->order_by('cod_usuario', 'asc');
        $this->db_siscor->where('cod_seccion', $cod_seccion);
        $this->db_siscor->where('activo', 'True');
        $this->db_siscor->where('entrante', 'SI');
        $query = $this->db_siscor->get(self::TB_USUARIOS);
        $data = array();
        $data[] = 'Seleccione un elemento...';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['cod_persona']] = $row[self::DESC_USUARIO];
            }
            return $data;
        }
    }

    function get_usu($id) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_persona', $id);
        return $this->db_siscor->get($this->tb_usuarios);
    }

    function get_persona_empresa($cod_empresa) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_empresa', $cod_empresa);
        $this->db_siscor->where('activo', 'True');
        $this->db_siscor->order_by('apellidos_persona', 'asc');
        $query = $this->db_siscor->get(self::TABLA_PERSONA);
        $data = array();
        $data[] = 'Seleccione un elemento...';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['cod_persona']] = $row[self::APELLIDOS] . '  ' . $row[self::NOMBRES];
            }
            return $data;
        }
    }

    function get_cargo11($cod_cargo) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_cargo', $cod_cargo);
        $this->db_siscor->order_by('desc_cargo', 'asc');
        $query = $this->db_siscor->get(self::TABLA_CARGO);
        $data = array();
        //$data[]='Seleccione un elemento...'; 
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['cod_cargo']] = $row[self::DESC_CARGO];
            }
            return $data;
        }
    }

    function get_persona1($id) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_persona', $id);
        return $this->db_siscor->get($this->tb_personas);
    }

    function get_cargoA() {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->order_by('desc_cargo', 'asc');
        $query = $this->db_siscor->get(self::TABLA_CARGO);
        $data = array();
        $data[] = 'Seleccione un elemento...';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row['cod_cargo']] = $row[self::DESC_CARGO];
            }
            return $data;
        }
    }

    function save_persona($person) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->insert($this->tb_personas, $person);
        return $this->db_siscor->insert_id();
    }

    function verifica_cargo($nuevo_cargo) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('desc_cargo', utf8_decode($nuevo_cargo));
        return $this->db_siscor->get($this->cargo);
    }

    function insertar_cargo($data) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->insert($this->cargo, $data);
        return $this->db_siscor->insert_id();
    }

    function obt_max_cod_prof() {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->order_by('cod_cargo', 'asc');
        $query = $this->db_siscor->get($this->cargo);
        return $query->last_row();
    }

    function guardar_adjuntos($datos_adj) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->insert($this->tb_adjuntos, $datos_adj);
        return $this->db_siscor->insert_id();
    }

    function delete_reserva($hoja_ruta) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('hoja_ruta', $hoja_ruta);
        $this->db_siscor->delete($this->tb_hr_reservados);
    }

    function guardar_pers($datos_adj) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->insert($this->tb_personas, $datos_adj);
        return $this->db_siscor->insert_id();
    }

    function get_document_out1($cod_persona) {
        //$this->db->order_by('fecha_registro','DESC');
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->order_by('cod_documento', 'desc');
        $this->db_siscor->where('remitente', $cod_persona);
        return $this->db_siscor->get($this->tb_documento);
    }

    function get_hoja_ruta($hoja_ruta) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->order_by('cod_documento', 'asc');
        $this->db_siscor->where('hoja_ruta', $hoja_ruta);
        return $this->db_siscor->get($this->tb_documento);
    }

    function get_empresa1($id) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_empresa', $id);
        return $this->db_siscor->get($this->empresa);
    }

    function get_secciones($cod_seccion) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_seccion', $cod_seccion);
        $this->db_siscor->order_by('cod_seccion', 'asc');
        return $this->db_siscor->get($this->tb_seccion);
    }

    function get_tipo_documento($cod_tipo_documento) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('cod_tipo_documento', $cod_tipo_documento);
        return $this->db_siscor->get($this->tipo_documento);
    }

    function get_adjuntos($cod_documento) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('Id_Documento', $cod_documento);
        return $this->db_siscor->get($this->tb_adjuntos);
    }

    function get_adjunto($Id_Adjunto) {
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('Id_Adjunto', $Id_Adjunto);
        return $this->db_siscor->get($this->tb_adjuntos);
    }

    function verif_hmaestra($hr_maestra) {
        //$this->db->order_by('hr_actual','DESC');
        $this->db_siscor = $this->load->database('siscor', true);
        $this->db_siscor->where('hr_maestra', $hr_maestra);
        $this->db_siscor->where('estado_vinc', 'V');
        return $this->db_siscor->get($this->tb_vinculados);
    }
function get_hoja_ruta1($hoja_ruta){
    $this->db_siscor = $this->load->database('siscor', true);
		$this->db_siscor->order_by('cod_documento','DESC');
		$this->db_siscor->where('hoja_ruta',$hoja_ruta);
		return $this->db_siscor->get($this->tb_documento);
	}

function get_document($cod_documento){
    $this->db_siscor = $this->load->database('siscor', true);
		$this->db_siscor->where('cod_documento',$cod_documento);
		return $this->db_siscor->get($this->tb_documento);
	}
        function get_hr_p($hoja_ruta){
            $this->db_siscor = $this->load->database('siscor', true);
		$this->db_siscor->order_by('hr_actual','DESC');
		$this->db_siscor->where('hr_actual',$hoja_ruta);
		return $this->db_siscor->get($this->tb_vinculados);
	}
        
        function get_hr_vinculados($hr_maestra){
            $this->db_siscor = $this->load->database('siscor', true);
		//$this->db->order_by('hr_actual','DESC');
		$this->db_siscor->where('hr_maestra',$hr_maestra);
		$this->db_siscor->where('estado_vinc','V');
		return $this->db_siscor->get($this->tb_vinculados);
	}
        
        function get_hr_archivados($hr_maestra){
            $this->db_siscor = $this->load->database('siscor', true);
		//$this->db->order_by('hr_actual','DESC');
		$this->db_siscor->where('hr_arch',$hr_maestra);
		$this->db_siscor->where('estado_arch','A');
		return $this->db_siscor->get($this->tb_archivados);
	}
        function get_hoja_ruta3($hoja_ruta,$descripcion){
            $this->db_siscor = $this->load->database('siscor', true);
		$this->db_siscor->where('hoja_ruta',$hoja_ruta);//ASC
		$this->db_siscor->like('asunto_documento',$descripcion);		
		return $this->db_siscor->get($this->tb_documento);
	}
        
        function getListaSecciones(){
            $this->db_siscor = $this->load->database('siscor', true);
        $qry = 'cod_seccion in (3, 4, 6)';
        $this->db_siscor->where($qry);
        $this->db_siscor->order_by('cod_seccion', 'ASC');
        $query = $this->db_siscor->get('tb_seccion');
        
        return $query->result_array();
    }
}
        ?>
<?php
class PersonModel extends Model {
	//-----------------------------------------------------------------
	//------------------    Modulo de Documentos   --------------------
	//-----------------------------------------------------------------
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
	const COD_PERSONA='cod_persona';
	const NOM_PERSONA='nombres_persona';
	const APE_PERSONA='apellidos_persona';

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

	
	function get_hoja_ruta1($hoja_ruta){
		$this->db->order_by('cod_documento','DESC');
		$this->db->where('hoja_ruta',$hoja_ruta);
		return $this->db->get($this->tb_documento);
	}
	function get_hoja_ruta2($hoja_ruta){
		$this->db->order_by('cod_documento','ASC');//ASC
		$this->db->like('hoja_ruta',$hoja_ruta);
		$this->db->group_by('hoja_ruta');//--
		return $this->db->get($this->tb_documento);
	}
		function get_hoja_ruta3($hoja_ruta,$descripcion){
		$this->db->where('hoja_ruta',$hoja_ruta);//ASC
		$this->db->like('asunto_documento',$descripcion);		
		return $this->db->get($this->tb_documento);
	}
	function get_hoja_ruta($hoja_ruta){
		$this->db->order_by('cod_documento','asc');
		$this->db->where('hoja_ruta',$hoja_ruta);
		return $this->db->get($this->tb_documento);
	}
	function flujo_delete($id_flujo){
		$this->db->where('id_flujo', $id_flujo);
		$this->db->delete($this->flujos);
	}
	function get_paso_flujoestado($cod_doc, $id_flujo){
		$this->db->where('id_flujo',$id_flujo);
		$this->db->where('cod_doc',$cod_doc);
		return $this->db->get($this->estado_flujo);
	}
	function get_paso($cod_flujo){
		$this->db->where('id_flujo',$cod_flujo);
		$this->db->order_by('id_pasos','asc');
		return $this->db->get($this->pasos);
	}
	function get_personaf($cod_cargo){
		$this->db->where('cod_cargo',$cod_cargo);
		return $this->db->get($this->tb_personas);
	}
	
	function get_direccionf($cod_persona){
		$this->db->where('jefe_seccion',$cod_persona);
		//--
		$this->db->or_where('ve_reporte',$cod_persona);
		$this->db->or_where('ve_reporte2',$cod_persona);
		$this->db->or_where('ve_reporte3',$cod_persona);
		$this->db->or_where('ve_reporte4',$cod_persona);
		return $this->db->get($this->tb_seccion);
	}
	function guardar_estadoflujo($dato){
		$this->db->insert($this->estado_flujo, $dato);
		return $this->db->insert_id();
	}
//	function update_estadoflujo($id, $dato){
//		$this->db->where('id_estadoflujo', $id);
//		$this->db->update($this->estado_flujo, $dato);
//	}
	function get_feriados(){
	  return $this->db->get($this->feriados);
	}

	//------------------------------------------------------------------
	//---------------    Correo Entrante y Saliente    -----------------
	//------------------------------------------------------------------
	function get_usuarios(){
	  $this->db->order_by('cod_usuario','asc');
      return $this->db->get($this->tb_usuarios);
	}
	function get_usupersona($cod_persona){
	  $this->db->where('cod_persona',$cod_persona);
      return $this->db->get('usuarios');
	}

	function get_document($cod_documento){
		$this->db->where('cod_documento',$cod_documento);
		return $this->db->get($this->tb_documento);
	}
	function get_document_aux($cod_documento){
		$this->db->where('cod_documento',$cod_documento);
		return $this->db->get($this->tb_documento_aux);
	}
	//
	function get_document_pri($cod_documento){
		$this->db->where('cod_documento',$cod_documento);
		return $this->db->get($this->tb_documento);
	}
	//
	function get_document_in($limit = 10, $offset = 0, $cod_persona){
		$this->db->where('usuario_destino',$cod_persona);
		$this->db->order_by('cod_documento','desc');
		return $this->db->get($this->tb_documento, $limit, $offset);
	}
	function get_document_in1($cod_persona){
		$this->db->order_by('fecha_registro','DESC');
		$this->db->where('usuario_destino',$cod_persona);
		return $this->db->get($this->tb_documento);
	}
	
	function get_document_out($limit = 10, $offset = 0, $cod_persona){
		$this->db->where('remitente',$cod_persona);
		$this->db->order_by('cod_documento','desc');
		return $this->db->get($this->tb_documento, $limit, $offset);
	}
	function get_document_out1($cod_persona){
		//$this->db->order_by('fecha_registro','DESC');
		$this->db->order_by('cod_documento','desc');
		$this->db->where('remitente',$cod_persona);
		return $this->db->get($this->tb_documento);
	}
	function get_adjuntos($cod_documento){
		$this->db->where('Id_Documento',$cod_documento);
		return $this->db->get($this->tb_adjuntos);
	}
	function get_adjunto($Id_Adjunto){
		$this->db->where('Id_Adjunto',$Id_Adjunto);
		return $this->db->get($this->tb_adjuntos);
	}
	function get_cargos($cod_cargo){
		$this->db->where('cod_cargo',$cod_cargo);
		return $this->db->get($this->cargo);
	}
	function get_secciones($cod_seccion){
		$this->db->where('cod_seccion',$cod_seccion);
		$this->db->order_by('cod_seccion','asc');
		return $this->db->get($this->tb_seccion);
	}
	function get_seccionesM($seccion_matriz){
		$this->db->where('seccion_matriz',$seccion_matriz);
		$this->db->order_by('cod_seccion','asc');
		return $this->db->get($this->tb_seccion);
	}
	function get_empresass($cod_empresa){
		
		return $this->db->get($this->empresa);
	}
	function get_empresas($limit = 10, $offset = 0){
		$this->db->order_by('cod_empresa','asc');
		return $this->db->get($this->empresa, $limit, $offset);
	}
	function get_empresasN(){
		$this->db->order_by('cod_empresa','asc');
		return $this->db->get($this->empresa);
	}
	function get_pasos11($id_flujo){
		$this->db->where('id_flujo',$id_flujo);
		$this->db->order_by('id_pasos','desc');
		return $this->db->get($this->pasos);
	}
	function count_all_empresas(){
		return $this->db->count_all($this->empresa);
	}
	function get_by_empresa($var){
		$this->db->like('sigla',$var);
		$this->db->or_like('desc_empresa',$var);
		return $this->db->get($this->empresa);
	}
	function get_personasN(){
		$this->db->order_by('cod_persona','asc');
		return $this->db->get($this->tb_personas);
	}
	function get_personas($limit = 10, $offset = 0){
		$this->db->order_by('cod_persona','asc');
		return $this->db->get($this->tb_personas, $limit, $offset);
	}
	function count_all_personas(){
		return $this->db->count_all($this->tb_personas);
	}
	function get_by_persona($var){
		$this->db->like('nombres_persona',$var);
		$this->db->or_like('apellidos_persona',$var);
		return $this->db->get($this->tb_personas);
	}
	
	function get_seccionp($var){
		for($i=0;$i<count($var);$i++){
			$this->db->or_where('desc_seccion',$var[$i]);
		}
		$this->db->order_by('cod_seccion','asc');
		return $this->db->get($this->tb_seccion);
	}
	function get_seccionf(){
		$this->db->order_by('cod_seccion','asc');
		return $this->db->get($this->tb_seccion);
	}

	function update_document($cod_documento, $datos){
		$this->db->where('cod_documento', $cod_documento);
		$this->db->update($this->tb_documento, $datos);
	}
	//------------------------------------------------------------------
	//---------------    Correspondencia Interna    --------------------
	function get_tipo_documento($cod_tipo_documento){
		$this->db->where('cod_tipo_documento',$cod_tipo_documento);
		return $this->db->get($this->tipo_documento);
	}
	function get_tipo_documentoM(){
		$this->db->order_by('cod_tipo_documento','ASC');
		return $this->db->get($this->tipo_documento);
	}
	function update_tipo_documento($cod_tipo_documento, $datos){
		$this->db->where('cod_tipo_documento', $cod_tipo_documento);
		$this->db->update($this->tipo_documento, $datos);
	}
	function save_tipo_documento($datos){
		$this->db->insert($this->tipo_documento, $datos);
		return $this->db->insert_id();
	}
	function get_empresa(){
		$this->db->order_by('cod_empresa','asc');
		$query = $this->db->get($this->empresa);
		return $query->last_row();
	}
	function guardar_emp($datos_adj){
		$this->db->insert($this->empresa, $datos_adj);
		return $this->db->insert_id();
	}

	function get_cargos1(){
		$this->db->order_by('cod_cargo','asc');
		$query = $this->db->get($this->cargo);
		return $query->last_row();
	}
	function guardar_cargo($datos_adj){
		$this->db->insert($this->cargo, $datos_adj);
		return $this->db->insert_id();
	}
	function get_pers(){
		$this->db->order_by('cod_persona','asc');
		$query = $this->db->get($this->tb_personas);
		return $query->last_row();
	}
	function guardar_pers($datos_adj){
		$this->db->insert($this->tb_personas, $datos_adj);
		return $this->db->insert_id();
	}
	function tipo_doc_select(){
	$this->db->order_by('desc_tipo_documento','asc');
	$query = $this->db->get(self::TABLA_TIPO_DOCUMENTO);
    $data = array();
    $data[]='Seleccione un elemento...'; 
    if($query->num_rows()>0){
        foreach($query->result_array() as $row){
            //$data[$row['cod_tipo_documento']]= $row[self::COD_TIPO_DOCUMENTO].'---> ['.$row[self::DESC_TIPO_DOCUMENTO].']';
			$data[$row['cod_tipo_documento']]= $row[self::DESC_TIPO_DOCUMENTO];
			}
        return $data;
		}
	}
	function grabar_form_entrante($dato){
		$this->db->insert($this->tb_documento, $dato);
		return $this->db->insert_id();
	}
	function update_grabar_form_entrante($hoja_ruta,$dato){
		$this->db->where('hoja_ruta', $hoja_ruta);
		$this->db->update($this->tb_documento, $dato);
	}

	function guardar_adjuntos($datos_adj){
		$this->db->insert($this->tb_adjuntos, $datos_adj);
		return $this->db->insert_id();
	}

	function guardar_corinterna($dato){
		$this->db->insert($this->tb_documento, $dato);
		return $this->db->insert_id();
	}
	function guardar_corinterna_aux($dato){
		$this->db->insert($this->tb_documento_aux, $dato);
		return $this->db->insert_id();
	}
	function get_flujo(){
		//$this->db->order_by('cod_seccion','asc');
		$query = $this->db->get(self::TABLA_FLUJO);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['id_flujo']]= $row[self::NOM_FLUJO];
				}
	        return $data;
		}
	}

	function get_seccion(){
		$this->db->order_by('desc_seccion','asc');
		$this->db->where('activo', 'True');
		$query = $this->db->get(self::TABLA_SECCION);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_seccion']]= $row[self::DESC_SECCION];
				}
	        return $data;
		}
	}

	function get_persona(){
		$this->db->order_by('apellidos_persona','asc');
		$query = $this->db->get(self::TABLA_PERSONA);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_persona']]= $row[self::APELLIDOS].'  '.$row[self::NOMBRES];

				}
	        return $data;
		}
	}
	function get_persona_empresa($cod_empresa){
		$this->db->where('cod_empresa', $cod_empresa);
		$this->db->where('activo', 'True');
		$this->db->order_by('apellidos_persona','asc');
		$query = $this->db->get(self::TABLA_PERSONA);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_persona']]= $row[self::APELLIDOS].'  '.$row[self::NOMBRES];

				}
	        return $data;
		}
	}
	function get_usuario1(){
		$this->db->where('activo', 'True');
		$this->db->order_by('cod_usuario','asc');
		$query = $this->db->get(self::TB_USUARIOS);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_persona']]= $row[self::COD_USUARIO];

				}
	        return $data;
		}
	}
	function get_tipo_doc(){
		$this->db->order_by('desc_tipo_documento','asc');
		$query = $this->db->get(self::TABLA_DOCUMENTO);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_tipo_documento']]= $row[self::DESC_DOCUMENTO];
				}
	        return $data;
		}
	}
	function get_tipo_doc1($correlativo_tipo_documento,$tipo){
		$i=0;
		foreach($correlativo_tipo_documento as $c){
			if($i==0){$this->db->where('cod_tipo_documento',$c->cod_tipo_documento);}
			if($i!=0){$this->db->or_where('cod_tipo_documento',$c->cod_tipo_documento);}
			$i++;
		}
		if($tipo=='I'){$this->db->where('interno','1');}
		if($tipo=='E'){$this->db->where('entrante','1');}
		if($tipo=='S'){$this->db->where('saliente','1');}		
		$this->db->order_by('desc_tipo_documento','asc');
		$query = $this->db->get(self::TABLA_DOCUMENTO);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_tipo_documento']]= $row[self::DESC_DOCUMENTO];
				}
	        return $data;
		}
	}
	function get_tipo_doc1E(){
		$this->db->where('entrante','1');
		$this->db->order_by('desc_tipo_documento','asc');
		$query = $this->db->get(self::TABLA_DOCUMENTO);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_tipo_documento']]= $row[self::DESC_DOCUMENTO];
				}
	        return $data;
		}
	}
	function get_tipo_doc1S($correlativo_tipo_documento,$tipo,$cod_seccion){		//para los documentos salientes
		if($cod_seccion=='5'){
			foreach($correlativo_tipo_documento as $c){
				if($tipo=='I'){$this->db->where('interno','1');}
				if($tipo=='E'){$this->db->where('entrante','1');}
				if($tipo=='S'){$this->db->where('saliente','1');}
				$this->db->or_where('cod_tipo_documento',$c->cod_tipo_documento);
			}
		}
		else{
			$this->db->where('desc_tipo_documento','NOTA');
			$this->db->or_where('desc_tipo_documento','CIRCULAR EXTERNA');
			if($cod_seccion=='3'){
				$this->db->or_where('desc_tipo_documento','CERTIFICADO DAF');
				$this->db->or_where('desc_tipo_documento','CERTIFICADO DE CARGOS PENDIENTES');
			}
			$this->db->or_where('desc_tipo_documento','INFORME EJECUTIVO');
			$this->db->or_where('desc_tipo_documento','NOTA DE COMISION CALIFICADORA DE LICITACION');
			$this->db->or_where('desc_tipo_documento','CERTIFICADO DE REGISTRO FPC');
			if($cod_seccion=='6'){
			$this->db->or_where('desc_tipo_documento','CERTIFICADO DE HABILITACION');
			}
			if($cod_seccion=='4'){
			$this->db->or_where('desc_tipo_documento','CERTIFICADO DE OPERADOR VIGENTE');
			$this->db->or_where('desc_tipo_documento','CERTIFICADO DE DESPACHO ADUANERO');
			}
			
		}
		$this->db->order_by('desc_tipo_documento','asc');
		$query = $this->db->get(self::TABLA_DOCUMENTO);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_tipo_documento']]= $row[self::DESC_DOCUMENTO];
				}
	        return $data;
		}
	}

	function get_all_person($cod_persona){
		$this->db->select('*');
		$this->db->from('tb_usuarios');
		$this->db->join('cargo', 'cargo.cod_cargo = tb_usuarios.cod_cargo','left');
		$this->db->join('tb_seccion', 'tb_seccion.cod_seccion = tb_usuarios.cod_seccion','left');
		
		$this->db->where('cod_persona',$cod_persona);
		return $this->db->get();
	}
	function get_representante($cod_representante){
		$this->db->where('representante',$cod_representante);
		return $this->db->get($this->tb_usuarios);
	}
	function representante_delete($cod_persona,$data){
		$this->db->where('cod_persona', $cod_persona);
		$this->db->update($this->tb_usuarios,$data);
	}	
	function get_all_usuario($cod_persona){
		$this->db->where('cod_persona',$cod_persona);
		return $this->db->get($this->tb_usuarios);
	}
	function get_all_usuario_c($cod_usuario){
		$this->db->like('cod_usuario',$cod_usuario);
		return $this->db->get($this->tb_usuarios);
	}
	function get_all_usuario_i($cod_usuario){
		$this->db->where('cod_usuario',$cod_usuario);
		return $this->db->get($this->tb_usuarios);
	}
	function get_all_usuario_e($cod_usuario){
		$this->db->like('cod_usuario',$cod_usuario,'after');
		return $this->db->get($this->tb_usuarios);
	}
	function get_all_seccion_c($desc_seccion){
		$this->db->like('desc_seccion',$desc_seccion);
		return $this->db->get($this->tb_seccion);
	}
	function get_all_seccion_i($desc_seccion){
		$this->db->where('desc_seccion',$desc_seccion);
		return $this->db->get($this->tb_seccion);
	}
	function get_all_seccion_e($desc_seccion){
		$this->db->like('desc_seccion',$desc_seccion,'after');
		return $this->db->get($this->tb_seccion);
	}
	function get_all_cargo_c($desc_cargo){
		$this->db->like('desc_cargo',$desc_cargo);
		return $this->db->get($this->cargo);
	}
	function get_all_cargo_i($desc_cargo){
		$this->db->where('desc_cargo',$desc_cargo);
		return $this->db->get($this->cargo);
	}
	function get_all_cargo_e($desc_cargo){
		$this->db->like('desc_cargo',$desc_cargo,'after');
		return $this->db->get($this->cargo);
	}
	function get_all_documento_c($desc_tipo_documento){
		$this->db->like('desc_tipo_documento',$desc_tipo_documento);
		return $this->db->get($this->tipo_documento);
	}
	function get_all_documento_i($desc_tipo_documento){
		$this->db->where('desc_tipo_documento',$desc_tipo_documento);
		return $this->db->get($this->tipo_documento);
	}
	function get_all_documento_e($desc_tipo_documento){
		$this->db->like('desc_tipo_documento',$desc_tipo_documento);
		return $this->db->get($this->tipo_documento);
	}
	//--
	function get_all_empresa_c($desc_empresa){
		//$this->db->like('desc_empresa',$desc_empresa,'both');
		$this->db->like('desc_empresa',$desc_empresa);
		return $this->db->get($this->empresa);
	}
	function get_all_empresa_i($desc_empresa){
		$this->db->where('desc_empresa',$desc_empresa);
		return $this->db->get($this->empresa);
	}
	function get_all_empresa_e($desc_empresa){
		$this->db->like('desc_empresa',$desc_empresa,'after');
		return $this->db->get($this->empresa);
	}

	//------------------------------------------------------------------
	function count_all_doc(){
		return $this->db->count_all($this->documento);
	}
	function get_persona_destino($id){
		$this->db->where('cod_persona',$id);
		return $this->db->get($this->tb_usuarios);
	}
	function get_persona1($id){
		$this->db->where('cod_persona',$id);
		return $this->db->get($this->tb_personas);
	}
	function get_usu($id){
		$this->db->where('cod_persona',$id);
		return $this->db->get($this->tb_usuarios);
	}
	function get_usu1($id){
		$this->db->where('cod_usuario',$id);
		return $this->db->get($this->tb_usuarios);
	}
	function get_pers1($id){
		$this->db->where('cod_persona',$id);
		return $this->db->get($this->tb_personas);
	}
	function get_empresa1($id){
		$this->db->where('cod_empresa',$id);
		return $this->db->get($this->empresa);
	}
	function count_all_documentosn(){
		return $this->db->count_all($this->tb_documento);
	}
	function get_documentos($limit = 10, $offset = 0){
		$this->db->order_by('cod_documento','desc');
		return $this->db->get($this->documento, $limit, $offset);
	}
	function count_all_documentos(){
		return $this->db->count_all($this->documento);
	}	
	/*function get_documentosu($limit = 10, $offset = 0, $cod_persona){
		$this->db->where('remitente',$cod_persona);
		$this->db->order_by('cod_documento','desc');
		return $this->db->get($this->tb_documento, $limit, $offset);
	}*/
	function get_documentosu($cod_persona){
		$this->db->where('remitente',$cod_persona);
		$this->db->order_by('cod_documento','desc');
		//return $this->db->get($this->tb_documento, 500, 0);//ver los ultimos 500
		return $this->db->get($this->tb_documento);
	}
	function get_documentosn($limit = 10, $offset = 0){
		$this->db->order_by('cod_documento','desc');
		return $this->db->get($this->tb_documento, $limit, $offset);
	}
	function get_documentosn_c($campo,$nombre){
		$this->db->like($campo,$nombre);
		return $this->db->get($this->tb_documento);
	}
	function get_documentos100($cod_seccion,$tipo,$libro){ //(4, I, 2014)
		$this->db->where('gestion',$libro); ///////////////////7+++++++++++++++  habilitar cuando este listo la gestion+++++
		$this->db->where('cod_seccion',$cod_seccion);
		//$this->db->like('hoja_ruta',$tipo);
		$this->db->like('hoja_ruta',$tipo,'after');
		$this->db->order_by('cod_documento','asc');//-- $this->db->order_by('fecha_registro','asc');
		return $this->db->get($this->tb_documento);
	}
	function get_documentos101($cod_seccion,$libro,$busc_hr){ //(4, I, I-LP-741)
		$this->db->where('gestion',$libro);
		$this->db->where('cod_seccion',$cod_seccion);
		$this->db->where('hoja_ruta',$busc_hr);
		$this->db->order_by('cod_documento','asc');
		return $this->db->get($this->tb_documento);
	}	
	function get_documentosG($S_E,$estado,$cod_seccion){
		if($S_E=='S'){$this->db->where('cod_seccion', $cod_seccion);}
		if($S_E=='E'){$this->db->where('direccion_destino', $cod_seccion);}
		$this->db->where('estado',$estado);
		$this->db->where('tic_cor', 'C');
		return $this->db->get($this->tb_documento);
	}
	function get_documentosGS($S_E,$cod_seccion){
		if($S_E=='S'){$this->db->where('cod_seccion', $cod_seccion);}
		if($S_E=='E'){$this->db->where('direccion_destino', $cod_seccion);}
		$this->db->where('tic_cor', 'C');
		return $this->db->get($this->tb_documento);
	}
	function get_documentosR($cod_area,$cod_carpeta){
		$this->db->where('cod_area', $cod_area);
		$this->db->where('cod_carpeta', $cod_carpeta);
		return $this->db->get($this->tb_documento);
	}

	function get_documentosn_i($campo,$nombre){
		$this->db->where($campo,$nombre);
		return $this->db->get($this->tb_documento);
	}
	function get_documentosn_e($campo,$nombre){
		$this->db->like($campo,$nombre);	// like %dato
		return $this->db->get($this->tb_documento);
	}
	function get_hr_reservados($sec_matriz){//function get_hr_reservados()
		$this->db->order_by('id_hr_reservados','DESC');
		//--
		$this->db->like('hoja_ruta',$sec_matriz);
		//--
		return $this->db->get($this->tb_hr_reservados);
	}	
	function guardar_reserva($person){
		$this->db->insert($this->tb_hr_reservados, $person);
		return $this->db->insert_id();
	}
	function delete_reserva($hoja_ruta){
		$this->db->where('hoja_ruta', $hoja_ruta);
		$this->db->delete($this->tb_hr_reservados);
	}

	//_____________________
	//------ Flujos ------
	//_____________________

	function save_flujos($fun){
		$this->db->insert($this->flujos, $fun);
		return $this->db->insert_id();
	}


	function update_flujos($id, $fun){
		$this->db->where('id_flujo', $id);
		$this->db->update($this->flujos, $fun);
	}
	function update_pasos($id, $fun){
		$this->db->where('id_flujo', $id);
		$this->db->update($this->pasos, $fun);
	}

	function get_cargo(){
		$this->db->order_by('desc_cargo','asc');
		$query = $this->db->get(self::TABLA_CARGO);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_cargo']]= $row[self::DESC_CARGO];
				}
	        return $data;
		}
	}
	function get_cargo11($cod_cargo){
		$this->db->where('cod_cargo', $cod_cargo);
		$this->db->order_by('desc_cargo','asc');
		$query = $this->db->get(self::TABLA_CARGO);
	    $data = array();
	    //$data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_cargo']]= $row[self::DESC_CARGO];
				}
	        return $data;
		}
	}

	function save_pasos($fun){
		$this->db->insert($this->pasos, $fun);
		return $this->db->insert_id();
	}
	function get_paged_flujos($limit = 10, $offset = 0){
		$this->db->order_by('id_flujo','asc');
		return $this->db->get($this->flujos, $limit, $offset);
	}
	function get_paged_flujosN(){
		$this->db->order_by('id_flujo','asc');
		return $this->db->get($this->flujos);
	}
	function count_all_flu(){
		return $this->db->count_all($this->flujos);
	}

	function get_cod_flu($num_flu){
		$this->db->where('id_flujo ',$num_flu);
		return $this->db->get($this->pasos);
	}

	function get_nomf($cod_flu){
		$this->db->where('id_flujo ',$cod_flu);
		return $this->db->get($this->flujos);
	}

	//------------------------------------------------
	//-------------- PDF   ---------------------------
	//------------------------------------------------
	function get_paged_list_pdf($ci){
		$this->db->where('ci_funciona', $ci);
		$this->db->order_by('item','asc');
		return $this->db->get($this->activo);
	}

	function get_paged_list2_pdf($ci) {
	    $this->db->where('ci_funciona', $ci);
		$this->db->order_by('item','asc');
		return $this->db->get($this->activo);
	    $posts = array();
	 
	    foreach ($query->result() as $row) {
	        $posts[] = array('item' => $row->item,
				            'codigo' => $row->codigo,
				            'codigo_bie' => $row->codigo_bie,
							'descrip' => $row->descrip);
	    }
	    return $posts;
	}

	function por_ci($ci){
		$this->db->where('ci', $ci);
		return $this->db->get($this->funcionarios);
	}
	
	function count_all_pdf($ci){
		$this->db->where('ci_funciona', $ci);
		return $this->db->count_all_results($this->activo);
	}
	

	//-------------------------------------------------------------------------
	//-------------------------Modulos del Administrador------------------------------------------------
	//-------------------------------------------------------------------------

	function get_seccionA(){
		$this->db->order_by('desc_seccion','asc');
		$query = $this->db->get(self::TB_SECCION);
	    $data = array();
	    $data[]='Seleccione un elemento ...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
				$data[$row['cod_seccion']]= $row[self::DESC_SECCION];
				}
	        return $data;
		}
	}
	function get_seccionB(){
		$this->db->where('cod_seccion!=','1');
		$this->db->where('activo','TRUE');
		$this->db->order_by('cod_seccion','asc');
		$query = $this->db->get(self::TB_SECCION);
	    $data = array();
	    $data[]='Seleccione un elemento ....';
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
				$data[$row['cod_seccion']]= $row[self::DESC_SECCION];
				}
	        return $data;
		}
	}
		function get_seccionC($cod_seccion){
		$this->db->where('cod_seccion',$cod_seccion);	
		$this->db->where('cod_seccion!=','1');
		$this->db->where('activo','TRUE');
		$this->db->order_by('cod_seccion','asc');
		$query = $this->db->get(self::TB_SECCION);
	    $data = array();
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
				$data[$row['cod_seccion']]= $row[self::DESC_SECCION];
				}
	        return $data;
		}
	}

	function get_empresaA(){
		$this->db->where('activo', 'True');
		$this->db->order_by('desc_empresa','asc');
		$query = $this->db->get(self::EMPRESA);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
				$data[$row['cod_empresa']]= $row[self::DESC_EMPRESA];
				}
	        return $data;
		}
	}
    
	function get_cargoA(){
		$this->db->order_by('desc_cargo','asc');
		$query = $this->db->get(self::TABLA_CARGO);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_cargo']]= $row[self::DESC_CARGO];
				}
	        return $data;
		}
	}
	function save_persona($person){
		$this->db->insert($this->tb_personas, $person);
		return $this->db->insert_id();
	}
	function save_empresa1($person){
		$this->db->insert($this->empresa, $person);
		return $this->db->insert_id();
	}
	function save_usuario($person){
		$this->db->insert($this->tb_usuarios, $person);
		return $this->db->insert_id();
	}
	/*function update_usuario($cod_usuario,$datos){
		$this->db->where('cod_usuario', $cod_usuario);
		$this->db->update($this->tb_usuarios,$datos);
	}*/
	function update_empresas($cod_empresa,$data){
		$this->db->where('cod_empresa', $cod_empresa);
		$this->db->update($this->empresa,$data);
	}
	function update_usuarios($cod_usuario,$data){
		$this->db->where('cod_usuario', $cod_usuario);
		$this->db->update($this->tb_usuarios,$data);
	}
	function update_personas($cod_persona,$data){
		$this->db->where('cod_persona', $cod_persona);
		$this->db->update($this->tb_personas,$data);
	}	
	function update_seccion($cod_seccion,$data){
		$this->db->where('cod_seccion', $cod_seccion);
		$this->db->update($this->tb_seccion,$data);
	}	
	function save_seccion($person){
		$this->db->insert($this->tb_seccion, $person);
		return $this->db->insert_id();
	}
	function delete_personas($cod_persona){
		$this->db->where('cod_persona', $cod_persona);
		$this->db->delete($this->tb_personas);
	}	
	function update_au($id, $fun){
		$this->db->where('cod_persona', $id);
		$this->db->update($this->tb_usuarios, $fun);
	}
	
	function get_usuarios_seccion1($cod_seccion){
		$this->db->where('cod_seccion', $cod_seccion);
		return $this->db->get($this->tb_usuarios);
	}
	function get_usuarios_seccion($cod_seccion){
		$this->db->order_by('cod_usuario','asc');
		$this->db->where('cod_seccion',$cod_seccion);
		$this->db->where('activo', 'True');
		$query = $this->db->get(self::TB_USUARIOS);
		$data = array();
		$data[]='Seleccione un elemento...'; 
		//$data[]='';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[$row['cod_persona']]= $row[self::DESC_USUARIO];
				}
			return $data;
			}
	}
	function get_usuarios_seccionf($cod_seccion){
		$this->db->order_by('cod_usuario','asc');
		$this->db->where('cod_seccion',$cod_seccion);
		$this->db->where('activo', 'True');
		$this->db->where('firmante', 'SI');
		$query = $this->db->get(self::TB_USUARIOS);
		$data = array();
		$data[]='Seleccione un elemento...'; 
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[$row['cod_persona']]= $row[self::COD_USUARIO];
				}
			return $data;
			}
	}
	function get_usuarios_seccione($cod_seccion){
		$this->db->order_by('cod_usuario','asc');
		$this->db->where('cod_seccion',$cod_seccion);
		$this->db->where('activo', 'True');
		$this->db->where('entrante', 'SI');
		$query = $this->db->get(self::TB_USUARIOS);
		$data = array();
		$data[]='Seleccione un elemento...'; 
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[$row['cod_persona']]= $row[self::COD_USUARIO];
				}
			return $data;
			}
	}
	function get_usuarios_cargo($cod_cargo){
		$this->db->order_by('cod_usuario','asc');
		$this->db->where('cod_cargo',$cod_cargo);
		$this->db->where('activo', 'True');
		$query = $this->db->get(self::TB_USUARIOS);
		$data = array();
		$data[]='Seleccione un elemento...'; 
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[$row['cod_persona']]= $row[self::COD_USUARIO];
				}
			return $data;
			}
	}

	function get_ciudades(){
		$this->db->order_by('cod_ciudad','asc');
		return $this->db->get($this->ciudad);
	}
	function get_ciudades_by_sigla($sigla){
		$this->db->where('sigla',$sigla);
		return $this->db->get($this->ciudad);
	}
	function get_paises_by_id($cod_pais){
		$this->db->where('cod_pais', $cod_pais);
		return $this->db->get($this->pais);
	}
	
	function get_paises(){
		$this->db->order_by('cod_pais','asc');
		return $this->db->get($this->pais);
	}
	function get_correlativosHR(){
		$this->db->order_by('cod_correlativos','asc');
		return $this->db->get($this->correlativos_hr);
	}
	function get_correlativosHR_smatriz($seccion_matriz){
		$this->db->where('seccion_matriz', $seccion_matriz);
		return $this->db->get($this->correlativos_hr);
	}
	function get_correlativosHR1($seccion_matriz,$alfanumerico){
		$this->db->where('seccion_matriz', $seccion_matriz);
		$this->db->where('alfanumerico', $alfanumerico);
		return $this->db->get($this->correlativos_hr);
	}
	function get_plantillas(){
		$this->db->order_by('cod_plantilla','asc');
		return $this->db->get($this->plantilla);
	}
	function update_correlativosHR($cod_correlativos,$data){
		$this->db->where('cod_correlativos', $cod_correlativos);
		$this->db->update($this->correlativos_hr,$data);
	}	
	function update_correlativosDOC($cod_correlativos,$data){
		$this->db->where('cod_correlativos', $cod_correlativos);
		$this->db->update($this->correlativos_doc,$data);
	}	
	function vaciar_tabla($tabla){
		return $this->db->truncate($tabla);
	}	

	function get_correlativosDOC(){
		$this->db->order_by('cod_correlativos','asc');
		return $this->db->get($this->correlativos_doc);
	}	
	function get_correlativosDOC2($cod_seccion,$cod_tipo_documento){
		$this->db->where('cod_seccion', $cod_seccion);
		$this->db->where('cod_tipo_documento', $cod_tipo_documento);
		return $this->db->get($this->correlativos_doc);
	}		
	function get_correlativoDOC_seccion($cod_seccion){
		$this->db->where('cod_seccion', $cod_seccion);
		return $this->db->get($this->correlativos_doc);
	}
	function get_roles(){
		$this->db->order_by('id_rol','asc');
		return $this->db->get($this->tb_roles);
	}
	function get_roles_by_id($id_rol){
		$this->db->where('id_rol', $id_rol);
		return $this->db->get($this->tb_roles);
	}
	function get_roles_by_rol($rol){
		$this->db->where('rol', $rol);
		return $this->db->get($this->tb_roles);
	}
	function update_rol($id_rol,$data){
		$this->db->where('id_rol', $id_rol);
		$this->db->update($this->tb_roles,$data);
	}
	function save_rol($person){
		$this->db->insert($this->tb_roles, $person);
		return $this->db->insert_id();
	}
	function get_asignacion_roles(){
		$this->db->order_by('id_asignacion_rol','asc');
		return $this->db->get($this->tb_asignacion_roles);
	}
	function asig_rol_delete($id_rol){
		$this->db->where('id_asignacion_rol', $id_rol);
		$this->db->delete($this->tb_asignacion_roles);
	}	
	function get_roles1(){
		$this->db->where('estado', 'True');
		$this->db->order_by('id_rol','asc');
		$query = $this->db->get(self::TB_ROLES);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['id_rol']]= $row[self::ROL];
			}
	        return $data;
		}
	}
	function get_areas(){
		//$this->db->where('estado', 'True');
		$this->db->order_by('cod_area','asc');
		$query = $this->db->get(self::TB_AREAS);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_area']]= $row[self::AREA];
			}
	        return $data;
		}
	}
	function save_asignacion_rol($person){
		$this->db->insert($this->tb_asignacion_roles, $person);
		return $this->db->insert_id();
	}
	function get_asig_roles_by_id($id_rol){
		$this->db->where('id_asignacion_rol', $id_rol);
		return $this->db->get($this->tb_asignacion_roles);
	}
	function update_asignacion_rol($id_rol,$data){
		$this->db->where('id_asignacion_rol', $id_rol);
		$this->db->update($this->tb_asignacion_roles,$data);
	}

	//-- Para archivar
	function get_tipo_categorias($seccion){
		$this->db->order_by('desc_categoria','asc');
		$this->db->where('seccion', $seccion);//where
		$this->db->where('habilitado!=','NO');
		$this->db->or_where('seccion_alterna1',$seccion);//--like seccion_alterna nueva linea
		$this->db->or_where('seccion_alterna2',$seccion);
		$this->db->or_where('seccion_alterna3',$seccion);
		$query = $this->db->get(self::TABLA_CATEGORIAS);
	    $data = array();
	    $data[]='Seleccione un elemento...'; 
	    if($query->num_rows()>0){
	        foreach($query->result_array() as $row){
	            $data[$row['cod_categoria']]= $row[self::DESC_CATEGORIA];
				}
	        return $data;
		}
	}
	function get_carpetas($categoria){
		$this->db->order_by('desc_carpeta','asc');//$this->db->order_by('desc_carpeta','asc'); cod_carpeta
		$this->db->where('cod_categoria',$categoria);
		$this->db->where('habilitado!=','NO');
		$query = $this->db->get(self::TB_CARPETAS);
		$data = array();
		$data[]='Seleccione un elemento...'; 
		//$data[]='';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[$row['cod_carpeta']]= $row[self::DESC_CARPETA];//cod_carpeta //desc_carpeta
				}
			return $data;
			}
	}
	function get_subcarpetas($cod_carpeta){
		$this->db->order_by('desc_subcarpeta','asc');
		$this->db->where('cod_carpeta',$cod_carpeta);
		$query = $this->db->get(self::TB_SUBCARPETAS);
		$data = array();
		$data[]='Seleccione un elemento...'; 
		//$data[]='';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[$row['cod_subcarpeta']]= $row[self::DESC_SUBCARPETA];//cod_carpeta //desc_carpeta
				}
			return $data;
			}
	}
	//-- Vinculados --//
	function guardar_vinculados($dato){
		$this->db->insert($this->tb_vinculados, $dato);
		return $this->db->insert_id();
	}
	function get_hoja_rutav($cod_documento){
		$this->db->order_by('cod_documento','DESC');
		$this->db->where('cod_documento',$cod_documento);
		return $this->db->get($this->tb_documento);
	}
	function get_hr_p($hoja_ruta){
		$this->db->order_by('hr_actual','DESC');
		$this->db->where('hr_actual',$hoja_ruta);
		return $this->db->get($this->tb_vinculados);
	}

	function get_hr_vinculados($hr_maestra){
		//$this->db->order_by('hr_actual','DESC');
		$this->db->where('hr_maestra',$hr_maestra);
		$this->db->where('estado_vinc','V');
		return $this->db->get($this->tb_vinculados);
	}
	/*function get_cant_vinc_a_hr($var_cond){	
	return $this->db->query("SELECT COUNT(hr_actual) AS cant_hr FROM tb_est_ut_i WHERE cod_profesion='$var_cond'");
	}*/
	function update_document_desv($hr, $datos){
		$this->db->where('hr_actual', $hr);
		$this->db->update($this->tb_vinculados, $datos);
	}
	function get_hrp($hrp){
		$this->db->order_by('cod_documento','DESC');
		$this->db->where('hoja_ruta',$hrp);
		return $this->db->get($this->tb_documento);
	}
	function update_document_hrp($cod_hrp, $datos){
		$this->db->where('cod_documento', $cod_hrp);
		$this->db->update($this->tb_documento, $datos);
	}
	//--
	//obt_hrp
	function verif_hmaestra($hr_maestra){
		//$this->db->order_by('hr_actual','DESC');
		$this->db->where('hr_maestra',$hr_maestra);
		$this->db->where('estado_vinc','V');
		return $this->db->get($this->tb_vinculados);
	}
	//-- Anulados --//
	function guardar_anulados($dato){
		$this->db->insert($this->tb_anulados, $dato);
		return $this->db->insert_id();
	}
	//-- 
	function vinculado_delete($cod_documento){
		$this->db->where('cod_documento', $cod_documento);
		$this->db->delete($this->tb_documento);
	}
	//-- ---  Archivados --//
	function guardar_archivados($dato){
		$this->db->insert($this->tb_archivados, $dato);
		return $this->db->insert_id();
	}
	function update_document_desarch($hr, $datos){
		$this->db->where('hr_arch', $hr);
		$this->db->update($this->tb_archivados, $datos);
	}
	function archivado_delete($cod_documento){
		$this->db->where('cod_documento', $cod_documento);
		$this->db->delete($this->tb_documento);
	}
	function get_hr_archivados($hr_maestra){
		//$this->db->order_by('hr_actual','DESC');
		$this->db->where('hr_arch',$hr_maestra);
		$this->db->where('estado_arch','A');
		return $this->db->get($this->tb_archivados);
	}
	//-- Para ver los que son resolución
	function get_all_resolucion($desc_tipo_doc){
		$this->db->where('desc_tipo_documento',$desc_tipo_doc);//where like
		return $this->db->get($this->tipo_documento);
	}
	//-- Para archivados
	function get_document_in_archivados($limit = 10, $offset = 0, $cod_persona){
		$this->db->where('remitente',$cod_persona);
		$this->db->where('estado_aa', 'ARCHIVADO');
		$this->db->order_by('cod_documento','desc');
		return $this->db->get($this->tb_documento, $limit, $offset);
	}

	function get_categoria($cod_categoria){
		$this->db->where('cod_categoria',$cod_categoria);
		return $this->db->get($this->tb_categorias);
	}
	function get_carpeta($cod_carpeta){
		$this->db->where('cod_carpeta',$cod_carpeta);
		return $this->db->get($this->tb_carpetas);
	}
	function get_hr_archivados1($seccion,$categoria,$carpeta){
		//$this->db->order_by('hr_actual','DESC');
		$this->db->where('seccion',$seccion);
		$this->db->where('categoria',$categoria);
		$this->db->where('carpeta',$carpeta);
		$this->db->where('estado_arch','A');
		return $this->db->get($this->tb_archivados);
	}
	function get_documentos100_v($cod_seccion,$tipo,$libro,$ab_offset){ //(4, I, 2014)
		$this->db->where('gestion',$libro); ///////////////////7+++++++++++++++  habilitar cuando este listo la gestion+++++
		$this->db->where('cod_seccion',$cod_seccion);
		//$this->db->like('hoja_ruta',$tipo);
		$this->db->like('hoja_ruta',$tipo,'after');
		$this->db->order_by('cod_documento','asc');//-- $this->db->order_by('fecha_registro','asc');
		//return $this->db->get($this->tb_documento);
		return $this->db->get($this->tb_documento, 10, $ab_offset);
	}
	function get_documentos100_imprimir($cod_seccion,$tipo,$libro,$ab_offset,$limite){ //(4, I, 2014,offset,limit)
		$this->db->where('gestion',$libro); ///////////////////7+++++++++++++++  habilitar cuando este listo la gestion+++++
		$this->db->where('cod_seccion',$cod_seccion);
		//$this->db->like('hoja_ruta',$tipo);
		$this->db->like('hoja_ruta',$tipo,'after');
		$this->db->order_by('cod_documento','asc');//-- $this->db->order_by('fecha_registro','asc');
		//return $this->db->get($this->tb_documento);
		return $this->db->get($this->tb_documento, $limite, $ab_offset);
	}
	function get_documentos100_imp($cod_seccion,$tipo,$libro,$ab_offset){ //(4, I, 2014)
		$this->db->where('gestion',$libro); ///////////////////7+++++++++++++++  habilitar cuando este listo la gestion+++++
		$this->db->where('cod_seccion',$cod_seccion);
		//$this->db->like('hoja_ruta',$tipo);
		$this->db->like('hoja_ruta',$tipo,'after');
		$this->db->order_by('cod_documento','asc');//-- $this->db->order_by('fecha_registro','asc');
		//return $this->db->get($this->tb_documento);
		return $this->db->get($this->tb_documento, 100, $ab_offset);
	}

	//-- Insertar nuevos cargos
	function verifica_cargo($nuevo_cargo){
		$this->db->where('desc_cargo',utf8_decode($nuevo_cargo));
		return $this->db->get($this->cargo);
	}
	function obt_max_cod_prof(){
		$this->db->order_by('cod_cargo','asc');
		$query = $this->db->get($this->cargo);
		return $query->last_row();
	}
	function insertar_cargo($data){
		$this->db->insert($this->cargo,$data);
		return $this->db->insert_id();
	}
	
	function obt_datospi_r_betw($fech_i,$fech_f){
		$this->db->where('fecha_registro >=', $fech_i);//fecha_documento fecha_registro
		$this->db->where('fecha_registro <=', $fech_f);//fecha_documento
		return $this->db->get($this->tb_documento); 
	}

	//******* GRICEL ********
	function verificaCorrelativosDuplicados($cod_seccion, $cod_tipo_documento)
{
    $this->db->where('cod_seccion',$cod_seccion);
    $this->db->where('cod_tipo_documento',$cod_tipo_documento);
    $query = $this->db->get($this->correlativos_doc);
    return $query;
}

function getSeccionCorrelativo($cod_correlativos){
    $sql="select desc_seccion, cod_seccion from tb_seccion where cod_seccion=(select cod_seccion from correlativos_doc where cod_correlativos=?)";
    $res2=$this->db->query($sql,array($cod_correlativos));
    return $res2;
}
function getTipoDocumentoCorrelativo($cod_correlativos){
    $sql="select desc_tipo_documento, cod_tipo_documento from tipo_documento where cod_tipo_documento=(select cod_tipo_documento from correlativos_doc where cod_correlativos=?)";
    $res2=$this->db->query($sql,array($cod_correlativos));
    return $res2;
}
function getAlfanumericoCorrelativo($cod_correlativos){
    $sql="select alfanumerico from correlativos_doc where cod_correlativos=?";
    $res2=$this->db->query($sql,array($cod_correlativos));
    return $res2;
}
function getFechaCorrelativo($cod_correlativos){
    $sql="select fecha_max from correlativos_doc where cod_correlativos=?";
    $res2=$this->db->query($sql,array($cod_correlativos));
    return $res2;
}
function getContadorCorrelativo($cod_correlativos){
    $sql="select num_max from correlativos_doc where cod_correlativos=?";
    $res2=$this->db->query($sql,array($cod_correlativos));
    return $res2;
}

function saveTipoCorrelativo($dato){
		$this->db->insert($this->correlativos_doc, $dato);
		return $this->db->insert_id();
	}

function updateTipoCorrelativo($cod_correlativos, $datos){
		$this->db->where('cod_correlativos', $cod_correlativos);
		$this->db->update($this->correlativos_doc, $datos);
	}

/* REPORTES HOJAS DE RUTAS PENDIENTES*/
	function verPendientesPorUnidad(){
		$this->db->select('DISTINCT (tb_seccion.desc_seccion),tb_seccion.cod_seccion , COUNT(*) as conteo');
		$this->db->from('tb_documento'); 
		$this->db->join('tb_seccion', 'tb_documento.direccion_destino=tb_seccion.cod_seccion', 'left');
		$this->db->join('tb_usuarios', 'tb_documento.usuario_destino=tb_usuarios.cod_persona', 'left');
		$this->db->where('tb_usuarios.descripcion_usuario is not NULL AND tb_seccion.desc_seccion is not NULL AND tb_documento.hoja_ruta is not NULL AND (tb_documento.estado_documento="C" OR tb_documento.usuario_destino=0)');
		$this->db->group_by('tb_seccion.desc_seccion');
		$this->db->order_by('COUNT(*)','desc');         
		 $query = $this->db->get();
		 return $query;

	}

	function verPendientesPorUnidadUsuarios($cod_seccion){
		$this->db->select('DISTINCT (tb_usuarios.descripcion_usuario), tb_usuarios.cod_usuario ,COUNT(*) as conteo');
	            $this->db->from('tb_documento'); 
	            $this->db->join('tb_usuarios', 'tb_documento.usuario_destino=tb_usuarios.cod_persona', 'left');
	            $this->db->where('tb_documento.direccion_destino', $cod_seccion);
	            $this->db->where('tb_usuarios.descripcion_usuario!="" AND (tb_documento.estado_documento="C" OR tb_documento.usuario_destino=0)');
	            $this->db->group_by('tb_usuarios.descripcion_usuario');
	            $this->db->order_by('COUNT(*)','desc');
	            $query = $this->db->get();
	            return $query;
	}

function getPendientesPorUsuario($cod_usuario){
$this->db->select('tb_documento.hoja_ruta, tb_usuarios.descripcion_usuario,tb_usuarios.cod_usuario, tb_usuarios.cod_persona,tb_documento.remitente,tb_documento.fecha_registro, tb_documento.asunto_documento, tb_documento.remitente, tb_documento.fecha_documento');
$this->db->from('tb_documento'); 
$this->db->join('tb_usuarios', 'tb_documento.usuario_destino=tb_usuarios.cod_persona', 'left');
$this->db->where('tb_documento.usuario_destino',$cod_usuario);
$this->db->where('(tb_documento.estado_documento="C" OR tb_documento.usuario_destino=0)');
$this->db->order_by('tb_documento.fecha_documento');
$query = $this->db->get();
return $query;
}
function getUsuariosPorCodPersona($cod_persona){
		$this->db->where('cod_persona',$cod_persona);
    $query = $this->db->get($this->tb_usuarios);
    return $query;
}

	function getPersonaPorCodigoUsuario($cod_usuario){
	    $this->db->where('cod_usuario',$cod_usuario);
	    $query = $this->db->get($this->tb_usuarios);
	    return $query; 
	}

	function getSeccion(){
			$this->db->select('cod_seccion, desc_seccion');
			$this->db->where('activo','TRUE');
			$this->db->order_by('cod_seccion','asc');
			$query = $this->db->get(self::TB_SECCION);
		    $data = array();
		    $data['desc_seccion']='Seleccione un elemento ....';
					foreach($query->result() as $row){
	           $data[htmlspecialchars($row->cod_seccion, ENT_QUOTES)] = htmlspecialchars($row->desc_seccion, ENT_QUOTES);
	         }
	        $query->free_result();
		    return $data;
		}

	function getUsuarios($cod_usuario){
			$this->db->where('cod_usuario',$cod_usuario);
	    $query = $this->db->get($this->tb_usuarios);
	    return $query;
	}
	function get_desc_seccion($cod_seccion){
    $this->db->where('cod_seccion',$cod_seccion);
    $query = $this->db->get($this->tb_seccion);
    return $query;    
}
function getPersonasAll(){
$sql='select CONCAT(tb_personas.nombres_persona,"  ", tb_personas.apellidos_persona) as "nombres", 
				tb_personas.cod_empresa, empresa.desc_empresa, tb_personas.cod_persona,
				cargo.desc_cargo,tb_personas.usuario_reg, tb_personas.fecha_reg, tb_personas.usuario_mod, tb_personas.fecha_mod, IF(tb_personas.activo="True","Activo","Inactivo") as estado
        FROM tb_personas
        LEFT JOIN empresa on tb_personas.cod_empresa=empresa.cod_empresa
        LEFT JOIN cargo on tb_personas.cod_cargo=cargo.cod_cargo
        order by (CONCAT(tb_personas.nombres_persona,"  ", tb_personas.apellidos_persona))';
$res2=$this->db->query($sql);
return $res2;
}
	//******* GRICEL ********
 /********************************************/
        /*****  BUSQUEDAS AVANZADAS: INICIO   *******/
        /********************************************/
        function obtener_nombre_columnas($tabla)
        {	//echo $tabla;
            $consulta = "
                SELECT 
                    column_name, column_comment, column_type
                FROM 
                    INFORMATION_SCHEMA.COLUMNS 
                WHERE 
                    TABLE_SCHEMA='dbsiscor2016'
                AND 
                    TABLE_NAME='$tabla' 
                    ";
            $query = $this->db->query($consulta);
            
            return $query->result();
        }
        
        function obtener_consulta_desde_documento($tablaBusqueda)
        {
            $columnas = $this->personModel->obtener_nombre_columnas($tablaBusqueda);            
            $query = "";
            
            foreach ($columnas as $col)
            {
                //if(!empty($col->column_comment))
                {
                    $query .= $col->column_name . ",";
                }
            }
            
            $consulta = "SELECT " . substr($query, 0, strlen($query) - 1) . " FROM $tablaBusqueda ORDER BY 1";
            return $consulta;
        }
        
        function obtener_consulta_desde_paquete($paquete, $tablaBusqueda)
        {   
            $consultas = array();
            
            foreach($paquete as $paq)
            {                            
                $columna = base64_decode($paq['cmbColumnaFiltro']);
                $operador = $paq["cmbCriterioFiltro"];
                
                if(strlen($columna) > 5)
                {                    
                    if(strtolower(substr($columna, 0, 5)) == 'fecha')
                    {
                        $desde = date("Y-m-d", strtotime($paq["txtFechaDesde"]));
                        $hasta = date("Y-m-d", strtotime($paq["txtFechaHasta"]));                        
                    }
                    else
                    {
                        $desde = $paq["txtColumnaDesde"];
                        $hasta = $paq["txtColumnaHasta"];
                    }
                }
                else
                {
                    $desde = $paq["txtColumnaDesde"];
                    $hasta = $paq["txtColumnaHasta"];
                }
                
                if($paq["rdGrupo"] == "Y")
                {
                    $condicion = "AND";
                }
                elseif($paq["rdGrupo"] == "O")
                {
                    $condicion = "OR";
                }
                
                if($operador == 'entre')
                {
                    $consulta = $columna . $this->obtener_condicion_desde_paquete($operador, "") . "\"$desde\" AND \"$hasta\" $condicion ";
                }
                else 
                {
                    $consulta = $columna . $this->obtener_condicion_desde_paquete($operador, $desde) . " $condicion ";
                }
                                
                $consultas[] = $consulta;
            }
            
            $columnas = $this->personModel->obtener_nombre_columnas($tablaBusqueda);            
            $query = "";
            
            foreach ($columnas as $col)
            {
                if(!empty($col->column_comment))
                {
                    $query .= $col->column_name . ",";
                }
            }
                        
            $query = "select " . substr($query, 0, strlen($query) - 1) . " FROM $tablaBusqueda WHERE ";
            $query2  ="";
            
            for($i=0; $i < count($consultas) ; $i++)
            {
                if($i == (count($consultas) - 1))
                {
                    if(substr($consultas[$i], strlen($consultas[$i]) - 4, strlen($consultas[$i])) == "AND ")
                    {
                        $query2 .= substr($consultas[$i], 0, strlen($consultas[$i]) - 4);
                    }
                    else 
                    {
                        $query2 .= substr($consultas[$i], 0, strlen($consultas[$i]) - 3);
                    }
                }
                else
                {
                    $query2 .= $consultas[$i] . " "; 
                }
            }
            
            $resultado = $query . $query2 . " ORDER BY 1";
            ////echo "RESULTADO: " . $resultado;
            return $resultado;
        }
        
        function obtener_consulta_desde_paquete_paginacion($consulta, $limit=30, $offset)
        {
            if($offset=="")
            {
                $offset = 0;                
            }
            
            $lista = split("ORDER BY", $consulta);
            $respuesta = $lista[0] . " ORDER BY cod_documento DESC LIMIT $offset, $limit ";            
            return $respuesta;
        }
        
        function obtener_numero_filas($consulta)
        {
            $lista = split("FROM", $consulta);
            $query = "Select count(*) as conteo FROM " . $lista[1];            
            return $this->db->query($query);            
        }
        
        function obtener_consulta_desde_cadena($cadena)
        {
            $consulta = $this->db->query($cadena);
            return $consulta;
        }
        
        function obtener_condicion_desde_paquete($operador, $valor)
        {
            switch ($operador)
            {
                case "entre":
                    return " BETWEEN ";
                    break;
                case "igual":
                    return "=\"$valor\"";
                    break;
                case "contenga":
                    return " like \"%$valor%\"";
                    break;
                default:
                    break;
            }

            return;
        }
        /********************************************/
        /*****  BUSQUEDAS AVANZADAS: FIN  ***********/
        /********************************************/

        // Nuevas Busquedas
 
function get_datos_person($cod_persona){
$this->db->select('*');
$this->db->from('tb_usuarios');
$this->db->where('cod_persona',$cod_persona);
return $this->db->get();
}
 function get_seccion_person($cod_usuario){
$this->db->select('*');
$this->db->from('tb_seccion');
$this->db->join('tb_usuarios', 'tb_usuarios.cod_seccion = tb_seccion.cod_seccion','left');
$this->db->where('tb_usuarios.cod_usuario',$cod_usuario);
return $this->db->get();
}

}
?>
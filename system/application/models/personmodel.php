<?php

class PersonModel extends Model {

    function InputSelect1($LaKeySelection, $LosElementos, $compA, $compB) {//echo $compB;
        $this->db->order_by($LosElementos, 'ASC');
        $this->db->where($compA, $compB);
        $query = $this->db->get($LaKeySelection); //echo var_dump($query);
        $data = array();
        $data[] = 'Todos'; //aqui agregamos una opcion sin valor a nuestro select, la cual sera la seleccion por defecto
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row[$LosElementos]] = $row[$LosElementos];
            }
            return $data;
        }
    }

    function getTable($table) {
        return $this->db->get($table);
    }

    function getTable0($table, $id1, $id2) {
        $this->db->where($id1, $id2);
        return $this->db->get($table);
    }

    function getTable1($table, $id1, $id2, $id3, $id4) {
        $this->db->where($id1, $id2);
        $this->db->where($id3, $id4);
        return $this->db->get($table);
    }

    function deleteTable($table, $id0, $id1) {
        $this->db->where($id0, $id1);
        $this->db->delete($table);
    }

    function deleteTable1($table, $id0, $id1, $id2, $id3) {
        $this->db->where($id0, $id1);
        $this->db->where($id2, $id3);
        $this->db->delete($table);
    }

    function updateTable($table, $data, $id0, $id1) {
        $this->db->where($id0, $id1);
        $this->db->update($table, $data);
    }

    function saveTable($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    //----------------------------------------------------------------------
    /** graba tarjeta by neko */
    function save_tarjeta($data) {
        $this->db->insert("tb_tarjeta", $data);
        return $this->db->insert_id();
    }

    /** consigue tarjeta by neko */
    function get_tarjeta($id_usu) {
        $this->db->where('id_usuario', $id_usu);
        return $this->db->get("tb_tarjeta");
    }

    /* actualiza la tarjeta by neko */

    function update_tarjeta($data, $id_usu) {
        $this->db->where('id_usuario', $id_usu);
        return $this->db->update("tb_tarjeta", $data);
    }

///////////////////////////////(((((((((((((((((((((((((((((((((((
    ///////// modulos de configuracion//////////////////////
    /////////////////////////////////////////////////////////
    function get_roles_by_id($id) {
        $this->db->where('Id_Rol', $id);
        return $this->db->get("tb_rol");
    }

    function get_usu($id) {
        $this->db->where('id_usuario', $id);
        return $this->db->get("tb_usuarios");
    }

    function get_by_id_SLD($sl_table, $id_table, $id) {
        $this->db->order_by('Id_Adjunto', 'DESC');
        $this->db->where($id_table, $id);
        return $this->db->get($sl_table);
    }

    function get_by_id_SL($sl_table, $id_table, $id) {
        $this->db->where($id_table, $id);
        return $this->db->get($sl_table);
    }

    function get_usuarios1() {
        $this->db->where('id_rol', '3');
        $this->db->or_where('id_rol', '4');
        $this->db->order_by('id_usuario', 'asc');
        return $this->db->get("tb_usuarios");
    }

    function get_usuarios2() {
        $this->db->where('id_rol', '3');
        $this->db->order_by('id_usuario', 'asc');
        return $this->db->get("tb_usuarios");
    }

    function save_usuario($data) {
        $this->db->insert("tb_usuarios", $data);
        return $this->db->insert_id();
    }

    function InputSelect4($LaKeySelection, $LosElementos, $Id, $TipoC, $Tipo) {
        $this->db->where($TipoC, $Tipo);
        $this->db->order_by($Id, 'asc');
        $query = $this->db->get($LaKeySelection);
        $data = array();
        $data[] = 'Seleccione un elemento'; //aqui agregamos una opcion sin valor a nuestro select, la cual sera la seleccion por defecto
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[$row[$Id]] = $row[$LosElementos];
            }
            return $data;
        }
    }

    function update_usuarios($id_usuario, $data) {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update("tb_usuarios", $data);
    }

    /* INICIO MODULO GRIS */

    function get_operadores() {
        $this->db->order_by('Id', 'asc');
        return $this->db->get("tb_operador");
    }

    function insert_operador_temporal($data) {
        $this->db->insert("tb_operador_tmp", $data);
    }

    function update_operador($id_operador, $data) {
        $this->db->where('Id_Operador', $id_operador);
        $this->db->update("tb_operador", $data);
    }

    function get_operador($id_operador) {
        $this->db->where('Id_Operador', $id_operador);
        return $this->db->get("tb_operador");
    }

    function get_operadores_tmp() {
        $this->db->order_by('Id', 'asc');
        $this->db->where('estado_actualizacion', '0');
        return $this->db->get("tb_operador_tmp");
    }

    function get_operadores_tmp_id($id) {
        $this->db->where('Id', $id);
        return $this->db->get("tb_operador_tmp");
    }

    function update_operador_tmp_id($id, $data) {
        $this->db->where('id', $id);
        $this->db->update("tb_operador_tmp", $data);
    }

//Obtener todos los estados de las solicitudes de modificacion
    function get_estado_solicitud() {
        $res2 = $this->db->get("tb_estado_solicitud");
        return $res2;
    }

    function select_estado_solicitud() {
        $query = $this->db->get("tb_estado_solicitud");
        $data = array();
        $data[] = 'Seleccione una acción'; //aqui agregamos una opcion sin valor a nuestro select, la cual sera la seleccion por defecto
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                if ($row['id'] != 2)
                    $data[$row['id']] = $row['descripcion_solicitud'];
            }
            return $data;
        }
    }

    function get_estado_solicitud_id($cod_estado_solicitud) {
        $this->db->where('cod_estado_solicitud', $cod_estado_solicitud);
        return $this->db->get("tb_estado_solicitud");
    }

    function set_estado_solicitud($data) {
        $this->db->insert("tb_estado_solicitud", $data);
    }

    /* Obtener operador por id usuario */

    function get_operador_usuario($id_usuario) {
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->get("tb_usuario_operador");
    }

    /* FIN MODULO GRIS */
}

?>
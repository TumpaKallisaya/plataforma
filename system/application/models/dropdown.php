<?php 
class dropdown extends Model{
const TABLA_REGISTROS = 'cuenta';
const ID = 'Id_cuenta';
const NUMERO_CUENTA = 'Numero_cuenta';
//constructor

function llenar_select(){
    $query = $this->db->get(self::TABLA_REGISTROS);
    $data = array();
    $data[]='Seleccion un elemento'; //aqui agregamos una opcion sin valor a nuestro select, la cual sera la seleccion por defecto
    if($query->num_rows()>0){
        foreach($query->result_array() as $row){
            $data[$row['Id_Cuenta']]= $row[self::NUMERO_CUENTA];
        }
        return $data;
    }
}
}
<?php
class ClientesDAO{
    private $coneccion; 
    public function __construct( ){
     
        $this->coneccion= new ConeccionBD ("CLIENTES");
    }
     
    //Metodos de consulta
    public function Buscar($id){
        return $this->coneccion->Select(" where id=$id");
    }
    public function Todos(){
        return $this->coneccion->getAll();
    }
    public function TraerClientesDe($idLocalidad){
        return $this->coneccion->Select(" where id_localidad=$idLocalidad");
    }
    public function Guardar($obj){
        if(!isset($obj->_id)){
            $id= $this->coneccion->UltimoID();
            $obj->_id=$id+1;
        }
        $save=$this->coneccion->Insert("(id,nombre,apellido,mail,domicilio,dni,celular,id_localidad) VALUES(NULL,
                       '".$obj->_nombre."',
                       '".$obj->_apellido."',
                       '".$obj->_mail."',
                       '".$obj->_domicilio."',
                       ".$obj->_dni.",
                       '".$obj->_celular."',
                       ".$obj->_localidad->_id.");");
                       
        //$this->db()->error;
        return $obj->_id;
    }
    
}
?>
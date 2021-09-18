<?php
class Formas_pagosDAO{
    private $coneccion; 
    public function __construct( ){
     
        $this->coneccion= new ConeccionBD ("FORMAS_PAGOS");
    }
     
    //Metodos de consulta
    public function Todos(){
        return $this->coneccion->getAll();
    }
    public function TraerOrdenado(){
        return $this->coneccion->Select(" order by id");
    }
    public function Guardar($obj){
        if(isset($obj->_id) || $obj->_id==""){
            $id= $this->coneccion->UltimoID();
            $obj->_id=$id+1;
        }
        $save=$this->coneccion->Insert("(id,nombre,recargo) VALUES (".$obj->_id.",
                       '".$obj->_nombre."',".$obj->_recargo.");");
        //$this->db()->error;
        echo $save;
        return $save;
    }
    public function Borrar($id){
        $this->coneccion->Delete("id=".$id);
    }
    
}
?>
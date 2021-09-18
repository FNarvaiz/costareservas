<?php
class LocalidadesDAO{
    private $coneccion; 
    public function __construct( ){
     
        $this->coneccion= new ConeccionBD ("LOCALIDADES");
    }
     
    //Metodos de consulta
    
    public function Todos(){
        return $this->coneccion->getAll();
    }
    public function TraerLocalidadesDe($idProvincia){
        return $this->coneccion->Select(" where id_provincia=$idProvincia");
    }
    
    public function Guardar($obj){
        $save=$this->coneccion->Insert("(id,nombre,id_provincia) VALUES(NULL,'".$obj->_id."',
                       '".$obj->_nombre."',
                       ".$obj->_provincia->_id.");");
        //$this->db()->error;
        return $save;
    }
    
}
?>
<?php
class ProvinciasDAO{
    private $coneccion; 
    public function __construct( ){
     
        $this->coneccion= new ConeccionBD ("PROVINCIAS");
    }
     
    //Metodos de consulta
    
    public function Todos(){
        return $this->coneccion->getAll();
    }
    public function Guardar($obj){
        $save=$this->coneccion->Insert("(id,nombre) VALUES(NULL,'".$this->_id."',
                       '".$this->_nombre."');");
        //$this->db()->error;
        return $save;
    }
    
}
?>
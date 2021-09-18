<?php
class PagosDAO{
    private $coneccion; 
    public function __construct( ){
     
        $this->coneccion= new ConeccionBD ("PAGOS");
    }
     
    //Metodos de consulta
    public function Todos(){
        return $this->coneccion->getAll();
    }
    
    
    public function Guardar($idPago){
         ini_set('date.timezone','America/Argentina/Buenos_Aires'); 
                $fecha= date("Ymd h:i:s");
        $save=$this->coneccion->Insert("(id,fecha) VALUES(".$idPago.",'".$fecha."');");
        //$this->db()->error;
        return $save;
    }
    
}
?>
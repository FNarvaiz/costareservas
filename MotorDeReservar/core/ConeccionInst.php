<?php
class Coneccionint{
    private $coneccion;
    private static $instancia;
    public function __construct() {
        $this->coneccion= new mysqli("localhost", "c0210196_facu", "Facundo232", "c0210196_pruebas");
        $this->coneccion->query("SET NAMES 'utf8'");
        
    }
    
    public static function conexionActual(){
         
        if (!isset(self::$instancia)) {
            $nuevaInstancia = new Coneccionint();
            self::$instancia = $nuevaInstancia;
        } 
        return self::$instancia->coneccion;
    }
     
    public function startFluent(){
        require_once "FluentPDO/FluentPDO.php";
         
        if($this->driver=="mysql" || $this->driver==null){
            $pdo = new PDO($this->driver.":dbname=".$this->database, $this->user, $this->pass);
            $fpdo = new FluentPDO($pdo);
        }
         
        return $fpdo;
    }
}
?>
<?php
class Conectar{
    private $driver;
    private $host, $user, $pass, $database, $charset;
   
    public function __construct() {
        $this->driver="mysql";
        $this->host="localhost";
        $this->user="root";
        $this->pass="";
        $this->database="pruebas";
        $this->charset="utf8";
    }
    
    public function conexion(){
         
        if($this->driver=="mysql" || $this->driver==null){
            $con=new mysqli($this->host, $this->user, $this->pass, $this->database);
            $con->query("SET NAMES '".$this->charset."'");
        }
         
        return $con;
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
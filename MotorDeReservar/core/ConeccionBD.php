<?php
class ConeccionBD{
    private $_tabla;
    private $_db;
    
    public function __construct($tabla) {
         
            require_once 'ConeccionInst.php';
         //   echo $this->conectar;
            $this->_db= Coneccionint::conexionActual();
         $this->_tabla=$tabla;
    }
    
    public function db(){
        return $this->_db;
    }
     
    public function getAll(){
        $query=$this->_db->query("SELECT * FROM $this->_tabla ORDER BY id asc");
          
        //Devolvemos el resultset en forma de array de objetos
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
         $query->close();
        return $resultSet;
    }
    private function ConvertirArreglo($resultado){
        $resultSet= array();
        if($resultado->num_rows>0){
            while ($row = $resultado->fetch_object()) {
            $resultSet[]=$row;
            }
        }
        return $resultSet;

    }
    public function query($sentencia){
        $query=$this->_db->query($sentencia);
    }
    public function Select($condicion)
    {
        $query=$this->_db->query("SELECT * FROM $this->_tabla $condicion");
        
        //Devolvemos el resultset en forma de array de objetos
        $resultSet=$this->ConvertirArreglo($query);
        $query->close();
        return $resultSet;
    }
    public function SelectDeQuery($consulta)
    {
        $query=$this->_db->query($consulta);
        //Devolvemos el resultset en forma de array de objetos
        $resultSet=$this->ConvertirArreglo($query);
         $query->close();
        return $resultSet;
    }
    public function Update($setYwhere){
        $query=$this->_db->query("UPDATE $this->_tabla $setYwhere");
        return $query;
    }
    public function Insert($columnasYvalores)
    {
        $consulta="INSERT INTO $this->_tabla $columnasYvalores";
        //echo $consulta;
        $query=$this->_db->query($consulta);
        return $query;
    }
    public function Delete($columnaYid)
    {
        $query=$this->_db->query("DELETE FROM $this->_tabla WHERE $columnaYid");
        return $query;
    }
    public function UltimoID(){
        $query=$this->_db->query("SELECT max(id) as ultimo FROM $this->_tabla");

        if($query){
            $fila = mysqli_fetch_array($query);
           return $fila[0];
        }
        else{
            return 0;}
    }
     
     
    public function deleteBy($column,$value){
        $query=$this->db->query("DELETE FROM $this->_tabla WHERE $column='$value'"); 
        return $query;
    }
     
 
    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */
     
}
?>
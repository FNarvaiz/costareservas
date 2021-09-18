<?php
class Provincia extends EntidadBase
    {
            //ATRIBUTOS
            public $_id;
        public $_nombre;
        public $_localidades=[];
        //CONSTRUCTORES
        function __construct( $adapter)
        {
            $table="provincias";
            parent::__construct($table, $adapter);
        }
        public function __destruct() {
        }
        

        //METODOS

        public function GetNombre()
        {
            return $this->_nombre;
        }
        public function Setnombre($obj)
        {
            $this->_nombre = $obj;
        }

        public function GetId()
        {
            return $this->_id;
        }
        public function SetId($obj)
        {
            $this->_id = $obj;
        }
        public function Save(){
        $query="INSERT INTO PROVINCIAS (id_provincia,nombre)
                VALUES(NULL,
                '".$this->_id."',
                       '".$this->_nombre."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    }

?>
<?php
class Unidad
    {
            //ATRIBUTOS
        public $_id;
        public $_nombre;
        public $_descripcion;
        public $_banos;
        public $_tipo;
        public $_precios = [];

        //CONSTRUCTORES
        function __construct()
        {
        }
        public function __destruct() {
            echo 'Destroying: ', $this->_nombre, PHP_EOL;
        }
        

        //METODOS
        public function GetNombre()
        {
            return $this->_nombre;
        }
        public function SetNombre($obj)
        {
            $this->_nombre = $obj;
        }
        public function GetBanos()
        {
            return $this->_banos;
        }
        public function SetBanos($obj)
        {
            $this->_banos = $obj;
        }

        public function GetTipo()
        {
            return $this->_tipo;
        }
        public function SetTipo($obj)
        {
            $this->_tipo = $obj;
        }
        public function GetDescripcion()
        {
            return $this->_descripcion;
        }
        public function SetDescripcion($obj)
        {
            $this->_descripcion = $obj;
        }
    }

?>
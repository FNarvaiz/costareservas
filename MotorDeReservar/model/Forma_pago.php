<?php
class Forma_pago
    {
            //ATRIBUTOS
        public $_id;
        public $_nombre;
        public $_recargo;
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
        public function GetRecargo()
        {
            return $this->_recargo;
        }
        public function SetRecargo($obj)
        {
            $this->_recargo = $obj;
        }

    }

?>
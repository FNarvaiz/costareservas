<?php
class Precio
    {
            //ATRIBUTOS
        public $_fecha;
        public $_importe;
        public $_cargado;
        //CONSTRUCTORES
        function __construct()
        {
        }
        public function __destruct() {
            echo 'Destroying: ', $this->_fecha, PHP_EOL;
        }
        
                
        //METODOS
        public function GetFecha()
        {
            return $this->_fecha;
        }
        public function Setfecha($obj)
        {
            $this->_fecha = $obj;
        }
        public function GetImporte()
        {
            return $this->_importe;
        }
        public function SetImporte($obj)
        {
            $this->_importe = $obj;
        }
    }

?>
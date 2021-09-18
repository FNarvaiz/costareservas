<?php
class Reserva
    {
            //ATRIBUTOS
        public $_id;
        public $_cliente;
        public $_unidad;
        public $_desde;
        public $_hasta;
        public $_fecha_creada;
        public $_observaciones;
        public $_importe;
        public $_forma_pago;
        public $_cant_personas;
        //CONSTRUCTORES
        function __construct()
        {
        }
        public function __destruct() {
        }
        

        //METODOS
       /* public function GetNombre()
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
        }*/
    }

?>
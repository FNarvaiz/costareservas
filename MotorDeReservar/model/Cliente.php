<?php
class Cliente
    {
            //ATRIBUTOS
        public $_id;
        public $_dni;
        public $_nombre;
        public $_apellido;
        public $_celular;
        public $_domicilio;
        public $_mail;
        public $_localidad;
        //CONSTRUCTORES
        function __construct()
        {
        }
        public function __destruct() {
        }
        

        //METODOS

        public function GetMail()
        {
            return $this->_mail;
        }
        public function SetMail($obj)
        {
            $this->_mail = $obj;
        }

        public function GetDireccion()
        {
            return $this->_direccion;
        }
        public function SetDireccion($obj)
        {
            $this->_direccion = $obj;
        }
        public function GetCelular()
        {
            return $this->_celular;
        }
        public function SetCelular($obj)
        {
            $this->_celular = $obj;
        }
        public function SetLocalidad($obj)
        {
            $this->_localidad= $obj;
        }
        public function GetLocalidad(){
            return $this->_localidad;
        }
    }

?>
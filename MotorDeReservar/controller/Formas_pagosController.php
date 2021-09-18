<?php
class Formas_pagosController extends ControladorBase{
    
    
    public $dao;
    public function __construct() {
        parent::__construct();
        $this->dao=new Formas_pagosDAO();
    }
     
    public function index(){
         
        //Creamos el objeto cliente
        //$cliente=new Cliente();
        //Conseguimos todos los clientes
        $formas_pagos=$this->dao->Todos();
        //Cargamos la vista index y le pasamos valores
        $this->view("formas_pagos",array(
            "formas_pagos"=>$formas_pagos,
        ));
    }
    
    
    public function crear(){
        if(isset($_POST["nombre"])){
             
            //Creamos un cliente
            $obj=new Forma_pago();
            $obj->_recargo=$_POST["recargo"];
            $obj->_nombre=$_POST["nombre"];
            $save=$this->dao->Guardar($obj);
        }
        $this->redirect("formas_pagos", "index");
    }
     
    public function borrar(){
        echo "entro al borrar";
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
             $this->dao->Borrar($id); 
        }
        $this->redirect("formas_pagos","index");
    }

    public function hola(){
        $clientes=new ClientesModel($this->adapter);
        $obj=$clientes->getUnCliente();
        var_dump($obj);
    }

}
?>
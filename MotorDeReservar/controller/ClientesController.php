<?php
class ClientesController extends ControladorBase{
     public $conectar;
    public $adapter;
    public function __construct() {
        parent::__construct();
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
     
    public function index(){
         
        //Creamos el objeto cliente
        $cliente=new Cliente($this->adapter);
         
        //Conseguimos todos los clientes
        $allusers=$cliente->getAll();
        
        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "allusers"=>$allusers,
            "Hola"    =>"Soy Víctor Robles"
        ));
    }
     
    public function crear(){
        if(isset($_POST["nombre"])){
             
            //Creamos un cliente
            $cliente=new Cliente($this->adapter);
            $cliente->_dni=$_POST["dni"];
            $cliente->_apellido=$_POST["apellido"];
            $cliente->_nombre=$_POST["nombre"];
            $cliente->_celular=$_POST["celular"];
            $cliente->_mail=$_POST["mail"];
            $cliente->_direccion=$_POST["domicilio"];
            $save=$cliente->save();
        }
        $this->redirect("Clientes", "index");
    }
     
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
             
            $cliente=new Cliente($this->adapter);
            $cliente->deleteById($id); 
        }
        $this->redirect();
    }
     
     
    public function hola(){
        $clientes=new ClientesModel($this->adapter);
        $obj=$clientes->getUnCliente();
        var_dump($obj);
    }
 
}
?>
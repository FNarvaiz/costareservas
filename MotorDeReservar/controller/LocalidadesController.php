<?php
class LocalidadesController extends ControladorBase{
    
    
    public $dao;
    public $daoProvincias;
    public function __construct() {
        parent::__construct();
        $this->dao=new LocalidadesDAO();
        $this->daoProvincias=new ProvinciasDao();
    }
     
    public function index(){
         
        //Creamos el objeto cliente
        //$cliente=new Cliente();
         
        //Conseguimos todos los clientes
        $localidades=$this->dao->TraerLocalidadesDe(1);
        $provincias=$this->daoProvincias->Todos();
        //Cargamos la vista index y le pasamos valores
        $this->view("localidades",array(
            "localidades"=>$localidades,"provincias"=>$provincias,
        ));
    }
    public function TraerParaComboBox(){
        $localidades=$this->dao->TraerLocalidadesDe($_GET["idProvincia"]);
         foreach($localidades as $obj){?>
            <option value="<?php echo $obj->id; ?>"><?php echo $obj->Nombre; ?></option>
        <?php }
    }
    public function TraerLocalidadesDe(){
        $algunas=$this->dao->TraerLocalidadesDe($_GET["idProvincia"]);
         
            foreach($algunas as $obj) { //recorremos el array de objetos y obtenemos el valor de las propiedades ?>
                
                <?php echo $obj->id; ?> -
                <?php echo $obj->Nombre; ?> -
                <div class="right">
                    <a <?php echo $obj->id; ?>" class="btn btn-danger">Borrar</a>
                </div>
                <hr/>
            <?php } 
        //Cargamos la vista index y le pasamos valores
        
    
    }
    public function crear(){
        if(isset($_POST["nombre"])){
             
            //Creamos un cliente
            $obj=new Localidad($this->adapter);
            $obj->_dni=$_POST["dni"];
            $obj->_apellido=$_POST["apellido"];
            $obj->_nombre=$_POST["nombre"];
            $obj->_celular=$_POST["celular"];
            $obj->_mail=$_POST["mail"];
            $obj->_direccion=$_POST["domicilio"];
            $save=$this->dao->Guardar($obj);
        }
        $this->redirect("localidades", "index");
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
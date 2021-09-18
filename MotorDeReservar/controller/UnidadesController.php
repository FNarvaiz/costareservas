<?php
class unidadesController extends ControladorBase{
    
    
    public $dao;
    public function __construct() {
        parent::__construct();
        $this->dao=new UnidadesDAO();
    }
     
    public function index(){
         
        //Creamos el objeto cliente
        //$cliente=new Cliente();
        //Conseguimos todos los clientes
        
        $unidades=$this->dao->Todos();
        //Cargamos la vista index y le pasamos valores
        $this->view("unidades",array(
            "unidades"=>$unidades,
        ));
    }
    
   public function GuardarPrecio(){
        
        $precio= new Precio();
        $precio->_fecha= $_GET["fecha"];
        $precio->_importe=$_GET["importeNuevo"];
        if($_GET["importeViejo"]==0)
            $precio->_cargado=false;
        else
            $precio->_cargado=true;
        $this->dao->GuardarPrecio($precio, $_GET["idUnidad"]);
        return "Se guardo correctamente";
   }
    private function BuscarFecha($resultados,$fecha){
        foreach($resultados as $precios)
        {
            if($precio->Fecha==$fecha)
                return $precio->Importe;
        }
        return 0;
    }
    public function Precios(){
        $hoy;
        $hasta;
        $intervalo=new DateInterval("P1D");
        //$hasta = strtotime ( '+15 day' , $hoy  ) ;
        if(isset($_POST["Desde"]) && isset($_POST["Hasta"])) {
            $hoy=new DateTime( $_POST["Desde"]) ;
            $hasta = new DateTime ($_POST["Hasta"]  ) ;
        }
        else{
            $hoy= new DateTime("now");
            $hasta= new DateTime("now");
            $hasta->add(new DateInterval("P15D"));
        }
        $diferencia = date_diff($hoy, $hasta);
        $diferencia= $diferencia->format('%a')+1;
        $desdeSinModificar= clone $hoy;// new DateTime($hoy->format('Y-m-d'));
            //$hastaText = $hasta->format('dmY');
            //$hastaText = date ( 'dmY' , $hasta );
        $resultados= $this->dao->TraerTodosLosPrecios($hoy->format('Ymd'), $hasta->format('Ymd'));
        $ultimoDia=null;
        $unidades=$this->dao->TraerSegunAlta(1);    
            
        
        $this->view("precios",array(
            "diferencia"=>$diferencia,
            "desde"=>$desdeSinModificar,
            "resultados"=>$resultados,
            "hasta"=>$hasta,
            "intervalo"=>$intervalo,
            "unidades"=>$unidades,

        ));
    }
    public function GuardarPeriodoDePrecio(){

            $hoy=new DateTime( $_POST["Desde"]) ;
            $hasta = new DateTime ($_POST["Hasta"]  ) ;
        $idUnidad= $_POST["Unidades"];
        $precio= $_POST["Precio"];
        
        $diferencia = date_diff($hoy, $hasta);
        $diferencia= $diferencia->format('%a')+1;
        $desdeSinModificar= clone $hoy;// new DateTime($hoy->format('Y-m-d'));
            //$hastaText = $hasta->format('dmY');
            //$hastaText = date ( 'dmY' , $hasta );
        $resultados= $this->dao->ModificarPrecio($idUnidad,$hoy, $hasta,$precio);
        $this->Precios();
            
        
    }
    
    public function ActualizarPrecios(){
         
    }
    public function crear(){
        if(isset($_POST["nombre"])){
            $obj=new Unidad();
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
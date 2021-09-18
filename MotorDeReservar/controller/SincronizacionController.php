<?php
class SincronizacionController extends ControladorBase{
    
    
    public $dao;
    public function __construct() {
        parent::__construct();
        $this->dao=new ReservasDAO();
    }

    public function Reservas(){
        $sincronizadas= $_GET["sincronizadas"];
        $reservas = $this->dao->ReservasSegunSincronizacion($sincronizadas);
        echo json_encode($reservas);
    }

    public function ReservaNueva(){
        $idUnidad=$_GET["idUnidad"];
        $desde=$_GET["Desde"];
        $hasta=$_GET["Hasta"];
        $idReserva=$_GET["id"];
        ini_set('date.timezone','America/Argentina/Buenos_Aires'); 
        $fecha_creada= date("Y-m-d h:i:s");
        $this->dao->NuevaParticular($idReserva,$idUnidad,$desde,$hasta,$fecha_creada);
        echo "OK";
    }
    public function ReservaSincronizada(){
        $id=$_GET["id"];
        $idReserva=$_GET["idSistema"];
        $this->dao->SincronizacionRealizada($id,$idReserva);
        echo "OK";
    }
    public function CambiarLugar()
    {
        $idReserva=$_GET["idSistema"];
        $idUnidad=$_GET["idUnidad"];
        if(!($this->dao->ExisteLugar($idUnidad)))
            $idUnidad=0;
        $this->dao->CambiarLugar($idReserva,$idUnidad);
        echo "OK";
    }
    public function CambiarDesdeHasta(){
        $desde=$_GET["Desde"];
        $hasta=$_GET["Hasta"];
        $idReserva=$_GET["idSistema"];
        $this->dao->CambiarDesdeHasta($idReserva,$desde,$hasta);
        echo "OK";
    }
    public function CancelarReserva(){
        $idReserva=$_GET["idSistema"];
        $this->dao->Cancelar($idReserva);
        echo "OK";
    }
}
?>
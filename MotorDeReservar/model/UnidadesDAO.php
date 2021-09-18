<?php
class UnidadesDAO{
    private $coneccion; 
    public function __construct( ){
     
        $this->coneccion= new ConeccionBD ("UNIDADES");
    }
     
    //Metodos de consulta
    public function Todos(){
        return $this->coneccion->getAll();
    }
    public function TraerSegunAlta($alta){
        return $this->coneccion->Select(" where alta=$alta order by Nombre asc");

    }
    
    public function TraerPrecios($dia,$hasta,$id){
        $consulta="SELECT * FROM PRECIOS WHERE fecha>=$dia && fecha<$hasta && id_unidad=$id";
        return $this->coneccion->SelectDeQuery($consulta);

    }
    public function TraerTodosLosPrecios($desde,$hasta){
        $consulta="SELECT U.id,U.Nombre,P.Fecha,P.Importe FROM UNIDADES U LEFT JOIN PRECIOS P ON P.id_unidad=U.id WHERE ((P.fecha>=$desde && P.fecha<=$hasta)|| P.Importe is null) && U.alta=1 order by U.nombre, P.Fecha asc";
    
        return $this->coneccion->SelectDeQuery($consulta);
    }
    public function GuardarPrecio($precio,$idUnidad){
        $query="";
        if($precio->_importe==0)
        {
            if($precio->_cargado)//ELIMINAR 
                $query=$query."DELETE PRECIOS where id_unidad=$idUnidad and fecha=$precio->_fecha ;";
        }   
        else if ($precio->_cargado)
            $query=$query."UPDATE PRECIOS SET importe=$precio->_importe where id_unidad=$idUnidad and fecha=$precio->_fecha ;";
        else
            $query=$query."INSERT INTO PRECIOS (id_unidad,fecha,importe) VALUES ($idUnidad,$precio->_fecha,$precio->_importe);";
        if($query!=""){
            echo $query;
            $resultado= $this->coneccion->query($query);
            //$this->db()->error;
            return $resultado;
        }
    }
    public function ModificarPrecio($idUnidad,$hoy, $hasta,$precio){
        $desde=$hoy->format('Ymd');
        $intervalo=new DateInterval("P1D");
        $hastaString=$hasta->format('Ymd');
        $query="DELETE FROM PRECIOS where id_unidad=$idUnidad and fecha>=$desde and fecha<=$hastaString ;";
        $this->coneccion->query($query);
        if($precio!=0){
            $primero=true;
            $fecha=""; 
            while($hoy<=$hasta){
                if($primero){
                    $query=" INSERT INTO PRECIOS (id_unidad,fecha,importe) VALUES ";
                    $primero=false;
                }
                else
                    $query=$query.",";
                    $fecha=$hoy->format('Ymd');
                $query=$query."($idUnidad,$fecha,$precio) ";
                $hoy->Add($intervalo);
            }
            $query=$query.";";
            $this->coneccion->query($query);
            echo $query;
        }
    }
    
    public function GuardarPrecios($obj){
        $query="";
        foreach ($obj->_precios as $precio) {
            if($precio->_importe==0 && $precio->_cargado==1)//ELIMINAR 
                $query=$query."DELETE PRECIOS where id_unidad=$obj->_id and fecha=$precio->_fecha ;";
            else if ($precio->_cargado==1)
                $query=$query."UPDATE PRECIOS SET importe=$precio->_importe where id_unidad=$obj->_id and fecha=$precio->_fecha ;";
            else
                $query=$query."INSERT INTO PRECIOS (id_unidad,fecha,importe) VALUES ($obj->_id,$precio->_fecha,$precio->_importe);";
        }
        if($query!=""){
            $resultado= $this->coneccion->query($query);
            //$this->db()->error;
            return $query;
        }
    }
    
    public function Guardar($obj){
        if(isset($obj->_id)){
            $id= $this->coneccion->UltimoID();
            $obj->_id=$id+1;
        }
        $save=$this->coneccion->Insert("(id,id_tipo,nombre,descripcion,banos,alta) VALUES(".$obj->_id.",".$obj->_tipo->_id.",
                       '".$obj->_nombre."','".$obj->_descripcion."',".$obj->_banos.",1);");
        //$this->db()->error;
        return $save;
    }
    
}
?>
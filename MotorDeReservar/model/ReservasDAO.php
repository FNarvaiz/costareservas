<?php
class ReservasDAO{
    private $coneccion; 
    public function __construct( ){
     
        $this->coneccion= new ConeccionBD ("RESERVAS");
    }
     
    //Metodos de consulta
    public function Todos(){
        return $this->coneccion->getAll();
    }
    public function TraerSegunAlta($alta){
        return $this->coneccion->Select(" where alta=$alta");
    }
    public function Fechas($hoy){
        $consulta="SELECT Desde,Hasta,Nombre from FECHAS where HASTA>'".$hoy."'";
        //echo $consulta;
        return $this->coneccion->SelectDeQuery($consulta);
    }
    public function CategoriasUnidades(){
        $consulta="SELECT id,Nombre from CATEGORIAS";
        //echo $consulta;
        return $this->coneccion->SelectDeQuery($consulta);
    }
    public function Buscar($id){
         $consulta="SELECT R.Desde,R.Hasta,R.Fecha_Creada,R.Observaciones,R.Precio,R.Cant_personas,C.Nombre,C.Apellido,C.Dni,C.Mail,C.Celular,C.Domicilio,L.Nombre as Localidad, P.Nombre as Provincia,F.Nombre as Forma,((R.precio*((F.Recargo/100)+1))/F.Cuotas) as Cuotas,U.Nombre as Unidad from RESERVAS R INNER JOIN CLIENTES C ON C.id=R.id_cliente INNER JOIN LOCALIDADES L ON L.id=C.id_localidad INNER JOIN PROVINCIAS P ON L.id_provincia=P.id INNER JOIN UNIDADES U ON U.id=R.id_unidad INNER JOIN FORMAS_PAGOS F ON R.id_forma_pago= F.id where R.id=".$id;
        //echo $consulta;
        return $this->coneccion->SelectDeQuery($consulta);
    }
    public function HayPaquete($cantDias,$desde,$hasta){

        $consulta="SELECT * FROM PAQUETES WHERE cant_dias<=$cantDias and desde<=$desde and hasta>=$hasta order by Cant_dias desc LIMIT 1";
        //echo $consulta;
        return $this->coneccion->SelectDeQuery($consulta);
    }

    public function TraerSegunDisponibilidad($desde,$hasta,$idCategoria){
        $consulta="SELECT U.id,U.Nombre,U.Descripcion,U.Banos, U.Mascotas,T.Camas_una_plaza,T.Camas_dos_plazas,T.Cant_personas 
        ,COUNT(U.id) as Dias, SUM(P.Importe) as Importe FROM UNIDADES U INNER JOIN PRECIOS P ON 
        P.id_unidad=U.id INNER JOIN TIPOS_RESERVAS T ON U.id_tipo=T.id WHERE P.fecha>=$desde && 
        P.fecha<$hasta && U.alta=1 && U.id_categoria=$idCategoria 
        && U.id not in (SELECT R.id_unidad FROM RESERVAS R WHERE R.Desde<=$hasta && R.Hasta>=$desde && 
        R.Confirmada) GROUP by U.id,U.Nombre,U.Descripcion,U.Banos,T.camas_una_plaza,T.camas_dos_plazas,
        T.cant_personas ORDER BY U.Nombre ASC";
      
        return $this->coneccion->SelectDeQuery($consulta);
    }
    public function SigueDisponible($desde,$hasta,$id_unidad){
            $consulta="SELECT U.id,U.Nombre,U.Descripcion,U.Banos,T.Camas_una_plaza,T.Camas_dos_plazas,T.Cant_personas 
            ,COUNT(U.id) as Dias, SUM(P.Importe) as Importe FROM UNIDADES U INNER JOIN PRECIOS P ON P.id_unidad=U.id 
            INNER JOIN TIPOS_RESERVAS T ON U.id_tipo=T.id WHERE P.fecha>=$desde && P.fecha<$hasta && U.id=$id_unidad 
            && U.id not in (SELECT R.id_unidad FROM RESERVAS R WHERE R.Desde<=$hasta && R.Hasta>=$desde && 
        R.Confirmada) GROUP by U.id,U.Nombre,U.Descripcion,U.Banos,T.camas_una_plaza,T.camas_dos_plazas,T.cant_personas ";
        
        return $this->coneccion->SelectDeQuery($consulta);
    }
    public function UltimoID($obj){
        if(isset($obj->_id) || $obj->_id==""){
            $id= $this->coneccion->UltimoID();
            $id=$id+1;
            return $id;
        }
        return $obj->_id;
    }
    public function Guardar($obj){
        $obj->_id=$this->UltimoID($obj);
        
        $save=$this->coneccion->Insert("(id,id_cliente,id_forma_pago,id_unidad,desde,hasta,observaciones,precio,fecha_creada,cant_personas,confirmada) 
        VALUES(".$obj->_id.",".$obj->_cliente->_id.",
                       1,".$obj->_unidad->id.",".$obj->_desde.",".$obj->_hasta.",'".$obj->_observaciones."',
                       ".$obj->_importe.",'".$obj->_fecha_creada. "',".$obj->_cant_personas. ",0);");
        //$this->db()->error;
        return $save;
    }
    public function Confirmar($idreserva, $idFormaPago){
        $set=" SET id_forma_pago=".$idFormaPago.", confirmada=1 where id=".$idreserva;
        $this->coneccion->Update($set);
    }

    //FUNCIONES PARA LAS SINCRONIZACIONES
    public function ReservasSegunSincronizacion($estado){
        $consulta="SELECT R.id,R.Desde,R.Hasta, R.Fecha_Creada,R.Observaciones,R.Precio,C.Nombre,C.Apellido,C.DNI,C.Mail,C.Celular,C.Domicilio,R.Cant_personas as Personas,L.Nombre as Localidad, P.Nombre as Provincia,R.id_forma_pago as Forma_Pago,U.Nombre as Unidad from RESERVAS R INNER JOIN CLIENTES C ON C.id=R.id_cliente INNER JOIN LOCALIDADES L ON L.id=C.id_localidad INNER JOIN PROVINCIAS P ON L.id_provincia=P.id INNER JOIN UNIDADES U ON U.id=R.id_unidad where R.confirmada=1 AND R.Sincronizada=".$estado;
        return $this->coneccion->SelectDeQuery($consulta);
    }
    public function NuevaParticular($idSincronizacion,$idUnidad,$desde,$hasta,$fecha_creada){
        $id= $this->coneccion->UltimoID()+1;
        $save=$this->coneccion->Insert("(cant_personas,sincronizada,id,id_cliente,id_forma_pago,id_unidad,desde,hasta,observaciones,precio,fecha_creada,confirmada) 
        VALUES(1,".$idSincronizacion.",".$id.",0,1,".$idUnidad.",".$desde.",".$hasta.",'Creada desde recepción',0,'".$fecha_creada. "',1);");
        return $save;
    }
    public function SincronizacionRealizada($id,$idReservaSistema){
        $query ="UPDATE RESERVAS SET sincronizada=".$idReservaSistema." WHERE id=".$id;
        $this->coneccion->query($query);
    }
    public function ExisteLugar($idUnidad){
        $resulado=$this->coneccion->SelectDeQuery("select * from UNIDADES where id=".$idUnidad);
        if($resulado==null)
            return false;
        return true;
    }
    public function CambiarLugar($idSincronizada,$idUnidad){
        $query ="UPDATE RESERVAS SET id_unidad=".$idUnidad." WHERE sincronizada=".$idSincronizada;
        $this->coneccion->query($query);    
    }
    public function CambiarDesdeHasta($idSincronizada,$desde,$hasta){
        $query ="UPDATE RESERVAS SET desde=".$desde.",hasta=".$hasta." WHERE sincronizada=".$idSincronizada;
        $this->coneccion->query($query);
    }
    public function Cancelar($idSincronizada){
        $query ="UPDATE RESERVAS SET confirmada=0 WHERE sincronizada=".$idSincronizada;
        $this->coneccion->query($query);
    }
}
?>
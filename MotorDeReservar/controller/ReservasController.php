<?php
class ReservasController extends ControladorBase{
    
    
    public $dao;
    public function __construct() {
        parent::__construct();
        $this->dao=new ReservasDAO();
    }
    

    public function index(){
         
         ini_set('date.timezone','America/Argentina/Buenos_Aires'); 
        $hoy= date("Ymd");
        $fechas=$this->dao->Fechas($hoy);
        $categorias=$this->dao->CategoriasUnidades();
        
        $this->view("reservas",array("fechas"=>$fechas,"categorias"=>$categorias,"hoy"=>$hoy));
    }
    public function Descuento($promocion,$diferencia,$ImporteEstadia){
        $promedio=$ImporteEstadia/$diferencia;
        $RepeticionDePromos= intval($diferencia/$promocion->Cant_dias);
        $descuentoRealizado=$promocion->Cant_dias*$RepeticionDePromos*$promedio*$promocion->Descuento/100;
        $precioFinal=$ImporteEstadia-$descuentoRealizado;
        return $precioFinal;
    }
    public function Buscar(){
        $desde=new DateTime( $_GET["Desde"]) ;
        $verano=new DateTime("20171226");
        $hasta = new DateTime ($_GET["Hasta"]  ) ;
        $diferencia = date_diff($desde, $hasta);
        $diferencia= $diferencia->format('%a');
        if( $desde>=$verano){
            if($diferencia<7){
                echo "Las reservas para estas fechas deben tener minimo 7 días y no de ".$diferencia;
                return;
            }
        }
        else
            if($diferencia<2){
                echo "Las reservas para estas fechas deben tener minimo 2 días y no de ".$diferencia;
                return;
            }
        
        $categoria = $_GET["categoria"];
        $unidades=$this->dao->TraerSegunDisponibilidad($desde->format('Ymd'),$hasta->format('Ymd'),$categoria);
        $promocion=$this->dao->HayPaquete($diferencia,$desde->format('Ymd'),$hasta->format('Ymd'));
        
       
        $descuentoRealizado="";
        $promocion=$this->DevolverObjOnull($promocion);
        $hayPromocion=false;
        if($promocion!=null)
            $hayPromocion=true;
        echo "<h3>Cantidad de dias a reservar: ".$diferencia . " </h3>";
        foreach($unidades as $obj){
            
            $reserva=new Reserva();
            if($obj->Dias==$diferencia){
                $promedio=$obj->Importe/$diferencia;
                $precioFinal=$obj->Importe;
                if($hayPromocion){
                   $precioFinal= $this->Descuento($promocion,$diferencia,$obj->Importe);
                    $promedio=$precioFinal/$diferencia;
                    $descuentoRealizado=$obj->Importe-$precioFinal;
                }
                
                ?>

                <article>
                    <header>
                        <h1><?php echo $obj->Nombre; ?></h1>
                    </header>
                     <section class="imagen">
								<img src="MotorDeReservar/images/<?php echo $obj->id; ?>/1.jpg" alt="<?php echo $obj->Nombre;?>" />
				    </section>
                    <section class="OrdenArticulo" name="Descripcion">  
                   
                    <?php if($obj->Mascotas){ ?>
                        <h4 class="Descripcion">ACEPTAN MASCOTAS</h4> 
                    <?php }
                        else{ ?>
                        <h4 class="Descripcion">NO ACEPTAN MASCOTAS</h4>     
                        <?php } ?>

                        <h4 class="Descripcion">Cantidad de personas:<?php echo $obj->Cant_personas; ?></h4>  
                        <h4 class="Descripcion">Una plaza:<?php echo $obj->Camas_una_plaza; ?></h4> 
                        <h4 class="Descripcion">Dos plazas:<?php echo $obj->Camas_dos_plazas; ?></h4>         
                        <p><?php echo $obj->Descripcion; ?></p>
                    </section>
                    <section class="OrdenArticulo2" name="Precio">
                        <?php if($hayPromocion){?>
                            <h5>Paquete: <?php echo $promocion->Nombre." <spam class='rojo-descuento'>Desc: ".$promocion->Descuento."%"; ?></spam></h5>
                            <h5><spam class='tachado-descuento'>$<?php echo round($obj->Importe)."</spam> - $".$descuentoRealizado ; ?></h5>
                        <?php } ?>
                        
                        <h2 id="total">Total $<?php echo round($precioFinal); ?></h2>
                        <input type="button" onclick="SeguirReserva('<?php echo $desde->format('Y-m-d')."','".$hasta->format('Y-m-d')."',". $obj->id; ?>)" class="btn btn-info btn-envio width-total" value="Reservar" >
                    </section>
                </article><?php

            }
        }
        if(count($unidades)==0)
        echo "<h3>No se a encontrado ninguna disponibilidad en esas fechas, puede consultar con el personal por mail o telefono</h3>";
    }
    private function DevolverObjOnull($resultado){
        if(count($resultado)==1){
            return $resultado[0];
        }
        else 
            return null;
    }
    public function EnvioDeMail($subject, $message,$emailCliente){
        $para="consulta@costareservas.com,".$emailCliente;
        $email_from = 'Motor de reservas<info@costareservas.com>';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "From: info@costareservas.com\r\n";
        mail($para,$subject,$message,$headers);
    }
    public function Cuandrante($contenido)
        {
            return "<div style='margin:3px 1px;border:1px solid #B39DDB;text-align: center; background-color:#EDE7F6;color:#000;padding: 5px; font-weight: normal;' >". $contenido. "</div>";
        }
    public function EstiloResaltado($texto)
        {
            return "<h3 style='margin:1px 2px;display: inline-block; background-color:#B39DDB;color:#000;padding: 5px;border-radius: 2px; font-weight: normal;font-size: 12pt;' >" .$texto. "</h3>";
        }
        public function EstiloCuadrilla($texto)
        {
            return "<h3 style='margin:1px 0px;border:3px solid #B39DDB;color:#000;border-radius: 2px; font-weight: normal;font-size: 12pt;' >" .$texto. "</h3>";
        }
        public function EstiloParrafo($texto)
        {
            return "<h4 style='margin:3px 0px;color:#000; font-weight: normal;font-size: 12pt;' >" .$texto. "</h4>";
        }
        public function EstiloTitulo( $texto)
        {
            return "<h2 style='margin:6px 0px;color: #000;font-weight: normal;font-size: 17pt;' >" .$texto. "</h2>";
        }
        public function Firma($mail)
        {
            return "<table width='100%' border='0' cellspacing='10' cellpadding='0' style='border-top-width:3px; border-top-style:solid; border-top-color:#c3ccd4;'>
 <tr><td>&nbsp;</td>  <td></td> </tr> <tr>
  <td width='200' align='right' valign='top'><img src='http://lugrahotel.com/images/loyo.png' alt='Logo' hspace='5' /></td><td align='left' valign='top' style='padding:10px;'>
  <p><font face='Arial, Helvetica, sans-serif' color='#1b232a' style='font-size:18px;'>Sistema CostaReservas</font><br /><font face='Arial, Helvetica, sans-serif' color='#a6acaf' ><em  style='font-size:12px;'>Inmobiliaria Luis Protti</em></font><br />    <font face='Arial, Helvetica, sans-serif' style='font-size:12px'><strong><font color='#37424a'>(02291) 43-1766</font></strong> ·  <a href='mailto:".$mail. "'>".$mail."</a> </font><br />   </p>
   <p><font face='Arial, Helvetica, sans-serif' color='#1b232a'  style='font-size:14px;'>Marcamos y hacemos la diferencia</font><br /><font face='Arial, Helvetica, sans-serif' color='#37424a' size='-1'> <a href='http://www.luisprotti.com'>www.luisprotti.com</a></font></p></td></tr></table>";
        }
    

    public function notificacionDePago(){
        $reserva=$dao->Buscar($_GET["id"]);
        $cliente= $daoClientes->Buscar($reserva->id_cliente);
        $message="Datos del cliente<br>Nombre: ".$reserva->Apellido." ".$reserva->Nombre." / Email:".$reserva->mail." /	   
        Celular:".$reserva->celular." / DNI:".$reserva->dni." / Domicilio:".$reserva->Provincia."-".$reserva->Localidad ."-".$reserva->domicilio."
        <br>
        Datos de reserva<br>
 		Reserva: ".$_GET["id"]." / Realizada: ".$reserva->Fecha_Creada." / Unidad: ".$reserva->Unidad." / Desde: ".$reserva->Desde." / Hasta: ".$reserva->Hasta." / Precio Final: ".$reserva->Precio." / Observaciones: ".$reserva->Observaciones;
        EnvioDeMail("Reserva  ",$message);
        $pago= $_GET["Q"];
        if($pago==1){
            $dao->Confirmar($_GET["id"],4);
            $daoPagos= new PagosDAO();
            $daoPagos->Guardar($_GET["id"]);

            echo "HTTP STATUS 200 (OK)";
            // ENVIAR CORREO DE LA RESERVA Y PAGO REALIZADO DE LA MITAD O MENOS.
        }
        else{
             // ENVIAR CORREO DE LA RESERVA PARA INFORMAR QUE TRATO DE REALIZAR LA RESERVA Y NO PUDO

        }
        EnvioDeMail("Reserva  ",$message)	 ; 
    }
    public function PedirDatosCliente(){
        if(isset($_GET["id"])){
            $desde=new DateTime( $_GET["desde"]) ;
            $hasta = new DateTime ($_GET["hasta"]  ) ;
            $diferencia = date_diff($desde, $hasta);
            $diferencia= $diferencia->format('%a');
            $unidad=$this->dao->SigueDisponible($desde->format('Ymd'),$hasta->format('Ymd'),$_GET["id"]);
            $unidad=$this->DevolverObjOnull($unidad);
            if($unidad!=null){
                $promocion=$this->dao->HayPaquete($diferencia,$desde->format('Ymd'),$hasta->format('Ymd'));
                $promocion=$this->DevolverObjOnull($promocion);
                $promedio=$unidad->Importe/$diferencia;
                $precioFinal=$unidad->Importe;
                if($promocion!=null){
                    $precioFinal= $this->Descuento($promocion,$diferencia,$unidad->Importe);
                    $promedio=$precioFinal/$diferencia;
                }
                $daoLocalidades= new LocalidadesDAO();
                $daoProvincias=new ProvinciasDAO();    
                $localidades=$daoLocalidades->TraerLocalidadesDe(1);
                $provincias=$daoProvincias->Todos();
                $this->view("DatosCliente",array(
                            "provincias"=>$provincias,
                            "localidades"=>$localidades,
                            "unidad"=>$unidad,
                            "promocion"=>$promocion,
                            "desde"=>$desde,
                            "hasta"=>$hasta,
                            "precioFinal"=>$precioFinal,
                        ));
            }
            else{
                echo "Lo sentimos. El inmueble se acaba de reservar por otro cliente. Por favor elija otra unidad o fecha.";
            }
        }
    }
    
    public function ElegirFormaDePago(){
        if(isset($_GET["id"])){
            $daoClientes= new ClientesDAO();
            $cliente= new Cliente();
            $cliente->_localidad= new Localidad();
            $cliente->_localidad->_id=$_GET["localidad"];
            $cliente->_dni=$_GET["localidad"];
            $cliente->_nombre=$_GET["nombre"];
            $cliente->_apellido=$_GET["apellido"];
            $cliente->_domicilio=$_GET["domicilio"];
            $cliente->_celular=$_GET["celular"];
            $cliente->_mail=$_GET["mail"];
            $cliente->_id= $daoClientes->Guardar($cliente);
            $desde=new DateTime( $_GET["desde"]) ;
            $hasta = new DateTime ($_GET["hasta"]  ) ;
            $diferencia = date_diff($desde, $hasta);
            $diferencia= $diferencia->format('%a')+1;
            $desdeG=$desde->format('Ymd');
            $hastaG=$hasta->format('Ymd');
            $unidad=$this->dao->SigueDisponible($desdeG,$hastaG,$_GET["id"]);
            $unidad=$this->DevolverObjOnull($unidad);
            $nombre= $_GET["nombre"];
            if($unidad!=null){
                $promocion=$this->dao->HayPaquete($diferencia,$desdeG,$hastaG);
                $promocion=$this->DevolverObjOnull($promocion);
                $reserva= new Reserva();
                if($promocion!=null){
                    $reserva->_importe= round($this->Descuento($promocion,$diferencia,$unidad->Importe));
                }
                else
                    $reserva->_importe=$unidad->Importe;
                
                $reserva->_cliente=$cliente;
                $reserva->_unidad=$unidad;
                $reserva->_desde=$desdeG;
                $reserva->_hasta=$hastaG;
                $reserva->_cant_personas= $_GET["personas"];
                ini_set('date.timezone','America/Argentina/Buenos_Aires'); 
                $reserva->_fecha_creada= date("Y-m-d h:i:s");
                $reserva->_observaciones=$_GET["observacion"];
                $this->dao->Guardar($reserva);
                $daoFormas= new Formas_pagosDAO();
                $formas= $daoFormas->TraerOrdenado();
                 $this->view("pago",array(
                            "reserva"=>$reserva,
                            "promocion"=>$promocion,
                            "desde"=>$desde,
                            "hasta"=>$hasta,
                            "precioFinal"=>$reserva->_importe,
                            "formas_pagos"=>$formas
                        ));
            }
            else{
                echo "Increible!. Lo sentimos mucho, pero la unidad que iba a alquilar se a reservado a ultimo minuto. Por favor vea otras opciones";
            }
        }

    }
    public function Finalizar(){
        if(isset($_GET["reserva"])){
            $desde=new DateTime( $_GET["desde"]);
            $hasta = new DateTime ($_GET["hasta"]) ;
            $diferencia = date_diff($desde, $hasta);
            $diferencia= $diferencia->format('%a');
            $unidad=$this->dao->SigueDisponible($desde->format('Ymd'),$hasta->format('Ymd'),$_GET["unidad"]);
            $unidad=$this->DevolverObjOnull($unidad);
            if($unidad!=null){
                $this->dao->Confirmar($_GET["reserva"],$_GET["forma"]);
                $reserva=$this->DevolverObjOnull($this->dao->Buscar($_GET["reserva"]));
                $message=$this->EstiloTitulo("Estimad@ ".$reserva->Apellido.", su reserva se confirmo, nos contactaremos con usted para validar datos de cuenta o 
                tarjeta").$this->EstiloCuadrilla($this->EstiloTitulo("Datos del cliente")."Nombre: ".$reserva->Apellido." ".$reserva->Nombre." / Email:".$reserva->Mail." /	   
                Celular:".$reserva->Celular." / DNI:".$reserva->Dni." / Domicilio:".$reserva->Provincia."-".$reserva->Localidad ."-".$reserva->Domicilio."
                ");
                $textoReserva= $this->EstiloTitulo("Datos de reserva"). "
                Reserva: ".$_GET["reserva"]." / Realizada: ".$reserva->Fecha_Creada." / Unidad: ".$reserva->Unidad." / Desde: ".$reserva->Desde." / Hasta: ".$reserva->Hasta." / Precio Final: ".round($reserva->Precio)." 
                / Forma de pago: ".$reserva->Forma;
                if($_GET["forma"]>0)
                    $textoReserva = $textoReserva." / Cuotas de:". round($reserva->Cuotas);
                $textoReserva = $textoReserva. " / Observaciones: ".$reserva->Observaciones;
                $message=$message.$this->EstiloCuadrilla($textoReserva).$this->Firma("info@costareservas.com");
                $this->EnvioDeMail("Reserva Inmobiliaria Luis Protti ",$message,$reserva->Mail);
        
                echo "Su reserva se realizo con exito, nos comunicaremos a la brevedad";
            }
            else{
                echo "Lo sentimos. El inmueble se acaba de reservar por otro cliente. Por favor elija otra unidad o fecha.";
            }
        }
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
    

}
?>
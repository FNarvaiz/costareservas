<!DOCTYPE HTML>
<html lang="es">
    <head>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
    <section >
        <h2>Esta a un paso de finalizar su reserva <?php echo $reserva->_cliente->Nombre; ?></h2>
        <h3>Unidad:<?php echo $reserva->_unidad->Nombre; ?><h3>
        <h4>Desde:<?php echo $desde->format('d-m-y'); ?> Hasta:<?php echo $hasta->format('d-m-y'); ?></h4>
        <h4>Importe final: $ <?php echo $reserva->_importe; ?></h4>
        
    </section>
            <h3>Forma de pago</h3>
            <section>
            <h3>Financiación particular por parte del hotel</h3>
            <?php foreach($formas_pagos as $obj){ 
            $final = ($precioFinal * (($obj->Recargo/100)+1))/$obj->Cuotas;
            $final= round($final);
            ?>
            <input type="button" value="<?php echo $obj->Nombre." ".$obj->Recargo."% = $".$final ; ?>" onclick="FinalizarReservar('<?php echo $desde->format('Y-m-d')."','".$hasta->format('Y-m-d')."',". $reserva->_unidad->id.",".$obj->id.",".$reserva->_id; ?>)" class="btn btn-success"/>
            <?php 
             } ?>
    </section>
     	
    </body>
    <script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>
    
</html>
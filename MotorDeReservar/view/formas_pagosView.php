<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
        <form action="<?php echo $helper->url("Formas_pagos","crear"); ?>" method="post" class="col-lg-5">
            <h3>Añadir forma de pago</h3>
            <hr/>
            Nombre: <input type="text" name="nombre" class="form-control"/>
            Porcentaje de recargo: <input type="text" name="recargo" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
         
        <div class="col-lg-7">
            <h3>Lista de formas de pagos</h3>
            <hr/>
        </div>
        <section class="col-lg-7 forma_de_pago" style="height:400px;overflow-y:scroll;">
            <?php 
            foreach($formas_pagos as $obj) { //recorremos el array de objetos y obtenemos el valor de las propiedades ?>
                
                <?php echo $obj->id; ?> -
                <?php echo $obj->Nombre; ?> -
                <?php echo $obj->Recargo; ?> -
                <div class="right">
                    <a href="<?php echo $helper->url("formas_pagos","borrar"); ?>&id=<?php echo $obj->id; ?>" class="btn btn-danger">Borrar</a>
                </div>
                <hr/>
            <?php } ?>
        </section>
        <footer class="col-lg-12">
            <hr/>
          
        </footer>
    </body>
</html>
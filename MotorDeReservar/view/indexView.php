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

        <ul>
  <li><a href="<?php echo $helper->url("Formas_pagos","index");?>"> Formas pagos</a></li>
  <li><a href="<?php echo $helper->url("Unidades","index");?>"> Uniades</a></li>
  <li>Milk</li>
</ul>
        <form action="<?php echo $helper->url("clientes","crear"); ?>" method="post" class="col-lg-5">
            
            <h3>Añadir cliente</h3>
            <hr/>
            DNI: <input type="text" name="dni" class="form-control"/>
            Nombre: <input type="text" name="nombre" class="form-control"/>
            Apellido: <input type="text" name="apellido" class="form-control"/>
            Email: <input type="text" name="mail" class="form-control"/>
            Celular: <input type="text" name="celular" class="form-control"/>
            Domicilio: <input type="text" name="domicilio" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
         
        <div class="col-lg-7">
            <h3>Clientes</h3>
            <hr/>
        </div>
        <section class="col-lg-7 cliente" style="height:400px;overflow-y:scroll;">
            <?php 
            foreach($allusers as $cliente) { //recorremos el array de objetos y obtenemos el valor de las propiedades ?>
                
                <?php echo $cliente->id; ?> -
                <?php echo $cliente->Nombre; ?> -
                <?php echo $cliente->Apellido; ?> -
                <?php echo $cliente->mail; ?>
                <div class="right">
                    <a href="<?php echo $helper->url("clientes","borrar"); ?>&id=<?php echo $cliente->id; ?>" class="btn btn-danger">Borrar</a>
                </div>
                <hr/>
            <?php } ?>
        </section>
        <footer class="col-lg-12">
            <hr/>
           Ejemplo PHP MySQLi POO MVC - Víctor Robles - <a href="http://victorroblesweb.es">victorroblesweb.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>
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
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/index.js"></script>

    </head>
    <body>
        <form action="<?php echo $helper->url("localidades","crear"); ?>" method="post" class="col-lg-5">
            <h3>Seleccione provincia</h3>
            <hr/>
            <select name="Pronvicias" id="listadoProvincias" onchange="LocalidadesDe()">
            <?php foreach($provincias as $obj){?>
                <option value="<?php echo $obj->id; ?>"><?php echo $obj->Nombre; ?></option>
                <?php } ?>
        </select>
        <select name="Localidades" id="listadoLocalidades" >
            <?php foreach($localidades as $obj){?>
                <option value="<?php echo $obj->id; ?>"><?php echo $obj->Nombre; ?></option>
                <?php } ?>
        </select>
        
<label for='fecha'>Desde:</label>
<input type='date' onchange="LimitarHasta()" name='fecha' id='fechaDesde' min='<?php echo date("Y-m-d");?>' value="<?php echo date("Y-m-d");?>" required />
<label for='fecha'>Hasta:</label>
<input type='date' name='fecha'  value="<?php echo date("Y-m-d");?>" id='fechaHasta' required />
            DNI: <input type="text" id="dni" name="dni" class="form-control"/>
            Nombre: <input type="text" name="nombre" class="form-control"/>
            Apellido: <input type="text" name="apellido" class="form-control"/>
            Email: <input type="text" name="mail" class="form-control"/>
            Celular: <input type="text" name="celular" class="form-control"/>
            Domicilio: <input type="text" name="domicilio" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
         
        <div class="col-lg-7">
            <h3>Localidades</h3>
            <hr/>
        </div>
        <section id="GrillaLocalidades" class="col-lg-7 localidad" style="height:400px;overflow-y:scroll;">
            <?php 
            foreach($localidades as $obj) { //recorremos el array de objetos y obtenemos el valor de las propiedades ?>
                
                <?php echo $obj->id; ?> -
                <?php echo $obj->Nombre; ?> -
                <div class="right">
                    <a href="<?php echo $helper->url("localidades","borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
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
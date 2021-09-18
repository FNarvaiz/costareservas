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
        <h3>Unidad:<?php echo $unidad->Nombre; ?><h3>
        <h4>Desde:<?php echo $desde->format('d-m-y'); ?> Hasta:<?php echo $hasta->format('d-m-y'); ?></h4>
        <?php if($promocion!=null){?>
            <h4>Promo: <?php echo $promocion->Nombre; ?> Descuento: <?php echo $promocion->Descuento; ?>%</h4>
        <?php }?>
        <h4>Importe final: $ <?php echo $precioFinal; ?></h4>
    </section>

    <form id="datos" class="col-lg-5">
            
            <h3>Sus datos</h3>
            
            <label for="dni"> DNI:</label> <input type="number" id="dni" value="23132" name="dni" required class="form-control"/>
            <label for="nombre">Nombre:</label><input type="text" id="nombre" value="Facu" name="nombre" required class="form-control"/>
            <label for="apellido">Apellido:</label><input type="text" id="apellido" value="Narvaiz" name="apellido" required class="form-control"/>
            <label for="mail">Email:</label> <input type="email" name="mail" id="mail" value="facu.232@gmail.com" required class="form-control"/>
            <label for="celular">Celular:</label> <input type="text" id="celular" value="dasdas" name="celular" required class="form-control"/>
                        <label for="provincia">Provincia:</label>
            
            <select name="provincia" id="listadoProvincias" onchange="LocalidadesDe()">
            <?php foreach($provincias as $obj){?>
                <option value="<?php echo $obj->id; ?>"><?php echo $obj->Nombre; ?></option>
                <?php } ?>
        </select>
        <label for="localidad">Localidad:</label><select name="localidad" id="listadoLocalidades" >
            <?php foreach($localidades as $obj){?>
                <option value="<?php echo $obj->id; ?>"><?php echo $obj->Nombre; ?></option>
                <?php } ?>
        </select>
            <label for="domicilio">Domicilio:</label><input type="text" name="domicilio" id="domicilio" required class="form-control"/>
            <label for='cantPersonas'>Cantidad de personas:</label>
            <input type="number" id="cantPersonas" name='cantPersonas' min='1' value='1' max='8' required class="form-control"/>
            <label for="obsevacion">Alguna observacion particular</label>
            <input tyoe="textarea" name="observacion" id="observacion" class="form-control"/>
            <h4 id="mensaje" ></h4>
            <input type="button" value="Reservar" onclick="SeguirReserva2('<?php echo $desde->format('Y-m-d')."','".$hasta->format('Y-m-d')."',". $unidad->id; ?>)" class="btn btn-success"/>
    </form>
         
    </body>
    
    
</html>
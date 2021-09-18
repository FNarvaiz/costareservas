<!DOCTYPE HTML>
<html lang="es">
    
        
        <form id="BuscarDisponibilidad" class="col-lg-5">
            <h3>Realice su reserva</h3>
            <label for='fechas'>Fechas disponibles:</label>
            <select name="fechas" id="listaFechas" onchange="FechasDe()">
            <?php foreach($fechas as $obj){ ?>
                
                <option value="<?php echo $obj->Desde.",".$obj->Hasta; ?>"><?php echo $obj->Nombre; ?></option>
                <?php } ?>
        </select>
            <label for='fechaDesde'>Desde:</label>
            <input type='date' class="input-propio" onchange="LimitarHasta()" name='Desde' id='fechaDesde' min='<?php echo $fechas[0]->Desde;?>' value="<?php echo $fechas[0]->Desde;?>" required />
            <label for='fechaHasta'>Hasta:</label>
            <input type='date' class="input-propio" name='Hasta'  value="<?php echo $fechas[0]->Hasta;?>" id='fechaHasta' required />
            <label for='categorias'>Tipo:</label>
            <select name="categorias" id="listaCategorias">
            <?php foreach($categorias as $obj){?>
                <option value="<?php echo $obj->id; ?>"><?php echo $obj->Nombre; ?></option>
                <?php } ?>
            </select>
            <input type="button"  value="Reservar" onclick="Buscar()" class="btn btn-info btn-envio"/>
        </form>
         
        <section id="contenerdorPrincipal" class="col-lg-7">
        </section>
        
     
</html>
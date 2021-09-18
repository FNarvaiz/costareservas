<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Precios</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
            input[type=number]::-webkit-outer-spin-button,input[type=number]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            .ColumnaUnidades{
                width:150px;
            }
            .TextoPrecio{
                text-Align : right;
                width : 100%;
                margin: 0px;
            }  
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/precios.js"></script>
    </head>
    
    <body>
        <form action="<?php echo $helper->url("unidades","precios"); ?>" method="POST" class="col-lg-5">
            
            <label for='fecha'>Desde:</label>
            <input type='date' onchange="LimitarHasta('#desde','#hasta')" name='Desde' id='desde' min='<?php echo $desde->format('d-m-Y');?>' value="<?php echo date("Y-m-d");?>" required />
            <label for='fecha'>Hasta:</label>
            <input type='date' name='Hasta'  value="<?php echo $hasta->format('Y-m-d');?>" id='hasta' required />
            <input type="submit" value="Traer" class="btn btn-success"/>
        </form>
        <form action="<?php echo $helper->url("unidades","GuardarPeriodoDePrecio"); ?>" method="POST" class="col-lg-5">
            <h1>Guardar precio por periodo</h1>
            <label for='Unidades'>Unidad:</label>
            <select name="Unidades" id="unidades">
                <?php foreach($unidades as $obj){?>
                <option value="<?php echo $obj->id; ?>"><?php echo $obj->Nombre; ?></option>
                <?php } ?>
        </select>
            <label for='fecha'>Desde:</label>
            <input type='date' onchange="LimitarHasta('#desdeRango','#hastaRango')" name='Desde' id='desdeRango' min='<?php echo $desde->format('d-m-Y');?>' value="<?php echo date("Y-m-d");?>" required />
            <label for='fecha'>Hasta:</label>
            <input type='date' name='Hasta'  value="<?php echo $hasta->format('Y-m-d');?>" id='hastaRango' required />
            <label for='Precio'>Precio:</label>
            <input name='Precio' id="precio" value="0" type="number" min="0" max="99999999">
            <input type="submit" value="Guardar" class="btn btn-success"/>
        </form>
        
            <h3>Grilla de precios</h3>
            <table width="100%" align="center" border=1 cellpadding=5>
                <thead>
                    <tr>
                        <th scope="col" rowspan="2">Unidad</th>
                        <th scope="col" colspan="<?php echo $diferencia;  ?> ">Dias</th>
                    </tr>
                    <tr>

                        <?php
                        $desdeClone= clone $desde;
                        while($desdeClone<=$hasta ){ ?>
                           <th><?php echo $desdeClone->format('d-m-y');?></th><?php
                            $desdeClone->add($intervalo);
                        }?>
                    </tr>
                    <?php ?>
                    <?php ?>
                    
                </thead>

                <tbody>
                <?php

                function RenderInputPrecio($fecha,$precio){
                    $fechaID=$fecha->format('Ymd');//date('dmY',$fecha);
                    echo '<td><input class=TextoPrecio id="'.$fechaID.'" value="'.$precio.'" type="number" min="0" max="99999999"></td>';
                }
                function RenderTodosInputPrecios($desde,$hasta,$intervalo){
                    while($desde<=$hasta){
                        RenderInputPrecio($desde,0);
                        $desde->Add($intervalo);
                    }
                }
                $idUnidadAnterior=null;
                $bandera=false;
                $ultimoDia= clone $hasta;
                $ultimoDia->Add($intervalo);
                $contador=0;
                foreach($resultados as $obj)
                {
                    if($idUnidadAnterior==null)
                        $bandera=true;
                    else if ($idUnidadAnterior!=$obj->id){
                        $bandera=true;
                        if($ultimoDia<=$hasta && $banderaSiguiente)
                            RenderTodosInputPrecios($ultimoDia,$hasta,$intervalo);//termina de dibujar los dias 
                        echo "</tr>";
                    }
                    $banderaSiguiente=false;
                    if($bandera){
                        while($unidades[$contador]->id!=$obj->id){
                            echo '<tr  id="'.$unidades[$contador]->id.'"><th class="ColumnaUnidades">'.$unidades[$contador]->Nombre.'</th>';
                            RenderTodosInputPrecios(new DateTime($desde->format('Y-m-d')),$hasta,$intervalo);
                            $contador++;
                        }
                        $contador++;
                        $idUnidadAnterior=$obj->id;
                        echo '<tr  id="'.$idUnidadAnterior.'"><th class="ColumnaUnidades">'.$obj->Nombre.'</th>';
                        $bandera=false;
                        if($obj->Importe==NULL){
                            RenderTodosInputPrecios(new DateTime($desde->format('Y-m-d')),$hasta,$intervalo);
                            $banderaSiguiente=true;
                        }
                        else
                            $ultimoDia=clone $desde;
                    }
                    while($ultimoDia<=$hasta && !$banderaSiguiente){
                        if($ultimoDia->format('Y-m-d')==$obj->Fecha)
                        {
                            $banderaSiguiente=true;
                            RenderInputPrecio($ultimoDia,$obj->Importe);
                        }
                        else
                            RenderInputPrecio($ultimoDia,0);
                        $ultimoDia->Add($intervalo);
                    }
                }
                while(count($unidades)>$contador){
                            echo '<tr  id="'.$unidades[$contador]->id.'"><th class="ColumnaUnidades">'.$unidades[$contador]->Nombre.'</th>';
                            RenderTodosInputPrecios(new DateTime($desde->format('Y-m-d')),$hasta,$intervalo);
                            $contador++;
                }
                        ?>
                </tbody>
            </table>
         
        
        <footer class="col-lg-12">
            <hr/>
          
        </footer>
    </body>
</html>
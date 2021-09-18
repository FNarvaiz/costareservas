<?php
//Configuración global
require_once 'config/global.php';

//Base para los controladores
require_once 'core/ControladorBase.php';
 
//Funciones para el controlador frontal
require_once 'core/ControladorFrontal.func.php';
 if(isset($_GET["topic"]))
 {
     $_GET["controller"]="reservas";
     $_GET["action"]="notificacionDePago";
 }
//Cargamos controladores y acciones
if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
?>
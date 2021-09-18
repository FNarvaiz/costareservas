<?php 
//ejemplo, página 1; 
session_start(); 
function GuardarEnSession($nombre, $obj){

//include("clasePrueba.php"); 
//$usuarioNuevo = new usuario("Andres","Lopez","32569865G"); 
//$_SESSION["usuario_nuevo"] = serialize($usuarioNuevo); 
$_SESSION[$nombre] = serialize($obj);
}
//ejemplo, página 2; 
function PedirObjetoEnSession($nombre){
    $obj = $_SESSION[$nombre]; 
    $obj = unserialize($obj); 
    return $obj;
//$objetoSesion->muestraDni();
}
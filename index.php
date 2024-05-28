<?php 

require_once "modelos/basededatos.php"; //Se incluye el archivo de la clase BasedeDatos para poder utilizarla en el proyecto por cualquier controlador

//Estructura basica del FoundController para poder instanciar los controladores
if(!isset($_GET['fControlador'])){
    require_once "controladores/inicio.controlador.php";
    $controlador = new InicioControlador();
    call_user_func(array($controlador,"Inicio"));
}else{ 
    $controlador =  $_GET['fControlador'];
    require_once "controladores/$controlador.controlador.php";
    $controlador = ucwords($controlador)."Controlador";
    $controlador = new $controlador();
    $accion = isset($_GET['fAccion']) ? $_GET['fAccion'] : "Inicio";
    call_user_func(array($controlador,$accion));
}

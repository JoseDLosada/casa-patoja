<?php 

require_once 'modelos/arrendatario.php';

class ArrendatarioControlador{
    private $modeloArrendatario;

    public function __CONSTRUCT(){
        $this->modeloArrendatario = new Arrendatario();
    }

    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/arrendatarios/listar-arrendatarios.php";
        require_once 'vistas/pie.php';
    }

    public function FormArrendatario(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/arrendatarios/form-arrendatario.php";
        require_once 'vistas/pie.php';
    }
    
}
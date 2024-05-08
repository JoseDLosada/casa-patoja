<?php 

require_once 'modelos/contrato.php';

class ContratoControlador{
    private $modeloContrato;

    public function __CONSTRUCT(){
        $this->modeloContrato = new Contrato();
    }

    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/contratos/listar-contratos.php";
        require_once 'vistas/pie.php';
    }

    public function FormContrato(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/contratos/form-contrato.php";
        require_once 'vistas/pie.php';
    }
    
}
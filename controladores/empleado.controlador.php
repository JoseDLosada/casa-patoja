<?php 

require_once 'modelos/empleado.php';

class EmpleadoControlador{
    private $modeloEmpleado;

    public function __CONSTRUCT(){
        $this->modeloEmpleado = new Empleado();
    }

    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/empleados/listar-empleados.php";
        require_once 'vistas/pie.php';
    }

    public function FormEmpleado(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/empleados/form-empleado.php";
        require_once 'vistas/pie.php';
    }
    
}
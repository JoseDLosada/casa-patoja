<?php 

require_once 'modelos/habitacion.php';

class HabitacionControlador{

    private $modeloHabitacion;

    public function __CONSTRUCT(){
        $this->modeloHabitacion = new Habitacion();
    }


    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/habitaciones/listar-habitaciones.php";
        require_once 'vistas/pie.php';
    }
    public function FormHabitacion(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/habitaciones/form-hab-insertar.php";
        require_once 'vistas/pie.php';
    }
    
}
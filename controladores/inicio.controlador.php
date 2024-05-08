<?php 

require_once "modelos/propiedad.php";
require_once "modelos/habitacion.php";

class InicioControlador{
    private $modeloPropiedad;
    private $modeloHabitacion;

    public function __construct(){
        //Se instancia el modelo para poder utilizarlo en la clase
        $this->modeloPropiedad = new Propiedad();
        $this->modeloHabitacion = new Habitacion();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/_inicio/principal.php";
        require_once "vistas/pie.php";
    }
}
<?php 

require_once "modelos/arrendatario.php";
require_once "modelos/contrato.php";
require_once "modelos/empleado.php";
require_once "modelos/gasto.php";
require_once "modelos/habitacion.php";
require_once "modelos/ingreso.php";
require_once "modelos/propiedad.php";
require_once "modelos/nomina.php";


class InicioControlador{
    private $modeloArrendatario;
    private $modeloContrato;
    private $modeloEmpleado;
    private $modeloGasto;
    private $modeloHabitacion;
    private $modeloIngreso;
    private $modeloPropiedad;
    private $modeloNomina;

    

    public function __construct(){
        //Se instancia el modelo para poder utilizarlo en la clase
        $this->modeloPropiedad = new Propiedad();
        $this->modeloHabitacion = new Habitacion();
        $this->modeloArrendatario = new Arrendatario();
        $this->modeloContrato = new Contrato();
        $this->modeloEmpleado = new Empleado();
        $this->modeloGasto = new Gasto();
        $this->modeloIngreso = new Ingreso();
        $this->modeloNomina = new Nomina();
        
       
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/_inicio/principal.php";
        require_once "vistas/pie.php";
    }

    public function FlujoCaja(){
        require_once "vistas/encabezado.php";
        require_once "vistas/_inicio/flujo-caja.php";
        require_once "vistas/pie.php";
    }

}
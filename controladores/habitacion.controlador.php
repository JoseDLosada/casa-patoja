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
        $titulo = "Registrar Habitación";
        $formulario = "Formulario Habitación";
        require_once 'vistas/encabezado.php';
        require_once "vistas/habitaciones/form-habitacion.php";
        require_once 'vistas/pie.php';
    }
    
    public function FormActulizarHabitacion(){

        $titulo = "Actualizar Habitación";
        $formulario = "Formulario Habitación";
        $habitacion = $this->modeloHabitacion->
        Obtener($_GET['propiedad_direccion'], $_GET['habitacion_numero']);
        require_once 'vistas/encabezado.php';
        require_once "vistas/habitaciones/form-habtiacion-actualizar.php";
        require_once 'vistas/pie.php';
    }

    public function GuardarHabitacion(){
        $habitacion = new Habitacion();
        $habitacion->setPropiedad_direccion($_POST['hab-prodiedad']);
        $habitacion->setHabitacion_numero($_POST['hab-numero']);
        $habitacion->setHabitacion_disponibilidad($_POST['hab-disponibilidad']);
        $habitacion->setHabitacion_tarifa_alquiler(intval($_POST['hab-tarifa']));
        $habitacion->setHabitacion_banio_privado($_POST['hab-banio']);
        $habitacion->setHabitacion_tamanio($_POST['hab-tamanio']);
        $habitacion->setHabitacion_amueblada($_POST['hab-amueblada']);
        
        $this->modeloHabitacion->Insertar($habitacion);
        header('Location: ?fControlador=habitacion');
    }

    public function ActualizarHabitacion(){
        $habitacion = new Habitacion();
        $habitacion->setPropiedad_direccion($_POST['hab-prodiedad']);
        $habitacion->setHabitacion_numero($_POST['hab-numero']);
        $habitacion->setHabitacion_disponibilidad($_POST['hab-disponibilidad']);
        $habitacion->setHabitacion_tarifa_alquiler(intval($_POST['hab-tarifa']));
        $habitacion->setHabitacion_banio_privado($_POST['hab-banio']);
        $habitacion->setHabitacion_tamanio($_POST['hab-tamanio']);
        $habitacion->setHabitacion_amueblada($_POST['hab-amueblada']);
        
        $this->modeloHabitacion->Actualizar($habitacion);
        header('Location: ?fControlador=habitacion');
    }
    

    public function EliminarHabitacion(){
        $this->modeloHabitacion->Eliminar($_GET['propiedad_direccion'], $_GET['habitacion_numero']);
        header('Location: ?fControlador=habitacion');
    }
}
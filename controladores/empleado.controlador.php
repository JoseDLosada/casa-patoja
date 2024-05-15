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
        $titulo = "Registrar Empleado";
        require_once 'vistas/encabezado.php';
        require_once "vistas/empleados/form-empleado.php";
        require_once 'vistas/pie.php';
    }

    public function FormEmpleadoActualizar(){
        $titulo = "Actualizar Empleado";
        $empleado = $this->modeloEmpleado->Obtener($_GET['empleado_cedula']);
        require_once 'vistas/encabezado.php';
        require_once "vistas/empleados/form-empleado-actualizar.php";
        require_once 'vistas/pie.php';
    }


    public function GuardarEmpleado(){
        $empleado = new Empleado();
        $empleado->setEmpleado_cedula($_POST['emp-cedula']);
        $empleado->setEmpleado_nombre($_POST['emp-nombre']);
        $empleado->setEmpleado_apellido($_POST['emp-apellido']);
        $empleado->setEmpleado_direccion($_POST['emp-direccion']);
        $empleado->setEmpleado_telefono($_POST['emp-telefono']);
        $empleado->setEmpleado_codigo_salud($_POST['emp-codigo-salud']);
        $empleado->setEmpleado_tipo($_POST['emp-tipo']);
        $empleado->setEmpleado_salario($_POST['emp-salario']);
        $empleado->setPropiedad_direccion($_POST['emp-prodiedad']);

        $this->modeloEmpleado->Insertar($empleado);
        header('Location: ?fControlador=empleado');
    }

    public function ActualizarEmpleado(){
        $empleado = new Empleado();
        $empleado->setEmpleado_cedula($_POST['emp-cedula']);
        $empleado->setEmpleado_nombre($_POST['emp-nombre']);
        $empleado->setEmpleado_apellido($_POST['emp-apellido']);
        $empleado->setEmpleado_direccion($_POST['emp-direccion']);
        $empleado->setEmpleado_telefono($_POST['emp-telefono']);
        $empleado->setEmpleado_codigo_salud($_POST['emp-codigo-salud']);
        $empleado->setEmpleado_tipo($_POST['emp-tipo']);
        $empleado->setEmpleado_salario($_POST['emp-salario']);
        $empleado->setPropiedad_direccion($_POST['emp-prodiedad']);

        $this->modeloEmpleado->Actualizar($empleado);
        header('Location: ?fControlador=empleado');

    }

    public function Eliminar(){
        $this->modeloEmpleado->Eliminar($_GET['empleado_cedula']);
        header('Location: ?fControlador=empleado');
    }
    
}
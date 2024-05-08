<?php 

require_once 'modelos/ingreso.php';

class IngresoControlador{
    private $modeloIngreso;

    public function __CONSTRUCT(){
        $this->modeloIngreso = new Ingreso();
    }

    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/ingresos/listar-ingresos.php";
        require_once 'vistas/pie.php';
    }

    public function FormIngreso(){
        $titulo = "Registrar Ingreso";
        require_once 'vistas/encabezado.php';
        require_once "vistas/ingresos/form-ingreso.php";
        require_once 'vistas/pie.php';
    }

    public function FormIngresoActualizar(){
        $titulo = "Actualizar Ingreso";
        $ingreso = $this->modeloIngreso->Obtener(urldecode($_GET['ingreso_id']));
        require_once 'vistas/encabezado.php';
        require_once "vistas/ingresos/form-ingreso-actualizar.php";
        require_once 'vistas/pie.php';
    }
    
    public function GuardarIngreso(){
        $ingreso = new Ingreso();
        $ingreso->setPagoAlq_id(intval($_POST['p-id']));
        $ingreso->setAlquiler_id($_POST['p-alquiler']);
        $ingreso->setPagoAlq_fecha(new DateTime($_POST['p-fecha']));
        $ingreso->setPagoAlq_monto($_POST['p-monto']);
        $ingreso->setPagoAlq_metodo($_POST['p-metodo']);
        $ingreso->setPagoAlq_descripcion($_POST['p-descripcion']);

        $ingreso -> getPagoAlq_id() > 0 ? $this->modeloIngreso->Actualizar($ingreso) : $this->modeloIngreso->Insertar($ingreso);
        header('Location: ?fControlador=ingreso');     
    }
    public function eliminar(){
        $this->modeloIngreso->Eliminar($_GET['ingreso_id']);
        header('Location: ?fControlador=ingreso');
    }
}
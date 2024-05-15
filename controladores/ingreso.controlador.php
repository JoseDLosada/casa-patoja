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

    public function GuardarIngreso(){
        $ingreso = new Ingreso();
        $ingreso->setPagoAlq_id(intval($_POST['i-id']));
        $ingreso->setContrato_id($_POST['i-contrato']);
        $ingreso->setPagoAlq_fecha(new DateTime($_POST['i-fecha']));
        $ingreso->setPagoAlq_monto($_POST['i-monto']);
        $ingreso->setPagoAlq_metodo($_POST['i-metodo']);
        $ingreso->setPagoAlq_descripcion($_POST['i-descripcion']);
        
        $ingreso -> getPagoAlq_id()>0 ?  $this->modeloIngreso->Actualizar($ingreso): $this->modeloIngreso->Insertar($ingreso);
        header('Location: ?fControlador=ingreso');     
    }

    public function FormIngresoActualizar(){
        $titulo = "Actualizar Ingreso";
        $ingreso = $this->modeloIngreso->Obtener(urldecode($_GET['pagoAlq_id']));
        require_once 'vistas/encabezado.php';
        require_once "vistas/ingresos/form-ingresos-actualizar.php";
        require_once 'vistas/pie.php';
       
    }
    
    public function eliminar(){
        $this->modeloIngreso->Eliminar($_GET['pagoAlq_id']);
        header('Location: ?fControlador=ingreso');
    }
}
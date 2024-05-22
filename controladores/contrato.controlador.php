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
        $titulo = "Registrar Contrato";
        $formulario = "Formulario Contrato";
        require_once 'vistas/encabezado.php';
        require_once "vistas/contratos/form-contrato.php";
        require_once 'vistas/pie.php';
    }

    public function FormContratoActualizar(){
        $titulo = "Actualizar Contrato";
        $formulario = "Formulario Contrato";
        $contrato = $this->modeloContrato->Obtener(urldecode($_GET['contrato_id']));
        require_once 'vistas/encabezado.php';
        require_once "vistas/contratos/form-contrato-actualizar.php";
        require_once 'vistas/pie.php';
    }

    public function GuardarContrato(){
        $contrato = new Contrato();
        $contrato->setContrato_id(intval($_POST['cnt-id']));
        $contrato->setArrendatario_cedula($_POST['ctn-arrendatario']);
        $contrato->setHabitacion_numero($_POST['cnt-habitacion']);
        $contrato->setContrato_costo($_POST['cnt-costo']);
        $contrato->setContrato_fecha_inicio(new DateTime($_POST['cnt-fecha-inicio']));
        $contrato->setContrato_fecha_final(new DateTime($_POST['cnt-fecha-fin']));
        $contrato->setContrato_estado($_POST['cnt-estado']);

        $contrato -> getContrato_id() > 0 ? $this->modeloContrato->Actualizar($contrato) : $this->modeloContrato->Insertar($contrato);
        header('Location: ?fControlador=contrato');
    }

    public function Eliminar(){
        $this->modeloContrato->Eliminar($_GET['contrato_id']);
        header('Location: ?fControlador=contrato');
    }
    
}
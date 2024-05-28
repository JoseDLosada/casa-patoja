<?php 

require_once 'modelos/nomina.php';

class NominaControlador{
    private $modeloNomina;

    public function __CONSTRUCT(){
        $this->modeloNomina = new Nomina();
    }


    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/nomina/listar-nomina.php";
        require_once 'vistas/pie.php';
    }

    public function FormNomina(){
        $titulo = "Registrar Pago de Empleado";
        $formulario = "Formulario Pago de Empleado";
        require_once 'vistas/encabezado.php';
        require_once "vistas/nomina/form-nomina.php";
        require_once 'vistas/pie.php';
    }

    public function FormNominaActualizar(){
        $titulo = "Actualizar Pago de Empleado";
        $formulario = "Formulario Pago de Empleado";
        $nomina = $this->modeloNomina->Obtener(urldecode($_GET['nomina_id']));
        require_once 'vistas/encabezado.php';
        require_once "vistas/nomina/form-nomina-actualizar.php";
        require_once 'vistas/pie.php';
    }

    public function GuardarNomina(){
        $nomina = new Nomina();
        $nomina->setNomina_id(intval($_POST['nom-id']));
        $nomina->setEmpleado_cedula($_POST['nom-empleado']);
        $nomina->setNomina_pago($_POST['nom-pago']);
        $nomina->setNomina_fecha(new DateTime($_POST['nom-fecha']));

        $nomina -> getNomina_id() > 0 ? $this->modeloNomina->Actualizar($nomina) : $this->modeloNomina->Insertar($nomina);
        header('Location: ?fControlador=nomina');
    }

    public function Eliminar(){
        $this->modeloNomina->Eliminar($_GET['nomina_id']);
        header('Location: ?fControlador=nomina');
    }

}
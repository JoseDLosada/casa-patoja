<?php 

require_once 'modelos/arrendatario.php';

class ArrendatarioControlador{
    private $modeloArrendatario;

    public function __CONSTRUCT(){
        $this->modeloArrendatario = new Arrendatario();
    }

    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/arrendatarios/listar-arrendatarios.php";
        require_once 'vistas/pie.php';
    }

    public function FormArrendatario(){
        $titulo = "Nuevo Arrendatario";
        $formulario = "Registrar Arrendatario";
        require_once 'vistas/encabezado.php';
        require_once "vistas/arrendatarios/form-arrendatario.php";
        require_once 'vistas/pie.php';
    }

    public function FormArrendatarioActulizar(){
        $titulo = "Actualizar Arrendatario";
        $formulario = "Actualizar Arrendatario";
        $arrendatario = $this->modeloArrendatario->Obtener($_GET['arrendatario_cedula']);
        require_once 'vistas/encabezado.php';
        require_once "vistas/arrendatarios/form-arrendatario-actualizar.php";
        require_once 'vistas/pie.php';
    }
    

    public function GuardarArrendatario(){
        $arrendatario = new Arrendatario();
        $arrendatario->setArrendatario_cedula($_POST['arr-cedula']);
        $arrendatario->setArrendatario_nombre($_POST['arr-nombre']);
        $arrendatario->setArrendatario_apellido($_POST['arr-apellido']);
        $arrendatario->setArrendatario_telefono($_POST['arr-telefono']);
        $arrendatario->setArrendatario_ocupacion($_POST['arr-ocupacion']);
        $arrendatario->setArrendatario_contacto_emergencia($_POST['arr-emergencia']);

        $this->modeloArrendatario->Insertar($arrendatario);
        header('Location: ?fControlador=arrendatario');
    }

    public function ActulizarArrendatario(){
        $arrendatario = new Arrendatario();
        $arrendatario->setArrendatario_cedula($_POST['arr-cedula']);
        $arrendatario->setArrendatario_nombre($_POST['arr-nombre']);
        $arrendatario->setArrendatario_apellido($_POST['arr-apellido']);
        $arrendatario->setArrendatario_telefono($_POST['arr-telefono']);
        $arrendatario->setArrendatario_ocupacion($_POST['arr-ocupacion']);
        $arrendatario->setArrendatario_contacto_emergencia($_POST['arr-emergencia']);

        $this->modeloArrendatario->Actualizar($arrendatario);
        header('Location: ?fControlador=arrendatario');
    }

    public function Eliminar(){
        $this->modeloArrendatario->Eliminar($_GET['arrendatario_cedula']);
        header('Location: ?fControlador=arrendatario');
    }
    
}
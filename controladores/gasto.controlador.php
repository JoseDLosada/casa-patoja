<?php 

require_once 'modelos/gasto.php';

class GastoControlador{
    private $modeloGasto;

    public function __CONSTRUCT(){
        $this->modeloGasto = new Gasto();
    }

    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/gastos/listar-gastos.php";
        require_once 'vistas/pie.php';
    }

    public function FormGasto(){
        $titulo = "Registrar Gasto";
        require_once 'vistas/encabezado.php';
        require_once "vistas/gastos/form-gasto.php";
        require_once 'vistas/pie.php';
    }

    public function GuardarGasto(){
        $gasto = new Gasto();
        $gasto->setGasto_id(intval($_POST['g-id']));
        $gasto->setGasto_categoria($_POST['g-categoria']);
        $gasto->setGasto_monto($_POST['g-monto']);
        $gasto->setGasto_fecha(new DateTime($_POST['g-fecha']));
        $gasto->setGasto_nit_factura($_POST['g-nit']);
        $gasto->setPropiedad_direccion($_POST['g-propiedad']);
        $gasto->setGasto_descripcion($_POST['g-descripcion']);

        $gasto -> getGasto_id() > 0 ? $this->modeloGasto->Actualizar($gasto) : $this->modeloGasto->Insertar($gasto);
        header('Location: ?fControlador=gasto');
    }
    
    public function FormGastoActualizar(){
        $titulo = "Actualizar Gasto";
        $gasto = $this->modeloGasto->Obtener(urldecode($_GET['gasto_id']));
        require_once 'vistas/encabezado.php';
        require_once "vistas/gastos/form-gasto-actualizar.php";
        require_once 'vistas/pie.php';
    }


    public function Eliminar(){
        $this->modeloGasto->Eliminar($_GET['gasto_id']);
        header('Location: ?fControlador=gasto');
    }
}
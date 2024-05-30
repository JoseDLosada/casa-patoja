<?php 

require_once 'modelos/propiedad.php';//Se incluye el modelo de la propiedad

class PropiedadControlador{
    private $modelo;//Variable para el modelo de la propiedad

    public function __CONSTRUCT(){
        $this->modelo = new Propiedad();//Se crea un objeto del modelo de la propiedad
    }


    //Redireccion a las vistas
    public function Inicio(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/propiedades/listar-propiedades.php";
        require_once 'vistas/pie.php';
    }
    public function FormPropiedad(){
        // $titulo = "Registrar Propiedad";
        // $propiedad = new Propiedad();
        // if(isset($_GET['propiedad_direccion'])){
        //     $propiedad_direccion = urldecode($_GET['propiedad_direccion']);
        //     $propiedad = $this->modelo->Obtener($propiedad_direccion);
        //     $titulo = "Modificar Propiedad";
        // }
        require_once 'vistas/encabezado.php';
        require_once "vistas/propiedades/form-pro-insertar.php";
        require_once 'vistas/pie.php';
    }
    public function FormPropiedadActualizar(){
        $propiedad_direccion = urldecode($_GET['propiedad_direccion']);
        $propiedad = $this->modelo->Obtener($propiedad_direccion);
        require_once 'vistas/encabezado.php';
        require_once "vistas/propiedades/form-pro-actualizar.php";
        require_once 'vistas/pie.php';
    }

    //CRUD de la propiedad
    public function Guardar(){
        $propiedad = new Propiedad();
        //Asignacion de los valores del formulario a la propiedad al objeto propiedad
        //Tomas los campos dependiendo de los nombres de los inputs en el formulario name = "pro_direccion"
        $propiedad->setPropiedad_direccion(strval($_POST['pro_direccion']));
        $propiedad->setPropiedad_barrio($_POST['pro_barrio']);
        $propiedad->setPropiedad_numero_habitaciones($_POST['pro_habitaciones']);
        $propiedad->setPropiedad_descripcion($_POST['pro_descripcion']);

        // Validate if the propiedad_direccion already exists in the database
        // if (!(isset($_GET['propiedad_direccion']))) {
        //     // ($this->modelo->BuscarPropiedad($propiedad->getPropiedad_direccion()
        //     $this->modelo->Insertar($propiedad);
        // }else{
        //     $this->modelo->Actualizar($propiedad);
        // }
        $this->modelo->Insertar($propiedad);
        header('Location: ?fControlador=propiedad'); // Redirigir a la lista de propiedades después de guardar la nueva propiedad en la base de datos 
    }
    public function Actualizar(){
        $propiedad = new Propiedad();
        $propiedad->setPropiedad_direccion(strval($_POST['pro_direccion']));
        $propiedad->setPropiedad_barrio($_POST['pro_barrio']);
        $propiedad->setPropiedad_numero_habitaciones($_POST['pro_habitaciones']);
        $propiedad->setPropiedad_descripcion($_POST['pro_descripcion']);
        
        $this->modelo->Actualizar($propiedad);
        header('Location: ?fControlador=propiedad');
    }

    public function Eliminar(){
         $this->modelo->Eliminar($_GET['propiedad_direccion']);
         header('Location: ?fControlador=propiedad');
    }

    
//Construccion
    public function TestBuscar(){
        require_once 'vistas/encabezado.php';
        require_once "vistas/_construccion/form-seleccion.php";
        require_once 'vistas/pie.php';
    }
    public function Search(){
        $propiedad = new Propiedad();
        $propiedad->setPropiedad_direccion(strval($_POST['search']));
        // $propiedad = isset($_POST['search']) ? setPropiedad_direccion($_POST['search']) : null;
        // $_POST['search'] = isset($_POST['search']) ? $_POST['search'] : null;
        $this->modelo->Buscar($propiedad);
        header('Location: ?fControlador=propiedad&fAccion=TestBuscar');
    }


}
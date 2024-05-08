<?php 

class Arrendatario{

    private $pdo;

    private $arrendatario_cedula;
    private $arrendatario_nombre;
    private $arrendatario_apellido;
    private $arrendatario_telefono;
    private $arrendatario_ocupacion;
    private $arrendatario_contacto_emergencia;


    public function __CONSTRUCT(){
        try{
            $this->pdo = BasedeDatos::Conectar();//Conectar a la base de datos 
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getArrendatario_cedula() : ?int{
        return $this->arrendatario_cedula;
    }
    public function setArrendatario_cedula(int $arrendatario_cedula) {
        $this->arrendatario_cedula = $arrendatario_cedula;
    }
    public function getArrendatario_nombre() : ?string{
        return $this->arrendatario_nombre;
    }
    public function setArrendatario_nombre(string $arrendatario_nombre){
        $this->arrendatario_nombre = $arrendatario_nombre;
    }
    public function getArrendatario_apellido(): ?string {
        return $this->arrendatario_apellido;
    }
    public function setArrendatario_apellido(string $arrendatario_apellido) {
        $this->arrendatario_apellido = $arrendatario_apellido;
    }
    public function getArrendatario_telefono() : ?int{
        return $this->arrendatario_telefono;
    }
    public function setArrendatario_telefono(int $arrendatario_telefono){
        $this->arrendatario_telefono = $arrendatario_telefono;
    }
    public function getArrendatario_ocupacion() : ?string{
        return $this->arrendatario_ocupacion;
    }
    public function setArrendatario_ocupacion(string $arrendatario_ocupacion){
        $this->arrendatario_ocupacion = $arrendatario_ocupacion;
    }
    public function getArrendatario_contacto_emergencia() : ?int{
        return $this->arrendatario_contacto_emergencia;
    }
    public function setArrendatario_contacto_emergencia(int $arrendatario_contacto_emergencia){
        $this->arrendatario_contacto_emergencia = $arrendatario_contacto_emergencia;
    }

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM arrendatarios");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


}
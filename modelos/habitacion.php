<?php 

class Habitacion{

    private $pdo;//Variable para la conexion a la base de datos

    //Columnas de la tabla habitacion
    private $propiedad_direccion;
    private $habitacion_numero;
    private $habitacion_disponibilidad;
    private $habitacion_tarifa_alquiler;
    private $habitacion_banio_privado;
    private $habitacion_tamanio;
    private $habitacion_amueblada;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();//Se obtiene la conexion a la base de datos
    }

    //getters y setters de las columnas de la tabla habitacion
    public function getPropiedad_direccion() : ?string{
        return $this->propiedad_direccion;
    }
    public function setPropiedad_direccion(string $propiedad_direccion){
        $this->propiedad_direccion = $propiedad_direccion;
    }
    public function getHabitacion_numero() : ?int{
        return $this->habitacion_numero;
    }
    public function setHabitacion_numero(int $habitacion_numero) {
        $this->habitacion_numero = $habitacion_numero;
    }
    public function getHabitacion_disponibilidad() : ?string{
        return $this->habitacion_disponibilidad;
    }
    public function setHabitacion_disponibilidad(string $habitacion_disponibilidad){
        $this->habitacion_disponibilidad = $habitacion_disponibilidad;
    }
    public function getHabitacion_tarifa_alquiler() : ?int{
        return $this->habitacion_tarifa_alquiler;
    }
    public function setHabitacion_tarifa_alquiler(int $habitacion_tarifa_alquiler){
        $this->habitacion_tarifa_alquiler = $habitacion_tarifa_alquiler;
    }
    public function getHabitacion_banio_privado() : ?string{
        return $this->habitacion_banio_privado;
    }
    public function setHabitacion_banio_privado(string $habitacion_banio_privado){
        $this->habitacion_banio_privado = $habitacion_banio_privado;
    }
    public function getHabitacion_tamanio() : ?int{
        return $this->habitacion_tamanio;
    }
    public function setHabitacion_tamanio(int $habitacion_tamanio){
        $this->habitacion_tamanio = $habitacion_tamanio;
    }
    public function getHabitacion_amueblada() : ?string{
        return $this->habitacion_amueblada;
    }
    public function setHabitacion_amueblada(string $habitacion_amueblada){
        $this->habitacion_amueblada = $habitacion_amueblada;
    }

    //Metodos para mostrar en tablas
    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM habitaciones;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }



}
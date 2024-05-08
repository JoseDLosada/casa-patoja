<?php 

class Empleado{

    private $pdo;

    private $empleado_cedula;
    private $empleado_nombre;
    private $empleado_apellido;
    private $empleado_direccion;
    private $empleado_telefono;
    private $empleado_codigo_salud;
    private $empleado_tipo;
    private $empleado_salario;
    private $propiedad_direccion;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getEmpleado_cedula() : ?int{
        return $this->empleado_cedula;
    }
    public function setEmpleado_cedula(int $empleado_cedula) {
        $this->empleado_cedula = $empleado_cedula;
    }
    public function getEmpleado_nombre() : ?string{
        return $this->empleado_nombre;
    }
    public function setEmpleado_nombre(string $empleado_nombre){
        $this->empleado_nombre = $empleado_nombre;
    }
    public function getEmpleado_apellido(): ?string {
        return $this->empleado_apellido;
    }
    public function setEmpleado_apellido(string $empleado_apellido) {
        $this->empleado_apellido = $empleado_apellido;
    }
    public function getEmpleado_direccion() : ?string{
        return $this->empleado_direccion;
    }
    public function setEmpleado_direccion(string $empleado_direccion){
        $this->empleado_direccion = $empleado_direccion;
    }
    public function getEmpleado_telefono() : ?int{
        return $this->empleado_telefono;
    }
    public function setEmpleado_telefono(int $empleado_telefono){
        $this->empleado_telefono = $empleado_telefono;
    }
    public function getEmpleado_codigo_salud() : ?string{
        return $this->empleado_codigo_salud;
    }
    public function setEmpleado_codigo_salud(string $empleado_codigo_salud){
        $this->empleado_codigo_salud = $empleado_codigo_salud;
    }
    public function getEmpleado_tipo() : ?string{
        return $this->empleado_tipo;
    }
    public function setEmpleado_tipo(string $empleado_tipo){
        $this->empleado_tipo = $empleado_tipo;
    }
    public function getEmpleado_salario() : ?int{
        return $this->empleado_salario;
    }
    public function setEmpleado_salario(int $empleado_salario){
        $this->empleado_salario = $empleado_salario;
    }
    public function getPropiedad_direccion() : ?string{
        return $this->propiedad_direccion;
    }
    public function setPropiedad_direccion(string $propiedad_direccion){
        $this->propiedad_direccion = $propiedad_direccion;
    }

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM empleados");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}
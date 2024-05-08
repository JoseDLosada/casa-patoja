<?php 


class Contrato{

    private $pdo;

    private $contrato_id;
    private $arrendatario_cedula;
    private $habitacion_numero;
    private $propiedad_direccion;
    private $contrato_costo;
    private $contrato_fecha_inicio;
    private $contrato_fecha_final;
    private $contrato_estado;


    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getContrato_id() : ?int{
        return $this->contrato_id;
    }
    public function setContrato_id(int $contrato_id) {
        $this->contrato_id = $contrato_id;
    }
    public function getArrendatario_cedula() : ?int{
        return $this->arrendatario_cedula;
    }
    public function setArrendatario_cedula(int $arrendatario_cedula) {
        $this->arrendatario_cedula = $arrendatario_cedula;
    }
    public function getHabitacion_numero() : ?int{
        return $this->habitacion_numero;
    }
    public function setHabitacion_numero(int $habitacion_numero) {
        $this->habitacion_numero = $habitacion_numero;
    }
    public function getPropiedad_direccion() : ?string{
        return $this->propiedad_direccion;
    }
    public function setPropiedad_direccion(string $propiedad_direccion){
        $this->propiedad_direccion = $propiedad_direccion;
    }
    public function getContrato_costo() : ?int{
        return $this->contrato_costo;
    }
    public function setContrato_costo(int $contrato_costo){
        $this->contrato_costo = $contrato_costo;
    }
    public function getContrato_fecha_inicio(): ?DateTime {
        return $this->contrato_fecha_inicio;
    }
    public function setContrato_fecha_inicio(DateTime $contrato_fecha_inicio) {
        $this->contrato_fecha_inicio = $contrato_fecha_inicio;
    }
    public function getContrato_fecha_final(): ?DateTime {
        return $this->contrato_fecha_final;
    }
    public function setContrato_fecha_final(DateTime $contrato_fecha_final) {
        $this->contrato_fecha_final = $contrato_fecha_final;
    }
    public function getContrato_estado() : ?string{
        return $this->contrato_estado;
    }
    public function setContrato_estado(string $contrato_estado){
        $this->contrato_estado = $contrato_estado;
    }

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM contratos");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
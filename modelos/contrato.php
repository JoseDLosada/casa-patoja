<?php 


class Contrato{

    //Atributos
    private $pdo;

    private $contrato_id;
    private $arrendatario_cedula;
    private $habitacion_numero;
    private $propiedad_direccion;
    private $contrato_costo;
    private $contrato_fecha_inicio;
    private $contrato_fecha_final;
    private $contrato_estado;


    //Getter y Setter
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
    public function getHabitacion_numero() : ?string{
        return $this->habitacion_numero;
    }
    public function setHabitacion_numero(string $habitacion_numero) {
        $this->habitacion_numero = $habitacion_numero;
    }

    public function getPropiedad_direccion() : ?string{
        return $this->propiedad_direccion;
    }
    public function setPropiedad_direccion(?string $propiedad_direccion) {
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
    public function setContrato_fecha_final(?DateTime $contrato_fecha_final) {
        $this->contrato_fecha_final = $contrato_fecha_final;
    }
    public function getContrato_estado() : ?string{
        return $this->contrato_estado;
    }
    public function setContrato_estado(string $contrato_estado){
        $this->contrato_estado = $contrato_estado;
    }



    //Metodos

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM contratos");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
            //que hace un fetchAll? devuelve un array con todas las filas del resultado de la consulta
            //que hace un fetch? devuelve la siguiente fila del resultado de la consulta
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function ListarArrendatario(){
        try{
            $consulta = $this->pdo->prepare("SELECT 
                                        a.arrendatario_cedula, 
                                        CONCAT(a.arrendatario_nombre, ' ', a.arrendatario_apellido) AS nombre
                                    FROM 
                                        arrendatarios a
                                    LEFT JOIN 
                                        contratos c ON a.arrendatario_cedula = c.arrendatario_cedula 
                                        AND c.contrato_estado != 'Finalizado'
                                    WHERE 
                                        c.contrato_id IS NULL;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarHabitacion(){
        try{
            $consulta = $this->pdo->prepare("SELECT * 
                                                FROM habitaciones 
                                                WHERE habitacion_disponibilidad = 'Libre';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarPropiedadDisponible(){
        try{
            $consulta = $this->pdo->prepare("SELECT DISTINCT propiedad_direccion
                                                    FROM habitaciones
                                                    NATURAL LEFT JOIN contratos 
                                                    WHERE habitacion_disponibilidad = 'Libre';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($contrato_id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM contratos WHERE contrato_id = ?");
            $consulta->execute(array($contrato_id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $contrato = new Contrato();
            $contrato->setContrato_id($r->contrato_id);
            $contrato->setArrendatario_cedula($r->arrendatario_cedula);
            $contrato->setHabitacion_numero($r->habitacion_numero);
            $contrato->setPropiedad_direccion($r->propiedad_direccion);
            $contrato->setContrato_costo($r->contrato_costo);
            $contrato->setContrato_fecha_inicio(new DateTime($r->contrato_fecha_inicio));
            $contrato->setContrato_fecha_final(new DateTime($r->contrato_fecha_final));
            $contrato->setContrato_estado($r->contrato_estado);
            return $contrato;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Contrato $contrato){
        try{
            $sql = "INSERT INTO contratos (
                            arrendatario_cedula,
                            propiedad_direccion, 
                            habitacion_numero, 
                            contrato_costo, 
                            contrato_fecha_inicio, 
                            contrato_fecha_final, 
                            contrato_estado) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $contrato->getArrendatario_cedula(),
                        $contrato->getPropiedad_direccion(),
                        $contrato->getHabitacion_numero(),
                        $contrato->getContrato_costo(),
                        $contrato->getContrato_fecha_inicio()->format('Y-m-d'),
                        $contrato->getContrato_fecha_final()->format('Y-m-d'),
                        $contrato->getContrato_estado()
                    )
                );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Contrato $contrato){
        try{
            $sql = "UPDATE contratos SET 
                        arrendatario_cedula = ?,
                        propiedad_direccion = ?,
                        habitacion_numero = ?,
                        contrato_costo = ?,
                        contrato_fecha_inicio = ?,
                        contrato_fecha_final = ?,
                        contrato_estado = ?
                    WHERE contrato_id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $contrato->getArrendatario_cedula(),
                        $contrato->getPropiedad_direccion(),
                        $contrato->getHabitacion_numero(),
                        $contrato->getContrato_costo(),
                        $contrato->getContrato_fecha_inicio()->format('Y-m-d'),
                        $contrato->getContrato_fecha_final()->format('Y-m-d'),
                        $contrato->getContrato_estado(),
                        $contrato->getContrato_id()
                    )
                );
        }catch(Exception $e){
            die($e->getMessage());
        }

    }
    public function Eliminar($contrato_id){
        try{
            $consulta = $this->pdo->prepare("DELETE FROM contratos WHERE contrato_id = ?");
            $consulta->execute(array($contrato_id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarMorosos(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM vista_contratos_pendientes_pago;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ContarContratosActivos(){
        try{
            $consulta = $this->pdo->prepare("SELECT count(contrato_estado) AS contrato FROM contratos WHERE contrato_estado = 'Activo';");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
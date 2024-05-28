<?php 

class Nomina{

    private $pdo;//Variable para la conexion a la base de datos
    
    //Columnas de la tabla habitacion
    private $nomina_id;
    private $empleado_cedula;
    private $nomina_pago;
    private $nomina_fecha;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();//Se obtiene la conexion a la base de datos
    }

    //getters y setters de las columnas de la tabla habitacion
    public function getNomina_id() : ?int{
        return $this->nomina_id;
    }
    public function setNomina_id(int $nomina_id){
        $this->nomina_id = $nomina_id;
    }
    public function getEmpleado_cedula() : ?string{
        return $this->empleado_cedula;
    }
    public function setEmpleado_cedula(string $empleado_cedula) {
        $this->empleado_cedula = $empleado_cedula;
    }
    public function getNomina_pago() : ?int{
        return $this->nomina_pago;
    }
    public function setNomina_pago(int $nomina_pago){
        $this->nomina_pago = $nomina_pago;
    }
    public function getNomina_fecha() : ?DateTime{
        return $this->nomina_fecha;
    }
    public function setNomina_fecha(DateTime $nomina_fecha){
        $this->nomina_fecha = $nomina_fecha;
    }

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM nomina");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }



    public function Obtener($nomina_id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM nomina WHERE nomina_id = ?");
            $consulta->execute(array($nomina_id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $this->setNomina_id($r->nomina_id);
            $this->setEmpleado_cedula($r->empleado_cedula);
            $this->setNomina_pago($r->nomina_pago);
            $this->setNomina_fecha(new DateTime($r->nomina_fecha));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Nomina $nomina){
        try{
            $consulta = "INSERT INTO nomina
                            (empleado_cedula, 
                            nomina_pago, 
                            nomina_fecha) 
                            VALUES(?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $nomina->getEmpleado_cedula(), 
                            $nomina->getNomina_pago(), 
                            $nomina->getNomina_fecha()->format('Y-m-d')
                        ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Nomina $nomina){
        try{
            $consulta = "UPDATE nomina SET 
                        empleado_cedula = ?, 
                        nomina_pago = ?, 
                        nomina_fecha = ? 
                        WHERE nomina_id = ?;";
            $nomina->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $nomina->getEmpleado_cedula(), 
                            $nomina->getNomina_pago(), 
                            $nomina->getNomina_fecha()->format('Y-m-d'), 
                            $nomina->getNomina_id()
                        ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($nomina_id){
        try{
            $consulta = $this->pdo->prepare("DELETE FROM nomina WHERE nomina_id = ?;");
            $consulta->execute(array($nomina_id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarEmpleados(){
        try{
            $consulta = $this->pdo->prepare("SELECT DISTINCT CONCAT(empleado_nombre,' ', empleado_apellido) AS nombre, empleado_cedula FROM empleados");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarNominaMes(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM vista_nomina_mes_actual;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function MostrarTotalNominaMes(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(monto) AS total FROM vista_nomina_mes_actual;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
}
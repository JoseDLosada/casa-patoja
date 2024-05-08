<?php 

class Ingreso{
    private $pdo;

    private $pagoAlq_id;
    private $alquiler_id;
    private $pagoAlq_fecha;
    private $pagoAlq_monto;
    private $pagoAlq_metodo;
    private $pagoAlq_descripcion;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getPagoAlq_id() : ?int{
        return $this->pagoAlq_id;
    }
    public function setPagoAlq_id(int $pagoAlq_id) {
        $this->pagoAlq_id = $pagoAlq_id;
    }
    public function getAlquiler_id() : ?int{
        return $this->alquiler_id;
    }
    public function setAlquiler_id(int $alquiler_id){
        $this->alquiler_id = $alquiler_id;
    }
    public function getPagoAlq_fecha(): ?DateTime {
        return $this->pagoAlq_fecha;
    }
    public function setPagoAlq_fecha(DateTime $pagoAlq_fecha) {
        $this->pagoAlq_fecha = $pagoAlq_fecha;
    }
    public function getPagoAlq_monto() : ?int{
        return $this->pagoAlq_monto;
    }
    public function setPagoAlq_monto(int $pagoAlq_monto){
        $this->pagoAlq_monto = $pagoAlq_monto;
    }
    public function getPagoAlq_metodo() : ?string{
        return $this->pagoAlq_metodo;
    }
    public function setPagoAlq_metodo(string $pagoAlq_metodo){
        $this->pagoAlq_metodo = $pagoAlq_metodo;
    }
    public function getPagoAlq_descripcion() : ?string{
        return $this->pagoAlq_descripcion;
    }
    public function setPagoAlq_descripcion(string $pagoAlq_descripcion){
        $this->pagoAlq_descripcion = $pagoAlq_descripcion;
    }


    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM pagos_alquiler");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function ListarAlquiler(){
        try{
            $consulta = $this->pdo->prepare("SELECT alquiler_id AS alquiler FROM pagos_alquiler;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Ingreso $ingreso){
        try{
            $consulta = "INSERT INTO pagos_alquiler 
                            (alquiler_id, 
                            pagoAlq_fecha, 
                            pagoAlq_monto, 
                            pagoAlq_metodo, 
                            pagoAlq_descripcion) 
                        VALUES (?, ?, ?, ?, ?)";
            $this->pdo->prepare($consulta)->
                    execute(array(
                        $ingreso->getAlquiler_id(), 
                        $ingreso->getPagoAlq_fecha()->format('Y-m-d'), 
                        $ingreso->getPagoAlq_monto(), 
                        $ingreso->getPagoAlq_metodo(), 
                        $ingreso->getPagoAlq_descripcion()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }



    public function Obtener($pagoAlq_id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM pagos_alquiler WHERE pagoAlq_id = ?");
            $consulta->execute(array($pagoAlq_id));
            $resultado = $consulta->fetch(PDO::FETCH_OBJ);
            $ingreso = new Ingreso();
            $ingreso->setPagoAlq_id($resultado->pagoAlq_id);
            $ingreso->setAlquiler_id($resultado->alquiler_id);
            $ingreso->setPagoAlq_fecha(new DateTime($resultado->pagoAlq_fecha));
            $ingreso->setPagoAlq_monto($resultado->pagoAlq_monto);
            $ingreso->setPagoAlq_metodo($resultado->pagoAlq_metodo);
            $ingreso->setPagoAlq_descripcion($resultado->pagoAlq_descripcion);
            return $ingreso;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($pagoAlq_id){
        try{
            $consulta = $this->pdo->prepare("DELETE FROM pagos_alquiler WHERE pagoAlq_id = ?");
            $consulta->execute(array($pagoAlq_id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


}
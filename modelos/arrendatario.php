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
        
        $this->pdo = BasedeDatos::Conectar();//Conectar a la base de datos 
       
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


    public function Obtener($arrendatario_cedula){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM arrendatarios WHERE arrendatario_cedula = ?");
            $consulta->execute(array($arrendatario_cedula));
            $r = $consulta->fetch(PDO::FETCH_OBJ);

            $arrendatario = new Arrendatario();
            $arrendatario->setArrendatario_cedula($r->arrendatario_cedula);
            $arrendatario->setArrendatario_nombre($r->arrendatario_nombre);
            $arrendatario->setArrendatario_apellido($r->arrendatario_apellido);
            $arrendatario->setArrendatario_telefono($r->arrendatario_telefono);
            $arrendatario->setArrendatario_ocupacion($r->arrendatario_ocupacion);
            $arrendatario->setArrendatario_contacto_emergencia($r->arrendatario_contacto_emergencia);
            return $arrendatario;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Arrendatario $arrendatario){
        try{
            $consulta = "INSERT INTO arrendatarios(
                            arrendatario_cedula, 
                            arrendatario_nombre, 
                            arrendatario_apellido, 
                            arrendatario_telefono, 
                            arrendatario_ocupacion, 
                            arrendatario_contacto_emergencia) 
                            VALUES (?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)
                            ->execute(
                                array(
                                    $arrendatario->getArrendatario_cedula(),
                                    $arrendatario->getArrendatario_nombre(),
                                    $arrendatario->getArrendatario_apellido(),
                                    $arrendatario->getArrendatario_telefono(),
                                    $arrendatario->getArrendatario_ocupacion(),
                                    $arrendatario->getArrendatario_contacto_emergencia()
                                )
                            );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Arrendatario $arrendatario){
        try{
            $consulta = "UPDATE arrendatarios SET 
                            arrendatario_nombre = ?,
                            arrendatario_apellido = ?,
                            arrendatario_telefono = ?,
                            arrendatario_ocupacion = ?,
                            arrendatario_contacto_emergencia = ?
                            WHERE arrendatario_cedula = ?";
            $this->pdo->prepare($consulta)
                            ->execute(
                                array(
                                    $arrendatario->getArrendatario_nombre(),
                                    $arrendatario->getArrendatario_apellido(),
                                    $arrendatario->getArrendatario_telefono(),
                                    $arrendatario->getArrendatario_ocupacion(),
                                    $arrendatario->getArrendatario_contacto_emergencia(),
                                    $arrendatario->getArrendatario_cedula()
                                )
                            );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($arrendatario_cedula){
        try{
            $consulta = "DELETE FROM arrendatarios WHERE arrendatario_cedula = ?";
            $this->pdo->prepare($consulta)
                            ->execute(array($arrendatario_cedula));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }




}
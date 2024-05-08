<?php 

class Propiedad{
    private $pdo;//Variable para la conexion a la base de datos
    
    //Columnas de la tabla propiedad
    private $propiedad_direccion;
    private $propiedad_barrio;
    private $propiedad_numero_habitaciones;
    private $propiedad_descripcion; 
    
    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();//Se obtiene la conexion a la base de datos
    }

    //getters y setters de las columnas de la tabla propiedad
    public function getPropiedad_direccion() : ?string{
        return $this->propiedad_direccion;
    }
    public function setPropiedad_direccion(string $propiedad_direccion) {
        $this->propiedad_direccion = $propiedad_direccion;
    }
    public function getPropiedad_barrio() : ?string{
        return $this->propiedad_barrio;
    }
    public function setPropiedad_barrio(string $propiedad_barrio){
        $this->propiedad_barrio = $propiedad_barrio;
    }
    public function getPropiedad_numero_habitaciones() : ?int{
        return $this->propiedad_numero_habitaciones;
    }
    public function setPropiedad_numero_habitaciones(int $propiedad_numero_habitaciones){
        $this->propiedad_numero_habitaciones = $propiedad_numero_habitaciones;
    }
    public function getPropiedad_descripcion() : ?string{
        return $this->propiedad_descripcion;
    }
    public function setPropiedad_descripcion(string $propiedad_descripcion){
        $this->propiedad_descripcion = $propiedad_descripcion;
    }

    //Metodos para mostrar en tablas
    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM propiedades;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function Buscar(Propiedad $term){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM propiedades WHERE propiedad_direccion LIKE :term;");
            $consulta->execute(array(':term' => '%' . $term->getPropiedad_direccion() . '%'));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Metodos para insertar en la base de datos
    public function Insertar(Propiedad $propiedad){
        try{
            $consulta = "INSERT INTO propiedades(propiedad_direccion, propiedad_barrio, propiedad_numero_habitaciones, propiedad_descripcion) VALUES (?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $propiedad->getPropiedad_direccion(), 
                            $propiedad->getPropiedad_barrio(), 
                            $propiedad->getPropiedad_numero_habitaciones(), 
                            $propiedad->getPropiedad_descripcion()
                        ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function Obtener($propiedad_direccion){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM propiedades WHERE propiedad_direccion = ?;");
            $consulta->execute(array($propiedad_direccion));
            $resultado = $consulta->fetch(PDO::FETCH_OBJ);
            $propiedad = new Propiedad();
            $propiedad->setPropiedad_direccion($resultado->propiedad_direccion);
            $propiedad->setPropiedad_barrio($resultado->propiedad_barrio);
            $propiedad->setPropiedad_numero_habitaciones($resultado->propiedad_numero_habitaciones);
            $propiedad->setPropiedad_descripcion($resultado->propiedad_descripcion);
            
            return $propiedad;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function Actualizar(Propiedad $propiedad){
        try{
            $pk_propiedad_direccion = $propiedad->getPropiedad_direccion();
            $consulta = "UPDATE propiedades SET  propiedad_barrio = ?, propiedad_numero_habitaciones = ?, propiedad_descripcion = ? WHERE (propiedad_direccion = ?);";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(                    
                            $propiedad->getPropiedad_barrio(), 
                            $propiedad->getPropiedad_numero_habitaciones(), 
                            $propiedad->getPropiedad_descripcion(),
                            $propiedad->getPropiedad_direccion(),
                        ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function Eliminar($propiedad_direccion){
        try{
            $consulta = $this->pdo->prepare("DELETE FROM propiedades WHERE propiedad_direccion = ?;");
            $consulta->execute(array($propiedad_direccion));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function BuscarPropiedad($propiedad_direccion){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM propiedades WHERE propiedad_direccion = ?;");
            $consulta->execute(array($propiedad_direccion));
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    //Metodos para presentar en cards
    public function MostrarNumeroHabitaciones(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(propiedad_numero_habitaciones) AS numero_habitaciones FROM propiedades;"); //Se prepara la consulta SQL para obtener el numero de habitaciones de la propiedad 
            $consulta->execute();//Se ejecuta la consulta SQL
            return $consulta->fetch(PDO::FETCH_OBJ);//Se retorna el resultado de la consulta SQL fetch() para obtener el resultado de la consulta y se especifica que se desea obtener un objeto
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function MostrarDireccion(){
        try{
            $consulta = $this->pdo->prepare("SELECT propiedad_direccion  FROM propiedades;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function FiltrarDireccion($direccion){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM propiedades WHERE propiedad_direccion = ?;");
            $consulta->execute(array($direccion));
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
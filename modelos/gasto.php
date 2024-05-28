<?php 

class Gasto{

    private $pdo;//Variable para la conexion a la base de datos

    //Columnas de la tabla gasto
    private $gasto_id;
    private $gasto_categoria;
    private $gasto_monto;
    private $gasto_fecha;
    private $gasto_nit_factura;
    private $gasto_descripcion;
    private $propiedad_direccion;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();//Se obtiene la conexion a la base de datos
    }

    //getters y setters de las columnas de la tabla gasto
    public function getGasto_id() : ?int{
        return $this->gasto_id;
    }
    public function setGasto_id(int $gasto_id) {
        $this->gasto_id = $gasto_id;
    }
    public function getGasto_categoria() : ?string{
        return $this->gasto_categoria;
    }
    public function setGasto_categoria(string $gasto_categoria){
        $this->gasto_categoria = $gasto_categoria;
    }
    public function getGasto_monto() : ?int{
        return $this->gasto_monto;
    }
    public function setGasto_monto(int $gasto_monto){
        $this->gasto_monto = $gasto_monto;
    }
    public function getGasto_fecha(): ?DateTime {
        return $this->gasto_fecha;
    }
    
    public function setGasto_fecha(DateTime $gasto_fecha) {
        $this->gasto_fecha = $gasto_fecha;
    }
    
    public function getGasto_nit_factura() : ?string{
        return $this->gasto_nit_factura;
    }
    public function setGasto_nit_factura(?string $gasto_nit_factura) {
        $this->gasto_nit_factura = $gasto_nit_factura;
    }
    
    public function getGasto_descripcion() : ?string{
        return $this->gasto_descripcion;
    }
    public function setGasto_descripcion(string $gasto_descripcion){
        $this->gasto_descripcion = $gasto_descripcion;
    }
    public function getPropiedad_direccion() : ?string{
        return $this->propiedad_direccion;
    }
    public function setPropiedad_direccion(string $propiedad_direccion){
        $this->propiedad_direccion = $propiedad_direccion;
    }
    
    //Método para listar todos los gastos
    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM gastos_propiedad;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function ListarDireccion(){
        try{
            $consulta = $this->pdo->prepare("SELECT propiedad_direccion AS direccion FROM propiedades;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Método para insertar un nuevo gasto
    public function Insertar(Gasto $gasto){
        try{
            $consulta = "INSERT INTO gastos_propiedad 
                            (gasto_categoria, 
                            gasto_monto, gasto_fecha, 
                            gasto_nit_factura, 
                            gasto_descripcion, 
                            propiedad_direccion) 
                        VALUES (?, ?, ?, ?, ?, ?);";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $gasto->getGasto_categoria(), 
                            $gasto->getGasto_monto(), 
                            $gasto->getGasto_fecha()->format('Y-m-d'), 
                            $gasto->getGasto_nit_factura(), 
                            $gasto->getGasto_descripcion(), 
                            $gasto->getPropiedad_direccion()
                        ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Método para actualizar un gasto
    public function Actualizar(Gasto $gasto){
        try{
            $consulta = "UPDATE gastos_propiedad SET 
                                gasto_categoria = ?, 
                                gasto_monto = ?, 
                                gasto_fecha = ?, 
                                gasto_nit_factura = ?, 
                                gasto_descripcion = ?, 
                                propiedad_direccion = ? 
                            WHERE gasto_id = ?;";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $gasto->getGasto_categoria(), 
                            $gasto->getGasto_monto(), 
                            $gasto->getGasto_fecha()->format('Y-m-d'), 
                            $gasto->getGasto_nit_factura(), 
                            $gasto->getGasto_descripcion(), 
                            $gasto->getPropiedad_direccion(), 
                            $gasto->getGasto_id()
                        ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function Eliminar($gasto_id){
        try{
            $consulta = $this->pdo->prepare("DELETE FROM gastos_propiedad WHERE gasto_id = ?;");
            $consulta->execute(array($gasto_id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($gasto_id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM gastos_propiedad WHERE gasto_id = ?;");
            $consulta->execute(array($gasto_id));
            $resultado = $consulta->fetch(PDO::FETCH_OBJ);
            $gasto = new Gasto();
            $gasto->setGasto_id($resultado->gasto_id);
            $gasto->setGasto_categoria($resultado->gasto_categoria);
            $gasto->setGasto_monto($resultado->gasto_monto);
            $gasto->setGasto_fecha(new DateTime($resultado->gasto_fecha));
            $gasto->setGasto_nit_factura($resultado->gasto_nit_factura);
            $gasto->setGasto_descripcion($resultado->gasto_descripcion);
            $gasto->setPropiedad_direccion($resultado->propiedad_direccion);
            return $gasto;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarGastosMes(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM vista_gastos_mes_actual;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function MostrarTotalGastosMes(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(monto) AS monto FROM vista_gastos_mes_actual;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function FiltrarGastosPorMes($mes){
        try{
            $consulta = $this->pdo->prepare("SELECT 
                        gasto_categoria as categoria, 
                        gasto_monto as monto, 
                        gasto_fecha as fecha, 
                        dayname(gasto_fecha) as dia
                        FROM gastos_propiedad
                        WHERE month(gasto_fecha) = ?
                        AND YEAR(gasto_fecha) = YEAR(CURRENT_DATE());");
            $consulta->execute(array($mes));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}
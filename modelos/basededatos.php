<?php 
class BasedeDatos{

    //Datos de la base de datos
    const SERVIDOR = "127.0.0.1:3307";
    const USUARIO = "root";
    const PASSWORD = "";
    const BASEDEDATOS = "casa_patoja";


    //Metodo para conectar a la base de datos public y static para poder ser llamado desde cualquier parte del proyecto sin necesidad de instanciar la clase BasedeDatos
    public static function Conectar(){
        try{
            $conexion = new PDO("mysql:host=".self::SERVIDOR.";dbname=".self::BASEDEDATOS.";charset=utf8",self::USUARIO,self::PASSWORD);
            //Se crea la conexion a la base de datos con PDO y se le asigna a la variable $conexion donde self:: es para acceder a las constantes de la clase
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //Se le asigna a la conexion el modo de error para que muestre los errores en caso de que existan
            return $conexion;
            //Se retorna la conexion para poder ser utilizada en cualquier parte del proyecto

        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }

    }


}
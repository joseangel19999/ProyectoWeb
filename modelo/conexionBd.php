<?php
class Conexion {
    //conecion estatico
    private static $instancia = null;
    //funcion que conecta la base de datos
    private function __construct(){
        try{
            self::$instancia = new PDO("mysql:host=localhost;dbname=bdmototaxi","Adminjose","adminjose");
        }catch(PDOException $e){
            echo "Error al conectar".$e->getMessage();
        }
    }
    //metodo  que arroja la instancia de la conexion
    public static function getInstancia(){
        if(self::$instancia==null){
            new self();
        }
        return self::$instancia;
     }

     //metodo que cierra la conexion
     public static function cerrar(){
        self::$instancia = null;
     }
}

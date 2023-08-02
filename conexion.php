<?php

class conexion{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'eventos';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';

    }

    public function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES => false,];

            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;

        }catch(PDOException $e){
            echo ('error de conexion: '.$e->getMessage());

        }
    }

// class conexion{

//     private $servidor = "localhost";
//     private $usuario = "root";
//     private $contrasenia = "";
//     public $conexion;

//     public function __construct(){
//         try{
//             $this->conexion = new PDO("mysql:host=$this->servidor;dbname=eventos", $this->usuario, $this->contrasenia);
//             $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         }catch(PDOException $e){
//             echo ('error de conexion: '.$e->getMessage());

//         }
    

//     }

 
       
    // public function consultar($sql){

    //     $sentencia = $this->conexion->prepare($sql);
    //     $sentencia->execute();
    //     return $sentencia->fetchAll();
    // }

    public function consultar2($sql){

        $objconexion = new conexion();
        $sentencia = $objconexion->connect()->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ejecutar($sql){//insertar/borrar/actualizar

        $objconexion = new conexion();
        $sentencia = $objconexion->connect()->prepare($sql);
    }
}


?>
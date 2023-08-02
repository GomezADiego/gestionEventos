<?php
include_once 'conexion.php';
session_start();

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('location: index.php');
        break;

        case 2:
            header('location: index.php');
        break;

        default:

    }
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new conexion();
    $query = $db->connect()->prepare('SELECT * FROM usuarios WHERE username = :username AND password = :password');
    $query->execute(['username' => $username, 'password' => $password]);

    $row = $query->fetch(PDO::FETCH_NUM);
    if($row == true){
        $rol = $row[3];
        $_SESSION['rol'] = $rol;

        switch($_SESSION['rol']){
            case 1:
                header('location: index.php');
            break;
    
            case 2:
                header('location: index.php');
            break;
    
            default:
    
        }
    }else{
        $mensaje = "el usuario o contraseña son incorrectas";
    }
}




?>
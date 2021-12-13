<?php

if (!isset($_POST['email_user'])) {
    header("location: ../view/login.php");
}else{

    include '../services/config.php';
    include '../services/conexion.php';

    $nombre = $_POST['nombre_user'];
    $apellido = $_POST['apellido_user'];
    $email = $_POST['email_user'];
    $password = $_POST['password_user'];
    $rol = $_POST['rol'];

    try {
        $generar_user = $pdo->prepare("INSERT INTO tbl_users (nom_user, apellido_user, email_user, password_user, rol_user)
        VALUES (?, ?, ?, ?, ?)");

        //INSERT INTO `bd_bar`.`tbl_users` (`nom_user`, `apellido_user`, `email_user`, `password_user`, `rol_user`) VALUES ('Admin7', 'pallei', 'deed', 'deed', 'Admin');
        
        $generar_user->bindParam(1, $nombre);
        $generar_user->bindParam(2, $apellido);
        $generar_user->bindParam(3, $email);
        $generar_user->bindParam(4, $password);
        $generar_user->bindParam(5, $rol);   
        
        $generar_user->execute();
        header("location: ../view/crud.php");

    } catch (\Throwable $th) {
        throw $th;
    }
}
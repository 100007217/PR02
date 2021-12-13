<?php

include '../services/config.php';
include '../services/conexion.php';

    $id = $_POST['id_user'];
    $nombre = $_POST['nombre_user'];
    $apellido = $_POST['apellido_user'];
    $email = $_POST['email_user'];
    $password = $_POST['password_user'];
    $rol = $_POST['rol'];

    try {
        $modificar_user = $pdo->prepare("UPDATE tbl_users
        SET  nom_user = ?,
        apellido_user = ?,
        email_user = ?,
        password_user = ?,
        rol_user = ?
        where id_user = ?");

        //UPDATE `bd_bar`.`tbl_users` SET `apellido_user` = 'cam1', `email_user` = 'cam@gmail.com' WHERE (`id_user` = '38');
        
        $modificar_user->bindParam(1, $nombre);
        $modificar_user->bindParam(2, $apellido);
        $modificar_user->bindParam(3, $email);
        $modificar_user->bindParam(4, $password);
        $modificar_user->bindParam(5, $rol);
        $modificar_user->bindParam(6, $id);  
        
        $modificar_user->execute();

        header("location: ../view/crud.php");
    } catch (\Throwable $th) {
        //throw $th;
    }
?>
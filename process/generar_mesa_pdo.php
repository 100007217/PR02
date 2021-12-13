<?php

if (!isset($_POST['numero_sillas'])) {
    header("location: ../view/login.php");
}else{

    include '../services/config.php';
    include '../services/conexion.php';
    $num_sillas = $_POST['numero_sillas'];
    if ($num_sillas == '') {
        $num_sillas = 1;
    }
    
    $id_sala=$_POST['id_sala'];

    try {
        $generar_mesa = $pdo->prepare("INSERT INTO tbl_mesa (num_silla_dispo, reservada, id_ubi, incidencia, num_sillas_actuales)
        VALUES (?, 0, ?, 0, ?)");

        //INSERT INTO `bd_bar`.`tbl_users` (`nom_user`, `apellido_user`, `email_user`, `password_user`, `rol_user`) VALUES ('Admin7', 'pallei', 'deed', 'deed', 'Admin');
        
        $generar_mesa->bindParam(1, $num_sillas);
        $generar_mesa->bindParam(2, $id_sala);
        $generar_mesa->bindParam(3, $num_sillas);
        
        $generar_mesa->execute();
        header("location: ../view/crud.php");

    } catch (\Throwable $th) {
        throw $th;
    }
}
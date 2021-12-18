<?php

include '../services/config.php';
include '../services/conexion.php';

    $id = $_POST['id_mesa'];
    $numero_sillas = $_POST['numero_sillas'];
    $id_sala = $_POST['id_sala'];
    echo $id;
    echo $numero_sillas;
    echo $id_sala;

    try {
        $modificar_mesa = $pdo->prepare("UPDATE tbl_mesa
        SET  num_silla_dispo = ?,
        num_sillas_actuales = ?,
        id_ubi = ?
        where id_mesa = ?");

        //UPDATE `bd_bar`.`tbl_users` SET `apellido_user` = 'cam1', `email_user` = 'cam@gmail.com' WHERE (`id_user` = '38');
        
        $modificar_mesa->bindParam(1, $numero_sillas);
        $modificar_mesa->bindParam(2, $numero_sillas);
        $modificar_mesa->bindParam(3, $id_sala);
        $modificar_mesa->bindParam(4, $id);

        
        $modificar_mesa->execute();

       header("location: ../view/crud.php");
    } catch (\Throwable $th) {
        //throw $th;
    }
?>
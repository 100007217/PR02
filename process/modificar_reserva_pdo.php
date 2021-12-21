<?php

include '../services/config.php';
include '../services/conexion.php';

    $id = $_POST['id_reserva'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    $name_cliente = $_POST['name_cliente'];
    $num_personas = $_POST['num_personas'];
    $id_mesa = $_POST['id_mesa'];

    try {
        $modificar_reserva = $pdo->prepare("UPDATE tbl_reserva
        SET  fecha_inicio = ?,
        fecha_final = ?,
        nombre_cliente = ?,
        num_personas = ?,
        id_mesa = ?
        where id_reserva = ?");

        //UPDATE `bd_bar`.`tbl_reservas` SET `apellido_reserva` = 'cam1', `email_reserva` = 'cam@gmail.com' WHERE (`id_reserva` = '38');
        
        $modificar_reserva->bindParam(1, $fecha_inicio);
        $modificar_reserva->bindParam(2, $fecha_final);
        $modificar_reserva->bindParam(3, $name_cliente);
        $modificar_reserva->bindParam(4, $num_personas);
        $modificar_reserva->bindParam(5, $id_mesa);
        $modificar_reserva->bindParam(6, $id);  
        
        $modificar_reserva->execute();

        header("location: filtro.php");
    } catch (\Throwable $th) {
        //throw $th;
    }
?>
<?php

include '../services/config.php';
include '../services/conexion.php';

$id = $_GET['id'];

try {
        $eliminar_user = $pdo->prepare("DELETE FROM tbl_users
        WHERE id_user = ?");

        //DELETE FROM `bd_bar`.`tbl_users` WHERE (`id_user` = '38');
        
        $eliminar_user->bindParam(1, $id);  
        
        $eliminar_user->execute();

        header("location: ../view/crud.php");

} catch (\Throwable $th) {
    throw $th;
}
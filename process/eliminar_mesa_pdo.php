<?php

if (!isset($_GET['id'])) {
    header("location: ../view/login.php");
}else {
    include '../services/config.php';
    include '../services/conexion.php';
    
    $id = $_GET['id'];
    
    try {
            $eliminar_mesa = $pdo->prepare("DELETE FROM tbl_mesa
            WHERE id_mesa = ?");
    
            //DELETE FROM `bd_bar`.`tbl_users` WHERE (`id_user` = '38');
            
            $eliminar_mesa->bindParam(1, $id);  
            
            $eliminar_mesa->execute();
    
            header("location: ../view/crud.php");
    
    } catch (\Throwable $th) {
        throw $th;
    }
}


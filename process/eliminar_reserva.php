<?php 
include '../services/config.php';
include '../services/conexion.php';

$id = $_GET['id'];

try {
    $eliminar_reserva = $pdo->prepare("DELETE FROM tbl_reserva WHERE (id_reserva = ?);");
    
    $eliminar_reserva->bindParam(1, $id); 
    
    $eliminar_reserva->execute();
    header("location: filtro.php");
    
} catch (\Throwable $th) {
    throw $th;
}
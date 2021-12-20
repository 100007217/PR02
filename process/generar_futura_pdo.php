<?php
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$num_personas=$_POST['npersonas'];
$nombre_cliente=$_POST['nombre_cliente'];
$id_mesa=$_POST['id_mesa'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_final=$_POST['fecha_final'];

try {

    //INSERT INTO tbl_reserva (fecha_inicio,nombre_cliente,num_personas,id_mesa)
    //VALUES ( '2021-11-10 15:00:00', 'Javi', '1', '2');
    
    
    //INSERTAR RESERVA
    $inicio_reserva = $pdo->prepare("INSERT INTO tbl_reserva (fecha_inicio,fecha_final,nombre_cliente,num_personas,id_mesa)
    VALUES ( ?, ?, ?, ?, ?)");
    
    $inicio_reserva->bindParam(1, $fecha_inicio);
    $inicio_reserva->bindParam(2, $fecha_final);
    $inicio_reserva->bindParam(3, $nombre_cliente);
    $inicio_reserva->bindParam(4, $num_personas);   
    $inicio_reserva->bindParam(5, $id_mesa);    
    
    $inicio_reserva->execute();

    header('Location: ../view/vista.php');

}catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}
?>
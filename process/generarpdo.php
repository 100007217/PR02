<?php
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$num_personas=$_POST['num_personas_reserva'];
$nombre_cliente=$_POST['nombre_cliente'];
$id_mesa=$_POST['id_mesa'];
$fecha_inicio=date("Y-m-d H:i:s", time());

try {

    $mesa1 = $pdo->prepare("UPDATE tbl_mesa
    SET tbl_mesa.reservada = 1
    where id_mesa=?");
   
    $mesa1->bindParam(1, $id_mesa);
   
    $mesa1->execute();

    //INSERT INTO tbl_reserva (fecha_inicio,nombre_cliente,num_personas,id_mesa)
    //VALUES ( '2021-11-10 15:00:00', 'Javi', '1', '2');
    
    
    //INSERTAR RESERVA
    $inicio_reserva = $pdo->prepare("INSERT INTO tbl_reserva (fecha_inicio,nombre_cliente,num_personas,id_mesa)
    VALUES ( ?, ?, ?, ?)");
    
    $inicio_reserva->bindParam(1, $fecha_inicio);
    $inicio_reserva->bindParam(2, $nombre_cliente);
    $inicio_reserva->bindParam(3, $num_personas);   
    $inicio_reserva->bindParam(4, $id_mesa);    
    
    $inicio_reserva->execute();


    //UPDATE TABLA MESA RESERVADA=1
    $mesa1 = $pdo->prepare("UPDATE tbl_mesa
    SET reservada = 1
    where id_mesa = ?");
    
    $mesa1->bindParam(1, $id_mesa);   
    
    $mesa1->execute();

    header('Location: ../view/vista.php');


}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}


?>
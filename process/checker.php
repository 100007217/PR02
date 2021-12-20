<?php 

//include '../services/config.php';
include '../services/conexion.php';

$fecha_actual=date("Y-m-d H:i:s", time());

$listar_reservas = $pdo->prepare("select *,tbl_mesa.reservada from tbl_reserva 
inner join tbl_mesa on tbl_reserva.id_mesa=tbl_mesa.id_mesa");
    
$listar_reservas->execute();
$listareservas=$listar_reservas->fetchAll(PDO::FETCH_ASSOC);
foreach ($listareservas as $reserva => $value) {
$mesa0 = $pdo->prepare("UPDATE tbl_mesa
        SET tbl_mesa.reservada = 0
        where id_mesa=?");
   
    $mesa0->bindParam(1, $value['id_mesa']);
   
    $mesa0->execute();
}

foreach ($listareservas as $reserva => $value) {
    /*
    echo $value['id_mesa']." ";
    echo $value['fecha_inicio']." ";
    echo $value['fecha_final'];
    */
    

    if ($fecha_actual>=$value['fecha_inicio'] && ($fecha_actual<=$value['fecha_final'] || $value['fecha_final']=="")) {
        //echo "Aqui hay reserva, en la mesa ".$value['id_mesa'];
        
        $mesa1 = $pdo->prepare("UPDATE tbl_mesa
        SET tbl_mesa.reservada = 1
        where id_mesa=?");
   
        $mesa1->bindParam(1, $value['id_mesa']);
   
        $mesa1->execute();
    }
    //echo "<br>";
}
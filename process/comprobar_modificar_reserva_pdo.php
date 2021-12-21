<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modificar</title>
</head>
<?php

include '../services/config.php';
include '../services/conexion.php';

    $id = $_POST['id_reserva'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    $name_cliente = $_POST['name_cliente'];
    $num_personas = $_POST['num_personas'];
    $id_mesa = $_POST['id_mesa'];

    $sentencia = $pdo->prepare("SELECT * from tbl_reserva where id_mesa=?");
    $sentencia->bindParam(1, $id_mesa);
    $sentencia->execute();

    $listaReservasMesa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    foreach ($listaReservasMesa as $key => $value) {
        if (($fecha_inicio>=$value['fecha_inicio'] && $fecha_inicio<=$value['fecha_final'])||($fecha_final>=$value['fecha_inicio'] && $fecha_final<=$value['fecha_final'])) {
            for ($i=0; $i < 20; $i++) { 
                echo "<br>";
            }
            echo "<center>";
            echo "La mesa está en un horario reservado";
            echo "<a type='button' class='btn btn-warning'  href='modificar_reserva.php?id={$id}'>Modificar reserva</a>";
            $reserva=0;
            break;
        }else {
            $reserva=1;
        }
    }
    if ($reserva==1) {
        ?>
            <form action="modificar_reserva_pdo.php" method="post" class="caja" onsubmit="return validar()">
                <h2>Modificar reserva</h2>
                <div class=alert id='mensaje'></div>
                <center>
                <p>Fecha inicio reserva</p>
                <input type="text" name="fecha_inicio" value="<?php echo $fecha_inicio?>">
                <br>
                <p>Fecha final reserva</p>
                <input type="text" name="fecha_final" value="<?php echo $fecha_final?>">
                <br>
                <p>Nombre cliente reserva</p>
                <input type="text" name="name_cliente" value="<?php echo $name_cliente?>">
                <br>
                <p>Numero de personas</p>
                <input type="number" name="num_personas" value="<?php echo $num_personas?>">
                <br>
                <p>Numero de mesa</p>
                <input type="number" name="id_mesa" value="<?php echo $id_mesa?>">
                <br>
                
                <br>
                <input type="hidden" name="id_reserva" value="<?php echo $id?>">
                <br>
                <input type="submit" value="Confirmar modificación de reserva" class="btn btn-dark">
                </center>
            </form>
            <?php
    }
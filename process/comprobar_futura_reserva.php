<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="../css/vista.css">
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Generer reserva futura</title>
</head>
<body>
    <?php

include '../services/config.php';
include '../services/conexion.php';

        $hora_final= $_POST['hora_inicio_reserva']+1;
        $fecha_inicio = $_POST['fecha_inicio_reserva']." ".$_POST['hora_inicio_reserva'].":00:00";
        $npersonas = $_POST['num_personas_reserva'];
        $fecha_final = $_POST['fecha_inicio_reserva']." ".$hora_final.":00:00";

        
        //SELECT distinct id_mesa from tbl_reserva where tbl_reserva.fecha_final > '2021-11-09 2:00:00' and tbl_reserva.fecha_inicio < '2021-11-09 17:00:00' order by id_mesa

        $sentencia = $pdo->prepare("SELECT
		tbl_reserva.id_mesa,tbl_mesa.num_silla_dispo
        from tbl_reserva
        inner join tbl_mesa on tbl_reserva.id_mesa=tbl_mesa.id_mesa
        where ? between fecha_inicio and fecha_final
        or ? between fecha_inicio and fecha_final
        or fecha_inicio between ? and ?
        or num_silla_dispo < ?
        group by id_mesa
        order by id_mesa");
        $sentencia->bindParam(1, $fecha_inicio);
        $sentencia->bindParam(2, $fecha_final);
        $sentencia->bindParam(3, $fecha_inicio);
        $sentencia->bindParam(4, $fecha_final);
        $sentencia->bindParam(5, $npersonas);
        $sentencia->execute();
        $listaMesasunavailable=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        //array total mesas
        $sentencia = $pdo->prepare("select id_mesa from tbl_mesa");
        $sentencia->execute();
        $totalmesaspdo=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($totalmesaspdo as $key => $value) {
            $totalmesas[] = $value['id_mesa'];
        }
        $mesasno = array();
        foreach ($listaMesasunavailable as $key => $value) {
            $mesasno[] = $value['id_mesa'];
            //echo($value['id_mesa'])." mesa no idposnible en la hora indicada";
        }


        $arrayMesas = array_diff($totalmesas, $mesasno);
        $listaMesas = implode(',', $arrayMesas);
        
        $sentencia = $pdo->prepare("select *, tbl_ubicacion.tipo_ubi
         from tbl_mesa 
         left outer join tbl_ubicacion on tbl_ubicacion.id_ubi=tbl_mesa.id_ubi
         where id_mesa in ($listaMesas)");
        //$sentencia->bindParam(1, $listaMesas);
        $sentencia->execute();
        $mesasposibles=$sentencia->fetchAll(PDO::FETCH_ASSOC);


    ?>
    <div class='flex-container'>
    <?php
    foreach ($mesasposibles as $mesa) {
        
    
        echo "<table class='column'>";
        
        echo "<tr>";
            echo "<td><h3>MESA {$mesa['id_mesa']}</h3></td>";
        echo "</tr>";
        
        echo "<tr>";
            echo "<td><img src='../img/{$mesa['img_mesa']}' width='150px'></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><p>Nº Sillas {$mesa['num_silla_dispo']}</p></td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td><p>{$mesa['tipo_ubi']}</p></td>";
        echo "</tr>";
        if ($mesa['incidencia']==1) {
            echo "<tr>";
                echo "<td><p>Incidencia actual: {$mesa['desc_incidencia']}</p></td>";
            echo "</tr>";
        }
        
        echo "<tr>";
            echo "<td><a type='button' class='btn btn-success' href='generar_futura_form.php?id={$mesa['id_mesa']}&npersonas=$npersonas&fecha_inicio=$fecha_inicio&fecha_final=$fecha_final'>Generar reserva</a></td>";
        echo "</tr>";
        
    }
    ?>
</body>
</html>
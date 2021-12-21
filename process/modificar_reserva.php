<?php
    if (isset($_GET['id'])) {
        include '../services/config.php';
    include '../services/conexion.php';

    $sentencia = $pdo->prepare("SELECT 
        *
        from tbl_reserva where id_reserva=?");
    $sentencia->bindParam(1, $_GET['id']);
    $sentencia->execute();
    $listaReservas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    }else{
        header("location: ../view/login.php");
    }


    ?>
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
<body>
<form action="comprobar_modificar_reserva_pdo.php" method="post" class="caja" onsubmit="return validar()">
        <h2>Modificar reserva</h2>
        <div class=alert id='mensaje'></div>
        <center>
        <p>Fecha inicio reserva</p>
        <input type="text" name="fecha_inicio" value="<?php echo $listaReservas[0]['fecha_inicio']?>">
        <br>
        <p>Fecha final reserva</p>
        <input type="text" name="fecha_final" value="<?php echo $listaReservas[0]['fecha_final']?>">
        <br>
        <p>Nombre cliente reserva</p>
        <input type="text" name="name_cliente" value="<?php echo $listaReservas[0]['nombre_cliente']?>">
        <br>
        <p>Numero de personas</p>
        <input type="number" name="num_personas" value="<?php echo $listaReservas[0]['num_personas']?>">
        <br>
        <p>Numero de mesa</p>
        <input type="number" name="id_mesa" value="<?php echo $listaReservas[0]['id_mesa']?>">
        <br>
        
        <br>
        <input type="hidden" name="id_reserva" value="<?php echo $_GET['id']?>">
        <br>
        <input type="submit" value="Modificar reserva" class="btn btn-dark">
        </center>
</form>
</body>
</html>
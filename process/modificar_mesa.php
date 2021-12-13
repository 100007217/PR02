<?php
    if (isset($_GET['id'])) {
    include '../services/config.php';
    include '../services/conexion.php';

    $sentencia = $pdo->prepare("SELECT 
        tbl_users.num_silla_dispo,
        tbl_users.reservada,
        tbl_users.id_ubi,
        tbl_users.incidencia,
        tbl_users.desc_incidencia,
        tbl_users.num_sillas_actuales
        from tbl_users where id_user=?");
    $sentencia->bindParam(1, $_GET['id']);
    $sentencia->execute();
    $listaUsers=$sentencia->fetchAll(PDO::FETCH_ASSOC);
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
<form action="modificar_mesa_pdo.php" method="post" class="caja" onsubmit="return validar()">
        <h2>Modificar mesa</h2>
        <div class=alert id='mensaje'></div>
        <center>
            <p>Numero sillas</p>
            <input type="number" name="numero_sillas" >
            <br>
            <p>Sala</p>
            <input type="number" name="id_sala" min='1' max='2'>
            <br>
            <br>
            <input type="hidden" name="id_mesa" value="<?php echo $_GET['id']?>">
            <br>
            <input type="submit" value="Modificar mesa" class="btn btn-dark">
        </center>
</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Generar incidencia</title>
</head>
<body>
<form action="incidenciapdo.php" method="post" class="caja">
        <h2>Incidencia</h2>
        <div class=alert id='mensaje'></div>
       
        <p>La mesa está operativa?</p>
        <input type="radio" name="incidencia" value="0" id="valida">
        <label for="valida">Si</label><br>
        <input type="radio" id="css" name="incidencia" value="1" id="invalida">
        <label for="invalida">No</label><br>


        <p>Numero de sillas disponibles ahora (Máx: <?php echo $_GET['nsillas'] ?>)</p>
        <input type="number" name="num_sillas" min="0" max="<?php echo $_GET['nsillas'] ?>">
        <br>
        <p>Introduce una breve descripcion de la incidencia</p>
        <input type="text" name="desc_incidencia">
        <br>
        <input type="hidden" name="id_mesa" value="<?php echo $_GET['id'] ?>">
        <input type="hidden" name="nsillas_tot" value="<?php echo $_GET['nsillas'] ?>">
        <br>
        <input type="submit" value="Generar incidencia" class="btn btn-dark">
</form>
</body>
</html>
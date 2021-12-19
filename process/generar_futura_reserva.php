<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Generer reserva futura</title>
</head>
<body>
<form action="comprobar_futura_reserva.php" method="post" class="caja" onsubmit="return validar()">
        <h2>Generar</h2>
        <div class=alert id='mensaje'>
        <p>Numero de personas en la reserva</p>
        <input type="number" name="num_personas_reserva" id='num_personas_reserva' min="1">
        <p>Fecha reserva</p>
        <input type="date" name="fecha_inicio_reserva" id='num_personas_reserva'>
        <br>
        <p>Hora inicio de  reserva</p>
        <input type="number" name="hora_inicio_reserva" id='num_personas_reserva' min=0 max=23>
        <br>
        <br>
        <input type="submit" value="Comprobar mesas" class="btn btn-dark">
</form>
</body>
</html>
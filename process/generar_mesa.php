<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Generar</title>
</head>
<body>
<form action="generar_mesa_pdo.php" method="post" class="caja" onsubmit="return validar()">
        <h2>Generar mesa</h2>
        <div class=alert id='mensaje'></div>
        <center>
            <p>Numero sillas</p>
            <input type="text" name="numero_sillas" >
            <br>
            <p>Sala</p>
            <input type="number" name="id_sala" min='1' max='2'>
            <br>
            <br>
            <input type="submit" value="Generar mesa" class="btn btn-dark">
        </center>
</form>
</body>
</html>
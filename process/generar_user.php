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
<form action="generar_user_pdo.php" method="post" class="caja" onsubmit="return validar()">
        <h2>Generar user</h2>
        <div class=alert id='mensaje'></div>
        <center>
            <p>Nombre user</p>
            <input type="text" name="nombre_user" >
            <br>
            <p>Apellido user</p>
            <input type="text" name="apellido_user" >
            <br>
            <p>Correo user</p>
            <input type="text" name="email_user" >
            <br>
            <p>Password user</p>
            <input type="password" name="password_user" >
            <br>
            <br>
            <label for="rol"><p>Rol del user</p></label><br>
            <input name="rol"list="roles" >
            <datalist id="roles">
                <option>Camerero</option>
                <option>Admin</option> 
            </datalist>
            <br>
            <br>
            <input type="submit" value="Generar usuario" class="btn btn-dark">
        </center>
</form>
</body>
</html>
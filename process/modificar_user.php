<?php
    if (isset($_GET['id'])) {
        include '../services/config.php';
    include '../services/conexion.php';

    $sentencia = $pdo->prepare("SELECT 
        tbl_users.nom_user,
        tbl_users.apellido_user,
        tbl_users.email_user,
        tbl_users.rol_user,
        tbl_users.password_user
        from tbl_users where id_user=?");
    $sentencia->bindParam(1, $_GET['id']);
    $sentencia->execute();
    $listaUsers=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    print_r($listaUsers);
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
<form action="modificar_user_pdo.php" method="post" class="caja" onsubmit="return validar()">
        <h2>Modificar user</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre user</p>
        <input type="text" name="nombre_user" value="<?php echo $listaUsers[0]['nom_user']?>">
        <br>
        <p>Apellido user</p>
        <input type="text" name="apellido_user" value="<?php echo $listaUsers[0]['apellido_user']?>">
        <br>
        <p>Correo user</p>
        <input type="text" name="email_user" value="<?php echo $listaUsers[0]['email_user']?>">
        <br>
        <p>Password user</p>
        <input type="password" name="password_user" value="<?php echo $listaUsers[0]['password_user']?>">
        <br>
        <br>
        <label for="rol"><p>Rol del user</p></label><br>
        <input name="rol"list="roles" value="<?php echo $listaUsers[0]['rol_user']?>">
        <datalist id="roles">
            <option>Camerero</option>
            <option>Admin</option> 
        </datalist>
        <br>
        <input type="hidden" name="id_user" value="<?php echo $_GET['id']?>">
        <br>
        <input type="submit" value="Modificar usuario" class="btn btn-dark">
</form>
</body>
</html>
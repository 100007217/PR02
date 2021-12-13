<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administración</title>
    <link rel="stylesheet" href="../css/crudcss.scss">
</head>
<body>
    

<?php
include '../services/config.php';
include '../services/conexion.php';

$sentencia = $pdo->prepare("SELECT 
    tbl_users.id_user,
    tbl_users.nom_user,
    tbl_users.apellido_user,
    tbl_users.email_user,
    tbl_users.rol_user
    from tbl_users");
$sentencia->execute();
$listaUsers=$sentencia->fetchAll(PDO::FETCH_ASSOC);

echo "<a href='../process/generar_user.php'>Generar user</a>";
?>

<div class="container">
	<div class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#">Nombre</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Apellido</a></div>
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Email</a></div>
            <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Rol</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Modificar</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Eliminar</a></div>
        </div>
        <div class="table-content">
<?php
        foreach ($listaUsers as $user) {
            echo "<div class='table-row'>";
                echo "<div class='table-data'>{$user['nom_user']}</div>";
                echo "<div class='table-data'>{$user['apellido_user']}</div>";
                echo "<div class='table-data'>{$user['email_user']}</div>";
                echo "<div class='table-data'>{$user['rol_user']}</div>";
                echo "<div class='table-data'><a type='button' href='../process/modificar_user.php?id={$user['id_user']}'>Modificar user</a></div>";
                echo "<div class='table-data'><a type='button' href='../process/eliminar_user_pdo.php?id={$user['id_user']}' onclick=\"return confirm('¿Estás seguro de eliminar al user?')\">Eliminar user</a></div>";
                
            echo "</div>";
        }
        echo "</div>";
    echo "</div>";
echo "</div>";

?>

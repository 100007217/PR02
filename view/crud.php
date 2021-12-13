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
    <center>
    <h1>PANEL DE ADMINISTRACIÓN</h1>

<?php
include '../services/config.php';
include '../services/conexion.php';

$sentenciausers = $pdo->prepare("SELECT 
    tbl_users.id_user,
    tbl_users.nom_user,
    tbl_users.apellido_user,
    tbl_users.email_user,
    tbl_users.rol_user
    from tbl_users");
$sentenciausers->execute();
$listaUsers=$sentenciausers->fetchAll(PDO::FETCH_ASSOC);

$sentenciamesas = $pdo->prepare("SELECT 
    tbl_mesa.id_mesa,
    tbl_mesa.num_sillas_actuales,
    tbl_mesa.num_silla_dispo,
    tbl_mesa.reservada,
    tbl_mesa.id_ubi,
    tbl_mesa.incidencia,
    tbl_mesa.desc_incidencia
    from tbl_mesa");
$sentenciamesas->execute();
$listaMesas=$sentenciamesas->fetchAll(PDO::FETCH_ASSOC);

echo "<a href='../process/logout.php'>Logout</a>";
?>

    
	<div class="table">
    <h2>USUARIOS</h2>
    <a href='../process/generar_user.php'>Generar user</a>
        <div class="table-header">
            <div class="header__item"><a class="filter__link" href="#">Nombre</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >Apellido</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >Email</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >Rol</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >Modificar</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >Eliminar</a></div>
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
?>

    <div class="table">
    <h2>MESAS</h2>
    <a href='../process/generar_mesa.php'>Generar mesa</a>
        <div class="table-header">
            <div class="header__item"><a class="filter__link" >ID MESA</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >NUM SILLAS DISPONIBLES</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >NUM SILLAS TOTALES</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >SALA</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >ESTADO RESERVA</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >INCIDENCIA ACTIVA</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >DESCRIPCION INCIDENCIA</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >Modificar</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" >Eliminar</a></div>
        </div>
        <div class="table-content">
            <?php
                foreach ($listaMesas as $mesa) {
                     echo "<div class='table-row'>";
                        echo "<div class='table-data'>{$mesa['id_mesa']}</div>";
                        echo "<div class='table-data'>{$mesa['num_sillas_actuales']}</div>";
                        echo "<div class='table-data'>{$mesa['num_silla_dispo']}</div>";
                        echo "<div class='table-data'>{$mesa['id_ubi']}</div>";
                        
                        if ($mesa['reservada']==1) {
                            echo "<div class='table-data'>&#9203;</div>";
                        }else {
                            echo "<div class='table-data'>&#127379;</div>";
                        }
                        
                        if ($mesa['incidencia']==1) {
                            echo "<div class='table-data'>&#9888;</div>";
                        }else{
                            echo "<div class='table-data'>&#9989</div>";
                        }
                        echo "<div class='table-data'>{$mesa['desc_incidencia']}</div>";
                        echo "<div class='table-data'><a type='button' href='../process/modificar_user.php?id={$mesa['id_mesa']}'>Modificar mesa</a></div>";
                        echo "<div class='table-data'><a type='button' href='../process/eliminar_user_pdo.php?id={$mesa['id_mesa']}' onclick=\"return confirm('¿Estás seguro de eliminar al user?')\">Eliminar mesa</a></div>";
                    echo "</div>";
                }
        echo "</div>";
    echo "</div>";
?>

</center>

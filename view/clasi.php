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

echo "<table>";

foreach ($listaUsers as $user) {
        echo "<tr>";
            echo "<td>{$user['id_user']}</td>";
            
            echo "<td>{$user['nom_user']}</td>";
            
            echo "<td>{$user['apellido_user']}</td>";
            
            echo "<td>{$user['email_user']}</td>";
            
            echo "<td>{$user['rol_user']}</td>";
        echo "</tr>";
}

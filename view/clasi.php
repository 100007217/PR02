<?php
include '../services/config.php';
include '../services/conexion.php';

$roleo=$_POST['rol'];



if (isset($roleo)) {
    if ($roleo=='adm') {

        $rol='Admin';
    }
    elseif ($roleo=='cam'){

        $rol='Camarero';
    }else{
        header('Location: ../view/vista.php');
    }
    
}

// ADMIN
//
if ($rol=='Admin') {
    ?>
    <form action="clasi.php" method="post">
        <input type="text" name="nombre" id="">Introduce el nombre del admin
        <input type="text" name="apellido" id="">Introduce el apellido del admin
        <input type="text" name="mail" id="">Introduce el mail del admin
        <input type="hidden" name="rol" value="adm">
        <input type="submit" value="Crear">
    </form>
<?php

    if (isset($_POST['nombre'])){

        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['mail'];

        $sentencia = $pdo->prepare("INSERT INTO tbl_users (nom_user,apellido_user,email_user,rol_user)
        VALUES ( ?, ?, ?, ?)");
        $sentencia->bindParam(1, $rol);
        $sentencia->bindParam(2, $apellido);
        $sentencia->bindParam(3, $email);
        $sentencia->bindParam(4, $rol);
        $sentencia->execute();
    }
}
//CAMARERO
//
elseif($rol=='Camarero'){
    ?>
        <form action="clasi.php" method="post">
            <input type="text" name="nom_cam" id="">
            <input type="text" name="ape_cam" id="">
            <input type="hidden" name="rol" value="cam">
            <input type="submit" value="Filtrar">
        </form>
<?php
        $sentencia = $pdo->prepare("SELECT 
        tbl_users.id_user,
        tbl_users.nom_user,
        tbl_users.apellido_user,
        tbl_users.email_user,
        tbl_users.rol_user
        from tbl_users
        where tbl_users.rol_user like ?");
        

        
}

if (isset($_POST['nom_cam'])) {
    $nombre=$_POST['nom_cam'];
    $nombre="%".$nombre."%";
    $apellido=$_POST['ape_cam'];
    $nombre="%".$apellido."%";
    $sentencia = $pdo->prepare("SELECT 
            tbl_users.id_user,
            tbl_users.nom_user,
            tbl_users.apellido_user,
            tbl_users.email_user,
            tbl_users.rol_user
            from tbl_users
            where tbl_users.nom_user like ? or tbl_users.apellido_user like ?");
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $apellido);
            $sentencia->execute();
}else{
    $sentencia = $pdo->prepare("SELECT 
    tbl_users.id_user,
    tbl_users.nom_user,
    tbl_users.apellido_user,
    tbl_users.email_user,
    tbl_users.rol_user
    from tbl_users
    
    where tbl_users.rol_user like ?");
    $sentencia->bindParam(1, $rol);
    $sentencia->execute();
}


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
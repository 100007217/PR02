<?php 

if (isset($_POST['nom_user']) && isset($_POST['password_user'])) {
    require_once '../services/conexion.php';
    $nom_user=$_POST['nom_user'];
    $password_user=$_POST['password_user'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_users WHERE nom_user='$nom_user' and password_user='{$password_user}'");
    $stmt->execute();
    $comprobar=$stmt->fetchAll(PDO::FETCH_ASSOC);
   
    try {
        if (!$comprobar=="") {
            session_start();
            $_SESSION['nom_user']=$nom_user;
            $_SESSION['rol']=$comprobar[0]['rol_user'];
            header("location: ../view/clasificacion.php");
        }else {
            session_start();
            $_SESSION['error']=1;
            header("location: ../view/login.php");
            
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    header("location: ../view/login.php");
}

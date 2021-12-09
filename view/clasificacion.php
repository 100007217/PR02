<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
session_start();
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol']=="Admin") {
            header("location: ../view/crud.php");
        }elseif ($_SESSION['rol']=="Camarero") {
            header("location: ../view/vista.php");
        }else{
            header("location: ../view/login.php");
        }
    }else{
        header("location: ../view/login.php");
    }
?>

</body>
</html>
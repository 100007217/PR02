<?php
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$id_mesa=$_POST['id_mesa'];
$incidencia=$_POST['incidencia'];
$num_sillas=$_POST['num_sillas'];
$descripcion=$_POST['desc_incidencia'];
$nsillas_tot=$_POST['nsillas_tot'];

try {

    $mesa_sillas_disp = $pdo->prepare("UPDATE tbl_mesa
    SET tbl_mesa.num_sillas_actuales = ?
    where id_mesa=?");
   
    $mesa_sillas_disp->bindParam(1, $num_sillas);
    $mesa_sillas_disp->bindParam(2, $id_mesa);
   
    $mesa_sillas_disp->execute();

    //INSERT INTO tbl_reserva (fecha_inicio,nombre_cliente,num_personas,id_mesa)
    //VALUES ( '2021-11-10 15:00:00', 'Javi', '1', '2');
    
    
    //INSERTAR DESCRIPCION INCIDENCIA
    $mesa_descripcion = $pdo->prepare("UPDATE tbl_mesa
    SET tbl_mesa.desc_incidencia = ?
    where id_mesa=?");
    
    $mesa_descripcion->bindParam(1, $descripcion);
    $mesa_descripcion->bindParam(2, $id_mesa);
    
    $mesa_descripcion->execute();


    //UPDATE TABLA MESA INCIDENCIA, INCIDENCIA O NO
    if ($incidencia==1) {
        $incidencia1 = $pdo->prepare("UPDATE tbl_mesa
        SET incidencia = 1
        where id_mesa = ?");
        
        $incidencia1->bindParam(1, $id_mesa);   
        
        $incidencia1->execute();

    }
    else{
        $incidencia0 = $pdo->prepare("UPDATE tbl_mesa
        SET incidencia = 0,
        num_sillas_actuales=?
        where id_mesa = ?");
        
        $incidencia0->bindParam(1, $nsillas_tot);  
        $incidencia0->bindParam(2, $id_mesa); 
        
        $incidencia0->execute();
    }
    header('Location: ../view/vista.php');
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}
<?php
echo "<table class='column'>";
        echo "<tr>";
        echo "<td><h3>MESA {$mesa['id_mesa']}</h3></td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td><img src='../img/{$mesa['img_mesa']}' width='150px'></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><p>{$mesa['tipo_ubi']}</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><p>Nº Sillas {$mesa['num_sillas_actuales']}</p></td>";
        echo "</tr>";

        echo "</tr>";
        if ($mesa['incidencia']==1) {

            echo "<tr>";
            echo "<td><p>Incidencia: {$mesa['desc_incidencia']}</p></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td><a type='button' class='btn btn-primary'  href='../process/incidenciaform.php?id={$mesa['id_mesa']}&nsillas={$mesa['num_silla_dispo']}'>Solventar incidencia</a></td>";
            echo "</tr>";
        }else {

        echo "<tr>";
        if ($mesa['reservada']==1) {
            echo "<td><p>OCUPADA</p></td>";
        }else {
            echo "<td><p>LIBRE</p></td>";
        }

        echo "<tr>";
        echo "<td><a type='button' class='btn btn-warning'  href='../process/incidenciaform.php?id={$mesa['id_mesa']}&nsillas={$mesa['num_silla_dispo']}'>Generar incidencia</a></td>";
        echo "</tr>";
        }
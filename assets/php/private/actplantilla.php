<?php

echo "DESHABILITADO";
/*
// INCLUDES

require_once '../conexion.php';
require_once '../helpers.php';

// INICIAR SESION

session_start();

// DATOS INICIALES

$act = '2019-10-21';
$lim = '2019-12-31';


// BUCLE DE ACTUALIZACION


$for = $act;
while ($for <= $lim) {
     $unixTimestamp = strtotime($for);
     $dayOfWeek = date("l", $unixTimestamp);

     if ($dayOfWeek == 'Monday') {
          echo $dayOfWeek . '<br />';
          // SQL CARLOTA I2
          $sql1 = "UPDATE Trayectos SET `ID CONDUCTOR`=4 WHERE FECHA='$for' AND TIPO='IDA2'";
          $consulta1 = mysqli_query($db, $sql1);
     }

     if ($dayOfWeek == 'Thursday') {
          echo $dayOfWeek . '<br />';
          // SQL SOFIA V2
          $sql1 = "UPDATE Trayectos SET `ID CONDUCTOR`=6 WHERE FECHA='$for' AND TIPO='VUELTA2'";
          $consulta1 = mysqli_query($db, $sql1);
     }

     if ($dayOfWeek == 'Friday') {
          echo $dayOfWeek . '<br />';
          // SQL CARLOTA I2 SOFIA V2
          $sql1 = "UPDATE Trayectos SET `ID CONDUCTOR`=4 WHERE FECHA='$for' AND TIPO='IDA2'";
          $sql2 = "UPDATE Trayectos SET `ID CONDUCTOR`=6 WHERE FECHA='$for' AND TIPO='VUELTA2'";
          $consulta1 = mysqli_query($db, $sql1);
          $consulta1 = mysqli_query($db, $sql2);
     }
     $for = date('Y-m-d', strtotime($for . '+ 1 day'));
}



echo mysqli_error($db);
*/
?>

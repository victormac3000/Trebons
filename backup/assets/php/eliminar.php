<?php

require_once 'conexion.php';
require_once 'helpers.php';
session_start();

$tipo = $_GET['tipo'];
$idconductor = $_SESSION['usuario']['ID'];

if ($tipo == "la primera en llevar a las chicas") {
     $tipo = "IDA1";
}

if ($tipo == "la segunda en llevar a las chicas") {
     $tipo = "IDA2";
}

if ($tipo == "la primera en traer a las chicas") {
     $tipo = "VUELTA1";
}

if ($tipo == "la segunda en traer a las chicas") {
     $tipo = "VUELTA2";
}



$fecha = $_GET['fecha'];

if (isset($_GET)) {

     // CHECK IF PLAZA ES TUYA

     $sqltrampa = "SELECT COUNT(*) AS FILAS FROM Trayectos WHERE TIPO='$tipo' AND FECHA='$fecha' AND `ID CONDUCTOR`=$idconductor";
     $trampa = mysqli_query($db, $sqltrampa);

     if (mysqli_fetch_assoc($trampa)['FILAS'] == '0') {
          $_SESSION['errores']['delete'] = "No me seas piratilla";
          header('Location: ../i/borrar.php?nsem=' . obtenernsemfecha($fecha));
          die();
     }

     // LIBERACION DE PLAZA

     $sql = "UPDATE Trayectos SET `ID CONDUCTOR` = 7 WHERE TIPO='$tipo' AND FECHA='$fecha' AND `ID CONDUCTOR`=$idconductor";
     $actc = mysqli_query($db, $sql);
     if ($actc) {
          unset($_SESSION['errores']);
          $_SESSION['errores']['deleteb'] = "Plaza liberada";
          header('Location: ../i/borrar.php?nsem=' . obtenernsemfecha($fecha));
     } else {
          unset($_SESSION['errores']);
          $_SESSION['errores']['delete'] = "Hubo un error al liberar la plaza";
          header('Location: ../i/borrar.php?nsem=' . obtenernsemfecha($fecha));
     }
}


?>

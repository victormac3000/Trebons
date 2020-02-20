<?php

require __DIR__ . '/vendor/autoload.php';
use Spatie\CalendarLinks\Link;
require_once 'conexion.php';
require_once 'helpers.php';
require_once 'detector.php';
session_start();

$tipo = $_GET['tipo'];

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
$idconductor = $_SESSION['usuario']['ID'];


if ($_GET['cal'] == true) {
     $cal = true;

     if ($tipo == 'IDA1' || $tipo == 'IDA2') {
          $titulo = 'Llevar a las niñas a entrenar';
          $descripcion = 'Acuérdate de llevar a tu hija ' . obtenernombre($db, $idconductor) . ' y a sus compañeras a entrenar';
          if (numerolfecha($fecha) == 1 || $fecha == 5) {
               $ubicacion = 'Rúa Anduriñas, 13, 15172 Oleiros, A Coruña';
          }
          if (numerolfecha($fecha) == 4) {
               $ubicacion = 'Avenida Ernesto Che Guevara, 121, 15179 Oleiros, A Coruña';
          }
          $from = DateTime::createFromFormat('Y-m-d H:i', $fecha . ' 19:30');
          $to = DateTime::createFromFormat('Y-m-d H:i', $fecha . ' 20:30');
     }

     if ($tipo == 'VUELTA1' || $tipo == 'VUELTA2') {
          $titulo = 'Traer a las niñas de entrenar';
          $descripcion = 'Acuérdate de traer a tu hija ' . obtenernombre($db, $idconductor) . ' y a sus compañeras a entrenar';
          if (numerolfecha($fecha) == 4) {
               $ubicacion = 'Avenida Ernesto Che Guevara, 121, 15179 Oleiros, A Coruña';
          }
          if (numerolfecha($fecha) == 1 || $fecha == 5) {
               $ubicacion = 'Rúa Anduriñas, 13, 15172 Oleiros, A Coruña';
          }
          $from = DateTime::createFromFormat('Y-m-d H:i', $fecha . ' 22:00');
          $to = DateTime::createFromFormat('Y-m-d H:i', $fecha . ' 23:00');
     }

     $link = Link::create($titulo, $from, $to)->description($descripcion)->address($ubicacion);

     if (parse_user_agent()['platform'] == 'Android') {
          $evento = $link->google();
     }

     if (parse_user_agent()['platform'] == 'Macintosh' || parse_user_agent()['platform'] == 'iPhone' || parse_user_agent()['platform'] == 'iPad' || parse_user_agent()['platform'] == 'iPod Touch') {
          $evento = $link->ics();
     }

}


if (isset($_GET)) {
     $sql = "UPDATE Trayectos SET `ID CONDUCTOR` = $idconductor WHERE TIPO='$tipo' AND FECHA='$fecha'";
     $actc = mysqli_query($db, $sql);
     if ($actc) {
          $_SESSION['errores']['act'] = "";
          $_SESSION['errores']['actualizar'] = "";
          $_SESSION['errores']['actualizarb'] = "";
          $_SESSION['errores']['actb'] = "Plaza adjudicada";
          if ($cal == true) {
               header('Location: ' . $evento);
               die();
          } else {
               header('Location: ../i/principal.php?nsem=' . obtenernsemfecha($fecha));
          }
     } else {
          $_SESSION['errores']['act'] = "";
          $_SESSION['errores']['actualizar'] = "";
          $_SESSION['errores']['actualizarb'] = "";
          $_SESSION['errores']['act'] = "Hubo un error al actualizar el conductor";
          header('Location: ../i/principal.php?nsem=' . obtenernsemfecha($fecha));
     }
}




?>

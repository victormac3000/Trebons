<?php

// INCLUDES

require __DIR__ . '/vendor/autoload.php';
use Spatie\CalendarLinks\Link;
require_once 'helpers.php';
require_once 'conexion.php';

// OBTENER FECHA DE LA SEMANA

$nsem = $_GET['nsem'];
$lunes = obtenerlunes($nsem);
$viernes = obtenerviernes($nsem);
$plataforma = 'Google';

// CONSULTA DE QUE DIAS CONDUCE

$sql = "SELECT TIPO,FECHA FROM Trayectos WHERE FECHA<='$viernes' AND FECHA>='$lunes' AND `ID CONDUCTOR`=1";
$consulta = mysqli_query($db, $sql);

// RECOGER DATOS EN ARRAY

$trayectos = array();
while ($fila = mysqli_fetch_assoc($consulta)) {
     $trayectos[] = $fila;
}

// FECHA







?>

<?php

// INCLUDES

session_start();
require_once '../helpers.php';
require_once '../conexion.php';

// VARIABLES INICIALES


$xml = simplexml_load_file('cron.xml');
$fecha = date('Y-m-d');

// VERIFICAR SI HOY HAY ENTRENO

$sqlent = "SELECT ID FROM Trayectos WHERE FECHA='$fecha'";
$cent = mysqli_query($db, $sqlent);

if (mysqli_num_rows($cent) < 1) {
     die();
}

// VERIFICAR SI ESTAMOS EN HORA

if (date('H:i') < '21:00') {
     die();
}


// VERIFICAR SI HAY HOY UN CALCULO

$ultimo = $xml->xpath('//dia[last()]/@fecha');
$ult = (string)$ultimo[0];

if ($ult == $fecha) {
     die();
}

if ($ult != $fecha) {
     // OBTENER CONDUCTORES DE HOY

     $sql = "SELECT `ID CONDUCTOR` FROM Trayectos WHERE FECHA='$fecha'";
     $consulta = mysqli_query($db, $sql);

     // RECOGER DATOS EN ARRAY

     $conductoress = array();
     while ($fila = mysqli_fetch_assoc($consulta)) {
          $conductoress[] = $fila;
     }

     // INSERTAR TRAYECTOS EN LA BASE DE DATOS

     for ($i=0; $i < count($conductoress); $i++) {
          subirTrayecto($db, $conductoress[$i]['ID CONDUCTOR']);
     }

     // NUEVO DIA EN XML

     $dia = $xml->addChild('dia');
     $dia->addAttribute('fecha', $fecha);
     $conductores = $dia->addChild('conductores');

     // BUCLE DE AÑADIR CONDUCTORES AL XML

     for ($i=0; $i < count($conductoress); $i++) {
          $conductor = $conductores->addChild('conductor');
          $conductor->addAttribute('id', $conductoress[$i]['ID CONDUCTOR']);

     }

     // GUARDAR XML

     $xml->asXML("cron.xml");
}
?>

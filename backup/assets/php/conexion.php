<?php

// OBTENER IP

$ip = $_SERVER['SERVER_ADDR'];

// VER SI ESTA EN LOCAL (VARIABLES DE CONEXION)

if ($ip == '::1') {
     $servidor = 'localhost';
     $usuario = 'root';
     $password = 'toor';
     $basededatos = 'Trebons';
} else {
     $servidor = 'sql306.epizy.com';
     $usuario = 'epiz_24587433';
     $password = '1BRvgwviVetv2F';
     $basededatos = 'epiz_24587433_trebons';
}

// CONECTAR A LA BASE DE DATOS
$db = mysqli_connect($servidor,$usuario,$password,$basededatos);

// CORREGIR NOMBRES CON CARACTERES EXTRAÑOS

mysqli_query($db, "SET NAMES 'utf8'");

// SETEAR BIEN HORAS

date_default_timezone_set('Europe/Madrid');

// COMPROBAR CONEXION

if (!$db) {
     echo "ERROR AL CONECTAR CON LA BASE DE DATOS";
     die();
}


?>

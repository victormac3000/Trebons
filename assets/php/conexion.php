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
     $servidor = '#####';
     $usuario = '######';
     $password = '######';
     $basededatos = '#######';
}

// CONECTAR A LA BASE DE DATOS
$db = mysqli_connect($servidor,$usuario,$password,$basededatos);

if (!$db) {
     echo "ERROR AL CONECTAR CON LA BASE DE DATOS" . mysqli_error($db);
     die();
}

// CORREGIR NOMBRES CON CARACTERES EXTRAÑOS

mysqli_query($db, "SET NAMES 'utf8'");

// SETEAR BIEN HORAS

date_default_timezone_set('Europe/Madrid');

// COMPROBAR CONEXION




?>

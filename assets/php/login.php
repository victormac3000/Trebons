<?php

// INCLUDES

require_once 'conexion.php';
require_once 'helpers.php';

// INICIAR SESION

session_start();

$usuario = trim($_POST['usuario']);
$contrasena = trim($_POST['contrasena']);

// OBTENER DATOS USUARIO

$sql = "SELECT * FROM Conductores WHERE USUARIO='$usuario'";
$consultausuario = mysqli_query($db, $sql);

if (mysqli_num_rows($consultausuario) < 1) {
     $_SESSION['errores']['login'] = "";
     $_SESSION['errores']['login'] = "Has metido mal el usuario";
     header('Location: ../../');
}


$_SESSION['usuario'] = mysqli_fetch_assoc($consultausuario);

if ($_SESSION['usuario']['CONTRASENA'] != $contrasena) {
     $_SESSION['errores']['login'] = "";
     $_SESSION['errores']['login'] = "La contraseña es incorrecta";
     header('Location: ../../');
}

if ($_SESSION['usuario']['USUARIO'] == $usuario && $_SESSION['usuario']['CONTRASENA'] == $contrasena) {
     $_SESSION['errores']['autorizacion'] = "";
     $_SESSION['errores']['login'] = "";
     $_SESSION['errores']['actb'] = "";
     $_SESSION['errores']['act'] = "";
     header('Location: ../i/principal.php?nsem=' . obtenernsem());
}








?>

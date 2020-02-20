<?php

session_start();
require_once 'conexion.php';
require_once 'helpers.php';

// OBTENER VALORES POST

$_SESSION['errores']['actualizarb'] = '';

if (isset($_POST)) {
     $nnombre = $_POST['nombre'];
     $nusuario = $_POST['usuario'];
     $ncontrasena = $_POST['ncontrasena'];

     $cambios = 0;
     $idconduct = $_SESSION['usuario']['ID'];

     if ($nnombre != $_POST['usuario']['NOMBRE']) {
          $sql = "UPDATE `Conductores` SET `NOMBRE` = '$nnombre' WHERE `Conductores`.`ID` = $idconduct";
          $consulta = mysqli_query($db, $sql);
          if ($consulta) {
               $cambios++;
          }
          if (!$consulta) {
               $_SESSION['errores']['actualizar'] = "Hubo un error al actualizar el nombre";
               header('Location: ../i/misdatos.php');
          }
     }

     if ($nusuario != $_POST['usuario']['USUARIO']) {
          $sql = "UPDATE `Conductores` SET `USUARIO` = '$nusuario' WHERE `Conductores`.`ID` = $idconduct";
          $consulta = mysqli_query($db, $sql);
          if ($consulta) {
               $cambios++;
          }
          if (!$consulta) {
               $_SESSION['errores']['actualizar'] = "Hubo un error al actualizar el usuario";
               header('Location: ../i/misdatos.php');
          }
     }

     if ($ncontrasena != $_POST['usuario']['CONTRASENA']) {
          $sql = "UPDATE `Conductores` SET `CONTRASENA` = '$ncontrasena' WHERE `Conductores`.`ID` = $idconduct";
          $consulta = mysqli_query($db, $sql);
          if ($consulta) {
               $cambios++;
          }
          if (!$consulta) {
               $_SESSION['errores']['actualizar'] = "Hubo un error al actualizar la contraseña";
               header('Location: ../i/misdatos.php');
          }
     }

     if ($cambios > 1) {
          $_SESSION['errores']['actualizarb'] = "Datos actualizados correctamente";
          header('Location: ../i/principal.php?nsem=' . obtenernsem());
     }

     if ($cambios < 1) {
          $_SESSION['errores']['actualizarb'] = "No se ha cambiado nada";
          header('Location: ../i/principal.php?nsem=' . obtenernsem());
     }
} else {
     $_SESSION['errores']['actualizar'] = "Hubo un error al actualizar tus datos";
     header('Location: ../i/misdatos.php');
}

?>

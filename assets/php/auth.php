<?php
session_start();
if (!isset($_SESSION['usuario'])) {
     $_SESSION['errores']['autorizacion'] = "No tienes acceso a esta página";
     header('Location: ../../');
}
?>

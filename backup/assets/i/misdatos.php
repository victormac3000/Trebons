<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mis datos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../img/icono.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/utilindex.css">
	<link rel="stylesheet" type="text/css" href="../css/mainindex.css">
<!--===============================================================================================-->
</head>
<body>
	<?php require_once '../php/auth.php'; ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="../php/actdatos.php" method="post">
					<span class="login100-form-title p-b-26">
						Actualiza tus datos
					</span>
					<span class="login100-form-title p-b-48">
						<i><img src="../img/logo.png" height="80" width="80" /></i>
					</span>

					<?php session_start(); ?>

                         <div class="wrap-input100 validate-input">
                              <input id="nombre" class="input100" type="text" name="nombre" onclick="document.getElementById('nombre').value = '<?= $_SESSION['usuario']['NOMBRE'] ?>'">
                              <span class="focus-input100" data-placeholder="Nombre"></span>
                         </div>

					<div class="wrap-input100 validate-input">
						<input id="usuario" class="input100" type="text" name="usuario" onclick="document.getElementById('usuario').value = '<?= $_SESSION['usuario']['USUARIO'] ?>'">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="ncontrasena">
						<span class="focus-input100" data-placeholder="Nueva contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Actualizar
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>

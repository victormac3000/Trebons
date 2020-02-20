<!DOCTYPE html>
<html lang="en">
<head>
	<title>Trebons</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="../img/icono.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/principal.css"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/flaticon.css"/>
	<link rel="stylesheet" href="../css/magnific-popup.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.css"/>
	<link rel="stylesheet" href="../css/style.css"/>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<?php require_once '../php/auth.php'; ?>
     <?php require_once '../php/conexion.php'; ?>
     <?php require_once '../php/helpers.php'; ?>
     <?php session_start(); ?>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="../img/logo.png" alt="">
			<h2>Cargando.....</h2>
		</div>
	</div>


	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="../img/logo.png" height="48" width="48"><!-- Logo -->
               <span class="rojo">Borrar</span>
		</div>

		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
                    <li class="active"><a href="principal.php?nsem=<?= obtenernsem() ?>">Principal</a></li>
				<li><a href="borrar.php?nsem=<?= obtenernsem() ?>">Borrar</a></li>
                    <li><a href="ranking.php?nsem=<?= obtenernsem() ?>">Ranking</a></li>
                    <li><a href="misdatos.php">Mis datos</a></li>
                    <li><a href="../php/logoff.php">Cerrar sesión</a></li>
               </ul>
		</nav>
	</header>
	<!-- Header section end -->


	<!-- Team Section -->
	<?php $idconductor = $_SESSION['usuario']['ID']; ?>
	<?php $week = (int)$_GET['nsem']; ?>
	<?php $_SESSION['nsem'] = $week; ?>

	<div class="team-section spad" style="padding-bottom: 10px;">
		<div class="container">
			<div class="section-title" style="margin-bottom: 35px;">
				<h2>Esta semana (<?= substr(obtenerdsem('LUNES', $week), 8, 2) . '/' . substr(obtenerdsem('LUNES', $week), 5, 2)?>)</h2>
			</div>
			<?php if(isset($_SESSION['errores']['deletef'])) : ?>
				<h2 style="color: red; text-align: center; font-size: 25px; margin-bottom: 20px;"><?= $_SESSION['errores']['deletef'] ?></h2>
			<?php endif; ?>
               <?php if(isset($_SESSION['errores']['delete'])) : ?>
				<h2 style="color: red; text-align: center; font-size: 25px; margin-bottom: 20px;"><?= $_SESSION['errores']['delete'] ?></h2>
			<?php endif; ?>
               <?php if(isset($_SESSION['errores']['deleteb'])) : ?>
                    <h2 style="color: green; text-align: center; font-size: 25px; margin-bottom: 20px;"><?= $_SESSION['errores']['deleteb'] ?></h2>
               <?php endif; ?>
			<div class="row">
				<!-- single member -->

				<div class="col-sm-4">
					<?php if(obtenerdsem('LUNES', $week) >= date('Y-m-d')) : ?>
						<div class="member">
							<h2 style="font-size: 30px;">Lunes</h2>
							<table border="1" width="300" style="width: 100%; font-size: 30px; color: white;">
								<tr style="background-color: #2be6ab">
									<td>
										IDA
									</td>
									<td>
										VUELTA
									</td>
								</tr>
								<tr>
									<td onclick="del('IDA1', <?= $idconductor ?>, <?= substr(obtenerdsem('LUNES', $week), 0, 4) ?>, <?= substr(obtenerdsem('LUNES', $week), 5, 2) ?>, <?= substr(obtenerdsem('LUNES', $week), 8, 10) ?>)">
										<?= sacarCondTrayecto($db, obtenerdsem('LUNES', $week), 'IDA1')['NOMBRE'] ?>
									</td>

									<td onclick="del('VUELTA1', <?= $idconductor ?>, <?= substr(obtenerdsem('LUNES', $week), 0, 4) ?>, <?= substr(obtenerdsem('LUNES', $week), 5, 2) ?>, <?= substr(obtenerdsem('LUNES', $week), 8, 10) ?>)">
										<?= sacarCondTrayecto($db, obtenerdsem('LUNES', $week), 'VUELTA1')['NOMBRE'] ?>
									</td>
								</tr>
								<tr>
									<td onclick="del('IDA2', <?= $idconductor ?>, <?= substr(obtenerdsem('LUNES', $week), 0, 4) ?>, <?= substr(obtenerdsem('LUNES', $week), 5, 2) ?>, <?= substr(obtenerdsem('LUNES', $week), 8, 10) ?>)">
										<?= sacarCondTrayecto($db, obtenerdsem('LUNES', $week), 'IDA2')['NOMBRE'] ?>
									</td>
									<td onclick="del('VUELTA2', <?= $idconductor ?>, <?= substr(obtenerdsem('LUNES', $week), 0, 4) ?>, <?= substr(obtenerdsem('LUNES', $week), 5, 2) ?>, <?= substr(obtenerdsem('LUNES', $week), 8, 10) ?>)">
										<?= sacarCondTrayecto($db, obtenerdsem('LUNES', $week), 'VUELTA2')['NOMBRE'] ?>
									</td>
								</tr>
							</table>
						</div>
					<?php endif; ?>
					<?php if(obtenerdsem('JUEVES', $week) >= date('Y-m-d')) : ?>
					<div class="col-sm-4">
						<div class="member">
							<h2 style="font-size: 30px;">Jueves</h2>
								<table border="1" style="width: 100%; font-size: 30px; color: white;">
								<tr style="background-color: #2be6ab">
									<td>
										IDA
									</td>
									<td>
										VUELTA
									</td>
								</tr>
								<tr>
									<td onclick="del('IDA1', <?= $idconductor ?>, <?= substr(obtenerdsem('JUEVES', $week), 0, 4) ?>, <?= substr(obtenerdsem('JUEVES', $week), 5, 2) ?>, <?= substr(obtenerdsem('JUEVES', $week), 8, 10) ?>)">
										<?= sacarCondTrayecto($db, obtenerdsem('JUEVES', $week), 'IDA1')['NOMBRE'] ?>
									</td>
									<td onclick="del('VUELTA1', <?= $idconductor ?>, <?= substr(obtenerdsem('JUEVES', $week), 0, 4) ?>, <?= substr(obtenerdsem('JUEVES', $week), 5, 2) ?>, <?= substr(obtenerdsem('JUEVES', $week), 8, 10) ?>)">
										<?= sacarCondTrayecto($db, obtenerdsem('JUEVES', $week), 'VUELTA1')['NOMBRE'] ?>
									</td>
								</tr>
								<tr>
									<td onclick="del('IDA2', <?= $idconductor ?>, <?= substr(obtenerdsem('JUEVES', $week), 0, 4) ?>, <?= substr(obtenerdsem('JUEVES', $week), 5, 2) ?>, <?= substr(obtenerdsem('JUEVES', $week), 8, 10) ?>)">
										<?= sacarCondTrayecto($db, obtenerdsem('JUEVES', $week), 'IDA2')['NOMBRE'] ?>
									</td>
									<td onclick="del('VUELTA2', <?= $idconductor ?>, <?= substr(obtenerdsem('JUEVES', $week), 0, 4) ?>, <?= substr(obtenerdsem('JUEVES', $week), 5, 2) ?>, <?= substr(obtenerdsem('JUEVES', $week), 8, 10) ?>)">
										<?= sacarCondTrayecto($db, obtenerdsem('JUEVES', $week), 'VUELTA2')['NOMBRE'] ?>
									</td>
								</tr>
							</table>
						</div>
						<?php endif; ?>

						<?php if(obtenerdsem('VIERNES', $week) >= date('Y-m-d')) : ?>
						<div class="col-sm-4">
							<div class="member">
								<h2 style="font-size: 30px;">Viernes</h2>
								<table border="1" width="300" style="width: 100%; font-size: 30px; color: white;">
									<tr style="background-color: #2be6ab">
										<td>
											IDA
										</td>
										<td>
											VUELTA
										</td>
									</tr>
									<tr>
										<td onclick="del('IDA1', <?= $idconductor ?>, <?= substr(obtenerdsem('VIERNES', $week), 0, 4) ?>, <?= substr(obtenerdsem('VIERNES', $week), 5, 2) ?>, <?= substr(obtenerdsem('VIERNES', $week), 8, 10) ?>)">
											<?= sacarCondTrayecto($db, obtenerdsem('VIERNES', $week), 'IDA1')['NOMBRE'] ?>
										</td>
										<td onclick="del('VUELTA1', <?= $idconductor ?>, <?= substr(obtenerdsem('VIERNES', $week), 0, 4) ?>, <?= substr(obtenerdsem('VIERNES', $week), 5, 2) ?>, <?= substr(obtenerdsem('VIERNES', $week), 8, 10) ?>)">
											<?= sacarCondTrayecto($db, obtenerdsem('VIERNES', $week), 'VUELTA1')['NOMBRE'] ?>
										</td>
									</tr>
									<tr>
										<td onclick="del('IDA2', <?= $idconductor ?>, <?= substr(obtenerdsem('VIERNES', $week), 0, 4) ?>, <?= substr(obtenerdsem('VIERNES', $week), 5, 2) ?>, <?= substr(obtenerdsem('VIERNES', $week), 8, 10) ?>)">
											<?= sacarCondTrayecto($db, obtenerdsem('VIERNES', $week), 'IDA2')['NOMBRE'] ?>
										</td>
										<td onclick="del('VUELTA2', <?= $idconductor ?>, <?= substr(obtenerdsem('VIERNES', $week), 0, 4) ?>, <?= substr(obtenerdsem('VIERNES', $week), 5, 2) ?>, <?= substr(obtenerdsem('VIERNES', $week), 8, 10) ?>)">
											<?= sacarCondTrayecto($db, obtenerdsem('VIERNES', $week), 'VUELTA2')['NOMBRE'] ?>
										</td>
									</tr>
								</table>
							</div>
						<?php endif; ?>
				</div>
			</div>

			<!--
			<?php if(obtenerdsem('VIERNES', $week) >= date('Y-m-d')) : ?>
				<div id="descarga" style="text-align: center; color: white;">
					<h2>Descarga en PDF</span>
					<br />
					<img style="margin: 15px 10px;" onclick="window.location = '../php/pdf.php'" src="../img/pdf.png" height="100" width="100" />
				</div>
			<?php endif; ?>
			-->



			<div class="section-title" style="margin-bottom: 35px;">
				<h2>SELECCIONA OTRA SEMANA</h2>
			</div>

			<select onchange="cambiarsem() <?php unset($_SESSION['errores']) ?>" id="selsemana" name="selsemana" style="color: white; margin-bottom: 25px; border: none; width:80%; height: 40px; margin-left: 10%; margin-right: 10%; font-size: 20px; text-align-last:center; border-radius: 15px; background-color: rgba(108,79,189,0.8)">
				<option selected disabled>-Selecciona-</option>
				<?php for($i = (obtenernsem()); $i < (obtenernsem()+5); $i++) : ?>
					<?php $fechabien =  'Semana del: ' .  substr(obtenerprimerosemana($i), 20, 2) . '/' . substr(obtenerprimerosemana($i), 17, 2) . '/' . substr(obtenerprimerosemana($i), 12, 4) ?>
					<option value="<?= $i ?>"><?= $fechabien ?></option>
				<?php endfor; ?>
			</select>


		</div>
	</div>



	<!-- Footer section -->
	<footer class="footer-section" style="margin: 20px 20px;">
		<h2>&copy;<?= date('Y') ?> Creado por Víctor Martínez</h2>
	</footer>
	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/magnific-popup.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/circle-progress.min.js"></script>
	<script src="../js/main2.js"></script>
	<script src="../js/borrar.js"></script>
	<script src="../js/borrar2.js"></script>
</body>
</html>

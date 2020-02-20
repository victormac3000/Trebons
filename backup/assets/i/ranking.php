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
<body style="background-color: rgb(108,36,178);">
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
               <span>Bienvenida, <?= $_SESSION['usuario']['NOMBRE'] ?></span>
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
	<div class="team-section spad" style="padding-bottom: 10px;">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title" style="margin-bottom: 35px;">
				<h2>RANKING</h2>
			</div>

               <canvas id="pie-chartcanvas-1"></canvas>


		</div>
	</div>

	<div class="member">
		<table border="1" width="80%" style="width: 100%; font-size: 30px; color: white; background-color: rgb(108,36,178); margin-top: 45px;">
			<tr style="background-color: #2be6ab;">
				<td>
					CONDUCTOR
				</td>
				<td>
					TRAYECTOS
				</td>
			</tr>
			<?php for($i = 0; $i < count(obtenerusuario($db)); $i++) : ?>
				<tr>
					<td><?= obtenerusuario($db)[$i]['NOMBRE'] ?></td>
					<td><?= obtenerusuario($db)[$i]['NTRAYECTOS'] ?></td>
				</tr>
			<?php endfor; ?>

		</table>
	</div>



	<!-- Footer section -->
	<footer class="footer-section">
		<h2>&copy;<?= date('Y') ?> Creado por Víctor Martínez</h2>
	</footer>
	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="../js/jquery-2.1.4.min.js"></script>
     <script src="../js/Chart.min.js"></script>
     <script>
		$(function(){

		//get the pie chart canvas
		var ctx1 = $("#pie-chartcanvas-1");
		var ctx2 = $("#pie-chartcanvas-2");

		//pie chart data
		var data1 = {
		labels:[
			<?php for($i = 0; $i < count(obtenerusuario($db)); $i++) : ?>
				<?php if($i != count(obtenerusuario($db))) : ?>
					<?= '"' . obtenerusuario($db)[$i]['NOMBRE'] . '"' . ',' ?>
				<?php endif; ?>
				<?php if($i == count(obtenerusuario($db))) : ?>
					<?= '"' . obtenerusuario($db)[$i]['NOMBRE'] . '"' ?>
				<?php endif; ?>
			<?php endfor; ?>
		 ],
		datasets: [
		{
		label: "TeamA Score",
		data: [
			<?php for($i = 0; $i < count(obtenerusuario($db)); $i++) : ?>
				<?php if($i != count(obtenerusuario($db))) : ?>
					<?= obtenerusuario($db)[$i]['NTRAYECTOS'] . ',' ?>
				<?php endif; ?>
				<?php if($i == count(obtenerusuario($db))) : ?>
					<?= obtenerusuario($db)[$i]['NTRAYECTOS'] ?>
				<?php endif; ?>
			<?php endfor; ?>
		],
		backgroundColor: [
		"#DEB887",
		"#A9A9A9",
		"#DC143C",
		"#F4A460",
		"#2E8B57"
		],
		borderColor: [
		"#CDA776",
		"#989898",
		"#CB252B",
		"#E39371",
		"#1D7A46"
		],
		borderWidth: [1, 1, 1, 1, 1]
		}
		]
		};

		//pie chart data
		var data2 = {
		labels: ["Juan", "Pepe", "Maria", "Jorge", "Lucia"],
		datasets: [
		{
		label: "TeamB Score",
		data: [20, 35, 40, 60, 50],
		backgroundColor: [
		"#FAEBD7",
		"#DCDCDC",
		"#E9967A",
		"#F5DEB3",
		"#9ACD32"
		],
		borderColor: [
		"#E9DAC6",
		"#CBCBCB",
		"#D88569",
		"#E4CDA2",
		"#89BC21"
		],
		borderWidth: [1, 1, 1, 1, 1]
		}
		]
		};

		//options
		var options = {
		responsive: true,
		title: {
		display: false,
		position: "top",
		text: "Ranking",
		fontSize: 18,
		fontColor: "#FFF"
		},
		legend: {
		display: true,
		position: "bottom",
		labels: {
		fontColor: "#FFF",
		fontSize: 16
		}
		}
		};

		//create Chart class object
		var chart1 = new Chart(ctx1, {
		type: "pie",
		data: data1,
		options: options
		});

		//create Chart class object
		var chart2 = new Chart(ctx2, {
		type: "pie",
		data: data2,
		options: options
		});
		});

	</script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/magnific-popup.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/circle-progress.min.js"></script>
	<script src="../js/main2.js"></script>
	<script src="../js/principal.js"></script>
	<script src="../js/principal2.js"></script>
</body>
</html>

<?php
/*include_once 'sesion.php';
confirmarLogeo();*/
?>

<?php
include_once 'libreria/config.php';
include_once 'libreria/conexion.php';

$objPlantilla = new plantilla();
class plantilla {

	function __construct() {
		?><!DOCTYPE html>
																				<html>
																				<head>
																					<meta charset=utf-8>
																					<meta name=description content="Chikungunya, ennfermedad, reporte de Chikungunya">
																					<meta name=viewport content="width=device-width, initial-scale=1">
																					<title>Casos Chikungunya</title>
																					<link rel="stylesheet" href="css/normalize.css">
																					<link rel="stylesheet" href="css/kube.css">
																					<link rel="stylesheet" href="css/estilos.css">


																					<!-- <link rel="stylesheet" href="css/css/bootstrap.css"> -->


																				</head>
																				<body>
																					<header>
																						<div id="logo" align="center"><h1>Chikungunya</h1></div>

																						<nav>
																							<ul>
																								<li id="inicio"><a href="#" >Registrar Caso</a></li>
																								<li id="matenimientos"><a href="#">Matenimientos</a></li>
																								<li id="reportes"><a href="#">Reportes</a></li>
																									<li id="vistageografica"><a href="#">Vista Geográfica</a></li>



																							</ul>
																						</nav>


																					</header>
																					<section id="contenido">


		<?php

	}
	function __destruct() {
		?>
		</section>


																					<footer>


																					</footer>
																				</body>
																				</html>
		<?php
	}
}

<?php
include_once 'sesion.php';

?>
<?php
if (log_in()) {
	header("Location:index.php");
}
?>

<?php

include 'libreria/config.php';
include 'libreria/conexion.php';
include 'plantillaLogin.php';

if ($_POST) {

	$user  = $_POST['usuario'];
	$clave = $_POST['clave'];

	$sql = "SELECT id, usuario FROM usuarios where usuario = '$user' and contrasena='$clave'";

	$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

	if (mysqli_num_rows($rs) == 1) {
		$fila                       = mysqli_fetch_assoc($rs);
		$_SESSION['id_usuario']     = $fila['id'];
		$_SESSION['nombre_usuario'] = $fila['usuario'];
		echo "Bien";

		header("Location:index.php");
	} else {

		echo "<h4 style='color: darkred;'>Usuario y/o Contraseña son incorrectos.</h4> Intenta nuevamente ";

	}

}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 </head>
 <body>
 	<form method="post" action="">
 		<table align="center">
 			<h2>Inicie sesión en el sistema<h2>
 			<tr>
 				<td align="right">Usuario: </td>
 				<td><input type="text" name="usuario"></td>
 			</tr>
 			<tr>
 				<td align="right">Contraseña: </td>
 				<td><input type="password" name="clave"></td>
 			</tr>

 			<tr>
 				<td colspan="2"><input  class="btn btn-blue" type="submit" value="Inicar Sesión"></td>
 			</tr>
 		</table>

 	</form>
 	<br/>
 	<br/>
 	<br/>

 </body>
 </html>
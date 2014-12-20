<?php
include 'plantilla.php';
include 'menus.php';
include 'provincias_funciones.php';
$lat        = 0;
$long       = 0;
$provincias = new provincias();
if ($_POST) {
	$provincias->id     = $_POST['id'];
	$provincias->nombre = $_POST['nombre'];

	//Conseguir direccion
	$direccion = urlencode($provincias->nombre);
	$geocode   = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$direccion.'&sensor=false');
	$salida    = json_decode($geocode);
	$lat       = $salida->results[0]->geometry->location->lat;
	$long      = $salida->results[0]->geometry->location->lng;

	//Asignación de las direcciones
	$provincias->latitud  = $long;
	$provincias->longitud = $lat;

	$provincias->guardar();
	if (isset($_POST['latitud'])) {
		$provincias->id       = $_POST['id'];
		$provincias->nombre   = $_POST['nombre'];
		$provincias->longitud = $_POST['longitud'];
		$provincias->latitud  = $_POST['latitud'];
		$provincias->guardar();
	}

	//header("Location:provincias.php");
} else if (isset($_GET['edit'])) {
	$provincias->id       = $_GET['edit'];
	$provincias->longitud = $_GET['longitud'];
	$provincias->latitud  = $_GET['latitud'];

	$provincias->cargar();

} else if (isset($_GET['del'])) {
	$provincias->eliminar($_GET['del']);
}

?>
<style>
	#provincias{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#matenimientos{
		background-color: #2D84BF;
	}
</style>






<fieldset>
	<legend>Mantenimiento de provincias</legend>
	<form action="provincias.php" method="post">
		<table class="unit-centered">
			<tr>

				<td><input type="hidden" name="id" value="<?php echo $provincias->id?>"></td>
			</tr><tr>
				<td>Provincia</td>
				<td><input type="text" name="nombre" value="<?php echo $provincias->nombre?>" size="38"></td>
			</tr>
			<tr>
				 <td>Longitud</td>
				<td><input type="text" name="longitud" placeholder="Longitud Automática" <?php if (isset($_GET['edit'])) {echo "";
} else {
	echo "readonly";
}

?>


				 value="<?php echo $provincias->longitud?>"></td>
			</tr>
			<tr>
				<td>Latitud</td>
				<td><input type="text" name="latitud" placeholder="Latitud Automática" <?php if (isset($_GET['edit'])) {echo "";
} else {
	echo "readonly";
}

?>
				value="<?php echo $provincias->latitud?>"></td>
			</tr>

			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="provincias.php">Nuevo</td>
			</tr>

		</table>
	</form>


	<table class="table-bordered unit-centered table-hovered">

<?php
$provincias = provincias::listadoProvincias();
if (mysqli_num_rows($provincias) < 1) {
	echo "<center><h4>Aún no se han agregado provincias<h4></center>";
} else {
	echo "<thead>
									<tr>
										<th>ID</th>
										<th>nombre</th>
										<th>longitud</th>
										<th>latitud</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
	while ($fila = mysqli_fetch_assoc($provincias)) {
		echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['longitud']}</td>
							<td>{$fila['latitud']}</td>

							<td><a href='provincias.php?edit={$fila['id']}&longitud={$fila['longitud']}&latitud={$fila['latitud']}'>Editar</a> |
								<a onclick="return confirm('¿Seguro que desea borrar esta provincias?');" href='provincias.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>
CODIGO

		;

	}
}

?>
</table>



</fieldset>


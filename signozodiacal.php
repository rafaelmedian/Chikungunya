<?php
include 'plantilla.php';
include 'menus.php';
include 'signozodiacal_funciones.php';
$signozodiacal = new signozodiacal();
if ($_POST) {
	$signozodiacal->id     = $_POST['id'];
	$signozodiacal->nombre = $_POST['nombre'];
	$signozodiacal->desde  = $_POST['desde'];
	$signozodiacal->hasta  = $_POST['hasta'];
	$signozodiacal->guardar();
	//header("Location:signozodiacal.php");
} else if (isset($_GET['edit'])) {
	$signozodiacal->id = $_GET['edit'];
	$signozodiacal->cargar();

} else if (isset($_GET['del'])) {
	$signozodiacal->eliminar($_GET['del']);
}

?>

<style>
	#signozodiacal{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#matenimientos{
		background-color: #2D84BF;
	}
</style>



<fieldset>
	<legend>Mantenimiento de signozodiacal</legend>
	<form action="signozodiacal.php" method="post">
		<table class="unit-centered">
			<tr>

				<td><input type="hidden" name="id" value="<?php echo $signozodiacal->id?>"></td>
			</tr>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $signozodiacal->nombre?>"></td>
			</tr>
			<tr>
				<td>Desde</td>
				<td><input type="date" name="desde" value="<?php echo $signozodiacal->desde?>"></td>
			</tr>
			<tr>
				<td>Hasta</td>
				<td><input type="date" name="hasta" value="<?php echo $signozodiacal->hasta?>"></td>
			</tr>

			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="signozodiacal.php">Nuevo</td>
			</tr>

		</table>
	</form>



	<table class="table-bordered unit-centered table-hovered">

<?php
$signozodiacal = signozodiacal::listadoSignoZodiacal();
if (mysqli_num_rows($signozodiacal) < 1) {
	echo "<center><h4>Aún no se han agregado signozodiacal<h4></center>";
} else {
	echo "<thead>
									<tr>
										<th>ID</th>
										<th>nombre</th>
										<th>desde</th>
										<th>hasta</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
	while ($fila = mysqli_fetch_assoc($signozodiacal)) {
		echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['desde']}</td>
							<td>{$fila['hasta']}</td>

							<td><a href='signozodiacal.php?edit={$fila['id']}'>Editar</a> |
								<a onclick="return confirm('¿Seguro que desea borrar esta signozodiacal?');" href='signozodiacal.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>
CODIGO

		;

	}
}

?>

		</table>
</fieldset>
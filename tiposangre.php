<?php
include 'plantilla.php';
include 'menus.php';
include 'tiposangre_funciones.php';
$tiposangre = new tiposangre();
if ($_POST) {
	$tiposangre->id   = $_POST['id'];
	$tiposangre->tipo = $_POST['tipo'];

	$tiposangre->guardar();
	//header("Location:tiposangre.php");
} else if (isset($_GET['edit'])) {
	$tiposangre->id = $_GET['edit'];
	$tiposangre->cargar();

} else if (isset($_GET['del'])) {
	$tiposangre->eliminar($_GET['del']);
}

?>

<style>
	#tiposangre{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#matenimientos{
		background-color: #2D84BF;
	}
</style>






<fieldset>
	<legend>Mantenimiento de Tipo De Sangre</legend>
	<form action="tiposangre.php" method="post">
		<table class="unit-centered">

			<tr>

				<td><input type="hidden" name="id" value="<?php echo $tiposangre->id?>"></td>
			</tr>

			<tr>
				<td>Tipo</td>
				<td><input type="text" name="tipo" autofocus value="<?php echo $tiposangre->tipo?>"></td>
			</tr>

			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="tiposangre.php">Nuevo</td>
			</tr>

		</table>
	</form>

		<table class="table-bordered unit-centered table-hovered">

<?php
$tiposangre = tiposangre::listadoTipoSangre();
if (mysqli_num_rows($tiposangre) < 1) {
	echo "<center><h4>Aún no se han agregado tiposangre<h4></center>";
} else {
	echo "<thead>
										<tr>
											<th>ID</th>
											<th>tipo</th>
											<th>Edición</th>
										 </tr>
								 </thead>";
	while ($fila = mysqli_fetch_assoc($tiposangre)) {
		echo <<<CODIGO

							<tr>
								<td>{$fila['id']}</td>
								<td>{$fila['tipo']}</td>

								<td><a href='tiposangre.php?edit={$fila['id']}'>Editar</a> |
									<a onclick="return confirm('¿Seguro que desea borrar esta tiposangre?');" href='tiposangre.php?del={$fila['id']}'>Eliminar</a></td>
							</tr>
CODIGO
		;

	}
}

?>
</table>




</fieldset>

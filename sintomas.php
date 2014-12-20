<?php
include 'plantilla.php';
include 'menus.php';
include 'sintomas_funciones.php';
$sintomas = new sintomas();
if ($_POST) {
	$sintomas->id      = $_POST['id'];
	$sintomas->sintoma = $_POST['sintoma'];

	$sintomas->guardar();
	header("Location:sintomas.php");
} else if (isset($_GET['edit'])) {
	$sintomas->id = $_GET['edit'];
	$sintomas->cargar();

} else if (isset($_GET['del'])) {
	$sintomas->eliminar($_GET['del']);
}

?>

<style>
	#sintomas{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#matenimientos{
		background-color: #2D84BF;
	}
</style>



<fieldset>
	<legend>Mantenimiento de sintomas</legend>
	<form action="sintomas.php" method="post">
		<table class="unit-centered">
			<tr>

				<td><input type="hidden" name="id" value="<?php echo $sintomas->id?>"></td>
			</tr>
			<tr>
				<td>Sintoma</td>
				<td><input type="text" name="sintoma" value="<?php echo $sintomas->sintoma?>"></td>
			</tr>

			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="sintomas.php">Nuevo</td>
			</tr>

		</table>
	</form>

	<table class="table-bordered unit-centered table-hovered">

<?php
$sintomas = sintomas::listadoSintomas();
if (mysqli_num_rows($sintomas) < 1) {
	echo "<center><h4>Aún no se han agregado sintomas<h4></center>";
} else {
	echo "<thead>
									<tr>
										<th>ID</th>
										<th>sintoma</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
	while ($fila = mysqli_fetch_assoc($sintomas)) {
		echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['sintoma']}</td>

							<td><a href='sintomas.php?edit={$fila['id']}'>Editar</a> |
								<a onclick="return confirm('¿Seguro que desea borrar esta sintomas?');" href='sintomas.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>
CODIGO

		;

	}
}

?>
</table>

</fieldset>

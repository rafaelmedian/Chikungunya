<?php
include 'plantilla.php';
include 'menus.php';
include 'situacionlaboral_funciones.php';
$situacionlaboral = new situacionlaboral();
if ($_POST) {
	$situacionlaboral->id        = $_POST['id'];
	$situacionlaboral->situacion = $_POST['situacion'];

	$situacionlaboral->guardar();
	header("Location:situacionlaboral.php");
} else if (isset($_GET['edit'])) {
	$situacionlaboral->id = $_GET['edit'];
	$situacionlaboral->cargar();

} else if (isset($_GET['del'])) {
	$situacionlaboral->eliminar($_GET['del']);
}

?>

<style>
	#situacionlaboral{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#matenimientos{
		background-color: #2D84BF;
	}
</style>



<fieldset>
	<legend>Mantenimiento de situacionlaboral</legend>
	<form action="situacionlaboral.php" method="post">
		<table class="unit-centered">
			<tr>

				<td><input type="hidden" name="id" value="<?php echo $situacionlaboral->id?>"></td>
			</tr>
			<tr>
				<td>Situacion Laboral</td>
				<td><input type="text"  name="situacion" value="<?php echo $situacionlaboral->situacion?>"></td>
			</tr>

			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="situacionlaboral.php">Nuevo</td>
			</tr>

		</table>
	</form>


		<table class="table-bordered unit-centered table-hovered">

<?php
$situacionlaboral = situacionlaboral::listadoSituacionLaboral();
if (mysqli_num_rows($situacionlaboral) < 1) {
	echo "<center><h4>Aún no se han agregado situacionlaboral<h4></center>";
} else {
	echo "<thead>
										<tr>
											<th>ID</th>
											<th>situacion</th>
											<th>Edición</th>
										 </tr>
								 </thead>";
	while ($fila = mysqli_fetch_assoc($situacionlaboral)) {
		echo <<<CODIGO

							<tr>
								<td>{$fila['id']}</td>
								<td>{$fila['situacion']}</td>

								<td><a href='situacionlaboral.php?edit={$fila['id']}'>Editar</a> |
									<a onclick="return confirm('¿Seguro que desea borrar esta situacionlaboral?');" href='situacionlaboral.php?del={$fila['id']}'>Eliminar</a></td>
							</tr>
CODIGO

		;

	}
}

?>
</table>


</fieldset>

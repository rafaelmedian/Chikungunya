<?php
include_once 'sesion.php';
confirmarLogeo();
?>

<?php
include 'plantilla.php';
include 'menus.php';
include 'estadocivil_funciones.php';
$estadocivil = new estadocivil();
if ($_POST) {
	$estadocivil->id     = $_POST['id'];
	$estadocivil->estado = $_POST['estado'];
	$estadocivil->guardar();
	header("Location:estadocivil.php");
} else if (isset($_GET['edit'])) {
	$estadocivil->id = $_GET['edit'];
	$estadocivil->cargar();

} else if (isset($_GET['del'])) {
	$estadocivil->eliminar($_GET['del']);
}

?>

<style>
	#estadocivil{
		box-shadow: inset 0px -4px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
	#matenimientos{
		background-color: #2D84BF;
	}
</style>



<fieldset>
	<legend>Mantenimiento de Estado Civil</legend>
	<form action="estadocivil.php" method="post">
		<table class="unit-centered">
			<tr>

				<td><input type="hidden" name="id" value="<?php echo $estadocivil->id?>"></td>
			</tr>
			<tr>
				<td>Estado</td>
				<td><input type="text" name="estado" value="<?php echo $estadocivil->estado?>"></td>
			</tr>

			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="estadocivil.php">Nuevo</td>
			</tr>

		</table>
	</form>
	<table class="table-bordered unit-centered table-hovered">

<?php
$estadocivil = estadocivil::listadoEstadoCivil();
if (mysqli_num_rows($estadocivil) < 1) {
	echo "<center><h4>Aún no se han agregado estadocivil<h4></center>";
} else {
	echo "<thead>
									<tr>
										<th>ID</th>
										<th>estado</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
	while ($fila = mysqli_fetch_assoc($estadocivil)) {
		echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['estado']}</td>

							<td><a href='estadocivil.php?edit={$fila['id']}'>Editar</a> |
								<a onclick="return confirm('¿Seguro que desea borrar esta estadocivil?');" href='estadocivil.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>
CODIGO

		;

	}
}

?>
</table>


</fieldset>

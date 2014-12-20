<?php
include_once 'sesion.php';
log_in();
?>

<?php
include 'plantilla.php';
include 'provincias_funciones.php';
include 'tiposangre_funciones.php';
include 'estadocivil_funciones.php';
include 'situacionlaboral_funciones.php';
include 'sintomas_funciones.php';
include 'signozodiacal_funciones.php';
include 'casos_chikungunya_funciones.php';
include 'sintoma_detalle.php';

$casos_chikungunya = new casos_chikungunya();
if ($_POST) {
	$casos_chikungunya->id       = $_POST['id'];
	$casos_chikungunya->cedula   = $_POST['cedula'];
	$casos_chikungunya->nombre   = $_POST['nombre'];
	$casos_chikungunya->apellido = $_POST['apellido'];
	//$casos_chikungunya->sintoma = implode(",",$_POST['sintoma']);
	$casos_chikungunya->fecha     = $_POST['fecha'];
	$casos_chikungunya->sexo      = $_POST['sexo'];
	$casos_chikungunya->provincia = $_POST['provincia'];
	$casos_chikungunya->direccion = $_POST['direccion'];
	$casos_chikungunya->tipo      = $_POST['tipo'];
	$casos_chikungunya->estado    = $_POST['estado'];
	$casos_chikungunya->signo     = $_POST['signo'];
	$casos_chikungunya->situacion = $_POST['situacion'];
	$casos_chikungunya->guardar();

	$sintoma_detalle = new sintoma_detalle();
	/*var_dump($_POST);
	exit();*/
	if (isset($_POST['sintoma'])) {
		$sintoma = $_POST['sintoma'];
		$idCaso  = $casos_chikungunya->id;

		foreach ($sintoma as $indice => $k) {
			$id = $sintoma[$indice];

			$sintoma_detalle->id      = 0;
			$sintoma_detalle->sintoma = $id;
			$sintoma_detalle->caso    = $casos_chikungunya->id;
			echo $casos_chikungunya->id;

			$sintoma_detalle->guardar();
		}
	}

	//header("Location:index.php");
} else if (isset($_GET['edit'])) {
	$casos_chikungunya->id = $_GET['edit'];

	$casos_chikungunya->cargar();

} else if (isset($_GET['del'])) {
	$casos_chikungunya->eliminar($_GET['del']);
}

?>
<style>
	#inicio{
		box-shadow: inset 0px -8px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
</style>
<form action="index.php" method="post">
	<table id="formulario" >
		<tr>
			<!-- <td>ID</td> -->

			<td><input type="hidden" name="id" value="<?php echo $casos_chikungunya->id?>"></td>
		</tr>
		<tr>
			<td>Cedula</td>

			<td><input type="text" pattern=".{10,13}" required title="10 a 13 caracteres" name="cedula" value="<?php echo $casos_chikungunya->cedula?>"></td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td><input type="text" name="nombre" value="<?php echo $casos_chikungunya->nombre?>"></td>
		</tr>
		<tr>
			<td>Apellido</td>
			<td><input type="text" name="apellido" value="<?php echo $casos_chikungunya->apellido?>"></td>
		</tr>
		<tr>
			<td>Sintomas </td>
			<td>

<?php
$rs = sintomas::listadoSintomas();

while ($fila = mysqli_fetch_assoc($rs)) {

	$arreglo = array();
	$checked = '';
/*

foreach($arreglo as $activo){
if($activo == $fila['sintoma']){
$checked = 'checked';
}

}*/
	$listadoCheck = sintoma_detalle::listadoSintomasChiku($fila['id']);
	foreach ($listadoCheck as $check) {
		if ($check['id_sintoma'] == $fila['id']) {
			$checked = 'checked';
			break;
		}
	}

	//echo "<input {$checked} type='checkbox' name = 'sintoma[]'   value='{$fila['id']}'/> {$fila['sintoma']}";
	echo "<input {$checked} type='checkbox' name = 'sintoma[]'   value='{$fila['id']}'/> {$fila['sintoma']}";

	/*$sintoma_detalle = sintoma_detalle::listadoSintomasChiku($fila['id']);
	while($fila2 = mysqli_fetch_assoc($sintoma_detalle)){
	echo "<input  type='checkbox' name = 'sintoma[]'  value='{$fila['id']}' >{$fila['sintoma']}";*/
	//}

}

?>

			</td>
		</tr>
		<tr>
			<td>Fecha de Nacimiento</td>
			<td><input type="date" name="fecha" value="<?php echo $casos_chikungunya->fecha?>"></td>
		</tr>
		<tr>
			<td>Sexo</td>
			<td>
				<input type="radio" name="sexo" value="Masculino" <?php echo ($casos_chikungunya->sexo == 'Masculino')?'checked':'';?>>Masculino
				<input type="radio" name="sexo" value="Femenino" <?php echo ($casos_chikungunya->sexo == 'Femenino')?'checked':'';?>>Femenino

			</td>
		</tr>
		<tr>
			<td>Provincia</td>



			<td>
				<select name="provincia">

					<option value="" ></option>
<?php

$rs = provincias::listadoProvincias();
while ($fila = mysqli_fetch_assoc($rs)) {

	$selected = ($casos_chikungunya->provincia == $fila['nombre'])?'selected':'';
	echo "<option {$selected} value='{$fila['nombre']}'>{$fila['nombre']}</option>";
}

?>
				</select>
			</td>

		</tr>
		<tr>
			<td>Dirección</td>
			<td><input type="text" name="direccion" value="<?php echo $casos_chikungunya->direccion?>"></td>
		</tr>
		<tr>
			<td>Tipo de Sangre</td>
			<td>
				<select name="tipo">

					<option value="" ></option>
<?php

$rs = tiposangre::listadoTipoSangre();
while ($fila = mysqli_fetch_assoc($rs)) {
	$selected = ($casos_chikungunya->tipo == $fila['tipo'])?'selected':'';
	echo "<option {$selected} value='{$fila['tipo']}'>{$fila['tipo']}</option>";
}

?>
</select>
			</td>
		</tr>
		<tr>
			<td>Estado Civil</td>
			<td>
				<select name="estado">
					<option name=""></option>
<?php
$rs = estadocivil::listadoEstadoCivil();
while ($fila = mysqli_fetch_assoc($rs)) {
	$selected = ($casos_chikungunya->estado == $fila['estado'])?'selected':'';
	echo "<option {$selected} value='{$fila['estado']}'>{$fila['estado']}</option>";
}

?>
</select>
			</td>
		</tr>


		<tr>
			<td>Signo Zodiacal</td>
			<td>
				<select name="signo">
						<option value="" ></option>
<?php

$rs = signozodiacal::listadoSignoZodiacal();
while ($fila = mysqli_fetch_assoc($rs)) {
	$selected = ($casos_chikungunya->signo == $fila['nombre'])?'selected':'';
	echo "<option {$selected} value='{$fila['nombre']}'>{$fila['nombre']}</option>";
}

?>
</select>
			</td>
		</tr>



		<tr>
			<td>Situación Laboral</td>
			<td>
				<select name="situacion">
					<option name=""></option>
<?php
$rs = situacionlaboral::listadoSituacionLaboral();
while ($fila = mysqli_fetch_assoc($rs)) {
	$selected = ($casos_chikungunya->situacion == $fila['situacion'])?'selected':'';
	echo "<option {$selected} value='{$fila['situacion']}'>{$fila['situacion']}</option>";
}

?>
</select>

			</td>
		</tr>
		<tr>
			<tr>
				<td><input class=" btn btn-blue"type="submit" value="Enviar"></td>
				<td><a class="btn btn-green" href="index.php">Nuevo</td>
			</tr>
		</tr>
	</table>

</form>
	<h2>Listado de casos de Chikungunya</h2>
	<table class="table-bordered table-hovered table-container">

<?php
$casos_chikungunya = casos_chikungunya::listadoCasosChikungunya();
if (mysqli_num_rows($casos_chikungunya) < 1) {
	echo "<center><h4>Aún no se han agregado casos_chikungunya<h4></center>";
} else {
	echo "<thead>
									<tr>
										<th>ID</th>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Sintomas</th>
										<th>Fecha</th>
										<th>Sexo</th>
										<th>Provincia</th>
										<th>Direccion</th>
										<th>Tipo de Sangre</th>
										<th>Estado Civil</th>
										<th>Signo Zodiacal</th>
										<th>Signo Zidiacal</th>
										<th>Edición</th>
									 </tr>
							 </thead>";
	while ($fila = mysqli_fetch_assoc($casos_chikungunya)) {

		$listado = sintoma_detalle::listadoSintomasChiku($fila['id']);

		echo <<<CODIGO

						<tr>
							<td>{$fila['id']}</td>
							<td>{$fila['cedula']}</td>
							<td>{$fila['nombre']}</td>
							<td>{$fila['apellido']}</td>
							<td>
CODIGO

		;

		foreach ($listado as $sintomaD) {
			echo $sintomaD['sintoma'].",";
		}

		echo <<<CODIGO
							</td>
							<td>{$fila['fecha']}</td>
							<td>{$fila['sexo']}</td>
							<td>{$fila['provincia']}</td>
							<td>{$fila['direccion']}</td>
							<td>{$fila['tipo']}</td>
							<td>{$fila['estado']}</td>
							<td>{$fila['signo']}</td>
							<td>{$fila['situacion']}</td>

							<td><a href='index.php?edit={$fila['id']}'>Editar</a> |
								<a onclick="return confirm('¿Seguro que desea borrar esta casos_chikungunya?');" href='index.php?del={$fila['id']}'>Eliminar</a></td>
						</tr>
CODIGO

		;

	}
}

?>
</table>

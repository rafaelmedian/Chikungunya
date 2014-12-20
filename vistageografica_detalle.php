<?php
include 'plantilla.php';
include 'reportessintoma_funciones.php';
include 'reportesprovincias_funciones.php';
include 'sintoma_detalle.php';
?>
<style>
	#vistageografica{
		box-shadow: inset 0px -8px 0px 0px #1D547A;
		background-color: #2D84BF;
	}
</style>

<?php
$provincia = "";
if (isset($_GET['provincia'])) {
	$provincia = $_GET['provincia'];

} else {
	echo "<h3 align='center' style='color: red;'>Necesita seleccionar una provincia.</h3>";
}

$listaCasos = reportesprovincias::listardoCasos($provincia);
echo "<h2>Listado de afectados en {$provincia}</h2>";
$totalProvincia = reportesprovincias::totalProvincia($provincia);
while ($cantidadTotal = mysqli_fetch_assoc($totalProvincia)) {

	echo "<table class='table-bordered table-hovered table-container'>

						<thead>
							<th>Cedula</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Sintoma</th>
							<th>Fecha</th>
							<th>Sexo</th>
							<th>Provincia</th>
							<th>Dirección</th>
							<th>Tipo De Sangre</th>
							<th>Estado</th>
							<th>Signo</th>
							<th>Situación</th>


						</thead>";
	while ($otraFila = mysqli_fetch_assoc($listaCasos)) {

		echo <<<CODIGO
					<tbody>
						<tr>
							<tr>
							<td>{$otraFila['cedula']}</td>
							<td>{$otraFila['nombre']}</td>
							<td>{$otraFila['apellido']}</td>

							<td>
CODIGO

		;

		$listado = sintoma_detalle::listadoSintomasChiku($otraFila['id']);
		foreach ($listado as $sintomaD) {
			echo $sintomaD['sintoma'].",";
		}

		echo <<<CODIGO
							</td>
							<td>{$otraFila['fecha']}</td>
							<td>{$otraFila['sexo']}</td>
							<td>{$otraFila['provincia']}</td>
							<td>{$otraFila['direccion']}</td>
							<td>{$otraFila['tipo']}</td>
							<td>{$otraFila['estado']}</td>
							<td>{$otraFila['signo']}</td>
							<td>{$otraFila['situacion']}</td>

						</tr>

CODIGO

		;

	}
	echo <<<CODIGO
						<tr>
							<td colspan='11'>Total</td>
							<td>{$cantidadTotal['cantidad']}</td>
						</tr>
					</tbody>
				</table>
CODIGO

	;

}

?>



<?php

?>


<section>
	<article>

	</article>
</section>
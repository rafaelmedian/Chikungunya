<?php

class reportessintomomas {

	static function listadoAfectados() {
		$sql   = "SELECT count(id) cantidad FROM casos_chikungunya";
		$rs    = mysqli_query(conexion::obtenerInstancia(), $sql);
		$lista = array();
		while ($fila = mysqli_fetch_assoc($rs)) {
			if (mysqli_num_rows($rs) > 0) {
				$lista[] = $fila;
			}
		}
		return $lista;
	}

	static function cantidadSintomas() {

		$sql = "SELECT s.sintoma, count(sd.id) veces FROM sintomas s
						LEFT JOIN sintomas_detalle sd
						ON s.id = sd.id_sintoma
						GROUP BY s.sintoma
						order by veces desc
						";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

		return $rs;
	}

	/*static function cantidadSintomasArray() {

$sql = "SELECT  s.sintoma, count(sd.id) veces  FROM sintomas s
LEFT JOIN sintomas_detalle sd
ON s.id = sd.id_sintoma
GROUP BY s.sintoma
";
$rs    = mysqli_query(conexion::obtenerInstancia(), $sql);
$array = array();
if (mysqli_num_rows($rs) > 0) {
while ($fila = mysqli_fetch_assoc($rs)) {
$array[] = $fila;
}
}

return $array;
}*/

}

?>
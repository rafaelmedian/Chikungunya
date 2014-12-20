<?php

class reportesprovincias {

	static function listadoProvincias() {
		$sql = "SELECT nombre FROM provincias";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;

	}

	static function listardoCasos($provincia) {
		$sql = "SELECT * FROM casos_chikungunya where provincia = '$provincia' ";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);

		return $rs;

	}

	static function totalProvincia($provincia) {
		$sql = "SELECT count(provincia) cantidad FROM casos_chikungunya where provincia = '$provincia'";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

	static function listadoProvinciasLatLog() {
		$sql = "SELECT nombre, longitud, latitud FROM provincias";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;

	}

	static function provinciasMapa() {
		$info = array();
		$sql  = "SELECT COUNT(a.id) cantidad, b.nombre, latitud, longitud
	      FROM casos_chikungunya a
	      INNER JOIN provincias b on a.provincia = b.nombre
	      GROUP BY nombre";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		if (mysqli_num_rows($rs) > 0) {
			while ($fila = mysqli_fetch_assoc($rs)) {
				$info[] = $fila;
			}
		}

		return $info;
	}
}

?>
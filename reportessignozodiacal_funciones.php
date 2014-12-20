<?php

class reportessignozodiacal{

	
	static function listadoSignoZodiacal(){
		$sql = "SELECT nombre FROM signo_zodiacal";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		return $rs;


	}

	static function listardoCasos($signo){
		$sql = "SELECT * FROM casos_chikungunya where signo = '$signo' ";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

		return $rs;

	}

	static function totalSigno($signo){
		$sql = "SELECT count(signo) cantidad FROM casos_chikungunya where signo = '$signo'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

}

?>
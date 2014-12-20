<?php

class reporteTipo{

	
	static function listadoTipo(){
		$sql = "SELECT tipo FROM tipo_sangre";
		$rs = mysqli_query(conexion::obtenerInstancia(),$sql);
		
		return $rs;
		

	}

	static function listardoCasos($tipo){
		$sql = "SELECT * FROM casos_chikungunya where tipo = '$tipo' ";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

		return $rs;


	}

	static function totalTipo($tipo){
		$sql = "SELECT count(tipo) cantidad FROM casos_chikungunya where tipo = '$tipo'";
		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		
		return $rs;
	}

}

?>
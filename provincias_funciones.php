<?php
class provincias {

	private $id       = 0;
	private $nombre   = "";
	private $longitud = "";
	private $latitud  = "";

	function __get($atributo) {
		if (isset($this->$atributo)) {
			return $this->$atributo;
		} else {
			return "El atributo que intentas llamar no existe";

		}
	}

	function __set($atributo, $valor) {
		if (isset($this->$atributo)) {
			$this->$atributo = $valor;
		} else {
			echo "El atributo $atributo no existe <br/>";
		}
	}

	function __construct($id = 0) {
		$this->id = $this->id;
		$this->cargar();
		echo $this->longitud;
	}

	function guardar() {
		if ($this->id > 0) {
			$sql = "UPDATE `provincias`
					  SET
						`nombre` = '{$this->nombre}',
						`longitud` = '{$this->longitud}',
						`latitud` = '{$this->latitud}'
						 WHERE `id` =  '{$this->id}'";

			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
			if ($rs == false) {
				echo "<h3 style='color: red' align='center'>Error, este nombre está actualmente en uso.</h3>";
			} else {
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				header("Location:provincias.php");
			}

		} else {

			$sql = "INSERT INTO `provincias`
									(
									`nombre`,
									`longitud`,
									`latitud`
									)
									VALUES
									(
									'{$this->nombre}',
									'{$this->longitud}',
									'{$this->latitud}'
									)";

			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
			if ($rs == false) {
				echo "<h3 style='color: red' align='center'>Error, este nombre está actualmente en uso.</h3>";
			} else {
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				header("Location:provincias.php");
			}
		}
	}

	function eliminar($id) {
		$sql = "DELETE FROM provincias where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	static function listadoProvincias() {
		$sql = "SELECT * FROM provincias";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

	function cargar() {

		$sql = "SELECT * FROM provincias WHERE id = '{$this->id}'";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		if (mysqli_num_rows($rs) > 0) {
			$fila           = mysqli_fetch_assoc($rs);
			$this->id       = $fila['id'];
			$this->nombre   = $fila['nombre'];
			$this->longitud = $fila['longitud'];
			$this->latitud  = $fila['latitud'];

		}
	}

}

?>
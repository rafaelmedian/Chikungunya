<?php
class tiposangre {

	private $id   = 0;
	private $tipo = "";

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
	}

	function guardar() {
		if ($this->id > 0) {
			$sql = "UPDATE `tipo_sangre`
				  SET
					`tipo` = '{$this->tipo}'

					 WHERE `id` =  '{$this->id}'";

			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

			if ($rs == false) {
				echo "<h3 style='color: red' align='center'>Error, este nombre está actualmente en uso.</h3>";
			} else {
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				header("Location:tiposangre.php");
			}

		} else {

			$sql = "INSERT INTO `tipo_sangre`
									(
									`tipo`

									)
									VALUES
									(
									'{$this->tipo}'

									)";

			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);

			if ($rs == false) {
				echo "<h3 style='color: red' align='center'>Error, este nombre está actualmente en uso.</h3>";
			} else {
				$this->id = mysqli_insert_id(conexion::obtenerInstancia());
				header("Location:tiposangre.php");
			}
		}
	}

	function eliminar($id) {
		$sql = "DELETE FROM tipo_sangre where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	function cargar() {

		$sql = "SELECT * FROM tipo_sangre WHERE id = '{$this->id}'";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		if (mysqli_num_rows($rs) > 0) {
			$fila       = mysqli_fetch_assoc($rs);
			$this->id   = $fila['id'];
			$this->tipo = $fila['tipo'];

		}
	}

	static function listadoTipoSangre() {
		$sql = "SELECT * FROM tipo_sangre";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

}

?>
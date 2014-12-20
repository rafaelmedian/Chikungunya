<?php
class sintomas {
	private $id      = 0;
	private $sintoma = "";

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
			$sql = "UPDATE `sintomas`
					  SET
						`sintoma` = '{$this->sintoma}'

						 WHERE `id` =  '{$this->id}'";

			mysqli_query(conexion::obtenerInstancia(), $sql);
			$this->id = mysqli_insert_id(conexion::obtenerInstancia());

		} else {
			$sql = "INSERT INTO `sintomas`
									(
									`sintoma`

									)
									VALUES
									(
									'{$this->sintoma}'

									)";

			mysqli_query(conexion::obtenerInstancia(), $sql);
			$this->id = mysqli_insert_id(conexion::obtenerInstancia());
		}
	}

	function cargar() {

		$sql = "SELECT * FROM sintomas WHERE id = '{$this->id}'";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		if (mysqli_num_rows($rs) > 0) {
			$fila          = mysqli_fetch_assoc($rs);
			$this->id      = $fila['id'];
			$this->sintoma = $fila['sintoma'];

		}
	}

	static function listadoSintomas() {
		$sql = "SELECT * FROM sintomas";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

	function eliminar($id) {
		$sql = "DELETE FROM sintomas where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

}

?>
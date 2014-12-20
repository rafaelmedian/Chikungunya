<?php

class sintoma_detalle {
	private $id      = 0;
	private $sintoma = "";
	private $caso    = "";

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

	}

	function guardar() {

		$sql = "INSERT INTO `sintomas_detalle`
									(
									`id_caso`,
									`id_sintoma`
									)
									VALUES
									(
									'{$this->caso}',
									'{$this->sintoma}'
									)";

		mysqli_query(conexion::obtenerInstancia(), $sql);
		$this->id = mysqli_insert_id(conexion::obtenerInstancia());

	}

	static function listadoSintomasChiku($id) {
		$sql = "SELECT sintoma, id_caso, id_sintoma FROM sintomas_detalle a
				INNER JOIN sintomas b
				ON a.id_sintoma = b.id
				WHERE id_caso = {$id};
";

		$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

}

?>
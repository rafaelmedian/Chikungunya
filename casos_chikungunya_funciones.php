<?php
class casos_chikungunya {

	private $id       = 0;
	private $cedula   = "";
	private $nombre   = "";
	private $apellido = "";

	private $fecha     = "";
	private $sexo      = "";
	private $provincia = "";
	private $direccion = "";
	private $tipo      = "";
	private $estado    = "";
	private $signo     = "";
	private $situacion = "";

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
			$sql = "UPDATE `casos_chikungunya`
					  SET
						`cedula` = '{$this->cedula}',
						`nombre` = '{$this->nombre}',
						`apellido` = '{$this->apellido}',

						`fecha` = '{$this->fecha}',
						`sexo` = '{$this->sexo}',
						`provincia` = '{$this->provincia}',
						`direccion` = '{$this->direccion}',
						`tipo` = '{$this->tipo}',
						`estado` = '{$this->estado}',
						`signo` = '{$this->signo}',
						`situacion` = '{$this->situacion}'
						 WHERE `id` =  '{$this->id}'";

			mysqli_query(conexion::obtenerInstancia(), $sql);
			$this->id = mysqli_insert_id(conexion::obtenerInstancia());

		} else {
			$sql = "INSERT INTO `casos_chikungunya`
									(
									`cedula`,
									`nombre`,
									`apellido`,

									`fecha`,
									`sexo`,
									`provincia`,
									`direccion`,
									`tipo`,
									`estado`,
									`signo`,
									`situacion`
									)
									VALUES
									(
									'{$this->cedula}',
									'{$this->nombre}',
									'{$this->apellido}',

									'{$this->fecha}',
									'{$this->sexo}',
									'{$this->provincia}',
									'{$this->direccion}',
									'{$this->tipo}',
									'{$this->estado}',
									'{$this->signo}',
									'{$this->situacion}'
									)";

			$rs = mysqli_query(conexion::obtenerInstancia(), $sql);
			if ($rs == false) {
				echo "<h3 style='color: red' align='center'>Error, esta Cedula está actualmente en uso.</h3>";
			}
			$this->id = mysqli_insert_id(conexion::obtenerInstancia());
		}
	}

	function eliminar($id) {
		$sql = "DELETE FROM casos_chikungunya where id='$id'";
		mysqli_query(conexion::obtenerInstancia(), $sql);
	}

	function cargar() {

		$sql = "SELECT * FROM casos_chikungunya WHERE id = '{$this->id}'";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		if (mysqli_num_rows($rs) > 0) {
			$fila           = mysqli_fetch_assoc($rs);
			$this->id       = $fila['id'];
			$this->cedula   = $fila['cedula'];
			$this->nombre   = $fila['nombre'];
			$this->apellido = $fila['apellido'];
			/*$this->sintoma = $fila['sintoma'];*/
			$this->fecha     = $fila['fecha'];
			$this->sexo      = $fila['sexo'];
			$this->provincia = $fila['provincia'];
			$this->direccion = $fila['direccion'];
			$this->tipo      = $fila['tipo'];
			$this->estado    = $fila['estado'];
			$this->signo     = $fila['signo'];
			$this->situacion = $fila['situacion'];

		}
	}

	static function listadoCasosChikungunya() {
		$sql = "SELECT * FROM casos_chikungunya";
		$rs  = mysqli_query(conexion::obtenerInstancia(), $sql);
		return $rs;
	}

}
?>
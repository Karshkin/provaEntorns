<?php

class Database {
	private $conexion;

	private function conectar() {
		$this->conexion = mysqli_connect("localhost", "root", "root", "cursos") or die("Error al conectar");
		mysqli_set_charset($this->conexion, "utf8");
	}

	private function consulta($sql) {
		$this->conectar();
		return mysqli_query($this->conexion, $sql);
	}

	public function seleccionarDatos($idProfesor) {
		$sql = "SELECT * FROM profesores WHERE id = '$idProfesor'";
		$resultado = $this->consulta($sql);
		$fila = mysqli_fetch_assoc($resultado);
		return $fila;
	}

	public function tabular() {
		$sql = "SELECT * FROM profesores";
		$resultado = $this->consulta($sql);
		$tabla = '<table border = "2">';
		while($fila = mysqli_fetch_array($resultado)) {
			$tabla .= '<tr>';
			$tabla .= '<td>'.$fila["id"].'</td>';
			$tabla .= '<td>'.$fila["nombre"].'</td>';
			$tabla .= '<td>'.$fila["apellidos"].'</td>';
			$tabla .= '<td>'.$fila["edad"].'</td>';
			$tabla .= '<td>'.$fila["materia"].'</td>';
			$tabla .= '<td><a href = "index.php?action=borrar&id='.$fila["id"].'">Borrar</a></td>';
			$tabla .= '<td><a href = "index.php?action=modificarse&id='.$fila["id"].'">Modificar</a></td>';
			$tabla .= '</tr>';
		}
		$tabla .= '</table>';
		$this->desconectar();
		return $tabla;
	}

	public function editarFila($newName, $newApellido, $newMateria, $newEdad, $idProfesor) {
		$sql = "UPDATE profesores SET nombre='$newName', apellidos='$newApellido', edad='$newEdad', materia='$newMateria' WHERE  id='$idProfesor'";
		if($this->consulta($sql)) {
			return true;
		}
		else {
			return false;
		}
	}

	public function eliminarFila($idProfesor) {
		$sql = "DELETE FROM profesores WHERE  id='$idProfesor'";
		if($this->consulta($sql)) {
			return true;
		}
		else {
			return false;
		}
	}

	public function desconectar() {
		mysqli_close($this->conexion);
	}
}

?>
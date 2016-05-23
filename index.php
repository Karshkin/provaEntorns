<?php
include_once "DB.php";

$datos = new Database();

if(isset($_GET) && !empty($_GET)) {
	switch($_GET["action"]) {
		case "borrar":
			if($datos->eliminarFila($_GET["id"])) {
				echo "Registro eliminado<br>";
				echo 'Volver al <a href = "index.php">Listado profesores</a>';
			}
			else {
				echo "error al eliminar profesor";
				echo 'Volver al <a href = "index.php">Listado profesores</a>';
			}
			break;
		case "modificarse":
				$profesor = $datos->selecccionarDatos($_GET["id"]);
				include "modificarUsuario.php";
				echo 'Volver al <a href = "index.php">Listado profesores</a>';
			break;
		case "modificar":
			if($datos->editarFila($_GET["name"], $_GET["apellido"], $_GET["materia"], $_GET["edad"], $_GET["id"])) {
				echo "Editado con exito<br>";
				echo 'Volver al <a href = "index.php">Listado profesores</a>';
			}
			break;
		default:
			header('Location: index.php');
	}
}
else {
	echo $datos->tabular();
}
?>
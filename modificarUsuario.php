<?php
echo '
<form method = "get" action = "index.php">
	Nombre: <input type="text" name = "name" value = "'.$profesor["nombre"].'"><br>
	Apellidos: <input type="text" name = "apellido" value = "'.$profesor["apellidos"].'"><br>
	Edad: <input type="text" name = "edad" value = "'.$profesor["edad"].'"><br>
	Materia: <input type="text" name = "materia" value = "'.$profesor["materia"].'"><br>
	<input type = "hidden" name = "id" value = "'.$profesor["id"].'">
	<input type = "hidden" name = "action" value = "modificar">
	<input type = "submit" value = "Guardar Cambios">
</form>
';

?>
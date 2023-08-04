<?php
include "..\consultas\conexion.php";
function listarimgpromos(){
	$conn=conectarse();
	$sql= mysqli_query($conn,"SELECT * FROM PROMOCIONES");
	$res= mysqli_num_rows($sql);

	if ($res>0) {
		// code...
		return $sql;
	}else {
		$res="<p> No hay registros </p>";
		return $res;
	}

}

?>
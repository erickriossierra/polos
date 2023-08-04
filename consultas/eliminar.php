<?php
include_once( "conexion.php");
/*** BAJA DE DATOS EN TABLA USUARIOS ***/
function eliminarusuario($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);

	$query="DELETE FROM usuarios WHERE iduser=$id";
	$res=mysqli_query($conn,$query);

	if ($res) {
		$msg="Baja de usuario correcta";
		$res=true;
	}else{
		$msg="Fallo, registro no quitado";
		$res=false;
	}

	return array ($res,$msg);

}

/*** BAJA DE DATOS EN TABLA STOCK ***/
function eliminarstock($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);

	$query="DELETE FROM stocks WHERE idstock=$id";;
	$res=mysqli_query($conn,$query);

	if ($res) {
		$msg="Baja de stock correcta";
		$res=true;
	}else{
		$msg="Fallo, registro no quitado";
		$res=false;
	}	
	
	return array ($res,$msg);
}
/*** BAJA DE DATOS EN TABLA UNIVERSIDADES ***/
function eliminaruniversidad($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);

	$sql="SELECT * FROM facultades f INNER JOIN universidades u ON f.iduniversidad = u.iduniversidad WHERE f.iduniversidad=$id ";
	$res=mysqli_query($conn,$sql);
	$res=mysqli_num_rows($res);

	if ($res>0) {
		$msg="El registro de la universidad, tiene asignado al menos una facultad";
		$res=false;

	}else{
		$query="DELETE FROM universidades WHERE iduniversidad=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Baja de universidad correcta";
			$res=true;
		}else{
			$msg="Fallo, registro no quitado";
			$res=false;
		}
	}
	return array ($res,$msg);

}
/*** BAJA DE DATOS EN TABLA CARRERAS ***/
function eliminarcarrera($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);

	$query="DELETE FROM carreras WHERE idcarrera=$id";
	$res=mysqli_query($conn,$query);

	if ($res) {
		$msg="Baja de universidad correcta";
		$res=true;
	}else{
		$msg="Fallo, registro no quitado";
		$res=false;
	}

	return array ($res,$msg);

}

/*** BAJA DE DATOS EN TABLA FACULTADES ***/
function eliminarfacultad($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);

	$sql="SELECT * FROM carreras c INNER JOIN facultades f ON c.idfacultad = f.idfacultad WHERE f.idfacultad=$id ";
	$res=mysqli_query($conn,$sql);
	$res=mysqli_num_rows($res);

	if ($res>0) {
		$msg="El registro de la facultad, tiene asignado al menos una carrera";
		$res=false;
		//exit;
	} else {
		// code...
		$query="DELETE FROM facultades WHERE idfacultad=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Baja de universidad correcta";
			$res=true;
		}else{
			$msg="Fallo, registro no quitado";
			$res=false;
		}
	}
	return array ($res,$msg);
}

?>
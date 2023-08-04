<?php
include "eliminar.php";
/*** LISTADO DE PARAMETROS PARA BAJA USAURIOS ***/
function bajauser() {
	if(isset($_GET) && !empty($_GET)){
		$id=$_GET['id'];
		

		$array =eliminarusuario($id);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos eliminados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron eliminar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}

/*** LISTADO DE PARAMETROS PARA BAJA STOCK ***/
function bajastock() {
	if(isset($_GET) && !empty($_GET)){
		$id=$_GET['id'];
		
		$array =eliminarstock($id);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos eliminados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron eliminar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}
/*** LISTADO DE PARAMETROS PARA BAJA UNIVERSIDADES ***/
function bajauniversidad() {
	if(isset($_GET) && !empty($_GET)){
		$id=$_GET['id'];
		

		$array =eliminaruniversidad($id);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos eliminados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron eliminar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}
/*** LISTADO DE PARAMETROS PARA BAJA CARRERAS ***/
function bajacarrera() {
	if(isset($_GET) && !empty($_GET)){
		$id=$_GET['id'];
		

		$array =eliminarcarrera($id);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos eliminados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron eliminar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}
/*** LISTADO DE PARAMETROS PARA BAJA FACULTAD ***/
function bajafacultad() {
	if(isset($_GET) && !empty($_GET)){
		$id=$_GET['id'];
		

		$array =eliminarfacultad($id);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos eliminados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron eliminar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}


?>
<?php
include "actualizar.php";
/*
function altavideo(){
	if(isset($_POST) && !empty($_POST)){
		$sistema = $_POST['sistema'];
		$programa = $_POST['programa'];
		$vid= $_FILES['vid'];
		$tipo =$_POST['tipo'];
		//$fecha = $_POST['fecha'];

		$array =createvideo($sistema, $programa, $tipo, $vid);


		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos insertados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron insertar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";	

	}	
}*/
/*** LISTADO DE PARAMETROS PARA USAURIOS ***/
function modificauser() {
	if(isset($_POST) && !empty($_POST)){
		$nombre=$_POST['nombre'];
		$apellidop=$_POST['apellidop'];
		$apellidom=$_POST['apellidom'];
		$id=$_POST['id'];
		$rol=$_POST['rol'];
		$sexo=$_POST['sexo'];
		$edad=$_POST['edad'];
		$carrera=$_POST['carrera'];
		$cel=$_POST['cel'];
		$correo=$_POST['correo'];
		

		$array =actualizarusuario($carrera, $rol, $sexo, $edad,$cel, $nombre,$apellidop,$apellidom,$id,$correo);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos actalizados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron actualizar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}

/*** LISTADO DE PARAMETROS PARA STOCK ***/
function modificastock() {
	if(isset($_POST) && !empty($_POST)){
		$playera=$_POST['playera'];
		$color=$_POST['color'];
		$talla=$_POST['talla'];
		$corte=$_POST['corte'];
		$stock=$_POST['stock'];
		$costo=$_POST['costo'];
		$id=$_GET['id'];
		

		$array =actualizarstock($id,$playera,$color,$talla,$corte,$stock,$costo);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos actalizados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron actualizar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}
/*** LISTADO DE PARAMETROS PARA CARRERA ***/
function modificacarrera() {
	if(isset($_POST) && !empty($_POST)){
		$facultad=$_POST['facultad'];
		$carrera=$_POST['carrera'];
		$corto=$_POST['corto'];
		$iniciales=$_POST['iniciales'];
		
		$carrera=ucwords($carrera);
		$corto=ucfirst($corto);
		$iniciales=strtoupper($iniciales);

		$id=$_GET['id'];
		

		$array =actualizarcarrera($id,$facultad,$carrera,$corto,$iniciales );

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos actalizados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron actualizar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}
/*** LISTADO DE PARAMETROS PARA UNIVERSIDAD ***/
function modificauniversidad() {
	if(isset($_POST) && !empty($_POST)){
		$universidad=$_POST['universidad'];
		$corto=$_POST['corto'];
		$iniciales=$_POST['iniciales'];
		
		$universidad=ucwords($universidad);
		$corto=ucfirst($corto);
		$iniciales=strtoupper($iniciales);

		$id=$_GET['id'];
		

		$array =actualizaruniversidad($id,$universidad,$corto,$iniciales );

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos actalizados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron actualizar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}
/*** LISTADO DE PARAMETROS PARA UNIVERSIDAD ***/
function modificafacultad() {
	if(isset($_POST) && !empty($_POST)){
		$universidad=$_POST['universidad'];
		$facultad=$_POST['facultad'];
		$corto=$_POST['corto'];
		$iniciales=$_POST['iniciales'];
		
		$facultad=ucwords($facultad);
		$corto=ucfirst($corto);
		$iniciales=strtoupper($iniciales);

		$id=$_GET['id'];
		

		$array =actualizarfacultad($id,$universidad,$facultad,$corto,$iniciales );

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos actalizados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron actualizar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}
/** LISTADO DE PARAMETROS PARA PONCHADOS **/
function modificacxp(){
		if(isset($_POST) && !empty($_POST)){
		$estatus=$_POST['estatus'];

		$id=$_GET['id'];
		

		$array =actualizarcxp($id,$estatus );

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos actalizados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron actualizar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";
	}
}
/** LISTADO DE PARAMETROS PARA PEDIDOS **/
function modificaentrega(){
		if(isset($_POST) && !empty($_POST)){
		$estatus=$_POST['estatus'];

		$id=$_GET['id'];
		

		$array =actualizarentrega($id,$estatus );

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos actalizados con éxito. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron actualizar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";
	}
}

?>
<?php
include "crear.php";
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
function altauser() {
	if(isset($_POST) && !empty($_POST)){
		$nombre=$_POST['nombre'];
		$apellidop=$_POST['apellidop'];
		$apellidom=$_POST['apellidom'];
		$correo=$_POST['correo'];
		$rol=$_POST['rol'];
		$sexo=$_POST['sexo'];
		$edad=$_POST['edad'];
		$carrera=$_POST['carrera'];
		$cel=$_POST['cel'];
		

		$array =crearusuario($carrera, $rol, $sexo, $edad,$cel, $nombre,$apellidop,$apellidom,$correo);

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
}
function altacliente() {
	if(isset($_POST) && !empty($_POST)){
		$nombre=$_POST['nombre'];
		$apellidop=$_POST['apellidop'];
		$apellidom=$_POST['apellidom'];
		$correo=$_POST['correo'];
		$rol=2;//$_POST['rol'];
		$sexo=$_POST['sexo'];
		$edad=$_POST['edad'];
		$carrera=$_POST['carrera'];
		$cel=$_POST['cel'];
		

		$array =crearusuario($carrera, $rol, $sexo, $edad,$cel, $nombre,$apellidop,$apellidom,$correo);

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
}
/*** LISTADO DE PARAMETROS PARA STOCK ***/
function altastock() {
	if(isset($_POST) && !empty($_POST)){
		$playera=$_POST['playera'];
		$color=$_POST['color'];
		$talla=$_POST['talla'];
		$corte=$_POST['corte'];
		$stock=$_POST['stock'];
		$costo=$_POST['costo'];
		$entrada=$_POST['entrada'];

		$array =crearstock($playera, $color, $talla, $corte, $stock,$costo,$entrada);

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
}
/**** LISTADO DE PARAMETROS PARA PEDIDOS****/
function altaprepedido(){
	if(isset($_POST) && !empty($_POST)){
		$playera=$_POST['playera'];
		$color=$_POST['color'];
		$talla=$_POST['talla'];
		$corte=$_POST['corte'];
		$cantidad=$_POST['cantidad'];
		$entrega=$_POST['entrega'];
		$vendedor=$_POST['vendedor'];
		$cliente=$_POST['cliente'];
		$carrera=$_POST['carrera'];
		$pedido=$_POST['pedido'];

		$array =crearprepedido($playera, $color, $talla, $corte, $cantidad,$entrega, $vendedor,$cliente,$carrera,$pedido);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos insertados a la tabla Playeras. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron insertar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}

function altapedido(){
	if(isset($_POST) && !empty($_POST)){
		
		$pedido=$_POST['pedido'];

		$array =crearpedido($pedido);

		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos insertados a la tabla Playeras. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron insertar los datos. " .$msg;
			$class='"alert alert-danger"';
		}

		echo "<div class=".$class.">";
	   	echo $message;
		echo "</div>";


	}
}

/*******LISTADO DE PARAMETROS PARA CARRERAS*********/
function altacarrera(){
	if(isset($_POST) && !empty($_POST)){
		$carrera=$_POST['carrera'];
		$iniciales=$_POST['iniciales'];
		$corto=$_POST['corto'];
		$facultad=$_POST['facultad'];
		
		$carrera=ucwords($carrera);
		$corto=ucfirst($corto);
		$iniciales=strtoupper($iniciales);

		$array =crearcarrera($carrera, $iniciales, $corto, $facultad);

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
}
function altafacultad(){
	if(isset($_POST) && !empty($_POST)){
		$iniciales=$_POST['iniciales'];
		$corto=$_POST['corto'];
		$facultad=$_POST['facultad'];
		$universidad=$_POST['universidad'];
		
		$facultad=ucwords($facultad);
		$corto=ucfirst($corto);
		$iniciales=strtoupper($iniciales);

		$array =crearfacultad( $universidad,$iniciales, $corto, $facultad);

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
}
function altauniversidad(){
	if(isset($_POST) && !empty($_POST)){
		$iniciales=$_POST['iniciales'];
		$corto=$_POST['corto'];
		$universidad=$_POST['universidad'];
		
		$universidad=ucwords($universidad);
		$corto=ucfirst($corto);
		$iniciales=strtoupper($iniciales);

		$array =crearuniversidad( $iniciales, $corto, $universidad);

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
}

function altapago(){
	if(isset($_POST) && !empty($_POST)){
		$monto=$_POST['monto'];
		$pedido=$_POST['pedido'];
		$fecha=$_POST['fecha'];
		if (isset($_FILES['dataimg'])&& !empty($_FILES['dataimg'])) {
			// code...
			$img=$_FILES['dataimg'];
		} else {
			// code...
			$img="Efectivo.jpeg";
		}

		$array =crearpago( $pedido, $monto, $fecha, $img);

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
}

?>
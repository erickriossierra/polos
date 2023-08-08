<?php
require_once '../consultas/conexion.php'; //libreria de conexion a la base
require_once '../consultas/eliminar.php';
$id = filter_input(INPUT_POST, 'id'); //obtenemos el parametro que viene de ajax
	if($id != ''){ //verificamos nuevamente que sea una opcion valida
		/*
	  	$conn =conectarse();
	  	if(!$conn){
	    	die("<br/>Sin conexi&oacute;n.");
	  	}
	  	$id=mysqli_escape_string($conn,$id);
		$query="DELETE FROM tareastemp WHERE idtarea=$id";
		$res=mysqli_query($conn,$query);  
		*/
		$array[$res,$msg]=eliminarplayera($id);
		if ($res) {
			// code...
			//$res=true;
			//$msg="Tarea eliminada";
			$message="Registro eliminado. ".$msg;
			$class='alert alert-success';
			//$img='..\..\files\byte\ok.gif';
		} else {
			// code...
			//$res=false;
			//$msg="Error no se elimino la tarea";
			$message="No se pudo eliminar. ".$msg;
			$class='alert alert-danger';
			//$img='..\..\files\byte\no.gif';
		}	
	}

?>

		<div id='div_msg' class='<?php  echo $class;?>'>
			<img class="img_crear" src='<?php // echo $img;?>'>
			<p class="p_crear"><?php echo $message;?></p>
		</div>
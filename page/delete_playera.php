<?php
require_once '../consultas/eliminar.php';
$id = filter_input(INPUT_POST, 'id'); //obtenemos el parametro que viene de ajax
	if($id != ''){ //verificamos nuevamente que sea una opcion valida
	
		$array=eliminarplayera($id);
		[$res,$msg]=$array;
		if ($res) {
			// code...
			
			$message="Registro eliminado. ".$msg;
			$class='alert alert-success';
			//$img='..\..\files\byte\ok.gif';
		} else {
			// code...
			
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
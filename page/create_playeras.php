<?php
require_once '../consultas/crear.php'; //libreria de conexion a la base
//$id = filter_input(INPUT_POST, 'id'); //obtenemos el parametro que viene de ajax
$folio= filter_input(INPUT_POST, 'folio');
$playera= filter_input(INPUT_POST, 'playera');
$cant= filter_input(INPUT_POST, 'cant');
$color= filter_input(INPUT_POST, 'color');
$talla= filter_input(INPUT_POST, 'talla');
$corte= filter_input(INPUT_POST, 'corte');
$carrera= filter_input(INPUT_POST, 'carrera');
$entrega= filter_input(INPUT_POST, 'entrega');
$vendedor= filter_input(INPUT_POST, 'vendedor');
$cliente= filter_input(INPUT_POST, 'cliente');

	if($folio != ''){ //verificamos nuevamente que sea una opcion valida
		$array=crearprepedido($playera, $color, $talla, $corte, $cant,$entrega, $vendedor,$cliente,$carrera,$folio);
		[$res,$msg]=$array;
		
		if($res){
			$message= "Datos insertados a la tabla Playeras. ".$msg;
			$class='"alert alert-success"';
		}else{
			$message="No se pudieron insertar los datos. " .$msg;
			$class='"alert alert-danger"';
		}
			
	}else{
		$res=false;
		$msg="Error, no se asigno folio válido.";

	}
	if($res==false){ 
		$message="No se pudo crear. ".$msg;
		$class='alert alert-danger';
		//$img='..\..\files\byte\no.gif';
	}else{
		$message="Registro creado. ".$msg;
		$class='alert alert-success';
		//$img='..\..\files\byte\ok.gif';
	} 
?>
		
		<div id='div_msg' class='<?php  echo $class;?>'>
			<img class="img_crear" src='<?php // echo $img;?>'>
			<p class="p_crear"><?php echo $message;?></p>
		</div>
		
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
		/*
	  	$conn =conectarse();
	  	if(!$conn){
	    	die("<br/>Sin conexi&oacute;n.");
	  	}
	  	$folio=mysqli_escape_string($conn,$folio);
	  	$playera=mysqli_escape_string($conn,$playera);
	  	$cant=mysqli_escape_string($conn,$cant);
	  	$color=mysqli_escape_string($conn,$color);
	  	$talla=mysqli_escape_string($conn,$talla);
	  	$corte=mysqli_escape_string($conn,$corte);
	  	$carrera=mysqli_escape_string($conn,$carrera);
	  	$entrega=mysqli_escape_string($conn,$entrega);

		$sql=mysqli_query($conn,"SELECT * FROM tareastemp WHERE idreporte='$folio' AND descripcion='$desc' AND fecha_ini='$fecha_ini' AND entrada='$entrada'");
		$row=MYSQLi_NUM_ROWS($sql);
		if ($row!=0) {
			// code...
			$res=false;
			$msg="La tarea ya existe, revisar tabla.";
		} else {
			// code...
			if ($fecha_ini=="" OR $fecha_fin=="") {
				// code...
				$res=false;
				$msg="Error, no se asigno fecha válida.";
			}else{
				if ($entrada=="" OR $salida=="") {
					// code...
					$res=false;
					$msg="Error, no se asigno hora válida.";
				} else {
					// code...
					if ($desc=="") {
						// code...
						$res=false;
						$msg="Error, no se desgloso la tarea.";
					} else {
						// code...
						$query="INSERT INTO tareastemp values ('', '$folio', $horas, '$fecha_ini', '$fecha_fin', '$entrada', '$salida', '$desc')";
						$res=mysqli_query($conn,$query);
						if ($res) {
							// code...
							$res=true;
							$msg="Alta de tarea exitoso";
						} else {
							// code...
							$res=false;
							$msg="Error al crear la tarea.";
						}
					}
				}	
			}	
		}	*/		
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
		
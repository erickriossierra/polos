<?php
include_once( "conexion.php");
/*** UPDATE DE DATOS EN TABLA USUARIOS ***/
function actualizarusuario($carrera, $rol, $sexo, $edad, $cel, $nombre,$apellidop,$apellidom,$id,$correo){
	$conn=conectarse();
	$carrera=mysqli_escape_string($conn,$carrera);
	$rol=mysqli_escape_string($conn,$rol);
	$sexo=mysqli_escape_string($conn,$sexo);
	$edad=mysqli_escape_string($conn,$edad);
	$cel=mysqli_escape_string($conn,$cel);
	$nombre=mysqli_escape_string($conn,$nombre);
	$apellidop=mysqli_escape_string($conn,$apellidop);
	$apellidom=mysqli_escape_string($conn,$apellidom);
	$id=mysqli_escape_string($conn,$id);

	$query="UPDATE usuarios SET idrol=$rol,`idcarrera`=$carrera,`idsexo`=$sexo,`edad`=$edad,`cel`=$cel,`nombre`='$nombre',`apellidop`='$apellidop',`apellidom`='$apellidom' WHERE iduser=$id ";
	$res=mysqli_query($conn,$query);

	if ($res) {
		$msg="Usuario: ".$correo.", modificado correctamente";
		$res=true;
	}else{
		$msg="Fallo, registro no modificado";
		$res=false;
	}

	return array ($res,$msg);

}

/*** UPDATE DE DATOS EN TABLA STOCK ***/
function actualizarstock($id,$playera, $color, $talla, $corte, $stock,$costo){
	$conn=conectarse();
	$playera=mysqli_escape_string($conn,$playera);
	$color=mysqli_escape_string($conn,$color);
	$talla=mysqli_escape_string($conn,$talla);
	$corte=mysqli_escape_string($conn,$corte);
	$stock=mysqli_escape_string($conn,$stock);
	$costo=mysqli_escape_string($conn,$costo);
	$id=mysqli_escape_string($conn,$id);

	$query="UPDATE stocks SET stock=$stock, costo=$costo,idplayera=$playera, idcorte=$corte, idtalla=$talla, idcolor=$color	where idstock=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Actualización de stock  id: ".$id." correctamente. ";
			$res=true;
		}else{
			$msg="Fallo, registro no actualizado.";
			$res=false;
		}	
	return array ($res,$msg);
}

/*** UPDATE DE DATOS EN TABLA CARRERA ***/
function actualizarcarrera($id,$facultad, $carrera, $corto, $iniciales){
	$conn=conectarse();
	$facultad=mysqli_escape_string($conn,$facultad);
	$carrera=mysqli_escape_string($conn,$carrera);
	$corto=mysqli_escape_string($conn,$corto);
	$iniciales=mysqli_escape_string($conn,$iniciales);
	
	$id=mysqli_escape_string($conn,$id);

	$query="UPDATE carreras SET `nombre`='$carrera',`idfacultad`='$facultad',`nombre_corto`='$corto',`iniciales`='$iniciales' WHERE idcarrera=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Actualización de carrera  id: ".$id." correctamente. ";
			$res=true;
		}else{
			$msg="Fallo, registro no actualizado.";
			$res=false;
		}	
	return array ($res,$msg);
}
/*** UPDATE DE DATOS EN TABLA UNIVERSIDADES ***/
function actualizaruniversidad($id, $universidad, $corto, $iniciales){
	$conn=conectarse();
	$universidad=mysqli_escape_string($conn,$universidad);
	$corto=mysqli_escape_string($conn,$corto);
	$iniciales=mysqli_escape_string($conn,$iniciales);
	$id=mysqli_escape_string($conn,$id);

	$query="UPDATE universidades SET `nombre_universidad`='$universidad',`nombre_comun`='$corto',`siglas`='$iniciales' WHERE iduniversidad=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Actualización de universidad id: ".$id." correctamente. ";
			$res=true;
		}else{
			$msg="Fallo, registro no actualizado.";
			$res=false;
		}	
	return array ($res,$msg);
}
/*** UPDATE DE DATOS EN TABLA UNIVERSIDADES ***/
function actualizarfacultad($id, $universidad,$facultad, $corto, $iniciales){
	$conn=conectarse();
	$universidad=mysqli_escape_string($conn,$universidad);
	$facultad=mysqli_escape_string($conn,$facultad);
	$corto=mysqli_escape_string($conn,$corto);
	$iniciales=mysqli_escape_string($conn,$iniciales);
	$id=mysqli_escape_string($conn,$id);

	$query="UPDATE facultades SET iduniversidad=$universidad, `nombre_facultad`='$facultad',`nombre_corto`='$corto',`iniciales`='$iniciales' WHERE idfacultad=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Actualización de facultad id: ".$id." correctamente. ";
			$res=true;
		}else{
			$msg="Fallo, registro no actualizado.";
			$res=false;
		}	
	return array ($res,$msg);
}
/*** UPDATE DE DATOS EN TABLA PEDIDOS ESTATUS PONCHADO ***/
function actualizarcxp($id, $estatus){
	$conn=conectarse();
	$estatus=mysqli_escape_string($conn,$estatus);
	$id=mysqli_escape_string($conn,$id);
	$sql="SELECT * FROM clientexplayeras where idclixplay=$id AND idestatus=$estatus";
//print_r($sql);
	$res=mysqli_query($conn,$sql);
	$res=mysqli_num_rows($res);

	if ($res>0) {
		// code...
		$msg="Fallo, registro no actualizado. Se coloco el mismo estatus";
		$res=false;
	} else {
		// code...
		$query="UPDATE clientexplayeras SET idestatus=$estatus WHERE idclixplay=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Actualización de estatus de ponchado correctamente. ";
			$res=true;
		}else{
			$msg="Fallo, registro no actualizado.";
			$res=false;
		}	
	}
	return array ($res,$msg);
}

function actualizarentrega($id, $estatus){
	$conn=conectarse();
	$estatus=mysqli_escape_string($conn,$estatus);
	$id=mysqli_escape_string($conn,$id);
	$sql="SELECT * FROM pedidos where idpedido=$id AND idestatus=$estatus";
//print_r($sql);
	$res=$data=mysqli_query($conn,$sql);
	$res=mysqli_num_rows($res);

	if ($res>0) {
		// code...
		$msg="Fallo, registro no actualizado. Se coloco el mismo estatus";
		$res=false;
	} else {
		$sql="SELECT * FROM pedidos p INNER JOIN clientexplayeras cxp ON p.idpedido=cxp.idpedido where p.idpedido=$id AND cxp.idestatus<>5";
	//print_r($sql);
		$res=mysqli_query($conn,$sql);
		$res=mysqli_num_rows($res);
		if ($res>0) {
			// code...
			$msg="Fallo, registro no actualizado. Hay playeras sin terminar. Revisar información.";
			$res=false;
		} else {
			// code...
			$sql="SELECT * FROM pedidos p INNER JOIN clientexplayeras cxp ON p.idpedido=cxp.idpedido where p.idpedido=$id AND (idestatuspago =8 OR idestatuspago=9)";
	//print_r($estatus);
			$res=mysqli_query($conn,$sql);
			$res=mysqli_num_rows($res);
			if ($res>0 and $estatus=='6' ) {
			// code...
				$msg="Fallo, registro no actualizado. Aún no se ha pagado el pedido. Favor de registrar el pago";
				$res=false;
			} else {
				// code...
				$query="UPDATE pedidos SET idestatus=$estatus WHERE idpedido=$id";
				$res=mysqli_query($conn,$query);

				if ($res) {
					$msg="Actualización de estatus de entrega correctamente. ";
					$res=true;
				}else{
					$msg="Fallo, registro no actualizado.";
					$res=false;
				}
			}	
		}	
	}
	return array ($res,$msg);
}

?>
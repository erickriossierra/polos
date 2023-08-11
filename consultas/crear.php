<?php
include_once( "conexion.php");
/*** ALTA DE DATOS EN TABLA USUARIOS ***/
function crearusuario($carrera, $rol, $sexo, $edad, $cel, $nombre,$apellidop,$apellidom,$correo){
	$conn=conectarse();
	$carrera=mysqli_escape_string($conn,$carrera);
	$rol=mysqli_escape_string($conn,$rol);
	$sexo=mysqli_escape_string($conn,$sexo);
	$edad=mysqli_escape_string($conn,$edad);
	$cel=mysqli_escape_string($conn,$cel);
	$nombre=mysqli_escape_string($conn,$nombre);
	$apellidop=mysqli_escape_string($conn,$apellidop);
	$apellidom=mysqli_escape_string($conn,$apellidom);
	$correo=mysqli_escape_string($conn,$correo);

	$data=$res=mysqli_query($conn,"SELECT * FROM usuarios where correo='$correo'");
	$res=mysqli_num_rows($res);

	if ($res>0) {
		$row=mysqli_fetch_object($data);
		$correo=$row->correo;

		$msg="El correo: ".$correo." ya existe. Contactar al tel: 9991604271";
		$res=false;

	} else {
		$pass= md5("nuevopolo1");
		$query="INSERT INTO usuarios VALUES ('','$rol','$carrera','$sexo','$edad','$cel','$nombre','$apellidop','$apellidom','$correo','$pass')";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Alta de usuario ".$correo." correcta";
			$res=true;
		}else{
			$msg="Fallo, registro no guardado";
			$res=false;
		}
	}
	return array ($res,$msg);

}

/*** ALTA DE DATOS EN TABLA STOCK ***/
function crearstock($playera, $color, $talla, $corte, $stock,$costo,$entrada){
	$conn=conectarse();
	$playera=mysqli_escape_string($conn,$playera);
	$color=mysqli_escape_string($conn,$color);
	$talla=mysqli_escape_string($conn,$talla);
	$corte=mysqli_escape_string($conn,$corte);
	$stock=mysqli_escape_string($conn,$stock);
	$costo=mysqli_escape_string($conn,$costo);
	$entrada=mysqli_escape_string($conn,$entrada);

	$data=$res=mysqli_query($conn,"SELECT * FROM stocks where idplayera= $playera AND idcolor=$color AND idtalla=$talla AND idcorte=$corte");

	$res=mysqli_num_rows($res);

	if ($res<=0) {
		// code...
		$query="INSERT INTO stocks VALUES ('','$playera','$color','$talla','$corte','$stock','$costo','$entrada','$entrada')";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Alta de stock correcta";
			$res=true;
		}else{
			$msg="Fallo, registro no guardado";
			$res=false;
		}
		
	} else {
		// code...
		$row=mysqli_fetch_object($data);
		$id=$row->idstock;
		$cantidad=$row->stock;
		$costobd=$row->costo;
		$entradabd=$row->ultima_entrada;

		if ($cantidad>0) {
			if ($costo<=$costobd) {
				$costo=$costobd;
				$msg="El costo se mantuvo igual, se coloco un costo menor a la última entrada. ";
			}
		}
		if ($entrada<=$entradabd) {
			// code...
			$msg="Fallo, la fecha no puede ser una fecha menor a la última entrada.";
			$res=false;
			return array ($res,$msg);
			exit;
		}
		$stock=$cantidad+$stock;

		$query="UPDATE stocks SET stock=$stock, costo=$costo,ultima_entrada='$entrada' where idstock=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Actualización de stock correcta. ".$msg;
			$res=true;
		}else{
			$msg="Fallo, registro no actualizado.";
			$res=false;
		}
	}	
	
	return array ($res,$msg);
}
/*** ALTA DE DATOS EN TABLA CARRERAS ***/
function crearcarrera($carrera, $iniciales, $corto, $facultad){
	$conn=conectarse();
	$carrera=mysqli_escape_string($conn,$carrera);
	$iniciales=mysqli_escape_string($conn,$iniciales);
	$corto=mysqli_escape_string($conn,$corto);
	$facultad=mysqli_escape_string($conn,$facultad);
	

	$data=$res=mysqli_query($conn,"SELECT c.*, nombre_facultad facultad, f.nombre_corto corto FROM carreras c INNER JOIN facultades f ON c.idfacultad=f.idfacultad where nombre='$carrera' AND c.idfacultad=$facultad");

	$res=mysqli_num_rows($res);

	if ($res<=0) {
		// code...
		$query="INSERT INTO carreras VALUES ('','$carrera','$facultad','$corto','$iniciales')";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Alta de carrera correcta";
			$res=true;
		}else{
			$msg="Fallo, registro no guardado";
			$res=false;
		}
		
	} else {
		// code...
		
			$msg="Fallo, registro ya existe.";
			$res=false;
	}	
	
	return array ($res,$msg);
}
/*** ALTA DE DATOS EN TABLA FACULTADES ***/
function crearfacultad($universidad,$iniciales, $corto, $facultad){
	$conn=conectarse();
	$universidad=mysqli_escape_string($conn,$universidad);
	$iniciales=mysqli_escape_string($conn,$iniciales);
	$corto=mysqli_escape_string($conn,$corto);
	$facultad=mysqli_escape_string($conn,$facultad);
	

	$data=$res=mysqli_query($conn,"SELECT * FROM facultades  where nombre_facultad='$facultad' AND iduniversidad=$universidad");

	$res=mysqli_num_rows($res);

	if ($res<=0) {
		// code...
		$query="INSERT INTO facultades VALUES ('',$universidad,'$facultad','$corto','$iniciales')";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Alta de facultad correcta";
			$res=true;
		}else{
			$msg="Fallo, registro no guardado";
			$res=false;
		}
		
	} else {
		// code...
		
			$msg="Fallo, registro ya existe.";
			$res=false;
	}	
	
	return array ($res,$msg);
}
/*** ALTA DE DATOS EN TABLA UNIVERSIDADES ***/
function crearuniversidad($iniciales, $corto, $universidad){
	$conn=conectarse();
	
	$iniciales=mysqli_escape_string($conn,$iniciales);
	$corto=mysqli_escape_string($conn,$corto);
	$universidad=mysqli_escape_string($conn,$universidad);
	

	$data=$res=mysqli_query($conn,"SELECT * FROM universidades  where nombre_universidad='$universidad'");

	$res=mysqli_num_rows($res);

	if ($res<=0) {
		// code...
		$query="INSERT INTO universidades VALUES ('','$universidad','$corto','$iniciales')";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Alta de universidad correcta";
			$res=true;
		}else{
			$msg="Fallo, registro no guardado";
			$res=false;
		}
		
	} else {
		// code...
		
			$msg="Fallo, registro ya existe.";
			$res=false;
	}	
	
	return array ($res,$msg);
}

/*** ALTA DE DATOS EN TABLA UNIVERSIDADES ***/
function crearpago($pedido, $monto, $fecha, $img){
	$conn=conectarse();
	
	$pedido=mysqli_escape_string($conn,$pedido);
	$monto=mysqli_escape_string($conn,$monto);
	$fecha=mysqli_escape_string($conn,$fecha);
	$img=mysqli_escape_string($conn,$img);///POR SI se requiere el uso

	$data=mysqli_query($conn,"SELECT (IFNULL(sum(monto),0)+$monto) pagos, pe.total FROM pagos pa INNER JOIN pedidos pe ON pa.idpedido=pe.idpedido where pe.idpedido='$pedido'");
	$data=mysqli_fetch_object($data);

	$pagos=$data->pagos;
	$total=$data->total;
	if ($pagos<=$total) {
//	if (false) {
		// code...
		$data=mysqli_query($conn,"SELECT MAX(fecha_pago) fechabd FROM pagos where idpedido=$pedido");
		$data=mysqli_fetch_object($data);
		$fechabd=$data->fechabd; 
//print_r($fechabd. ' -- '. $fecha);

		if ($fechabd>=$fecha) {
			// code...
			$msg="Fallo, la fecha colocado es menor al pago anterior, colocar otra fecha. La fecha del anterior pago es: ". $fechabd;
			$res=false;
		} else {
			// code...
			if ($pagos==$total) {
				// code...
				$query="INSERT INTO pagos VALUES ('','$pedido','$monto','$fecha')";
				$res=mysqli_query($conn,$query);
				if ($res) {
					$query="UPDATE pedidos set idestatuspago =7 where idpedido=$pedido";

					$res=mysqli_query($conn,$query);
					if ($res) {
						$msg="Alta de pago correcta. Pedido pagado totalmente";
						$res=true;
					}else{
						$msg="Fallo, no se actualizo el estatus del pago del pedido # ".$pedido;
						$res=false;
					}
				}else{
					$msg="Fallo, registro de pago no guardado";
					$res=false;
				}
			} else {
				// code...
				$query="INSERT INTO pagos VALUES ('','$pedido','$monto','$fecha')";
				$res=mysqli_query($conn,$query);
				if ($res) {
					$query="UPDATE pedidos set idestatuspago =9 where idpedido=$pedido";

					$res=mysqli_query($conn,$query);
					if ($res) {
						$msg="Alta de pago correcta.";
						$res=true;
					}else{
						$msg="Fallo, no se actualizo el estatus del pago del pedido # ".$pedido;
						$res=false;
					}
				}else{
					$msg="Fallo, registro de pago no guardado";
					$res=false;
				}
			}
		}
	} else {
		// code...	
		$msg="Fallo, el monto colocado supera el total de pago del pedido por $". number_format(($pagos-$total),2,'.',',');
		$res=false;
	}	
	
	return array ($res,$msg);
}
function crearprepedido($playera, $color, $talla, $corte, $cantidad,$entrega, $vendedor,$cliente,$carrera,$pedido){
	$conn=conectarse();

	$playera=mysqli_escape_string($conn,$playera);
	$color=mysqli_escape_string($conn,$color);
	$talla=mysqli_escape_string($conn,$talla);
	$corte=mysqli_escape_string($conn,$corte);
	$cantidad=mysqli_escape_string($conn,$cantidad);
	$entrega=mysqli_escape_string($conn,$entrega);
	$vendedor=mysqli_escape_string($conn,$vendedor);
	$cliente=mysqli_escape_string($conn,$cliente);
	$carrera=mysqli_escape_string($conn,$carrera);
	$pedido=mysqli_escape_string($conn,$pedido);

	$res=$data= mysqli_query( $conn,"SELECT DISTINCT( concat(us.nombre,' ',us.apellidop, ' ',us.apellidom)) nombre, pp.* FROM prepedido pp INNER JOIN usuarios us ON pp.idcliente=us.iduser where idpedido=3 GROUP BY nombre");
	$data=mysqli_fetch_object($data);
	$res=mysqli_num_rows($res);
	if ($res<1){
		$idcliente='';
		$idpedido='';
	}else {
		$idcliente=$data->idcliente;
		$idpedido=$data->idpedido;
	}
	if ($idcliente!=$cliente AND $idpedido==$pedido) {
		// code...
		$msg="Fallo, el cliente es distinto al capturado en la tabla. Cliente: ".$data->nombre;
		$res=false;
	} else {
		if ($entrega=="" || $corte==""||$talla==""||$color==""||$carrera==""||$cantidad=="") {
				// code...
				$msg="Fallo, No se debe dejar ningun campo vació. ";
				$res=false;
			} else {

			$sql= mysqli_query( $conn,"SELECT pp.* FROM prepedido pp where idplayera=$playera AND idcorte = $corte AND idcolor= $color AND idtalla=$talla AND idcliente=$cliente AND idcarrera=$carrera ");
	//print_r("SELECT pp.* FROM prepedido pp where idplayera=$playera AND idcorte = $corte AND idcolor= $color AND idtalla=$talla AND idcliente=$cliente AND idcarrera=$carrera");
			$res=mysqli_num_rows($sql);

			if ($res>0) {
				// code...
				$msg="Fallo, las especificaciones de la playera ya existe en la tabla.";
				$res=false;
			} else {
				// code...	
				
					// code...
					$query="INSERT INTO prepedido VALUES ('', $pedido, $vendedor, $cliente, $playera, $color, $talla,$corte, $carrera, $cantidad, '$entrega')";
	//print_r($query);
				$res=mysqli_query($conn,$query);
					if ($res) {
						$msg="Alta de registro correcta. ";
						$res=true;
					}else{
						$msg="Fallo, no se registro el movimiento. ";
						$res=false;
					}	
			}
		}
	}
		return array ($res,$msg);
}

function crearpedido($pedido){
	$conn=conectarse();
	$pedido = mysqli_escape_string($conn,$pedido);
	$query="INSERT INTO `pedidos`  (SELECT idpedido, sum(cantidad) cantidad, (sum(cantidad) * 150) total, entrega, entrega, 1,8 FROM prepedido WHERE idpedido=$pedido) ";
	$res=mysqli_query($conn,$query);
	if ($res) {
		// code...
		$sql="INSERT INTO `clientexplayeras` (select '', idpedido, idcliente, idplayera, idcolor, idtalla, idcorte, idcarrera, idvendedor, cantidad, 1 FROM prepedido )";
		$res=mysqli_query($conn,$sql);

		if ($res) {
			$query="TRUNCATE TABLE prepedido";
			$res=mysqli_query($conn,$query);
			
			if ($res) {
				// code...
				$msg="Alta del pedido de playeras del cliente. ";
				$res=true;
			} else {
				// code...
				$msg="Fallo, no se pudo limpiar la tabla prepedido. ";
				$res=false;
			}// borrado de tabla prepedido	
		}else{
			$msg="Fallo, no se registro el pedido de playeras del cliente. ";
			$res=false;
		}//tabla clientexplayeras
	} else {
		// code...
		$msg="Fallo, no se registro el pedido.";
		$res=false;
	}//tabla pedidos 

	return array ($res,$msg);	
}

?>
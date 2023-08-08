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

/*** BAJA DE DATO EN TABLA TEMP PEDIDOS ***/
function eliminarplayera($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);


		$query="DELETE FROM prepedido WHERE idprepedido=$id";
		$res=mysqli_query($conn,$query);

		if ($res) {
			$msg="Se quito el pedido correctamente";
			$res=true;
			$class='"alert alert-success"';
		}else{
			$msg="Fallo, registro no quitado";
			$res=false;
			$class='"alert alert-danger"';
		}
/*
		echo "<div class=".$class.">";
	   	echo $msg;
		echo "</div>";
*/
	return array ($res,$msg);
}
/*** Quitar DATO EN TABLA PEDIDOS y Clientesxplayeras ***/
function eliminarpedido(){
	if(isset($_POST) && !empty($_POST)){ 
		$conn=conectarse();
		$id=$_POST['pedido'];
		$id=mysqli_escape_string($conn,$id);
		$row=mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM pedidos WHERE idpedido=$id"));
		//print_r($row);
		if ($row->idestatus==1) {
			// code...
			if ($row->idestatuspago==8) {
				// code...
				$query="DELETE FROM pedidos WHERE idpedido=$id";
				$res=mysqli_query($conn,$query);

				if ($res) {
					// code...
					$query2="DELETE FROM clientexplayeras WHERE idpedido=$id";
					$res2=mysqli_query($conn,$query2);
					if ($res2) {
						$msg="Se quito el pedido y sus playeras correctamente";
						$res=true;
						$class='"alert alert-success"';
					}else{
						$msg="Fallo, error al quitar los pedidos";
						$res=false;
						$class='"alert alert-danger"';
					}
				} else {
					// code...
					$msg="Fallo, error al quitar el pedido";
					$res=false;
					$class='"alert alert-danger"';
				}
				
			} else {
				// code...
				$msg="Fallo, registro no quitado ya se tiene un pago";
				$res=false;
				$class='"alert alert-danger"';
			}		
		} else {
			// code...
			$msg="Fallo, registro no quitado el estado no está en Vigente";
			$res=false;
			$class='"alert alert-danger"';
		}
				

			echo "<div class=".$class.">";
		   	echo $msg;
			echo "</div>";

		return array ($res,$msg);
	}
	
}
?>
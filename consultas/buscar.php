<?php
include_once( "conexion.php");

function buscarplayeras() {
	$conn=conectarse();
	$query= "SELECT * FROM playeras";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarsinplayera($id) {
	$conn=conectarse();
	$playera=mysqli_escape_string($conn,$id);
	$query= "SELECT * FROM playeras WHERE idplayera<>$playera";

	$sql=mysqli_query($conn,$query);

	return $sql;

}

function buscartallas() {
	$conn=conectarse();
	$query= "SELECT * FROM tallas";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarcolores() {
	$conn=conectarse();
	$query= "SELECT * FROM colores";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarcortes() {
	$conn=conectarse();
	$query= "SELECT * FROM cortes";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarsexos() {
	$conn=conectarse();
	$query= "SELECT * FROM sexos";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarcarreras() {
	$conn=conectarse();
	$query= "SELECT C.*, nombre_facultad FROM carreras C INNER JOIN facultades f on c.idfacultad=f.idfacultad ORDER BY idcarrera";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarfacultades() {
	$conn=conectarse();
	$query= "SELECT * FROM facultades ORDER BY idfacultad";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscaruniversidades() {
	$conn=conectarse();
	$query= "SELECT * FROM universidades ORDER BY nombre_universidad";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarpermisos() {
	$conn=conectarse();
	$query= "SELECT * FROM permisos";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarestatuscxp() {
	$conn=conectarse();
	$query= "SELECT * FROM estatus WHERE idestatus in (1,2,3,4,5)";

	$sql=mysqli_query($conn,$query);

	return $sql;

}
function buscarestatusentrega() {
	$conn=conectarse();
	$query= "SELECT * FROM estatus WHERE idestatus in (4,6,10)";

	$sql=mysqli_query($conn,$query);

	return $sql;
}

function buscarpedidosinpago() {
	$conn=conectarse();
	$query= "SELECT DISTINCT(pe.idpedido), pe.total ,concat(us.nombre,' ', apellidop,' ',apellidom) nombre FROM pedidos pe INNER JOIN clientexplayeras cxp ON pe.idpedido=cxp.idpedido INNER JOIN usuarios us ON cxp.idcliente=us.iduser WHERE idestatuspago <> 7";

	$sql=mysqli_query($conn,$query);

	return $sql;

}

/******************************/


/******************************/
/* Busqueda especifica de dato uso de where */
function buscaruser($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);
	$query= "SELECT u.*, c.nombre carrera, nombre_sexo sexo, rol FROM usuarios u INNER JOIN sexos s on u.idsexo=s.idsexo INNER JOIN carreras c on u.idcarrera=c.idcarrera INNER JOIN permisos p on u.idrol=p.idpermiso Where iduser=$id";

	$sql=mysqli_query($conn,$query);
	$sql=mysqli_fetch_object($sql);

	return $sql;
}
function buscarclientes(){
	$conn=conectarse();
	$query="SELECT u.*, c.nombre carrera, f.idfacultad, f.nombre_facultad FROM usuarios u INNER JOIN carreras c ON u.idcarrera=c.idcarrera INNER JOIN facultades f ON c.idfacultad=f.idfacultad WHERE idrol=2";

	$sql=mysqli_query($conn,$query);
	return $sql;
}
function buscarsincliente($id){
	$conn=conectarse();
	$cliente=mysqli_escape_string($conn,$id);
	$query="SELECT u.*, c.nombre carrera, f.idfacultad, f.nombre_facultad FROM usuarios u INNER JOIN carreras c ON u.idcarrera=c.idcarrera INNER JOIN facultades f ON c.idfacultad=f.idfacultad WHERE idrol=2 AND iduser<>$cliente";

	$sql=mysqli_query($conn,$query);
	return $sql;
}
function buscarvendedores(){
	$conn=conectarse();
	$query="SELECT u.*, c.nombre carrera, f.idfacultad, f.nombre_facultad FROM usuarios u INNER JOIN carreras c ON u.idcarrera=c.idcarrera INNER JOIN facultades f ON c.idfacultad=f.idfacultad WHERE idrol=3";

	$sql=mysqli_query($conn,$query);
	return $sql;
}
function buscarsinvendedores($id){
	$conn=conectarse();
	$vendedor=mysqli_escape_string($conn,$id);

	$query="SELECT u.*, c.nombre carrera, f.idfacultad, f.nombre_facultad FROM usuarios u INNER JOIN carreras c ON u.idcarrera=c.idcarrera INNER JOIN facultades f ON c.idfacultad=f.idfacultad WHERE idrol=3 AND iduser<>$vendedor";
//print_r($query);
	$sql=mysqli_query($conn,$query);
	return $sql;
}
function buscarstock($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);
	$query="SELECT s.*, p.nombre_playera, nombre_corte corte, nombre_color color, letra talla FROM stocks s INNER JOIN playeras p ON s.idplayera=p.idplayera INNER JOIN cortes c ON s.idcorte=c.idcorte INNER JOIN colores co ON s.idcolor=co.idcolor INNER JOIN tallas t ON s.idtalla=t.idtalla WHERE idstock=$id ";

	$sql=mysqli_query($conn,$query);
	$sql=mysqli_fetch_object($sql);

	return $sql;
}

function buscarcarrera($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);
	$query="SELECT c.*, nombre_facultad FROM carreras c INNER JOIN facultades f ON c.idfacultad = f.idfacultad WHERE idcarrera=$id ";

	$sql=mysqli_query($conn,$query);
	$sql=mysqli_fetch_object($sql);

	return $sql;
}
function buscaruniversidad($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);
	$query="SELECT * FROM universidades WHERE iduniversidad=$id ";

	$sql=mysqli_query($conn,$query);
	$sql=mysqli_fetch_object($sql);

	return $sql;
}
function buscarfacultad($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);
	$query="SELECT f.*, nombre_universidad FROM facultades f INNER JOIN universidades u ON f.iduniversidad = u.iduniversidad WHERE idfacultad=$id ";

	$sql=mysqli_query($conn,$query);
	$sql=mysqli_fetch_object($sql);

	return $sql;
}

function buscarcxp($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);
	$query="SELECT cxp.*, concat(us.nombre,' ', us.apellidop,' ', us.apellidom) nombre, e.nombreestatus, nombre_playera playera, letra, nombre_color color, ca.nombre carrera, nombre_facultad facultad, nombre_universidad universidad FROM clientexplayeras cxp INNER JOIN usuarios us ON cxp.idcliente=us.iduser INNER JOIN estatus e on cxp.idestatus=e.idestatus INNER JOIN playeras p ON cxp.idplayera=p.idplayera INNER JOIN tallas t ON cxp.idtalla=t.idtalla INNER JOIN colores co ON cxp.idcolor=co.idcolor INNER JOIN carreras ca ON cxp.idcarrera= ca.idcarrera INNER JOIN facultades fa on ca.idfacultad=fa.idfacultad INNER JOIN universidades un ON fa.iduniversidad=un.iduniversidad WHERE cxp.idclixplay=$id AND cxp.idestatus<>6 ";

	$sql=mysqli_query($conn,$query);
	$sql=mysqli_fetch_object($sql);

	return $sql;
}
function buscarpedido($id){
	$conn=conectarse();
	$id=mysqli_escape_string($conn,$id);
	$query="SELECT p.*, cxp.cantidad piezas , idcliente, concat(us.nombre, ' ',us.apellidop,' ',us.apellidom ) nombre, idvendedor,concat(us2.nombre, ' ',us2.apellidop,' ',us2.apellidom ) vendedor, e.nombreestatus proceso, nombre_playera playera, letra, nombre_color color, ca.nombre carrera, nombre_facultad facultad, nombre_universidad universidad, est.nombreestatus entrega, cxp.idplayera, estpag.nombreestatus pago FROM pedidos p INNER JOIN clientexplayeras cxp ON p.idpedido=cxp.idpedido INNER JOIN usuarios us ON cxp.idcliente=us.iduser INNER JOIN usuarios us2 ON cxp.idvendedor=us2.iduser INNER JOIN estatus e on cxp.idestatus=e.idestatus INNER JOIN playeras pl ON cxp.idplayera=pl.idplayera INNER JOIN tallas t ON cxp.idtalla=t.idtalla INNER JOIN colores co ON cxp.idcolor=co.idcolor INNER JOIN carreras ca ON cxp.idcarrera= ca.idcarrera INNER JOIN facultades fa on ca.idfacultad=fa.idfacultad INNER JOIN universidades un ON fa.iduniversidad=un.iduniversidad INNER JOIN estatus est on p.idestatus=est.idestatus INNER JOIN estatus estpag on p.idestatuspago=estpag.idestatus WHERE p.idpedido=$id AND cxp.idestatus<>6 ";

	$sql=mysqli_query($conn,$query);
	$row=MYSQLi_NUM_ROWS($sql); 

	if ($row<=0) {
		echo "<br><br><p class='resultado'>NO HAY REGISTROS</p>";
	}
	return $sql;
}
/********* BUSQUEDA DE FOLIOS ***********/
function buscarfoliopedido(){
	$conn=conectarse();
	$query="SELECT IFNULL(max(idpedido),0)+1 folio FROM pedidos ";
//print_r($query);
	$sql=mysqli_query($conn,$query);
	return $sql;
}
?>
<?php
include_once 'conexion.php';
/*** LLENADO DE TABLA DE USUARIOS***/
function listarusuarios(){
	$conn=conectarse();
	$WHERE = "";
	if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$correo=$_POST['texto'];
		$WHERE = "WHERE u.correo like '%$correo%' ";
		break;
		case "2":
		$nombre=$_POST['texto2'];
		$WHERE = "where u.nombre like '%$nombre%' OR apellidop like '%$nombre%' OR apellidom like '%$nombre%' ";
		break;
		case "3":
		$rol=$_POST['rol'];
		$WHERE = "Where idrol = $rol";
		break;
		}
	}
	$query="SELECT u.*, nombre_facultad, c.nombre carrera,nombre_sexo, rol FROM usuarios u INNER JOIN carreras c on u.idcarrera=c.idcarrera INNER JOIN sexos s on u.idsexo=s.idsexo INNER JOIN permisos p on u.idrol=p.idpermiso INNER JOIN facultades f on c.idfacultad=f.idfacultad $WHERE ";
	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {

		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";

	} 
		return $sql;
}


/***LLENADO DE TABLA DE STOCK***/
function listarstock(){
	$conn=conectarse();
	$WHERE = "";
	if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$stock=$_POST['texto'];
		$signo=$_POST['signo'];
		$WHERE = "WHERE stock $signo $stock ";
		break;
		case "2":
		$nombre=$_POST['texto2'];
		$WHERE = "where nombre like '%$nombre%' OR apellidop like '%$nombre%' OR apellidom like '%$nombre%' ";
		break;
		case "3":
		$min=$_POST['fecha'];
		$signo=$_POST['signo'];
		$WHERE = "Where ultima_entrada $signo '$min' ";
		break;
		case "4":
		$signo=$_POST['signo'];
		$max=$_POST['fecha2'];
		$WHERE = "Where ultima_salida $signo '$max' ";
		break;
		case "5":
		$talla=$_POST['talla'];
		$WHERE = "WHERE s.idtalla=$talla ";
		break;
		case "6":
		$color=$_POST['color'];
		$WHERE = "WHERE s.idcolor=$color ";
		break;
		case "7":
		$playera=$_POST['playera'];
		$WHERE = "WHERE s.idplayera=$playera ";
		break;
		case "8":
		$estatus=$_POST['corte'];
		$WHERE = "WHERE s.idcorte=$estatus ";
		break;
		}
	}

	$query= "SELECT s.*, t.letra talla, co.nombre_color color, c.nombre_corte corte, p.nombre_playera playera FROM Stocks s INNER JOIN tallas t on s.idtalla=t.idtalla INNER JOIN cortes c on s.idcorte=c.idcorte INNER JOIN colores co on s.idcolor=co.idcolor INNER JOIN playeras p on s.idplayera=p.idplayera $WHERE";

	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {

		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";

	} 
		return $sql;
}
/***LLENADO DE TABLA DE ALTA DEPEDIDOS***/
function listarprepedidos($folio) {
	$conn=conectarse();
	$query= "SELECT * FROM prepedido pp INNER JOIN playeras pl ON pp.idplayera=pl.idplayera INNER JOIN tallas ta ON pp.idtalla=ta.idtalla INNER JOIN colores co ON pp.idcolor=co.idcolor INNER JOIN cortes cs ON pp.idcorte=cs.idcorte INNER JOIN carreras ca ON pp.idcarrera=ca.idcarrera where pp.idpedido=$folio ORDER BY idprepedido";
//print_r($query);
	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	/*if ($res<=0) {

		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";

	} */
		return $sql;
}
/***LLENADO DE TABLA DE Ponchados***/
function listarpedidos(){
	$conn=conectarse();
	$WHERE = "";
	if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$pedido=$_POST['texto'];
		$WHERE = "WHERE p.idpedido = $pedido ";
		break;
		case "2":
		$nombre=$_POST['texto2'];
		$WHERE = "where nombre like '%$nombre%' OR apellidop like '%$nombre%' OR apellidom like '%$nombre%' ";
		break;
		case "5":
		$min=$_POST['fecha'];
		$max=$_POST['fecha2'];
		$WHERE = "Where fecha_entrega BETWEEN'$min' and '$max' ";
		break;
		case "3":
		$pago=$_POST['pago'];
		$WHERE = "WHERE ep.idestatus=$pago ";
		break;
		case "4":
		$estatus=$_POST['estatus'];
		$WHERE = "WHERE e.idestatus=$estatus ";
		break;
		}
	}
	$query= "SELECT DISTINCT(cxp.idpedido), p.*, u.nombre,u.apellidop, e.nombreestatus estatus, ep.nombreestatus pago ,(select sum(monto) from pagos pa where pa.idpedido=cxp.idpedido ) monto, IFNULL((total-(select sum(monto) from pagos pa where pa.idpedido=cxp.idpedido )), total) diferencia FROM pedidos p INNER JOIN clientexplayeras cxp ON p.idpedido=cxp.idpedido INNER JOIN usuarios u on cxp.idcliente=u.iduser INNER JOIN estatus e ON p.idestatus=e.idestatus INNER JOIN estatus ep ON p.idestatuspago=ep.idestatus  $WHERE order by p.fecha_entrega";

	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {

		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";

	} 
		return $sql;
}
/***LLENADO DE TABLA DE Entregas***/
function listarpedcli($id){
	$conn=conectarse();
	$query= "SELECT DISTINCT(cxp.idpedido), p.*, u.nombre,u.apellidop, e.nombreestatus estatus, ep.nombreestatus pago FROM pedidos p INNER JOIN clientexplayeras cxp ON p.idpedido=cxp.idpedido INNER JOIN usuarios u on cxp.idcliente=u.iduser INNER JOIN estatus e ON p.idestatus=e.idestatus INNER JOIN estatus ep ON p.idestatuspago=ep.idestatus WHERE iduser=$id order by p.fecha_entrega";

	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {

		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";
	} 
		return $sql;
}

/***LLENADO DE TABLA DE PAGOS ***/
function listarsaldos() {
	$conn=conectarse();
	$WHERE = "";
	if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$pedido=$_POST['texto'];
		$WHERE = "WHERE pa.idpedido = $pedido ";
		break;
		case "2":
		$nombre=$_POST['texto2'];
		$WHERE = "where nombre like '%$nombre%' OR apellidop like '%$nombre%' OR apellidom like '%$nombre%' order by nombre asc;";
		break;
		case "3":
		$min=$_POST['fecha'];
		$max=$_POST['fecha2'];
		$WHERE = "Where fecha_pago BETWEEN'$min' and '$max' order by fecha_pago asc;";
		break;
		case "4":
		$WHERE = "";
		break;
		}
	}
	$query= "SELECT DISTINCT(pa.idpago), pa.*, CONCAT(us.nombre,' ',us.apellidop,' ',us.apellidom) nombre FROM pagos pa INNER JOIN pedidos pe ON pa.idpedido=pe.idpedido INNER JOIN clientexplayeras cxp ON pa.idpedido=cxp.idpedido INNER JOIN usuarios us ON cxp.idcliente=us.iduser $WHERE";

	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {

		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";
	} 
		return $sql;
}

/****LISTADO DE TABLA CLIENTES *****/
function listarclientes(){
	$conn=conectarse();
	$WHERE="";
		if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$correo=$_POST['texto'];
		$WHERE = "and u.correo like '%$correo%' ";
		break;
		case "2":
		$nombre=$_POST['texto2'];
		$WHERE = "and u.nombre like '%$nombre%' OR apellidop like '%$nombre%' OR apellidom like '%$nombre%' ";
		break;
		case "3":
		$carrera=$_POST['texto3'];
		$WHERE = "and c.nombre like '%$carrera%' ";
		break;
		case "4":
		$WHERE = "";
		break;
		}
	}
	$query="SELECT u.*, nombre_facultad, c.nombre carrera,nombre_sexo, rol FROM usuarios u INNER JOIN carreras c on u.idcarrera=c.idcarrera INNER JOIN sexos s on u.idsexo=s.idsexo INNER JOIN permisos p on u.idrol=p.idpermiso INNER JOIN facultades f on c.idfacultad=f.idfacultad WHERE idrol=2  $WHERE";

	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {

		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";

	} 
		return $sql;
}
/************LISTAR DATOS TABLA CARRERAS**************/
function listarcarreras(){
	$conn=conectarse();
	$WHERE="";
		if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$facultad=$_POST['texto'];
		$WHERE = "WHERE nombre_facultad like '%$facultad%' ";
		break;
		case "2":
		$sigla=$_POST['texto2'];
		$WHERE = "WHERE c.iniciales like '%$sigla%' ";
		break;
		case "3":
		$carrera=$_POST['texto3'];
		$WHERE = "WHERE nombre like '%$carrera%' ";
		break;
		case "4":
		$WHERE = "";
		break;
		}
	}
	$query="SELECT c.*, f.nombre_facultad, f.nombre_corto fac,f.iniciales siglas FROM carreras c INNER JOIN facultades f ON c.idfacultad=f.idfacultad $WHERE ORDER BY idfacultad";

	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {
		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";
	} 
		return $sql;


}
/************LISTAR DATOS TABLA FACULTADES**************/
function listarfacultades(){
	$conn=conectarse();
		$WHERE="";
		if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$universidad=$_POST['texto'];
		$WHERE = "WHERE nombre_universidad like '%$universidad%' ";
		break;
		case "2":
		$sigla=$_POST['texto2'];
		$WHERE = "WHERE iniciales like '%$sigla%' ";
		break;
		case "3":
		$facultad=$_POST['texto3'];
		$WHERE = "WHERE nombre_facultad like '%$facultad%' ";
		break;
		case "4":
		$WHERE = "";
		break;
		}
	}
	$query="SELECT f.*, nombre_universidad FROM facultades f INNER JOIN universidades u ON f.iduniversidad=u.iduniversidad $WHERE";
	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {
		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";
	} 
		return $sql;


}
/************LISTAR DATOS TABLA UNIVERSIDADES**************/
function listaruniversidades(){
	$conn=conectarse();
			$WHERE="";
		if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$universidad=$_POST['texto'];
		$WHERE = "WHERE nombre_universidad like '%$universidad%' ";
		break;
		case "2":
		$corto=$_POST['texto2'];
		$WHERE = "WHERE nombre_comun like '%$corto%' ";
		break;
		case "3":
		$sigla=$_POST['texto3'];
		$WHERE = "WHERE siglas like '%$sigla%' ";
		break;
		case "4":
		$WHERE = "";
		break;
		}
	}
	$query="SELECT * FROM universidades u $WHERE";
	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {
		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";
	} 
		return $sql;
}
/************LISTAR DATOS TABLA PONCHADOS **************/
function listarponchados(){
	$conn=conectarse();
	$WHERE = "";
	if(isset($_POST['filtro'])){
		$filtro=$_POST['filtro'];
		switch($filtro){
		case "0":
		$WHERE = "";
		break;
		case "1":
		$pedido=$_POST['texto'];
		$WHERE = "WHERE p.idpedido = $pedido ";
		break;
		case "2":
		$nombre=$_POST['texto2'];
		$WHERE = "where nombre like '%$nombre%' OR apellidop like '%$nombre%' OR apellidom like '%$nombre%' ";
		break;
		case "3":
		$carrera=$_POST['texto3'];
		$WHERE = "WHERE ca.iniciales like '%$carrera%' ";
		break;
		case "4":
		$min=$_POST['fecha'];
		$max=$_POST['fecha2'];
		$WHERE = "Where p.fecha_entrega BETWEEN'$min' and '$max' ";
		break;
		case "5":
		$talla=$_POST['talla'];
		$WHERE = "WHERE cxp.idtalla=$talla ";
		break;
		case "6":
		$color=$_POST['color'];
		$WHERE = "WHERE cxp.idcolor=$color ";
		break;
		case "7":
		$playera=$_POST['playera'];
		$WHERE = "WHERE cxp.idplayera=$playera ";
		break;
		case "8":
		$estatus=$_POST['estatus'];
		$WHERE = "WHERE cxp.idestatus=$estatus ";
		break;
		}
	}
	$query = "SELECT cxp.*, p.fecha_entrega,e.nombreestatus estatus, u.nombre, u.apellidop, u.apellidom, c.nombre_color, t.letra, pl.nombre_playera, nombre_corte, ca.iniciales caini, f.iniciales faini, siglas FROM pedidos p INNER JOIN clientexplayeras cxp ON p.idpedido=cxp.idpedido INNER JOIN usuarios u ON cxp.idcliente=u.iduser INNER JOIN estatus e ON cxp.idestatus=e.idestatus INNER JOIN colores c ON cxp.idcolor=c.idcolor INNER JOIN tallas t ON cxp.idtalla=t.idtalla INNER JOIN playeras pl ON cxp.idplayera=pl.idplayera INNER JOIN cortes co ON cxp.idcorte=co.idcorte INNER JOIN carreras ca ON cxp.idcarrera=ca.idcarrera INNER JOIN facultades f ON ca.idfacultad=f.idfacultad INNER JOIN universidades un ON f.iduniversidad=un.iduniversidad $WHERE AND p.idestatus in (1,2,3,4,5) order by p.idpedido ";
	$res=$sql=mysqli_query($conn,$query);

	$res=mysqli_num_rows($res);

	if ($res<=0) {
		echo "<br><p class='resultado'>NO HAY REGISTROS</p>";
	} 
		return $sql;
}

?>
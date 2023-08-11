<?php
include_once( "conexion.php");

function calculospagos($pedido) {
	$conn=conectarse();
	$pedido=mysqli_escape_string($conn,$pedido);
	$query= "SELECT sum(monto) abonos, total, (total - (SELECT sum(monto) abonos FROM pagos where idpedido=$pedido) )saldo, (select max(fecha_pago) from pagos where idpedido=$pedido) ultimo FROM pagos pa
	INNER JOIN pedidos pe ON pa.idpedido=PE.idpedido WHERE pa.idpedido=$pedido";

	$sql=mysqli_fetch_object (mysqli_query($conn,$query));

	return $sql;
}



?>
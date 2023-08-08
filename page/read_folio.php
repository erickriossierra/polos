<?php
require_once '../consultas/buscar.php'; //libreria de conexion a la base

//$id = filter_input(INPUT_POST, 'id');
	
	$sql=buscarfoliopedido();

	$res=MYSQLi_NUM_ROWS($sql); 

	if ($res<=0) {
		exit();
	} else {
		$row=mysqli_fetch_object($sql);
		$num= $row->folio;
	}
echo $num;
?>
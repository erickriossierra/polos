<?php 
include ("../consultas/eliminar.php");
include ("../consultas/buscar.php");
include "..\diseño\diseño.php";
if (isset($_GET)&& !empty($_GET)) {
        // code...
        $id=$_GET['id'];
    
encabezado();
$pedido=mysqli_fetch_object(buscarpedido($id));
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Quitar <b>Pedido</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_pedidos.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php
    eliminarpedido();
    ?>
     <div >
    	<form class="row" method="post">
            <div class="col-md-1">
                <label class="form-label">Folio</label>
                <input type="text" id="pedido" name="pedido" class="form-control" readonly  value="<?php echo $pedido->idpedido;?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Vendedor</label>
                <input class="form-control text-left" type="text" name="vendedor" value="<?php echo $pedido->vendedor;?>" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label">Cliente</label>
                <input class="form-control text-left" type="text" name="cliente" value="<?php echo $pedido->nombre;?>" readonly>
            </div>
            <div class="col-md-1">
            	<label class="form-label">Piezas</label>
            	<input class="form-control" type="text" name="cantidad" value="<?php echo $pedido->piezas;?>" readonly>
            </div>
            <div class="col-md-1">
            	<label class="form-label">Precio</label>
            	<input class="form-control" type="text" name="total" value="<?php echo "$".$pedido->total;?>" readonly>
            </div>
            <div class="col-md-2">
            	<label class="form-label">Entrega</label>
            	<input class="form-control" type="text" name="entrega" value="<?php echo $pedido->fecha_entrega;?>" readonly>
            </div>
            <div class="col-md-2">
            	<label class="form-label">Estado</label>
            	<input class="form-control" type="text" name="entrega" value="<?php echo $pedido->proceso;?>" readonly>
            </div>
            <div class="col-md-2">
            	<label class="form-label">Estado</label>
            	<input class="form-control" type="text" name="entrega" value="<?php echo $pedido->pago;?>" readonly>
            </div>
            <div class="col-md-12 pull-right" >
            <hr>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
       </form>
    </div>

</div>

<?php 
}else{
	header('Location: portal.php');
        exit; 
}
pie();
?>
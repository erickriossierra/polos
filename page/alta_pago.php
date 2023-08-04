<?php
	include ("../diseño/diseño.php");
    include ("../consultas/altas.php");
    include ("../consultas/buscar.php");

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Alta de <b>Pago</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_pagos.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php    
    altapago();
    ?>
    <div>
        <form class="row" method="POST">
            <div class="col-md-auto">
                <label class="form-label">Elegir Pedido</label>
                <select name="pedido" class="form-select">
                    <?php
                    $listado=buscarpedidosinpago();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idpedido;
                        $nombre=$row->nombre;
                        $nombre=$id.' - '.$nombre;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">monto</label>
                <input type="text" name="monto" class="form-control" required placeholder="###.00">
            </div>
            <div class="col-md-3">
                <label class="form-label">Fecha Pago</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>
            <div class="col-md-12 pull-right" >
            <hr>
                <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
        </form>
    </div>
    
</div>
  
<?php pie();?>
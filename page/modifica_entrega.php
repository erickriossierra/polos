<?php
	include ("../diseño/diseño.php");
    include ("../consultas/modifica.php");
    include ("../consultas/buscar.php");
    if (isset($_GET)&& !empty($_GET)) {
        // code...
        $id=$_GET['id'];
    }
	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Modificación de <b>Estatus Entrega</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_entregas.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    $data=mysqli_fetch_object(buscarpedido($id));
    modificaentrega();
    ?>
    <div>
        <form class="row" method="POST">            
            <div class="col-md-3"></div>
            <div class="col-md-1">
                <label class="form-label">ID Pedido</label>
                <input type="text" name="pedido" class="form-control" readonly value="<?php echo $data->idpedido ;?>">
            </div>
            <div class="col-md-5">
                <label class="form-label">Cliente</label>
                <input type="text" name="cliente" class="form-control text-left"  value="<?php echo $data->nombre ;?>" readonly>
            </div>
            <div class="col-md-3"></div>
<?php
$listado=buscarpedido($id);
while ($row=mysqli_fetch_object($listado)){
    $playera=$row->playera;
    $letra=$row->letra;
    $color=$row->color;
    $carrera=$row->carrera;
    $facultad=$row->facultad;
    $universidad=$row->universidad;
    $cantidad=$row->piezas;
    $estatus=$row->proceso;

?>
            <div class="col-md-2">
                <label class="form-label">Playera</label>
                <input type="text" name="playera" class="form-control text-left"  value="<?php echo $playera ;?>" readonly>
            </div>
            <div class="col-md-1">
                <label class="form-label">Talla</label>
                <input type="text" name="talla" class="form-control"  value="<?php echo $letra ;?>" readonly>
            </div>
            <div class="col-md-2">
                <label class="form-label">Color</label>
                <input type="text" name="color" class="form-control text-left"  value="<?php echo $color ;?>" readonly>
            </div>
            <div class="col-md-7">
                <label class="form-label">Carrera</label>
                <input type="text" name="corto" class="form-control text-left"  value="<?php echo $carrera ;?>" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label">Facultad</label>
                <input type="text" name="corto" class="form-control text-left"  value="<?php echo $facultad ;?>" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label">Universidad</label>
                <input type="text" name="corto" class="form-control text-left"  value="<?php echo $universidad ;?>" readonly>
            </div>
            <div class="col-md-1">
                <label class="form-label">Cantidad</label>
                <input type="text" name="cantidad" class="form-control" required value="<?php echo $cantidad ;?>" readonly>
            </div>
            <div class="col-md-2">
                <label class="form-label">Estatus</label>
                <input type="text" name="estatusbd" class="form-control text-left" required value="<?php echo $estatus ;?>" readonly>
            </div>
            <div class="col-md-12"><hr></div>

<?php } ?>    
            <div class="col-md-2">
                <label class="form-label">Estatus Pedido</label>
                <input type="text" name="estatatusbd" class="form-control text-left"  value="<?php echo $data->entrega ;?>" readonly>
            </div>        
            <div class="col-md-2">
                <label class="form-label">Estatus</label>
                <select name="estatus" class="form-select">
                    <?php
                    $listado=buscarestatusentrega();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idestatus;
                        $nombre=$row->nombreestatus;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-12 pull-right" >
            <hr>
                <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
        </form>
    </div>
    
</div>
  
<?php pie();?>
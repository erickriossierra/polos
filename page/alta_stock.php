<?php
	include ("../diseño/diseño.php");
	include ('../consultas/listar.php');
    include ("../consultas/altas.php");
    include ("../consultas/buscar.php");

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Alta de  <b>Stock</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_stock.php" class="btn btn-outline-secondary"><i class="icon-back"></i>Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    
    altastock();
    ?>
    <div>
        <form class="row" method="POST">
            <div class="col-md-auto">
                <label class="form-label">Elegir playera</label>
                <select name="playera" class="form-select">
                    <?php
                    $listado=buscarplayeras();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idplayera;
                        $nombre=$row->nombre_playera;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir Talla</label>
                <select name="talla" class="form-select">
                    <?php
                    $listado=buscartallas();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idtalla;
                        $nombre=$row->letra;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir color</label>
                <select name="color" class="form-select">
                    <?php
                    $listado=buscarcolores();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idcolor;
                        $nombre=$row->nombre_color;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir corte</label>
                <select name="corte" class="form-select">
                    <?php
                    $listado=buscarcortes();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idcorte;
                        $nombre=$row->nombre_corte;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-1">
                <label class="form-label">Cantidad</label>
                <input type="text" name="stock" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Costo</label>
                <input type="text" name="costo" class="form-control" placeholder="###.00" required>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Entrada</label>
                <input type="date" name="entrada" class="form-control" required>
            </div>

            <div class="col-md-12 pull-right" >
            <hr>
                <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
        </form>
    </div>
    
</div>
  
<?php pie();?>
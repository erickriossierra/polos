<?php
	include ("../diseño/diseño.php");
	include ('../consultas/listar.php');
    include ("../consultas/buscar.php");
    include ("../consultas/modifica.php");
    if (isset($_GET)&& !empty($_GET)) {
        // code...
        $id=$_GET['id'];
    }
	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Modifiación de  <b>Stock</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_stock.php" class="btn btn-outline-secondary"><i class="icon-back"></i>Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    $data=buscarstock($id);
    modificastock();
    ?>
    <div>
        <form class="row" method="post">
            <div class="col-md-auto">
                <label class="form-label">Elegir playera</label>
                <select name="playera" class="form-select">
                    <option value="<?php echo $data->idplayera; ?>"><?php echo "$data->nombre_playera";?></option>
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
                    <option value="<?php echo $data->idtalla; ?>"><?php echo $data->talla; ?></option>
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
                    <option value="<?php echo $data->idcolor; ?>"><?php echo $data->color; ?></option>
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
                    <option value="<?php echo $data->idcorte; ?>"><?php echo $data->corte; ?></option>
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
                <input type="text" name="stock" class="form-control" required value="<?php echo $data->stock; ?>">
            </div>
            <div class="col-md-2">
                <label class="form-label">Costo</label>
                <input type="text" name="costo" class="form-control" placeholder="###.00" required value="<?php echo $data->costo; ?>" >
            </div>
            <div class="col-md-auto">
                <label class="form-label">Entrada</label>
                <input type="date" name="entrada" class="form-control" required readonly value="<?php echo $data->ultima_entrada; ?>">
            </div>

            <div class="col-md-12 pull-right" >
            <hr>
                <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
        </form>
    </div>
    
</div>
  
<?php pie();?>
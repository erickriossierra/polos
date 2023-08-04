<?php
	include ("../diseño/diseño.php");
	include ('../consultas/listar.php');
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
            <div class="col-md-6"><h2>Modificación de <b>Carreras</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_carreras.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    $data=buscarcarrera($id);
    modificacarrera();
    ?>
    <div>
        <form class="row" method="POST">
            <div class="col-md-6">
                <label class="form-label">Elegir facultad</label>
                <select name="facultad" class="form-select">
                    <option value="<?php echo $data->idfacultad ;?>"><?php echo $data->nombre_facultad ;?></option>
                    <?php
                    $listado=buscarfacultades();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idfacultad;
                        $nombre=$row->nombre_facultad;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Nombre largo</label>
                <input type="text" name="carrera" class="form-control" required value="<?php echo $data->nombre ;?>">
            </div>
            <div class="col-md-2">
                <label class="form-label">Nombre corto</label>
                <input type="text" name="corto" class="form-control" required maxlength="20" value="<?php echo $data->nombre_corto ;?>">
            </div>
            <div class="col-md-2">
                <label class="form-label">Iniciales</label>
                <input type="text" name="iniciales" class="form-control" required maxlength="10" value="<?php echo $data->iniciales ;?>">
            </div>

            <div class="col-md-12 pull-right" >
            <hr>
                <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
        </form>
    </div>
    
</div>
  
<?php pie();?>
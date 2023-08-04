<?php
	include ("../diseño/diseño.php");
    include ("../consultas/altas.php");

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Alta de <b>Universidad</b></h2></div>
            <div class="col-md-auto">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_universidades.php" class="btn btn-outline-secondary"><i class="icon-back"></i>Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    altauniversidad();
    ?>
    <div>
        <form class="row" method="POST">
                       
            <div class="col-md-6">
                <label class="form-label">Nombre largo</label>
                <input type="text" name="universidad" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Nombre corto</label>
                <input type="text" name="corto" class="form-control" required maxlength="20">
            </div>
            <div class="col-md-3">
                <label class="form-label">Iniciales</label>
                <input type="text" name="iniciales" class="form-control" required maxlength="10">
            </div>

            <div class="col-md-12 pull-right" >
            <hr>
                <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
        </form>
    </div>
    
</div>
  
<?php pie();?>
<?php
	include "../diseño/diseño.php";
	include '../consultas/baja.php';

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Baja de <b>stock</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_stock.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php
    bajastock()
    ?>
</div>
<?php pie();?>
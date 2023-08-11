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
            <div class="col-md-3">
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
            <!--
            <div class="col-md-10" id="div_comen">
                <label class="form-label">Comentario</label>
                <input class="form-control text-left" type="text" name="img" id="img">
            </div>
            <div class="col-md-10">
                <label class="form-label" for="dataimg">Imagen</label>
                <input disabled type="file" name="dataimg" id="dataimg" class="form-control ">
            </div>
            <div class="col-md-2">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="mod_img" onclick="colocaimg()">
                    <label class="form-check-label" for="mod_img">Colocar imágen</label>
                </div>
            </div>
        -->
            <div class="col-md-12 pull-right" >
            <hr>
                <button type="submit" class="btn btn-success">Guardar datos</button>
            </div>
        </form>
    </div>
    
</div>
<script type="text/javascript">
    /*
    function colocaimg() {
        // body...
        if (document.getElementById("mod_img").checked) {
            document.getElementById("dataimg").removeAttribute("disabled","");
            document.getElementById("dataimg").setAttribute("required","");
        }else{
            document.getElementById("dataimg").setAttribute("disabled","");
            document.getElementById("dataimg").removeAttribute("required","");
        }
    }
    */
</script>  
<?php pie();?>
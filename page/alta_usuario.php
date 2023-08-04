<?php
	include ("../diseño/diseño.php");
    include ("../consultas/altas.php");
    include ("../consultas/buscar.php");

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Alta de  <b>Usuario</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_usuarios.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    
    altauser();
    ?>
    <div>
        <form class="row" method="POST">
            <div class="col-md-4">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" name="apellidop" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Apellido Materno</label>
                <input type="text" name="apellidom" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Correo</label>
                <input type="text" name="correo" class="form-control" placeholder="ejemplo@dominio.com" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Celular/Teléfono</label>
                <input type="text" name="cel" class="form-control" required maxlength="10">
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir sexo</label>
                <select name="sexo" class="form-select">
                    <?php
                    $listado=buscarsexos();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idsexo;
                        $nombre=$row->nombre_sexo;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-1">
                <label class="form-label">Edad </label>
                <select name="edad" class="form-select">
                    <?php
                    $i=17;
                    while ($i<=70){
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo "$i";?></option>
                    <?php $i++; } ?>
                </select>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir rol</label>
                <select name="rol" class="form-select">
                    <?php
                    $listado=buscarpermisos();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idpermiso;
                        $nombre=$row->rol;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Elegir carrera</label>
                <select name="carrera" class="form-select">
                    <?php
                    $listado=buscarcarreras();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idcarrera;
                        $nombre=$row->nombre;
                        $iniciales=$row->nombre_corto;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre $iniciales";?></option>
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
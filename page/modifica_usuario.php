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
            <div class="col-md-6"><h2>Modificación de <b>Usuario</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_usuarios.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    $data=buscaruser($id);
    modificauser();
    ?>
    <div>
        <form class="row" method="POST">
            <div class="col-md-4">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required value="<?php echo $data->nombre; ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" name="apellidop" class="form-control" required value="<?php echo $data->apellidop; ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Apellido Materno</label>
                <input type="text" name="apellidom" class="form-control" required value="<?php echo $data->apellidom; ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Correo</label>
                <input type="text" name="correo" class="form-control" readonly value="<?php echo $data->correo; ?>">
                <input type="hidden" name="id" value="<?php echo $data->iduser; ?>">
            </div>
            <div class="col-md-2">
                <label class="form-label">Celular/Teléfono</label>
                <input type="text" name="cel" class="form-control" required value="<?php echo $data->cel; ?>">
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir sexo</label>
                <select name="sexo" class="form-select">
                    <option value="<?php echo $data->idsexo; ?>"><?php echo $data->sexo; ?></option>
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
                    <option value="<?php echo $data->edad; ?>"><?php echo $data->edad; ?></option>
                    <?php
                    $i=17;
                    while ($i<=70){
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo "$i";?></option>
                    <?php $i++; } ?>
                </select>
            </div>
        <?php if ($_SESSION['permisos']==1) {
                // code...
             ?>
            <div class="col-md-auto">
                <label class="form-label">Elegir rol</label>
                <select name="rol" class="form-select">
                    <option value="<?php echo $data->idrol; ?>"><?php echo $data->rol; ?></option>
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
        <?php } ?>
            <div class="col-md-6">
                <label class="form-label">Elegir carrera</label>
                <select name="carrera" class="form-select" >
                    <option value="<?php echo $data->idcarrera; ?>"><?php echo $data->carrera; ?></option>
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
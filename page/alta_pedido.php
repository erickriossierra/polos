<?php
	include ("../diseño/diseño.php");
    include ("../consultas/altas.php");
    include ("../consultas/buscar.php");
    include ("../consultas/listar.php");

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Alta de <b>Pedido</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_pedidos.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    $folio =mysqli_fetch_object(buscarfoliopedido());
    $folio=$folio->folio;
    //altaprepedido();
    ?>
    <div class="row">
    <!--    <form class="row" method="post">-->
            <div class="col-md-1">
                <label class="form-label">Folio</label>
                <input type="text" id="pedido" name="pedido" class="form-control" readonly onchange="readplayeras()" value="<?php echo $folio;?>">
            </div>
            <div class="col-md-5">
                <label class="form-label">Elegir Vendedor</label>
            <?php if ($_SESSION['permisos']==3) { ?>
                <input type="hidden" name="vendedor" id="vendedor" value="<?php echo $_SESSION['userid'] ?>">
            <?php } ?>
                <select name="vendedor" id="vendedor" class="form-select" <?php if ($_SESSION['permisos']==3) { echo "disabled"; }?> >
                    <?php
                if ($_SESSION['permisos']==3) {
                    echo "<option value='" ;
                    echo $_SESSION['userid']."'>";
                    echo $_SESSION['name']."</option>";
                }
                    $listado=buscarvendedores();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->iduser;
                        $nombre=$row->nombre;
                        $paterno=$row->apellidop;
                        $materno=$row->apellidom;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre $paterno $materno";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Elegir Cliente</label>
                <select id="cliente" name="cliente" class="form-select">
                    <?php
                    $listado=buscarclientes();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->iduser;
                        $nombre=$row->nombre;
                        $paterno=$row->apellidop;
                        $materno=$row->apellidom;
                        $carrera=$row->carrera;
                        $idcarrera=$row->idcarrera;
                        $facultad=$row->nombre_facultad;
                        $idfacultad=$row->idfacultad;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre $paterno $materno";?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <h3 class="display-5">Pedido de Playeras</h3>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir playera</label>
                <select id="playera" name="playera" class="form-select">
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
            <div class="col-md-1">
                <label class="form-label">Cantidad </label>
                <select id="cantidad" name="cantidad" class="form-select">
                    <?php
                    $i=1;
                    while ($i<=100){
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo "$i";?></option>
                    <?php $i++; } ?>
                </select>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir color</label>
                <select id="color" name="color" class="form-select">
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
                <label class="form-label">Elegir talla</label>
                <select id="talla" name="talla" class="form-select">
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
                <label class="form-label">Elegir corte</label>
                <select id="corte" name="corte" class="form-select">
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
            
            <div >
                <h3 class="display-5">Elegir bordado</h3>
            </div>
            <div class="col-md-6">
                <label class="form-label">Elegir carrera</label>
                <select id="carrera" name="carrera" class="form-select">
                    
                    <?php
                    $listado=buscarcarreras();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idcarrera;
                        $nombre=$row->nombre;
                        $iniciales=$row->nombre_corto;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre ($iniciales)";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Elegir Fecha de entrega</label>
                <input class="form-control" type="date" id="entrega"name="entrega" min="<?php $hoy=date("Y-m-d"); echo $hoy;?>" required >
            </div>

            <!--<div class="col-md-12 pull-right" >
                <hr>
                <button type="submit" class="btn btn-outline-primary">Guardar en tabla</button>
            </div>-->
            <div class="col-md-3"></div>
            <div class="col-md-6 " style="margin: 10px 0;">
                <!--<input type="submit" id="add" class="btn btn-outline-cont" value="Agregar tarea">-->
                <button class="btn btn-outline-primary" onclick="addplayera()">Agregar</button>
            </div>
            <div class="col-md-3"></div>
            
        <!--</form>-->
    </div>
    <!-- LLENADO DE TABLA TEMPORAL -->
<!--<div class="table-title">
        <div class="row">
            <div class="col-md-12"><h2 class="text-center">Tabla de <b>Playeras</b></h2></div>
            
        </div>
    </div>
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="numero">#</th>                
                <th>Carrera</th>           
                <th>Playera</th>                       
                <th>Talla</th>
                <th>Color</th>
                <th>Corte</th>
                <th class="numero">Cantidad</th>
                <th>Entrega</th>
                <th class="numero">Acciones</th>         
            </tr>
        </thead>
         
        <tbody>    
<?php 
$listado=listarprepedidos($folio);

while ($row=mysqli_fetch_object($listado)){
$id=$row->idprepedido;
$cantidad=$row->cantidad;
$playera=$row->nombre_playera;
$talla=$row->letra;
$color=$row->nombre_color;
$corte=$row->nombre_corte;
$carrera=$row->iniciales;
$entrega=$row->entrega;

?>
    <tr>
        <td class="numero">
            <?php echo $id;?>
        </td>      
        <td>
            <?php echo $carrera;?>            
        </td>
        <td >
            <?php echo $playera;?>
        </td>
        <td>
            <?php echo $talla;?>                
        </td>
        <td>
            <?php echo $color; ?> 
        </td>
        <td>
            <?php echo $corte; ?> 
        </td>
        <td class="numero">
            <?php echo $cantidad; ?> 
        </td>
        <td>
            <?php echo $entrega; ?> 
        </td>            
        <td class="numero">
       <a href="quita_pedido.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="return Confirmation()">
            <i class="icon-trash"></i>
        </a>

        </td>
    </tr>   
<?php
}
?> 

        </tbody>
    </table>-->
    <div>
        <div class="col-md-12" id="msg"></div>
        <div id="records_content"></div>
    </div>
    <div class="col-md-12 pull-right" >
        <hr>
        <button onclick="addplayera()" type="button" class="btn btn-success">Guardar datos</button>
    </div>
</div>
<script type="text/javascript" src="../js/scripts_pedidos.js"></script>
<script type="text/javascript" src="../js/scripts_playeras.js"></script>
<script type="text/javascript">
    function Confirmation() {

        if (confirm('Esta seguro de eliminar el registro?')==true) {
            return true;
        }else{
            return false;
        }
    }
</script>

<?php pie();?>
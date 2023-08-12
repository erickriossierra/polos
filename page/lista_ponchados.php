<?php
	include "..\diseño\diseño.php";
	include '../consultas/listar.php';
    include '../consultas/buscar.php';

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Listado de <b>Ponchados</b></h2></div>

            <div class="col-md-4"></div>
            <div class="col-md-2 div_abajo">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>

        </div>
    </div>
<!-- INICIO FILTROS -->
    <div id="filtros"> Selecciona el filtro deseado
        <form class="row" action="lista_ponchados.php" method="post">
            <div class="col-md-2" id="div_select">
                <select class="form-select" name="filtro" id="filtro" onchange="filtros()">
                    <option value="0"></option>
                    <option value="1">Pedido</option>
                    <option value="2">Cliente</option>
                    <option value="3">Carrera</option>
                    <option value="4">Fecha</option>
                    <option value="5">Talla</option>
                    <option value="6">Color</option>
                    <option value="7">Playera</option>
                    <option value="8">Estatus</option>
                </select>
            </div>
            <div class="col-md-1" name="div_text" id="div_text">
                <input type="text" name="texto" id="texto" class="form-control">
            </div>
            <div class="col-md-6" name="div_text2" id="div_text2">
                <input type="texto" name="texto2" id="texto2" class="form-control">
            </div>
            <div class="col-md-6" name="div_text3" id="div_text3">
                <input type="texto" name="texto3" id="texto3" class="form-control">
            </div>
            <div class="col-md-4" name="div_fecha" id="div_fecha">
                <input type="date" name="fecha" id="fecha" max="<?php $hoy=date("Y-m-d"); echo $hoy;?>" class="form-control" >
            </div>
            <div class="col-md-4" name="div_fecha2" id="div_fecha2">
                <input type="date" name="fecha2" id="fecha2" class="form-control" value="<?php echo $hoy;?>" >
            </div>
            <div class="col-md-auto" id="div_talla">
                <select class="form-select" name="talla" id="talla">
<?php
$listado=buscartallas();

while ($row=mysqli_fetch_object($listado)){
    $id=$row->idtalla;
    $letra=$row->letra;
?>
                    <option value="<?php echo $id; ?>"><?php echo $letra; ?></option>
<?php } ?>
                </select>
            </div>
            <div class="col-md-auto" id="div_color">
                <select class="form-select" name="color" id="color">
<?php
$listado=buscarcolores();

while ($row=mysqli_fetch_object($listado)){
    $id=$row->idcolor;
    $color=$row->nombre_color;
?>
                    <option value="<?php echo $id; ?>"><?php echo $color; ?></option>
<?php } ?>
                </select>
            </div>
            <div class="col-md-auto" id="div_playera">
                <select class="form-select" name="playera" id="playera">
<?php
$listado=buscarplayeras();

while ($row=mysqli_fetch_object($listado)){
    $id=$row->idplayera;
    $playera=$row->nombre_playera;
?>
                    <option value="<?php echo $id; ?>"><?php echo $playera; ?></option>
<?php } ?>
                </select>
            </div>
            <div class="col-md-auto" id="div_estatus">
                <select class="form-select" name="estatus" id="estatus">
<?php
$listado=buscarestatuscxp();

while ($row=mysqli_fetch_object($listado)){
    $id=$row->idestatus;
    $estatus=$row->nombreestatus;
?>
                    <option value="<?php echo $id; ?>"><?php echo $estatus; ?></option>
<?php } ?>                    
                </select>
            </div>
            <div class="col-md-2">
                <button id="btn_filtro" class="btn btn-outline-primary" type="submit">Filtrar</button>
            </div>
        </form>
    </div>
 <!--FILTROS FIN-->   
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Pedido</th>          
                    <th>Cliente</th>
                    <th>Playera</th> 
                    <th>Corte</th>            
                    <th>Color</th> 
                    <th class="numero">Talla</th> 
                    <th class="numero">Carrera</th> 
                    <th class="numero">Facultad</th> 
                    <th class="numero">Universidad</th> 
                    <th class="numero">Cantidad</th>                      
                    <th>Entrega</th>
                    <th>Estatus</th>
                    <th class="numero">Acciones</th>
              
                </tr>
            </thead>
             
            <tbody>    
    <?php 
    $listado=listarponchados();

    while ($row=mysqli_fetch_object($listado)){
        $id=$row->idclixplay;
        $idpedido=$row->idpedido;
        $playera=$row->nombre_playera;
        $corte=$row->nombre_corte;
        $color=$row->nombre_color;
        $talla=$row->letra;
        $carrera=$row->caini;
        $facultad=$row->faini;
        $universidad=$row->siglas;
        $cantidad=$row->cantidad;
        $entrega=$row->fecha_entrega;
        $nombre=$row->nombre;
        $nombre=$nombre.' '.$row->apellidop;
        $estatus=$row->estatus;

    ?>
        <tr>
            <td class="numero">
                <?php echo $idpedido;?>
            </td>            
            <td>
                <?php echo $nombre;?>
            </td>
            <td>
                <?php echo $playera;?>
            </td>
            <td>
                <?php echo $corte;?>
            </td>
            <td>
                <?php echo $color;?>
            </td>
            <td class="numero">
                <?php echo $talla;?>
            </td>
            <td class="numero">
                <?php echo $carrera;?>
            </td>
            <td class="numero">
                <?php echo $facultad;?>
            </td>
            <td class="numero">
                <?php echo $universidad;?>
            </td>
            <td class="numero">
                <?php echo $cantidad;?>            
            </td>
            <td>
                <?php echo $entrega;?>                
            </td>
            <td>
                <?php echo $estatus; ?> 
            </td>
    <?php if ( $_SESSION['permisos']!=2){ ?>                
            <td class="numero">
            <a href="modifica_ponchado.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip">
                <i class="icon-edit"></i>
            </a>
        
            </td>
    <?php } ?>
        </tr>   
    <?php
    }
    ?> 

            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    function Confirmation() {

        if (confirm('Esta seguro de eliminar el registro?')==true) {
            return true;
        }else{
            return false;
        }
    }

    function filtros(){
        getSelectValue=document.getElementById("filtro").value;
        if (getSelectValue=="1") {        
            document.getElementById("div_text").style.display = "block";
            document.getElementById("texto").setAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_estatus").style.display = "none";
        }else if (getSelectValue=="2") {
            document.getElementById("div_text2").style.display = "block";
            document.getElementById("texto2").setAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_estatus").style.display = "none";
        }else if (getSelectValue=="3"){
            document.getElementById("div_text3").style.display = "block";
            document.getElementById("texto3").setAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_estatus").style.display = "none";
        } else if (getSelectValue=="4") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "block";
            document.getElementById("fecha").setAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "block";
            document.getElementById("fecha2").setAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_estatus").style.display = "none";
        } else if (getSelectValue=="5") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "block";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_estatus").style.display = "none";
        } else if (getSelectValue=="6") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "block";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_estatus").style.display = "none";
        } else if (getSelectValue=="7") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "block";
            document.getElementById("div_estatus").style.display = "none";
            } else if (getSelectValue=="8") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_estatus").style.display = "block";
        }else{
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_estatus").style.display = "none";
        }
    }
</script>     


<?php pie();?>
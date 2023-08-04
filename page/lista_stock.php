<?php
	include "../diseño/diseño.php";
	include '../consultas/listar.php';
    include '../consultas/buscar.php';

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Listado de  <b>Stock</b></h2></div>
<?php if ($_SESSION['permisos']!=1 AND $_SESSION['permisos']!=5) { ?>
            <div class="col-md-4"></div>
<?php } ?>            
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
<?php if ($_SESSION['permisos']==1 OR $_SESSION['permisos']==5) { ?>
            <div class="col-md-4">
                <a href=".\alta_stock.php" class="btn btn-outline-success"><i class="icon-circle-with-plus"></i> Alta inventario</a>
            </div>
<?php } ?>
        </div>
    </div>
<!-- INICIO FILTROS -->
    <div id="filtros"> Selecciona el filtro deseado
        <form class="row" action="lista_stock.php" method="post">
            <div class="col-sm-2">
            <select class="form-select" name="filtro" id="filtro" onchange="filtros()">
                <option value="0"></option>
                <option value="1">Stock</option>
                <option value="3">Fecha Entrega</option>
                <option value="4">Fecha Salida</option>
                <option value="5">Talla</option>
                <option value="6">Color</option>
                <option value="7">Playera</option>
                <option value="8">Corte</option>
            </select>
            </div>
            <div class="col-md-1" name="div_text" id="div_text">
                <input type="text" name="texto" id="texto" class="form-control">
            </div>
            <div class="col-sm-4" name="div_fecha" id="div_fecha">
                <input type="date" name="fecha" id="fecha" class="form-control" >
            </div>
            <div class="col-sm-4" name="div_fecha2" id="div_fecha2">
                <input type="date" name="fecha2" id="fecha2" class="form-control">
            </div>
            <div class="col-sm-auto" name="div_signo" id="div_signo">
                <select class="form-select" name="signo" id="signo">
                    <option value="=">Igual</option>
                    <option value="<">Menor que</option>
                    <option value=">">Mayor que</option>
                    <option value="<=">Menor o igual que</option>
                    <option value=">=">Igual o mayor que</option>
                    <option value="<>">Diferente a</option>
                </select>
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
            <div class="col-md-auto" id="div_corte">
                <select class="form-select" name="corte" id="corte">
<?php
$listado=buscarcortes();

while ($row=mysqli_fetch_object($listado)){
    $id=$row->idcorte;
    $corte=$row->nombre_corte;
?>
                    <option value="<?php echo $id; ?>"><?php echo $corte; ?></option>
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
                    <th>Playera</th>
                    <th class="numero">Stock</th> 
                    <th>Color</th>                       
    				<th>Talla</th>
                    <th>Corte</th>
                    <th class="numero">Costo</th>
                    <th>Entrada</th>
                    <th>Salida</th>
        <?php if ($_SESSION['permisos']==1 OR $_SESSION['permisos']==5) { ?>
                    <th class="numero">Acciones</th>
        <?php } ?>
                </tr>
            </thead>
             
            <tbody>    
    <?php 

    $listado=listarstock();

    while ($row=mysqli_fetch_object($listado)){
    $id=$row->idstock;
    $costo=$row->costo;
    $color=$row->color;
    $talla=$row->talla;
    $corte=$row->corte;
    $cantidad=$row->stock;
    $playera=$row->playera;
    $entrada=$row->ultima_entrada;
    $salida=$row->ultima_salida;

    ?>
        <tr>
            <td>
                <?php echo $playera;?>
            </td>
            <td class="numero">
                <?php echo $cantidad;?>
            </td>
            <td>
                <?php echo $color;?>            
            </td>
            <td>
                <?php echo $talla;?>
            </td>
            <td>
                <?php echo $corte;?>                
            </td>
            <td class="numero">
                <?php echo '$'.number_format($costo,2,'.',',');?>      
            </td>
            <td>
                <?php echo $entrada;?>                
            </td>
            <td>
                <?php echo $salida;?>                
            </td>
    <?php if ($_SESSION['permisos']==1 OR $_SESSION['permisos']==5 ) { ?>                
            <td class="numero">
            <a href="modifica_stock.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip">
                <i class="icon-edit"></i>
            </a>
            <a href="quita_stock.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="return Confirmation()">
                <i class="icon-trash"></i>
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
            document.getElementById("div_signo").style.display = "block";
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_corte").style.display = "none";
        }else if (getSelectValue=="3"){
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_signo").style.display = "block";
            document.getElementById("div_fecha").style.display = "block";
            document.getElementById("fecha").setAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_corte").style.display = "none";
        } else if (getSelectValue=="4") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_signo").style.display = "block";
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "block";
            document.getElementById("fecha2").setAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_corte").style.display = "none";
        } else if (getSelectValue=="5") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_signo").style.display = "none";
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "block";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_corte").style.display = "none";
        } else if (getSelectValue=="6") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_signo").style.display = "none";
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "block";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_corte").style.display = "none";
        } else if (getSelectValue=="7") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_signo").style.display = "none";
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "block";
            document.getElementById("div_corte").style.display = "none";
            } else if (getSelectValue=="8") {
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_signo").style.display = "none";
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_corte").style.display = "block";
        }else{
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_signo").style.display = "none";
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_talla").style.display = "none";
            document.getElementById("div_color").style.display = "none";
            document.getElementById("div_playera").style.display = "none";
            document.getElementById("div_corte").style.display = "none";
        }
    }
</script>     


<?php pie();?>
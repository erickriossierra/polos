<?php
	include "..\diseño\diseño.php";
	include '../consultas/listar.php';

	encabezado();
    $hoy=date("Y-m-d");
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Listado de <b>Pedidos</b></h2></div>
<?php if ($_SESSION['permisos']==1 OR $_SESSION['permisos']==3) { ?>            
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4 div_entre">
                <a href=".\alta_pedido.php" class="btn btn-outline-success"><i class="icon-circle-with-plus"></i> Alta pedido</a>
            </div>
<?php } else{ ?> 
            <div class="col-md-4"></div>
            <div class="col-md-2 div_abajo">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
<?php }?>
        </div>
    </div>
<!-- INICIO FILTROS -->
    <div id="filtros"> Selecciona el filtro deseado
        <form class="row" action="lista_pedidos.php" method="post">
            <div class="col-md-2" id="div_select">
            <select class="form-select" name="filtro" id="filtro" onchange="filtros()">
                <option value="0"></option>
                <option value="1">Pedido</option>
                <option value="2">Cliente</option>
                <option value="3">Pagado</option>
                <option value="4">Estatus</option>
                <option value="5">Fecha</option>
            </select>
            </div>
            <div class="col-md-2" name="div_text" id="div_text">
                <input type="text" name="texto" id="texto" class="form-control">
            </div>
            <div class="col-md-6" name="div_text2" id="div_text2">
                <input type="texto" name="texto2" id="texto2" class="form-control">
            </div>
            <div class="col-md-3" id="div_pago">
                <select class="form-select" name="pago" id="pago">
                    <option value="7">Pagado</option>
                    <option value="8">No Pagado</option>
                    <option value="9">Parcialmente Pagado</option>
                </select>
            </div>
            <div class="col-md-2" id="div_estatus" >
                <select class="form-select" name="estatus" id="estatus">
                    <option value="4">Pendiente</option>
                    <option value="6">Entregado</option>
                    <option value="10">En Camino</option>
                </select>
            </div>
            <div class="col-md-4" name="div_fecha" id="div_fecha">
                <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $hoy;?>" >
            </div>
            <div class="col-md-4" name="div_fecha2" id="div_fecha2">

                <input type="date" name="fecha2" id="fecha2" class="form-control" value="<?php echo $hoy;?>" min="<?php echo $hoy;?>" >
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
    <?php if ( $_SESSION['permisos']!=2){ ?>                 
                    <th>Cliente</th>
    <?php }else{ ?> 
                    <th class="numero"># Pedido</th>
    <?php } ?>                
                    <th class="numero">Cantidad</th> 
                    <th class="numero">Total</th>                       
                    <th>Entrega</th>
                    <th>Estatus</th>
                    <th>Pago</th>
    <?php if ( $_SESSION['permisos']==1 OR $_SESSION['permisos']==3){ ?> 
                    <th class="numero">Acciones</th>
    <?php } ?>            
                </tr>
            </thead>        
            <tbody>    
    <?php 
    if ( $_SESSION['permisos']!=2){ 
        $listado=listarpedidos();
    }else{
        $listado=listarpedcli($_SESSION['userid']);
    }

    while ($row=mysqli_fetch_object($listado)){
    $id=$row->idpedido;
    $cantidad=$row->cantidad;
    $total=$row->total;
    $entrega=$row->fecha_entrega;
    $nombre=$row->nombre;
    $nombre=$nombre.' '.$row->apellidop;
    $estatus=$row->estatus;
    $pago=$row->pago;

    ?>
        <tr>
    <?php if ( $_SESSION['permisos']!=2){ ?>                 
            <td>
            <?php echo $nombre;?>
            </td>
    <?php }else{ ?> 
            <td class="numero">
                <?php echo $id;?>
            </td>
    <?php } ?>         
            <td class="numero">
                <?php echo $cantidad;?>            
            </td>
            <td class="numero">
                <?php echo '$'.number_format($total,2,'.',',');?>
            </td>
            <td>
                <?php echo $entrega;?>                
            </td>
            <td>
                <?php echo $estatus; ?> 
            </td>
            <td>
                <?php echo $pago; ?> 
            </td>
    <?php if ( $_SESSION['permisos']==1 OR $_SESSION['permisos']==3){ ?>                
            <td class="numero">
            <a href="modifica_pedido.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip">
                <i class="icon-edit"></i>
            </a>
        <?php if ( $_SESSION['permisos']==1){ ?>
            <a href="quita_pedido.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="return Confirmation()">
                <i class="icon-trash"></i>
            </a>
        <?php } ?>
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
            document.getElementById("div_pago").style.display = "none";
            document.getElementById("pago").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display = "none";
            document.getElementById("estatus").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
        }else if (getSelectValue=="2") {
            document.getElementById("div_text2").style.display = "block";
            document.getElementById("texto2").setAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_pago").style.display = "none";
            document.getElementById("pago").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display = "none";
            document.getElementById("estatus").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
        }else if (getSelectValue=="3"){
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_pago").style.display = "block";
            document.getElementById("pago").setAttribute("required", "required");
            document.getElementById("div_estatus").style.display = "none";
            document.getElementById("estatus").removeAttribute("required", "required");
        }else if (getSelectValue=="4"){
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_pago").style.display = "none";
            document.getElementById("pago").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display = "block";
            document.getElementById("estatus").setAttribute("required", "required");
        }else if (getSelectValue=="5"){
            document.getElementById("div_fecha").style.display = "block";
            document.getElementById("fecha").setAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "block";
            document.getElementById("fecha2").setAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_pago").style.display = "none";
            document.getElementById("pago").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display = "none";
            document.getElementById("estatus").removeAttribute("required", "required");
        }else{
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_pago").style.display = "none";
            document.getElementById("pago").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display = "none";
            document.getElementById("estatus").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
        }
    }
</script>     


<?php pie();?>
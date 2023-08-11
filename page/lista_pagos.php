<?php
	include "..\diseño\diseño.php";
	include '../consultas/listar.php';
    include '../consultas/calculos.php';

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6">
                <h2>Listado de <b>Pagos</b> Pendientes</h2>
            </div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
             <div class="col-md-4">
                <a href=".\alta_pago.php" class="btn btn-outline-success"><i class="icon-circle-with-plus"></i> Alta Pago</a>
            </div>
        </div>
    </div>
    <!-- INICIO FILTROS -->
    <div id="filtros"> Selecciona el filtro deseado
        <form class="row" action="lista_pagos.php" method="post">
            <div class="col-sm-2">
            <select class="form-select" name="filtro" id="filtro" onchange="filtros()">
                <option value="0"></option>
                <option value="1"># Pedido</option>
                <option value="2">Cliente</option>
                <option value="3">Fecha pago</option>
                <option value="4">Estatus</option>
                <option value="5">Todos</option>
            </select>
            </div>
            <div class="col-sm-2" name="div_text" id="div_text">
                <input type="text" name="texto" id="texto" class="form-control">
            </div>
            <div class="col-sm-6" name="div_text2" id="div_text2">
                <input type="texto" name="texto2" id="texto2" class="form-control text-left">
            </div>
            <div class="col-sm-4" name="div_fecha" id="div_fecha">
                <input type="date" name="fecha" id="fecha" max="<?php $hoy=date("Y-m-d"); echo $hoy;?>" class="form-control" >
            </div>
            <div class="col-sm-4" name="div_fecha2" id="div_fecha2">
                <input type="date" name="fecha2" id="fecha2" class="form-control" value="<?php echo $hoy;?>" >
            </div>
            <div class="col-md-2" name="div_estatus" id="div_estatus">
                <select class="form-select" id="estatus" name="estatus">
                    <option value="7">Pagado</option>
                    <option value="9">Parcialmente Pagado</option>
                    <option value="8">No Pagado</option>
                </select>
            </div>

            <div class="col-md-2">
            <button id="btn_filtro" class="btn btn-outline-primary" type="submit">Filtrar</button>
            </div>
        </form>
    </div>
    <!--FILTROS FIN-->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>             
                <th>Cliente</th>
                <th class="numero"> # Pedido </th>
                <th class="numero">Total</th> 
                <th class="numero">Abonos</th>  
                <th class="numero">Saldos</th>       
				<th>Fecha</th>
                <th>Estado</th>
            <?php if ($_SESSION['permisos']==1) { ?>
                <th class="numero">Acciones</th>   
            <?php } ?>       
            </tr>
        </thead>
         
        <tbody>    
<?php 

$listado=listarsaldos();
while ($row=mysqli_fetch_object($listado)){
$id=$row->idpago;
//$entrega=$row->fecha_pago;
$nombre=$row->nombre;
$pedido=$row->idpedido;
$estatus=$row->nombreestatus;

$abonos= calculospagos($pedido);
//print_r($row);
?>
    <tr>               
        <td>
            <?php echo $nombre;?>
        </td>
        <td class="numero">
            <?php echo $pedido; ?>
        </td>
        <td class="numero">
            <?php echo '$ '.number_format($abonos->total,2,'.',',');?>
        </td>
        <td class="numero">
            <?php echo '$ '.number_format($abonos->abonos,2,'.',',');?>
            <table class="table table-success table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Monto</th>
                        <th>Fecha</thdh>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $listado2=listarpagos($pedido);
                    while ($row2=mysqli_fetch_object($listado2)){
                    $id=$row2->idpago;
                    $ultimo=$row2->fecha_pago;
                    $date= new DateTimeImmutable($ultimo);
                    $pago=$row2->monto;  
                            
                ?>        
                    <tr>
                        <td class="numero"><?php echo $id ?></td>
                        <td class="numero"><?php echo $pago ?></td>
                        <td class="numero"><?php echo date_format($date,"d/m/Y"); ?></td>
                    </tr>
                <?php } ?>                
                </tbody>
            </table>
        </td>
        <td class="numero">
            <?php echo '$ '.number_format($abonos->saldo,2,'.',',');?>
        </td>
       
        <td>
            <?php echo $abonos->ultimo;?>                
        </td>
        <td><?php echo $estatus; ?></td>  
             
<?php if ($_SESSION['permisos']==1) { ?>                
            <td class="numero">
            <a href="modifica_pago.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip">
                <i class="icon-edit"></i>
            </a>
            <a href="quita_pago.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="return Confirmation()">
                <i class=" icon-trash"></i>
            </a>
            </td>
<?php } ?>

    </tr>  
<?php } ?> 
        </tbody>
    </table>
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
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display="none";
            document.getElementById("estatus").removeAttribute("required","required");
        }else if (getSelectValue=="2") {
            document.getElementById("div_text2").style.display = "block";
            document.getElementById("texto2").setAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display="none";
            document.getElementById("estatus").removeAttribute("required","required");
        }else if (getSelectValue=="3"){
            document.getElementById("div_fecha").style.display = "block";
            document.getElementById("fecha").setAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "block";
            document.getElementById("fecha2").setAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display="none";
            document.getElementById("estatus").removeAttribute("required","required");
        }else if (getSelectValue=="4"){
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display="block";
            document.getElementById("estatus").setAttribute("required","required");

        }else{
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_fecha").style.display = "none";
            document.getElementById("fecha").removeAttribute("required", "required");
            document.getElementById("div_fecha2").style.display = "none";
            document.getElementById("fecha2").removeAttribute("required", "required");
            document.getElementById("div_estatus").style.display="none";
            document.getElementById("estatus").removeAttribute("required","required");

        }
    }
</script>     


<?php pie();?>
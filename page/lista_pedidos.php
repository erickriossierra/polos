<?php
	include "..\diseño\diseño.php";
	include '../consultas/listar.php';

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Listado de <b>Pedidos</b></h2></div>
<?php if ($_SESSION['permisos']==1 OR $_SESSION['permisos']==3) { ?>            
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\alta_pedido.php" class="btn btn-outline-success"><i class="icon-circle-with-plus"></i> Alta pedido</a>
            </div>
<?php } else{ ?> 
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
<?php }?>
        </div>
    </div>
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
<?php
require_once '../consultas/conexion.php'; //libreria de conexion a la base
require_once '../consultas/listar.php';
$conn=conectarse();
$folio = filter_input(INPUT_POST, 'folio');
// difinir el encabezado de la tabla
$data = '<table class="table table-bordered table-hover">
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
         
        <tbody> ';

$query = listarprepedidos($folio);

if (!$result = $query) {
	exit(mysqli_error($conn));
}
// condicional
if(mysqli_num_rows($result) > 0)
{

while($row =mysqli_fetch_object($result))
{

	$id=$row->idprepedido;
	$cantidad=$row->cantidad;
	$playera=$row->nombre_playera;
	$talla=$row->letra;
	$color=$row->nombre_color;
	$corte=$row->nombre_corte;
	$carrera=$row->iniciales;
	$entrega=$row->entrega;
	$data .= '
					<tr>
				        <td class="numero">'.$id.'
				        </td>      
				        <td>'.$carrera.'            
				        </td>
				        <td >'.$playera.'
				        </td>
				        <td>'.$talla.'                
				        </td>
				        <td>'.$color.'
				        </td>
				        <td>'.$corte.' 
				        </td>
				        <td class="numero">'.$cantidad.' 
				        </td>
				        <td>'.$entrega.'
				        </td>            
				        <td class="numero">
       						<!--<a href="quita_pedido.php?id='.$id.'" class="delete" title="Eliminar" data-toggle="tooltip" onclick="Deleteplayera('.$id.')">
            					<i class="icon-trash"></i>
        					</a>-->
        					<button class="delete" title="Eliminar" data-toggle="tooltip" onclick="Deleteplayera('.$id.')"><i class="icon-trash"></i></button>
        </td>
				    </tr>   ';

	}
}
else
{
	// No hay registros
	$data .= '<tr><td colspan="7" class="text-center">No hay tareas</td></tr>';
}
$data .= '</tbody></table>';
echo $data;
?>
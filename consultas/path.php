<?php
function pagina(){
	$pagina = $_SERVER['REQUEST_URI'];
	//$pagina = substr($pagina, -4);

       if (substr($pagina,-4)<>'.php') {
       // print_r($pagina. 'Normal <br>');
            $pagina=substr($pagina,0,-5);
            if (substr($pagina,-4)<>'.php') {
               // print_r($pagina. '-5 <br>');
                $pagina=substr($pagina,0,-1);
                if (substr($pagina,-5)<>'.php') {
                    $pagina=substr($pagina,0,-5);
                  //  print_r($pagina. '-5 <br>');
                    if (substr($pagina,-4)<>'.php') {
                        $pagina=substr($pagina,0,-1);
                    //    print_r($pagina. '-1 <br>');
                    }
                }
            }
            
        }

    if ($pagina=="/page/login.php") {
        # code... PRINCIPAL
            $pagina="WELCOME";
            //TITLE 
        }elseif ($pagina=="/page/portal.php") {
            $pagina="Portal";

/***************TITLE DE LISTAS *******************/
        }elseif ($pagina=="/page/lista_pedidos.php") {
            // code...
            $pagina="Pedidos";

        }elseif ($pagina=="/page/lista_carreras.php") {
            // code...
            $pagina="Carreras";

        }elseif ($pagina=="/page/lista_clientes.php") {
            // code...
            $pagina="Clientes";

        }elseif ($pagina=="/page/lista_stock.php") {
            // code...
            $pagina="Stocks";

        } elseif ($pagina=="/page/lista_usuarios.php") {
            // code...
            $pagina="Usuarios";
        } elseif ($pagina=="/page/lista_universidades.php") {
            // code...
            $pagina="Universidades";
        } elseif ($pagina=="/page/lista_facultades.php") {
            // code...
            $pagina="Facultades";
        } elseif ($pagina=="/page/lista_entregas.php") {
            // code...
            $pagina="Entregas"; 
         } elseif ($pagina=="/page/lista_ponchados.php") {
            // code...
            $pagina="Ponchados"; 
        } elseif ($pagina=="/page/lista_pagos.php") {
            // code...
            $pagina="Pagos"; 

/******************TITLE ALTAS*************************/
        }elseif ($pagina=="/page/alta_stock.php") {
            // code...
            $pagina="Alta Stock";

        }elseif ($pagina=="/page/alta_facultad.php") {
            // code...
            $pagina="Alta Facultad";

        }elseif ($pagina=="/page/alta_carrera.php") {
            // code...
            $pagina="Alta Carrera";

        }elseif ($pagina=="/page/alta_cliente.php") {
            // code...
            $pagina="Alta Cliente";

        }elseif ($pagina=="/page/alta_pedido.php") {
            // code...
            $pagina="Alta Pedido";

        }elseif ($pagina=="/page/alta_usuario.php") {
            // code...
            $pagina="Alta Usuario";
        }elseif ($pagina=="/page/alta_universidad.php") {
            // code...
            $pagina="Alta Universidad";
        } elseif ($pagina=="/page/alta_facultad.php") {
            // code...
            $pagina="Alta Facultad";
        } elseif ($pagina=="/page/alta_entrega.php") {
            // code...
            $pagina="Alta Entrega";  
        } elseif ($pagina=="/page/alta_pago.php") {
            // code...
            $pagina="Alta Pago";

/******************TITLE QUITA*************************/
        }elseif ($pagina=="/page/quita_stock.php") {
            // code...
            $pagina="Baja Stock";

        }elseif ($pagina=="/page/quita_usuario.php") {
            // code...
            $pagina="Baja Usuario";
        }elseif ($pagina=="/page/quita_universidad.php") {
            // code...
            $pagina="Baja Universidad";
        } elseif ($pagina=="/page/quita_facultad.php") {
            // code...
            $pagina="Baja Facultad";
        } elseif ($pagina=="/page/quita_carrera.php") {
            // code...
            $pagina="Baja Carrera";
        } elseif ($pagina=="/page/quita_pedido.php") {
            // code...
            $pagina="Baja Pedido";

/******************TITLE EDITA*************************/
        }elseif ($pagina=="/page/modifica_stock.php") {
            // code...
            $pagina="Editar Stock";

        }elseif ($pagina=="/page/modifica_usuario.php") {
            // code...
            $pagina="Editar Usuario";

        }elseif ($pagina=="/page/modifica_carrera.php") {
            // code...
            $pagina="Editar Carrera";

        }elseif ($pagina=="/page/modifica_facultad.php") {
            // code...
            $pagina="Editar Facultad";

        }elseif ($pagina=="/page/modifica_pedido.php") {
            // code...
            $pagina="Editar Pedido";

        }elseif ($pagina=="/page/modifica_universidad.php") {
            // code...
            $pagina="Editar Universidad";
        }elseif ($pagina=="/page/modifica_entrega.php") {
            // code...
            $pagina="Editar Entrega";
        }elseif ($pagina=="/page/modifica_ponchado.php") {
            // code...
            $pagina="Editar Estatus Ponchado";
        }elseif ($pagina=="/page/modifica_pago.php") {
            // code...
            $pagina="Editar Pago";

            /******* NO ENCONTRADO ARCHIVO ******/
        }else{
            $pagina="not found";
        }

	return $pagina;
}
?>
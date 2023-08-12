<?php
include '..\consultas\path.php';

function inicio(){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="..\css\estilos.css">
    <!--<link rel="stylesheet" type="text/css" href="..\fonts\style.css">-->

	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

    <title>Login</title>
    <style>
		/*@import url(https://fonts.googleapis.com/css?family=Roboto:300);
		 */ 
		* {
		box-sizing: border-box;
		}

		*:focus {
		  outline: none;
		}
		body {
		font-family: Arial;
		background-color: #3498DB;
		padding: 50px;
		}
  
	</style>

    </head>
    
<body>
<?php	
}

function encabezado(){
	session_start();
    // Si el usuario no se ha logueado se le regresa al inicio.
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit; 
    }
    setlocale(LC_TIME, 'es_ES');
    date_default_timezone_set('America/Mexico_City');
	/**Estructura paginas */
	$pagina=pagina();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $pagina ?></title>

	<link rel="stylesheet" type="text/css" href="..\css\estilos.css">
	<link rel="stylesheet" type="text/css" href="..\fonts\style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	

</head>

<body>
	<div class="container">

		<!--INICIO MENU-->
		<nav class="navbar navbar-expand-lg navbar-light ">
		  <div class="container-fluid">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		      <a class="navbar-brand" href="#">Menú</a>
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="./portal.php"><i class=" icon-home"></i> Inicio</a>
		        </li>
<?php if ($_SESSION['permisos']==1) { ?>
		        <li class="nav-item">
		        	<a class="nav-link" href="./lista_usuarios.php"><i class="icon-user"></i> Usuarios</a>
		        </li> 
<?php } ?>
		        <li class="nav-item">
		          <a class="nav-link" href="./lista_pedidos.php"><i class="icon-open-book"></i> Pedidos</a>
		        </li>
<?php if ($_SESSION['permisos']!=2) { ?>		     
	<!--       <li class="nav-item">
		          <a class="nav-link" href="./lista_stock.php"><i class=" icon-database"></i> Playeras Stock</a>
		        </li> -->
	<?php if ($_SESSION['permisos']!=4) { ?>		        
		        <li class="nav-item">
		          <a class="nav-link" href="./lista_clientes.php"><i class="icon-man"></i> Clientes</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="Instituciones" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-graduation-cap"></i>
		            Instituciones
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="Instituciones">
		            <li><a class="dropdown-item" href="./lista_universidades.php">Universidades</a></li>
		            <li><a class="dropdown-item" href="./lista_facultades.php">Facultades</a></li>
		            <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item" href="./lista_carreras.php">Carreras</a></li>
		          </ul>
		        </li>
	<?php } ?>		        
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="procesos" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class=" icon-time-slot"></i>
		            Procesos
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="procesos">
		        <?php if ($_SESSION['permisos']==4 OR $_SESSION['permisos']==1 ) { ?>    
		            <li><a class="dropdown-item" href="./lista_stock.php"><i class=" icon-database"></i> Playeras Stock</a></li>
		            <li><hr class="dropdown-divider"></li> 
		            <li><a class="dropdown-item" href="./lista_ponchados.php">Ponchados</a></li>
		        <?php	} ?>  
	        	<?php if ($_SESSION['permisos']==1 ) { ?> 
		        	<li><hr class="dropdown-divider"></li>	
	        	<?php	} ?> 
		        <?php if ($_SESSION['permisos']==3 OR $_SESSION['permisos']==1 ) { ?>           
		            <li><a class="dropdown-item" href="./lista_pagos.php">Cobranza</a></li>
		            <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item" href="./lista_entregas.php">Entregas</a></li>
		        <?php	} ?> 
		          </ul>
		        </li>       	
<?php } ?>		        
		        <li class="nav-item">
		          <a class="nav-link disabled" href="#"></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link disabled" href="#"></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link disabled" href="#"></a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link" href="./logout.php"><i class="icon-log-out"></i> Salir</a>
		        </li>
		        
		        
		      </ul><!--
		      <form class="d-flex">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
		        <button class="btn btn-outline-success" type="submit">Search</button>
		      </form>-->
		    </div>
		  </div>
		</nav>
		<!--FIN NAV MENU -->

<?php
	}
?>

<?php
function pie(){
	/*PIE DE PAGINAS*/
?>
	</div>
	<footer>
		<div class="derechos"><p>Derechos reservados <b>ERICK RÍOS®</b></p></div>
	</footer>
</body>
</html>
<?php
	}
?>
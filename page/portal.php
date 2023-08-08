<?php 
include '../diseño/diseño.php';
include '../consultas/buscar.php';
encabezado(); 

?>
<div class="row">
	<div class="text-center">
		<h2 class="display-3">Bienvenido <?php echo $_SESSION['name']?>
		</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="dropdown-ears">
		  <button>Quienes somos</button>
		  	<div class="dropdown-content-ears">
		  		<div><h2>Quienes somos</h2>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
		  	</div>
		</div>
	</div>
	<div class="col-md">
		<div class="dropdown-ears">
		  <button>OTRO</button>
		  	<div class="dropdown-content-ears">
		  		<div>
		  			<h3>Otra cosa</h3>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		  		</div>
		  	</div>
		</div>
	</div>
	<div class="col-md">
		<div class="dropdown-ears">
		  <button>Productos</button>
		  	<div class="dropdown-content-ears">
		  		<div><h3>Nuestros productos</h3>
					<ul class="list-unstyled">
 <?php 

    $listado=buscarplayeras();

    while ($row=mysqli_fetch_object($listado)){
    $id=$row->idplayera;
    $playera=$row->nombre_playera;
    ?>
						<li>
							<i class="icon-home" ></i> <?php echo $playera; ?> 
						</li>
<?php } ?> 
					</ul>
		  	</div></div>
		</div>
	</div>
</div>
<!--inicio carusel-->
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img height="500px" src="..\img\promos\ALIANZA_SANTANDER_CUPON_red.jpg" class="d-block w-100" alt="alainza santander contpaqi®">
      <div class="carousel-caption d-none d-md-block">
        <h5>Alianza Santander</h5>
        <p>Aprovecha el cupon que tenemos para ti.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img height="500px" src="..\img\promos\CIERRETIMBRADO.JPEG" class="d-block w-100" alt="contpaqi® timbres licenciamiento tradicional">
      <div class="carousel-caption d-none d-md-block">
        <h5>No te quedes sin tus timbres.</h5>
        <p>LICENCIAMINETOS tradicionales. No pierdas el timbrado ilimitado y sin costo. Actualiza tu versión del sistema a la últuima.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img height="500px" src="..\img\promos\DECIDE_ANUAL_FB.jpg" class="d-block w-100" alt="decide contpaqi® reportes nube">
      <div class="carousel-caption d-none d-md-block">
        <h5>Decide tu reporte en la nube</h5>
        <p>Canjea tu decide y visualiza reportes desde cualquier dispositivo.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!--FIN  CARUSEL-->
	<div class="row justify-content-center">
		<div class="col-md-7">
			<div class="">
				
			</div>	
		</div>
		<div class="col-md">
			<div class="">
				
			</div>
		</div>
		<div class="col-md">
			<div class="">
				
			</div>
		</div>
	</div>	


<?php pie(); ?>
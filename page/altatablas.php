<?php 
include "..\diseño\diseño.php";
encabezado();
?>
  <div class="mb-3 row">
    <label for="nombretabla" class="col-md-2 col-form-label">Email</label>
    <div class="col-md-4">
      <input type="text" class="form-control-plaintext" id="nombretabla" placeholder ="Nombre de tabla">
    </div>

    <label for="numero" class="col-md-2 col-form-label">Número de Columnas</label>
    <div class="col-md-4">
      <input type="password" class="form-control" id="numero">
    </div>
    <div class="col-md-12">
    	<button type="submit" class="btn btn-primary mb-3">Crear</button>
    </div>
  </div>
<?php
pie();
?>
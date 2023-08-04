<?php
	include ("../diseño/diseño.php");
    include ("../consultas/altas.php");
    include ("../consultas/buscar.php");

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Alta de <b>Pedido</b></h2></div>
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4">
                <a href=".\lista_pedidos.php" class="btn btn-outline-secondary"><i class="icon-back"></i> Regresar</a>
            </div>
        </div>
    </div>
    <?php 
    $folio =mysqli_fetch_object(buscarfoliopedido());
    $folio=$folio->folio;
    altapedido();
    ?>
    <div>
        <form class="row" method="get">
            <div class="col-md-1">
                <label class="form-label">Folio</label>
                <input type="text" name="folio" class="form-control"  readonly value="<?php echo $folio;?>">
            </div>
            <div class="col-md-5">
                <label class="form-label">Elegir Vendedor</label>
            <?php if ($_SESSION['permisos']==3) { ?>
                <input type="hidden" name="vendedor" value="<?php echo $_SESSION['userid'] ?>">
            <?php } ?>
                <select name="vendedor" class="form-select" <?php if ($_SESSION['permisos']==3) { echo "disabled"; }?> >
                    <?php
                if ($_SESSION['permisos']==3) {
                    echo "<option value='" ;
                    echo $_SESSION['userid']."'>";
                    echo $_SESSION['name']."</option>";
                }
                    $listado=buscarvendedores();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->iduser;
                        $nombre=$row->nombre;
                        $paterno=$row->apellidop;
                        $materno=$row->apellidom;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre $paterno $materno";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Elegir Cliente</label>
                <select id="cliente" name="cliente" class="form-select">
                    <?php
                    $listado=buscarclientes();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->iduser;
                        $nombre=$row->nombre;
                        $paterno=$row->apellidop;
                        $materno=$row->apellidom;
                        $carrera=$row->carrera;
                        $idcarrera=$row->idcarrera;
                        $facultad=$row->nombre_facultad;
                        $idfacultad=$row->idfacultad;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre $paterno $materno";?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <h3 class="display-5">Pedido de Playeras</h3>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir playera</label>
                <select id="playera" name="playera" class="form-select">
                    <?php
                    $listado=buscarplayeras();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idplayera;
                        $nombre=$row->nombre_playera;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-1">
                <label class="form-label">Cantidad </label>
                <select id="cantidad" name="cantidad" class="form-select">
                    <?php
                    $i=1;
                    while ($i<=100){
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo "$i";?></option>
                    <?php $i++; } ?>
                </select>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir color</label>
                <select id="color" name="color" class="form-select">
                    <?php
                    $listado=buscarcolores();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idcolor;
                        $nombre=$row->nombre_color;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir talla</label>
                <select id="talla" name="talla" class="form-select">
                    <?php
                    $listado=buscartallas();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idtalla;
                        $nombre=$row->letra;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-auto">
                <label class="form-label">Elegir corte</label>
                <select id="corte" name="corte" class="form-select">
                    <?php
                    $listado=buscarcortes();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idcorte;
                        $nombre=$row->nombre_corte;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre";?></option>
                    <?php } ?>
                </select>
            </div>
            
           <!-- 
            <div class="col-md-4">
                <label class="form-label">Cantidad</label>
                <input type="text" name="apellidom" class="form-control" required>
            </div>
            
            <div class="col-md-2">
                <label class="form-label">Celular/Teléfono</label>
                <input type="text" name="cel" class="form-control" required maxlength="10">
            </div>-->
            
            
            
            <div >
                <h3 class="display-5">Elegir bordado</h3>
            </div>
            <div class="col-md-6">
                <label class="form-label">Elegir carrera</label>
                <select id="carrera" name="carrera" class="form-select">
                    
                    <?php
                    $listado=buscarcarreras();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idcarrera;
                        $nombre=$row->nombre;
                        $iniciales=$row->nombre_corto;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre ($iniciales)";?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Elegir facultad</label>
                <select name="facultad" class="form-select">
                    
                    <?php
                    $listado=buscarfacultades();
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->idfacultad;
                        $nombre=$row->nombre_facultad;
                        $iniciales=$row->nombre_corto;
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo "$nombre ($iniciales)";?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-12 pull-right" >
            <hr>
                <!--<button type="submit" class="btn btn-success">Guardar datos</button>-->
                <button id="adicionar" class="btn btn-success" type="button">Adicionar a la tabla</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Listado de <b>Playeras</b></h2></div>
        </div>
    </div>
    <table  id="mytable" class="table table-bordered table-hover ">
      <tr>
        <th class="nover">Playera</th>
        <th class="nover">Color</th>
        <th class="nover">Talla</th>
        <th class="nover">Corte</th>
        <th class="nover">Carrera</th>
        <th>Playera</th>
        <th>Color</th>
        <th>Talla</th>
        <th>Corte</th>
        <th>Carrera</th>
        <th>Cantidad</th>
        <th>Eliminar</th>
      </tr>

    </table>

</div>
<div class="col-md-6">
    <button id="enviar" class="btn btn-success">Guardar datos</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
//obtenemos el valor de los input
 var i = 1; //contador para asignar id al boton que borrara la fila

$('#adicionar').click(function() {
  var playera = document.getElementById("playera").value;
  textpla = $("#playera option:selected").text();
  var talla = document.getElementById("talla").value;
  textta = $("#talla option:selected").text();
  var corte = document.getElementById("corte").value;
  textcor = $("#corte option:selected").text();
  var color = document.getElementById("color").value;
  textcol = $("#color option:selected").text();
  var cantidad = document.getElementById("cantidad").value;
  textcan = $("#cantidad option:selected").text();
  var carrera = document.getElementById("carrera").value;
  textcar = $("#carrera option:selected").text();
  
 
  var fila = '<tr id="row' + i + '"><td class="nover">' + playera + '</td><td class="nover">' + color + '</td><td class="nover">' + talla +'</td><td class="nover">'+corte+'</td><td class="nover">'+carrera+'</td><td class="nover">'+cantidad+ '</td><td>' + textpla + '</td><td>' + textcol + '</td><td>' + textta +'</td><td>'+textcor+'</td><td>'+textcar+'</td><td>'+textcan +'</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; 
  //esto seria lo que contendria la fila
 // var datos = '<tr id="dat' + i + '"><td>' + textpla + '</td><td>' + textcol + '</td><td>' + textta +'</td><td>'+textcor+'</td><td>'+textcar+'</td><td>'+textcan+ '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; 

  i++;

  $('#mytable tr:first').after(fila);
  //$('#datos tr:first').after(datos);
    $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
    //le resto 1 para no contar la fila del header
    /*document.getElementById("playera").value ="";
    document.getElementById("color").value = "";
    document.getElementById("corte").value = "";
    document.getElementById("carrera").value = "";
    document.getElementById("cantidad").value = "";
    document.getElementById("talla").value = "";
    document.getElementById("playera").focus();*/
  });
$(document).on('click', '.btn_remove', function() {
  var button_id = $(this).attr("id");
    //cuando da click obtenemos el id del boton
    $('#row' + button_id + '').remove(); //borra la fila
   // $('#dat' + button_id + '').remove(); 
    //limpia el para que vuelva a contar las filas de la tabla
    $("#adicionados").text("");
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
  });
});
</script>
<script >
    jQuery(document).ready(function() {
    jQuery('#enviar').on('click', function() {
    var filas = [];
    $('#mytable tbody tr').each(function() {
      var playera = $(this).find('td').eq(0).text();
      var color = $(this).find('td').eq(1).text();
      var talla = $(this).find('td').eq(2).text();
      var corte = $(this).find('td').eq(3).text();
      var carrera = $(this).find('td').eq(4).text();
      var cantidad = $(this).find('td').eq(5).text();
     
      var fila = {
        playera,
        color,
        talla,
        corte,
        carrera,
        cantidad
      };
      filas.push(fila);
    });
    console.log(filas);
  });
});
    $.ajax({
      type: "POST",
      url: "consultas/crear.php",
      data: {valores : JSON.stringify(filas) },
      success: function(data) { 
         console.log(data);
      }
    });
</script>
<?php pie();?>
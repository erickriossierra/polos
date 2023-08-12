<?php
	include "../diseño/diseño.php";
	include '../consultas/listar.php';

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Listado de  <b>Clientes</b></h2></div>
<?php if ($_SESSION['permisos']==1 OR $_SESSION['permisos']==3 ) { ?>            
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4 div_entre">
                <a href=".\alta_cliente.php" class="btn btn-outline-success"><i class="icon-add-user"></i> Alta cliente</a>
            </div>
<?php }else{ ?>
            <div class="col-md-4"></div>            
            <div class="col-md-2 div_abajo">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            
<?php } ?>            
        </div>
    </div>
<!-- INICIO FILTROS -->
    <div id="filtros"> Selecciona el filtro deseado
        <form class="row" action="lista_clientes.php" method="post">
            <div class="col-md-2 " id="div_select">
            <select class="form-select" name="filtro" id="filtro" onchange="filtros()">
                <option value="0"></option>
                <option value="1">Correo</option>
                <option value="2">Nombre</option>
                <option value="3">Carrera</option>
            </select>
            </div>
            <div class="col-md-6" name="div_text" id="div_text">
                <input type="text" name="texto" id="texto" class="form-control">
            </div>
            <div class="col-md-6" name="div_text2" id="div_text2">
                <input type="texto" name="texto2" id="texto2" class="form-control">
            </div>
            <div class="col-md-6" name="div_text3" id="div_text3">
                <input type="texto" name="texto3" id="texto3" class="form-control">
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
                    <th>Nombre</th>
                    <th>Celular</th> 
                    <th>Correo</th>                       
    				<th>Facultad</th>
                    <th>Carrera</th>
                    <th>Edad</th>
                    <th>Sexo</th>
<?php if ($_SESSION['permisos']==1) { ?>
                    <th class="numero">Acciones</th>
<?php } ?>                    
                </tr>
            </thead>
             
            <tbody>    
    <?php 

    $listado=listarclientes();

    while ($row=mysqli_fetch_object($listado)){
    $id=$row->iduser;
    $correo=$row->correo;
    $facultad=$row->nombre_facultad;
    $cel=$row->cel;
    $nombre=$row->nombre;
    $apellidop=$row->apellidop;
    $apellidom=$row->apellidom;
    $carrera=$row->carrera;
    $edad=$row->edad;
    $sexo=$row->nombre_sexo;

    ?>
        <tr>
            <td>
                <?php echo $nombre.' '.$apellidop.' '.$apellidom;?>
            </td>
            <td>
                <?php echo $cel;?>
            </td>
            <td>
                <?php echo $correo;?>            
            </td>
            <td>
                <?php echo $facultad;?>
            </td>
            <td>
                <?php echo $carrera;?>                
            </td>
            <td class="numero">
                <?php echo $edad;?>                
            </td>
            <td>
                <?php echo $sexo;?>                
            </td>
    <?php if ($_SESSION['permisos']==1) { ?>                
            <td class="numero">
            <a href="modifica_usuario.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip">
                <i class="icon-edit"></i>
            </a>
            <a href="quita_usuario.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="return Confirmation()">
                <i class=" icon-trash"></i>
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

        if (confirm('¿Esta seguro de eliminar el registro?')==true) {
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
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");

        }else if (getSelectValue=="2") {
            document.getElementById("div_text2").style.display = "block";
            document.getElementById("texto2").setAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");

        }else if (getSelectValue=="3"){
            document.getElementById("div_text3").style.display = "block";
            document.getElementById("texto3").setAttribute("required", "required");
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
        }else{
            document.getElementById("div_text").style.display = "none";
            document.getElementById("texto").removeAttribute("required", "required");
            document.getElementById("div_text2").style.display = "none";
            document.getElementById("texto2").removeAttribute("required", "required");
            document.getElementById("div_text3").style.display = "none";
            document.getElementById("texto3").removeAttribute("required", "required");
        }
    }
</script>     


<?php pie();?>
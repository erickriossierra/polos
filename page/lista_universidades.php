<?php
	include "../diseño/diseño.php";
	include '../consultas/listar.php';

	encabezado();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-md-6"><h2>Listado de <b>Universidades</b></h2></div>           
            <div class="col-md-2">
                <a href=".\portal.php" class="btn btn-outline-dark"><i class="icon-home"></i> Inicio</a>
            </div>
            <div class="col-md-4 div_entre">
                <a href=".\alta_universidad.php" class="btn btn-outline-success"><i class="icon-circle-with-plus"></i> Alta universidad</a>
            </div>
        </div>
    </div>
<!-- INICIO FILTROS -->
    <div id="filtros"> Selecciona el filtro deseado
        <form class="row" action="lista_universidades.php" method="post">
            <div class="col-md-2" id="div_select">
            <select class="form-select" name="filtro" id="filtro" onchange="filtros()">
                <option value="0"></option>
                <option value="1">Universidad</option>
                <option value="2">Corto</option>
                <option value="3">Sigla</option>
               <!-- <option value="4"></option>-->
            </select>
            </div>
            <div class="col-md-6" name="div_text" id="div_text">
                <input type="text" name="texto" id="texto" class="form-control">
            </div>
            <div class="col-md-2" name="div_text2" id="div_text2">
                <input type="texto" name="texto2" id="texto2" class="form-control">
            </div>
            <div class="col-md-2" name="div_text3" id="div_text3">
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
                    <th>Universidad</th>
                    <th>Corto</th> 
                    <th>Siglas</th>                       
                    <th class="numero">Acciones</th>

                </tr>
            </thead>
             
            <tbody>    
    <?php 

    $listado=listaruniversidades();

    while ($row=mysqli_fetch_object($listado)){
    $id=$row->iduniversidad;
    $facultad=$row->nombre_universidad;
    $comun=$row->nombre_comun;
    $iniciales=$row->siglas;    

    ?>
        <tr>
            <td>
                <?php echo $facultad;?>
            </td>
            <td>
                <?php echo $comun;?>                
            </td>
            <td class="numero">
                <?php echo $iniciales;?>                
            </td>               
            <td class="numero">
            <a href="modifica_universidad.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip">
                <i class="icon-edit"></i>
            </a>
<?php if ($_SESSION['userid']==1) { ?>            
            <a href="quita_universidad.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="return Confirmation()">
                <i class="icon-trash"></i>
            </a>
<?php } ?>            
            </td>
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
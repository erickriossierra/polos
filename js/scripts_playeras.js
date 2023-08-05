// agregar registros
function addplayera() {
    // get values
    var msg=$('#msg');
    var folio = $("#pedido").val();
    var playera = $("#playera").val();
    var cant = $("#cantidad").val();
    var color = $("#color").val();
    var talla = $("#talla").val();
    var corte = $("#corte").val();
    var carrera = $("#carrera").val();
    var entrega = $("#entrega").val();
    var cliente = $("#cliente").val();
    var vendedor = $("#vendedor").val();

    // agregar registros
    $.post("../page/create_playeras.php", {
        folio:folio,
        playera:playera,
        cant:cant,
        color:color,
        talla:talla,
        corte:corte,
        carrera:carrera,
        entrega:entrega,
        cliente:cliente,
        vendedor:vendedor
    }, function (data, status) {
        
        // leer registros
        readplayeras();
        //mensaje de proceso
        msg.html(data);
        // borrar campos
	    $("#playera").val("");
	    $("#cantidad").val("");
	    $("#color").val("");
	    $("#talla").val("");
	    $("#corte").val("");
	    $("#carrera").val("");
        $("#entrega").val("");
   
    });
}
// Leer tareas
function readplayeras() {
    var folio = $("#pedido").val();
   /* if (folio=='') {
        alert("Asignar folio");
        $("#folio").focus();
    }*/
    $.post("../page/read_playeras.php", {
        folio:folio
    }, function (data, status) {
        $("#records_content").html(data);
    });
}
//borrar
function DeleteUser(id) {
	var msg=$('#msg');
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    $('#div_msg').css("display","none");
    if (conf == true) {
        $.post("../../json/delete_tarea.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readtareas();
                msg.html(data);
            }
        );
    }
}
/*/cargar y refrescar
function readfolio() {
    // body...
    var id=$("#id").val();
    $.post("../../json/read_folio.php", {
        id:id
    }, function (data, status) {
        $("#folio").val(data);
    });
}
*/
$(document).ready(function () {
    // READ recods on page load
    //readfolio();
    readplayeras(); // calling function
});
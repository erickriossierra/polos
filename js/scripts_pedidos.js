// agregar registros
function addpedido() {
    // get values
    var msg=$('#msg');
    var folio = $("#pedido").val();
    

    // agregar registros
    $.post("../page/create_pedido.php", {
        folio:folio,
        
    }, function (data, status) {
        
        // leer registros
        readfolio();
        readplayeras();
        //mensaje de proceso
        msg.html(data);
        // borrar campos
	    
   
    });
}
//borrars
function Deletepedido(id) {
    var msg=$('#msg');
    //var id=$("#id").val();
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    $('#div_msg').css("display","none");
    if (conf == true) {
        $.post("../page/delete_playera.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readplayeras();
                msg.html(data);
            }
        );
    }
}
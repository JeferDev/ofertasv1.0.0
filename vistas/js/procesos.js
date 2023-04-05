/**$(".btnActualizarEstado").click(function(){

    var id_proceso = $(this).attr("id_proceso");
   // console.log("estas entrando al js", id_proceso);

    var datos= new FormData();
    datos.append("id_procesos", id_proceso);

    $.ajax({
        url:"",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: "json",
        success: function(respuesta){
            console.log("respuesta", respuesta);

        }
    }) 
})*/


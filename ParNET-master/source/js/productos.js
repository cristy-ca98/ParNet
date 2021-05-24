$(function () {
    /**
     * DATATABLES ESPAÑOL
     */
    let flag = 1;
    let languaje= {
        "sProcessing": "Procesando ...",
        "sLengthMenu": "",
        "sZeroRecords": "Ningun resultado encontrado",
        "sEmptyTable": "No hay datos en la tabla",
        "sInfo": "Líneas _START_ a _END_ de _TOTAL_ Cursos",
        "sInfoEmpty": "No se muestra ninguna línea",
        "sInfoFiltered": "(Filtrar maximo _MAX_)",
        "sInfoPostFix": "",
        "sSearch": "Buscar",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst": "Primero", "sLast": "Ultimo", "sNext": "Siguiente", "sPrevious": "Previo"
        }
    }

//    $.ajax({
//        type: "POST",
//        url: "controller/productoController.php",
//        data: {flag:1},
//        dataType: "JSON",
//        success: function (response) {
//            console.log(response);
//        }
//    });
    /**Creacion de tabla productos */
    let tablaProductos = $('#tabla-productos').DataTable({
        "languaje": languaje,
        "bLengthChange": false,
        "pageLength": 10,
        ajax: {
            url:`controller/productoController.php`,
            method:"POST",
            dataType:"JSON",
            //SIEMPRE CARGARA LOS DATOS DEl FLAG 1
            data:{"flag":1},
            dataSrc:"data",
        },
        columns: [
            {"data":"ID_PRODUCTO"},
            {"data":"TIPO"},
            {"data":"NOMBRE"},
            {"data":"PRECIO"},
            {
                "data":"IMAGEN",
                "render":function(data,type,row){
                    return `<img src="${data}" width="120" height="80"></img>`
                }
            },
            {"data":"CANTIDAD_ACTUAL"}
            
        ]
    })
});
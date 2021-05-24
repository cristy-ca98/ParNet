$(function () {
    let flag = 1;
    $("#form-contacto").submit(function (e) { 
        e.preventDefault();
        $.ajax({
             type: "POST",
             url: "controller/contactoController.php",
             data: {
                 flag:4,
                 nombre:$("#nombre").val(),
                 email:$("#email").val(),
                 empresa:$("#empresa").val(),
                 telefono:$("#telefono").val(),
             },
             success: function (response) {
                 if (response=="Exito al insertar") {
                     Swal.fire({
                         icon:'success',
                         title:'GRACIAS',
                         text: 'Su informacion de contacto ha sido registrada correctamente'    
                     });
                 }
                 else{
                     Swal.fire({
                         icon: 'error',
                         title: 'Intentalo de nuevo...',
                         text: 'Algo salio mal!'
                       })
                 }
             }
         });   
    });
});
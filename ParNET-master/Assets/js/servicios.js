$(function () {
    let flag = 1;
    html="";
    $.post("controller/catalogoAreasController.php",
        {flag:1},
        function (data) {
            html += `<option value='0' disabled selected>SELECCIONE</option>`
            data.data.forEach(element => {
                html += `<option value='${element.ID_AREA}'>${element.NOMBRE_AREA}</option>`
            });
            $("#sArea").html(html);
        },
        "JSON"
    );

    $("#formulario-servicios").submit(function (e) { 
        e.preventDefault();
        if(grecaptcha.getResponse() == "") {
            e.preventDefault();
            alert("Favor de verificar Captcha");
          } else {
                $.ajax({
                    type: "POST",
                    url: "controller/servicioController.php",
                    data: {
                        flag:4,
                        nombre:$("#iNombreServicio").val(),
                        area:$("#sArea").val(),
                        descripcion: $("#iDetalles").val()
                    },
                    success: function (response) {
                        if (response=="Exito al insertar") {
                            document.getElementById("formulario-servicios").reset();
                            grecaptcha.reset()
                            Swal.fire({
                                icon:'success',
                                title:'GRACIAS',
                                text: 'El registro ha sido registrado correctamente'

                            });
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Algo salio mal!'
                              })
                        }
                    }
                });
            }
    });
});
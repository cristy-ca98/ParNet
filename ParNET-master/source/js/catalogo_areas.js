$(document).ready(function () {
    if ($('#lista_cursos').length) {
        //$('#lista_cursos').DataTable();
        $('#lista_cursos').DataTable({
            dom: 'Blfrtip',
            buttons: [{
                extend: 'excelHtml5',
                messageTop: 'Direccion De Ecología',
                text: "Exporta Excel",
                title: "Listado de cursos",
            },
            {
                /*'csvHtml5',*/
                extend: 'csvHtml5',
                text: "Exporta csv",
                title: "Listado de cursos",
                messageTop: 'Direccion De Ecología',
            },
            {
                extend: 'pdfHtml5',
                title: 'Listado de cursos'
            }
            ],
            responsive: true,
            "language": {
                "search": "Filtro de Registros:",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
                "oPaginate": {
                    "sPrevious": "Anterior",
                    "sNext": "Siguiente"
                }
            }



        });



    } //end datatable

    $('#add').click(function () {
        $("h4.modal-title").text("Agregado de áreas");
        $("#insert").val("Insert");
        $("#insert_form")[0].reset();
    }); //end #add click

    $('#lista_cursos tbody').on('click', '.delete', function () {
        var el = this;
        var deleteid = $(this).data('id');
        //confirm box
        bootbox.confirm("¿Deseas realmente borrar el registro?", function (result) {
            if (result) {
                //ajax request
                $.ajax({
                    url: 'delete_cursos.php',
                    type: 'POST',
                    data: {
                        id: deleteid
                    },
                    success: function (response) {
                        //alert(response);
                        if (response == 1) {
                            $(el).closest('tr').css('background', 'tomato');
                            $(el).closest('tr').fadeOut(800, function () {
                                $(this).remove();

                            });
                        }
                    }

                }); //end ajax

                //bootbox.alert('procede a borrar');
            } else {
                bootbox.alert('Registro no fue eliminado')
            }
        }); //end confirm



    }); //end delete_cursos


    $('#insert_form').on("submit", function (event, table) {
        event.preventDefault();
        if ($('#f_nombre').val() == '') {
            //bootbox.alert('Error:Nombre curso es requerido');
            Swal.fire({
                type: 'warning',
                title: 'Error',
                text: 'Error:Nombre curso es requerido'
            });
        } else {
            $.ajax({
                url: "inserta_actualiza_cursos.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function () {
                    if ($('#curso_id').val() == '') {
                        $('#insert').val("Insertando");
                    } else {
                        $('#insert').val("Actualizando");
                    }
                },
                success: function (data) {
                    //alert(data);
                    if (data == 'ok') {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        //bootbox.alert('correcto!');
                        Swal.fire({
                            title: "Registro de Cursos",
                            text: "¡Curso Ingresado Correctamente!",
                            type: "success"
                        }).then(function () {
                            window.location = "catalogo_cursos.php";
                        });

                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'No se agregó correctamente curso, vuelva a intentar.',
                        });
                    }
                }
            });
        }
    }); //end submit form


    /*updTAE*/
    $('#lista_cursos tbody').on('click', '.update', function () {
        $("h4.modal-title").text("Modificación de Curso");
        var curso_id = $(this).data('id');
        $.ajax({
            url: "fetch_curso.php",
            method: "POST",
            data: {
                curso_id: curso_id
            },
            dataType: "json",
            success: function (data) {
                //alert(JSON.stringify(data));




                $('#f_nombre').val(data.nombre_curso);
                $('#curso_id').val(data.IDCurso);
                $('#insert').val("Actualizar");
                $('#add_data_Modal').modal('show');

            },
            error: function (request, status, error) {



                var val = request.responseText;
                alert("error" + val);
            }
        });

    }); // end function update


    $('#lista_cursos tbody').on('click', '.ver', function () {
        $("h4.modal-title").text("Detalle de Curso");
        // ver id
        var curso_id = $(this).data('id');
        //alert(curso_id);

        if (curso_id != '') {
            $.ajax({
                url: 'select_cursos.php',
                method: 'POST',
                data: {
                    id: curso_id
                },
                success: function (response) {
                    //alert(response);  
                    $('#employee_detail').html(response);
                    $('#dataModal').modal('show');
                },
                error: function (request, status, error) {



                    var val = request.responseText;
                    alert("error" + val);
                }
            });
        }



    });



});
<!DOCTYPE html>
<html>

<head>
    <?php include_once "../source/inclusiones/meta_tags.php"; ?>
    <title>Lista de clientes</title>
    <?php include_once "../source/inclusiones/css_y_favicon.php"; ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include_once "../source/inclusiones/menu_horizontal_superior_basico.php"; ?>
        </div>
    </div>


    <!--<div class="container-fluid">  -->
    <div class="container" style="margin-top: 65px !important;">
        <div class="form-group">
            <legend class="text-center header">
                <h2>Lista de clientes</h2>
            </legend>
        </div>

        <?php
        include('../model/class_lista_clientes_dal.php');
        $obj_dato_catalogo_cursos = new lista_clientes_dal;
        $result_datos_cursos = $obj_dato_catalogo_cursos->obtener_lista_clientes();

        if ($result_datos_cursos == NULL) {
            print "No se encontraron resultados de clientes";
        } else {
            /*
     print '<pre>';
     print_r($result_datos_cursos);
     print '</pre>';
     exit;*/
        ?>

            <div class="form-group col-md-12">

                <div align="center">
                    <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Agregar clientes</button>
                </div>
                <table id="lista_cursos" class="table table-striped table-bordered" border="0">

                    <thead class="text-capitalize">
                        <tr>
                            <th># cliente</th>
                            <th>Empresa</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Actualizar</th>
                            <th>Ver</th>
                            <th>Eliminar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result_datos_cursos as $key => $value) {
                        ?>

                            <tr>
                                <td><?= $value->getIDCLIENTE(); ?></td>
                                <td><?= $value->getEMPRESA(); ?></td>
                                <td><?= $value->getDIRECCION(); ?></td>
                                <td><?= $value->getCORREO(); ?></td>
                                <td>
                                    <button class='update btn btn-success btn-sm' id='update_<?= $value->getIDCLIENTE(); ?>' data-id='<?= $value->getIDCLIENTE(); ?>'>Actualizar</button>
                                </td>

                                <td>
                                    <button class='ver btn btn-warning btn-sm' id='ver_<?= $value->getIDCLIENTE(); ?>' data-id='<?= $value->getIDCLIENTE(); ?>'>Ver</button>
                                </td>
                                <td>
                                    <button class='delete btn btn-danger btn-sm' id='del_<?= $value->getIDCLIENTE(); ?>' data-id='<?= $value->getIDCLIENTE(); ?>'>Eliminar</button>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>

        <?php
        }
        ?>
        <?php include_once "../source/inclusiones/js_incluidos.php"; ?>
    </div><!-- end container -->
    <script>
        $(document).ready(function() {
            if ($('#lista_cursos').length) {
                //$('#lista_cursos').DataTable();
                $('#lista_cursos').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            messageTop: '',
                            text: "Exporta Excel",
                            title: "Listado de clientes",
                        },
                        {
                            /*'csvHtml5',*/
                            extend: 'csvHtml5',
                            text: "Exporta csv",
                            title: "Listado de clientes",
                            messageTop: '',
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Listado de clientes'
                        }
                    ],
                    responsive: true,
                    "language": {
                        "search": "Filtro de registros:",
                        "sLengthMenu": "Mostrar _MENU_ clientes",
                        "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
                        "oPaginate": {
                            "sPrevious": "Anterior",
                            "sNext": "Siguiente"
                        }
                    }



                });



            } //end datatable

            $('#add').click(function() {
                $("h4.modal-title").text("Agregado de clientes");
                $("#insert").val("Insert");
                $("#insert_form")[0].reset();
            }); //end #add click

            $('#lista_cursos tbody').on('click', '.delete', function() {
                var el = this;
                var deleteid = $(this).data('id');
                //confirm box
                bootbox.confirm("¿Deseas realmente borrar el registro?", function(result) {
                    if (result) {
                        //ajax request
                        $.ajax({
                            url: '../controller/delete_clientes.php',
                            type: 'POST',
                            data: {
                                id: deleteid
                            },
                            success: function(response) {
                                //alert(response);
                                if (response == 1) {
                                    $(el).closest('tr').css('background', 'tomato');
                                    $(el).closest('tr').fadeOut(800, function() {
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


            $('#insert_form').on("submit", function(event, table) {
                event.preventDefault();
                if ($('#empresa').val() == '') {
                    //bootbox.alert('Error:Empresa es requerido');
                    Swal.fire({
                        type: 'warning',
                        title: 'Error',
                        text: 'Error:Nombre empresa es requerido'
                    });
                } else if ($('#direccion').val() == '') {
                    //bootbox.alert('Error:Empresa es requerido');
                    Swal.fire({
                        type: 'warning',
                        title: 'Error',
                        text: 'Error:Direccion es requerido'
                    });
                } else if ($('#correo').val() == '') {
                    //bootbox.alert('Error:Empresa es requerido');
                    Swal.fire({
                        type: 'warning',
                        title: 'Error',
                        text: 'Error:Correo empresa es requerido'
                    });
                } else {
                    $.ajax({
                        url: "../controller/inserta_actualiza_clientes.php",
                        method: "POST",
                        data: $('#insert_form').serialize(),
                        beforeSend: function() {
                            if ($('#cliente_id').val() == '') {
                                $('#insert').val("Insertando");
                            } else {
                                $('#insert').val("Actualizando");
                            }
                        },
                        success: function(data) {
                            alert(data);
                            if (data == 'ok') {
                                $('#insert_form')[0].reset();
                                $('#add_data_Modal').modal('hide');
                                //bootbox.alert('correcto!');
                                Swal.fire({
                                    title: "Registro de clientes",
                                    text: "¡Cliente Ingresado Correctamente!",
                                    type: "success"
                                }).then(function() {
                                    window.location = "../view/lista_clientes.php";
                                });

                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'No se agregó correctamente cliente, vuelva a intentar.',
                                });
                            }
                        }
                    });
                }
            }); //end submit form


            /*updTAE*/
            $('#lista_cursos tbody').on('click', '.update', function() {
                $("h4.modal-title").text("Modificación de cliente");
                var cliente_id = $(this).data('id');
                $.ajax({
                    url: "../controller/fetch_cliente.php",
                    method: "POST",
                    data: {
                        cliente_id: cliente_id
                    },
                    dataType: "json",
                    success: function(data) {
                        //alert(JSON.stringify(data));
                        $('#empresa').val(data.Empresa);
                        $('#direccion').val(data.Direccion);
                        $('#correo').val(data.Correo);
                        $('#cliente_id').val(data.IDCliente);
                        $('#insert').val("Actualizar");
                        $('#add_data_Modal').modal('show');

                    },
                    error: function(request, status, error) {
                        var val = request.responseText;
                        alert("error" + val);
                    }
                });

            }); // end function update


            $('#lista_cursos tbody').on('click', '.ver', function() {
                $("h4.modal-title").text("Detalle de cliente");
                // ver id
                var cliente_id = $(this).data('id');
                //alert(cliente_id);

                if (cliente_id != '') {
                    $.ajax({
                        url: '../controller/select_cliente.php',
                        method: 'POST',
                        data: {
                            id: cliente_id
                        },
                        success: function(response) {
                            //alert(response);  
                            $('#employee_detail').html(response);
                            $('#dataModal').modal('show');
                        },
                        error: function(request, status, error) {



                            var val = request.responseText;
                            alert("error" + val);
                        }
                    });
                }



            });



        });
    </script>
</body>

</html>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <legend class="text-center header">
                    <h4 class="modal-title">Detalles de área</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </legend>

            </div>
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- modal para insertar y update -->
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <legend class="text-center header">
                    <h4 class="modal-title"></h4>
                </legend>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Empresa:</label>
                    <input type="text" name="empresa" id="empresa" class="form-control" />
                    <br />
                    <label>Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" />
                    <br />
                    <label>Correo:</label>
                    <input type="text" name="correo" id="correo" class="form-control" />
                    <br />
                    <input type="hidden" name="cliente_id" id="cliente_id" readonly="true" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
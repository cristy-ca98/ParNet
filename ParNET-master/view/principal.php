<!doctype html>
<html lang="es">

<head>
    <?php include_once "../source/inclusiones/meta_tags.php"; ?>
    <title>PARNET</title>
    <?php include_once "../source/inclusiones/css_y_favicon.php"; ?>
</head>

<body style="background-color: white">
    <div class="container-fluid">
        <div class="row">
            <?php include_once "../source/inclusiones/menu_horizontal_superior_basico.php"; ?>
        </div>
    </div>
    <!-- Page Content -->
    <div class="container-fluid" style="margin-top: 65px !important;">
        <form name="egresos" action="#" method="post" accept-charset="utf-8">
            <div class="form-group">
                <legend class="text-center header">
                    <h2>Benvenido al sistema <?php print $_SESSION['usuario'] ?></h2>
                </legend>
            </div>
        </form>
        <?php include_once "../source/inclusiones/pie_de_pagina.php"; ?>
        <?php include_once "../source/inclusiones/js_incluidos.php"; ?>
    </div>
    <!-- End Page Content -->
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#f_fecha_registro').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd',
                locale: 'es-es'
            });
            $('#f_fecha_de_pago').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd',
                locale: 'es-es'
            });
        }); // end ready functions
    </script> -->
</body>
</html>
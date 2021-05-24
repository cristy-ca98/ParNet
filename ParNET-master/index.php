<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "view/linkscss.php";?>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <?php require "view/header.php"?>

        <!-- ASIDE -->
        <div class = "container-fluid">
            <div class  ="row row-cols-12">
                <?php require "view/aside.php"?>

                <div class = "col-md-9 main-content" id="main"> 
                    <?php require "view/main.php";?>        
                </div> <!-- main -->

            </div>
        </div>
        <!-- FOOTER -->
        <?php require "view/footer.php"?>
    </div>
<?php require "view/linksjs.php";?>
</body>
</html>
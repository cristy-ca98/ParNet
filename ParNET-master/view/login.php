<?php session_unset();//para eliminar las variables de sesion ?>
<!doctype html>
<html lang="es">
  <head>
  <?php include_once "../source/inclusiones/meta_tags.php"; ?>
  <title>Login Cuentas</title>
  <!-- <link rel="stylesheet" href="../Assets/css/login.css"> -->
  <?php include_once "../source/inclusiones/css_y_favicon.php"; ?> 
</head>
<body>
<!-- Page Content -->
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Acceso</h3>
        <!--
        <div class="d-flex justify-content-end social_icon">
          <span><i class="fab fa-facebook-square"></i></span>
          <span><i class="fab fa-google-plus-square"></i></span>
          <span><i class="fab fa-twitter-square"></i></span>
        </div>-->
      </div>
      <div class="card-body">
        <form name="login_form" method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="usuario" required=true>
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="contraseña" requiered=true>
          </div>
 
          <div class="input-group form-group">
            <div  style=" margin-left: 20px ">
                          <div class="g-recaptcha"
                             data-sitekey="6LcUp24UAAAAAIMbz4GVp_jIvYJG_0UN4DCrlVXA">
                             </div>
                      </div>
          </div>

 


          <div class="form-group">
          <input type="button" id="val_user" name="val_user" value="Ingresar" class="btn float-right login_btn" onclick="javascript:valida_usuario();">

            <!-- <button id="val_user" name="val_user" value="Ingresar" class="btn float-right login_btn" onclick="valida_usuario();"> -->
            <!-- <button onclick= "valida_usuario()" id="val_user" name="val_user" value="Ingresar" class="btn float-right login_btn"></button> -->
        </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center">
        </div>
      </div>
    </div>
  </div>
</div>     
<!-- End Page Content -->
    <?php
    include_once "../source/inclusiones/pie_de_pagina.php"; 
    ?>
   
   <?php
    include_once "../source/inclusiones/js_incluidos.php"; 
    ?>
    <script src="../source/js/login.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
 </html> 
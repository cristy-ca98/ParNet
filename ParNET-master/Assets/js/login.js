$(function () {
    let flag = 1;
    $("#form-login").submit(function (e) { 
        e.preventDefault();
        $.ajax({
             type: "POST",
             url: "../controller/usuarioController.php",
             data: {
                 flag:1,
                 email: $("#email").val(),
                 password: $("#password").val()

             },
             success: function (response){
                 console.log(response);
                 if (response == 0) {
                    $(location).attr('href', "adminDash.php")
                 }
                 else{
                     Swal.fire({
                         icon: 'error',
                         title: 'Oops...',
                         text: 'Usuario o contraseña incorrectos'
                       })
                 }
             }
         });   
    });
});
function valida_usuario(){
    var usuario=$( "#usuario" ).val().trim();
    var contra=$( "#contrasena" ).val().trim();
    var reresponse = grecaptcha.getResponse();
if (usuario.length==0){
     Swal.fire({
         type: 'error',
         title: 'Error: Registre un usuario, no puede ir vacío, verifique.',
         text: '¡Verificar, por favor!'});
        }
        else if (contra.length==0){
        Swal.fire({
        type: 'error',
        title: 'Error: Registre una contraseña, no puede ir vacía, verifique.',
        text: '¡Verificar, por favor!'});
    }
    else if (reresponse.length == 0){
        Swal.fire({
        type: 'error',
        title: 'Error: Marque la casilla de verificacion de seguridad, no puede ir vacía, verifique.',
        text: '¡Verificar, por favor!'});
    }    
    else{
        $('#contentplace').html('<div><img src="images/loading4.gif"/>Cargando...</div>');
        var datos={usuario:usuario,contra:contra,reresponse:reresponse};
        $.ajax({
            url: '../controller/verifica_usuario.php',
            type: 'POST',
            dataType: 'html',
            data: datos,
            success: function(response){
             if(response=="true") {
                 window.location.href = "principal.php";
                } else{
                    Swal.fire({
                    type: 'error',
                    title: 'Error: Datos incorrectos vuelva a intentar.',
                    text: '¡Verificar, por favor!'});
                }
            },
            error: function(xhr, desc, err) {
                 console.log(xhr);
                 console.log("Details: " + desc + "\nError:" + err);
                }
            });
        }
    }
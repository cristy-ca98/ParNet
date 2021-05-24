<div>
    <h1 class = "text-center titulo">Pedido</h1>
    <p>Por favor rellena el siguiente formulario.</p>
    <div class = "container-form">
        <div class = "row">
            <form action="pdfcliente.php" class = "form-pedido" id = "form-pedido" class = "post">
                <div class = "col-md-12 form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" name ='nombre_producto'  maxlength="45">
                    <small id= "nombre">Ingresa nombre del producto</small>
                </div>
                <div class = "col-md-12 form-group">
                <label for="cantidad">Cantidad</label>
                    <input type="text" name = 'cantidad' maxlength="50">
                    <small id= "cantidad">Ingresa cantidad solicitada</small>
                </div>

                <div class = "col-md-12 form-group">
                    <label for="empresa">Empresa</label>
                    <input type="text" class = "form-control" maxlength="45" id ="empresa">
                    <small id= "empresa">Ingresa aqui tu empresa</small>
                </div>

                <div class = "col-md-12 form-group">
                    <label for="contacto">Telefono</label>
                    <input type="tel" name = 'contacto'  maxlength="10">
                    <small id= "contacto">Ingresa tu telefono a diez digitos</small>
                </div>
                <div class = "col-md-12 text-right form-group">
                    <input type="submit" value="PDF" class = "btnpedido">   
                </div>
            </form>
        </div>
    </div>


</script>
</div>
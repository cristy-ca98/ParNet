<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="titulo">Registro de Servicios</h1>
            </div>
        </div>
        <form id="formulario-servicios">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                      <label for="iNombreServicio">Nombre del servicio</label>
                      <input type="text" name="iNombreServicio" id="iNombreServicio" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="sArea">Area</label>
                        <select class="form-control" name="sArea" id="sArea" required>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                      <label for="iDetalles">Detalles</label>
                      <textarea class="form-control" name="iDetalles" id="iDetalles" rows="15" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                     <div id="captcha"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary pull-right">Registrar Servicio</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var onloadCallback = function() {
            grecaptcha.render('captcha', {
                'sitekey' : '6LcjFfcZAAAAANd3KLJV0mimMNAPaRsUSFCtZyBY'
            });
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"></script>
    <script src="Assets/js/servicios.js"></script>
</section>
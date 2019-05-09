<?php
session_start();
if (!isset($_SESSION['id_sesion_usuario'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
    <head>
        <?php include_once('../../common/head.php'); ?>
        <link rel="stylesheet" href="assets/css/style_steps.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/swiper_css/swiper.css">
        <style>
            /* Swiper */
            .swiper-pagination.swiper-pagination-bullets {
                position: unset;
                margin: 10px;
            }
            /* select  */
            .chosen-select {
                margin-top: 0px!important;
            }
            /* ya estaban */
            header.on-top {
                position: relative;
            }
            .c-input-number input[type="text"] {
                margin-top: 0;
            }
            .c-input-number input.userincr-btn-dec[type="button"] {
                top: 20px;
            }
            .c-input-number input[type="button"] {
                top: 10px;
            }
            input#nombre_contacto, input#apellido_contacto, input#phone, input#tel_oficina, input#email_reg, input#direccion, input#ciudad, input#estado, input#pais, input#codigo_postal {
                color: #d9042a;
            }
            .checkout-sec > form input, .checkout-sec form textarea {
                margin-top: 0px;
                margin-bottom: 30px;
            }
            .checkout-sec .chosen-container {
                margin-top: 0px;
            }
            div#domingo_disponibilidad_entrada_chosen {
                margin-bottom: 5%;
            }
            div#tipo_actividad_chosen {
                margin-bottom: 5%;
            }
            label {
                padding: 10px 0;
            }
            .checkout-sec > form input:focus:invalid{ /* when a field is considered invalid by the browser */
                background: #fff url(/assets/images/invalid.png) no-repeat 98% center;
                background-size: 5%;
            }
            .checkout-sec > form input:required:valid { /* when a field is considered valid by the browser */
                background: #fff url(/assets/images/valid.png) no-repeat 98% center;
                background-size: 4%;
            }
            .checkout-sec form textarea:required:valid {
                background: #fff url(/assets/images/valid.png) no-repeat 98% center;
                background-size: 2%;
            }
            .checkout-sec form textarea:focus:invalid {
                background: #fff url(/assets/images/invalid.png) no-repeat 98% center;
                background-size: 2%;
            }
            ::-webkit-validation-bubble-message {
                padding: 1em;
            }
            .checkout-sec > form input:required{
                background: #fff url(/assets/images/asterisco.png) no-repeat 98% center;
                background-size: 2%;
            }
            .form_hint {
                background: #d9042a;
                border-radius: 3px 3px 3px 3px;
                color: white;
                margin-left:8px;
                padding: 1px 6px;
                z-index: 999; /* hints stay above all other elements */
                position: absolute; /* allows proper formatting if hint is two lines */
                display: none;
                margin-top: 12px;
                font-size: 1rem;
            }
            .form_hint::before {
                content: "\25C0"; /* left point triangle in escaped unicode */
                color: #d9042a;
                position: absolute;
                top: 1px;
                left: -6px;
            }
            .checkout-sec > form input:focus + .form_hint {display: inline;}
            .checkout-sec > form input:required:valid + .form_hint {background: #28921f;} /* change form hint color when valid */
            .checkout-sec > form input:required:valid + .form_hint::before {color:#28921f;} /* change form hint arrow color when valid */
            .checkout-sec > form select:focus + .form_hint {display: inline;}
            .checkout-sec > form select:required:valid + .form_hint {background: #28921f;} /* change form hint color when valid */
            .checkout-sec > form select:required:valid + .form_hint::before {color:#28921f;} /* change form hint arrow color when valid */
            img.ji {
                width: 1%;
                margin-left: 1%;
                margin-top: -1%;
            }
            /*Style for radio buttons*/
            .container_radio {
                display: block;
                position: relative;
                padding-left: 35px;
                margin-top: 30px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 14px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            .container_radio input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }
            .checkmark {
                position: absolute;
                top: 0;
                left: 0;
                height: 25px;
                width: 25px;
                background-color: #eee;
                border-radius: 50%;
            }
            .container_radio:hover input ~ .checkmark {
                background-color: #ccc;
            }
            .container_radio input:checked ~ .checkmark {
                background-color: #2196F3;
            }
            .container_radio input:checked ~ .checkmark:after {
                display: block;
            }
            .container_radio .checkmark:after {
                top: 9px;
                left: 9px;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: white;
            }
            .dato_empresa{
                border: 1px solid #dedede;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                -ms-border-radius: 3px;
                -o-border-radius: 3px;
                border-radius: 3px;
                float: left;
                margin-bottom: 30px;
                width: 100%;
            }
            .dato_empresa > h5 {
                background: #f4f4f4 none repeat scroll 0 0;
                border-bottom: 1px solid #dedede;
                color: #8d99ae;
                float: left;
                font-family: Roboto;
                font-size: 14px;
                font-weight: normal;
                margin: 0;
                padding: 18px 30px;
                position: relative;
                width: 100%;
            }
            .row{
              margin-left: 0px;
              margin-right: 0px;
            }
            .swiper-button-prev{
              left: 1px;
            }
            .swiper-button-next{
              right: 1px;
            }
        </style>
    </head>
    <body>
        <div class="page-loading">
            <div class="loadery"></div>
        </div>
        <div class="theme-layout">
            <?php include_once('../../common/menu.php'); ?>
            <section>
                <div class="block no-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inner-header">
                                    <h2>Formulario de Compartitr coche</h2>
                                    <ul class="breadcrumbs">
                                        <li><a href="index.php" title="">Inicio</a></li>
                                        <li>Compartir coche</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="block gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <ul id="progressbar">
                                        <li class="active">Información Empresa</li>
                                        <li>Datos del coche</li>
                                        <li class="servicios">Descripción del viaje</li>
                                        <li>Fotos</li>
                                        <li>Configuración de precios</li>
                                    </ul>
                                </div>
                                <div class="checkout-sec">
                                    <form class="steps" method="post" id='signin' name="alta_alojamiento" action="/src/Controller/alojamientoController.php" enctype="multipart/form-data">
                                        <div class="form-profile">
                                            <!-- Información Empresa -->
                                            <fieldset>
                                                <div class="col-md-12">
                                                    <div class="inner-header">
                                                        <h2>Información Empresa</h2>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <h3>Empresa <span>(Opcional)</span></h3>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="dato_empresa">
                                                        <h5>Información de la empresa</h5>
                                                        <div class="add-menu-restaurant">
                                                            <div class="menu-restaurant">
                                                                <div class="row">
                                                                    <!-- Nombre de la empresa -->
                                                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                                                        <label for="nombre_empresa">Nombre de la empresa</label>
                                                                        <input id="nombre_empresa" name="nombre_empresa" type="text" value="" maxlength="50" placeholder="Nombre de la empresa" autocomplete="off">
                                                                        <input type="hidden" name="visita" value="<?=$_SESSION['id_sesion_usuario']?>">
                                                                    </div>
                                                                    <!-- End Nombre de la empresa -->
                                                                    <!-- Giro de la empresa -->
                                                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                                                        <label for="giro_empresa">Giro de la empresa</label>
                                                                        <select data-placeholder="Giro de la empresa" class="chosen-select" id="giro_empresa" name="giro_empresa" type="text" value=""  maxlength="15" >
                                                                            <option value="">-- Selecciona giro de la empresa --</option>
                                                                            <option value="Industrial">Industrial</option>
                                                                            <option value="Comercial">Comercial</option>
                                                                            <option value="Servicios">Servicios</option>
                                                                            <option value="Otra">Otra</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- End Giro de la empresa -->
                                                                </div>
                                                            </div>
                                                            <div class="menu-restaurant">
                                                                <div class="row">
                                                                    <!-- Teléfono de oficina -->
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <label for="phoneExt">Teléfono de oficina</label>
                                                                        <input id="phoneExt" id="tel_oficina" name="tel_oficina" type="text" onkeypress="return valida(event)" value="" maxlength="12" placeholder="Teléfono de oficina" autocomplete="off">
                                                                    </div>
                                                                    <!-- End Teléfono de oficina -->
                                                                    <!-- Página web -->
                                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                                        <label for="pagina_web">Página Web</label>
                                                                        <input id="pagina_web" name="pagina_web" type="text" value="" maxlength="120" placeholder="Página web" autocomplete="off">
                                                                    </div>
                                                                    <!-- End Página web -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="button" data-page="2" name="next" class="next action-button style_btn" value="Siguiente" />
                                            </fieldset>
                                            <!-- End Información Empresa -->
                                            <!-- Datos de la propiedad -->
                                            <fieldset>
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <div class="inner-header">
                                                            <h2>Datos del viaje</h2>
                                                        </div>
                                                    </div>
                                                    <!-- Nombre de la propiedad -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form_re">
                                                        <label for="nombre_propiedad">Nombre del viaje</label><img class="ji" src="assets/images/asterisco.png" />
                                                        <input id="nombre_propiedad" name="nombre_viaje" type="text" value="" maxlength="80" placeholder="Nombre del viaje *" autocomplete="off" required data-rule-required="true" data-msg-required="Especifique Nombre de la propiedad" >
                                                      </div>
                                                    </div>
                                                    <!-- End Nombre de la propiedad -->
                                                    <!-- datos Direccion -->
                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                        <h3>Coche</h3>
                                                    </div>
                                                    <!-- Tipo de alojamiento -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <label for="tipo_alojamiento">Tu coche es :</label><img class="ji" src="assets/images/asterisco.png" />
                                                        <div class="col-md-12 form_re">
                                                          <div  class="col-md-3 col-sm-6 col-xs-12">
                                                            <p >
                                                              <input class="styled-checkbox" name="tipo_coche" type="radio" value="Automovil">
                                                              <label for="checkbox_Apartamento">Automóvil</label>
                                                            </p>
                                                          </div>
                                                          <div  class="col-md-3 col-sm-6 col-xs-12">
                                                            <p >
                                                              <input class="styled-checkbox" name="tipo_coche" type="radio" value="SUV">
                                                              <label for="checkbox_Apartamento">SUV</label>
                                                            </p>
                                                          </div>
                                                          <div  class="col-md-3 col-sm-6 col-xs-12">
                                                            <p >
                                                              <input class="styled-checkbox" name="tipo_coche" type="radio" value="Camioneta">
                                                              <label for="checkbox_Apartamento">Camioneta</label>
                                                            </p>
                                                          </div>
                                                          <div  class="col-md-3 col-sm-6 col-xs-12">
                                                            <p >
                                                              <input class="styled-checkbox" name="tipo_coche" type="radio" value="Van">
                                                              <label for="checkbox_Apartamento">Van</label>
                                                            </p>
                                                          </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <label for="tipo_alojamiento">Servicios que incluye :</label><img class="ji" src="assets/images/asterisco.png" />
                                                        <div class="col-md-12 form_re" id="alojamiento_id">

                                                        </div>
                                                    </div>
                                                    <!-- End Tipo de alojamiento -->
                                                    <div class="row">
                                                      <!-- Huespedes adultas -->
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-12">
                                                                <label>No. de asientos disponibles :</label><span id="msg_error_vacio_number"></span>
                                                            </div>
                                                            <div class="c-input-number form_re">
                                                                <span><input id="asientos" name="asientos" required type="number" step="1" min="1" maxlength="30" class="manual-adjust" value="0"/></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Servicios -->
                                                    <!-- Servicios adicionales -->

                                                    <!-- Descripción del inmueble -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12">
                                                            <h4>Requisitos<img class="ji" src="assets/images/asterisco.png" /></h4>
                                                        </div>
                                                        <div class="form_re">
                                                          <textarea id="descripcion_inmueble" name="descripcion_inmueble" type="text" value="" placeholder="Describe como es el inmueble..." required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-12">
                                                            <h4>Notas Adicionales</h4>
                                                        </div>
                                                        <textarea id="servicios_adicionales" name="servicios_adicionales" type="text" value="" placeholder=""></textarea>
                                                    </div>
                                                    <!-- End Descripción del inmueble  -->
                                                    <!-- puntos de interes -->
                                                    <div class="col-md-12">
                                                        <h4>Politica de cancelación<img class="ji" src="assets/images/asterisco.png" /></h4>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div class="form_re">
                                                        <textarea rows="5" id="puntos_interes" name="puntos_interes" type="text" value="" placeholder="Describe que atractivos hay en la zona y qué cuidados hay que tener, hay transporte cerca, hay supermercados al rededor, es recomendado caminar en la zona, etc.." required></textarea>
                                                      </div>
                                                    </div>

                                                    <!-- End dias previos -->
                                                </div>
                                                <input type="button" data-page="1" name="previous" class="previous action-button style_btn" value="Anterior" />
                                                <input type="button" id="checkBtn" data-page="3" name="next" class="next action-button style_btn" value="Siguiente" />
                                            </fieldset>
                                            <!-- End Datos de la propiedad -->
                                            <!-- Descripción de la propiedad -->
                                            <fieldset>
                                                <div class="col-md-12">
                                                    <div class="inner-header">
                                                        <h2>Servicios que incluye</h2>
                                                    </div>
                                                </div>
                                                <!-- Servicios -->
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <label for="servicios_incluye">Servicios que incluye</label><img class="ji" src="assets/images/asterisco.png" />
                                                        <div class="col-md-12 form_re" id="servicios_id">
                                                        </div>
                                                    </div>
                                                <!-- End Servicios -->
                                                <!-- Servicios adicionales -->

                                                <!-- End Política de cancelación -->
                                                <input type="button" data-page="2" name="previous" class="previous action-button style_btn" value="Anterior" />
                                                <input type="button" data-page="4" name="next" class="next action-button style_btn" value="Siguiente" />
                                            </fieldset>
                                            <!-- End Descripción de la propiedad -->
                                            <fieldset>
                                              <div class="col-md-12">
                                                    <div class="inner-header">
                                                        <h2>Descripción de la propiedad</h2>
                                                    </div>
                                                </div>
                                              <!-- End Servicios -->
                                              <!-- Servicios adicionales -->
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="col-md-12">
                                                      <h4>¿A que otros servicios tienen acceso los huéspedes?(Opcional)</h4>
                                                  </div>
                                                  <textarea id="servicios_adicionales" name="servicios_adicionales" type="text" value="" placeholder=""></textarea>
                                              </div>
                                              <!-- Descripción del inmueble -->
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="col-md-12">
                                                      <h4>Descripción del inmueble<img class="ji" src="assets/images/asterisco.png" /></h4>
                                                  </div>
                                                  <div class="form_re">
                                                    <textarea id="descripcion_inmueble" name="descripcion_inmueble" type="text" value="" placeholder="Describe como es el inmueble..." required></textarea>
                                                  </div>
                                              </div>
                                              <!-- End Descripción del inmueble  -->
                                              <!-- puntos de interes -->
                                              <div class="col-md-12">
                                                  <h4>Puntos de interés y cuidados en la zona<img class="ji" src="assets/images/asterisco.png" /></h4>
                                              </div>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form_re">
                                                  <textarea rows="5" id="puntos_interes" name="puntos_interes" type="text" value="" placeholder="Describe que atractivos hay en la zona y qué cuidados hay que tener, hay transporte cerca, hay supermercados al rededor, es recomendado caminar en la zona, etc.." required></textarea>
                                                </div>
                                              </div>
                                              <!-- End puntos de interes -->
                                              <!-- Política de cancelación -->
                                              <div class="col-md-12">
                                                  <h4>Política de cancelación<img class="ji" src="assets/images/asterisco.png" /></h4>
                                              </div>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form_re">
                                                  <textarea rows="5" id="politica" name="politica" type="text" value="" placeholder="Escribe la política de cancelación" required></textarea>
                                                </div>
                                              </div>
                                              <!-- End Política de cancelación -->
                                              <input type="button" data-page="2" name="previous" class="previous action-button style_btn" value="Anterior" />
                                              <input type="button" data-page="4" name="next" class="next action-button style_btn" value="Siguiente" />
                                            </fieldset>
                                            <!-- Galería -->
                                            <fieldset>
                                                <div class="col-md-12">
                                                    <div class="inner-header">
                                                        <h2>Foto de Portada<img class="ji" src="assets/images/asterisco.png" /></h2>
                                                    </div>
                                                </div>
                                                <!-- Subir imágenes portada -->
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form_re">
                                                    <input type="file" id="files" name="foto_portada" required data-rule-required="true" data-msg-required="Fotos es requerido">
                                                  </div>
                                                    <output id="list-miniatura" class="col-md-12"></output>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="inner-header">
                                                        <h2>Fotos del Alojamiento (Minimo 4)<img class="ji" src="assets/images/asterisco.png" /></h2>
                                                    </div>
                                                </div>
                                                <!-- Subir imágenes actividad -->
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form_re">
                                                    <input type="file" id="files2" name="fotos_alojamiento[]" multiple required data-rule-required="true" data-msg-required="Fotos es requerido">
                                                  </div>
                                                    <output id="list-miniatura2" class="col-md-12"></output>
                                                </div>
                                                <br><br><br>
                                                <!-- End Subir imágenes -->
                                                <input type="button" data-page="3" name="previous" class="previous action-button style_btn" value="Anterior" />
                                                <input type="button" id="checkBt_a" data-page="5" name="next" class="next action-button style_btn" value="Siguiente" onclick="/*return validarfiles()*/"/>
                                            </fieldset>
                                            <!-- End Galería -->
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include_once('../../common/footer.php'); ?>
			<?php include_once('../../common/popups.php'); ?>
        </div>
        <!-- Script -->
        <?php include_once('../../common/script.php'); ?>
        <!--Go to Top when change page/step-->
        <script>
            $(document).ready(function() {
                // Go Top when previous
                $(".previous").on("click", function(){
                    $('#topcontrol').trigger("click");
                });
            });
        </script>
        <!-- Script para validar solo números en el formulario -->

        <!-- End Script para validar solo números en el formulario -->

        <!-- Script -->
        <script type="text/javascript" src="assets/js/script.js"></script><!-- Script -->
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.es.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="src/js/alta_coche.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&libraries=places&callback=initialize" async defer></script>
        <!--script type="text/javascript" src="assets/js/choosen.min.js"></script><!-- Nice Select -->
        <!--TODO revisar funcionalidad-->
        <script>
            $( document ).ready(function() {
                //get servicios que incluye
                $.ajax({
                    data: {
                        "data" : "servicios"},
                    type: "POST",
                    dataType: "json",
                    url: "src/Controller/metadataController.php"
                })
                .done(function( data ) {
                    for(item in data.servicios){
                        var div = $("<div>").attr('id','div_servicios_'+data.servicios[item].id_tipo_servicios).attr("class","col-md-3 col-sm-6 col-xs-12");
                        var p = $('<p>').attr('id','p_servicios_'+data.servicios[item].id_tipo_servicios);
                        var input = $('<input>').attr("class", "styled-checkbox").attr("id", "checkbox_servicios_" + data.servicios[item].nombre.replace(/\s/g, "")).attr('name', 'tipo_servicios[]').attr('type', 'checkbox').attr('value', data.servicios[item].id_tipo_servicios);
                        var label = $('<label>').attr("for","checkbox_servicios_"+data.servicios[item].nombre.replace(/\s/g,""))
                        $('#servicios_id').append(div);
                        div.append(p);
                        p.append(input);
                        p.append(label);
                        label.text(data.servicios[item].nombre);
                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                    }
                });
                //get tipo alojamiento
                $.ajax({
                    data: {
                        "data" : "alojamientos"},
                    type: "POST",
                    dataType: "json",
                    url: "src/Controller/metadataController.php"
                })
                .done(function( data ) {
                    for(item in data.alojamientos){
                        var div_alojamiento = $("<div>").attr('id','div_'+data.alojamientos[item].id_tipo_alojamiento).attr("class","col-md-3 col-sm-6 col-xs-12");
                        var p_alojamiento = $('<p>').attr('id','p_'+data.alojamientos[item].id_tipo_alojamiento);
                        var input_alojamiento = $('<input>').attr("class", "styled-checkbox").attr("id", "checkbox_" + data.alojamientos[item].nombre.replace(/\s/g, "")).attr('name', 'tipo_alojamiento').attr('type', 'radio').attr('value', data.alojamientos[item].id_tipo_alojamiento);
                        var label_alojamiento = $('<label>').attr("for","checkbox_"+data.alojamientos[item].nombre.replace(/\s/g,""))
                        $('#alojamiento_id').append(div_alojamiento);
                        div_alojamiento.append(p_alojamiento);
                        p_alojamiento.append(input_alojamiento);
                        p_alojamiento.append(label_alojamiento);
                        label_alojamiento.text(data.alojamientos[item].nombre);
                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                    }
                });
                //get paises
                $.ajax({
                    data: {
                        "data" : "paises"},
                    type: "POST",
                    dataType: "json",
                    url: "src/Controller/metadataController.php"
                })
                .done(function( data ) {
                    for(item in data.paises){
                        var option = $("<option>").attr("value",data.paises[item].id_pais)
                        $('#pais').append(option);
                        option.text(data.paises[item].nombre);
                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                    }
                });
                //get estados
                $("#pais").on("change", function(){
                    $.ajax({
                        data: {
                            "data" : "estados",
                            "id_pais" : $("#pais option:selected").val()
                        },
                        type: "POST",
                        dataType: "json",
                        url: "src/Controller/metadataController.php"
                    })
                    .done(function( data ) {
                        $('#estado').empty();
                        var option = $("<option>").attr("value","");
                        $('#estado').append(option);
                        option.text("-- Selecciona una opción--");
                        if(data.estados == "Selecccione una opcion"){
                            console.log("TODO-validaciones");
                        }else{
                            for(item in data.estados){
                                var option = $("<option>").attr("value",data.estados[item].id_estado);
                                $('#estado').append(option);
                                option.text(data.estados[item].nombre);
                            }
                        }
                    })
                    .fail(function( jqXHR, textStatus, errorThrown ) {
                        if ( console && console.log ) {
                            console.log( "La solicitud a fallado: " +  textStatus);
                        }
                    });
                });
            });
        </script>
        <script src="assets/js/swiper_js/swiper.js"></script>
        <script>
            $(document).ready(function() {
                var mySwiper = new Swiper('.swiper-container', {
                    // Optional parameters
                    loop: false,
                    // If we need pagination
                    pagination: {
                        el: '.swiper-pagination',
                    },
                    // Navigation arrows
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    }
                });
                mySwiper.init();
                $('#addFecha').on('click', function (e) {
                    $('#numero_fe').val(  $('#numero_fe').val() + 1 );
                    var totalSliders = mySwiper.pagination.bullets.length + 1;
                    var slide = $("<div>").attr('class', "swiper-slide").attr('id', 'slider_' + totalSliders);

                    var divcontentUno = $("<div>").attr("class", "col-md-12 col-sm-12 col-xs-12").attr("id", "contentUno_" + totalSliders);
                    var divChildContentUno = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "childContentUno" + totalSliders);

                    var labelUno = $("<label>").attr("for", "fecha_entrada" + totalSliders);
                    labelUno.text("Fecha entrada");
                    var inputUno = $("<input>").attr("id", "fecha_entrada" + totalSliders).attr("name", "fecha_entrada[]").attr("type", "text").attr("readonly", "true").attr("value", "").attr("required", "required").attr("placeholder", "Fecha de entrada *").attr("autocomplete", "off").attr("data-rule-required", "true").attr("data-msg-required", "Fecha entrada es requerido");
                    inputUno.datepicker({
                      format: 'dd/mm/yyyy',
                      language: 'es',
                      autoclose: true,
                      startDate: "today"
                    }).on('changeDate', function (selected) {
                       inputUno.datepicker('hide');
                        var minDate = new Date(selected.date.valueOf());
                        inputDos.datepicker('setStartDate', minDate);
                    });
                    var divChildContentUno_ = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "chilContentUno_" + totalSliders);
                    var labelUno_ = $("<label>").attr("for", "hora_entrada" + totalSliders);
                    labelUno_.text("Hora entrada");
                    var inputUno_ = $("<input>").attr("id", "hora_entrada" + totalSliders).attr("name", "hora_entrada[]").attr("type", "time").attr("value", "").attr("required", "required").attr("placeholder", "Hora de entrada *").attr("autocomplete", "off").attr("data-rule-required", "true").attr("data-msg-required", "Hora de entrada es requerido");

                    var divcontentDos = $("<div>").attr("class", "col-md-12 col-sm-12 col-xs-12").attr("id", "contentDos_" + totalSliders);
                    var divChildContentDos = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "childContentDos" + totalSliders);
                    var labelDos = $("<label>").attr("for", "fecha_salida" + totalSliders);
                    labelDos.text("Fecha salida");
                    var inputDos = $("<input>").attr("id", "fecha_salida" + totalSliders).attr("name", "fecha_salida[]").attr("type", "text").attr("readonly", "true").attr("value", "").attr("required", "required").attr("placeholder", "Fecha de salida *").attr("autocomplete", "off").attr("data-rule-required", "true").attr("data-msg-required", "Fecha salida es requerido");
                    inputDos.datepicker({
                      format: 'dd/mm/yyyy',
                      language: 'es',
                      autoclose: true,
                      startDate: "today"
                    }).on('changeDate', function (selected) {
                        inputDos.datepicker('hide');
                          var maxDate = new Date(selected.date.valueOf());
                          inputUno.datepicker('setEndDate', maxDate);
                      });
                    var divChildContentDos_ = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "chilContentDos_" + totalSliders);
                    var labelDos_ = $("<label>").attr("for", "hora_salida" + totalSliders);
                    labelDos_.text("Hora salida");
                    var inputDos_ = $("<input>").attr("id", "hora_salida" + totalSliders).attr("name", "hora_salida[]").attr("type", "time").attr("value", "").attr("required", "required").attr("placeholder", "Hora de salida *").attr("autocomplete", "off").attr("data-rule-required", "true").attr("data-msg-required", "Hora de salida es requerido");
                    var divcontentTres = $("<div>").attr("class", "col-md-12 col-sm-12 col-xs-12").attr("id", "contentTres_" + totalSliders);
                    var divChildContentTres = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "childContentTres" + totalSliders);
                    var labelTres = $("<label>").attr("for", "tarifa_noche" + totalSliders);
                    labelTres.text("Tarifa por noche");
                    var inputTres = $("<input>").attr("id", "tarifa_noche" + totalSliders).attr("name", "tarifa_noche[]").attr("type", "text").attr("value", "").attr("required", "required").attr("placeholder", "Tarifa por Noche *").attr("autocomplete", "off").attr("data-rule-required", "true").attr("data-msg-required", "Tarifa por noche es requerido");
                    var divChildContentTres_ = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "chilContentTres_" + totalSliders);
                    var labelTres_ = $("<label>").attr("for", "tarifa_limpieza" + totalSliders);
                    labelTres_.text("Tarifa por Limpieza");
                    var inputTres_ = $("<input>").attr("id", "tarifa_limpieza" + totalSliders).attr("name", "").attr("type", "text").attr("value", "").attr("required", "required").attr("placeholder", "Tarifa por Limpieza *").attr("autocomplete", "off").attr("data-rule-required", "true").attr("data-msg-required", "Tarifa por limpieza es requerido");
                    var divcontentCuatro = $("<div>").attr("class", "col-md-12 col-sm-12 col-xs-12").attr("id", "contentCuatro" + totalSliders);
                    var divChildContentCuatro = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "childContentCuatro" + totalSliders);
                    var labelCuatro = $("<label>").attr("for", "otros_cargos" + totalSliders);
                    labelCuatro.text("$ Otros cargos por estancia");
                    var inputCuatro = $("<input>").attr("id", "otros_cargos" + totalSliders).attr("name", "otros_cargos[]").attr("type", "text").attr("value", "").attr("placeholder", "$ Otro Cargo por estancia").attr("autocomplete", "off");
                    var divChildContentCuatro_ = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "chilContentCuatro_" + totalSliders);
                    var labelCuatro_ = $("<label>").attr("for", "desc_cargo" + totalSliders);
                    labelCuatro_.text("Descripción de otros cargos por estancia");
                    var inputCuatro_ = $("<input>").attr("id", "desc_cargo" + totalSliders).attr("name", "desc_cargo[]").attr("type", "text").attr("value", "").attr("placeholder", "Descripción del cargo").attr("autocomplete", "off");
                    var divcontentCinco = $("<div>").attr("class", "col-md-12 col-sm-12 col-xs-12").attr("id", "contentCinco" + totalSliders);
                    var divChildContentCinco = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "childContentCinco" + totalSliders);
                    var labelCinco = $("<label>").attr("for", "descuentosieteCinco" + totalSliders);
                    labelCinco.text("% de descuento por 7 noches");
                    var inputCinco = $("<input>").attr("id", "descuentosieteCinco" + totalSliders).attr("name", "descuentosiete[]").attr("type", "text").attr("value", "").attr("placeholder", "% descuento por 7 noches").attr("autocomplete", "off");
                    var divChildContentCinco_ = $("<div>").attr("class", "col-md-6 col-sm-6 col-xs-12").attr("id", "chilContenCinco_" + totalSliders);
                    var labelCinco_ = $("<label>").attr("for", "descuentotreinta" + totalSliders);
                    labelCinco_.text("% de descuento por 30 noches");
                    var inputCinco_ = $("<input>").attr("id", "descuentotreinta" + totalSliders).attr("name", "descuentotreinta[]").attr("type", "text").attr("value", "").attr("placeholder", "% descuento por 30 noches").attr("autocomplete", "off");

                    //moneda
                    var divmoneda = $("<div>").attr("class", "col-md-12 col-sm-12 col-xs-12");
                    var divmoneda2 = $("<div>").attr("class", "col-md-6 col-sm-4 col-xs-12");
                    var labelmoneda = $("<h4>");
                    labelmoneda.text('Moneda');
                    var divform_moneda = $("<div>").attr("class", "form_re");

                    var divmonedamxn= $("<div>").attr("class", "col-md-3 col-sm-3 col-xs-6");
                    var labelmoneda1 = $("<label>").attr("class", "container_radio");
                    labelmoneda1.text('MXN');
                    var radiomxn = $("<input>").attr("id", "moneda_mxn"+ totalSliders).attr("name", "moneda"+totalSliders).attr("type", "radio").attr("value", "MXN").attr('required', 'true');
                    var spanmxn = $("<span>").attr("class", "checkmark");

                    var divmonedausd= $("<div>").attr("class", "col-md-3 col-sm-3 col-xs-6");
                    var labelmoneda2 = $("<label>").attr("class", "container_radio");
                    labelmoneda2.text('USD');
                    var radiousd = $("<input>").attr("id", "moneda_usd"+ totalSliders).attr("name", "moneda"+totalSliders).attr("type", "radio").attr("value", "USD").attr('required', 'true');
                    var spanusd = $("<span>").attr("class", "checkmark");

                    labelmoneda1.append(radiomxn);
                    labelmoneda1.append(spanmxn);
                    divmonedamxn.append(labelmoneda1);

                    labelmoneda2.append(radiousd);
                    labelmoneda2.append(spanusd);
                    divmonedausd.append(labelmoneda2);

                    divform_moneda.append(divmonedamxn);
                    divform_moneda.append(divmonedausd);

                    divmoneda2.append(labelmoneda);
                    divmoneda2.append(divform_moneda);

                    divmoneda.append(divmoneda2);

                    var divcontentButton = $("<div>").attr("class", "col-md-12 col-sm-12 col-xs-12").attr("id", "contentButton" + totalSliders);
                    var button_rmv = $("<button>").attr("type", "button").attr("class", "btn btn-danger").attr("id", "rmvFecha");
                    button_rmv.text("Eliminar esta fecha");

                    divcontentButton.on("click", function () {
                        $('#numero_fe').val(  $('#numero_fe').val() - 1 );
                        mySwiper.removeSlide(mySwiper.realIndex);
                    });

                    var divform_re1 = $("<div>").attr("class", "form_re");
                    var divform_re2 = $("<div>").attr("class", "form_re");
                    var divform_re3 = $("<div>").attr("class", "form_re");
                    var divform_re4 = $("<div>").attr("class", "form_re");
                    var divform_re5 = $("<div>").attr("class", "form_re");
                    var divform_re6 = $("<div>").attr("class", "form_re");
                    var divform_re7 = $("<div>").attr("class", "form_re");
                    var divform_re8 = $("<div>").attr("class", "form_re");
                    var divform_re9 = $("<div>").attr("class", "form_re");
                    var divform_re10 = $("<div>").attr("class", "form_re");



                    slide.append(divcontentUno);

                    divcontentUno.append(divChildContentUno);
                    divChildContentUno.append(divform_re1);
                    divform_re1.append(labelUno);
                    divform_re1.append(inputUno);

                    divcontentUno.append(divChildContentUno_);
                    divChildContentUno_.append(divform_re2);
                    divform_re2.append(labelUno_);
                    divform_re2.append(inputUno_);

                    slide.append(divcontentDos);

                    divcontentDos.append(divChildContentDos);
                    divChildContentDos.append(divform_re3);
                    divform_re3.append(labelDos);
                    divform_re3.append(inputDos);

                    divcontentDos.append(divChildContentDos_);
                    divChildContentDos_.append(divform_re4);
                    divform_re4.append(labelDos_);
                    divform_re4.append(inputDos_);

                    slide.append(divcontentTres);

                    divcontentTres.append(divChildContentTres);
                    divChildContentTres.append(divform_re5);
                    divform_re5.append(labelTres);
                    divform_re5.append(inputTres);

                    divcontentTres.append(divChildContentTres_);
                    divChildContentTres_.append(divform_re6);
                    divform_re6.append(labelTres_);
                    divform_re6.append(inputTres_);

                    slide.append(divcontentCuatro);

                    divcontentCuatro.append(divChildContentCuatro);
                    divChildContentCuatro.append(divform_re7);
                    divform_re7.append(labelCuatro);
                    divform_re7.append(inputCuatro);

                    divcontentCuatro.append(divChildContentCuatro_);
                    divChildContentCuatro_.append(divform_re8);
                    divform_re8.append(labelCuatro_);
                    divform_re8.append(inputCuatro_);

                    slide.append(divcontentCinco);

                    divcontentCinco.append(divChildContentCinco);
                    divChildContentCinco.append(divform_re9);
                    divform_re9.append(labelCinco);
                    divform_re9.append(inputCinco);

                    divcontentCinco.append(divChildContentCinco_);
                    divChildContentCinco_.append(divform_re10);
                    divform_re10.append(labelCinco_);
                    divform_re10.append(inputCinco_);

                    slide.append(divmoneda);

                    slide.append(divcontentButton);
                    divcontentButton.append(button_rmv);
                    //Agregar el slide completo
                    mySwiper.appendSlide(slide);
                });
            });
        </script>
    </body>
</html>

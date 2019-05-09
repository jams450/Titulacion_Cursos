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
                                    <h2>Formulario de Gastronomía</h2>
                                    <ul class="breadcrumbs">
                                        <li><a href="index.php" title="">Inicio</a></li>
                                        <li>Gastronomía</li>
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
                                        <li>Datos de la experiencia</li>
                                        <li>Servicios que incluye</li>
                                        <li class="servicios">Descripción de la experiencia</li>
                                        <li>Fotos</li>
                                    </ul>
                                </div>
                                <div class="checkout-sec">
                                    <form class="steps" method="post" id='signin' name="alta_gastronomia" action="/src/Controller/gastronomiaController.php" enctype="multipart/form-data">
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
                                                            <h2>Datos de la experiencia</h2>
                                                        </div>
                                                    </div>
                                                    <!-- Nombre de la propiedad -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form_re">
                                                        <label for="nombre_gastronomia">Título de la experiencia</label><img class="ji" src="assets/images/asterisco.png" />
                                                        <input id="nombre_gastronomia" name="nombre_gastronomia" type="text" value="" maxlength="80" placeholder="Título de la experiencia *" autocomplete="off" required data-rule-required="true" data-msg-required="Especifique Nombre de la experiencia" >
                                                      </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <div class="form_re">
                                                            <label for="precio_persona">Precio por persona</label><img class="ji" src="assets/images/asterisco.png" />
                                                            <input id="precio_persona" name="precio_persona" required="required" type="number"  min="1" step="any" value="" placeholder="Precio por persona *" data-rule-required="true" data-msg-required="Tarifa por persona es requerido" autocomplete="off">
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-4 col-xs-12">
                                                          <h4>Moneda</h4>
                                                          <div class="form_re">
                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                              <label class="container_radio" id="labelmxn">MXN
                                                                <input type="radio" name="moneda" value="MXN" required>
                                                                <span class="checkmark"></span>
                                                              </label>
                                                            </div>
                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                              <label class="container_radio"  id="labelusd">USD
                                                                <input type="radio" name="moneda" value="USD" required>
                                                                <span class="checkmark"></span>
                                                              </label>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <div class="form_re">
                                                            <label for="fecha">Fecha </label>
                                                            <input id="fecha" name="fecha" required="required" type="text" class="datepicker" readonly value="" maxlength="80" placeholder="Fecha *" data-rule-required="true" data-msg-required="Fecha es requerido" autocomplete="off">
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <div class="form_re">
                                                            <label for="hora_entrada">Hora entrada</label>
                                                            <input id="hora_entrada" name="hora_entrada" required="required" type="time" value="" maxlength="80" placeholder="Hora de entrada *" data-rule-required="true" data-msg-required="Hora de entrada es requerido" autocomplete="off">
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Nombre de la propiedad -->
                                                    <!-- datos Direccion -->
                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                        <h3>Dirección</h3>
                                                    </div>
                                                    <!-- Descripcion ubicación -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div class="form_re">
                                                        <input id="autocomplete" name="direccion_larga" onFocus="geolocate()" type="text" value="" placeholder="Ingresa tu dirección completa" required="required" data-rule-required="true"
                                                          data-msg-required="Especifique datos de la ubicación" autocomplete="new-password">
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <!-- End Descripcion ubicación -->
                                                      <!-- calle -->
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form_re">
                                                          <input class="field" id="route" name="calle_colonia" placeholder="Ingresa calle, colonia" required="required" data-rule-required="true" data-msg-required="Especifique calle y colonia" readonly>
                                                        </div>
                                                      </div>
                                                      <!-- End calle -->
                                                      <!-- numero int -->
                                                      <!-- End numero apartamento -->
                                                      <!-- numero ext -->
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form_re">
                                                          <input class="field" id="street_number" name="numero_calle" placeholder="Número Exterior" required="required" data-rule-required="true" data-msg-required="Especifique número exterior" readonly>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <!-- End numero ext -->
                                                    <div class="row">
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form_re">
                                                          <input class="field" id="locality" name="ciudad" placeholder="Ingresa tu ciudad" required="required" data-rule-required="true" data-msg-required="Especifique una ciudad" readonly>
                                                        </div>
                                                      </div>
                                                      <!-- End Nombre edificio -->

                                                      <!-- Código postal -->
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form_re">
                                                          <input class="field" id="postal_code" name="cp" placeholder="Ingresa tu codigo postal" data-rule-required="true" data-msg-required="Especifique un codigo postal" required="required" readonly>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- Nombre edificio -->

                                                    <!-- End Código postal -->
                                                    <div class="row">
                                                      <!-- País -->
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form_re">
                                                          <input class="field" id="country" name="pais" placeholder="Ingresa tu pais" required="required" data-rule-required="true" data-msg-required="Especifique un pais" readonly>
                                                        </div>
                                                      </div>
                                                      <!-- End País -->
                                                      <!-- Estado -->
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form_re">
                                                          <input class="field" id="administrative_area_level_1" name="estado" placeholder="Ingresa tu estado" required="required" data-rule-required="true" data-msg-required="Especifique un estado" readonly>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div class="form_re">
                                                        <input id="desc_ubicacion" name="desc_ubicacion" required="required" type="text" value="" maxlength="512" placeholder="Descripción adicional de la ubicación" data-rule-required="true" data-msg-required="Especifique datos de la ubicación" autocomplete="off">
                                                      </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input id="nombre_edificio" name="nombre_edificio" type="text" value="" maxlength="512" placeholder="Nombre del Edificio" data-msg-required="Especifique datos de la ubicación" autocomplete="off">
                                                    </div>

                                                    <div class="row">
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input id="num_int" name="num_int" type="text" value="" maxlength="20" placeholder="Número Interior "   data-msg-required="Número interior es requerido" autocomplete="off">
                                                      </div>
                                                      <!-- End numero int -->
                                                      <!-- numero apartamento -->
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input id="numero_apartamento" name="numero_apartamento" type="text" value="" maxlength="20" placeholder="Número Apartamento " autocomplete="off">
                                                      </div>
                                                    </div>

                                                    <div class="inner-header">
                                                        <h4>Mapa</h4>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div id="map" style="height: 450px">

                                                      </div>
                                                    </div>
                                                    <div style="display: none">
                                                      <input type="hidden" name="lat" value="" id="lat">
                                                      <input type="hidden" name="lng" value="" id="lng">
                                                    </div>
                                                    <!-- End Estado -->
                                                    <!-- mapa -->
                                                    <!--div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="desc_ubicacion" name="desc_ubicacion" required="required" type="text" value="" maxlength="20" placeholder="Descripción ubicación *" data-rule-required="true" data-msg-required="Especifique datos de la ubicación" autocomplete="off">
                                                        <span id="error_mensaje" class="error1 animated bounceInLeft" style="display: none;">
                                                            <i class="error-log fa fa-exclamation-triangle"></i>
                                                        </span>
                                                    </div-->
                                                    <!-- End datos Direccion -->
                                                    <!-- Tipo de alojamiento -->
                                                    <div class="inner-header">
                                                        <h4>Tipo de experiencia</h4>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <label for="tipo_experiencia">Tipo de experiencia</label><img class="ji" src="assets/images/asterisco.png" />
                                                        <div class="col-md-12 form_re" id="experiencia_id">

                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <label for="tipo_comida">Tipo de comida</label><img class="ji" src="assets/images/asterisco.png" />
                                                        <div class="col-md-12 form_re" id="comida_id">

                                                        </div>
                                                    </div>
                                                    <!-- End Tipo de alojamiento -->
                                                    <div class="row">
                                                      <!-- Huespedes adultas -->
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-12">
                                                                <label>¿Mínimo para cuantos huéspedes?</label><span id="msg_error_vacio_number"></span>
                                                            </div>
                                                            <div class="c-input-number form_re">
                                                                <span><input id="min_huespedes" name="min_huespedes" required type="number" step="1" min="1" maxlength="30" class="manual-adjust" value="0"/></span>
                                                            </div>
                                                        </div>
                                                        <!-- End Huespedes adultas -->
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="col-md-12">
                                                                <label>¿Maximo para cuantos huéspedes?</label><span id="msg_error_vacio_number"></span>
                                                            </div>
                                                            <div class="c-input-number form_re">
                                                                <span><input id="max_huespedes" name="max_huespedes" required type="number" step="1" min="1" maxlength="30" class="manual-adjust" value="0"/></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                      <!-- Num dormitorios -->
                                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                                          <div class="col-md-6 col-sm-4 col-xs-12">
                                                            <h4>¿Pueden Asistir niños?</h4>
                                                            <div class="form_re">
                                                              <div class="col-md-3 col-sm-3 col-xs-6">
                                                                <label class="container_radio">Si
                                                                  <input type="radio" name="ninos" value="si" required>
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                              <div class="col-md-3 col-sm-3 col-xs-6">
                                                                <label class="container_radio">No
                                                                  <input type="radio" name="ninos" value="no" required>
                                                                  <span class="checkmark"></span>
                                                                </label>
                                                              </div>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <!-- End num baños -->
                                                    </div>

                                                </div>
                                                <input type="button" data-page="1" name="previous" class="previous action-button style_btn" value="Anterior" />
                                                <input type="button" id="checkBtn" data-page="3" name="next" class="next action-button style_btn" value="Siguiente" onclick="/*return validarInputs()*/"/>
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
                                                        <h2>Descripción de la experiencia</h2>
                                                    </div>
                                              </div>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="col-md-12">
                                                      <h4>Agregue el menú<img class="ji" src="assets/images/asterisco.png" /></h4>
                                                  </div>
                                                  <div class="form_re">
                                                    <textarea id="menu" name="menu" type="text" value="" placeholder="Entrada..." required></textarea>
                                                  </div>
                                              </div>

                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="col-md-12">
                                                      <h4>Descripción de la experiencia<img class="ji" src="assets/images/asterisco.png" /></h4>
                                                  </div>
                                                  <div class="form_re">
                                                    <textarea id="descripcion_experiencia" name="descripcion_experiencia" type="text" value="" placeholder="Describe que va a encontrar o vivir el huésped en la experiencia." required></textarea>
                                                  </div>
                                              </div>

                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="col-md-12">
                                                      <h4>Bebidas que incluye y cuales tienen costo<img class="ji" src="assets/images/asterisco.png" /></h4>
                                                  </div>
                                                  <div class="form_re">
                                                    <textarea id="bebidas" name="bebidas" type="text" value="" placeholder="Describe cuáles bebidas incluye el menú y cuáles con adicionales y tienen costo" required></textarea>
                                                  </div>
                                              </div>

                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="col-md-12">
                                                      <h4>Diestas especiales<img class="ji" src="assets/images/asterisco.png" /></h4>
                                                  </div>
                                                  <div class="form_re">
                                                    <textarea id="dieta" name="dieta" type="text" value="" placeholder="Describe si incluye algún ingrediente que le puede hacer daño a alguien como almendras, lacteos, etc." required></textarea>
                                                  </div>
                                              </div>

                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="col-md-12">
                                                      <h4>Requisitos <img class="ji" src="assets/images/asterisco.png" /></h4>
                                                  </div>
                                                  <div class="form_re">
                                                    <textarea id="requisitos" name="requisitos" type="text" value="" placeholder="Poner los requisitos que tu exiges que deban cumplir los huéspedes que compren tu expetiencia, ej. No pueden ir en bermudas, llegar con 15 minutos de anticipación, etc." required></textarea>
                                                  </div>
                                              </div>

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
                                                        <h2>Fotos del la casa y platillos (Minimo 4)<img class="ji" src="assets/images/asterisco.png" /></h2>
                                                    </div>
                                                </div>
                                                <!-- Subir imágenes actividad -->
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <div class="form_re">
                                                    <input type="file" id="files2" name="fotos_gastronomia[]" multiple required data-rule-required="true" data-msg-required="Fotos es requerido">
                                                  </div>
                                                    <output id="list-miniatura2" class="col-md-12"></output>
                                                </div>
                                                <br><br><br>
                                                <!-- End Subir imágenes -->
                                                <input type="button" data-page="4" name="previous" class="previous action-button style_btn" value="Anterior" />
                                                <button type="submit" name="alta_gastronomia" class="btn_guardar" id="submitbtn">GUARDAR</button>
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
        <script type="text/javascript" src="src/js/alta_gastronomia.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&libraries=places&callback=initialize" async defer></script>
        <!--script type="text/javascript" src="assets/js/choosen.min.js"></script><!-- Nice Select -->
        <!--TODO revisar funcionalidad-->
    </body>
</html>

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
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datepicker3.standalone.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/wickedpicker.min.css">

  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/responsive.dataTables.min.css">

  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/sweetalert2.min.css">
  <style>
    /* select  */
    .chosen-select {
      margin-top: 0px !important;
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

    input#nombre_contacto,
    input#apellido_contacto,
    input#phone,
    input#tel_oficina,
    input#email_reg,
    input#direccion,
    input#ciudad,
    input#estado,
    input#pais,
    input#codigo_postal {
      color: #d9042a;
    }

    .checkout-sec>form input,
    .checkout-sec form textarea {
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

    .checkout-sec>form input:focus:invalid {
      /* when a field is considered invalid by the browser */
      background: #fff url(/assets/images/invalid.png) no-repeat 98% center;
      background-size: 5%;
    }

    .checkout-sec>form input:required:valid {
      /* when a field is considered valid by the browser */
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

    .checkout-sec>form input:required {
      background: #fff url(/assets/images/asterisco.png) no-repeat 98% center;
      background-size: 2%;
    }

    .form_hint {
      background: #d9042a;
      border-radius: 3px 3px 3px 3px;
      color: white;
      margin-left: 8px;
      padding: 1px 6px;
      z-index: 999;
      /* hints stay above all other elements */
      position: absolute;
      /* allows proper formatting if hint is two lines */
      display: none;
      margin-top: 12px;
      font-size: 1rem;
    }

    .form_hint::before {
      content: "\25C0";
      /* left point triangle in escaped unicode */
      color: #d9042a;
      position: absolute;
      top: 1px;
      left: -6px;
    }

    .checkout-sec>form input:focus+.form_hint {
      display: inline;
    }

    .checkout-sec>form input:required:valid+.form_hint {
      background: #28921f;
    }

    /* change form hint color when valid */
    .checkout-sec>form input:required:valid+.form_hint::before {
      color: #28921f;
    }

    /* change form hint arrow color when valid */
    .checkout-sec>form select:focus+.form_hint {
      display: inline;
    }

    .checkout-sec>form select:required:valid+.form_hint {
      background: #28921f;
    }

    /* change form hint color when valid */
    .checkout-sec>form select:required:valid+.form_hint::before {
      color: #28921f;
    }

    /* change form hint arrow color when valid */
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

    .container_radio:hover input~.checkmark {
      background-color: #ccc;
    }

    .container_radio input:checked~.checkmark {
      background-color: #2196F3;
    }

    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    .container_radio input:checked~.checkmark:after {
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

    .ng-check-style {
      position: absolute;
      width: initial !important;
    }

    .dato_empresa {
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

    .dato_empresa>h5 {
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

    .row {
      margin-left: 0px;
      margin-right: 0px;
    }

    .wickedpicker {
      height: 167px;
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
                <h2>Formulario de Alojamiento</h2>
                <ul class="breadcrumbs">
                  <li><a href="index.php" title="">Inicio</a></li>
                  <li>Alojamientos</li>
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
                  <li>Datos de la propiedad</li>
                  <li>Servicios que incluye</li>
                  <li>Fotos</li>
                  <li>Configuración de precios</li>
                </ul>
              </div>
              <div class="checkout-sec">
                <form class="steps" method="post" action="/src/Controller/alojamientoController.php" enctype="multipart/form-data" id='signin' name="alta_alojamiento" >
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
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                  <label>Empresas registradas previamente</label>
                                  <select class="chosen-select" data-placeholder="- - Selecciona la empresa - -" id="empresa" name="empresa" type="text" value="" maxlength="15">
                                    <option value="0"></option>
                                  </select>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                  <label>¿Registrar nueva empresa?</label>
                                  <input type="button" style="background: #D9042A;color: white;" id="nueva_empresa" value="Registrar" />
                                </div>
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
                            <h2>Datos de la propiedad</h2>
                          </div>
                        </div>
                        <!-- Nombre de la propiedad -->
                        <div class="col-md-12 col-xs-12  col-sm-12">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form_re">
                              <label for="nombre_propiedad">Nombre de la propiedad</label><img class="ji" src="assets/images/asterisco.png" />
                              <input id="nombre_propiedad" name="nombre_alojamiento" type="text" value="" maxlength="80" placeholder="Nombre de la propiedad *" autocomplete="off" required data-rule-required="true"
                                data-msg-required="Especifique Nombre de la propiedad">
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
                            <input id="desc_ubicacion" name="desc_ubicacion" required="required" type="text" value="" maxlength="512" placeholder="Descripción adicional de la ubicación" data-rule-required="true"
                              data-msg-required="Especifique datos de la ubicación" autocomplete="off">
                          </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="nombre_edificio" name="nombre_edificio" type="text" value="" maxlength="512" placeholder="Nombre del Edificio" data-msg-required="Especifique datos de la ubicación" autocomplete="off">
                        </div>

                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="num_int" name="num_int" type="text" value="" maxlength="20" placeholder="Número Interior " data-msg-required="Número interior es requerido" autocomplete="off">
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
                          <h4>Tipo de alojamiento</h4>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <label for="tipo_alojamiento">Tipo de alojamiento</label><img class="ji" src="assets/images/asterisco.png" />
                          <div class="col-md-12 form_re" id="alojamiento_id">
                          </div>

                        </div>
                        <!-- End Tipo de alojamiento -->
                        <div class="row">
                          <!-- Huespedes adultas -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12">
                              <label>¿Cuántas huéspedes adultos caben?</label><span id="msg_error_vacio_number"></span>
                            </div>
                            <div class="c-input-number form_re">
                              <span><input id="adultas" name="adultos" required type="number" step="1" min="1" maxlength="30" class="manual-adjust" value="0" /></span>
                            </div>
                          </div>
                          <!-- End Huespedes adultas -->
                          <!-- Niños (cuantos) -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12">
                              <label>¿Cuántas huéspedes niños caben?</label><span id="msg_error_vacio_number"></span>
                            </div>
                            <div class="c-input-number form_re">
                              <span><input id="niños" name="child" required type="number" step="1" min="0" maxlength="30" class="manual-adjust" value="0" /></span>
                            </div>
                          </div>
                          <!-- End Niños (cuantos) -->
                        </div>

                        <div class="row">
                          <!-- Num dormitorios -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12">
                              <label>¿Cuántas dormitorios hay?</label><span id="msg_error_vacio_number"></span>
                            </div>
                            <div class="c-input-number form_re">
                              <span><input id="num_dormitorios" required min="1" name="num_dormitorios" type="number" step="1" maxlength="3" class="manual-adjust" value="0" /></span>
                            </div>
                          </div>
                          <!-- End Num dormitorios -->
                          <!-- num baños -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12">
                              <label>¿Cuántas baños hay?</label><span id="msg_error_vacio_number"></span>
                            </div>
                            <div class="c-input-number form_re">
                              <span><input id="num_wc" name="num_wc" required min="1" type="number" step="1" maxlength="3" class="manual-adjust" value="0" /></span>
                            </div>
                          </div>
                          <!-- End num baños -->
                        </div>

                        <div class="row">
                          <!-- num camas -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12">
                              <label>¿Cuántas camas hay?</label><span id="msg_error_vacio_number"></span>
                            </div>
                            <div class="c-input-number form_re">
                              <span><input id="num_camas" name="num_camas" required min="1" type="number" step="1" maxlength="3" class="manual-adjust" value="0" /></span>
                            </div>
                          </div>
                          <!-- End num camas -->
                          <!-- num_sofacamas -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12">
                              <label>¿Cuántos sofacamas hay?</label><span id="msg_error_vacio_number"></span>
                            </div>
                            <div class="c-input-number form_re">
                              <span><input id="num_sofacamas" name="num_sofacamas" required min="0" type="number" step="1" maxlength="3" class="manual-adjust" value="0" /></span>
                            </div>
                          </div>
                          <!-- End num_sofacamas -->
                        </div>

                        <div class="row">
                          <!-- noches minimo-->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12">
                              <label>Noches Mínimo de hospedaje:</label><span id="msg_error_vacio_number"></span>
                            </div>
                            <div class="c-input-number form_re">
                              <span><input id="min_noches" name="min_noches" required min="1" type="number" step="1" maxlength="3" class="manual-adjust" value="0" /></span>
                            </div>
                          </div>
                          <!-- End noches minimo-->
                          <!-- noches limite-->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-12">
                              <label>Noches Máximo de hospedaje:</label><span id="msg_error_vacio_number"></span>
                            </div>
                            <div class="c-input-number form_re">
                              <span><input id="noches_limite" name="noches_limite" required min="1" type="number" step="1" maxlength="3" class="manual-adjust" value="0" /></span>
                            </div>
                          </div>
                          <!-- End noches limite-->
                        </div>

                        <!-- dias previos -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="col-md-12">
                            <label>Días previos que necesita para recibir una reserva:</label><span id="msg_error_vacio_number"></span>
                          </div>
                          <div class="c-input-number form_re">
                            <span><input id="prev_reserva" name="prev_reserva" required min="1" type="number" step="1" maxlength="3" class="manual-adjust" value="0" /></span>
                          </div>
                        </div>
                        <!-- End dias previos -->
                      </div>
                      <input type="button" data-page="1" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <input type="button" id="checkBtn" data-page="3" name="next" class="next action-button style_btn" value="Siguiente" onclick="/*return validarInputs()*/" />
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

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12">
                          <h4>Puntos de interés y cuidados en la zona<img class="ji" src="assets/images/asterisco.png" /></h4>
                        </div>
                        <div class="form_re">
                          <textarea rows="5" id="puntos_interes" name="puntos_interes" type="text" value=""
                            placeholder="Describe que atractivos hay en la zona y qué cuidados hay que tener, hay transporte cerca, hay supermercados al rededor, es recomendado caminar en la zona, etc.." required></textarea>
                        </div>
                      </div>
                      <!-- End puntos de interes -->
                      <!-- Política de cancelación -->

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12">
                          <h4>Política de cancelación<img class="ji" src="assets/images/asterisco.png" /></h4>
                        </div>
                        <div class="form_re">
                          <textarea rows="5" id="politica" name="politica" type="text" value="" placeholder="Escribe la política de cancelación" required></textarea>
                        </div>
                      </div>
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
                      <input type="button" id="checkBt_a" data-page="5" name="next" class="next action-button style_btn" value="Siguiente" onclick="/*return validarfiles()*/" />
                    </fieldset>
                    <!-- End Galería -->
                    <!--Tabla precios/fechas -->
                    <fieldset>
                      <div class="col-md-12">
                        <div class="col-md-12">
                          <div class="inner-header">
                            <h2>Configuración de precios</h2>
                          </div>
                        </div>
                        <div class="swiper-container col-md-12 col-sm-12 col-xs-12">
                          <!-- Additional required wrapper -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form_re">
                                  <label for="fecha_entrada">Fecha inicio</label>
                                  <input id="fecha_entrada" name="fecha_entrada" type="text" class="datepicker" readonly value="" maxlength="80" placeholder="Fecha de entrada *"
                                    data-msg-required="Fecha entrada es requerido" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form_re">
                                  <label for="hora_entrada">Hora llegada</label>
                                  <input id="hora_entrada" name="hora_entrada"  type="text" readonly value="" maxlength="80" placeholder="Hora de entrada *" data-msg-required="Hora de entrada es requerido"
                                    autocomplete="off">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form_re">
                                  <label for="fecha_salida">Fecha salida</label>
                                  <input id="fecha_salida" name="fecha_salida" type="text"  class="datepicker" readonly value="" maxlength="80" placeholder="Fecha de salida *"
                                    data-msg-required="Fecha salida es requerido" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form_re">
                                  <label for="hora_salida">Hora salida</label>
                                  <input id="hora_salida" name="hora_salida" type="text" readonly value="" maxlength="80" placeholder="Hora de salida *" data-msg-required="Hora de salida es requerido"
                                    autocomplete="off">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form_re">
                                  <label for="tarifa_noche">Tarifa por noche</label>
                                  <input id="tarifa_noche" name="tarifa_noche" type="number" min="1" step="any" value="" maxlength="80" placeholder="Tarifa por Noche *"
                                    data-msg-required="Tarifa por noche es requerido" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form_re">
                                  <label for="tarifa_limpieza">Tarifa de Limpieza por estancia</label>
                                  <input id="tarifa_limpieza" name="tarifa_limpieza" type="number" min="1" step="any" value="" maxlength="80" placeholder="Tarifa por Limpieza *"
                                    data-msg-required="Tarifa por limpieza es requerido" autocomplete="off">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form_re">
                                  <label for="otros_cargos">$ Otros cargos por estancia</label>
                                  <input id="otros_cargos" name="otros_cargos" type="number" step="any" value="" min="0" maxlength="80" placeholder="$ Otro Cargo por estancia" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form_re">
                                  <label for="desc_cargo">Descripción de otros cargos por estancia</label>
                                  <input id="desc_cargo" name="desc_cargo" type="number" step="any" value="" min="0" maxlength="80" placeholder="Descripción del cargo" autocomplete="off">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="col-md-6 col-sm-4 col-xs-12">
                                <div class="form_re">
                                  <label for="descuentosiete">% de descuento por 7 noches</label>
                                  <input id="descuentosiete" name="descuentosiete" type="number" step="any" max="100" min="0" value="" maxlength="80" placeholder="% descuento por 7 noches" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-4 col-xs-12">
                                <div class="form_re">
                                  <label for="descuentotreinta">% de descuento por 30 noches</label>
                                  <input id="descuentotreinta" name="descuentotreinta" type="number" step="any" max="100" min="0" value="" maxlength="80" placeholder="% descuento por 30 noches" autocomplete="off">
                                </div>
                              </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12" >
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
                                    <label class="container_radio" id="labelusd">USD
                                      <input type="radio" name="moneda" value="USD" required>
                                      <span class="checkmark"></span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <small>Agregá fechas adicionales para la misma actividad</small><br>
                          <button type="button" name="alta_fecha" class="btn btn-primary " id="addFecha">Agregar fechas</button>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12">
                          <h2>Fechas</h2>
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                          <div class="table-responsive">
                            <table id="tabla_precios" class="table table-condensed table-bordered dt-responsive">
                              <thead>
                                <tr>
                                  <th>Fecha inicio</th>
                                  <th>Hora llegada</th>
                                  <th>Fecha Salida</th>
                                  <th>Hora salida</th>
                                  <th>Tarifa por noche</th>
                                  <th>Tarifa de limpieza</th>
                                  <th>Otro Cargo</th>
                                  <th>Descripción del cargo</th>
                                  <th>Moneda</th>
                                  <th>% Descuento 7 noches</th>
                                  <th>% Descuento 30 noches</th>
                                  <th>Eliminar</th>
                                </tr>
                              </thead>
                            </table>
                          </div>

                        </div>
                      </div>
                      <input type="button" data-page="4" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <button name="alta_alojamiento" class="btn_guardar" id="resumenbtn">Siguiente</button>
                    </fieldset>
                    <!-- End Tabla precios/fechas-->
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
      $(".previous").on("click", function() {
        $('#topcontrol').trigger("click");
      });
    });
  </script>
  <!-- Script para validar solo números en el formulario -->

  <!-- End Script para validar solo números en el formulario -->

  <!-- Script -->
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.es.min.js"></script>
  <script type="text/javascript" src="assets/js/wickedpicker.min.js"></script>
  <script type="text/javascript" src="assets/js/choosen.min.js"></script>

  <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>


  <script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&libraries=places&callback=initialize" async defer></script>
  <!--script type="text/javascript" src="assets/js/choosen.min.js"></script><!-- Nice Select -->
  <script type="text/javascript" src="src/js/alta_alojamiento.js"></script>
</body>

</html>

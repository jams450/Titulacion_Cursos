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
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/sweetalert2.min.css">
  <style>
    .chosen-select {
      margin-top: 0px !important;
    }

    header.on-top {
      position: relative;
    }

    #registro {
      opacity: 0.65;
      cursor: not-allowed;
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

    .col-lg-1,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9,
    .col-md-1,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-sm-1,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-xs-1,
    .col-xs-10,
    .col-xs-11,
    .col-xs-12,
    .col-xs-2,
    .col-xs-3,
    .col-xs-4,
    .col-xs-5,
    .col-xs-6,
    .col-xs-7,
    .col-xs-8,
    .col-xs-9 {
      position: initial !important;
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
      background: #fff url(assets/images/invalid.png) no-repeat 98% center;
      background-size: 10px;
    }

    .checkout-sec>form input:required:valid {
      /* when a field is considered valid by the browser */
      background: #fff url(assets/images/valid.png) no-repeat 98% center;
      background-size: 10px;
    }

    .checkout-sec form textarea:required:valid {
      background: #fff url(assets/images/valid.png) no-repeat 98% center;
      background-size: 10px;
    }

    .checkout-sec form textarea:focus:invalid {
      background: #fff url(assets/images/invalid.png) no-repeat 98% center;
      background-size: 10px;
    }

    ::-webkit-validation-bubble-message {
      padding: 1em;
    }

    .checkout-sec>form input:required {
      background: #fff url(assets/images/asterisco.png) no-repeat 98% center;
      background-size: 10px;
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

    .currencyinput {
      border: 1px inset #ccc;
    }

    .currencyinput input {
      border: 0;
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

    .wickedpicker {
      height: 167px;
    }
  </style>
  <!-- Include multiselect CSS: -->
  <link rel="stylesheet" href="assets/css/bootstrap-multiselect.css" type="text/css" />
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
                <h2>Formulario de Experiencias</h2>
                <ul class="breadcrumbs">
                  <li><a href="index.php" title="">Inicio</a></li>
                  <li>Experiencias</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="block gray" >
        <div class="container" id="formulario_vi">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="row">
                <div class="col-md-12">
                  <ul id="progressbar" style="padding-inline-start:16%;">
                    <li class="active">Información Empresa</li>
                    <li>Información de la Actividad</li>
                    <li>Descripción de la Actividad</li>
                    <li>Fotos</li>
                    <li>Configuración de precios</li>
                  </ul>
                </div>
              </div>
              <div class="checkout-sec">
                <form class="steps" id="form_alta_act" method="post" name="registro_actividad" action="/src/Controller/actividadController.php" enctype="multipart/form-data">
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
                    <!-- Información de la Actividad -->
                    <fieldset id="info_act">
                      <div class="col-md-12">
                        <div class="col-md-12">
                          <div class="inner-header">
                            <h2>Información de la Actividad</h2>
                          </div>
                        </div>
                        <div class="row">

                          <div class="col-md-6 col-sm-12 col-xs-12 ">
                            <div class="form_re">
                              <label for="nombre_actividad">Nombre de la actividad</label><img class="ji" src="assets/images/asterisco.png" />
                              <input id="nombre_actividad" name="nombre_actividad" type="text" value="" maxlength="80" placeholder="Nombre de la actividad *" autocomplete="off" required>
                            </div>
                          </div>

                          <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form_re">
                              <label for="categoria_actividad">Categoría actividad</label><img class="ji" src="assets/images/asterisco.png" />
                              <select data-placeholder="- - Elige una categoría - -" class="chosen-select" id="categoria_actividad" name="tipo_actividad" type="text" value="" maxlength="15">
                                <option></option>
                              </select>
                            </div>
                          </div>

                        </div>


                        <!-- datos Direccion -->
                        <div class="col-md-12 col-sm-6 col-xs-12">
                          <h3>Dirección</h3>
                        </div>
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12" id="locationField">
                            <div class="form_re">
                              <input id="autocomplete" name="direccion_larga" onFocus="geolocate()" type="text" value="" placeholder="Ingresa tu dirección completa" required="required" data-rule-required="true"
                                data-msg-required="Especifique datos de la ubicación" autocomplete="new-password">
                              </input>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form_re">
                              <input class="field" id="street_number" name="numero_calle" placeholder="Número Exterior" required="required" data-rule-required="true" data-msg-required="Especifique número exterior" readonly>
                              </input>
                            </div>
                          </div>
                          <div class="col-md-9">
                            <div class="form_re">
                              <input class="field" id="route" name="calle_colonia" placeholder="Ingresa calle, colonia" required="required" data-rule-required="true" data-msg-required="Especifique calle y colonia" readonly>
                              </input>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form_re">
                              <input class="field" id="locality" name="ciudad" placeholder="Ingresa tu ciudad" required="required" data-rule-required="true" data-msg-required="Especifique una ciudad" readonly>
                              </input>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form_re">
                              <input class="field" id="administrative_area_level_1" name="estado" placeholder="Ingresa tu estado" required="required" data-rule-required="true" data-msg-required="Especifique un estado" readonly>
                              </input>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form_re">
                              <input class="field" id="postal_code" name="cp" placeholder="Ingresa tu codigo postal" data-rule-required="true" data-msg-required="Especifique un pais" required="required" readonly>
                              </input>
                            </div>
                          </div>
                          <div class="col-md-9">
                            <div class="form_re">
                              <input class="field" id="country" name="pais" placeholder="Ingresa tu pais" required="required" data-rule-required="true" data-msg-required="Especifique un pais" readonly>
                              </input>
                            </div>
                          </div>
                          <div style="display: none">
                            <input type="hidden" name="lat" value="" id="lat">
                            <input type="hidden" name="lng" value="" id="lng">
                          </div>
                          <!-- Descripcion ubicación -->
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form_re">
                              <input id="desc_ubicacion" name="desc_ubicacion" type="text" value="" maxlength="512" placeholder="Descripción ubicación" autocomplete="off">
                            </div>
                          </div>
                          <!-- End Descripcion ubicación -->
                          <!-- Nombre edificio -->
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form_re">
                              <input id="nombre_edificio" name="nombre_edificio" type="text" value="" maxlength="120" placeholder="Nombre Edificio" autocomplete="off">
                            </div>
                          </div>
                          <!-- End Nombre edificio -->
                          <!-- numero int -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form_re">
                              <input id="num_int" name="num_int" type="text" value="" maxlength="20" placeholder="Número Interior" autocomplete="off">
                            </div>
                          </div>
                          <!-- End numero int -->
                          <!-- numero apartamento -->
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form_re">
                              <input id="numero_apartamento" name="numero_apartamento" type="text" value="" maxlength="20" placeholder="Número Apartamento" autocomplete="off">
                            </div>
                          </div>
                          <!-- End numero apartamento -->

                        </div>

                        <div class="inner-header" style="padding:0px">
                          <h4>Mapa</h4>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:15px">
                          <div id="map" style="height: 450px">
                          </div>
                        </div>
                        <!-- Datos Direccion -->
                        <!-- Personas adultas -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <h4>¿Cuántas personas adultas pueden asistir?</h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form_re">
                            <div class="c-input-number">
                              <input id="adultas" name="adultas" min="1" step="1" type="number" maxlength="3" class="manual-adjust" value="" />
                              <span id="error-vacio-number" class="error1 animated bounceInLeft" style="display:none;">
                                <i class="error-log fa fa-exclamation-triangle"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- End Personas adultas -->
                        <!-- Niños (cuantos) -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <h4>¿Pueden asistir niños?</h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form_re">
                            <div class="col-md-3 col-sm-3 col-xs-6">
                              <label class="container_radio">Si
                                <input type="radio" name="child" value="Si">
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                              <label class="container_radio">No
                                <input type="radio" name="child" value="No">
                                <span class="checkmark"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="button" data-page="1" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <input type="button" id="checkBtn" data-page="3" name="next" class="next action-button style_btn" value="Siguiente" />
                      <!-- <button data-page="2" name="previous" class="btn previous action-button btn-success">Anterior</button>
                                                    <button data-page="2" name="next" class="btn next action-button btn-success">Siguiente</button> -->
                    </fieldset>
                    <!-- End Información de la Actividad -->
                    <!-- Descripción de la actividad -->
                    <fieldset>
                      <div class="col-md-12">
                        <div class="inner-header">
                          <h2>Descripción de la Actividad</h2>
                        </div>
                      </div>
                      <!-- Descripción de la actividad -->
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12">
                          <h4>Descripción de la experiencia<img class="ji" src="assets/images/asterisco.png" /></h4>
                        </div>
                        <div class="form_re">
                          <textarea id="descripcion_experiencia" name="descripcion_experiencia" type="text" value="" placeholder="Describe perfectamente la experiencia..." required></textarea>
                        </div>
                      </div>
                      <!-- End Descripción de la actividad  -->
                      <!-- ¿servicios incluye? -->
                      <div class="col-md-12">
                        <h4>¿Qué servicios incluye?<img class="ji" src="assets/images/asterisco.png" /></h4>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form_re">
                          <textarea rows="5" id="servicios_incluye" name="servicios_incluye" type="text" value="" placeholder="Describe que servicios incluye..." required></textarea>
                        </div>

                      </div>
                      <!-- End ¿servicios incluye? -->
                      <!-- Acerca del lugar -->
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12">
                          <h4>Acerca del lugar<img class="ji" src="assets/images/asterisco.png" /></h4>
                        </div>
                        <div class="form_re">
                          <textarea id="acerca_lugar" name="acerca_lugar" type="text" value=""
                            placeholder="Describe el lugar donde se desarrolla la actividad, ejemplo, Zona de pantanos, zona montañosa, zona urbana con mucho tráfico, zona para caminar, etc...." required></textarea>
                        </div>


                      </div>
                      <!-- End Acerca del lugar -->
                      <!-- ¿Quién puede apuntarse? -->
                      <div class="col-md-12">
                        <h4>¿Quién puede apuntarse?<img class="ji" src="assets/images/asterisco.png" /></h4>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form_re">
                          <textarea rows="5" id="apuntarse" name="apuntarse" type="text" value=""
                            placeholder="Hacer una descripción completa del tipo de personas que pueden inscribirse para participar en la experiencia turística, ser muy explícito en las características que deben tener las personas para que no hayan sorpresas..."
                            required></textarea>
                        </div>


                      </div>
                      <!-- End ¿Quién puede apuntarse? -->
                      <!-- Notas adicionales -->
                      <div class="col-md-12">
                        <h4>Notas adicionales</h4>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form_re">
                          <textarea rows="5" id="notas_adicionales" name="notas_adicionales" type="text" placeholder="Si necesitas especificar algo adicional aquí lo puedes hacer"></textarea>
                        </div>

                      </div>
                      <!-- End Notas adicionales -->
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
                      <!-- Requisitos -->
                      <div class="col-md-12">
                        <div class="inner-header">
                          <h2>Requisitos</h2>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>Requisitos</h4>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form_re">
                          <textarea id="requisitos" name="requisitos" type="text" value=""
                            placeholder="Poner los requisitos que tu exiges que deban cumplir los huéspedes que compren tu experiencias, ej. No pueden ir en bermudas, no es recomendado para niños, llegar con 15 minutos de anticipación, etc...."></textarea>
                        </div>
                      </div>
                      <!-- End Requisitos -->
                      <input type="button" data-page="2" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <input type="button" data-page="4" name="next" class="next action-button style_btn" value="Siguiente" />
                      <!-- <button data-page="3" name="previous" class="btn previous action-button btn-success">Anterior</button>
                                                    <button data-page="3" name="next" class="btn next action-button btn-success">Siguiente</button> -->
                    </fieldset>
                    <!-- End Descripción de la actividad -->
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
                        </span>
                        <!-- <center>
                                                            <div id="drop_zone"><br><center>Soltar archivo aquí</center></div><br>
                                                        </center> -->
                        <output id="list-miniatura" class="col-md-12"></output>
                      </div>
                      <div class="col-md-12">
                        <div class="inner-header">
                          <h2>Fotos de la Actividad (Minimo 4)<img class="ji" src="assets/images/asterisco.png" /></h2>
                        </div>
                      </div>
                      <!-- Subir imágenes actividad -->
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form_re">
                          <input type="file" id="files2" name="fotos_actividades[]" multiple required data-rule-required="true" data-msg-required="Fotos es requerido">
                        </div>
                        <!-- <center>
                                                            <div id="drop_zone"><br><center>Soltar archivo aquí</center></div><br>
                                                        </center> -->
                        <output id="list-miniatura2" class="col-md-12"></output>
                      </div>
                      <br><br><br>
                      <!-- End Subir imágenes -->
                      <input type="button" data-page="3" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <input type="button" id="checkBt_a" data-page="5" name="next" class="next action-button style_btn" value="Siguiente" onclick="return true/*validarfiles()*/" />

                      <!-- <button data-page="5" name="previous" class="btn previous action-button btn-success">Anterior</button>
                                                    <button type="submit" name="next" class="btn next action-button btn-success">GUARDAR</button> -->
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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="form_re">
                                <label for="fecha_inicio">Fecha Activdidad</label>
                                <input id="fecha_inicio" name="fecha_inicio" class="datepicker" type="text" readonly value="" maxlength="80" placeholder="Fecha de inicio *" data-msg-required="Fecha inicio es requerido" autocomplete="off">
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="form_re">
                                <label for="hora_inicio">Hora entrada</label>
                                <input id="hora_inicio" name="hora_inicio" class="timepicker" type="text" readonly value="" maxlength="80" placeholder="Hora de inicio *" data-msg-required="Hora de inicio es requerido" autocomplete="off">
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="form_re">
                                <label for="duracion_horas">Duración en horas</label>
                                <input id="duracion_horas" name="duracion_horas" type="number" step="1" value="" maxlength="80" placeholder="Duración en horas *" data-msg-required="Duración en horas es requerido" autocomplete="off">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="form_re">
                                <label for="tarifa_persona">Tarifa por persona ($)</label>
                                <input id="tarifa_persona" class="precios" name="tarifa_persona" type="number" step="any" value="" maxlength="80" placeholder="$ Tarifa por persona *" data-msg-required="Tarifa por persona es requerido"
                                  autocomplete="off">
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="form_re">
                                <label for="cargo_adicional">Cargo adicional ($)</label>
                                <input id="cargo_adicional" class="precios" name="cargo_adicional" type="number" step="any" min="1" value="" maxlength="80" placeholder="$ Cargo Adicional" autocomplete="off">
                              </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="form_re">
                                <label for="desc_cargo">Descripción de otros cargo adicional</label>
                                <input id="desc_cargo" name="desc_cargo" type="text" value="" maxlength="80" placeholder="Descripción del cargo adicional" autocomplete="off">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 col-sm-12 col-xs-12" id="divmoneda">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                              <h4>Moneda</h4>
                              <div class="form_re">
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <label class="container_radio" id="labelmxn">MXN
                                    <input type="radio" name="moneda" value="MXN">
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                  <label class="container_radio" id="labelusd">USD
                                    <input type="radio" name="moneda" value="USD">
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <span id="errmsg"></span>
                          <small>Agregá fechas adicionales para la misma actividad</small><br>
                          <button type="button" name="alta_actividad_add_fecha" class="btn btn-primary " id="addFecha">Agregar fecha</button>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12">
                          <h2>Fechas</h2>
                        </div>
                        <div class="col-md-12" style="margin-top:10px">
                          <table id="tabla_precios" class="table table-condensed table-bordered">
                            <thead>
                              <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Duración</th>
                                <th>Tarifa</th>
                                <th>Moneda</th>
                                <th>Cargo</th>
                                <th>Descripción</th>
                                <th>Eliminar</th>
                              </tr>
                            </thead>
                          </table>
                        </div>

                        <br>
                        <br>
                      </div>
                      <input type="hidden" name="alta_actividad" value="1">
                      <input type="button" data-page="4" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <button type="button" name="alta_actividad" class="btn_guardar" id="btn_sig_res">Siguiente</button>
                    </fieldset>
                    <!-- End Tabla precios/fechas-->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container"  style="display:none" id="resumen">
          <div class="col-md-12">
            <div class="inner-header">
              <h2>Resumen</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="shoping-detail-sec">
                <div class='col-md-12'>
                  <h3>Información personal/empresa</h3>
                </div>
                <div class='col-md-12'>
                  <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Nombre de la empresa: <span class='span_texto_registrado' id="empresares"> </span></p>
                </div>

                <hr class='hr_style'><br>
                <div class='col-md-12'>
                  <h3>Información de la actividad</h3>
                </div>
                <div class='col-md-12'>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Nombre de la actividad: <span class='span_texto_registrado' id="nombre_actividadres"> </span></p>
                  <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Tipo de Actividad: <span class='span_texto_registrado'  id="tipo_actividadres">  </span></p>
                  <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Cuántas personas adultas?: <span class='span_texto_registrado' id="adultasres">  </span></p>
                  <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Permiten niños?: <span class='span_texto_registrado' id="childres">  </span></p>
                </div>

                <hr class='hr_style'><br>
                <div class='col-md-12'>
                  <h3>Descripción de la actividad</h3>
                </div>
                <div class='col-md-12'>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Descripción de la experiencia: <span class='span_texto_registrado' id="descripcion_experienciares"> </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>¿Qué servicios incluye?: <span class='span_texto_registrado' id="servicios_incluyeres">  </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Acerca del lugar: <span class='span_texto_registrado' id="acerca_lugarres">  </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>¿Quién puede apuntarse?: <span class='span_texto_registrado' id="apuntarseres">  </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Notas adicionales: <span class='span_texto_registrado' id="notas_adicionalesres"> </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Política de cancelación: <span class='span_texto_registrado' id="politicares">

                  <div class='col-md-12'>
                    <h4>Requisitos</h4>
                  </div>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Requisitos: <span class='span_texto_registrado' id="requisitosres"> </span></p>
                </div>
                <hr class='hr_style'><br>
                <div class='col-md-12'>
                  <h3>Dirección de la actividad</h3>
                </div>
                <div class='col-md-12'>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Dirección completa: <span class='span_texto_registrado' id="direccion_largares"> </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Numero: <span class='span_texto_registrado' id="numero_calleres"></span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Calle, colonia: <span class='span_texto_registrado' id="calle_coloniares">  </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Ciudad: <span class='span_texto_registrado'  id="ciudadres">  </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Estado: <span class='span_texto_registrado' id="estadores"> </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Pais: <span class='span_texto_registrado' id="paisres"></span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Codigo postal: <span class='span_texto_registrado' id="cpres"> </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Descripción de la dirección: <span class='span_texto_registrado' id="desc_ubicacionres"> </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Nombre edificio: <span class='span_texto_registrado' id="nombre_edificiores"> </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Num. interior: <span class='span_texto_registrado' id="num_intres">  </span></p>
                  <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Num. apartamento: <span class='span_texto_registrado' id="numero_apartamentores">  </span></p>
                </div>

                <div class="inner-header" style="padding:0px">
                  <h4>Mapa</h4>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom:15px">
                  <div id="map2" style="height: 450px">
                  </div>
                </div>

                <hr class='hr_style'><br>
                <div class='col-md-12'>
                  <h3>Foto de Portada</h3>
                </div>
                <br>
                <output id="list-miniatura3" class="col-md-12"></output>

                <hr class='hr_style'><br>
                <div class='col-md-12'>
                  <h3>Fotos de galería</h3>
                </div>
                <br>
                <output id="list-miniatura4" class="col-md-12"></output>
                <hr class='hr_style'><br>
                <div class='col-md-12'>
                  <h3>Fechas</h3>
                </div>
                <br>
                <div class="col-md-12" style="margin-top:10px">
                  <table id="tabla_precios2" class="table table-condensed table-bordered">
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Duración</th>
                        <th>Tarifa</th>
                        <th>Moneda</th>
                        <th>Cargo</th>
                        <th>Descripción</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <!-- <hr class='hr_style'><br> -->

                <input type="button" id="ant_res" class=" action-button style_btn" value="Regresar" />
                <button type="button" name="alta_actividad" class="btn_guardar" id="guardar">Guardar</button>
                <br><br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include_once('../../common/footer.php'); ?>
    <?php include_once('../../common/popups.php'); ?>
  </div>
  <?php include_once('../../common/script.php'); ?>

  <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.es.min.js"></script>
  <script type="text/javascript" src="assets/js/wickedpicker.min.js"></script>
  <script type="text/javascript" src="assets/js/choosen.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
  <!-- Include multipleselect JS: -->
  <script type="text/javascript" src="assets/js/bootstrap-multiselect.js"></script>
  <script type="text/javascript" src="src/js/alta_actividad.js"></script>

  <!-- Include get lat and lng from direction: -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&libraries=places&callback=initialize" async defer></script>

</body>

</html>

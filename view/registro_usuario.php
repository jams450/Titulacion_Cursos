<?php
    session_start();
    if (isset($_SESSION['id_sesion_usuario'])) {
        header("location: ../../index.php");
    }
    if (isset($_GET['anfitrion']) && $_GET['anfitrion'] == 1) {
        $anfitrion = 1;
    } else {
        $anfitrion = 0;
    }
    $error = isset($_GET['error']) ? 'block' : 'none';

?>
<!DOCTYPE html>
    <head>
        <?php include_once('./common/head.php'); ?>
        <link rel="stylesheet" href="assets/css/style_steps.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datepicker3.standalone.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/wickedpicker.min.css">
        <style>
            header.on-top {
                position: relative;
            }

            #progressbar li {
                width: 100%!important;
            }

            input#nombre_usuario, input#apellido_usuario, input#paswword, input#email_usuario {
                color: #d9042a;
            }

            input#file-2 {
                margin-top: 0;
                padding: 0;
            }

            output {
                display: inline;
            }
            img.usuario_imagen {
                width: 120px;
                height: auto;
            }

            .inputfile {
                visibility: hidden;
                width: 0;
            }
            input#file-1 {
                margin-top: 0;
                padding: 0;
            }
            .error1 + label {
                background: #f4f4f4 none repeat scroll 0 0;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                -ms-border-radius: 3px;
                -o-border-radius: 3px;
                border-radius: 3px;
                color: #8d99ae;
                display: inline-block;
                font-family: Roboto;
                font-weight: 100;
                font-size: 14px;
                margin-top: 76px;
                padding: 6px 20px;
                vertical-align: bottom;
                -webkit-transition: all 0.4s ease 0s;
                -moz-transition: all 0.4s ease 0s;
                -ms-transition: all 0.4s ease 0s;
                -o-transition: all 0.4s ease 0s;
                transition: all 0.4s ease 0s;
            }
            .error2 + label {
                background: #f4f4f4 none repeat scroll 0 0;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                -ms-border-radius: 3px;
                -o-border-radius: 3px;
                border-radius: 3px;
                color: #8d99ae;
                display: inline-block;
                font-family: Roboto;
                font-weight: 100;
                font-size: 14px;
                padding: 6px 20px;
                vertical-align: bottom;
                -webkit-transition: all 0.4s ease 0s;
                -moz-transition: all 0.4s ease 0s;
                -ms-transition: all 0.4s ease 0s;
                -o-transition: all 0.4s ease 0s;
                transition: all 0.4s ease 0s;
            }

            .error1:focus + label,
            .error1.has-focus + label,
            .error1 + label:hover {
                background-color: #d90429;
                color:#fff;
                text-decoration: none;
                cursor: pointer;
            }

            .error2:focus + label,
            .error2.has-focus + label,
            .error2 + label:hover {
                background-color: #d90429;
                color:#fff;
                text-decoration: none;
                cursor: pointer;
            }
            .hide_input{
                display: none!important;
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
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
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
            /* Arreglo para Select */
            .chosen-select {
                margin-top: 30px;
            }
            .fileUl{
                list-style: none;
            }
            .fileData{}
            .uploaded > p{
                list-style: none;
                color: forestgreen;
            }

        </style>
    </head>
    <body>
    <!-- TODO revisar PHP y Stylos-->
        <div class="page-loading">
            <div class="loadery"></div>
        </div>
        <div class="theme-layout">

            <?php include_once('./common/menu.php'); ?>

            <section>
                <div class="block no-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inner-header">
                                    <h2>Formulario de Usuario</h2>
                                    <ul class="breadcrumbs">
                                        <li><a href="index.php" title="">Inicio</a></li>
                                        <li>Usuarios</li>
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
                                        <li class="active">Datos Personales</li>
                                    </ul>
                                </div>
                                <div class="checkout-sec">
                                    <form class="steps" method="post" id='signin' name="signin" action="src/Controller/usuariosController.php" enctype="multipart/form-data">
                                        <div class="form-profile">
                                            <!-- Datos personales -->
                                            <fieldset>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3>Datos personales</h3><br><br>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div class="change-my-dp form_re">
                                                          <output id="list">
                                                              <img src="http://placehold.it/105x109" class="usuario_imagen" alt="">
                                                          </output>
                                                          <input type="file" id="file-1" name="foto" class="inputfile" required="required" data-rule-required="true" data-msg-required="Fotografía es requerido"/>
                                                          <span id="error_mensaje" class="error1 animated bounceInLeft" style="display: none;">
                                                              <i class="error-log fa fa-exclamation-triangle"></i>
                                                          </span>
                                                          <label for="file-1">
                                                              <span class="pambolera">Sube tu foto *</span>
                                                          </label>
                                                      </div>
                                                  </div>
                                                </div>


                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="email_usuario" name="email_usuario" required="required" type="email" value="" maxlength="80" placeholder="Email *" data-rule-required="true" data-msg-required="Email es requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="paswword" name="password" required="required" type="password" value="" maxlength="16" placeholder="Password *" data-rule-required="true" data-msg-required="Password es requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                </div>

                                                <input type="hidden" name="isanfitrion" value="<?=$anfitrion?>">

                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="nombre_usuario" name="nombre_usuario" required="required" type="text" value="" maxlength="80" placeholder="Nombre (s) *" data-rule-required="true" data-msg-required="Nombre es requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="apellido_usuario" name="apellido_usuario" required="required" type="text" value="" maxlength="80" placeholder="Apellido (s) *" data-rule-required="true" data-msg-required="Apellido es requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form_re">
                                                      <div class="col-md-3 col-sm-3 col-xs-6">
                                                          <label class="container_radio">Hombre
                                                              <input required type="radio" name="genero" data-msg-required="Genero es requerido" value="1">
                                                              <span class="checkmark"></span>
                                                          </label>
                                                      </div>
                                                      <div class="col-md-3 col-sm-3 col-xs-6">
                                                          <label class="container_radio">Mujer
                                                              <input required type="radio" name="genero" data-msg-required="Genero es requerido" value="0">
                                                              <span class="checkmark"></span>
                                                          </label>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="fecha" name="fecha" required="required"  type="date" value=""  placeholder="Fecha de Nacimiento *" data-rule-required="true" data-msg-required="Fecha es requerido" autocomplete="off">
                                                    </div>

                                                  </div>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="telefono" id="telefono" name="telefono" required="required" type="text"  placeholder="Telefono *" data-rule-required="true" data-msg-required="Telefono es requerido" autocomplete="off"  data-inputmask="'mask': '(99)' ">
                                                    </div>

                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="phone" id="celular" name="celular" required="required" type="text" value="" maxlength="12" placeholder="Celular *" data-rule-required="true" data-msg-required="Celular es requerido" autocomplete="off">
                                                    </div>

                                                  </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3>Contacto de emergencia</h3>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="nombreEmer" id="nombre_emergencia" name="nombre_emergencia" required="required" type="text" value="" maxlength="25" placeholder="Nombre contacto de emergencia" data-rule-required="true" data-msg-required="Nombre contacto de emergencia es requerido" autocomplete="off">
                                                    </div>

                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="phoneEmer" id="tel_emergencia" name="tel_emergencia" required="required" type="text" value="" maxlength="12" placeholder="Telefono contacto de emergencia" data-rule-required="true" data-msg-required="Telefono contacto de emergencia es requerido" autocomplete="off">
                                                    </div>

                                                  </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3>Documento de Identidad *</h3>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div class="change-my-dp form_re">
                                                          <output id="identidad_file"></output>
                                                          <input type="file" id="files" name="files" class="inputfile" required="required" data-rule-required="true" data-msg-required="Identidad es requerido"/>
                                                          <span id="error_mensaje" class="error2 animated bounceInLeft" style="display: none;">
                                                              <i class="error-log fa fa-exclamation-triangle"></i>
                                                          </span>
                                                          <label for="files">
                                                              <span class="pambolera">Sube tu archivo</span>
                                                          </label>
                                                      </div>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <select data-placeholder="tipo_identidad" class="chosen-select" id="tipo_identidad" name="tipo_identidad" required="required" type="text" value="" data-rule-required="true" data-msg-required="Especifique el tipo de identidad">
                                                          <option value="">-- Tipo de Documento--</option>
                                                          <option value="ife_ine">IFE/INE</option>
                                                          <option value="cedula">Cedula</option>
                                                          <option value="pasaporte">Pasaporte</option>
                                                      </select>
                                                    </div>

                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="identidad" name="identidad" required="required" type="text" value="" maxlength="80" placeholder="Documento de identidad *" data-rule-required="true" data-msg-required="Documento de identidad es requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                  <h3>Dirección</h3>
                                                </div>
                                                <!-- Descripcion ubicación -->
                                                <div class="row">
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="autocomplete" name="direccion_larga" onFocus="geolocate()" type="text" value="" placeholder="Ingresa tu dirección completa" required="required" data-rule-required="true"
                                                        data-msg-required="Especifique datos de la ubicación" autocomplete="new-password">
                                                    </div>
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
                                                <div class="row">
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="desc_ubicacion" name="desc_ubicacion" required="required" type="text" value="" maxlength="512" placeholder="Descripción adicional de la ubicación" data-rule-required="true"
                                                        data-msg-required="Especifique datos de la ubicación" autocomplete="off">
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input id="nombre_edificio" name="nombre_edificio" type="text" value="" maxlength="512" placeholder="Nombre del Edificio" data-msg-required="Especifique datos de la ubicación" autocomplete="off">
                                                  </div>
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
                                                <!-- End datos Direccion -->

                                                <!-- Perfil -->
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3>Perfil</h3>
                                                </div>
                                                <!-- Idioma preferido -->
                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <h4>Idioma</h4>
                                                      <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                        <div class="form_re">
                                                          <p class="col-md-3 col-sm-3 col-xs-6">
                                                              <input class="styled-checkbox" id="idiomas_esp" name="idiomas[]" type="checkbox" value="Español">
                                                              <label for="idiomas_esp">Español</label>
                                                          </p>
                                                          <p class="col-md-3 col-sm-6 col-xs-6">
                                                              <input class="styled-checkbox" id="idiomas_eng" name="idiomas[]" type="checkbox" value="Inglés">
                                                              <label for="idiomas_eng">Inglés</label>
                                                          </p>
                                                          <span id="error_mensaje" class="error1 animated bounceInLeft" style="display: none;">
                                                              <i class="error-log fa fa-exclamation-triangle"></i>
                                                          </span>
                                                        </div>

                                                      </div>
                                                  </div>
                                                </div>


                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <h3>Dieta especial</h3>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <div class="form_re">
                                                    <input id="dieta" name="dieta" required="required" type="text" value="" maxlength="80" placeholder="Dieta especial *" data-rule-required="true" data-msg-required="Dieta especial es requerido" autocomplete="off">
                                                    <span id="error_mensaje" class="error1 animated bounceInLeft" style="display: none;">
                                                        <i class="error-log fa fa-exclamation-triangle"></i>
                                                    </span>
                                                  </div>

                                                </div>
                                                <!-- End Dieta especial -->
                                                <!--TODO realizar stilos de selects-->
                                                <!-- Alergías -->
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3>Alergías</h3>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <div class="form_re">
                                                    <p class="col-md-3 col-sm-6 col-xs-6">
                                                        <input class="styled-checkbox" id="alergias_almendras" name="alergias[]" type="checkbox" value="Almendras">
                                                        <label for="alergias_almendras">Almendras</label>
                                                    </p>
                                                    <p class="col-md-3 col-sm-6 col-xs-6">
                                                        <input class="styled-checkbox" id="alergias_nueces" name="alergias[]" type="checkbox" value="Nueces">
                                                        <label for="alergias_nueces">Nueces</label>
                                                    </p>
                                                    <p class="col-md-3 col-sm-6 col-xs-6">
                                                        <input class="styled-checkbox" id="alergias_lacteos" name="alergias[]" type="checkbox" value="Lácteos">
                                                        <label for="alergias_lacteos">Lácteos</label>
                                                    </p>
                                                    <p class="col-md-3 col-sm-6 col-xs-6">
                                                        <input class="styled-checkbox" id="alergias_ninguna" name="alergias[]" type="checkbox" value="Ninguna">
                                                        <label for="alergias_ninguna">Ninguna</label>
                                                    </p>
                                                    <span id="error_mensaje" class="error1 animated bounceInLeft" style="display: none;">
                                                        <i class="error-log fa fa-exclamation-triangle"></i>
                                                    </span>
                                                  </div>
                                                </div>
                                                <!-- End Alergías -->

                                                <!-- ¿Qué tipo de actividades turísticas te gustan? -->
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3>¿Qué tipo de actividades turísticas te gustan?</h3>
                                                </div>
                                                <div class="col-md-12  col-sm-12 col-xs-12">
                                                  <div class="form_re" id="turisticas">

                                                  </div>
                                                </div>

                                                <span id="msg_error" class="col-md-12"></span>
                                                <!-- End ¿Qué tipo de actividades turísticas te gustan? -->

                                                <!-- Destinos favoritos -->
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <h3>Destinos favoritos</h3>
                                                    </div>
                                                    <div class="form_re">
                                                      <textarea id="destino_favorito" name="destino_favorito" style="resize: vertical;"  required="required" type="text" value="" placeholder="Ingresa tus destinos favoritos..."  data-rule-required="true" data-msg-required="Destino favorito es requerido"></textarea>
                                                    </div>

                                                </div>
                                                <!-- End Destinos favoritos -->
                                                <button type="submit" name="registro_usuario" class="btn_guardar col-md-12 col-sm-12 col-xs-12" id="submitbtn">GUARDAR</button>
                                            </fieldset>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <?php include_once('./common/footer.php'); ?>

			<?php include_once('./common/popups.php'); ?>

        </div>

        <?php
            // unset($_SESSION['mensaje']);
        ?>

        <?php include_once('./common/script.php'); ?>
        <!-- Script para cambiar la imagen de usuario -->
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.es.min.js"></script>
        <script type="text/javascript" src="assets/js/wickedpicker.min.js"></script>
        <script type="text/javascript" src="assets/js/choosen.min.js"></script>
        <script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&libraries=places&callback=initialize" async defer></script>
        <script type="text/javascript" src="src/js/alta_usuario.js"></script>

    </body>
</html>

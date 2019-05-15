<?php
    session_start();
    if (isset($_SESSION['id_sesion_usuario'])) {
        header("location: ../../index.php");
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

            input#nombre, input#appat, input#apmat, input#edad, input#correo, input#password, input#usuario {
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
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
      crossorigin="anonymous"></script>
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
                                    <form class="steps" method="post" id='newuser' name="newuser" action="/src/Controller/controlador_usuario.php" enctype="multipart/form-data">
                                        <div class="form-profile">
                                            <fieldset>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3>Datos personales</h3><br>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="nombre" name="nombre" required="required" type="text" value="" maxlength="80" placeholder="Nombre (s) *" data-rule-required="true" data-msg-required="Nombre requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="appat" name="appat" required="required" type="text" value="" maxlength="80" placeholder="Apellido Paterno *" data-rule-required="true" data-msg-required="Apellido Paterno requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="apmat" name="apmat" type="text" value="" maxlength="80" placeholder="Apellido Materno" autocomplete="off">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="edad" name="edad" type="number" value="" maxlength="80" placeholder="Edad" data-rule-required="true" autocomplete="off" min="15" max="99" step="1">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="correo" name="correo" required="required" type="email" value="" maxlength="80" placeholder="Correo *" data-rule-required="true" data-msg-required="Correo requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form_re">
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <label class="container_radio">Femenino
                                                              <input required type="radio" name="sexo" data-msg-required="Género requerido" value="0">
                                                              <span class="checkmark"></span>
                                                          </label>
                                                      </div>
                                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <label class="container_radio">Masculino
                                                              <input required type="radio" name="sexo" data-msg-required="Género requerido" value="1">
                                                              <span class="checkmark"></span>
                                                          </label>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>


                                                <br><br>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h3>Datos de Usuario</h3><br>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="username" name="username" required="required" type="text" value="" maxlength="80" placeholder="Usuario *" data-rule-required="true" data-msg-required="Usuario requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form_re">
                                                      <input id="paswword" name="passwd" required="required" type="password" value="" maxlength="16" placeholder="Password *" data-rule-required="true" data-msg-required="Password requerido" autocomplete="off">
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form_re">
                                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                                          <label class="container_radio">Efectivo
                                                              <input required type="radio" name="tipopago" data-msg-required="Tipo de Pago a Ingresar es requerido" value="1">
                                                              <span class="checkmark"></span>
                                                          </label>
                                                      </div>
                                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                                          <label class="container_radio">Tarjeta de Débito
                                                              <input required type="radio" name="tipopago" data-msg-required="Tipo de Pago a Ingresar  es requerido" value="2">
                                                              <span class="checkmark"></span>
                                                          </label>
                                                      </div>
                                                      <div class="col-md-4 col-sm-4 col-xs-12">
                                                          <label class="container_radio">Tarjeta de Crédito
                                                              <input required type="radio" name="tipopago" data-msg-required="Tipo de Pago a Ingresar  es requerido" value="3">
                                                              <span class="checkmark"></span>
                                                          </label>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                  <button type="submit" id="registro_usuario" name="registro_usuario" class="btn_guardar col-md-12 col-sm-12 col-xs-12" id="crear_user">CREAR USUARIO</button>
                                              </form>
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

        <?php include_once('./common/script.php'); ?>
        <!-- Script para cambiar la imagen de usuario -->
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.es.min.js"></script>
        <script type="text/javascript" src="assets/js/wickedpicker.min.js"></script>
        <script type="text/javascript" src="assets/js/choosen.min.js"></script>
        <script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
        <script type="text/javascript" src="src/js/alta_usuario.js"></script>

    </body>
</html>

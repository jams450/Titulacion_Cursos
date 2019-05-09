<?php
    /**
     * Created by PhpStorm.
     * User: jmpg
     * Date: 30/10/18
     * Time: 23:59
    */
    // validar sesion
    session_start();
    if (!isset($_SESSION['id_sesion_usuario'])) {
        header("location: index.php");
    }
    if (empty($_POST) || !isset($_POST['ida']) || !isset($_POST['iddp']) || !isset($_POST['idpa'])){
        header("Location: ./actividad.php");
    }
    //get data to reserve
    $url = 'http://localhost/src/Controller/reservaActividadController.php';
    //Data actividad
    $fields = array('ida' => urlencode($_POST['ida']));
    $num_params = count($fields);
    $dataActividad = getDataByPost($url,$num_params,urlfyData($fields));
    //Data datos precio
    $fields = array('iddp' => urlencode($_POST['iddp']));
    $num_params = count($fields);
    $datosPrecio = getDataByPost($url,$num_params,urlfyData($fields));
    //change this to down to show an alert with the error
    // validate info actividad
    if ($dataActividad["error"] == 1 ){
        //put script with alert
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    // validate info datos precio
    if ($datosPrecio["error"] == 1){
        //put script with alert
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

    //datos de actividad
    $dataActividad = $dataActividad['data'][0];
    $datosPrecio = $datosPrecio['data'][0];


    /**
     * @param $url
     * @param $num_params
     * @param $fields_string
     * @return mixed
     */
    function getDataByPost($url, $num_params, $fields_string){
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, $num_params);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //execute post
        $data = json_decode(curl_exec($ch),true);
        //close connection
        curl_close($ch);
        return $data;
    }
    /**
     * @param $fields
     * @return string
     */
    function urlfyData($fields){
        $fields_string = "";
        foreach($fields as $key=>$value) {
            if (count($fields) == 1){
                $fields_string = $key.'='.$value;
            }else{
                $fields_string .= $key.'='.$value.'&';
            }
        }
        rtrim($fields_string, '&');
        return $fields_string;
    }
?>
<!DOCTYPE html>
<head>
    <?php include_once('../common/head.php'); ?>
    <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script type='text/javascript'
            src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            OpenPay.setId('mzdtln0bmtms6o3kck8f');
            OpenPay.setApiKey('pk_f0660ad5a39f4912872e24a7a660370c');
            OpenPay.setSandboxMode(true);
            //Se genera el id de dispositivo
            var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

            /*
              *  adultos
              *  totalAdultos
              *  childs
              *  totalChilds
              *  cargoAdicional
              *  totalCargoAdicional
              *  subtotal
              *  totalCargos
              *  terminos
              *  pay-button
            */
            $('#pay-button').on('click', function(event) {
                event.preventDefault();
                var childs = parseInt($('#childs').val());
                var adultos = parseInt($('#adultos').val());
                childs = isNaN(childs) ? 0 : childs;
                adultos = isNaN(adultos) ? 0 : adultos;
                if (adultos > 0 && adultos >= childs) {
                    $(".page-loading").css("display", "block");
                    $("#pay-button").prop("disabled", true);
                    OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);
                }else{
                    alert("Debe ir por lo menos un adulto");
                }
            });

            var sucess_callbak = function(response) {
                var token_id = response.data.id;
                $('#token_id').val(token_id);
                $('#payment-form').submit();
            };

            var error_callbak = function(response) {
                var desc = response.data.description != undefined ? response.data.description : response.message;
                alert("ERROR [" + response.status + "] " + desc);
                $("#pay-button").prop("disabled", false);
            };

        });
    </script>

    <style>
        @charset "US-ASCII";
        @import "http://fonts.googleapis.com/css?family=Lato:300,400,700";
        * {
            color: #444;
            font-family: Lato;
            font-size: 16px;
            font-weight: 300;
        }
        ::-webkit-input-placeholder {
            font-style: italic;
        }
        :-moz-placeholder {
            font-style: italic;
        }
        ::-moz-placeholder {
            font-style: italic;
        }
        :-ms-input-placeholder {
            font-style: italic;
        }

        body {
            float: left;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        section.margintop{
            margin-top: 100px;
        }
        strong {
            font-weight: 700;
        }
        a {
            cursor: pointer;
            display: block;
            text-decoration: none;
        }
        a.button {
            border-radius: 5px 5px 5px 5px;
            -webkit-border-radius: 5px 5px 5px 5px;
            -moz-border-radius: 5px 5px 5px 5px;
            text-align: center;
            font-size: 21px;
            font-weight: 400;
            padding: 12px 0;
            width: 100%;
            display: table;
            background: #E51F04;
            background: -moz-linear-gradient(top,  #E51F04 0%, #A60000 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#E51F04), color-stop(100%,#A60000));
            background: -webkit-linear-gradient(top,  #E51F04 0%,#A60000 100%);
            background: -o-linear-gradient(top,  #E51F04 0%,#A60000 100%);
            background: -ms-linear-gradient(top,  #E51F04 0%,#A60000 100%);
            background: linear-gradient(top,  #E51F04 0%,#A60000 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#E51F04', endColorstr='#A60000',GradientType=0 );
        }
        a.button i {
            margin-right: 10px;
        }
        a.button.disabled {
            background: none repeat scroll 0 0 #ccc;
            cursor: default;
        }
        .bkng-tb-cntnt {
            float: left;
            width: 100%;
        }
        .bkng-tb-cntnt a.button {
            color: #fff;
            float: right;
            font-size: 18px;
            padding: 5px 20px;
            width: auto;
        }
        .bkng-tb-cntnt a.button.o {
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
            color: #e51f04;
            border: 1px solid #e51f04;
        }
        .bkng-tb-cntnt a.button i {
            color: #fff;
        }
        .bkng-tb-cntnt a.button.o i {
            color: #e51f04;
        }
        .bkng-tb-cntnt a.button.right i {
            float: right;
            margin: 2px 0 0 10px;
        }
        .bkng-tb-cntnt a.button.left {
            float: left;
        }
        .bkng-tb-cntnt a.button.disabled.o {
            border-color: #ccc;
            color: #ccc;
        }
        .bkng-tb-cntnt a.button.disabled.o i {
            color: #ccc;
        }
        .pymnts {
            /*width: 800px;*/
        }
        /*.pymnts * {
            float: left;
        }*/
        .payment-methods * {
            float: left;
        }
        .sctn-row {
            margin: 20px 30px 0;
            width: 740px;
        }
        .sctn-col {
            width: 375px;
        }
        .sctn-col.l {
            width: 425px;
        }
        .sctn-col input {
            border: 1px solid #ccc;
            font-size: 18px;
            line-height: 24px;
            padding: 10px 12px;
            width: 333px;
        }
        .sctn-col label {
            font-size: 24px;
            line-height: 24px;
            margin-bottom: 10px;
            width: 100%;
        }
        .sctn-col.x3 {
            width: 300px;
        }
        .sctn-col.x3.last {
            width: 200px;
        }
        .sctn-col.x3 input {
            width: 210px;
        }
        .sctn-col.x3 a {
            float: right;
        }
        .pymnts-sctn {
            /*width: 800px;*/
        }
        .pymnt-itm {
            margin: 0 0 3px;
            /*width: 800px;*/
        }
        .pymnt-itm h2 {
            background-color: #e9e9e9;
            font-size: 24px;
            line-height: 24px;
            margin: 0;
            padding: 28px 0 28px 20px;
            width: 100%;
        }
        .pymnt-itm.active h2 {
            background-color: #e51f04;
            color: #fff;
            cursor: default;
        }
        .pymnt-itm div.pymnt-cntnt {
            display: none;
        }
        .pymnt-itm.active div.pymnt-cntnt {
            background-color: #f7f7f7;
            display: block;
            padding: 0 0 30px;
            width: 100%;
        }

        .pymnt-cntnt div.sctn-row {
            margin: 20px 30px 0;
            width: 740px;
        }
        .pymnt-cntnt div.sctn-row div.sctn-col {
            width: 345px;
        }
        .pymnt-cntnt div.sctn-row div.sctn-col.l {
            width: 395px;
        }
        .pymnt-cntnt div.sctn-row div.sctn-col input {
            width: 303px;
        }
        .pymnt-cntnt div.sctn-row div.sctn-col.half {
            width: 155px;
        }
        .pymnt-cntnt div.sctn-row div.sctn-col.half.l {
            float: left;
            width: 190px;
        }
        .pymnt-cntnt div.sctn-row div.sctn-col.half input {
            width: 113px;
        }
        .pymnt-cntnt div.sctn-row div.sctn-col.cvv {
            background-image: url("/assets/images/checkout/cvv.png");
            background-position: 156px center;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
        .pymnt-cntnt div.sctn-row div.sctn-col.cvv div.sctn-col.half input {
            width: 110px;
        }
        .openpay {
            float: right;
            height: 60px;
            margin: 10px 30px 0 0;
            width: 435px;
        }
        .openpay div.logo {
            background-image: url("/assets/images/checkout/openpay.png");
            background-position: left bottom;
            background-repeat: no-repeat;
            border-right: 1px solid #ccc;
            font-size: 12px;
            font-weight: 400;
            padding: 15px 20px 0 0;
            width: 40%;
            height: 85px;
        }
        .openpay div.shield {
            background-image: url("/assets/images/checkout/security.png");
            background-position: left bottom;
            background-repeat: no-repeat;
            font-size: 12px;
            font-weight: 400;
            margin-left: 20px;
            padding: 20px 0 0 40px;
            width: 200px;
        }
        .card-expl {
            float: left;
            height: 80px;
            margin: 20px 0;
            width: 800px;
        }
        .card-expl div {
            background-position: left 45px;
            background-repeat: no-repeat;
            height: 70px;
            padding-top: 10px;
        }
        .card-expl div.debit {
            background-image: url("/assets/images/checkout/cards2.png");
            margin-left: 20px;
            width: 540px;
        }
        .card-expl div.credit {
            background-image: url("/assets/images/checkout/cards1.png");
            border-right: 1px solid #ccc;
            margin-left: 30px;
            width: 209px;
        }
        .card-expl h4 {
            font-weight: 400;
            margin: 0;
        }
        .btn_guardar{
            background-color: #D9042A;
            color: #fff!important;
            border-radius: 50px!important;
            display: inline-block!important;
            font-family: Oswald!important;
            font-size: 21px!important;
            margin-top: 50px!important;
            padding: 16px 60px!important;
            position: relative!important;
            text-align: center!important;
            text-transform: uppercase!important;
            width: 25%!important;
        }
        .margin-left{
            margin-left: 17px;
        }

        #editarStepOne{
            padding: 5px 20px;
            width: auto;
            color: #fff;
            float: right;
            font-size: 18px;
        }

        #siguiente{
            padding: 5px 20px;
            width: auto;
            color: #fff;
            float: right;
            font-size: 18px;
        }
        #adultos{
            margin-left: 10px;
            width: 100px;
        }
        #childs{
            margin-left: 10px;
            width: 100px;
        }
        #validationSolicitante{
            color: red;
        }
        #validationTelefono{
            color: red;
        }
        #validationLugares{
            color: red;
        }
    </style>
</head>
<body>
<?php include_once('../common/menu.php'); ?>
<div class="page-loading">
    <div class="loadery"></div>
</div>
<div class="theme-layout">

    <section class="margintop">
        <div class="block no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-header">
                            <h2>Checkout</h2>
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Detalle actividad</a></li>
                                <li>Reservación</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section>
    <pre>
    <?php
        // validar datos de usuario,
        print_r($_SESSION);
        // obtener los datos de la actividad
        //$datosActividad = json_decode($result);
        #var_dump($dataActividad);
        #var_dump($datosPrecio);
        //detalleActividadReservacion
        print_r($_POST);

        // validar lugares disponibles asincronamente,

        // crear log de movimientos de usuario

        // apartar en la base de datos los lugares cuando se seleccione
    ?>
    </pre>
</section>
    <section id="stepOne">
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="checkout-sec">
                            <div>
                                <h3>Datos de la actividad: <strong id="nombreActividad"><?=$dataActividad['nombre_evento']?></strong></h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="checkout-sec-input" placeholder="Nombre solicitante." id="nombresolicitante"/>
                                    <span style="display: none;" id="validationSolicitante"></span>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="checkout-sec-input" placeholder="Telefono de contacto" id="telefonosolicitante"/>
                                    <span style="display: none;" id="validationTelefono"></span>
                                </div>
                                <!--div class="col-md-12">
                                    <select data-placeholder="Company Name" class="chosen-select" tabindex="2">
                                        <option value="Company Name">Company Name</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                    </select>
                                </div-->
                                <!--div class="col-md-6">
                                    <input type="email" placeholder="Email" />
                                </div-->
                                <!--div class="col-md-6">
                                    <input type="text" placeholder="Phone" />
                                </div-->
                                <!--div class="col-md-12">
                                    <select data-placeholder="Country" class="chosen-select" tabindex="2">
                                        <option value="Country">Country</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                    </select>
                                </div-->
                                <!--div class="col-md-12">
                                    <textarea placeholder="Address"></textarea>
                                </div-->
                                <!--div class="col-md-6">
                                    <input type="text" placeholder="Postcode" />
                                </div-->
                                <!--div class="col-md-6">
                                    <input type="text" placeholder="Town / City" />
                                </div-->
                                <!--div class="col-md-12">
                                    <select data-placeholder="Province" class="chosen-select" tabindex="2">
                                        <option value="Province">Province</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                    </select>
                                </div-->
                                <!--div class="col-md-12">
                                    <p>
                                        <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
                                        <label for="styled-checkbox-1">Create an account ?</label>
                                    </p>
                                </div-->
                                <div class="col-md-12">
                                    <h3>Datos de facturación</h3>
                                </div>
                                <p class="margin-left">
                                    <input class="styled-checkbox" id="req_billing" type="checkbox" value="">
                                    <label for="req_billing">Requiere factura?</label>
                                </p>
                                <div class="col-md-12">
                                    <!--Si requiere factura mostrar estos datos ademas Inputs requeridos si requiere factura-->
                                    <div style="display: none" id="billing_info">
                                        <div class="col-md-6 ">
                                            <label for="razonSocial">Razon Social</label>
                                            <input class="checkout-sec-input" id="razonSocial" type="text" value="" placeholder="Razón Social">
                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="rfc">RFC</label>
                                            <input class="checkout-sec-input" id="rfc" type="text" value="" placeholder="RFC">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="checkout-sec-input" placeholder="Nota adicional" id="note"></textarea>
                                </div>
                            </div>
                            <p>Recuerda estos detalles:</p>
                            <ul>
                                <li>
                                    <h4>Politica de cancelación</h4>
                                    <p><?=$dataActividad['politica_cancelacion']?></p>
                                </li>
                                <li>
                                    <h4>Requisitos</h4>
                                    <p><?=$dataActividad['requisitos']?></p>
                                </li>
                                <li>
                                    <h4>Dirigido a</h4>
                                    <p><?=$dataActividad['dirigido_a']?></p>
                                </li>
                                <li>
                                    <h4>Notas adicionales</h4>
                                    <p><?=$dataActividad['notas_adicionales']?></p>
                                </li>
                            </ul>
                            <div class="sctn-row">
                                <a class="button rght" id="siguiente">Siguiente paso</a>
                            </div>
                        </div><!-- Checkout -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="display: none" id="stepOneResume">
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkout-sec">
                            <p>Reservación de <strong id="solicitante"></strong> telefono de contácto: <strong id="telefonoContacto"></strong> para la actividad[<strong id="actividadNameResume"></strong>]</p>
                            <p id="req_factura">Datos de facturación: Razon Social [<strong id="razonSocialResumen"></strong>] RFC[<strong id="rfc_resume"></strong>]</p>
                            <p>Notas adicionales: <strong id="notasAdicionales"></strong></p>
                            <div class="sctn-row">
                                <a class="button rght" id="editarStepOne">Editar datos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block remove-top">
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bkng-tb-cntnt">
                            <div class="pymnts">
                                <form action="#" method="POST" id="payment-form">
                                <!--form action="src/Controller/reservaActividadController.php" method="post"-->
                                <div class="my-order-details">
                                    <div class="my-orders-sec">
                                        <h3>Datos de la orden</h3>
                                        <div class="product-totals">
                                            <span style="display: none;" id="validationLugares"></span><br>
                                            <span>Precio individual</span><strong id="precioPersona"><?=$datosPrecio['precio_persona']?></strong><span style="display: none;" id="lugaresDisponibles"><?=$dataActividad['numero_personas']?></span>
                                            <ul>
                                                <li>Númerú de adultos<span>x<input type="number" name="numAdultos" min="0" placeholder="Lugares" id="adultos"></span> <strong id="totalAdultos">$0</strong></li>
                                                <li>Número de niños<span>x<input type="number" name="numChilds" min="0" placeholder="Lugares" id="childs"></span><strong id="totalChilds">$0</strong></li>
                                                <li>Cargo adicional<span id="cargoAdicionalBase"><?=$datosPrecio['cargo_adicional']?></span> <span id="cargoAdicional">por 1</span> lugares. <strong id="totalCargoAdicional">$0</strong></li>
                                            </ul>
                                        </div>
                                        <ul>
                                            <li>
                                                <span>SUBTOTAL</span>
                                                <strong id="subtotal">$0</strong>
                                            </li>
                                            <!--li>
                                                <span>Shipping</span>
                                                <strong>Free Shipping</strong>
                                            </li-->
                                            <li>
                                                <span>TOTAL</span>
                                                <h4 id="totalCargos"></h4>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="payment-methods">
                                        <h3>METODOS DE PAGO</h3>
                                        <!--div>
                                            <input class="styled-checkbox" name="payment" id="payment1" type="radio">
                                            <label for="payment1">Direct Bank Transfer</label>
                                            <p>Make your payment directly into our bank account. Please use your cleared in our account.</p>
                                        </div-->
                                        <div>
                                            <input class="styled-checkbox" name="payment" id="payment2" type="radio">
                                            <label for="payment2">Tarjeta de debito/credito</label>
                                            <div id="pagoTarjeta" style="display: none" class="pymnt-itm card active">
                                                <input type="hidden" name="token_id" id="token_id">
                                                <input type="hidden" name="idu_r" value="<?=$_SESSION['id_sesion_usuario']?>" id="idu">
                                                <input type="hidden" name="ida_r" value="<?=$dataActividad['id_actividad']?>" id="ida">
                                                <input type="hidden" name="iddp_r" value="<?=$datosPrecio['id_datos_precio_actividad']?>" id="iddp">
                                                <input type="hidden" name="idra_r" value="" id="idra">
                                                <input type="hidden" name="amount" value="" id="amount">
                                                <h2>Tarjeta de crédito o débito</h2>
                                                <div class="pymnt-cntnt">
                                                    <div class="card-expl">
                                                        <div class="credit"><h4>Tarjetas de crédito</h4></div>
                                                        <div class="debit"><h4>Tarjetas de débito</h4></div>
                                                    </div>
                                                    <div class="sctn-row">
                                                        <div class="sctn-col l">
                                                            <label>Nombre del titular</label><input type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
                                                        </div>
                                                        <div class="sctn-col">
                                                            <label>Número de tarjeta</label><input type="text" autocomplete="off" data-openpay-card="card_number">
                                                        </div>
                                                    </div>
                                                    <div class="sctn-row">
                                                        <div class="sctn-col l">
                                                            <label>Fecha de expiración</label>
                                                            <div class="sctn-col half l"><input type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
                                                            <div class="sctn-col half l"><input type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
                                                        </div>
                                                        <div class="sctn-col cvv"><label>Código de seguridad</label>
                                                            <div class="sctn-col half l"><input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="openpay">
                                                        <div class="logo">Transacciones realizadas vía:</div>
                                                        <div class="shield">Tus pagos se realizan de forma segura con encriptación de 256 bits</div>
                                                    </div>
                                                    <p>
                                                        <input class="styled-checkbox" id="terminos" type="checkbox" disabled>
                                                        <label for="terminos">He leído y acepto los términos y condiciones *</label>
                                                    </p>
                                                    <div class="sctn-row" id="place_order" style="display: none;">
                                                        <a class="button rght" id="pay-button">Pagar</a>
                                                    </div>
                                                    <!--button title="" id="placeOrder" name="reservar" disabled>Realizar Compra</button-->
                                                </div>
                                            </div>
                                            <!--div id="pagoTarjeta" style="display: none">
                                                <p>Realiza el pago con tarjeta bancaria.</p>
                                                <input type="hidden" name="idu_r" value="<?=$_SESSION['id_sesion_usuario']?>" id="idu">
                                                <input type="hidden" name="ida_r" value="<?=$dataActividad['id_actividad']?>" id="ida">
                                                <input type="hidden" name="iddp_r" value="<?=$datosPrecio['id_datos_precio_actividad']?>" id="iddp">
                                                <input type="hidden" name="idra_r" value="" id="idra">
                                                <div class="sctn-row">
                                                    <div class="sctn-col l">
                                                        <label>Nombre del titular</label><input type="text" name="titular" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
                                                    </div>
                                                    <div class="sctn-col">
                                                        <label>Número de tarjeta</label><input type="text" name="cardNum" autocomplete="off" data-openpay-card="card_number"></div>
                                                </div>
                                                <div class="sctn-row">
                                                    <div class="sctn-col l">
                                                        <label>Fecha de expiración</label>
                                                        <div class="sctn-col half l"><input type="text" name="mes" placeholder="Mes" data-openpay-card="expiration_month"></div>
                                                        <div class="sctn-col half l"><input type="text" name="year" placeholder="Año" data-openpay-card="expiration_year"></div>
                                                    </div>
                                                    <div class="sctn-col cvv"><label>Código de seguridad</label>
                                                        <div class="sctn-col half l"><input type="text" name="ccv" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2"></div>
                                                    </div>
                                                </div>
                                                <div class="openpay"><div class="logo">Transacciones realizadas vía:</div>
                                                    <div class="shield">Tus pagos se realizan de forma segura con encriptación de 256 bits</div>
                                                </div>
                                            </div-->
                                            <!--div>
                                                <input class="styled-checkbox" name="payment" id="payment3" type="radio">
                                                <label for="payment3">Cash on Delivery</label>
                                            </div-->
                                            <!--div class="paymal-method">
                                                <input class="styled-checkbox" name="payment" id="payment4" type="radio">
                                                <label for="payment4"> PayPal <img src="http://placehold.it/145x50" alt="" /><a href="#" title="">What is PayPal?</a></label>
                                            </div-->
                                            <!--p>
                                            <input class="styled-checkbox" id="terminos" type="checkbox" disabled>
                                            <label for="terminos">He leído y acepto los términos y condiciones *</label>
                                        </p>
                                        <button title="" id="placeOrder" name="reservar" disabled>Realizar Compra</button-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('../common/footer.php'); ?>
    <?php include_once('../common/popups.php'); ?>

</div>
<?php include_once('../common/script.php'); ?>
<script type="text/javascript">
    $( document ).ready(function(){
        //Validaciones

        $('#req_billing').on("click",function () {
           $('#billing_info').toggle();
        });
        //Guardar datos first step
        /*
        *   nombresolicitante
        *   telefonosolicitante
        *   razonSocial
        *   rfc
        *   note
        */
        $('#siguiente').on("click", function (event) {
            event.preventDefault();
            $(".page-loading").css("display","block");
            var nombresolicitante = $('#nombresolicitante');
            var telefonosolicitante = $('#telefonosolicitante');
            var razonSocial = $('#razonSocial');
            var rfc = $('#rfc');
            var note = $('#note');
            var require_factura = $('#req_billing');
            var idu = $('#idu');
            var ida = $('#ida');
            var iddp = $('#iddp');
            var idra = $('#idra');
            var data = {};
            var datosReservacion;
            //TODO Validar que los inputs no esten vacios
            if(nombresolicitante.val() == ""){
                $("#validationSolicitante").text("Debe especificar un nombre").css("display","block");
                $(".page-loading").css("display","none");
                return false;
            }else{
                $("#validationSolicitante").css("display","none");
                $(".page-loading").css("display","none");
            }
            if (telefonosolicitante.val() == ""){
                $("#validationTelefono").text("Debe especificar un telefono").css("display","block");
                return false;
            }else{
                $("#validationTelefono").css("display","none");
            }
            if(idra.val() == ""){
                datosReservacion = "new"
            }else{
                datosReservacion = idra.val();
            }
            if (require_factura.is(":checked")){
                data = {
                    datosReservacion :datosReservacion,
                    idu_r : idu.val(),
                    ida_r : ida.val(),
                    iddp_r : iddp.val(),
                    nombresolicitante : nombresolicitante.val(),
                    telefonosolicitante : telefonosolicitante.val(),
                    razonSocial : razonSocial.val(),
                    rfc : rfc.val(),
                    note : note.val(),
                    require_factura : require_factura.is(":checked"),
                };
            }else{
                data = {
                    datosReservacion :datosReservacion,
                    idu_r : idu.val(),
                    ida_r : ida.val(),
                    iddp_r : iddp.val(),
                    nombresolicitante : nombresolicitante.val(),
                    telefonosolicitante : telefonosolicitante.val(),
                    note : note.val(),
                    require_factura : require_factura.is(":checked"),
                };
            }
            //Guardar datos paso uno
            $.ajax({
                data: data,
                type: "POST",
                dataType: "json",
                url: "src/Controller/reservaActividadController.php"
            })
                .done(function( data ) {
                    $(".page-loading").css("display","none");
                    if (data.status != 0){
                        return false;
                    }
                    //Bloquear paso 1 deshabilitar botones, mostrar boton de editar datos
                    nombresolicitante.attr('disabled','disabled');
                    telefonosolicitante.attr('disabled','disabled');
                    require_factura.attr('disabled','disabled');
                    note.attr('disabled','disabled');
                    razonSocial.attr('disabled','disabled');
                    rfc.attr('disabled','disabled');
                    //ocultar paso uno
                    $('#stepOne').toggle();
                    //Mostrar Resumen de paso 1
                    $('#stepOneResume').toggle();
                    //datos de resumen
                    $('#solicitante').append(nombresolicitante.val());
                    $('#telefonoContacto').append(telefonosolicitante.val());
                    $('#actividadNameResume').append($('#nombreActividad').text());
                    if(require_factura.is(":checked")){
                        $('#req_factura').css('display','block');
                        $('#razonSocialResumen').append(razonSocial.val());
                        $('#rfc_resume').append(rfc.val());
                    }else{
                        $('#req_factura').css('display','none');
                    }
                    $('#notasAdicionales').append(note.val());
                    //Procesar datos paso dos:
                    //idra
                    $('#idra').val(data.idra);
                    //Habilitar terminos
                    $('#terminos').removeAttr('disabled');
                    //habilitar boton de pago
                    if($('#terminos').is(':checked')){
                        $('#place_order').css('display','block');
                    }else{
                        $('#place_order').css('display','none');
                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    $(".page-loading").css("display","none");
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                    }
                });
        });
        //Mostrar paso 1 ocultar resumen paso 1
        $('#editarStepOne').on('click',function (event) {
            event.preventDefault();
            var nombresolicitante = $('#nombresolicitante');
            var telefonosolicitante = $('#telefonosolicitante');
            var razonSocial = $('#razonSocial');
            var rfc = $('#rfc');
            var note = $('#note');
            var require_factura = $('#req_billing');
            //habilitar datos de paso 1
            nombresolicitante.removeAttr('disabled');
            telefonosolicitante.removeAttr('disabled');
            require_factura.removeAttr('disabled');
            note.removeAttr('disabled');
            razonSocial.removeAttr('disabled');
            rfc.removeAttr('disabled');
            //mostrar paso 1 y ocultar resumen
            $('#stepOneResume').toggle();
            $('#stepOne').toggle();
            //Deshabilitar paso 2
            $('#terminos').attr('disabled','enabled');
            $('#place_order').css('display','none');
        });
        //Tipo de pago 2, pago con tarjeta
        $('#payment2').on("click",function () {
            $('#pagoTarjeta').toggle();
        });
        $('#adultos , #childs').on("keyup",function (){
            var childs = parseInt($('#childs').val());
            var adultos = parseInt($('#adultos').val());
            var precioPersona = $('#precioPersona');
            var cargoAdicionalBase = $('#cargoAdicionalBase');
            var lugaresDisponibles = $('#lugaresDisponibles');
            var totalLugares = 0;
            var precioTotal = 0;
            var cargoTotal = 0;
            var totalAdultos = 0;
            var totalChilds = 0;
            var subTotal = 0;
            childs = isNaN(childs) ? 0 : childs;
            adultos = isNaN(adultos) ? 0 : adultos;

            totalAdultos = adultos * precioPersona.text();
            totalChilds = childs * parseInt(precioPersona.text());
            totalLugares = childs + adultos;
            if (totalLugares > parseInt(lugaresDisponibles.text())){
                $("#validationLugares").text("El limite de lugares es:"+parseInt(lugaresDisponibles.text())).css("display","block");
                return false;
            }else{
                $("#validationLugares").css("display","none");
            }
            cargoTotal = totalLugares * parseInt(cargoAdicionalBase.text());
            subTotal = totalAdultos + totalChilds + cargoTotal;
            precioTotal = subTotal;

            $('#totalAdultos').text("$"+totalAdultos);
            $('#totalChilds').text("$"+totalChilds);
            $('#cargoAdicional').text("por "+ totalLugares);
            $('#totalCargoAdicional').text("$"+cargoTotal);
            $('#subtotal').text("$"+subTotal);
            $('#totalCargos').text("$"+precioTotal);
            $('#amount').val(precioTotal);
        });

        //Aceptar/Denegar terminos y condiciones
        $('#terminos').on('click',function () {
            if($('#terminos').is(':checked')){
                $('#place_order').css('display','block');
            }else{
                $('#place_order').css('display','none');
            }
        });
    });
</script>
</body>
</html>


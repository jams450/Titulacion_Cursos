<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <?php include_once('common/head.php'); ?>
    <style>
        header.on-top {
            position: relative;
        }
        div#message {
            display: block;
            margin-bottom: 20px;
            background: #021720;
            height: 50px;
            border: medium none;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
            text-align: center;
            padding-top: 1rem;
        }
        div#message > small{
            color: #ffffff;
            font-family: Oswald;
        }
    </style>
</head>
<body>
<div class="page-loading">
    <div class="loadery"></div>
</div>
<div class="theme-layout">
    <?php include_once('common/menu.php'); ?>
    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-header">
                            <h2>Contáctanos</h2>
                            <ul class="breadcrumbs">
                                <li><a href="/index.php" title="">Inicio</a></li>
                                <li>Contáctanos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block gray no-padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-map">
                        <div id="map-container">
                            <div id="map_div">&nbsp;</div>
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
                    <div class="col-md-8 column">
                        <h3 class="mini-title">Contacto</h3>
                        <div class="contactus-form"  id="contact">
                            <div id="message" style="display: none"></div>
                            <form method="post" action="../src/Controller/contact.php" name="contactform" id="contactform">
                                <div class="row">
                                    <div class="col-md-6"><input name="name" type="text" id="name" placeholder="Nombre" /></div>
                                    <div class="col-md-6"><input  name="email" type="text" id="email" placeholder="Email"  /></div>
                                    <div class="col-md-12"><input type="text" placeholder="Asunto" id="asunto" name="asunto" /></div>
                                    <div class="col-md-12"><textarea name="comments" id="comments" placeholder="Mensaje"></textarea></div>
                                    <div class="col-md-12"><input type="submit" id="submit" value="Enviar" /></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <div class="contact-info-box">
                            <h3 class="mini-title">Información de contacto</h3>
                            <div class="contact-box">
                                <ul>
                                    <li>
                                        <i class="la la-map-marker"></i>
                                        <h4>Dirección</h4>
                                        <span>Canoa 235, Desp. 504 Torre 1 C.P. 01090</span>
                                        <span>Ciudad de México</span>
                                    </li>
                                    <li>
                                        <i class="la la-phone"></i>
                                        <h4>Teléfono</h4>
                                        <span>(55) 2848-2371</span>
                                    </li>
                                    <li>
                                        <i class="la la-envelope-o"></i>
                                        <h4>Email</h4>
                                        <span>info@wijoi.com</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('common/footer.php'); ?>

    <?php include_once('common/popups.php'); ?>

</div>

<?php include_once('common/script.php'); ?>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&sensor=true&libraries=places"></script>
<script type="text/javascript" src="assets/js/maps3.js"></script><!-- Maps2 -->

</body>
</html>

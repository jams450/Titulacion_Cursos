<?php
    session_start();
    if (!isset($_SESSION['alta_alojamiento']) && !isset($_SESSION["alta_alojamiento_files"])) {
        header("location: ../panel.php");
    }
    $data = array();
    $data = $_SESSION['alta_alojamiento'];
    //unset($_SESSION['alta_alojamiento']);
    $response = $_SESSION['alta_alojamiento_response'];
    //unset($_SESSION['alta_alojamiento_response']);
    $files =  array();
    $files = $_SESSION['alta_alojamiento_files'];
    //unset($_SESSION['alta_alojamiento_files']);
    $target_dir_portada = "/assets/images/alojamientos/portada_alojamiento/";
    $target_dir_galeria = "/assets/images/alojamientos/galeria_alojamiento/";

    var_dump($response);
    var_dump($data);
?>
<!DOCTYPE html>
<html lang="es" >
  <head>
    <?php include_once('../../common/head.php'); ?>
    <link rel="stylesheet" href="assets/css/style_steps.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datepicker3.standalone.min.css">
    <link rel="stylesheet" href="assets/css/swiper_css/swiper.css">
    <style>
        header.on-top {
            position: relative;
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
                                  <h2>Datos registrados</h2>
                                  <ul class="breadcrumbs">
                                      <li><a href="index.php" title="">Inicio</a></li>
                                      <li><a href="alojamiento-form.php" title="">Alojamiento</a></li>
                                      <li>Formulario de Alojamiento</li>
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
                                <div class="shoping-detail-sec">
                                    <?php if (!empty($data['nombre_empresa']) && !empty($data['giro_empresa']) && !empty($data['tel_oficina']) && !empty($data['pagina_web'])) {
    ?>
                                    <div class='col-md-12'>
                                        <h3>INFORMACIÓN EMPRESA</h3>
                                    </div>
                                    <div class='col-md-12'>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Nombre de la empresa: <span class='span_texto_registrado'> <?= $data['nombre_empresa'] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Giro de la empresa: <span class='span_texto_registrado'> <?= $data['giro_empresa'] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Teléfono oficina: <span class='span_texto_registrado'> <?= $data['tel_oficina'] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Página web: <span class='span_texto_registrado'> <?= $data['pagina_web'] ?> </span></p>
                                    </div>
                                    <hr class='hr_style'><br>
                                    <?php
} ?>
                                    <div class='col-md-12'>
                                        <h3>DATOS DE LA PROPIEDAD</h3>
                                    </div>
                                    <div class='col-md-12'>
                                        <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Nombre del alojamiento: <span class='span_texto_registrado'> <?= $data['nombre_alojamiento'] ?> </span></p>
                                    </div>

                                    <div class='col-md-12'>
                                        <h3>Dirección</h3>
                                    </div>
                                    <div class='col-md-12'>
                                        <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Descripción de la ubicacion: <span class='span_texto_registrado'> <?= $data['desc_ubicacion'] ?> </span></p>
                                        <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Dirección larga: <span class='span_texto_registrado'> <?= $data['direccion_larga'] ?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Calle: <span class='span_texto_registrado'> <?= $data['calle_colonia'] ?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Número interior: <span class='span_texto_registrado'> <?= $data['num_int']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Número apartamento: <span class='span_texto_registrado'> <?= $data['numero_apartamento']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Número exterior: <span class='span_texto_registrado'> <?= $data['numero_calle']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Nombre del Edificio: <span class='span_texto_registrado'> <?= $data['nombre_edificio']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Código Postal: <span class='span_texto_registrado'> <?= $data['cp']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Pais: <span class='span_texto_registrado'> <?=$data['pais']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Estado: <span class='span_texto_registrado'> <?=$data['estado']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Ciudad: <span class='span_texto_registrado'> <?=$data['ciudad']?> </span></p>
                                    </div>

                                    <div class='col-md-12'>
                                        <h3>Mapa</h3>
                                    </div>
                                    <div class='col-md-12'>
                                      <div id="map" style="height: 400px">

                                      </div>
                                    </div>

                                    <div class='col-md-12'>
                                        <h3>Tipo de Alojamiento</h3>
                                    </div>
                                    <div class='col-md-12'>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Tipo Alojamiento: <span class='span_texto_registrado'> <?= $response['datos']['tipo_alojamiento_nom']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Cuántas huéspedes adultos caben? <span class='span_texto_registrado'> <?= $data['adultos']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Cuántas huéspedes niños caben? <span class='span_texto_registrado'> <?= $data['child']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Cuántas dormitorios hay? <span class='span_texto_registrado'> <?= $data['num_dormitorios']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Cuántas baños hay? <span class='span_texto_registrado'> <?= $data['num_wc']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Cuántas camas hay? <span class='span_texto_registrado'> <?= $data['num_camas']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Cuántos sofacamas hay? <span class='span_texto_registrado'> <?= $data['num_sofacamas']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Noches Mínimo de hospedaje: <span class='span_texto_registrado'> <?= $data['min_noches']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Noches Máximo de hospedaje:<span class='span_texto_registrado'> <?= $data['noches_limite']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Días previos que necesita para recibir una reserva:<span class='span_texto_registrado'> <?= $data['prev_reserva']?> </span></p>
                                    </div>
                                    <hr class='hr_style'><br>

                                    <div class='col-md-12'>
                                        <h3>SERVICIOS QUE INCLUYE</h3>
                                    </div>
                                    <div class='col-md-12'>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Servicios que incluye
                                          <span class='span_texto_registrado'>
                                            <ul>
                                           <?php
                                              for ($i=0; $i < count($response['datos']['tipo_servicios_nom']) ; $i++) {
                                                  echo "<li>".$response['datos']['tipo_servicios_nom'][$i]."</li>";
                                              }
                                           ?>
                                           </ul>
                                         </span>
                                         </p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿A que otros servicios tienen acceso los huéspedes?(Opcional) <span class='span_texto_registrado'> <?= $data['servicios_adicionales']?> </span></p>
                                    </div>
                                    <div class='col-md-12'>
                                        <h3>DESCRIPCIÓN DE LA PROPIEDAD</h3>
                                    </div>
                                    <div class='col-md-12'>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Descripción del inmueble <span class='span_texto_registrado'> <?= $data['descripcion_inmueble']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Puntos de interés y cuidados en la zona <span class='span_texto_registrado'> <?= $data['puntos_interes']?> </span></p>
                                        <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Política de cancelación <span class='span_texto_registrado'> <?= $data['politica']?> </span></p>
                                    </div>
                                    <hr class='hr_style'><br>
                                    <div class='col-md-12'>
                                        <h3>Foto de Portada</h3>
                                    </div>
                                    <br>
                                    <div class='col-md-3 col-sm-6 col-xs-12'>
                                        <img class='img-responsive' src='<?=$target_dir_portada.$response["datos"]["imagenPortada"] ?> '><br>
                                        <span class='span_texto_registrado'> <?=$response["datos"]["imagenPortada"]?> </span><br><br>
                                    </div>
                                    <hr class='hr_style'><br>
                                    <div class='col-md-12'>
                                        <h3>Fotos de galería</h3>
                                    </div>
                                    <br>
                                    <?php
                                      // Cargar imagenes de actividades
                                      for ($i = 0 ; $i < count($response["datos"]["imagenesGaleria"]) ; $i++) {
                                          ?>
                                    <div class='col-md-3 col-sm-6 col-xs-12'>
                                        <img class='img-responsive' src='<?=$target_dir_galeria.$response["datos"]["imagenesGaleria"][$i]; ?> '><br>
                                        <span class='span_texto_registrado'> <?=$response["datos"]["imagenesGaleria"][$i]?> </span><br><br>
                                    </div>
                                    <?php
                                      } ?>
                                    <hr class='hr_style'><br>
                                    <div class='col-md-12'>
                                        <h3>Configuración de precios</h3>
                                    </div>
                                    <br>
                                    <div class='col-md-12'>
                                        <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Días disponibles: <span class='span_texto_registrado'> <?= count($data["fecha_entrada"]) ?> </span></p>
                                        <?php
                                         // Cargar fechas
                                         for ($i = 0 ; $i < count($data["fecha_entrada"]) ; $i++) {
                                             ?>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Fecha de entrada: <span class='span_texto_registrado'> <?= $data["fecha_entrada"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Hora de entrada: <span class='span_texto_registrado'> <?= $data["hora_entrada"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Fecha de salida: <span class='span_texto_registrado'> <?= $data["fecha_salida"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Hora de salida: <span class='span_texto_registrado'> <?= $data["hora_salida"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Tarifa por noche: <span class='span_texto_registrado'> <?= $data["tarifa_noche"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Tarifa por limpieza: <span class='span_texto_registrado'> <?= $data["tarifa_limpieza"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'> <?= $data["desc_cargo"][$i] ?> : <span class='span_texto_registrado'> <?= $data["otros_cargos"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>% descuento por 7 noches: <span class='span_texto_registrado'> <?= $data["descuentosiete"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>% descuento por 30 noches: <span class='span_texto_registrado'> <?= $data["descuentotreinta"][$i] ?> </span></p>
                                        <p class='titulo_label col-md-12 col-sm-12 col-xs-12'></p>
                                        <hr class='hr_style'>
                                        <?php
                                         } ?>
                                    </div>
                                    <!-- <hr class='hr_style'><br> -->
                                    <div class='col-md-6 col-md-offset-4'>
                                        <div class='single-product-info'>
                                            <a href='/view/anfitrion/panel.php' title=''><i class='la la-step-backward'></i>Terminar</a>
                                        </div>
                                    </div>
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
            <!-- Script -->
            <?php include_once('../../common/script.php'); ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&libraries=places&callback=initialize" async defer></script>
            <script type="text/javascript">
              function initialize() {
                initMap();
              }
              var lata = <?= $data["lat"] ?>;
              var lnga = <?= $data["lng"] ?>;

              function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                  center: {lat: lata, lng: lnga},
                  zoom: 8,
                  streetViewControl: false
                });
                var myLatLng = {lat: lata, lng: lnga};
                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: 'Alojamiento'
                });
                map.setZoom(18);
                map.setCenter(marker.getPosition());
              }



            </script>
  </body>
</html>
